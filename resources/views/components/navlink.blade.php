@props(['active' => false])

<a {{ $attributes }}
    class="{{ $active ? 'bg-blue-400 text-gray-900' : 'text-gray-700 hover:bg-blue-200 hover:text-gray-900' }} rounded-md px-3 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>