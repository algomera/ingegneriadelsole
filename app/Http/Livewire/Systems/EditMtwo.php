<?php

	namespace App\Http\Livewire\Systems;

	use App\Models\MTwo;
	use LivewireUI\Modal\ModalComponent;

	class EditMtwo extends ModalComponent
	{
		public $m_two;
		protected $rules = [
			'm_two.brand'  => 'required',
			'm_two.number' => 'required',
			'm_two.k'      => 'required',
			'm_two.phone'  => 'required'
		];

		public function mount($m_two) {
			$this->m_two = MTwo::find($m_two);
		}

		public function delete() {
			if (auth()->user()->can('mtwo_delete')) {
				$this->m_two->delete();
				$this->emit('m-deleted');
			}
			$this->closeModal();
		}

		public function save() {
			if (auth()->user()->can('mtwo_update')) {
				$validated = $this->validate();
				$this->m_two->update($validated['m_two']);
				$this->emit('m-updated');
			}
			$this->closeModal();
		}

		public function render() {
			return view('livewire.systems.edit-mtwo');
		}
	}
