@props(['disabled' => false, 'for' => '', 'label' => '', 'append' => null, 'prepend' => null])

<div>
	@if($for && $label)
		<x-jet-label for="{{ $for }}" class="block text-sm font-medium text-gray-700">{{ $label }}</x-jet-label>
	@endif
	<div class="mt-1">
		<textarea {{ $disabled ? 'disabled' : '' }} name="{{ $for }}" id="{{ $for }}" {!! $attributes->merge(['class' => 'focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md disabled:border-gray-200 disabled:text-gray-500']) !!}>
			{{ $slot }}
		</textarea>
	</div>
	<x-jet-input-error for="{{ $for }}" class="mt-1"/>
</div>