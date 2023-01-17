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
				'system.m_one.telemetering'                       => 'boolean',
				'system.m_one.operator'                           => 'string',
				'system.m_one.customer'                           => '',
				'system.m_twos.*.telemetering'                    => 'boolean',
				'system.m_twos.*.operator'                        => 'string',
				'system.m_twos.*.customer'                        => '',
				// AdM
				'system.section_adm.declaration'                  => [
					'required',
					'in' => config('general.system.sections.adm.declaration')
				],
				'system.section_adm.register'                     => [
					'required',
					'in' => config('general.system.sections.adm.register')
				],
				'system.section_adm.verification_execution_date'  => 'required|date',
				'system.section_adm.verification_expiration_date' => 'required|date',
				'system.section_adm.note'                         => 'nullable'
			];
		}

		public function mount(Customer $customer, System $system) {
			$this->customer = $customer;
			$this->system = $system;
			$this->system->section_adm = $system->section_adm;
			foreach (config('general.system.sections') as $k => $section) {
				$this->tabs[] = [
					'id'    => $k,
					'label' => $section['label']
				];
			}
			if ($this->tabs && $this->system[$this->tabs[0]['id']]) {
				$this->currentTab = $this->tabs[0]['id'];
			}
		}

		public function save() {
			$validated = $this->validate();
			// AdM
			$adm = $this->system->section_adm()->updateOrCreate([
				'system_id' => $this->system->id
			], $validated['system']['section_adm']);
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
		}

		public function render() {
			return view('livewire.systems.show');
		}
	}
