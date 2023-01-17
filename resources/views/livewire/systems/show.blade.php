<x-card>
	<x-card-header>
		<x-slot:title>
			<h3>{{ $customer->name }}</h3>
			<h5 class="text-sm text-gray-500">{{ $system->name }}</h5>
		</x-slot:title>
	</x-card-header>
	<div class="p-4 divide-y">
		<div class="pb-4">
			<div class="lg:hidden">
				<label for="tabs" class="sr-only">Select a tab</label>
				<select wire:model="currentTab" id="tabs" name="tabs"
				        class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
					@foreach($tabs as $tab)
						<option wire:key="tab-{{ $tab['id'] }}" value="{{ $tab['id'] }}"
						        @if(!$this->system[$tab['id']]) disabled @endif>{{ $tab['label'] }}</option>
					@endforeach
				</select>
			</div>
			<div class="hidden lg:block">
				<nav class="flex space-x-4" aria-label="Tabs">
					@foreach($tabs as $tab)
						<span wire:key="mobile-tab-{{ $tab['id'] }}"
						      @if($this->system[$tab['id']]) wire:click="$set('currentTab', '{{ $tab['id'] }}')" @endif @class([
        						'px-3 py-2 font-medium text-sm rounded-md',
        						'bg-gray-100 text-gray-700' => $currentTab === $tab['id'],
        						'text-gray-500 hover:text-gray-700 cursor-pointer' => $currentTab !== $tab['id'],
        						'opacity-30 hover:!text-gray-500 hover:cursor-not-allowed' => !$this->system[$tab['id']]
							])>{{ $tab['label'] }}</span>
					@endforeach
				</nav>
			</div>
		</div>
		<div class="pt-4">
			<div class="space-y-2">
				@switch($currentTab)
					@case('adm')
						<div wire:key="section_adm" class="space-y-6 sm:space-y-5">
							@if($system->m_one)
								<div wire:key="adm_m_one">
									<h3 class="text-sm font-bold">Misure (M1)</h3>
									<div class="divide-y">
										<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 py-2">
											<x-jet-label>
												{{ $system->m_one->number }}
											</x-jet-label>
											<div class="mt-1 sm:col-span-2 sm:mt-0">
												<div class="flex max-w-lg">
													<div class="w-full">
														<div class="flex items-center space-x-2">
															<x-jet-checkbox wire:model="system.m_one.telemetering"
															                id="system.m_one.telemetering"></x-jet-checkbox>
															<x-jet-label for="system.m_one.telemetering">
																Telelettura
															</x-jet-label>
														</div>
														@if($system->m_one->telemetering)
															<div class="mt-2 space-y-2">
																<x-jet-input wire:model="system.m_one.operator"
																             type="text" for="system.m_one.operator"
																             label="Operatore"></x-jet-input>
																<x-select wire:model="system.m_one.customer"
																          for="system.m_one.customer" label="Cliente">
																	<option value="nessun_dato">Nessun Dato</option>
																	<option value="gse">Gse</option>
																	<option value="e_distribuzione">E-Distribuzione
																	</option>
																</x-select>
															</div>
														@endif
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							@endif
							@if($system->m_twos)
								<div wire:key="adm_m_twos">
									<h3 class="text-sm font-bold">Misure (M2)</h3>
									<div class="divide-y">
										@foreach($system->m_twos as $k => $m_two)
											<div wire:key="m_two-{{ $k }}"
											     class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 py-2">
												<x-jet-label>
													{{ $m_two->number }}
												</x-jet-label>
												<div class="mt-1 sm:col-span-2 sm:mt-0">
													<div class="flex max-w-lg">
														<div class="w-full">
															<div wire:click="updateSystemMTwoTelemetering({{ $m_two->id }})"
															     class="flex items-center space-x-2">
																<x-jet-checkbox
																		wire:model="system.m_twos.{{$k}}.telemetering"
																		id="system.m_twos.{{$k}}.telemetering"></x-jet-checkbox>
																<x-jet-label for="system.m_twos.{{$k}}.telemetering">
																	Telelettura
																</x-jet-label>
																<x-jet-input-error
																		for="system.m_twos.{{$k}}.telemetering"></x-jet-input-error>
															</div>
															@if($m_two->telemetering)
																<div class="mt-2 space-y-2">
																	<x-jet-input
																			wire:model="system.m_twos.{{$k}}.operator"
																			type="text"
																			for="system.m_twos.{{$k}}.operator"
																			label="Operatore"></x-jet-input>
																	<x-select wire:model="system.m_twos.{{$k}}.customer"
																	          for="system.m_twos.{{$k}}.customer"
																	          label="Cliente">
																		<option value="nessun_dato">Nessun Dato</option>
																		<option value="gse">Gse</option>
																		<option value="e_distribuzione">E-Distribuzione
																		</option>
																	</x-select>
																</div>
															@endif
														</div>
													</div>
												</div>
											</div>
										@endforeach
									</div>
								</div>
							@endif
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Dichiarazione
								</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="system.section_adm.declaration">
												<option value="null" selected>Seleziona</option>
												@foreach(config('general.system.sections.adm.declaration') as $k => $label)
													<option wire:key="adm-declaration-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
											<x-jet-input-error for="system.section_adm.declaration"></x-jet-input-error>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Registro</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="system.section_adm.register">
												<option value="null" selected>Seleziona</option>
												@foreach(config('general.system.sections.adm.register') as $k => $label)
													<option wire:key="adm-register-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
											<x-jet-input-error for="system.section_adm.register"></x-jet-input-error>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Verifica misuratori
								</x-jet-label>
								<div class="mt-1 sm:col-span-1 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-jet-input
													wire:model.defer="system.section_adm.verification_execution_date"
													for="system.section_adm.verification_execution_date" type="date"
													label="Data di esecuzione"></x-jet-input>
										</div>
									</div>
								</div>
								<div class="mt-1 sm:col-span-1 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-jet-input
													wire:model.defer="system.section_adm.verification_expiration_date"
													for="system.section_adm.verification_expiration_date" type="date"
													label="Data di scadenza"></x-jet-input>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Note aggiuntive
								</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-textarea wire:model.defer="system.section_adm.note"></x-textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						@break
					@case('arera')
						<div wire:key="section_arera" class="space-y-6 sm:space-y-5">
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Contributo</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="system.section_arera.contribution">
												<option value="null" selected>Seleziona</option>
												@foreach(config('general.system.sections.arera.contribution') as $k => $label)
													<option wire:key="arera-contribution-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Indagine</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="system.section_arera.investigation">
												<option value="null" selected>Seleziona</option>
												@foreach(config('general.system.sections.arera.investigation') as $k => $label)
													<option wire:key="arera-investigation-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Unbundling</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="system.section_arera.unbundling">
												<option value="null" selected>Seleziona</option>
												@foreach(config('general.system.sections.arera.unbundling') as $k => $label)
													<option wire:key="arera-unbundling-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Note aggiuntive
								</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-textarea wire:model.defer="system.section_arera.note"></x-textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						@break
					@case(null)
						<p class="text-sm text-center text-gray-500 py-5">
							Nessuna sezione disponibile per questo impianto.
						</p>
						@break
				@endswitch
			</div>
		</div>
	</div>
	@if($currentTab)
		<x-card-footer>
			<x-slot:right_actions>
				<x-jet-button wire:click="save">Salva</x-jet-button>
			</x-slot:right_actions>
		</x-card-footer>
	@endif
</x-card>