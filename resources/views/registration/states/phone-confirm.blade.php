
<div class="p-8 bg-blue-200 rounded-t-lg text-center text-xl font-bold">
    SMS Confirm
</div>

<div class="p-8 space-y-8">
    @csrf
    <div>
        <label for="code" class="block mb-2 text-sm font-medium text-gray-900">Code</label>
        <input type="text" id="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Your phone" name="code" />
        @error('code')
            {{ $message }}
        @enderror
        <p class="text-sm text-gray-600">Hint: If no SMS is sent, fill the input with "1234"</p>
    </div>
</div>
