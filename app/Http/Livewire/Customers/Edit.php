<?php

	namespace App\Http\Livewire\Customers;

	use App\Models\Customer;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Livewire\Component;

	class Edit extends Component
	{
		use AuthorizesRequests;

		public Customer $customer;
		protected $listeners = [
			'system-added' => '$refresh',
		];

		public function mount(Customer $customer) {
			$this->authorize('customer_update');
			$this->customer = $customer;
		}

		public function render() {
			return view('livewire.customers.edit');
		}
	}
