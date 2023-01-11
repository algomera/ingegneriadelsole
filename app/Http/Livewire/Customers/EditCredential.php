<?php

	namespace App\Http\Livewire\Customers;

	use App\Models\Credential;
	use LivewireUI\Modal\ModalComponent;

	class EditCredential extends ModalComponent
	{
		public $credential;
		public $type = 'e-distribuzione';
		public $showService = false;
		public $service = '';
		public $username;
		public $password;

		public function mount($credential_id) {
			$this->credential = Credential::find($credential_id);
			$this->type = $this->credential->type;
			$this->service = $this->credential->service;
			$this->showService = $this->type === 'altro';
			$this->username = $this->credential->username;
			$this->password = $this->credential->password;
		}

		public function updatedType($value) {
			if($value === 'altro') {
				$this->service = '';
				$this->showService = true;
			} else {
				$this->service = '';
				$this->showService = false;
			}
		}

		public function save() {
			$this->credential->update([
				'type' => $this->type,
				'service' => $this->type !== 'altro' ? config('general.credentials.types.'.$this->type) : $this->service,
				'username' => $this->username,
				'password' => $this->password
			]);
			$this->emit('credential-updated');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => 'Credenziale Modificata',
				'type' => 'success',
			]);
			$this->closeModal();
		}
		public function render() {
			return view('livewire.customers.edit-credential');
		}
	}
