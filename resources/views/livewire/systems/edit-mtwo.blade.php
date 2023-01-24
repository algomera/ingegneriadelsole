<x-card>
	<x-card-header>
		<x-slot:title>
			<div class="flex items-center space-x-6">
				<x-heroicon-o-chevron-left x-on:click="Livewire.emit('closeModal')"
				                           class="text-gray-600 w-4 h-4 cursor-pointer hover:text-gray-900"></x-heroicon-o-chevron-left>
				<h3>Modifica M2</h3>
			</div>
		</x-slot:title>
	</x-card-header>
	<div class="p-4 grid grid-cols-2 gap-4">
		<div class="col-span-1">
			<x-jet-input :disabled="!auth()->user()->can('mtwo_update')" wire:model.defer="m_two.brand" for="brand"
			             label="Marca" type="text"></x-jet-input>
		</div>
		<div class="col-span-1">
			<x-jet-input :disabled="!auth()->user()->can('mtwo_update')" wire:model.defer="m_two.number" for="number"
			             label="Matricola" type="text"></x-jet-input>
		</div>
		<div class="col-span-1">
			<x-jet-input :disabled="!auth()->user()->can('mtwo_update')" wire:model.defer="m_two.k" for="k" label="K"
			             type="text"></x-jet-input>
		</div>
		<div class="col-span-1">
			<x-jet-input :disabled="!auth()->user()->can('mtwo_update')" wire:model.defer="m_two.phone" for="phone"
			             label="Telefono" type="text"></x-jet-input>
		</div>
	</div>
	<x-card-footer>
		<x-slot:left_actions>
			@can('mtwo_delete')
				<x-jet-danger-button wire:click="delete">Elimina</x-jet-danger-button>
			@endcan
		</x-slot:left_actions>
		<x-slot:right_actions>
			<x-jet-button wire:click="save">Salva</x-jet-button>
		</x-slot:right_actions>
	</x-card-footer>
</x-card>