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

	public function adm() {
		return $this->hasOne(Adm::class);
	}
}
