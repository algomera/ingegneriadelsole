<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class System extends Model
	{
		use HasFactory;

		protected $guarded = [];

		public function customer() {
			return $this->belongsTo(Customer::class);
		}

		public function m_one() {
			return $this->hasOne(MOne::class);
		}

		public function m_twos() {
			return $this->hasMany(MTwo::class);
		}

		public function section_adm() {
			return $this->hasOne(Adm::class);
		}

		public function section_arera() {
			return $this->hasOne(Arera::class);
		}

		public function section_e_distribuzione() {
			return $this->hasOne(EDistribuzione::class);
		}

		public function section_gse() {
			return $this->hasOne(Gse::class);
		}

		public function section_terna() {
			return $this->hasOne(Terna::class);
		}

		public function section_reconciliation() {
			return $this->hasOne(Reconciliation::class);
		}
	}
