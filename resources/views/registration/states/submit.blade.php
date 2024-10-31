
<div class="p-8 bg-blue-200 rounded-t-lg text-center text-xl font-bold">
    Submit
</div>

<div class="p-8 space-y-8">
    @csrf
    <div>
        <h2 class="text-4xl">Multi Step Registration Task Finished =D</h2>
        <br>

        <label for="confirm" class="block mb-2 text-sm font-medium text-gray-900">Confirm</label>
        <input type="checkbox" id="confirm" name="confirm" />
        @error('confirm')
            {{ $message }}
        @enderror
    </div>
</div>
