@extends('app')

@section('title', $title)

@section('pagestyle')
<style type="text/css">
.nopadding {
   padding: 0 !important;
   margin: 0 !important;
}
</style>
@endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<form method="POST" action="{{ url('forms') }}">
			{{ csrf_field() }}
			<input id="elements" type="hidden" name="elements" value="1">
			<div class="form-group">
				<label for="category">Category</label>
				<select name="category" class="form-control" required>
					<option value="">- Category -</option>
					@foreach ($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="module">Module</label>
				<select name="module" class="form-control" required>
					<option value="">- Module -</option>
					@foreach ($modules as $module)
					<option value="{{ $module->id }}">{{ $module->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="name">Form Name</label>
				<input type="text" name="name" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="table_name">Table Name</label>
				<input type="text" name="table_name" class="form-control" required>
			</div>
			<div id="element1" class="form-group">
				<label for="element1">Element 1</label>
				<div class="row">
					<div class="col-md-6">
						<input type="text" name="element1_name" class="form-control" placeholder="Name" required>
					</div>
					<div class="col-md-6">
						<select id="element1_type" name="element1_type" class="form-control" onchange="checkType(this)" required>
							<option value="">- Form Type -</option>
							<option value="text">Text</option>
							<option value="radio">Radio</option>
							<option value="checkbox">Checkbox</option>
							<option value="select">Select</option>
							<option value="textarea">Textarea</option>
						</select>
					</div>
				</div>
				<span id="additional1">
				
				</span>
			</div>
			<button id="add" class="btn btn-info" onclick="addElement()" type="button">Add Element</button>
			<button class="btn btn-success pull-right">Submit</button>
		</form>
	</div>
	<div class="col-md-6">
	</div>
</div>
@endsection

@section('pagescript')
<script type="text/javascript">
var element = 1;
function checkType(obj) {
	var id = '#' + $(obj).attr('id');
	var number = id.match(/\d/g).join("");
	var parent = '#' + $(id).parent().parent().parent().attr('id');
	var selected = $(id).val();
	$('#additional' + number).empty();
	switch(selected) {
		case ('text'):
			var html = '<div class="row"><div class="col-md-6"><input type="text" name="element' + number + '_id" class="form-control" placeholder="ID"></div><div class="col-md-6"><input type="text" name="element' + number + '_label" class="form-control" placeholder="Label"></div></div><div class="row"><div class="col-md-6"><input type="text" name="element' + number + '_length" class="form-control" placeholder="Max Length"></div><div class="col-md-6"><div class="checkbox"><label><input type="checkbox" name="element' + number + '_required" value="true" checked>Required</label></div></div></div>';
			$('#additional' + number).append(html);
			break;
		case('radio'):
			var html = '<div class="row"><div class="col-md-6"><input type="text" name="element' + number + '_id" class="form-control" placeholder="ID"></div><div class="col-md-6"><input type="text" name="element' + number + '_label" class="form-control" placeholder="Label"></div></div><div class="row"><div class="col-md-6 nopadding"><span id="element' + number + '_options" count="1"><input type="hidden" id="ele' + number + '_cnt" name="element' + number + '_options" value="1"><div class="col-md-6"><input type="text" name="element' + number + '_value1" class="form-control" placeholder="Value 1"></div><div class="col-md-6"><input type="text" name="element' + number + '_option1" class="form-control" placeholder="Option 1"></div></span></div><div class="col-md-1"><button id="addopts' + number + '" class="btn btn-success" onclick="addOption(this)" type="button"><i class="fa fa-plus"></i></button></div><div class="col-md-5"><div class="checkbox"><label><input type="checkbox" name="element' + number + '_required" value="true" checked>Required</label></div></div></div>';
			$('#additional' + number).append(html);
			break;
		case('checkbox'):
			var html = '<div class="row"><div class="col-md-6"><input type="text" name="element' + number + '_id" class="form-control" placeholder="ID"></div><div class="col-md-6"><input type="text" name="element' + number + '_label" class="form-control" placeholder="Label"></div></div><div class="row"><div class="col-md-6 nopadding"><span id="element' + number + '_options" count="1"><input type="hidden" id="ele' + number + '_cnt" name="element' + number + '_options" value="1"><div class="col-md-6"><input type="text" name="element' + number + '_value1" class="form-control" placeholder="Value 1"></div><div class="col-md-6"><input type="text" name="element' + number + '_option1" class="form-control" placeholder="Option 1"></div></span></div><div class="col-md-1"><button id="addopts' + number + '" class="btn btn-success" onclick="addOption(this)" type="button"><i class="fa fa-plus"></i></button></div></div>';
			$('#additional' + number).append(html);
			break;
		case('select'):
			var html = '<div class="row"><div class="col-md-6"><input type="text" name="element' + number + '_id" class="form-control" placeholder="ID"></div><div class="col-md-6"><input type="text" name="element' + number + '_label" class="form-control" placeholder="Label"></div></div><div class="row"><div class="col-md-6 nopadding"><span id="element' + number + '_options" count="1"><input type="hidden" id="ele' + number + '_cnt" name="element' + number + '_options" value="1"><div class="col-md-6"><input type="text" name="element' + number + '_value1" class="form-control" placeholder="Value 1"></div><div class="col-md-6"><input type="text" name="element' + number + '_option1" class="form-control" placeholder="Option 1"></div></span></div><div class="col-md-1"><button id="addopts' + number + '" class="btn btn-success" onclick="addOption(this)" type="button"><i class="fa fa-plus"></i></button></div><div class="col-md-5"><div class="checkbox"><label><input type="checkbox" name="element' + number + '_required" value="true" checked>Required</label></div></div></div>';
			$('#additional' + number).append(html);
			break;
		case ('textarea'):
			var html = '<div class="row"><div class="col-md-6"><input type="text" name="element' + number + '_id" class="form-control" placeholder="ID"></div><div class="col-md-6"><input type="text" name="element' + number + '_label" class="form-control" placeholder="Label"></div></div><div class="row"><div class="col-md-6"><input type="text" name="element' + number + '_length" class="form-control" placeholder="Max Length"></div><div class="col-md-6"><div class="checkbox"><label><input type="checkbox" name="element' + number + '_required" value="true" checked>Required</label></div></div></div>';
			$('#additional' + number).append(html);
			break;
		default:
			break;
	}
}

function addElement() {
	element += 1;
	$('#elements').val(element);
	var html = '<div id="element' + element + '" class="form-group"><label for="element' + element + '">Element ' + element + '</label><div class="row"><div class="col-md-6"><input type="text" name="element' + element + '_name" class="form-control" placeholder="Name" required></div><div class="col-md-6"><select id="element' + element + '_type" name="element' + element + '_type" class="form-control" onchange="checkType(this)" required><option value="">- Form Type -</option><option value="text">Text</option><option value="radio">Radio</option><option value="checkbox">Checkbox</option><option value="select">Select</option><option value="textarea">Textarea</option></select></div></div><span id="additional' + element + '"></span></div>';
	$(html).insertAfter('#element' + (element - 1));
}

function addOption(obj) {
	var id = '#' + $(obj).attr('id');
	var number = id.match(/\d/g).join("");
	var count = $('#element' + number + '_options').attr('count');
	count++;
	$('#ele' + number + '_cnt').val(count);
	$('#element' + number + '_options').attr('count', count);
	var html = '<div class="col-md-6"><input type="text" name="element' + number + '_value' + count + '" class="form-control" placeholder="Value ' + count + '"></div><div class="col-md-6"><input type="text" name="element' + number + '_option' + count + '" class="form-control" placeholder="Option ' + count + '"></div>';
	$('#element' + number + '_options').append(html);
}

</script>
@endsection