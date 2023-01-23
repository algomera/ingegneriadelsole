<?php

	namespace App\Http\Livewire\Groups;

	use App\Models\Customer;
	use App\Models\Group;
	use App\Models\System;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use LivewireUI\Modal\ModalComponent;

	class Edit extends ModalComponent
	{
		use AuthorizesRequests;
		public $group;

		protected function rules() {
			return [
				'group.name' => 'required|string',
			];
		}

		public static function modalMaxWidth(): string {
			return '5xl';
		}

		public function mount(Group $group) {
			$this->authorize('group_update');
			$this->group = $group;
		}

		public function delete() {
			$this->authorize('group_delete');
			$customers = Customer::where('group_id', $this->group->id)->get();
			foreach ($customers as $customer) {
				$customer->update([
					'group_id' => null
				]);
			}
			$this->group->delete();
			$this->emit('group-deleted');
			$this->dispatchBrowserEvent('open-notification', [
				'title' => 'Gruppo eliminato',
				'type'  => 'success',
			]);
			$this->closeModal();
		}

		public function save() {
			$this->validate();
			$this->group->update($this->validate()['group']);
			$this->emit('group-updated');
			$this->dispatchBrowserEvent('open-notification', [
				'title' => 'Gruppo aggiornato',
				'type'  => 'success',
			]);
			$this->closeModal();
		}

		public function render() {
			return view('livewire.groups.edit');
		}
	}
