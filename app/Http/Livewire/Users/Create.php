<?php

	namespace App\Http\Livewire\Users;

	use App\Models\Group;
	use App\Models\User;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use LivewireUI\Modal\ModalComponent;
	use Spatie\Permission\Models\Role;

	class Create extends ModalComponent
	{
		use AuthorizesRequests;

		public $name;
		public $email;
		public $password;
		public $role;
		public $roles;

		public function mount() {
			$this->authorize('user_create');
			$this->roles = Role::all([
				'id',
				'name',
				'label'
			]);
			$this->role = $this->roles[0]->id;
		}

		public function save() {
			$user = User::create([
				'name'     => $this->name,
				'email'    => $this->email,
				'password' => bcrypt($this->password),
			]);
			$user->assignRole($this->role);
			$this->dispatchBrowserEvent('open-notification', [
				'title' => 'Utente creato',
				'type'  => 'success',
			]);
			$this->emit('user-created');
			$this->closeModal();
		}

		public function render() {
			return view('livewire.users.create');
		}
	}
