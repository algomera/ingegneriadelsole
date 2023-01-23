<?php

	namespace App\Http\Livewire\Groups;

	use App\Models\Group;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use LivewireUI\Modal\ModalComponent;

	class Create extends ModalComponent
	{
		use AuthorizesRequests;

		public $name;

		public function mount() {
			$this->authorize('group_create');
		}

		public function save() {
			$group = Group::create([
				'name' => $this->name,
			]);
			$this->dispatchBrowserEvent('open-notification', [
				'title' => 'Gruppo creato',
				'type'  => 'success',
			]);
			$this->emit('group-created', $group->id);
			$this->closeModal();
		}

		public function render() {
			return view('livewire.groups.create');
		}
	}
