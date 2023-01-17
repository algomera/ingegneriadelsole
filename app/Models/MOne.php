<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class MOne extends Model
	{
		use HasFactory;

		protected $guarded = [];

		protected $casts = [
			'telemetering' => 'boolean'
		];

		public function system() {
			return $this->belongsTo(System::class);
		}
	}
