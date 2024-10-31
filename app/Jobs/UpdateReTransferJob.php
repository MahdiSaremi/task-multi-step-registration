<?php

namespace App\Jobs;

use App\ServerApi\Contracts\ApiClient;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdateReTransferJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public mixed $id,
        public array $data,
    )
    {
    }

    /**
     * Retry update request
     */
    public function handle(): void
    {
        try
        {
            app(ApiClient::class)->update($this->id, $this->data);
        }
        catch (\Throwable)
        {
            $this->release(now()->addMinutes(2 ** $this->attempts() / 4));
        }
    }
}
