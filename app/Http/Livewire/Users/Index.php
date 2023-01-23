<?php

	namespace App\Http\Livewire\Users;

	use App\Models\Customer;
	use App\Models\Group;
	use App\Models\User;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Livewire\Component;
	use Spatie\Permission\Models\Role;

	class Index extends Component
	{
		use AuthorizesRequests;
		protected $listeners = [
			'user-created' => '$refresh',
			'user-updated' => '$refresh',
			'user-deleted' => '$refresh',
		];

		public function mount() {
			$this->authorize('user_access');
		}

		public function render() {
			$users = User::all()->except(auth()->user()->id);
			return view('livewire.users.index', [
				'users' => $users
			]);
		}
	}
