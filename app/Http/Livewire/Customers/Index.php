<?php

	namespace App\Http\Livewire\Customers;

	use App\Models\Customer;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Livewire\Component;

	class Index extends Component
	{
		use AuthorizesRequests;
		public function mount() {
			$this->authorize('customer_access');
		}
		public function render() {
			$customers = Customer::all();
			return view('livewire.customers.index', [
				'customers' => $customers
			]);
		}
	}
