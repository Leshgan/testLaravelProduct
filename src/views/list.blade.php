@extends('testLaravelPackage::layout')
@section('title')
	{{$title}}
@endsection

@section('content')
	<div class="row">
		<h1>Список продуктов</h1>
	</div>
	<div class="row">
		<div class="col">
			<a class="btn btn-primary pull-right" href="{{ route('test.product.create') }}">Добавить</a>
		</div>
	</div>
	@if(count($products) > 0)
		<div class="row">
			<table class="table">
				<thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Название</th>
				      <th scope="col">Актикул</th>
				      <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach ($products as $product)
						<tr>
							<th scope="row">{{$loop->index + 1}}</th>
							<td>{{ $product->name }}</td>
							<td>{{ $product->art }}</td>
							<td><a href="{{ route('test.product.edit', ['product' => $product->id]) }}" class="btn btn-primary">Редактировать</a></td>
						</tr>
				  	@endforeach
				  </tbody>
			</table>
		</div>
	@endif

@endsection