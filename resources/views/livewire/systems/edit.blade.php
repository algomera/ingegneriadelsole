<x-card>
	<x-card-header>
		<x-slot:title>Impianto {{ $system->number }}</x-slot:title>
	</x-card-header>
	<div class="p-4 space-y-6">
		<nav aria-label="Progress">
			<ol role="list" class="space-y-0 flex justify-around md:space-x-8">
				@foreach($steps as $k => $step)
					<li class="md:flex-1">
						<!-- Completed Step -->
						<div @class([
        						'flex flex-col border-t-4 border-indigo-600 py-2 px-2 md:border-l-0 md:border-t-4 md:pl-0 md:pt-4 md:pb-0' => $currentStep === $k,
        						'group flex flex-col border-t-4 border-indigo-600 py-2 px-2 hover:border-indigo-800 md:border-l-0 md:border-t-4 md:pl-0 md:pt-4 md:pb-0' => $currentStep >= $k,
        						'group flex flex-col border-t-4 border-gray-200 py-2 px-2 hover:border-gray-300 md:border-l-0 md:border-t-4 md:pl-0 md:pt-4 md:pb-0' => $currentStep <= $k,
        					])>
							<span class="text-sm font-medium text-indigo-600 group-hover:text-indigo-800">{{ $step['label'] }}</span>
							<span class="hidden text-sm font-medium md:block">{{ $step['description'] }}</span>
						</div>
					</li>
				@endforeach
			</ol>
		</nav>

		@if($currentStep === 1)
			<div class="grid grid-cols-3 gap-6">
				<div class="col-span-3">
					<x-jet-input wire:model.defer="system.name" type="text" for="name" label="Nome impianto"></x-jet-input>
				</div>
				<div class="col-span-1">
					<x-jet-input wire:model.defer="system.power" type="text" for="power" label="Potenza"></x-jet-input>
				</div>
				<div class="col-span-1">
					<x-jet-input wire:model.defer="system.censimp" type="text" for="censimp" label="Censimp"></x-jet-input>
				</div>
				<div class="col-span-1">
					<x-jet-input wire:model.defer="system.pod" type="text" for="pod" label="POD"></x-jet-input>
				</div>
				<div class="col-span-3">
					<x-select wire:model="connection" for="connection" label="Connessione">
						@foreach(config('general.system.connections') as $k => $connection)
							<option value="{{$k}}">{{ $connection }}</option>
						@endforeach
					</x-select>
				</div>
				<div class="col-span-1">
					<x-jet-input wire:model.defer="system.tension" type="text" for="tension" label="Tensione"></x-jet-input>
				</div>
			</div>
		@endif
		@if($currentStep === 2)
			<div class="grid grid-cols-2 gap-6">
				<div class="col-span-2">
					<x-jet-input wire:model.defer="system.street" type="text" for="street" label="Indirizzo"></x-jet-input>
				</div>
				<div class="col-span-1">
					<x-jet-input wire:model.defer="system.city" type="text" for="city" label="Città"></x-jet-input>
				</div>
				<div class="col-span-1">
					<x-jet-input wire:model.defer="system.province" type="text" for="province" label="Provincia"></x-jet-input>
				</div>
			</div>
		@endif
		@if($currentStep === 3)
			<div class="grid grid-cols-2 gap-6">
				<div class="col-span-2">
					<x-jet-input wire:model.defer="system.connection_date" type="date" for="connection_date"
					             label="Data allaccio"></x-jet-input>
				</div>
				<div class="col-span-1">
					<x-select wire:model="incentive" for="incentive" label="Incentivo">
						@foreach(config('general.system.incentives') as $k => $incentive)
							<option value="{{$k}}">{{ $incentive }}</option>
						@endforeach
					</x-select>
				</div>
				<div class="col-span-1">
					<x-select wire:model="sale" for="sale" label="Vendita">
						@foreach(config('general.system.sales') as $k => $sale)
							<option value="{{$k}}">{{ $sale }}</option>
						@endforeach
					</x-select>
				</div>
				<div class="col-span-2">
					<x-jet-input wire:model.defer="system.company_code" type="text" for="company_code"
					             label="Codice Ditta"></x-jet-input>
				</div>
			</div>
		@endif
		@if($currentStep === 4)
			<div class="space-y-4">
				<div class="border-b border-gray-200 pb-2 flex items-start justify-between">
					<div>
						<h3 class="text-lg font-medium leading-3 text-gray-900">M1</h3>
						<p class="mt-2 max-w-4xl text-sm text-gray-500">Puoi aggiungere soltanto un M1</p>
						<x-jet-input-error for="m_ones"></x-jet-input-error>
					</div>
					@if(!$system->fresh()->m_one || $system->fresh()->m_one->count() < 1)
						<x-jet-button
								wire:click="$emit('openModal', 'customers.create-m', {{json_encode(['type' => '1'])}})">
							Aggiungi
						</x-jet-button>
					@endif
				</div>
				<div>
					<ul role="list" class="divide-y divide-gray-200">
						@if($system->fresh()->m_one)
							<li wire:key="{{ $system->fresh()->m_one->number }}"
							    class="flex items-start justify-between py-4">
								<div>
									<p class="mb-2.5 text-sm font-medium text-gray-900">{{ $system->fresh()->m_one->number }}</p>
								</div>
								<div class="flex items-center space-x-8">
									<div wire:click="$emit('openModal', 'systems.edit-mone', {{ json_encode(['m_one' => $system->fresh()->m_one->id]) }})">
										<x-heroicon-o-pencil class="w-4 h-4 text-gray-500 cursor-pointer hover:text-gray-700"></x-heroicon-o-pencil>
									</div>
								</div>
							</li>
						@endif
					</ul>
				</div>
			</div>
			<hr class="border-2">
			<div class="space-y-4">
				<div class="border-b border-gray-200 pb-2 flex items-start justify-between">
					<div>
						<h3 class="text-lg font-medium leading-3 text-gray-900">M2</h3>
						<p class="mt-2 max-w-4xl text-sm text-gray-500">Puoi aggiungere più M2</p>
					</div>
					<x-jet-button
							wire:click="$emit('openModal', 'customers.create-m', {{json_encode(['type' => '2'])}})">
						Aggiungi
					</x-jet-button>
				</div>
				<div>
					<ul role="list" class="divide-y divide-gray-200">
					@foreach($system->fresh()->m_twos as $m_two)
							<li wire:key="{{ $m_two->number }}"
							    class="flex items-start justify-between py-4">
								<div>
									<p class="mb-2.5 text-sm font-medium text-gray-900">{{ $m_two->number }}</p>
								</div>
								<div class="flex items-center space-x-8">
									<div wire:click="$emit('openModal', 'systems.edit-mtwo', {{ json_encode(['m_two' => $m_two->id]) }})">
										<x-heroicon-o-pencil class="w-4 h-4 text-gray-500 cursor-pointer hover:text-gray-700"></x-heroicon-o-pencil>
									</div>
								</div>
							</li>
					@endforeach
					</ul>
				</div>
			</div>
		@endif
		@if($currentStep === 5)
			<ul role="list" class="divide-y divide-gray-200">
				@foreach(config('general.system.sections') as $k => $section)
					<li class="py-4">
						<div class="relative flex items-start">
							<div class="flex h-5 items-center">
								<x-jet-input wire:model="system.{{$k}}" wire:click="updateSection('{{ $k }}')" type="checkbox" id="{{ $k }}"
								             class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"></x-jet-input>
							</div>
							<div class="ml-3 text-sm">
								<label for="{{ $k }}"
								       class="font-medium text-gray-700 leading-none">{{ $section['label'] }}</label>
							</div>
						</div>
						@if($system->$k)
							<ul role="list" class="divide-y divide-gray-200 ml-6">
								@if(config('general.system.sections.'.$k.'.children'))
									@foreach(config('general.system.sections.'.$k.'.children') as $kk => $child)
										<li class="py-4">
											<div class="relative flex items-start">
												<div class="flex h-5 items-center">
													<x-jet-input wire:model="system.{{$kk}}" type="checkbox" id="{{ $kk }}"
													             class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"></x-jet-input>
												</div>
												<div class="ml-3 text-sm">
													<label for="{{ $kk }}"
													       class="font-medium text-gray-700 leading-none">{{ $child }}</label>
												</div>
											</div>
										</li>
									@endforeach
								@endif
							</ul>
						@endif
					</li>
				@endforeach
			</ul>
		@endif
	</div>
	<x-card-footer>
		<x-slot:right_actions>
			<div class="flex items-center space-x-3">
				@if($currentStep > 1)
					<x-jet-button wire:click="prevStep">
						<x-heroicon-o-chevron-left class="w-4 h-4"></x-heroicon-o-chevron-left>
					</x-jet-button>
				@endif
				@if($currentStep < count($steps))
					<x-jet-button wire:click="nextStep">
						<x-heroicon-o-chevron-right class="w-4 h-4"></x-heroicon-o-chevron-right>
					</x-jet-button>
				@endif
				@if($currentStep === count($steps))
					<x-jet-button wire:click="save">Salva</x-jet-button>
				@endif
			</div>
		</x-slot:right_actions>
	</x-card-footer>
</x-card>