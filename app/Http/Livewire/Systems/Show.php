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
							'required',
							'in' => config('general.system.sections.adm.declaration')
						],
						'section_adm.register'                     => [
							'required',
							'in' => config('general.system.sections.adm.register')
						],
						'section_adm.verification_execution_date'  => 'required|date',
						'section_adm.verification_expiration_date' => 'required|date',
						'section_adm.note'                         => 'nullable',
					]);
					// AdM
					$adm = $this->system->section_adm()->updateOrCreate([
						'system_id' => $this->system->id
					], $validated['section_adm']);
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
							'required',
							'in' => config('general.system.sections.arera.contribution')
						],
						'section_arera.investigation' => [
							'required',
							'in' => config('general.system.sections.arera.investigation')
						],
						'section_arera.unbundling'    => [
							'required',
							'in' => config('general.system.sections.arera.unbundling')
						],
						'section_arera.note'          => 'nullable'
					]);
					// Arera
					$arera = $this->system->section_arera()->updateOrCreate([
						'system_id' => $this->system->id
					], $validated['section_arera']);
					break;
				case 'e_distribuzione':
					$validated = $this->validate([
						'section_e_distribuzione.documents'                           => [
							'required',
							'in' => config('general.system.sections.e_distribuzione.documents')
						],
						'section_e_distribuzione.question'                            => [
							'required',
							'in' => config('general.system.sections.e_distribuzione.question')
						],
						'section_e_distribuzione.quotation'                           => [
							'required',
							'in' => config('general.system.sections.e_distribuzione.quotation')
						],
						'section_e_distribuzione.start_of_process'                    => [
							'required',
							'in' => config('general.system.sections.e_distribuzione.start_of_process')
						],
						'section_e_distribuzione.end_of_process'                      => [
							'required',
							'in' => config('general.system.sections.e_distribuzione.end_of_process')
						],
						'section_e_distribuzione.start_of_work'                       => [
							'required',
							'in' => config('general.system.sections.e_distribuzione.start_of_work')
						],
						'section_e_distribuzione.end_of_work'                         => [
							'required',
							'in' => config('general.system.sections.e_distribuzione.end_of_work')
						],
						'section_e_distribuzione.censimp'                             => [
							'required',
							'in' => config('general.system.sections.e_distribuzione.censimp')
						],
						'section_e_distribuzione.rde'                                 => [
							'required',
							'in' => config('general.system.sections.e_distribuzione.rde')
						],
						'section_e_distribuzione.measurement_card'                    => [
							'required',
							'in' => config('general.system.sections.e_distribuzione.measurement_card')
						],
						'section_e_distribuzione.activation'                          => [
							'required',
							'in' => config('general.system.sections.e_distribuzione.activation')
						],
						'section_e_distribuzione.gse'                                 => [
							'required',
							'in' => config('general.system.sections.e_distribuzione.gse')
						],
						'section_e_distribuzione.connection'                          => [
							'required',
							'in' => config('general.system.sections.e_distribuzione.connection')
						],
						'section_e_distribuzione.system_type'                         => [
							'required',
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
					], $validated['section_e_distribuzione']);
			}
		}

		public function render() {
			return view('livewire.systems.show');
		}
	}
