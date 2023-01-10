<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headquarter extends Model
{
    use HasFactory;

	protected $guarded = [];

	public function customer() {
		return $this->hasOne(Customer::class);
	}
}
