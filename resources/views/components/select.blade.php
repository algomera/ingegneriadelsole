@props(['disabled' => false, 'for' => '', 'label' => '', 'append' => null, 'prepend' => null])

<div>
	@if($for && $label)
		<x-jet-label for="{{ $for }}" class="block text-sm font-medium text-gray-700">{{ $label }}</x-jet-label>
	@endif
	<div class="@if($for && $label) mt-1 @endif">
		<select {{ $disabled ? 'disabled' : '' }} name="{{ $for }}"
		        id="{{ $for }}" {!! $attributes->merge(['class' => 'block w-full rounded-md border-gray-300 h-[41px] py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm']) !!}>
			{{ $slot }}
		</select>
	</div>
	<x-jet-input-error for="{{ $for }}" class="mt-1"/>
</div>