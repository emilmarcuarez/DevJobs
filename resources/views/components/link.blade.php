@php
    $classes="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
@endphp

{{-- recibe el href y los atributes que le pases. como classes es aparte se pone de esa manera, para que muestre el href y las classes --}}
<a {{ $attributes->merge(['class' =>$classes]) }}>
    {{ $slot }}
</a>