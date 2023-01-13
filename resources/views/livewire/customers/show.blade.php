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
				@foreach($customer->systems as $system)
					<li class="py-4">
						{{ $system->name }}
					</li>
				@endforeach
			</ul>
		</div>
	</x-card>
</div>
