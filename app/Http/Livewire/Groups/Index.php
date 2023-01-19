<?php

	namespace App\Http\Livewire\Groups;

	use App\Models\Customer;
	use App\Models\Group;
	use Livewire\Component;

	class Index extends Component
	{
		protected $listeners = [
			'group-created' => '$refresh',
			'group-updated' => '$refresh',
			'group-deleted' => '$refresh',
		];

		public function render() {
			$groups = Group::all();
			return view('livewire.groups.index', [
				'groups' => $groups
			]);
		}
	}
