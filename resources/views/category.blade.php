@extends('app')

@section('title', $title)

@section('content')
<div class="row">
	<div class="col-md-6">
		<form method="POST" action="{{ url('categories') }}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="order">Order</label>
				<select name="order" class="form-control" required>
					<option value="">- Order -</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	<div class="col-md-6">
		<h3>Department List</h3>
		<ul>
		@foreach ($categories as $category)
			<li>{{ $category->name }}</li>
		@endforeach
		</ul>
	</div>
</div>
@endsection