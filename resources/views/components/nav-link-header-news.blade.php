@props(['type' => 'default', 'active' => false, 'mobile' => false])

@if($type === 'nav')
<a {{ $attributes }}
    class="{{ $mobile ? 'block ' : '' }}{{ $active ? 'bg-sky-600 text-white' : 'hover:bg-sky-500 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium text-white"
    aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>
@else
    <a {{ $attributes }}
        class="{{ $mobile ? 'block ' : '' }}{{ $active ? 'bg-gray-700 text-white' : 'hover:bg-gray-400
        hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium text-gray-900" 
        aria-current="{{$active? 'page' : false}}">{{$slot}}
    </a>
@endif

