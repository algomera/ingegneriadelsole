<div>
	<livewire:customer-wizard/>
</div>

{{--<x-card>--}}
{{--	<x-card-header>--}}
{{--		<x-slot:title>Nuova Anagrafica</x-slot:title>--}}
{{--	</x-card-header>--}}
{{--	<div class="p-4 space-y-4 sm:space-y-6">--}}
{{--		<div>--}}
{{--			<h2 class="text-lg font-medium text-gray-900">Informazioni generali</h2>--}}
{{--			<div class="mt-4 grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-6">--}}
{{--				<div class="sm:col-span-3">--}}
{{--					<x-jet-input wire:model.defer="name" type="text" for="name" label="Denominazione"></x-jet-input>--}}
{{--				</div>--}}

{{--				<div class="sm:col-span-3">--}}
{{--					<div class="flex items-center justify-between">--}}
{{--						<x-jet-label for="group_id">--}}
{{--							Gruppo di appartenenza--}}
{{--						</x-jet-label>--}}
{{--						<span class="text-xs text-indigo-500">Crea</span>--}}
{{--					</div>--}}
{{--					<x-select wire:model.defer="group_id" for="group_id" class="mt-1">--}}
{{--						<option value="gruppo_1">Gruppo 1</option>--}}
{{--					</x-select>--}}
{{--				</div>--}}

