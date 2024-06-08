@props(['active' => false])
<a {{ $attributes }}
    class="{{ $active ? 'bg-blue-700 text-white block rounded-md px-3 py-2 text-base font-medium' : 'text-gray-700 hover:bg-blue-500 hover:text-white block rounded-md px-3 py-2 text-base font-medium' }} rounded-md px-3 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>