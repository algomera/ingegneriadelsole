<?php

	namespace App\Components;
	use App\Models\Customer;
	use Spatie\LivewireWizard\Components\StepComponent;

	class CredentialsStep extends StepComponent
	{
		public function next() {
//			$this->validate();
//			$customer = Customer::find($this->state()->forStep('general-informations-step')['customer_id']);
			$this->nextStep();
		}
		public function stepInfo(): array
		{
			return [
				'label' => 'Credenziali',
			];
		}
		public function render() {
			return view('customer-wizard.steps.credentials');
		}
	}