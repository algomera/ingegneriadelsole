<?php

	namespace App\Http\Livewire\Customers;

	use App\Models\Customer;
	use Livewire\Component;

	class Show extends Component
	{
		public Customer $customer;
		public $currentTab = 'general_informations';
		public $tabs = [
			'general_informations' => ['label' => "Informazioni generali"],
			'contact_informations' => ['label' => 'Informazioni di contatto'],
			'referent'             => ['label' => 'Referente'],
			'headquarter'          => ['label' => 'Sede Legale'],
			'legal_representative' => ['label' => 'Rappresentante Legale'],
			'credentials'          => ['label' => 'Credenziali'],
			'notes'                => ['label' => 'Note aggiuntive']
		];
		protected $listeners = [
			'system-added' => '$refresh',
		];

		public function mount(Customer $customer) {
			$this->customer = $customer;
		}

		public function render() {
			return view('livewire.customers.show');
		}
	}
