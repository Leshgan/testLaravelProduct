@extends('testLaravelPackage::layout')

@section('title')
	@if(isset($product))
		{{'Добавить новый продукт'}}
	@else 
		{{'Редактировать продукт'}}
	@endif
@endsection

@section('content')
	@if(isset($product))
		<h1>Редактировать продукт</h1>
	@else
		<h1>Добавить новый продукт</h1>
	@endif
	<div class="row">
		@if(isset($product))
			<form action="{{ route('test.product.update', ['product' => $product->id]) }}" method="post">
			@method('PUT')
		@else
			<form action="/product/store" method="POST">
		@endif
		
			@csrf
			<div class="form-group">
				<label for="name">Название</label>
				<input type="text" 
					class="form-control" 
					id="name" 
					name="name" 
					placeholder="Название продукта" 
					value="{{ old('name', $product->name ?? null) }}">
			</div>
			<div class="form-group">
				<label for="art">Артикул</label>
				<input type="text" 
					class="form-control" 
					id="art" 
					name="art" 
					placeholder="Артикул" 
					value="{{ old('art', $product->art ?? null) }}"
					@if(app('current_user_type') == 'manager')
						disabled
					@endif
					>
			</div>
			<button type="submit" class="btn btn-primary">{{isset($product) ? 'Сохранить' : 'Создать'}}</button>
		</form>
	</div>
	<div class="row">
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	</div>
	<div class="row">
		<a class="btn btn-default" href="{{ route('test.product.list') }}">К списку</a>
	</div>
@endsection