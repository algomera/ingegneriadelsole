<x-card>
	<x-card-header>
		<x-slot:title>
			<h3>Modifica credenziale</h3>
		</x-slot:title>
	</x-card-header>
	<div class="p-4 grid grid-cols-2 gap-4">
		<div class="col-span-2">
			<x-select wire:model="type">
				@foreach(config('general.credentials.types') as $k => $type)
					<option value="{{$k}}">{{ $type }}</option>
				@endforeach
			</x-select>
		</div>
		@if($showService)
			<div class="col-span-2">
				<x-jet-input wire:model.defer="service" for="service" label="Servizio" type="text"></x-jet-input>
			</div>
		@endif
		<div class="col-span-1">
			<x-jet-input wire:model.defer="username" for="username" label="Username" type="text"></x-jet-input>
		</div>
		<div class="col-span-1">
			<x-jet-input wire:model.defer="password" for="password" label="Password" type="text"></x-jet-input>
		</div>
	</div>
	<x-card-footer>
		<x-slot:right_actions>
			<x-jet-button wire:click="save">Salva</x-jet-button>
		</x-slot:right_actions>
	</x-card-footer>
</x-card>