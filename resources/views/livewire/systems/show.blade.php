<x-card>
	<x-card-header>
		<x-slot:title>
			<h3>{{ $customer->name }}</h3>
			<h5 class="text-sm text-gray-500">{{ $system->name }}</h5>
		</x-slot:title>
		<x-slot:actions>
			<x-jet-button>Salva</x-jet-button>
		</x-slot:actions>
	</x-card-header>
	<div class="p-4 divide-y">
		<div class="pb-4">
			<div class="lg:hidden">
				<label for="tabs" class="sr-only">Select a tab</label>
				<select wire:model="currentTab" id="tabs" name="tabs"
				        class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
					@foreach($tabs as $tab)
						<option wire:key="{{ $tab['id'] }}" value="{{ $tab['id'] }}"
						        @if(!$this->system[$tab['id']]) disabled @endif>{{ $tab['label'] }}</option>
					@endforeach
				</select>
			</div>
			<div class="hidden lg:block">
				<nav class="flex space-x-4" aria-label="Tabs">
					@foreach($tabs as $tab)
						<span wire:key="{{ $tab['id'] }}"
						      @if($this->system[$tab['id']]) wire:click="$set('currentTab', '{{ $tab['id'] }}')" @endif @class([
        						'px-3 py-2 font-medium text-sm rounded-md',
        						'bg-gray-100 text-gray-700' => $currentTab === $tab['id'],
        						'text-gray-500 hover:text-gray-700 cursor-pointer' => $currentTab !== $tab['id'],
        						'opacity-30 hover:cursor-not-allowed' => !$this->system[$tab['id']]
							])>{{ $tab['label'] }}</span>
					@endforeach
				</nav>
			</div>
		</div>
		<div class="pt-4">
			@if($currentTab)
				@switch($currentTab)
					@case('adm')
						<div class="space-y-2">
							<h3 class="font-bold">Misure</h3>
							<div>
								sezione misure
							</div>
							<h3 class="font-bold">Dichiarazione</h3>
							<div>
								sezione dichiarazione
							</div>
							<h3 class="font-bold">Registro</h3>
							<div>
								sezione registro
							</div>
							<h3 class="font-bold">Verifica misuratori</h3>
							<div>
								sezione verifica misuratori
							</div>
							<h3 class="font-bold">Note</h3>
							<div>
								sezione note
							</div>
						</div>
					@break
				@endswitch
			@else
				<p class="text-sm text-center text-gray-500 py-5">
					Nessuna sezione disponibile per questo impianto.
				</p>
			@endif
		</div>
	</div>
</x-card>
