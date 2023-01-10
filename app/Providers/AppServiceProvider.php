<?php

namespace App\Providers;

use App\Components\ContactInformationsStep;
use App\Components\CredentialsStep;
use App\Components\CustomerWizard;
use App\Components\GeneralInformationsStep;
use App\Components\HeadquarterStep;
use App\Components\LegalRepresentativesStep;
use App\Components\NotesStep;
use App\Components\ReferentStep;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
	    Livewire::component('customer-wizard', CustomerWizard::class);
	    Livewire::component('general-informations-step', GeneralInformationsStep::class);
	    Livewire::component('contact-informations-step', ContactInformationsStep::class);
	    Livewire::component('referent-step', ReferentStep::class);
	    Livewire::component('headquarter-step', HeadquarterStep::class);
	    Livewire::component('legal_representatives-step', LegalRepresentativesStep::class);
	    Livewire::component('credentials-step', CredentialsStep::class);
	    Livewire::component('notes-step', NotesStep::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
