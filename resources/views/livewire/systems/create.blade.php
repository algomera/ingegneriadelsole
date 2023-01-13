<x-card>
	<x-card-header>
		<x-slot:title>Nuovo impianto</x-slot:title>
	</x-card-header>
	<div class="p-4 space-y-6">
		<nav aria-label="Progress">
			<ol role="list" class="space-y-4 md:flex md:space-y-0 md:space-x-8">
				@foreach($steps as $k => $step)
					<li class="md:flex-1">
						<!-- Completed Step -->
						<div @class([
        						'flex flex-col border-l-4 border-indigo-600 py-2 pl-4 md:border-l-0 md:border-t-4 md:pl-0 md:pt-4 md:pb-0' => $currentStep === $k,
        						'group flex flex-col border-l-4 border-indigo-600 py-2 pl-4 hover:border-indigo-800 md:border-l-0 md:border-t-4 md:pl-0 md:pt-4 md:pb-0' => $currentStep >= $k,
        						'group flex flex-col border-l-4 border-gray-200 py-2 pl-4 hover:border-gray-300 md:border-l-0 md:border-t-4 md:pl-0 md:pt-4 md:pb-0' => $currentStep <= $k,
        					])>
							<span class="text-sm font-medium text-indigo-600 group-hover:text-indigo-800">{{ $step['label'] }}</span>
							<span class="text-sm font-medium">{{ $step['description'] }}</span>
						</div>
					</li>
				@endforeach
			</ol>
		</nav>

		@if($currentStep === 1)
			<div class="grid grid-cols-3 gap-6">
				<div class="col-span-3">
					<x-jet-input wire:model.defer="name" type="text" for="name" label="Nome impianto"></x-jet-input>
				</div>
				<div class="col-span-1">
					<x-jet-input wire:model.defer="power" type="text" for="power" label="Potenza"></x-jet-input>
				</div>
				<div class="col-span-1">
					<x-jet-input wire:model.defer="censimp" type="text" for="censimp" label="Censimp"></x-jet-input>
				</div>
				<div class="col-span-1">
					<x-jet-input wire:model.defer="pod" type="text" for="pod" label="POD"></x-jet-input>
				</div>
				<div class="col-span-3">
					<x-select wire:model="connection" for="connection" label="Connessione">
						@foreach(config('general.system.connections') as $k => $connection)
							<option value="{{$k}}">{{ $connection }}</option>
						@endforeach
					</x-select>
				</div>
				<div class="col-span-1">
					<x-jet-input wire:model.defer="tension" type="text" for="tension" label="Tensione"></x-jet-input>
				</div>
			</div>
		@endif
		@if($currentStep === 2)
			<div class="grid grid-cols-2 gap-6">
				<div class="col-span-2">
					<x-jet-input wire:model.defer="street" type="text" for="street" label="Indirizzo"></x-jet-input>
				</div>
				<div class="col-span-1">
					<x-jet-input wire:model.defer="city" type="text" for="city" label="Città"></x-jet-input>
				</div>
				<div class="col-span-1">
					<x-jet-input wire:model.defer="province" type="text" for="province" label="Provincia"></x-jet-input>
				</div>
			</div>
		@endif
		@if($currentStep === 3)
			<div class="grid grid-cols-2 gap-6">
				<div class="col-span-2">
					<x-jet-input wire:model.defer="connection_date" type="date" for="connection_date"
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
					<x-jet-input wire:model.defer="company_code" type="text" for="company_code"
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
					@if(count($m_ones) < 1)
						<x-jet-button
								wire:click="$emit('openModal', 'customers.create-m', {{json_encode(['type' => '1'])}})">
							Aggiungi
						</x-jet-button>
					@endif
				</div>
				<div>
					@foreach($m_ones as $m_one)
						<p wire:key="{{ $m_one['number'] }}">{{ $m_one['number'] }}</p>
					@endforeach
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
					@foreach($m_twos as $m_two)
						<p wire:key="{{ $m_two['number'] }}">{{ $m_two['number'] }}</p>
					@endforeach
				</div>
			</div>
		@endif
		@if($currentStep === 5)
			<ul role="list" class="divide-y divide-gray-200">
				@foreach(config('general.system.sections') as $k => $section)
					<li class="py-4">
						<div class="relative flex items-start">
							<div class="flex h-5 items-center">
								<x-jet-input wire:model="{{$k}}" type="checkbox" id="{{ $k }}"
								             class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"></x-jet-input>
							</div>
							<div class="ml-3 text-sm">
								<label for="{{ $k }}"
								       class="font-medium text-gray-700 leading-none">{{ $section['label'] }}</label>
							</div>
						</div>
						@if($$k)
							<ul role="list" class="divide-y divide-gray-200 ml-6">
								@if(config('general.system.sections.'.$k.'.children'))
									@foreach(config('general.system.sections.'.$k.'.children') as $kk => $child)
										<li class="py-4">
											<div class="relative flex items-start">
												<div class="flex h-5 items-center">
													<x-jet-input wire:model="{{$kk}}" type="checkbox" id="{{ $kk }}"
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