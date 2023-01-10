<?php

	namespace App\Components;

	use App\Models\Customer;
	use Spatie\LivewireWizard\Components\WizardComponent;

	class CustomerWizard extends WizardComponent
	{
		public $customer;

		public function mount(Customer $customer) {
			$this->customer = $customer;
		}

		public function initialState(): array {
			return [
				'general-informations-step'  => [
					'customer_id' => $this->customer->id,
					'name'        => $this->customer->name ?? '',
					'group_id'    => $this->customer->group_id ?? null,
					'agent'       => $this->customer->agent ?? 0,
					'type'        => $this->customer->type ?? 'private'
				],
				'contact-informations-step'  => [
					'pec'                => $this->customer->pec ?? '',
					'notification_email' => $this->customer->notification_email ?? '',
					'vat_number'         => $this->customer->vat_number ?? '',
					'fiscal_code'        => $this->customer->fiscal_code ?? ''
				],
				'referent-step'              => [
					'referent_first_name' => $this->customer->referent->first_name ?? '',
					'referent_last_name'  => $this->customer->referent->last_name ?? '',
					'referent_email'      => $this->customer->referent->email ?? '',
					'referent_phone'      => $this->customer->referent->phone ?? ''
				],
				'headquarter-step'           => [
					'headquarter_street'   => $this->customer->headquarter->street ?? '',
					'headquarter_city'     => $this->customer->headquarter->city ?? '',
					'headquarter_province' => $this->customer->headquarter->province ?? '',
				],
				'legal_representatives-step' => [
					'legal_representative_first_name'  => $this->customer->legal_representative->first_name ?? '',
					'legal_representative_last_name'   => $this->customer->legal_representative->last_name ?? '',
					'legal_representative_fiscal_code' => $this->customer->legal_representative->fiscal_code ?? '',
					'legal_representative_street'      => $this->customer->legal_representative->street ?? '',
					'legal_representative_city'        => $this->customer->legal_representative->city ?? '',
					'legal_representative_province'    => $this->customer->legal_representative->province ?? '',
				],
				'notes-step'                 => [
					'note' => $this->customer->note ?? ''
				]
			];
		}

		public function steps(): array {
			return [
				GeneralInformationsStep::class,
				ContactInformationsStep::class,
				ReferentStep::class,
				HeadquarterStep::class,
				LegalRepresentativesStep::class,
				CredentialsStep::class,
				NotesStep::class,
			];
		}
	}