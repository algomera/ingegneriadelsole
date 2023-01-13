<?php

	namespace App\Http\Livewire\Customers;

	use LivewireUI\Modal\ModalComponent;

	class CreateM extends ModalComponent
	{
		public $type, $brand, $number, $k, $phone;

		public function mount($type) {
			$this->type = $type;
		}

		public function save() {
			$this->emit('m-created', [
				'type'   => $this->type,
				'brand'  => $this->brand,
				'number' => $this->number,
				'k'      => $this->k,
				'phone'  => $this->phone
			]);
			$this->closeModal();

			$this->brand = '';
			$this->number = '';
			$this->k = '';
			$this->phone = '';
		}

		public function render() {
			return view('livewire.customers.create-m');
		}
	}
