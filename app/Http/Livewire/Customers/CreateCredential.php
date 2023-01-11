<?php

	namespace App\Http\Livewire\Customers;

	use App\Models\Customer;
	use LivewireUI\Modal\ModalComponent;

	class CreateCredential extends ModalComponent
	{
		public $customer;
		public $type = 'e-distribuzione';
		public $showService = false;
		public $service = '';
		public $username;
		public $password;

		public function mount($customer_id) {
			$this->customer = Customer::find($customer_id);
		}

		public function updatedType($value) {
			if($value === 'altro') {
				$this->showService = true;
			} else {
				$this->service = '';
				$this->showService = false;
			}
		}

		public function save() {
			$this->customer->credentials()->create([
				'type' => $this->type,
				'service' => $this->type !== 'altro' ? config('general.credentials.types.'.$this->type) : $this->service,
				'username' => $this->username,
				'password' => $this->password
			]);
			$this->emit('credential-added');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => 'Credenziale Aggiunta',
				'type' => 'success',
			]);
			$this->closeModal();
		}
		public function render() {
			return view('livewire.customers.create-credential');
		}
	}
