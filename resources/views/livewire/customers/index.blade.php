<x-card>
	<x-card-header>
		<x-slot:title>Anagrafiche</x-slot:title>
		<x-slot:actions>
			@can('customer_create')
				<x-jet-button :href="route('customers.create')">
					<x-heroicon-o-plus class="w-4 h-4"></x-heroicon-o-plus>
				</x-jet-button>
			@endcan
		</x-slot:actions>
	</x-card-header>
	<div class="p-4">
		<ul role="list" class="divide-y divide-gray-200">
			@forelse($customers as $customer)
				<li class="flex items-start justify-between py-4">
					<div>
						<a href="{{ route('customers.show', $customer->id) }}"
						   class="mb-2.5 text-sm font-medium text-indigo-600 cursor-pointer hover:underline">{{ $customer->name }}</a>
					</div>
					<div class="flex items-center space-x-8">
						@can('customer_update')
							<a href="{{ route('customers.edit', $customer->id) }}">
								<x-heroicon-o-pencil
										class="w-4 h-4 text-gray-500 cursor-pointer hover:text-gray-700"></x-heroicon-o-pencil>
							</a>
						@endcan
					</div>
				</li>
			@empty
				<div class="text-center">
					<x-heroicon-o-identification
							class="mx-auto h-12 w-12 text-gray-400"></x-heroicon-o-identification>
					<h3 class="mt-2 text-sm font-medium text-gray-900">Nessuna anagrafica</h3>
					@can('customer_create')
						<p class="mt-1 text-sm text-gray-500">Aggiungine una ora.</p>
						<div class="mt-6">
							<x-jet-button :href="route('customers.create')">
								<x-heroicon-o-plus class="-ml-1 mr-2 h-5 w-5"></x-heroicon-o-plus>
								Aggiungi
							</x-jet-button>
						</div>
					@endcan
				</div>
			@endforelse
		</ul>
	</div>
</x-card>