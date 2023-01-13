@props(['disabled' => false, 'for' => '', 'label' => '', 'append' => null, 'prepend' => null])

@php
	$class = '';
	$class .= isset($prepend) ? 'pl-10 ' : '';
	$class .= isset($append) ? 'pr-10 ' : '';
@endphp

<div>
	@if($for && $label)
		<x-jet-label :for="$for" class="block text-sm font-medium text-gray-700">{{ $label }}</x-jet-label>
	@endif
	<div class="@if($for && $label) mt-1 @endif relative">
		@isset($prepend)
			<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
				<x-icon :name="$prepend" class="h-5 w-5 text-gray-400"/>
			</div>
		@endisset
		<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $class . 'block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md disabled:border-gray-200 disabled:text-gray-500']) !!}>
		@isset($append)
			<div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
				<x-icon :name="$append" class="h-5 w-5 text-gray-400"/>
			</div>
		@endisset
	</div>
	<x-jet-input-error :for="$for" class="mt-1"/>
</div>