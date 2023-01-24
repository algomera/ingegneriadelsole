<?php

	namespace App\Http\Livewire\Systems;

	use App\Models\System;
	use LivewireUI\Modal\ModalComponent;

	class Edit extends ModalComponent
	{
		public $system;
		public $currentStep = 1;
		public $steps = [
			1 => [
				'label'       => "Step 1",
				'description' => '',
			],
			2 => [
				'label'       => "Step 2",
				'description' => '',
			],
			3 => [
				'label'       => "Step 3",
				'description' => '',
			],
			4 => [
				'label'       => "Step 4",
				'description' => '',
			],
			5 => [
				'label'       => "Step 5",
				'description' => '',
			],
		];
		public $m_ones = [];
		public $m_twos = [];
		protected $listeners = [
			'm-created' => 'MCreated',
			'm-updated' => '$refresh',
			'm-deleted' => '$refresh'
		];

		public function MCreated($params) {
			if ($params['type'] === "1") {
				unset($params['type']);
				$this->system->m_one()->create($params);
			} else if ($params['type'] === "2") {
				unset($params['type']);
				$this->system->m_twos()->create($params);
			}
			$this->emit('$refresh');
		}

		protected function rules() {
			return [
				'system.name'                   => 'required|string',
				'system.power'                  => 'required|numeric',
				'system.censimp'                => 'required|numeric',
				'system.pod'                    => 'required|numeric',
				'system.connection'             => [
					'required',
					'in' => config('general.system.connections')
				],
				'system.tension'                => 'required|numeric',
				'system.street'                 => 'required|string',
				'system.city'                   => 'required|string',
				'system.province'               => 'required|string',
				'system.connection_date'        => 'required|date',
				'system.incentive'              => [
					'required',
					'in' => config('general.system.incentives')
				],
				'system.sale'                   => [
					'required',
					'in' => config('general.system.sales')
				],
				'system.company_code'           => 'required',
				'm_ones'                        => 'array|max:1',
				'system.adm'                    => 'boolean',
				'system.proxy_compilation'      => 'boolean',
				'system.proxy_subscription'     => 'boolean',
				'system.declaration'            => 'boolean',
				'system.register_request'       => 'boolean',
				'system.triennial_verification' => 'boolean',
				'system.arera'                  => 'boolean',
				'system.proxy_arera'            => 'boolean',
				'system.contribution'           => 'boolean',
				'system.investigation'          => 'boolean',
				'system.unbundling_support'     => 'boolean',
				'system.gse'                    => 'boolean',
				'system.fuel_mix'               => 'boolean',
				'system.antimafia'              => 'boolean',
				'system.invoices'               => 'boolean',
				'system.seu'                    => 'boolean',
				'system.siad'                   => 'boolean',
				'system.checks'                 => 'boolean',
				'system.terna'                  => 'boolean',
				'system.g_stat'                 => 'boolean',
				'system.e_distribuzione'        => 'boolean',
				'system.new_connections'        => 'boolean',
				'system.adjustments'            => 'boolean',
				'system.reconciliation'         => 'boolean',
				'system.maintenance'            => 'boolean',
				'system.ceo_management'         => 'boolean',
			];
		}

		public static function closeModalOnClickAway(): bool
		{
			return false;
		}

		public static function modalMaxWidth(): string {
			return '5xl';
		}

		public function mount(System $system) {
			$this->system = $system;
		}

		public function prevStep() {
			$this->currentStep--;
		}

		public function nextStep() {
			switch ($this->currentStep) {
				case 1:
					$this->validate([
						'system.name'       => 'required|string',
						'system.power'      => 'required|numeric',
						'system.censimp'    => 'required|numeric',
						'system.pod'        => 'required|numeric',
						'system.connection' => [
							'required',
							'in' => config('general.system.connections')
						],
						'system.tension'    => 'required|numeric',
					]);
					break;
				case 2:
					$this->validate([
						'system.street'   => 'required|string',
						'system.city'     => 'required|string',
						'system.province' => 'required|string',
					]);
					break;
				case 3:
					$this->validate([
						'system.connection_date' => 'required|date',
						'system.incentive'       => [
							'required',
							'in' => config('general.system.incentives')
						],
						'system.sale'            => [
							'required',
							'in' => config('general.system.sales')
						],
						'system.company_code'    => 'required',
					]);
					break;
				case 4:
					$this->validate([
						'm_ones' => 'array|max:1',
					]);
					break;
			}
			$this->currentStep++;
		}

		public function updateSection($s) {
			if($this->system->$s === false) {
				foreach (config('general.system.sections.'.$s.'.children') as $k => $child) {
					$this->system->$k = false;
				}
			}
		}

		public function save() {
			$this->validate();
			$this->system->update($this->validate()['system']);
			if ($this->m_ones) {
				$this->system->m_one()->updateOrCreate(['number' => $this->m_ones[0]['number']], $this->m_ones[0]);
			}
			if ($this->m_twos) {
				foreach ($this->m_twos as $m_two) {
					$this->system->m_twos()->updateOrCreate(['number' => $m_two['number']], $m_two);
				}
			}
			$this->emit('system-added');
			$this->dispatchBrowserEvent('open-notification', [
				'title' => 'Impianto aggiunto',
				'type'  => 'success',
			]);
			$this->closeModal();
		}

		public function render() {
			return view('livewire.systems.edit');
		}
	}
