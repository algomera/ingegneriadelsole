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
					<h2 class="sm:hidden text-lg font-medium text-gray-900">Sede legale</h2>
					<div class="mt-4 grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2">
						<div class="sm:col-span-3">
							<x-jet-input :disabled="!auth()->user()->can('customer_update')" wire:model.defer="headquarter_street" type="text"
							             for="headquarter_street"
							             label="Indirizzo"></x-jet-input>
						</div>
						<div class="sm:col-span-1">
							<x-jet-input :disabled="!auth()->user()->can('customer_update')" wire:model.defer="headquarter_city" type="text"
							             for="headquarter_city"
							             label="Città"></x-jet-input>
						</div>
						<div class="sm:col-span-1">
							<x-jet-input :disabled="!auth()->user()->can('customer_update')" wire:model.defer="headquarter_province" type="text"
							             for="headquarter_province"
							             label="Provincia"></x-jet-input>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-card>