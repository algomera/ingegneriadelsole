<?php

	namespace App\Components;
	use App\Models\Customer;
	use App\Models\Headquarter;
	use Spatie\LivewireWizard\Components\StepComponent;

	class HeadquarterStep extends StepComponent
	{
		public $customer, $headquarter_street, $headquarter_city, $headquarter_province;

		protected $rules = [
			'headquarter_street'               => 'required|string',
			'headquarter_city'                 => 'required|string',
			'headquarter_province'             => 'required|string',
		];

		public function mount() {
			$this->customer = Customer::find($this->state()->forStep('general-informations-step')['customer_id']);
		}

		public function next() {
			$this->validate();
			$headquarter = Headquarter::updateOrCreate(['id' => $this->customer->headquarter->id],[
				'street'   => $this->headquarter_street,
				'city'     => $this->headquarter_city,
				'province' => $this->headquarter_province,
			]);
			$this->customer->update([
				'headquarter_id' => $headquarter->id
			]);
			$this->nextStep();
		}
		public function stepInfo(): array
		{
			return [
				'label' => 'Sede Legale',
			];
		}
		public function render() {
			return view('customer-wizard.steps.headquarter');
		}
	}