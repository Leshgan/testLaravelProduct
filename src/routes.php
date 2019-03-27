<?php

Route::middleware('web')->prefix('product')->name('test.product.')->group(function () {
	Route::get('', 'Leshgans\TestLaravelPackage\ProductController@index')
	->name('list');
	Route::post('store', 'Leshgans\TestLaravelPackage\ProductController@store')
		->name('store');
	Route::view('create', 'testLaravelPackage::create')
		->name('create');
	Route::get('{product}/edit', 'Leshgans\TestLaravelPackage\ProductController@edit')
		->name('edit');
	Route::put('/{product}', 'Leshgans\TestLaravelPackage\ProductController@update')
		->name('update');
});


