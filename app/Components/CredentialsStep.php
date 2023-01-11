<?php

	namespace App\Components;

	use App\Models\Credential;
	use Spatie\LivewireWizard\Components\StepComponent;

	class CredentialsStep extends StepComponent
	{

		protected $listeners = [
			'credential-added' => '$refresh',
			'credential-deleted' => '$refresh',
			'credential-updated' => '$refresh',
		];
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
			$credentials = Credential::where('customer_id', $this->state()->forStep('general-informations-step')['customer_id'])->get();
			return view('customer-wizard.steps.credentials', [
				'credentials' => $credentials
			]);
		}
	}