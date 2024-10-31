
<div class="p-8 bg-blue-200 rounded-t-lg text-center text-xl font-bold">
    Avatar
</div>

<div class="p-8 space-y-8">
    @csrf
    <div>
        <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Avatar</label>
        <input type="file" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Your image" name="image" />
        @error('image')
            {{ $message }}
        @enderror
    </div>
</div>