{{--				<div class="sm:col-span-3">--}}
{{--					<x-jet-label for="group_id">--}}
{{--						Mandatario--}}
{{--					</x-jet-label>--}}
{{--					<x-select wire:model.defer="agent" for="agent" class="mt-1">--}}
{{--						<option value="0">No</option>--}}
{{--						<option value="1">Si</option>--}}
{{--					</x-select>--}}
{{--				</div>--}}
{{--				<div class="sm:col-span-3">--}}
{{--					<x-jet-label for="group_id">--}}
{{--						Tipologia--}}
{{--					</x-jet-label>--}}
{{--					<x-select wire:model.defer="type" for="type" class="mt-1">--}}
{{--						<option value="private">Privato</option>--}}
{{--						<option value="company">Azienda</option>--}}
{{--					</x-select>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--		<div class="mt-6 border-t border-gray-200 pt-6">--}}
{{--			<h2 class="text-lg font-medium text-gray-900">Informazioni di contatto</h2>--}}
{{--			<div class="mt-4 grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-6">--}}
{{--				<div class="sm:col-span-3">--}}
{{--					<x-jet-input wire:model.defer="pec" type="email" for="pec" label="PEC"></x-jet-input>--}}
{{--				</div>--}}
{{--				<div class="sm:col-span-3">--}}
{{--					<x-jet-input wire:model.defer="notification_email" type="email" for="notification_email"--}}
{{--					             label="Email notifiche"></x-jet-input>--}}
{{--				</div>--}}
{{--				<div class="sm:col-span-3">--}}
{{--					<x-jet-input wire:model.defer="vat_number" type="text" for="vat_number"--}}
{{--					             label="Partita IVA"></x-jet-input>--}}
{{--				</div>--}}
{{--				<div class="sm:col-span-3">--}}
{{--					<x-jet-input wire:model.defer="fiscal_code" type="text" for="fiscal_code"--}}
{{--					             label="Codice Fiscale"></x-jet-input>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--		<div class="mt-6 border-t border-gray-200 pt-6">--}}
{{--			<h2 class="text-lg font-medium text-gray-900">Referente</h2>--}}
{{--			<div class="mt-4 grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-6">--}}
{{--				<div class="sm:col-span-3">--}}
{{--					<x-jet-input wire:model.defer="referent_first_name" type="text" for="referent_first_name"--}}
{{--					             label="Nome"></x-jet-input>--}}
{{--				</div>--}}
{{--				<div class="sm:col-span-3">--}}
{{--					<x-jet-input wire:model.defer="referent_last_name" type="text" for="referent_last_name"--}}
{{--					             label="Cognome"></x-jet-input>--}}
{{--				</div>--}}
{{--				<div class="sm:col-span-3">--}}
{{--					<x-jet-input wire:model.defer="referent_email" type="email" for="referent_email"--}}
{{--					             label="Email"></x-jet-input>--}}
{{--				</div>--}}
{{--				<div class="sm:col-span-3">--}}
{{--					<x-jet-input wire:model.defer="referent_phone" type="tel" for="referent_phone"--}}
{{--					             label="Telefono"></x-jet-input>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--		<div class="mt-6 border-t border-gray-200 pt-6">--}}
{{--			<h2 class="text-lg font-medium text-gray-900">Sede legale</h2>--}}
{{--			<div class="mt-4 grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-6">--}}
{{--				<div class="sm:col-span-2">--}}
{{--					<x-jet-input wire:model.defer="headquarter_street" type="text"--}}
{{--					             for="headquarter_street"--}}
{{--					             label="Indirizzo"></x-jet-input>--}}
{{--				</div>--}}
{{--				<div class="sm:col-span-2">--}}
{{--					<x-jet-input wire:model.defer="headquarter_city" type="text"--}}
{{--					             for="headquarter_city"--}}
{{--					             label="Città"></x-jet-input>--}}
{{--				</div>--}}
{{--				<div class="sm:col-span-2">--}}
{{--					<x-jet-input wire:model.defer="headquarter_province" type="text"--}}
{{--					             for="headquarter_province"--}}
{{--					             label="Provincia"></x-jet-input>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--		<div class="mt-6 border-t border-gray-200 pt-6">--}}
{{--			<h2 class="text-lg font-medium text-gray-900">Rappresentante legale</h2>--}}
{{--			<div class="mt-4 grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-6">--}}
{{--				<div class="sm:col-span-3">--}}
{{--					<x-jet-input wire:model.defer="legal_representatives_first_name" type="text"--}}
{{--					             for="legal_representatives_first_name"--}}
{{--					             label="Nome"></x-jet-input>--}}
{{--				</div>--}}
{{--				<div class="sm:col-span-3">--}}
{{--					<x-jet-input wire:model.defer="legal_representatives_last_name" type="text"--}}
{{--					             for="legal_representatives_last_name"--}}
{{--					             label="Cognome"></x-jet-input>--}}
{{--				</div>--}}
{{--				<div class="sm:col-span-6">--}}
{{--					<x-jet-input wire:model.defer="legal_representatives_fiscal_code" type="text"--}}
{{--					             for="legal_representatives_fiscal_code"--}}
{{--					             label="Codice Fiscale"></x-jet-input>--}}
{{--				</div>--}}
{{--				<div class="sm:col-span-2">--}}
{{--					<x-jet-input wire:model.defer="legal_representatives_street" type="text"--}}
{{--					             for="legal_representatives_street"--}}
{{--					             label="Indirizzo"></x-jet-input>--}}
{{--				</div>--}}
{{--				<div class="sm:col-span-2">--}}
{{--					<x-jet-input wire:model.defer="legal_representatives_city" type="text"--}}
{{--					             for="legal_representatives_city"--}}
{{--					             label="Città"></x-jet-input>--}}
{{--				</div>--}}
{{--				<div class="sm:col-span-2">--}}
{{--					<x-jet-input wire:model.defer="legal_representatives_province" type="text"--}}
{{--					             for="legal_representatives_province"--}}
{{--					             label="Provincia"></x-jet-input>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--		<div class="mt-6 border-t border-gray-200 pt-6">--}}
{{--			<h2 class="text-lg font-medium text-gray-900">Credenziali</h2>--}}
{{--			<div class="mt-4 grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-6">--}}
{{--				lista credenziali--}}
{{--			</div>--}}
{{--		</div>--}}
{{--		<div class="mt-6 border-t border-gray-200 pt-6">--}}
{{--			<h2 class="text-lg font-medium text-gray-900">Altro</h2>--}}
{{--			<div class="mt-4 grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-6">--}}
{{--				<div class="col-span-6">--}}
{{--					<x-textarea wire:model.defer="note" for="note" label="Note" rows="7">--}}
{{--					</x-textarea>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}
{{--	<x-card-footer>--}}
{{--		<x-slot:right_actions>--}}
{{--			<x-jet-button wire:click="submit">Salva</x-jet-button>--}}
{{--		</x-slot:right_actions>--}}
{{--	</x-card-footer>--}}
{{--</x-card>--}}
