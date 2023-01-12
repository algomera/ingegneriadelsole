<?php

	namespace App\Components;

	use App\Models\Customer;
	use Spatie\LivewireWizard\Components\StepComponent;

	class ContactInformationsStep extends StepComponent
	{
		public $customer, $pec, $notification_email, $vat_number, $fiscal_code;
		protected $rules = [
			'pec'                => 'required|email',
			'notification_email' => 'required|email',
			'vat_number'         => 'required|size:13',
			'fiscal_code'        => 'required|size:16',
		];

		public function mount() {
			$this->customer = Customer::find($this->state()->forStep('general-informations-step')['customer_id']);
		}

		public function next() {
			$this->validate();
			$this->customer->update([
				'pec'                => $this->pec,
				'notification_email' => $this->notification_email,
				'vat_number'         => $this->vat_number,
				'fiscal_code'        => $this->fiscal_code,
			]);
			$this->nextStep();
		}

		public function stepInfo(): array {
			return [
				'label' => 'Informazioni di contatto'
			];
		}

		public function render() {
			return view('customer-wizard.steps.contact-informations');
		}
	}