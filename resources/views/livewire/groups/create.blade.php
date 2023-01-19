<x-card>
	<x-card-header>
		<x-slot:title>
			<h3>Nuovo gruppo</h3>
		</x-slot:title>
	</x-card-header>
	<div class="p-4 grid grid-cols-2 gap-4">
		<div class="col-span-2">
			<x-jet-input wire:model.defer="name" for="name" label="Nome" type="text"></x-jet-input>
		</div>
	</div>
	<x-card-footer>
		<x-slot:right_actions>
			<x-jet-button wire:click="save">Salva</x-jet-button>
		</x-slot:right_actions>
	</x-card-footer>
</x-card>