<?php

	namespace App\Components;
	use App\Models\Customer;
	use App\Models\Referent;
	use Spatie\LivewireWizard\Components\StepComponent;

	class ReferentStep extends StepComponent
	{
		public $referent_first_name, $referent_last_name, $referent_email, $referent_phone;

		protected $rules = [
			'referent_first_name'              => 'required|string',
			'referent_last_name'               => 'required|string',
			'referent_email'                   => 'required|email',
			'referent_phone'                   => 'required',
		];

		public function next() {
			$this->validate();
			$customer = Customer::find($this->state()->forStep('general-informations-step')['customer_id']);
			$referent = Referent::updateOrCreate(['id' => $customer->referent->id],[
				'first_name' => $this->referent_first_name,
				'last_name'  => $this->referent_last_name,
				'email'      => $this->referent_email,
				'phone'      => $this->referent_phone
			]);
			$customer->update([
				'referent_id' => $referent->id
			]);
			$this->nextStep();
		}

		public function stepInfo(): array
		{
			return [
				'label' => 'Referente',
			];
		}
		public function render() {
			return view('customer-wizard.steps.referent');
		}
	}