<?php

	namespace App\Http\Livewire\Customers;

	use App\Models\Customer;
	use App\Models\Headquarter;
	use App\Models\LegalRepresentative;
	use App\Models\Referent;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Livewire\Component;

	class Create extends Component
	{
		use AuthorizesRequests;

		public $name = '';
		public $group_id = null;
		public $agent = 0;
		public $type = 'private';
		public $pec = '';
		public $notification_email = '';
		public $vat_number = '';
		public $fiscal_code = '';
		public $referent_first_name = '';
		public $referent_last_name = '';
		public $referent_email = '';
		public $referent_phone = '';
		public $headquarter_street = '';
		public $headquarter_city = '';
		public $headquarter_province = '';
		public $legal_representatives_first_name = '';
		public $legal_representatives_last_name = '';
		public $legal_representatives_fiscal_code = '';
		public $legal_representatives_street = '';
		public $legal_representatives_city = '';
		public $legal_representatives_province = '';
		public $note = '';

		protected function rules() {
			return [
				'name'                             => 'required|string',
				'group_id'                         => 'nullable',
				'agent'                            => 'boolean',
				'type'                             => [
					'required',
					'in' => config('general.customer.types')
				],
				'pec'                              => 'required|email',
				'notification_email'               => 'required|email',
				'vat_number'                       => 'required|size:13',
				'fiscal_code'                      => 'required|size:16',
				'referent_first_name'              => 'required|string',
				'referent_last_name'               => 'required|string',
				'referent_email'                   => 'required|email',
				'referent_phone'                   => 'required',
				'headquarter_street'               => 'required|string',
				'headquarter_city'                 => 'required|string',
				'headquarter_province'             => 'required|string',
				'legal_representatives_first_name' => 'required|string',
				'legal_representatives_last_name'  => 'required|string',
				'legal_representatives_street'     => 'required|string',
				'legal_representatives_city'       => 'required|string',
				'legal_representatives_province'   => 'required|string',
				'note'                             => 'nullable'
			];
		}

		public function mount() {
			$this->authorize('customer_create');
		}

		public function submit() {
			$this->validate();
			$referent = Referent::create([
				'first_name' => $this->referent_first_name,
				'last_name'  => $this->referent_last_name,
				'email'      => $this->referent_email,
				'phone'      => $this->referent_phone
			]);
			$headquarter = Headquarter::create([
				'street'   => $this->headquarter_street,
				'city'     => $this->headquarter_city,
				'province' => $this->headquarter_province,
			]);
			$legal_representative = LegalRepresentative::create([
				'first_name'  => $this->legal_representatives_first_name,
				'last_name'   => $this->legal_representatives_last_name,
				'fiscal_code' => $this->legal_representatives_fiscal_code,
				'street'      => $this->legal_representatives_street,
				'city'        => $this->legal_representatives_city,
				'province'    => $this->legal_representatives_province,
			]);
			$customer = Customer::create([
				'name'                    => $this->name,
				'group_id'                => $this->group_id,
				'agent'                   => $this->agent,
				'type'                    => $this->type,
				'referent_id'             => $referent->id,
				'pec'                     => $this->pec,
				'notification_email'      => $this->notification_email,
				'vat_number'              => $this->vat_number,
				'fiscal_code'             => $this->fiscal_code,
				'headquarter_id'          => $headquarter->id,
				'legal_representative_id' => $legal_representative->id,
				'note'                    => $this->note,
			]);
			dd('Dati salvati');
		}

		public function render() {
			return view('livewire.customers.create');
		}
	}
