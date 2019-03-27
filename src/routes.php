<?php

Route::middleware('web')->prefix('product')->name('test.product.')->group(function () {
	Route::get('', 'Leshgan\testLaravelPackage\ProductController@index')
	->name('list');
	Route::post('store', 'Leshgan\testLaravelPackage\ProductController@store')
		->name('store');
	Route::view('create', 'testLaravelPackage::create')
		->name('create');
	Route::get('{product}/edit', 'Leshgan\testLaravelPackage\ProductController@edit')
		->name('edit');
	Route::put('/{product}', 'Leshgan\testLaravelPackage\ProductController@update')
		->name('update');
});


