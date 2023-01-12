<?php

	namespace App\Components;

	use App\Models\Customer;
	use App\Models\LegalRepresentative;
	use Spatie\LivewireWizard\Components\StepComponent;

	class LegalRepresentativesStep extends StepComponent
	{
		public $customer, $legal_representative_first_name, $legal_representative_last_name, $legal_representative_fiscal_code, $legal_representative_street, $legal_representative_city, $legal_representative_province;
		protected $rules = [
			'legal_representative_first_name' => 'required|string',
			'legal_representative_last_name'  => 'required|string',
			'legal_representative_street'     => 'required|string',
			'legal_representative_city'       => 'required|string',
			'legal_representative_province'   => 'required|string',
		];

		public function mount() {
			$this->customer = Customer::find($this->state()->forStep('general-informations-step')['customer_id']) ?: Customer::latest()->first();
		}

		public function next() {
			$this->validate();
			$legal_representative = LegalRepresentative::updateOrCreate(['id' => $this->customer->legal_representative->id], [
				'first_name'  => $this->legal_representative_first_name,
				'last_name'   => $this->legal_representative_last_name,
				'fiscal_code' => $this->legal_representative_fiscal_code,
				'street'      => $this->legal_representative_street,
				'city'        => $this->legal_representative_city,
				'province'    => $this->legal_representative_province,
			]);
			$this->customer->update([
				'legal_representative_id' => $legal_representative->id
			]);
			$this->nextStep();
		}

		public function stepInfo(): array {
			return [
				'label' => 'Rappresentante Legale',
			];
		}

		public function render() {
			return view('customer-wizard.steps.legal_representative');
		}
	}