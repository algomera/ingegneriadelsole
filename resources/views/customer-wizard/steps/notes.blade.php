<x-card>
	<x-card-header>
		<x-slot:title>{{ $customer->name }}</x-slot:title>
		<x-slot:actions>
			<x-jet-button wire:click="previousStep">
				<x-heroicon-o-chevron-left class="w-4 h-4"></x-heroicon-o-chevron-left>
			</x-jet-button>
			<x-jet-button wire:click="next">Salva</x-jet-button>
		</x-slot:actions>
	</x-card-header>
	<div class="p-4">
		<div class="grid grid-cols-4 gap-6">
			<div class="col-span-4 sm:col-span-1">
				<x-wizard-navigation :steps="$steps"/>
			</div>
			<div class="col-span-4 sm:col-span-3">
				<div>
					<h2 class="sm:hidden text-lg font-medium text-gray-900">Altro</h2>
					<div class="mt-4 grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-6">
						<div class="col-span-6">
							<x-textarea wire:model.defer="note" for="note" label="Note" rows="7">
							</x-textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-card>