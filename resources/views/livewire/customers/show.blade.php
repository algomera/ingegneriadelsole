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
								<dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
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
			<ul x-data="{open: 0}" role="list" class="divide-y divide-gray-200">
				@forelse($customer->systems as $system)
					<li wire:key="{{$system->id}}" class="pt-4">
						<div x-on:click="open = open === 0 ? {{ $system->id }} : 0"
						     class="group mb-2.5 flex items-center justify-between cursor-pointer">
							<div>
								<p :class="open === {{ $system->id }} ? 'text-indigo-600' : 'text-gray-900'"
								   class="text-sm font-medium group-hover:text-indigo-600 cursor-pointer">
									{{ $system->name }}
								</p>
							</div>
							<template x-if="open === {{ $system->id }}">
								<x-heroicon-o-chevron-up
										class="w-4 h-4 text-gray-500 cursor-pointer hover:text-gray-700"></x-heroicon-o-chevron-up>
							</template>
							<template x-if="open !== {{ $system->id }}">
								<x-heroicon-o-chevron-down
										class="w-4 h-4 text-gray-500 cursor-pointer hover:text-gray-700"></x-heroicon-o-chevron-down>
							</template>

						</div>
						<div x-show="open === {{ $system->id }}">
							<div class="border-t border-gray-200 py-5">
								<dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Potenza</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $system->power }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Censimp</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $system->censimp }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">POD</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $system->pod }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Connessione</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ config('general.system.connections.'.$system->connection) }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Tensione</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $system->tension }}</dd>
									</div>
									<div class="sm:col-span-2">
										<dt class="text-sm font-medium text-gray-500">Via</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $system->street }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Città</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $system->city }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Provincia</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $system->province }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Data allaccio</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $system->connection_date }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Incentivo</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ config('general.system.incentives.'.$system->incentive) }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Vendita</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ config('general.system.sales.'.$system->sale) }}</dd>
									</div>
									<div class="sm:col-span-1">
										<dt class="text-sm font-medium text-gray-500">Codice Ditta</dt>
										<dd class="mt-1 text-sm text-gray-900">{{ $system->company_code }}</dd>
									</div>
									<div class="sm:col-span-2 mt-5 space-y-5">
										<div>
											<h3 class="text-sm font-bold text-gray-800">Misure (M1)</h3>
											@if($system->m_one)
												<dd class="mt-1 text-sm text-gray-900">
													<dl class="grid grid-cols-1 gap-4 sm:grid-cols-2 p-2 border-2">
														<div class="sm:col-span-1">
															<dt class="text-sm font-medium text-gray-500">Marca</dt>
															<dd class="mt-1 text-sm text-gray-900">{{ $system->m_one->brand }}</dd>
														</div>
														<div class="sm:col-span-1">
															<dt class="text-sm font-medium text-gray-500">Matricola</dt>
															<dd class="mt-1 text-sm text-gray-900">{{ $system->m_one->number }}</dd>
														</div>
														<div class="sm:col-span-1">
															<dt class="text-sm font-medium text-gray-500">K</dt>
															<dd class="mt-1 text-sm text-gray-900">{{ $system->m_one->k }}</dd>
														</div>
														<div class="sm:col-span-1">
															<dt class="text-sm font-medium text-gray-500">Telefono</dt>
															<dd class="mt-1 text-sm text-gray-900">{{ $system->m_one->phone }}</dd>
														</div>
													</dl>
												</dd>
											@else
												<p class="py-1 text-sm text-gray-500">Nessun M1 inserito</p>
											@endif
										</div>
										<div>
											<h3 class="text-sm font-bold text-gray-800">Misure (M2)</h3>
											@if($system->m_twos->count() > 0)
												<dd class="mt-1 text-sm text-gray-900 space-y-3">
													@foreach($system->m_twos as $k => $m_two)
														<dl wire:key="m_two-{{ $k }}"
														    class="grid grid-cols-1 gap-4 sm:grid-cols-2 p-2 border-2">
															<div class="sm:col-span-1">
																<dt class="text-sm font-medium text-gray-500">Marca</dt>
																<dd class="mt-1 text-sm text-gray-900">{{ $m_two->brand }}</dd>
															</div>
															<div class="sm:col-span-1">
																<dt class="text-sm font-medium text-gray-500">
																	Matricola
																</dt>
																<dd class="mt-1 text-sm text-gray-900">{{ $m_two->number }}</dd>
															</div>
															<div class="sm:col-span-1">
																<dt class="text-sm font-medium text-gray-500">K</dt>
																<dd class="mt-1 text-sm text-gray-900">{{ $m_two->k }}</dd>
															</div>
															<div class="sm:col-span-1">
																<dt class="text-sm font-medium text-gray-500">Telefono
																</dt>
																<dd class="mt-1 text-sm text-gray-900">{{ $m_two->phone }}</dd>
															</div>
														</dl>
													@endforeach
												</dd>
											@else
												<p class="py-1 text-sm text-gray-500">Nessun M2 inserito</p>
											@endif
										</div>
									</div>
								</dl>
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
