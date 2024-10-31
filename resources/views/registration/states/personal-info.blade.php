
<div class="p-8 bg-blue-200 rounded-t-lg text-center text-xl font-bold">
    Personal Info
</div>

<div class="p-8 space-y-8">
    @csrf
    <div>
        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
        <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Your name" name="name" />
        @error('name')
            {{ $message }}
        @enderror
    </div>
    <div>
        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Age</label>
        <input type="number" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Your age" name="age" />
        @error('age')
            {{ $message }}
        @enderror
    </div>
</div>
