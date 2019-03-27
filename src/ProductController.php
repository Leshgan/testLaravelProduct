<?php

namespace Leshgan\testLaravelPackage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
	/**
	 * Отобразить список продуктов
	 * @return view
	 */
    public function index()
    {
    	$products = Product::orderBy('id', 'desc')->get();
    	return view('testLaravelPackage::list', [
    		'title' => 'Список продуктов',
    		'products' => $products
    	]);
    }

    /**
     *  Создание продукта
     * @param  Request $request 
     * @return redirect
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|string|min:10',
    		'art' => 'required|regex:/^[a-zA-Z0-9]+$/u|unique:products'
    	]);
    	Product::create($request->only(['name', 'art']));

    	return redirect()->route('test.product.list');
    }


    public function edit(Product $product)
    {
    	return view('testLaravelPackage::create', ['product' => $product]);
    }

    /**
     * Редактирование продукта
     * @param  Request $request
     * @param  Product $product
     * @return redirect
     */
    public function update(Request $request, Product $product)
    {
    	$this->validate($request, [
    		'name' => 'required|string|min:10',
    		'art' => 'required|regex:/^[a-zA-Z0-9]+$/u|unique:products,art,' . $product->id
    	]);

    	$product->name = $request->name;
    	if (app('current_user_type') == 'admin') {
    		$product->art = $request->art;
    	}
    	$product->save();

    	return redirect()->route('test.product.list');
    }
}
