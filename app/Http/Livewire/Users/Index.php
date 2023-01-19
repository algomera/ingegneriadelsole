<?php

	namespace App\Http\Livewire\Users;

	use App\Models\Customer;
	use App\Models\Group;
	use App\Models\User;
	use Livewire\Component;
	use Spatie\Permission\Models\Role;

	class Index extends Component
	{
		protected $listeners = [
			'user-created' => '$refresh',
			'user-updated' => '$refresh',
			'user-deleted' => '$refresh',
		];

		public function render() {
			$users = User::all()->except(auth()->user()->id);
			return view('livewire.users.index', [
				'users' => $users
			]);
		}
	}
