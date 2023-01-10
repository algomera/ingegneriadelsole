<x-card>
	<x-card-header>
		<x-slot:title>Anagrafiche</x-slot:title>
		<x-slot:actions>
			<x-jet-button :href="route('customers.create')">
				<x-heroicon-o-plus class="w-4 h-4"></x-heroicon-o-plus>
			</x-jet-button>
		</x-slot:actions>
	</x-card-header>
	<div class="p-4">
		@foreach($customers as $customer)
			<a href="{{ route('customers.show', $customer->id) }}" class="block">{{ $customer->name }}</a>
		@endforeach
	</div>
</x-card>