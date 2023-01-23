<?php

	namespace App\Http\Livewire\Groups;

	use App\Models\Customer;
	use App\Models\Group;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Livewire\Component;

	class Index extends Component
	{
		use AuthorizesRequests;
		protected $listeners = [
			'group-created' => '$refresh',
			'group-updated' => '$refresh',
			'group-deleted' => '$refresh',
		];

		public function mount() {
			$this->authorize('group_access');
		}

		public function render() {
			$groups = Group::all();
			return view('livewire.groups.index', [
				'groups' => $groups
			]);
		}
	}
