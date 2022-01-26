<div class="relative">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <input type="text" name="{{ $name }}" id="{{ $name }}" value="{{ $value  }}"
           autocomplete="{{ $name }}"
           class="mt-1 px-4 shadow py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border rounded-md @error($name) border-red-400 @else border-gray-100 @enderror">
    @error($name)
    <span class="absolute top-full text-red-400 text-xs mt-1">{{$message}}</span>
    @enderror
</div>
