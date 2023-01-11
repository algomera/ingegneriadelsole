<div>
	<div class="grid grid-cols-4 gap-6">
		<div class="col-span-4 sm:col-span-1">
			<x-wizard-navigation :steps="$steps"/>
		</div>
		<div class="col-span-4 sm:col-span-3">
			<div>
				<h2 class="sm:hidden text-lg font-medium text-gray-900">Rappresentante legale</h2>
				<div class="mt-4 grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-6">
					<div class="sm:col-span-3">
						<x-jet-input wire:model.defer="legal_representative_first_name" type="text"
						             for="legal_representative_first_name"
						             label="Nome"></x-jet-input>
					</div>
					<div class="sm:col-span-3">
						<x-jet-input wire:model.defer="legal_representative_last_name" type="text"
						             for="legal_representative_last_name"
						             label="Cognome"></x-jet-input>
					</div>
					<div class="sm:col-span-6">
						<x-jet-input wire:model.defer="legal_representative_fiscal_code" type="text"
						             for="legal_representative_fiscal_code"
						             label="Codice Fiscale"></x-jet-input>
					</div>
					<div class="sm:col-span-2">
						<x-jet-input wire:model.defer="legal_representative_street" type="text"
						             for="legal_representative_street"
						             label="Indirizzo"></x-jet-input>
					</div>
					<div class="sm:col-span-2">
						<x-jet-input wire:model.defer="legal_representative_city" type="text"
						             for="legal_representative_city"
						             label="Città"></x-jet-input>
					</div>
					<div class="sm:col-span-2">
						<x-jet-input wire:model.defer="legal_representative_province" type="text"
						             for="legal_representative_province"
						             label="Provincia"></x-jet-input>
					</div>
				</div>
			</div>

			<div class="mt-4 flex items-center justify-between">
				<x-jet-button wire:click="previousStep">Indietro</x-jet-button>
				<x-jet-button wire:click="next">Avanti</x-jet-button>
			</div>
		</div>
	</div>
</div>