@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex dark:text-gray-200 dark:md:hover:text-emerald-400 items-center px-1 pt-1 border-b-4 border-emerald-400 text-sm font-medium leading-5 dark:text-emerald-400 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex dark:text-gray-200 dark:md:hover:text-emerald-400 items-center px-1 pt-1 border-b-4 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 dark:md:hover:border-emerald-400 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
