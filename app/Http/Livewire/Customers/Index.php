<?php

	namespace App\Http\Livewire\Customers;

	use App\Models\Customer;
	use Livewire\Component;

	class Index extends Component
	{
		public function render() {
			$customers = Customer::all();
			return view('livewire.customers.index', [
				'customers' => $customers
			]);
		}
	}
