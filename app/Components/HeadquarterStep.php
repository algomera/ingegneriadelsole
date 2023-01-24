<?php

	namespace App\Components;

	use App\Models\Customer;
	use App\Models\Headquarter;
	use Spatie\LivewireWizard\Components\StepComponent;

	class HeadquarterStep extends StepComponent
	{
		public $customer, $headquarter_street, $headquarter_city, $headquarter_province;
		protected $rules = [
			'headquarter_street'   => 'required|string',
			'headquarter_city'     => 'required|string',
			'headquarter_province' => 'required|string',
		];

		public function mount() {
			$this->customer = Customer::find($this->state()->forStep('general-informations-step')['customer_id']) ?: Customer::latest()->first();
		}

		public function next() {
			if (auth()->user()->can('customer_update')) {
				$this->validate();
				if ($this->customer->headquarter) {
					$this->customer->headquarter->update([
						'street'   => $this->headquarter_street,
						'city'     => $this->headquarter_city,
						'province' => $this->headquarter_province,
					]);
				} else {
					$headquarter = Headquarter::create([
						'street'   => $this->headquarter_street,
						'city'     => $this->headquarter_city,
						'province' => $this->headquarter_province,
					]);
					$this->customer->update([
						'headquarter_id' => $headquarter->id
					]);
				}
			}
			$this->nextStep();
		}

		public function stepInfo(): array {
			return [
				'label' => 'Sede Legale',
			];
		}

		public function render() {
			return view('customer-wizard.steps.headquarter');
		}
	}