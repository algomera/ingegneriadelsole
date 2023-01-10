<?php

namespace App\Http\Livewire\Customers;

use App\Models\Customer;
use Livewire\Component;

class Show extends Component
{
	public function mount(Customer $customer) {
		dd($customer);
	}
    public function render()
    {
        return view('livewire.customers.show');
    }
}
