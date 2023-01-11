<div>
	<div class="grid grid-cols-4 gap-6">
		<div class="col-span-4 sm:col-span-1">
			<x-wizard-navigation :steps="$steps"/>
		</div>
		<div class="col-span-4 sm:col-span-3">
			<div>
				<h2 class="sm:hidden text-lg font-medium text-gray-900">Credenziali</h2>
				@if($credentials->count())
					<x-jet-button
							wire:click="$emit('openModal', 'customers.create-credential', {{ json_encode(['customer_id' => $this->state()->forStep('general-informations-step')['customer_id']]) }})">
						Aggiungi
					</x-jet-button>
				@endif
				<div class="mt-4">
					<ul role="list" class="divide-y divide-gray-200">
						@forelse($credentials as $credential)
							<li class="flex items-center justify-between py-4">
								<div x-data="{show: false}">
									<p class="text-sm font-medium text-gray-900">{{ $credential->service }}</p>
									<p class="text-sm text-gray-500">Username: {{ $credential->username }}</p>
									<p x-on:click="show = !show" class="text-sm text-gray-500">
										Password:
										<span x-show="!show">
											@foreach(range(0, strlen($credential->password)) as $p)
												•
											@endforeach
										</span>
										<span x-show="show">{{ $credential->password }}</span>
									</p>
								</div>
								<div class="flex items-center space-x-8">
									<x-heroicon-o-trash wire:click="deleteCredential({{ $credential->id }})"
									                    class="w-5 h-5 text-red-500"></x-heroicon-o-trash>
									<x-heroicon-o-pencil
											wire:click="$emit('openModal', 'customers.edit-credential', {{ json_encode(['credential_id' => $credential->id]) }})"
											class="w-5 h-5 text-blue-500"></x-heroicon-o-pencil>
								</div>
							</li>
						@empty
							<div class="text-center">
								<x-heroicon-o-lock-closed
										class="mx-auto h-12 w-12 text-gray-400"></x-heroicon-o-lock-closed>
								<h3 class="mt-2 text-sm font-medium text-gray-900">Nessuna credenziale</h3>
								<p class="mt-1 text-sm text-gray-500">Aggiungine una ora.</p>
								<div class="mt-6">
									<x-jet-button
											wire:click="$emit('openModal', 'customers.create-credential', {{ json_encode(['customer_id' => $this->state()->forStep('general-informations-step')['customer_id']]) }})">
										<svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
										     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
											<path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z"/>
										</svg>
										Aggiungi
									</x-jet-button>
								</div>
							</div>
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