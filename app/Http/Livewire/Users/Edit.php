<?php

	namespace App\Http\Livewire\Users;

	use App\Models\User;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use LivewireUI\Modal\ModalComponent;
	use Spatie\Permission\Models\Role;

	class Edit extends ModalComponent
	{
		use AuthorizesRequests;

		public User $user;
		public $name;
		public $email;
		public $password;
		public $role;
		public $roles;

		public function mount($id) {
			$this->authorize('user_update');
			$this->user = User::find($id);
			$this->roles = Role::all([
				'id',
				'name',
				'label'
			]);
			$this->name = $this->user->name;
			$this->email = $this->user->email;
			$this->role = $this->user->role->id;
		}

		protected function rules() {
			return [
				'name'     => 'required|string',
				'email'    => 'required|email|unique:users,email,' . $this->user->id,
				'password' => 'sometimes|nullable|min:8',
				'role'     => 'required'
			];
		}

		public function delete() {
			$this->authorize('user_delete');
			$this->user->delete();
			$this->emit('user-deleted');
			$this->closeModal();
		}

		public function save() {
			$validated = $this->validate();
			$this->user->update([
				'name'     => $this->name,
				'email'    => $this->email,
				'password' => $validated['password'] ? bcrypt($validated['password']) : $this->user->getAuthPassword()
			]);
			$this->user->assignRole(Role::whereId($this->role)->first());
			$this->dispatchBrowserEvent('open-notification', [
				'title' => 'Utente aggiornato',
				'type'  => 'success',
			]);
			$this->emit('user-updated');
			$this->closeModal();
		}

		public function render() {
			return view('livewire.users.edit');
		}
	}
