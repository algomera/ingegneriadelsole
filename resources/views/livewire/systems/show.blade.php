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
							@if(count($system->m_twos) > 0)
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
											<x-select wire:model="section_adm.declaration"
											          for="section_adm.declaration">
												<option value="" selected>Seleziona</option>
												@foreach(config('general.system.sections.adm.declaration') as $k => $label)
													<option wire:key="adm-declaration-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Registro</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="section_adm.register" for="section_adm.register">
												<option value="" selected>Seleziona</option>
												@foreach(config('general.system.sections.adm.register') as $k => $label)
													<option wire:key="adm-register-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
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
													wire:model.defer="section_adm.verification_execution_date"
													for="section_adm.verification_execution_date" type="date"
													label="Data di esecuzione"></x-jet-input>
										</div>
									</div>
								</div>
								<div class="mt-1 sm:col-span-1 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-jet-input
													wire:model.defer="section_adm.verification_expiration_date"
													for="section_adm.verification_expiration_date" type="date"
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
											<x-textarea wire:model.defer="section_adm.note"></x-textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="border-t border-gray-200 bg-white pt-5 rounded-b-xl">
								<div class="-ml-4 -mt-2 flex flex-wrap items-center justify-end sm:flex-nowrap">
									<div class="ml-4 mt-2 flex-shrink-0">
										<x-jet-button wire:click="save('adm')">Salva</x-jet-button>
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
											<x-select wire:model="section_arera.contribution"
											          for="section_arera.contribution">
												<option value="" selected>Seleziona</option>
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
											<x-select wire:model="section_arera.investigation"
											          for="section_arera.investigation">
												<option value="" selected>Seleziona</option>
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
											<x-select wire:model="section_arera.unbundling"
											          for="section_arera.unbundling">
												<option value="" selected>Seleziona</option>
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
											<x-textarea wire:model.defer="section_arera.note"></x-textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="border-t border-gray-200 bg-white pt-5 rounded-b-xl">
								<div class="-ml-4 -mt-2 flex flex-wrap items-center justify-end sm:flex-nowrap">
									<div class="ml-4 mt-2 flex-shrink-0">
										<x-jet-button wire:click="save('arera')">Salva</x-jet-button>
									</div>
								</div>
							</div>
						</div>
						@break
					@case('e_distribuzione')
						<div wire:key="section_e_distribuzione" class="space-y-6 sm:space-y-5">
							<h3 class="font-bold">Connessioni</h3>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Documenti</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="section_e_distribuzione.documents"
											          for="section_e_distribuzione.documents">
												<option value="" selected>Seleziona</option>
												@foreach(config('general.system.sections.e_distribuzione.documents') as $k => $label)
													<option wire:key="e_distribuzione-documents-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Domanda</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="section_e_distribuzione.question"
											          for="section_e_distribuzione.question">
												<option value="" selected>Seleziona</option>
												@foreach(config('general.system.sections.e_distribuzione.question') as $k => $label)
													<option wire:key="e_distribuzione-question-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Preventivo</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="section_e_distribuzione.quotation"
											          for="section_e_distribuzione.quotation">
												<option value="" selected>Seleziona</option>
												@foreach(config('general.system.sections.e_distribuzione.quotation') as $k => $label)
													<option wire:key="e_distribuzione-quotation-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Inizio Iter</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="section_e_distribuzione.start_of_process"
											          for="section_e_distribuzione.start_of_process">
												<option value="" selected>Seleziona</option>
												@foreach(config('general.system.sections.e_distribuzione.start_of_process') as $k => $label)
													<option wire:key="e_distribuzione-start_of_process-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Fine Iter</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="section_e_distribuzione.end_of_process"
											          for="section_e_distribuzione.end_of_process">
												<option value="" selected>Seleziona</option>
												@foreach(config('general.system.sections.e_distribuzione.end_of_process') as $k => $label)
													<option wire:key="e_distribuzione-end_of_process-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Inizio Lavori</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="section_e_distribuzione.start_of_work"
											          for="section_e_distribuzione.start_of_work">
												<option value="" selected>Seleziona</option>
												@foreach(config('general.system.sections.e_distribuzione.start_of_work') as $k => $label)
													<option wire:key="e_distribuzione-start_of_work-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Fine Lavori</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="section_e_distribuzione.end_of_work"
											          for="section_e_distribuzione.end_of_work">
												<option value="" selected>Seleziona</option>
												@foreach(config('general.system.sections.e_distribuzione.end_of_work') as $k => $label)
													<option wire:key="e_distribuzione-end_of_work-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Censimp</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="section_e_distribuzione.censimp"
											          for="section_e_distribuzione.censimp">
												<option value="" selected>Seleziona</option>
												@foreach(config('general.system.sections.e_distribuzione.censimp') as $k => $label)
													<option wire:key="e_distribuzione-censimp-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">RdE</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="section_e_distribuzione.rde"
											          for="section_e_distribuzione.rde">
												<option value="" selected>Seleziona</option>
												@foreach(config('general.system.sections.e_distribuzione.rde') as $k => $label)
													<option wire:key="e_distribuzione-rde-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Scheda Apparato Misura</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="section_e_distribuzione.measurement_card"
											          for="section_e_distribuzione.measurement_card">
												<option value="" selected>Seleziona</option>
												@foreach(config('general.system.sections.e_distribuzione.measurement_card') as $k => $label)
													<option wire:key="e_distribuzione-measurement_card-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Attivazione</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="section_e_distribuzione.activation"
											          for="section_e_distribuzione.activation">
												<option value="" selected>Seleziona</option>
												@foreach(config('general.system.sections.e_distribuzione.activation') as $k => $label)
													<option wire:key="e_distribuzione-activation-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">GSE</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="section_e_distribuzione.gse"
											          for="section_e_distribuzione.gse">
												<option value="" selected>Seleziona</option>
												@foreach(config('general.system.sections.e_distribuzione.gse') as $k => $label)
													<option wire:key="e_distribuzione-gse-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Connessione</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="section_e_distribuzione.connection"
											          for="section_e_distribuzione.connection">
												<option value="" selected>Seleziona</option>
												@foreach(config('general.system.sections.e_distribuzione.connection') as $k => $label)
													<option wire:key="e_distribuzione-connection-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Tipo Impianto</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="section_e_distribuzione.system_type"
											          for="section_e_distribuzione.system_type">
												<option value="" selected>Seleziona</option>
												@foreach(config('general.system.sections.e_distribuzione.system_type') as $k => $label)
													<option wire:key="e_distribuzione-system_type-{{ $k }}"
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
											<x-textarea
													wire:model.defer="section_e_distribuzione.connections_note"></x-textarea>
										</div>
									</div>
								</div>
							</div>
							<h3 class="font-bold">Adeguamenti</h3>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">SPI
								</x-jet-label>
								<div class="mt-1 sm:col-span-1 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-jet-input
													wire:model.defer="section_e_distribuzione.spi_execution_date"
													for="section_e_distribuzione.spi_execution_date" type="date"
													label="Data di esecuzione"></x-jet-input>
										</div>
									</div>
								</div>
								<div class="mt-1 sm:col-span-1 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-jet-input
													wire:model.defer="section_e_distribuzione.spi_expiration_date"
													for="section_e_distribuzione.spi_expiration_date" type="date"
													label="Data di scadenza"></x-jet-input>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">SPG
								</x-jet-label>
								<div class="mt-1 sm:col-span-1 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-jet-input
													wire:model.defer="section_e_distribuzione.spg_execution_date"
													for="section_e_distribuzione.spg_execution_date" type="date"
													label="Data di esecuzione"></x-jet-input>
										</div>
									</div>
								</div>
								<div class="mt-1 sm:col-span-1 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-jet-input
													wire:model.defer="section_e_distribuzione.spg_expiration_date"
													for="section_e_distribuzione.spg_expiration_date" type="date"
													label="Data di scadenza"></x-jet-input>
										</div>
									</div>
								</div>
							</div>
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Verifica di Terra
								</x-jet-label>
								<div class="mt-1 sm:col-span-1 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-jet-input
													wire:model.defer="section_e_distribuzione.ground_verification_execution_date"
													for="section_e_distribuzione.ground_verification_execution_date"
													type="date"
													label="Data di esecuzione"></x-jet-input>
										</div>
									</div>
								</div>
								<div class="mt-1 sm:col-span-1 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-jet-input
													wire:model.defer="section_e_distribuzione.ground_verification_expiration_date"
													for="section_e_distribuzione.ground_verification_expiration_date"
													type="date"
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
											<x-textarea
													wire:model.defer="section_e_distribuzione.adjustments_note"></x-textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="border-t border-gray-200 bg-white pt-5 rounded-b-xl">
								<div class="-ml-4 -mt-2 flex flex-wrap items-center justify-end sm:flex-nowrap">
									<div class="ml-4 mt-2 flex-shrink-0">
										<x-jet-button wire:click="save('e_distribuzione')">Salva</x-jet-button>
									</div>
								</div>
							</div>
						</div>
						@break
					@case('gse')
						<div wire:key="section_gse" class="space-y-6 sm:space-y-5">
							@if($system->fuel_mix)
								<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
									<x-jet-label class="self-center font-bold">Fuel Mix</x-jet-label>
									<div class="mt-1 sm:col-span-2 sm:mt-0">
										<div class="flex max-w-lg">
											<div class="w-full">
												<x-select wire:model="section_gse.fuel_mix"
												          for="section_gse.fuel_mix">
													<option value="" selected>Seleziona</option>
													@foreach(config('general.system.sections.gse.fuel_mix') as $k => $label)
														<option wire:key="gse-fuel_mix-{{ $k }}"
														        value="{{ $k }}">{{ $label }}</option>
													@endforeach
												</x-select>
											</div>
										</div>
									</div>
								</div>
							@endif
							@if($system->antimafia)
								<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
									<x-jet-label class="self-center font-bold">Antimafia</x-jet-label>
									<div class="mt-1 sm:col-span-2 sm:mt-0">
										<div class="flex max-w-lg">
											<div class="w-full">
												<x-select wire:model="section_gse.antimafia"
												          for="section_gse.antimafia">
													<option value="" selected>Seleziona</option>
													@foreach(config('general.system.sections.gse.antimafia') as $k => $label)
														<option wire:key="gse-antimafia-{{ $k }}"
														        value="{{ $k }}">{{ $label }}</option>
													@endforeach
												</x-select>
											</div>
										</div>
									</div>
								</div>
							@endif
							@if($system->invoices)
								<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
									<h3 class="text-sm font-bold text-gray-700">Fatture</h3>
									<div class="space-y-3 col-span-2">
										<div class="mt-1 sm:col-span-2 sm:mt-0">
											<div class="flex max-w-lg">
												<div class="w-full">
													<x-select wire:model="section_gse.invoice_january"
													          for="section_gse.invoice_january" label="Gennaio">
														<option value="" selected>Seleziona</option>
														@foreach(config('general.system.sections.gse.invoices') as $k => $label)
															<option wire:key="gse-invoice_january-{{ $k }}"
															        value="{{ $k }}">{{ $label }}</option>
														@endforeach
													</x-select>
												</div>
											</div>
										</div>
										<div class="mt-1 sm:col-span-2 sm:mt-0">
											<div class="flex max-w-lg">
												<div class="w-full">
													<x-select wire:model="section_gse.invoice_february"
													          for="section_gse.invoice_february" label="Febbraio">
														<option value="" selected>Seleziona</option>
														@foreach(config('general.system.sections.gse.invoices') as $k => $label)
															<option wire:key="gse-invoice_february-{{ $k }}"
															        value="{{ $k }}">{{ $label }}</option>
														@endforeach
													</x-select>
												</div>
											</div>
										</div>
										<div class="mt-1 sm:col-span-2 sm:mt-0">
											<div class="flex max-w-lg">
												<div class="w-full">
													<x-select wire:model="section_gse.invoice_march"
													          for="section_gse.invoice_march" label="Marzo">
														<option value="" selected>Seleziona</option>
														@foreach(config('general.system.sections.gse.invoices') as $k => $label)
															<option wire:key="gse-invoice_march-{{ $k }}"
															        value="{{ $k }}">{{ $label }}</option>
														@endforeach
													</x-select>
												</div>
											</div>
										</div>
										<div class="mt-1 sm:col-span-2 sm:mt-0">
											<div class="flex max-w-lg">
												<div class="w-full">
													<x-select wire:model="section_gse.invoice_april"
													          for="section_gse.invoice_april" label="Aprile">
														<option value="" selected>Seleziona</option>
														@foreach(config('general.system.sections.gse.invoices') as $k => $label)
															<option wire:key="gse-invoice_april-{{ $k }}"
															        value="{{ $k }}">{{ $label }}</option>
														@endforeach
													</x-select>
												</div>
											</div>
										</div>
										<div class="mt-1 sm:col-span-2 sm:mt-0">
											<div class="flex max-w-lg">
												<div class="w-full">
													<x-select wire:model="section_gse.invoice_may"
													          for="section_gse.invoice_may" label="Maggio">
														<option value="" selected>Seleziona</option>
														@foreach(config('general.system.sections.gse.invoices') as $k => $label)
															<option wire:key="gse-invoice_may-{{ $k }}"
															        value="{{ $k }}">{{ $label }}</option>
														@endforeach
													</x-select>
												</div>
											</div>
										</div>
										<div class="mt-1 sm:col-span-2 sm:mt-0">
											<div class="flex max-w-lg">
												<div class="w-full">
													<x-select wire:model="section_gse.invoice_june"
													          for="section_gse.invoice_june" label="Giugno">
														<option value="" selected>Seleziona</option>
														@foreach(config('general.system.sections.gse.invoices') as $k => $label)
															<option wire:key="gse-invoice_june-{{ $k }}"
															        value="{{ $k }}">{{ $label }}</option>
														@endforeach
													</x-select>
												</div>
											</div>
										</div>
										<div class="mt-1 sm:col-span-2 sm:mt-0">
											<div class="flex max-w-lg">
												<div class="w-full">
													<x-select wire:model="section_gse.invoice_july"
													          for="section_gse.invoice_july" label="Luglio">
														<option value="" selected>Seleziona</option>
														@foreach(config('general.system.sections.gse.invoices') as $k => $label)
															<option wire:key="gse-invoice_july-{{ $k }}"
															        value="{{ $k }}">{{ $label }}</option>
														@endforeach
													</x-select>
												</div>
											</div>
										</div>
										<div class="mt-1 sm:col-span-2 sm:mt-0">
											<div class="flex max-w-lg">
												<div class="w-full">
													<x-select wire:model="section_gse.invoice_august"
													          for="section_gse.invoice_august" label="Agosto">
														<option value="" selected>Seleziona</option>
														@foreach(config('general.system.sections.gse.invoices') as $k => $label)
															<option wire:key="gse-invoice_august-{{ $k }}"
															        value="{{ $k }}">{{ $label }}</option>
														@endforeach
													</x-select>
												</div>
											</div>
										</div>
										<div class="mt-1 sm:col-span-2 sm:mt-0">
											<div class="flex max-w-lg">
												<div class="w-full">
													<x-select wire:model="section_gse.invoice_september"
													          for="section_gse.invoice_september" label="Settembre">
														<option value="" selected>Seleziona</option>
														@foreach(config('general.system.sections.gse.invoices') as $k => $label)
															<option wire:key="gse-invoice_september-{{ $k }}"
															        value="{{ $k }}">{{ $label }}</option>
														@endforeach
													</x-select>
												</div>
											</div>
										</div>
										<div class="mt-1 sm:col-span-2 sm:mt-0">
											<div class="flex max-w-lg">
												<div class="w-full">
													<x-select wire:model="section_gse.invoice_october"
													          for="section_gse.invoice_october" label="Ottobre">
														<option value="" selected>Seleziona</option>
														@foreach(config('general.system.sections.gse.invoices') as $k => $label)
															<option wire:key="gse-invoice_october-{{ $k }}"
															        value="{{ $k }}">{{ $label }}</option>
														@endforeach
													</x-select>
												</div>
											</div>
										</div>
										<div class="mt-1 sm:col-span-2 sm:mt-0">
											<div class="flex max-w-lg">
												<div class="w-full">
													<x-select wire:model="section_gse.invoice_november"
													          for="section_gse.invoice_november" label="Novembre">
														<option value="" selected>Seleziona</option>
														@foreach(config('general.system.sections.gse.invoices') as $k => $label)
															<option wire:key="gse-invoice_november-{{ $k }}"
															        value="{{ $k }}">{{ $label }}</option>
														@endforeach
													</x-select>
												</div>
											</div>
										</div>
										<div class="mt-1 sm:col-span-2 sm:mt-0">
											<div class="flex max-w-lg">
												<div class="w-full">
													<x-select wire:model="section_gse.invoice_december"
													          for="section_gse.invoice_december" label="Dicembre">
														<option value="" selected>Seleziona</option>
														@foreach(config('general.system.sections.gse.invoices') as $k => $label)
															<option wire:key="gse-invoice_december-{{ $k }}"
															        value="{{ $k }}">{{ $label }}</option>
														@endforeach
													</x-select>
												</div>
											</div>
										</div>
									</div>
								</div>
							@endif
							@if($system->seu)
								<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
									<x-jet-label class="self-center font-bold">SEU</x-jet-label>
									<div class="mt-1 sm:col-span-2 sm:mt-0">
										<div class="flex max-w-lg">
											<div class="w-full">
												<x-select wire:model="section_gse.seu"
												          for="section_gse.seu">
													<option value="" selected>Seleziona</option>
													@foreach(config('general.system.sections.gse.seu') as $k => $label)
														<option wire:key="gse-seu-{{ $k }}"
														        value="{{ $k }}">{{ $label }}</option>
													@endforeach
												</x-select>
											</div>
										</div>
									</div>
								</div>
							@endif
							<div class="border-t border-gray-200 bg-white pt-5 rounded-b-xl">
								<div class="-ml-4 -mt-2 flex flex-wrap items-center justify-end sm:flex-nowrap">
									<div class="ml-4 mt-2 flex-shrink-0">
										<x-jet-button wire:click="save('gse')">Salva</x-jet-button>
									</div>
								</div>
							</div>
						</div>
						@break
					@case('terna')
						<div wire:key="section_terna" class="space-y-6 sm:space-y-5">
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">GSTAT</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="section_terna.gstat"
											          for="section_terna.gstat">
												<option value="" selected>Seleziona</option>
												@foreach(config('general.system.sections.terna.gstat') as $k => $label)
													<option wire:key="terna-gstat-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="border-t border-gray-200 bg-white pt-5 rounded-b-xl">
								<div class="-ml-4 -mt-2 flex flex-wrap items-center justify-end sm:flex-nowrap">
									<div class="ml-4 mt-2 flex-shrink-0">
										<x-jet-button wire:click="save('terna')">Salva</x-jet-button>
									</div>
								</div>
							</div>
						</div>
						@break
					@case('reconciliation')
						<div wire:key="section_reconciliation" class="space-y-6 sm:space-y-5">
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Riconciliazione</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-select wire:model="section_reconciliation.reconciliation"
											          for="section_reconciliation.reconciliation">
												<option value="" selected>Seleziona</option>
												@foreach(config('general.system.sections.reconciliation.reconciliation') as $k => $label)
													<option wire:key="reconciliation-reconciliation-{{ $k }}"
													        value="{{ $k }}">{{ $label }}</option>
												@endforeach
											</x-select>
										</div>
									</div>
								</div>
							</div>
							<div class="border-t border-gray-200 bg-white pt-5 rounded-b-xl">
								<div class="-ml-4 -mt-2 flex flex-wrap items-center justify-end sm:flex-nowrap">
									<div class="ml-4 mt-2 flex-shrink-0">
										<x-jet-button wire:click="save('reconciliation')">Salva</x-jet-button>
									</div>
								</div>
							</div>
						</div>
						@break
					@case('maintenance')
						<div wire:key="section_maintenance" class="space-y-6 sm:space-y-5">
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Note aggiuntive
								</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-textarea wire:model.defer="section_maintenance.note"></x-textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="border-t border-gray-200 bg-white pt-5 rounded-b-xl">
								<div class="-ml-4 -mt-2 flex flex-wrap items-center justify-end sm:flex-nowrap">
									<div class="ml-4 mt-2 flex-shrink-0">
										<x-jet-button wire:click="save('maintenance')">Salva</x-jet-button>
									</div>
								</div>
							</div>
						</div>
						@break
					@case('ceo_management')
						<div wire:key="section_ceo_management" class="space-y-6 sm:space-y-5">
							<div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
								<x-jet-label class="self-center font-bold">Note aggiuntive
								</x-jet-label>
								<div class="mt-1 sm:col-span-2 sm:mt-0">
									<div class="flex max-w-lg">
										<div class="w-full">
											<x-textarea wire:model.defer="section_ceo_management.note"></x-textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="border-t border-gray-200 bg-white pt-5 rounded-b-xl">
								<div class="-ml-4 -mt-2 flex flex-wrap items-center justify-end sm:flex-nowrap">
									<div class="ml-4 mt-2 flex-shrink-0">
										<x-jet-button wire:click="save('ceo_management')">Salva</x-jet-button>
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
</x-card>