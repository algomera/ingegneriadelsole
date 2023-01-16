<?php

	namespace App\Http\Livewire\Systems;

	use App\Models\Customer;
	use App\Models\System;
	use Livewire\Component;

	class Show extends Component
	{
		public Customer $customer;
		public System $system;
		public $tabs = [];
		public $currentTab = null;

		public function mount(Customer $customer, System $system) {
			$this->customer = $customer;
			$this->system = $system;
			foreach (config('general.system.sections') as $k => $section) {
				$this->tabs[] = [
					'id'    => $k,
					'label' => $section['label']
				];
			}
			if ($this->tabs && $this->system[$this->tabs[0]['id']]) {
				$this->currentTab = $this->tabs[0]['id'];
			}
		}

		public function render() {
			return view('livewire.systems.show');
		}
	}
