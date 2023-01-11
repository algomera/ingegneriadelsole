<?php

	namespace App\Components;

	use App\Models\Customer;
	use App\Models\Group;
	use Spatie\LivewireWizard\Components\StepComponent;

	class GeneralInformationsStep extends StepComponent
	{
		public $customer_id, $name, $group_id, $agent, $type;

		protected $listeners = [
			'group-created' => 'selectGroup'
		];
		protected $rules = [
			'name'     => 'required|string',
			'group_id' => 'nullable',
			'agent'    => 'boolean',
			'type'     => 'in:private,company',
		];

		public function selectGroup($id) {
			$this->group_id = $id;
		}

		public function next() {
			$this->validate();
			Customer::updateOrCreate(['id' => $this->customer_id], [
				'name'     => $this->name,
				'group_id' => $this->group_id === "null" ? null : $this->group_id,
				'agent'    => $this->agent,
				'type'     => $this->type,
			])->id;
			$this->nextStep();
		}

		public function stepInfo(): array {
			return [
				'label' => 'Informazioni generali',
			];
		}

		public function render() {
			$groups = Group::all();
			return view('customer-wizard.steps.general-informations', [
				'groups' => $groups
			]);
		}
	}