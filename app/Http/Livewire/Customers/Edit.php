<?php

namespace App\Http\Livewire\Customers;

use App\Models\Customer;
use Livewire\Component;

class Edit extends Component
{
	public Customer $customer;

	protected $listeners = [
		'system-added' => '$refresh',
	];

	public function mount(Customer $customer) {
		$this->customer = $customer;
	}
    public function render()
    {
        return view('livewire.customers.edit');
    }
}
