@props([
    'div' => '',
    'label' => '',
    'model' => ''
])

<div {{ $div }}>
    <label for="{{ $label }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $label }}</label>
    <input id="{{ $label }}" {{ $attributes }} {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) }} placeholder="{{ $label }}">
    @error($model)<p class="text-sm text-red-600">{{ $message }}</p>@enderror
</div>
