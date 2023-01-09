@props(['disabled' => false, 'for' => '', 'label' => ''])
<div>
	@if($for && $label)
		<x-jet-label for="{{ $for }}" class="block text-sm font-medium text-gray-700">{{ $label }}</x-jet-label>
	@endif
	<div
			x-data="{
			value: @entangle($attributes->wire('model')),
			init() {
				let quill = new Quill(this.$refs.quill, {
					theme: 'snow',
					modules: {
					  clipboard: {
					    matchVisual: false
					  },
					}
			        })
				quill.root.innerHTML = this.value;
				quill.on('text-change', () => {
					this.value = quill.root.innerHTML
				})
			},
		}"
			class="mt-1"
			{{ $attributes->whereDoesntStartWith('wire:model') }}
			wire:ignore
	>
		<div x-ref="quill"
		     class="prose prose-sm w-full min-w-full shadow-sm text-gray-500 border-gray-300 border-t-0 rounded-t-none rounded-b-md min-h-[10rem] max-h-96 overflow-y-scroll h-auto"></div>
	</div>
	<x-jet-input-error for="{{ $for }}" class="mt-1"/>
</div>