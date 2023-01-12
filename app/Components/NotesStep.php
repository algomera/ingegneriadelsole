<?php

	namespace App\Components;
	use App\Models\Customer;
	use Spatie\LivewireWizard\Components\StepComponent;

	class NotesStep extends StepComponent
	{
		public $customer, $note;

		protected $rules = [
			'note' => 'nullable'
		];

		public function mount() {
			$this->customer = Customer::find($this->state()->forStep('general-informations-step')['customer_id']);
		}

		public function next() {
			$this->validate();
			$this->customer->update([
				'note' => $this->note
			]);
//			$this->nextStep();
			dd("ok");
		}
		public function stepInfo(): array
		{
			return [
				'label' => 'Note aggiuntive',
			];
		}
		public function render() {
			return view('customer-wizard.steps.notes');
		}
	}