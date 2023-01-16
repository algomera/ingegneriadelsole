<?php

	use Illuminate\Support\Facades\Route;

	/*
	|--------------------------------------------------------------------------
	| Web Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register web routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| contains the "web" middleware group. Now create something great!
	|
	*/
	Route::get('/', function () {
		return view('welcome');
	});
	Route::middleware([
		'auth:sanctum',
		config('jetstream.auth_session'),
		'verified'
	])->group(function () {
		Route::get('/dashboard', function () {
			return view('dashboard');
		})->name('dashboard');
		//// Customers
		Route::get('/customers', [
			\App\Http\Livewire\Customers\Index::class,
			'__invoke'
		])->name('customers');
		Route::get('/customers/create', [
			\App\Http\Livewire\Customers\Create::class,
			'__invoke'
		])->name('customers.create');
		Route::get('/customers/{customer}', [
			\App\Http\Livewire\Customers\Show::class,
			'__invoke'
		])->name('customers.show');
		//// Systems
		Route::get('/customers/{customer}/systems/{system}', [
			\App\Http\Livewire\Systems\Show::class,
			'__invoke'
		])->name('customers.systems.show');
	});
