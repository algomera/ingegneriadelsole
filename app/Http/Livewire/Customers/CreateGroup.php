<?php

	namespace App\Http\Livewire\Customers;

	use App\Models\Group;
	use LivewireUI\Modal\ModalComponent;

	class CreateGroup extends ModalComponent
	{
		public $name;

		public function save() {
			$group = Group::create([
				'name' => $this->name,
			]);
			$this->dispatchBrowserEvent('open-notification', [
				'title' => 'Gruppo creato',
				'type'  => 'success',
			]);
			$this->emitTo('general-informations-step', 'group-created', $group->id);
			$this->closeModal();
		}

		public function render() {
			return view('livewire.customers.create-group');
		}
	}
