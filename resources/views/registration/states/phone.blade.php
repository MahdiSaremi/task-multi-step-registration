
<div class="p-8 bg-blue-200 rounded-t-lg text-center text-xl font-bold">
    Phone
</div>

<div class="p-8 space-y-8">
    @csrf
    <div>
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone Number</label>
        <input type="text" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Your phone" name="phone" />
        @error('phone')
            {{ $message }}
        @enderror
    </div>
</div>
