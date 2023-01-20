<div class="space-y-5">
	<x-card>
		<x-card-header>
			<x-slot:title>{{ $customer->name }}</x-slot:title>
		</x-card-header>
		<div class="p-4 space-y-4">
			<div>
				<div class="lg:hidden">
					<label for="tabs" class="sr-only">Select a tab</label>
					<select wire:model="currentTab" id="tabs" name="tabs"
					        class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
						@foreach($tabs as $k => $tab)
							<option wire:key="tab-{{ $k }}" value="{{ $k }}">{{ $tab['label'] }}</option>
						@endforeach
					</select>
				</div>
				<div class="hidden lg:block">
					<nav class="flex space-x-4" aria-label="Tabs">
						@foreach($tabs as $k => $tab)
							<span wire:click="$set('currentTab', '{{ $k }}')" @class([
        							'bg-gray-100 text-gray-700 px-3 py-2 font-medium text-xs rounded-md' => $currentTab === $k,
						        	'text-gray-500 hover:text-gray-700 px-3 py-2 font-medium text-xs rounded-md cursor-pointer' => $currentTab !== $k
								])>{{ $tab['label'] }}</span>
						@endforeach
					</nav>
				</div>
			</div>
			<div>
				@switch($currentTab)
					@case('general_informations')
						<div wire:key="general_informations">
							<div class="border-t border-gray-200 py-5">
								<dl class="grid grid-cols-1 gap-7 sm:grid-cols-2">
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Denominazione</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->name ?: '-' }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Gruppo di appartenenza</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->group->name ?: '-' }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Mandatario</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->agent ? 'Si' : 'No' }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Tipologia</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ config('general.customer.types.' . $customer->type) }}</dd>
									</div>
								</dl>
							</div>
						</div>
						@break
					@case('contact_informations')
						<div wire:key="contact_informations">
							<div class="border-t border-gray-200 py-5">
								<dl class="grid grid-cols-1 gap-7 sm:grid-cols-2">
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">PEC</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->pec ?: '-' }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Email notifiche</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->notification_email ?: '-' }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Partita IVA</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->vat_number ?: '-' }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Codice Fiscale</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->fiscal_code ?: '-' }}</dd>
									</div>
								</dl>
							</div>
						</div>
						@break
					@case('referent')
						<div wire:key="referent">
							<div class="border-t border-gray-200 py-5">
								<dl class="grid grid-cols-1 gap-7 sm:grid-cols-2">
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Nome</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->referent->first_name ?: '-' }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Cognome</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->referent->last_name ?: '-' }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Email</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->referent->email ?: '-' }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Telefono</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->referent->phone ?: '-' }}</dd>
									</div>
								</dl>
							</div>
						</div>
						@break
					@case('headquarter')
						<div wire:key="headquarter">
							<div class="border-t border-gray-200 py-5">
								<dl class="grid grid-cols-1 gap-7 sm:grid-cols-2">
									<div class="sm:col-span-2">
										<dt class="text-sm font-medium text-gray-500">Via</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->headquarter->street ?: '-' }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Città</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->headquarter->city ?: '-' }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Provincia</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->headquarter->province ?: '-' }}</dd>
									</div>
								</dl>
							</div>
						</div>
						@break
					@case('legal_representative')
						<div wire:key="legal_representative">
							<div class="border-t border-gray-200 py-5">
								<dl class="grid grid-cols-1 gap-7 sm:grid-cols-2">
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Nome</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->legal_representative->first_name ?: '-' }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Cognome</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->legal_representative->last_name ?: '-' }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Codice Fiscale</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->legal_representative->fiscal_code ?: '-' }}</dd>
									</div>
									<div class="sm:col-span-2">
										<dt class="text-sm font-medium text-gray-500">Via</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->legal_representative->street ?: '-' }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Città</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->legal_representative->city ?: '-' }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Provincia</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $customer->legal_representative->province ?: '-' }}</dd>
									</div>
								</dl>
							</div>
						</div>
						@break
					@case('credentials')
						<div wire:key="credentials">
							<div class="border-t border-gray-200 py-5">
								<ul role="list" class="divide-y divide-gray-200">
									@foreach($customer->credentials as $credential)
										<li class="flex items-start justify-between py-4">
											<div x-data="{show: false}">
												<p class="mb-2.5 text-sm font-medium text-gray-900">{{ $credential->service }}</p>
												<p class="mb-0.5 text-sm text-gray-500">Username:
													<strong>{{ $credential->username }}</strong></p>
												<div class="flex space-x-1 text-sm text-gray-500">
													<span>Password:</span>
													<div x-on:click="show = true" x-show="!show"
													     class="flex items-center justify-center text-xs border border-gray-300 px-1 rounded">
														<x-heroicon-o-eye class="w-3 h-3"></x-heroicon-o-eye>
													</div>
													<div x-on:click="show = false" x-show="show"
													     class="flex items-center justify-center text-xs border border-gray-300 px-1 rounded">
														<x-heroicon-o-eye-slash
																class="w-3 h-3"></x-heroicon-o-eye-slash>
													</div>
													<strong x-show="show">{{ $credential->password }}</strong>
												</div>
											</div>
										</li>
									@endforeach
								</ul>
							</div>
						</div>
						@break
					@case('notes')
						<div class="border-t border-gray-200 py-5">
							<dl class="grid grid-cols-1 gap-7 sm:grid-cols-2">
								<div class="sm:col-span-1">
									<dt class="text-sm font-medium text-gray-500">Note</dt>
									<dd class="mt-1 text-sm text-gray-900">{{ $customer->note ?: '-' }}</dd>
								</div>
							</dl>
						</div>
						@break
				@endswitch
			</div>
		</div>
	</x-card>
	<x-card>
		<x-card-header>
			<x-slot:title>Impianti</x-slot:title>
		</x-card-header>
		<div class="p-4">
			<ul role="list" class="divide-y divide-gray-200">
				@forelse($customer->systems as $system)
					<li class="flex items-start justify-between py-4">
						<div>
							<a href="{{ route('customers.systems.show', [$customer->id, $system->id]) }}"
							   class="mb-2.5 text-sm font-medium text-indigo-600 cursor-pointer hover:underline">{{ $system->name }}</a>
						</div>
					</li>
				@empty
					<p class="py-4 text-sm text-center text-gray-500">Nessun impianto inserito</p>
				@endforelse
			</ul>
		</div>
	</x-card>
</div>
