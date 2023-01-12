<x-card>
	<x-card-header>
		<x-slot:title>{{ $name }}</x-slot:title>
		<x-slot:actions>
			<x-jet-button wire:click="next">Avanti</x-jet-button>
		</x-slot:actions>
	</x-card-header>
	<div class="p-4">
		<div class="grid grid-cols-4 gap-6">
			<div class="col-span-4 sm:col-span-1">
				<x-wizard-navigation :steps="$steps" />
			</div>
			<div class="col-span-4 sm:col-span-3">
				<div>
					<h2 class="sm:hidden text-lg font-medium text-gray-900">Informazioni generali</h2>
					<div class="mt-4 sm:mt-0 grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-6">
						<div class="sm:col-span-3">
							<x-jet-input wire:model.defer="name" type="text" for="name" label="Denominazione"></x-jet-input>
						</div>

						<div class="sm:col-span-3">
							<div class="flex items-center justify-between">
								<x-jet-label for="group_id">
									Gruppo di appartenenza
								</x-jet-label>
								<span wire:click="$emit('openModal', 'customers.create-group')" class="text-xs text-indigo-500 cursor-pointer">Crea</span>
							</div>
							<x-select wire:model.defer="group_id" for="group_id" class="mt-1">
								<option value="null" selected>Nessuno</option>
								@foreach($groups as $group)
									<option value="{{ $group->id }}">{{ $group->name }}</option>
								@endforeach
							</x-select>
						</div>

						<div class="sm:col-span-3">
							<x-jet-label for="group_id">
								Mandatario
							</x-jet-label>
							<x-select wire:model.defer="agent" for="agent" class="mt-1">
								<option value="0">No</option>
								<option value="1">Si</option>
							</x-select>
						</div>
						<div class="sm:col-span-3">
							<x-jet-label for="group_id">
								Tipologia
							</x-jet-label>
							<x-select wire:model.defer="type" for="type" class="mt-1">
								<option value="private">Privato</option>
								<option value="company">Azienda</option>
							</x-select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-card>