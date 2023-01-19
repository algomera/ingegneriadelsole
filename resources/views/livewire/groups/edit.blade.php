<x-card>
	<x-card-header>
		<x-slot:title>Gruppo {{ $group->name }}</x-slot:title>
	</x-card-header>
	<div class="p-4 space-y-6">
		<div class="grid grid-cols-3 gap-6">
			<div class="col-span-3">
				<x-jet-input wire:model.defer="group.name" type="text" for="name" label="Nome del Gruppo"></x-jet-input>
			</div>
		</div>
	</div>
	<x-card-footer>
		<x-slot:left_actions>
			<x-jet-danger-button wire:click="delete">Elimina</x-jet-danger-button>
		</x-slot:left_actions>
		<x-slot:right_actions>
			<x-jet-button wire:click="save">Salva</x-jet-button>
		</x-slot:right_actions>
	</x-card-footer>
</x-card>