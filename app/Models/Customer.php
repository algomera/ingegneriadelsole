<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class Customer extends Model
	{
		use HasFactory;

		public function group() {
			return $this->belongsTo(Group::class);
		}

		public function referent() {
			return $this->belongsTo(Referent::class);
		}

		public function headquarter() {
			return $this->belongsTo(Headquarter::class);
		}

		public function legal_representative() {
			return $this->belongsTo(LegalRepresentative::class);
		}

		public function credentials() {
			return $this->hasMany(Credential::class);
		}

		public function systems() {
			return $this->hasMany(System::class);
		}
	}
