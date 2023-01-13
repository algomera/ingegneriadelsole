<x-card>
	<x-card-header>
		<x-slot:title>
			<h3>Nuovo M{{$type}}</h3>
		</x-slot:title>
	</x-card-header>
	<div class="p-4 grid grid-cols-2 gap-4">
		<div class="col-span-1">
			<x-jet-input wire:model.defer="brand" for="brand" label="Marca" type="text"></x-jet-input>
		</div>
		<div class="col-span-1">
			<x-jet-input wire:model.defer="number" for="number" label="Matricola" type="text"></x-jet-input>
		</div>
		<div class="col-span-1">
			<x-jet-input wire:model.defer="k" for="k" label="K" type="text"></x-jet-input>
		</div>
		<div class="col-span-1">
			<x-jet-input wire:model.defer="phone" for="phone" label="Telefono" type="text"></x-jet-input>
		</div>
	</div>
	<x-card-footer>
		<x-slot:right_actions>
			<x-jet-button wire:click="save">Salva</x-jet-button>
		</x-slot:right_actions>
	</x-card-footer>
</x-card>