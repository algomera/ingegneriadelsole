<div>
	<div class="grid grid-cols-4 gap-6">
		<div class="col-span-4 sm:col-span-1">
			<x-wizard-navigation :steps="$steps"/>
		</div>
		<div class="col-span-4 sm:col-span-3">
			<div>
				<h2 class="sm:hidden text-lg font-medium text-gray-900">Credenziali</h2>
				<x-jet-button wire:click="$emit('openModal', 'customers.create-credential', {{ json_encode(['customer_id' => $this->state()->forStep('general-informations-step')['customer_id']]) }})">Aggiungi</x-jet-button>
				<div class="mt-4">
					<ul role="list" class="divide-y divide-gray-200">
						@forelse($credentials as $credential)
							<li class="flex items-center justify-between py-4">
								<div>
									<p class="text-sm font-medium text-gray-900">{{ $credential->service }}</p>
									<p class="text-sm text-gray-500">{{ $credential->username }}</p>
								</div>
								<div class="flex items-center space-x-8">
									<x-heroicon-o-trash wire:click="deleteCredential({{ $credential->id }})" class="w-5 h-5 text-red-500"></x-heroicon-o-trash>
									<x-heroicon-o-pencil wire:click="$emit('openModal', 'customers.edit-credential', {{ json_encode(['credential_id' => $credential->id]) }})" class="w-5 h-5 text-blue-500"></x-heroicon-o-pencil>
								</div>
							</li>
						@empty
							<p class="text-sm text-gray-400">Nessuna credenziale salvata</p>
						@endforelse
					</ul>
				</div>
			</div>

			<div class="mt-4 flex items-center justify-between">
				<x-jet-button wire:click="previousStep">Indietro</x-jet-button>
				<x-jet-button wire:click="next">Avanti</x-jet-button>
			</div>
		</div>
	</div>
</div>