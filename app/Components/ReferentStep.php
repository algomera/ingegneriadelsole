<?php

	namespace App\Components;

	use App\Models\Customer;
	use App\Models\Referent;
	use Spatie\LivewireWizard\Components\StepComponent;

	class ReferentStep extends StepComponent
	{
		public $customer, $referent_first_name, $referent_last_name, $referent_email, $referent_phone;
		protected $rules = [
			'referent_first_name' => 'required|string',
			'referent_last_name'  => 'required|string',
			'referent_email'      => 'required|email',
			'referent_phone'      => 'required',
		];

		public function mount() {
			$this->customer = Customer::find($this->state()->forStep('general-informations-step')['customer_id']) ?: Customer::latest()->first();
		}

		public function next() {
			if (auth()->user()->can('customer_update')) {
				$this->validate();
				if ($this->customer->referent) {
					$this->customer->referent->update([
						'first_name' => $this->referent_first_name,
						'last_name'  => $this->referent_last_name,
						'email'      => $this->referent_email,
						'phone'      => $this->referent_phone
					]);
				} else {
					$referent = Referent::create([
						'first_name' => $this->referent_first_name,
						'last_name'  => $this->referent_last_name,
						'email'      => $this->referent_email,
						'phone'      => $this->referent_phone
					]);
					$this->customer->update([
						'referent_id' => $referent->id
					]);
				}
			}
			$this->nextStep();
		}

		public function stepInfo(): array {
			return [
				'label' => 'Referente',
			];
		}

		public function render() {
			return view('customer-wizard.steps.referent');
		}
	}