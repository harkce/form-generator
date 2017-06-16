@extends('app')

@section('title', $title)

@section('content')
<div class="row">
	<div class="col-md-6">
		<form method="POST" action="{{ url('modules') }}">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="category">KPI</label>
				<select name="category" class="form-control" required>
					<option value="">- KPI -</option>
					@foreach ($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
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
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="icon">Icon</label>
				<input type="text" name="icon" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	<div class="col-md-6">
		@foreach ($categories as $category)
		<h3>{{ $category->name }}</h3>
		<ul style="list-style-type:none">
			@foreach ($category->modules as $module)
			<li><i class="fa {{ $module->icon }}"></i> {{ $module->name }}</li>
			@endforeach
		</ul>
		@endforeach
	</div>
</div>
@endsection