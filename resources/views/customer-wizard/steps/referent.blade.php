<x-card>
	<x-card-header>
		<x-slot:title>{{ $customer->name }}</x-slot:title>
		<x-slot:actions>
			<x-jet-button wire:click="previousStep">
				<x-heroicon-o-chevron-left class="w-4 h-4"></x-heroicon-o-chevron-left>
			</x-jet-button>
			<x-jet-button wire:click="next">Avanti</x-jet-button>
		</x-slot:actions>
	</x-card-header>
	<div class="p-4">
	<div class="grid grid-cols-4 gap-6">
		<div class="col-span-4 sm:col-span-1">
			<x-wizard-navigation :steps="$steps"/>
		</div>
		<div class="col-span-4 sm:col-span-3">
			<div>
				<h2 class="sm:hidden text-lg font-medium text-gray-900">Referente</h2>
				<div class="mt-4 grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-6">
					<div class="sm:col-span-3">
						<x-jet-input :disabled="!auth()->user()->can('customer_update')" wire:model.defer="referent_first_name" type="text" for="referent_first_name"
						             label="Nome"></x-jet-input>
					</div>
					<div class="sm:col-span-3">
						<x-jet-input :disabled="!auth()->user()->can('customer_update')" wire:model.defer="referent_last_name" type="text" for="referent_last_name"
						             label="Cognome"></x-jet-input>
					</div>
					<div class="sm:col-span-3">
						<x-jet-input :disabled="!auth()->user()->can('customer_update')" wire:model.defer="referent_email" type="email" for="referent_email"
						             label="Email"></x-jet-input>
					</div>
					<div class="sm:col-span-3">
						<x-jet-input :disabled="!auth()->user()->can('customer_update')" wire:model.defer="referent_phone" type="tel" for="referent_phone"
						             label="Telefono"></x-jet-input>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</x-card>