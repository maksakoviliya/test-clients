<div class="flex items-center">
    <a href="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),['sortBy' => $name])) }}"
       class="hover:text-gray-400">{{ $label }}</a>
    @if(request()->has('sortBy') && request()->get('sortBy') === $name)
        <a href="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),['sortOrder' => request()->get('sortOrder') === 'desc' ? 'asc' : 'desc'])) }}"
           class="rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-4 w-4 transform @if(request()->has('sortOrder') && request()->get('sortOrder') === 'desc') rotate-180 @endif"
                 fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M7 11l5-5m0 0l5 5m-5-5v12"/>
            </svg>
        </a>
    @endif
</div>
