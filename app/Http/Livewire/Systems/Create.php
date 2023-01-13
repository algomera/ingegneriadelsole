<?php

	namespace App\Http\Livewire\Systems;

	use App\Models\Customer;
	use LivewireUI\Modal\ModalComponent;

	class Create extends ModalComponent
	{
		public $customer;
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
		public $name, $power, $censimp, $pod, $connection = 'cessione_totale', $tension, $street, $city, $province, $connection_date, $incentive = '1', $sale = 'gse', $company_code;
		public $adm = false;
		public $proxy_compilation = false;
		public $proxy_subscription = false;
		public $declaration = false;
		public $register_request = false;
		public $triennial_verification = false;
		public $arera = false;
		public $proxy_arera = false;
		public $contribution = false;
		public $investigation = false;
		public $unbundling_support = false;
		public $gse = false;
		public $fuel_mix = false;
		public $antimafia = false;
		public $invoices = false;
		public $seu = false;
		public $siad = false;
		public $checks = false;
		public $terna = false;
		public $g_stat = false;
		public $e_distribuzione = false;
		public $new_concessions = false;
		public $adjustments = false;
		public $reconciliation = false;
		public $maintenance = false;
		public $ceo_management = false;
		public $m_ones = [];
		public $m_twos = [];
		protected $listeners = [
			'm-created' => 'MCreated'
		];

		public function MCreated($params) {
			if ($params['type'] === "1") {
				unset($params['type']);
				$this->m_ones[] = $params;
			} else if ($params['type'] === "2") {
				unset($params['type']);
				$this->m_twos[] = $params;
			}
			$this->emit('$refresh');
		}

		protected function rules() {
			return [
				'name'            => 'required|string',
				'power'           => 'required|numeric',
				'censimp'         => 'required|numeric',
				'pod'             => 'required|numeric',
				'connection'      => [
					'required',
					'in' => config('general.system.connections')
				],
				'tension'         => 'required|numeric',
				'street'          => 'required|string',
				'city'            => 'required|string',
				'province'        => 'required|string',
				'connection_date' => 'required|date',
				'incentive'       => [
					'required',
					'in' => config('general.system.incentives')
				],
				'sale'            => [
					'required',
					'in' => config('general.system.sales')
				],
				'company_code'    => 'required',
				'm_ones' => 'array|max:1',
			];
		}

		public static function modalMaxWidth(): string {
			return '5xl';
		}

		public function mount($customer_id) {
			$this->customer = Customer::find($customer_id);
		}

		public function prevStep() {
			$this->currentStep--;
		}

		public function nextStep() {
			switch ($this->currentStep) {
				case 1:
					$this->validate([
						'name'       => 'required|string',
						'power'      => 'required|numeric',
						'censimp'    => 'required|numeric',
						'pod'        => 'required|numeric',
						'connection' => [
							'required',
							'in' => config('general.system.connections')
						],
						'tension'    => 'required|numeric',
					]);
					break;
				case 2:
					$this->validate([
						'street'   => 'required|string',
						'city'     => 'required|string',
						'province' => 'required|string',
					]);
					break;
				case 3:
					$this->validate([
						'connection_date' => 'required|date',
						'incentive'       => [
							'required',
							'in' => config('general.system.incentives')
						],
						'sale'            => [
							'required',
							'in' => config('general.system.sales')
						],
						'company_code'    => 'required',
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

		public function save() {
			$this->validate();
			$system = $this->customer->systems()->create([
				'name'                   => $this->name,
				'power'                  => $this->power,
				'censimp'                => $this->censimp,
				'pod'                    => $this->pod,
				'connection'             => $this->connection,
				'tension'                => $this->tension,
				'street'                 => $this->street,
				'city'                   => $this->city,
				'province'               => $this->province,
				'connection_date'        => $this->connection_date,
				'incentive'              => $this->incentive,
				'sale'                   => $this->sale,
				'company_code'           => $this->company_code,
				'adm'                    => $this->adm,
				'proxy_compilation'      => $this->proxy_compilation,
				'proxy_subscription'     => $this->proxy_subscription,
				'declaration'            => $this->declaration,
				'register_request'       => $this->register_request,
				'triennial_verification' => $this->triennial_verification,
				'arera'                  => $this->arera,
				'proxy_arera'            => $this->proxy_arera,
				'contribution'           => $this->contribution,
				'investigation'          => $this->investigation,
				'unbundling_support'     => $this->unbundling_support,
				'gse'                    => $this->gse,
				'fuel_mix'               => $this->fuel_mix,
				'antimafia'              => $this->antimafia,
				'invoices'               => $this->invoices,
				'seu'                    => $this->seu,
				'siad'                   => $this->siad,
				'checks'                 => $this->checks,
				'terna'                  => $this->terna,
				'g_stat'                 => $this->g_stat,
				'e_distribuzione'        => $this->e_distribuzione,
				'new_concessions'        => $this->new_concessions,
				'adjustments'            => $this->adjustments,
				'reconciliation'         => $this->reconciliation,
				'maintenance'            => $this->maintenance,
				'ceo_management'         => $this->ceo_management,
			]);
			if($this->m_ones) {
				$system->m_one()->create($this->m_ones[0]);
			}
			if($this->m_twos) {
				foreach ($this->m_twos as $m_two) {
					$system->m_twos()->create($m_two);
				}
			}
			$this->emit('system-added');
			$this->dispatchBrowserEvent('open-notification', [
				'title' => 'Impianto Aggiunto',
				'type'  => 'success',
			]);
			$this->closeModal();
		}

		public function render() {
			return view('livewire.systems.create');
		}
	}
