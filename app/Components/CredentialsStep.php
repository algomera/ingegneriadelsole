<?php

	namespace App\Components;

	use App\Models\Credential;
	use App\Models\Customer;
	use Spatie\LivewireWizard\Components\StepComponent;

	class CredentialsStep extends StepComponent
	{
		public $customer;

		protected $listeners = [
			'credential-added' => '$refresh',
			'credential-deleted' => '$refresh',
			'credential-updated' => '$refresh',
		];

		public function mount() {
			$this->customer = Customer::find($this->state()->forStep('general-informations-step')['customer_id']) ?: Customer::latest()->first();
		}

		public function next() {
			$this->nextStep();
		}

		public function deleteCredential($id) {
			Credential::find($id)->delete();
			$this->emit('credential-deleted');
		}

		public function stepInfo(): array {
			return [
				'label' => 'Credenziali',
			];
		}

		public function render() {
			$credentials = $this->customer->credentials;
			return view('customer-wizard.steps.credentials', [
				'credentials' => $credentials
			]);
		}
	}