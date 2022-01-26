<div class="relative">
    <label for="{{ $name }}"
           class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <select id="{{ $name }}" name="{{ $name }}" autocomplete="{{ $name }}"
            class="mt-1 block w-full py-2 pl-3 pr-6 bg-white rounded-md shadow focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error($name) border-red-400 @else border-gray-100 @enderror">
        @foreach($options as $option)
            @if($value === $option->id)
                <option value="{{ $option->id }}"
                        selected>{{ $option->name }}</option>
            @else
                <option value="{{ $option->id }}">{{ $option->name }}</option>
            @endif
        @endforeach
    </select>
    @error($name)
    <span class="absolute top-full text-red-400 text-xs mt-1">{{$message}}</span>
    @enderror
</div>
