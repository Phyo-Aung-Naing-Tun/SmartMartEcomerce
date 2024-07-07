@props(['disabled' => false])

<input required {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300  focus:border-indigo-500 focus:ring-indigo-500rounded-md shadow-sm w-full']) !!}>
