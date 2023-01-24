<?php

	namespace App\Http\Livewire\Systems;

	use App\Models\MOne;
	use LivewireUI\Modal\ModalComponent;

	class EditMone extends ModalComponent
	{
		public $m_one;
		protected $rules = [
			'm_one.brand'  => 'required',
			'm_one.number' => 'required',
			'm_one.k'      => 'required',
			'm_one.phone'  => 'required'
		];

		public function mount($m_one) {
			$this->m_one = MOne::find($m_one);
		}

		public function delete() {
			if (auth()->user()->can('mone_delete')) {
				$this->m_one->delete();
				$this->emit('m-deleted');
			}
			$this->closeModal();
		}

		public function save() {
			if (auth()->user()->can('mone_update')) {
				$validated = $this->validate();
				$this->m_one->update($validated['m_one']);
				$this->emit('m-updated');
			}
			$this->closeModal();
		}

		public function render() {
			return view('livewire.systems.edit-mone');
		}
	}
