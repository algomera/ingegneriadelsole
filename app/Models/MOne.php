<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MOne extends Model
{
    use HasFactory;

	public function system() {
		return $this->belongsTo(System::class);
	}
}
