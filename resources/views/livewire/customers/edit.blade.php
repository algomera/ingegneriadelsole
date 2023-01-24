<div class="space-y-5">
	<livewire:customer-wizard :customer="$customer"/>
	<x-card>
		<x-card-header>
			<x-slot:title>Impianti</x-slot:title>
			<x-slot:actions>
				<x-jet-button
						wire:click="$emit('openModal', 'systems.create', {{ json_encode(['customer_id' => $customer->id]) }})">
					Crea
				</x-jet-button>
			</x-slot:actions>
		</x-card-header>
		<div class="p-4">
			<ul role="list" class="divide-y divide-gray-200">
				@forelse($customer->systems as $system)
					<li class="flex items-start justify-between py-4">
						<div>
							<a href="{{ route('customers.systems.show', [$customer->id, $system->id]) }}"
							   class="mb-2.5 text-sm font-medium text-indigo-600 cursor-pointer hover:underline">{{ $system->name }}</a>
						</div>
						<div class="flex items-center space-x-8">
							<div wire:click="$emit('openModal', 'systems.edit', {{ json_encode(['system' => $system->id]) }})">
								<x-heroicon-o-pencil
										class="w-4 h-4 text-gray-500 cursor-pointer hover:text-gray-700"></x-heroicon-o-pencil>
							</div>
						</div>
					</li>
				@empty
					<p class="py-4 text-sm text-center text-gray-500">Nessun impianto inserito</p>
				@endforelse
			</ul>
		</div>
	</x-card>
</div>
