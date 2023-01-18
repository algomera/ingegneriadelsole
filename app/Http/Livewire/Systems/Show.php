<?php

	namespace App\Http\Livewire\Systems;

	use App\Models\Customer;
	use App\Models\System;
	use Livewire\Component;

	class Show extends Component
	{
		public Customer $customer;
		public System $system;
		public $tabs = [];
		public $currentTab = null;

		public function updatedSystemMOneTelemetering($value) {
			if (!$value) {
				$this->system->m_one->operator = '';
				$this->system->m_one->customer = 'nessun_dato';
			}
		}

		public function updateSystemMTwoTelemetering($id) {
			if (!$this->system->m_twos->find($id)->telemetering) {
				$this->system->m_twos->find($id)->operator = '';
				$this->system->m_twos->find($id)->customer = 'nessun_dato';
			}
		}

		protected function rules() {
			return [
				// M1
				'system.m_one.telemetering'                                   => 'boolean',
				'system.m_one.operator'                                       => 'string',
				'system.m_one.customer'                                       => '',
				'system.m_twos.*.telemetering'                                => 'boolean',
				'system.m_twos.*.operator'                                    => 'string',
				'system.m_twos.*.customer'                                    => '',
				// AdM
				'section_adm.declaration'                                     => [
					'required',
					'in' => config('general.system.sections.adm.declaration')
				],
				'section_adm.register'                                        => [
					'required',
					'in' => config('general.system.sections.adm.register')
				],
				'section_adm.verification_execution_date'                     => 'required|date',
				'section_adm.verification_expiration_date'                    => 'required|date',
				'section_adm.note'                                            => 'nullable',
				// Arera
				'section_arera.contribution'                                  => 'string',
				'section_arera.investigation'                                 => 'string',
				'section_arera.unbundling'                                    => 'string',
				'section_arera.note'                                          => 'nullable',
				// E-Distribuzione
				'section_e_distribuzione.documents'                           => 'string',
				'section_e_distribuzione.question'                            => 'string',
				'section_e_distribuzione.quotation'                           => 'string',
				'section_e_distribuzione.start_of_process'                    => 'string',
				'section_e_distribuzione.end_of_process'                      => 'string',
				'section_e_distribuzione.start_of_work'                       => 'string',
				'section_e_distribuzione.end_of_work'                         => 'string',
				'section_e_distribuzione.censimp'                             => 'string',
				'section_e_distribuzione.rde'                                 => 'string',
				'section_e_distribuzione.measurement_card'                    => 'string',
				'section_e_distribuzione.activation'                          => 'string',
				'section_e_distribuzione.gse'                                 => 'string',
				'section_e_distribuzione.connection'                          => 'string',
				'section_e_distribuzione.system_type'                         => 'string',
				'section_e_distribuzione.connections_note'                    => 'nullable',
				'section_e_distribuzione.spi_execution_date'                  => 'required|date',
				'section_e_distribuzione.spi_expiration_date'                 => 'required|date',
				'section_e_distribuzione.spg_execution_date'                  => 'required|date',
				'section_e_distribuzione.spg_expiration_date'                 => 'required|date',
				'section_e_distribuzione.ground_verification_execution_date'  => 'required|date',
				'section_e_distribuzione.ground_verification_expiration_date' => 'required|date',
				'section_e_distribuzione.adjustments_note'                    => 'nullable',
				// GSE
				'section_gse.fuel_mix'                                        => 'string',
				'section_gse.antimafia'                                       => 'string',
				'section_gse.invoice_january'                                 => 'string',
				'section_gse.invoice_february'                                => 'string',
				'section_gse.invoice_march'                                   => 'string',
				'section_gse.invoice_april'                                   => 'string',
				'section_gse.invoice_may'                                     => 'string',
				'section_gse.invoice_june'                                    => 'string',
				'section_gse.invoice_july'                                    => 'string',
				'section_gse.invoice_august'                                  => 'string',
				'section_gse.invoice_september'                               => 'string',
				'section_gse.invoice_october'                                 => 'string',
				'section_gse.invoice_november'                                => 'string',
				'section_gse.invoice_december'                                => 'string',
				'section_gse.seu'                                             => 'string',
				// Terna
				'section_terna.gstat'                                         => 'string',
				// Riconciliazione
				'section_reconciliation.reconciliation'                       => 'string',
			];
		}

		public function mount(Customer $customer, System $system) {
			$this->customer = $customer;
			$this->system = $system;
			$this->section_adm = $system->section_adm ?: [
				'declaration'                  => null,
				'register'                     => null,
				'verification_execution_date'  => '',
				'verification_expiration_date' => '',
				'note'                         => null,
			];
			$this->section_arera = $system->section_arera ?: [
				'contribution'  => null,
				'investigation' => null,
				'unbundling'    => null,
				'note'          => null
			];
			$this->section_e_distribuzione = $system->section_e_distribuzione ?: [
				'documents'                           => null,
				'question'                            => null,
				'quotation'                           => null,
				'start_of_process'                    => null,
				'end_of_process'                      => null,
				'start_of_work'                       => null,
				'end_of_work'                         => null,
				'censimp'                             => null,
				'rde'                                 => null,
				'measurement_card'                    => null,
				'activation'                          => null,
				'gse'                                 => null,
				'connection'                          => null,
				'system_type'                         => null,
				'connections_note'                    => '',
				'spi_execution_date'                  => '',
				'spi_expiration_date'                 => '',
				'spg_execution_date'                  => '',
				'spg_expiration_date'                 => '',
				'ground_verification_execution_date'  => '',
				'ground_verification_expiration_date' => '',
				'adjustments_note'                    => '',
			];
			$this->section_gse = $system->section_gse ?: [
				'fuel_mix'          => null,
				'antimafia'         => null,
				'invoice_january'   => null,
				'invoice_february'  => null,
				'invoice_march'     => null,
				'invoice_april'     => null,
				'invoice_may'       => null,
				'invoice_june'      => null,
				'invoice_july'      => null,
				'invoice_august'    => null,
				'invoice_september' => null,
				'invoice_october'   => null,
				'invoice_november'  => null,
				'invoice_december'  => null,
				'seu'               => null
			];
			$this->section_terna = $system->section_terna ?: [
				'gstat' => null,
			];
			$this->section_reconciliation = $system->section_reconciliation ?: [
				'reconciliation' => null,
			];
			foreach (config('general.system.sections') as $k => $section) {
				$this->tabs[] = [
					'id'    => $k,
					'label' => $section['label']
				];
			}
			$current = null;
			foreach ($this->tabs as $tab) {
				if ($this->system[$tab['id']] === 1) {
					$current = $tab['id'];
					break;
				}
			}
			if ($this->tabs && $current) {
				$this->currentTab = $current;
			}
		}

		public function save($step) {
			switch ($step) {
				case 'adm':
					$validated = $this->validate([
						// M1
						'system.m_one.telemetering'                => 'boolean',
						'system.m_one.operator'                    => 'nullable',
						'system.m_one.customer'                    => 'string',
						'system.m_twos.*.telemetering'             => 'boolean',
						'system.m_twos.*.operator'                 => 'nullable',
						'system.m_twos.*.customer'                 => 'string',
						// AdM
						'section_adm.declaration'                  => [
							'in' => config('general.system.sections.adm.declaration')
						],
						'section_adm.register'                     => [
							'in' => config('general.system.sections.adm.register')
						],
						'section_adm.verification_execution_date'  => 'required|date',
						'section_adm.verification_expiration_date' => 'required|date',
						'section_adm.note'                         => 'nullable',
					]);
					// AdM
					$adm = $this->system->section_adm()->updateOrCreate([
						'system_id' => $this->system->id
					], [
						'declaration'                  => $this->section_adm->declaration ?: null,
						'register'                     => $this->section_adm->register ?: null,
						'verification_execution_date'  => $this->section_adm->verification_execution_date ?: null,
						'verification_expiration_date' => $this->section_adm->verification_expiration_date ?: null,
						'note'                         => $this->section_adm->note ?: null
					]);
					// M1
					$m1 = $this->system->m_one()->updateOrCreate([
						'system_id' => $this->system->id
					], $validated['system']['m_one']);
					// M2
					foreach ($this->system->m_twos as $k => $m_two) {
						$this->system->m_twos()->updateOrCreate([
							'id'        => $m_two->id,
							'system_id' => $this->system->id
						], $m_two->toArray());
					}
					break;
				case 'arera':
					$validated = $this->validate([
						// Arera
						'section_arera.contribution'  => [
							'in' => config('general.system.sections.arera.contribution')
						],
						'section_arera.investigation' => [
							'in' => config('general.system.sections.arera.investigation')
						],
						'section_arera.unbundling'    => [
							'in' => config('general.system.sections.arera.unbundling')
						],
						'section_arera.note'          => 'nullable'
					]);
					// Arera
					$arera = $this->system->section_arera()->updateOrCreate([
						'system_id' => $this->system->id
					], [
						'contribution'  => $this->section_arera['contribution'] ?: null,
						'investigation' => $this->section_arera['investigation'] ?: null,
						'unbundling'    => $this->section_arera['unbundling'] ?: null,
						'note'          => $this->section_arera['note'] ?: null
					]);
					break;
				case 'e_distribuzione':
					$validated = $this->validate([
						'section_e_distribuzione.documents'                           => [
							'in' => config('general.system.sections.e_distribuzione.documents')
						],
						'section_e_distribuzione.question'                            => [
							'in' => config('general.system.sections.e_distribuzione.question')
						],
						'section_e_distribuzione.quotation'                           => [
							'in' => config('general.system.sections.e_distribuzione.quotation')
						],
						'section_e_distribuzione.start_of_process'                    => [
							'in' => config('general.system.sections.e_distribuzione.start_of_process')
						],
						'section_e_distribuzione.end_of_process'                      => [
							'in' => config('general.system.sections.e_distribuzione.end_of_process')
						],
						'section_e_distribuzione.start_of_work'                       => [
							'in' => config('general.system.sections.e_distribuzione.start_of_work')
						],
						'section_e_distribuzione.end_of_work'                         => [
							'in' => config('general.system.sections.e_distribuzione.end_of_work')
						],
						'section_e_distribuzione.censimp'                             => [
							'in' => config('general.system.sections.e_distribuzione.censimp')
						],
						'section_e_distribuzione.rde'                                 => [
							'in' => config('general.system.sections.e_distribuzione.rde')
						],
						'section_e_distribuzione.measurement_card'                    => [
							'in' => config('general.system.sections.e_distribuzione.measurement_card')
						],
						'section_e_distribuzione.activation'                          => [
							'in' => config('general.system.sections.e_distribuzione.activation')
						],
						'section_e_distribuzione.gse'                                 => [
							'in' => config('general.system.sections.e_distribuzione.gse')
						],
						'section_e_distribuzione.connection'                          => [
							'in' => config('general.system.sections.e_distribuzione.connection')
						],
						'section_e_distribuzione.system_type'                         => [
							'in' => config('general.system.sections.e_distribuzione.system_type')
						],
						'section_e_distribuzione.connections_note'                    => 'nullable',
						'section_e_distribuzione.spi_execution_date'                  => 'required|date',
						'section_e_distribuzione.spi_expiration_date'                 => 'required|date',
						'section_e_distribuzione.spg_execution_date'                  => 'required|date',
						'section_e_distribuzione.spg_expiration_date'                 => 'required|date',
						'section_e_distribuzione.ground_verification_execution_date'  => 'required|date',
						'section_e_distribuzione.ground_verification_expiration_date' => 'required|date',
						'section_e_distribuzione.adjustments_note'                    => 'nullable',
					]);
					// E-Distribuzione
					$e_distribuzione = $this->system->section_e_distribuzione()->updateOrCreate([
						'system_id' => $this->system->id
					], [
						'documents'                           => $this->section_e_distribuzione['documents'] ?: null,
						'question'                            => $this->section_e_distribuzione['question'] ?: null,
						'quotation'                           => $this->section_e_distribuzione['quotation'] ?: null,
						'start_of_process'                    => $this->section_e_distribuzione['start_of_process'] ?: null,
						'end_of_process'                      => $this->section_e_distribuzione['end_of_process'] ?: null,
						'start_of_work'                       => $this->section_e_distribuzione['start_of_work'] ?: null,
						'end_of_work'                         => $this->section_e_distribuzione['end_of_work'] ?: null,
						'censimp'                             => $this->section_e_distribuzione['censimp'] ?: null,
						'rde'                                 => $this->section_e_distribuzione['rde'] ?: null,
						'measurement_card'                    => $this->section_e_distribuzione['measurement_card'] ?: null,
						'activation'                          => $this->section_e_distribuzione['activation'] ?: null,
						'gse'                                 => $this->section_e_distribuzione['gse'] ?: null,
						'connection'                          => $this->section_e_distribuzione['connection'] ?: null,
						'system_type'                         => $this->section_e_distribuzione['system_type'] ?: null,
						'connections_note'                    => $this->section_e_distribuzione['connections_note'] ?: null,
						'spi_execution_date'                  => $this->section_e_distribuzione['spi_execution_date'] ?: null,
						'spi_expiration_date'                 => $this->section_e_distribuzione['spi_expiration_date'] ?: null,
						'spg_execution_date'                  => $this->section_e_distribuzione['spg_execution_date'] ?: null,
						'spg_expiration_date'                 => $this->section_e_distribuzione['spg_expiration_date'] ?: null,
						'ground_verification_execution_date'  => $this->section_e_distribuzione['ground_verification_execution_date'] ?: null,
						'ground_verification_expiration_date' => $this->section_e_distribuzione['ground_verification_expiration_date'] ?: null,
						'adjustments_note'                    => $this->section_e_distribuzione['adjustments_note'] ?: null,
					]);
				case 'gse':
					$validated = $this->validate([
						'section_gse.fuel_mix'          => [
							'in' => config('general.system.sections.gse.fuel_mix')
						],
						'section_gse.antimafia'         => [
							'in' => config('general.system.sections.gse.antimafia')
						],
						'section_gse.invoice_january'   => [
							'in' => config('general.system.sections.gse.invoice_january')
						],
						'section_gse.invoice_february'  => [
							'in' => config('general.system.sections.gse.invoice_february')
						],
						'section_gse.invoice_march'     => [
							'in' => config('general.system.sections.gse.invoice_march')
						],
						'section_gse.invoice_april'     => [
							'in' => config('general.system.sections.gse.invoice_april')
						],
						'section_gse.invoice_may'       => [
							'in' => config('general.system.sections.gse.invoice_may')
						],
						'section_gse.invoice_june'      => [
							'in' => config('general.system.sections.gse.invoice_june')
						],
						'section_gse.invoice_july'      => [
							'in' => config('general.system.sections.gse.invoice_july')
						],
						'section_gse.invoice_august'    => [
							'in' => config('general.system.sections.gse.invoice_august')
						],
						'section_gse.invoice_september' => [
							'in' => config('general.system.sections.gse.invoice_september')
						],
						'section_gse.invoice_october'   => [
							'in' => config('general.system.sections.gse.invoice_october')
						],
						'section_gse.invoice_november'  => [
							'in' => config('general.system.sections.gse.invoice_november')
						],
						'section_gse.invoice_december'  => [
							'in' => config('general.system.sections.gse.invoice_december')
						],
						'section_gse.seu'               => [
							'in' => config('general.system.sections.gse.seu')
						],
					]);
					// GSE
					$gse = $this->system->section_gse()->updateOrCreate([
						'system_id' => $this->system->id
					], [
						'fuel_mix'          => $this->section_gse['fuel_mix'] ?: null,
						'antimafia'         => $this->section_gse['antimafia'] ?: null,
						'invoice_january'   => $this->section_gse['invoice_january'] ?: null,
						'invoice_february'  => $this->section_gse['invoice_february'] ?: null,
						'invoice_march'     => $this->section_gse['invoice_march'] ?: null,
						'invoice_april'     => $this->section_gse['invoice_april'] ?: null,
						'invoice_may'       => $this->section_gse['invoice_may'] ?: null,
						'invoice_june'      => $this->section_gse['invoice_june'] ?: null,
						'invoice_july'      => $this->section_gse['invoice_july'] ?: null,
						'invoice_august'    => $this->section_gse['invoice_august'] ?: null,
						'invoice_september' => $this->section_gse['invoice_september'] ?: null,
						'invoice_october'   => $this->section_gse['invoice_october'] ?: null,
						'invoice_november'  => $this->section_gse['invoice_november'] ?: null,
						'invoice_december'  => $this->section_gse['invoice_december'] ?: null,
						'seu'               => $this->section_gse['seu'] ?: null,
					]);
					break;
				case 'terna':
					$validated = $this->validate([
						'section_terna.gstat' => [
							'in' => config('general.system.sections.terna.gstat')
						],
					]);
					// Terna
					$terna = $this->system->section_terna()->updateOrCreate([
						'system_id' => $this->system->id
					], [
						'gstat' => $this->section_terna['gstat'] ?: null,
					]);
					break;
				case 'reconciliation':
					$validated = $this->validate([
						'section_reconciliation.reconciliation' => [
							'in' => config('general.system.sections.reconciliation.reconciliation')
						],
					]);
					// Riconciliazione
					$reconciliation = $this->system->section_reconciliation()->updateOrCreate([
						'system_id' => $this->system->id
					], [
						'reconciliation' => $this->section_reconciliation['reconciliation'] ?: null,
					]);
					break;
			}
		}

		public function render() {
			return view('livewire.systems.show');
		}
	}
