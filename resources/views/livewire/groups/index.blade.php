<x-card>
	<x-card-header>
		<x-slot:title>Gruppi di appartenenza</x-slot:title>
		<x-slot:actions>
			@can('group_create')
				<x-jet-button wire:click="$emit('openModal', 'groups.create')">
					<x-heroicon-o-plus class="w-4 h-4"></x-heroicon-o-plus>
				</x-jet-button>
			@endcan
		</x-slot:actions>
	</x-card-header>
	<div class="p-4">
		<ul role="list" class="divide-y divide-gray-200">
			@forelse($groups as $group)
				<li class="flex items-start justify-between py-4">
					<div>
						<p class="mb-2.5 text-sm font-medium text-gray-900">{{ $group->name }}</p>
					</div>
					<div class="flex items-center space-x-8">
						@can('group_update')
							<div wire:click="$emit('openModal', 'groups.edit', {{ json_encode(['group' => $group->id]) }})">
								<x-heroicon-o-pencil
										class="w-4 h-4 text-gray-500 cursor-pointer hover:text-gray-700"></x-heroicon-o-pencil>
							</div>
						@endcan
					</div>
				</li>
			@empty
				<div class="text-center">
					<x-heroicon-o-user-group
							class="mx-auto h-12 w-12 text-gray-400"></x-heroicon-o-user-group>
					<h3 class="mt-2 text-sm font-medium text-gray-900">Nessun Gruppo di appartenenza</h3>
					@can('group_create')
						<p class="mt-1 text-sm text-gray-500">Aggiungine uno ora.</p>
						<div class="mt-6">
							<x-jet-button wire:click="$emit('openModal', 'groups.create')">
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