<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<form enctype="multipart/form-data" method="POST" action="{{ route('register-state.submit', $state) }}" class="bg-white m-8 rounded-xl border border-gray-200 shadow-xl">
    {!! $state->state->getView()->with('state', $state)->render() !!}

    <div class="p-8 space-x-8">
        @if($state->state->hasNext())
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        @endif

        @if($state->state->hasPrev())
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    onclick="event.preventDefault(); document.getElementById('previous').submit()"
            >
                Previous
            </button>
        @endif
    </div>
</form>

<form method="POST" action="{{ route('register-state.prev', $state) }}" id="previous">
@csrf
</form>

</body>
</html>
