<!DOCTYPE html>
<html>
<head>
	<title>Generated Form</title>
	<script
	  src="https://code.jquery.com/jquery-3.2.1.min.js"
	  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	  crossorigin="anonymous"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="col-md-6 col-offset-md-6">
		<h1 class="before-form">This is Form</h1>
	</div>
</body>
</html>
<script type="text/javascript">
	var form = {};
var form_html = '';
var options_length;
var form_type = '';
$(document).ready(function () {
	$.ajax({
		url:'http://localhost:8000/forms/' + {{ $id }},
		type:'get',
		success:function (result) {
			form = JSON.parse(result);
			$('<form id="' + form.form_id + '" method="POST" action="' + form.action + '"></form>').insertAfter(".before-form");
			var form_dom = $("#" + form.form_id);
			var form_count = form.forms.length;
			for (var i = 0; i < form_count; i++) {
			var current_form = form.forms[i];
			html = "<label class='control-label' for='" + current_form.id + "'>" + current_form.label + "</label><br>";
			form_type = current_form.type;
			if ((form_type == 'text') || (form_type == 'number') || (form_type == 'email')) {
				html = html + "<input class='form-control' type='text' id='" + current_form.id + "' name='" + current_form.name + "' ";
				if (current_form.required) {
					html = html + "required";
				}
				html = html + ">";
			} else if ((form_type == 'checkbox') || (form_type == 'radio')) {
				options_length = current_form.options.length;
				for (var j = 0; j < options_length; j++) {
					html = html + "<input type='" + current_form.type + "' id='" + current_form.id + "' name='" + current_form.name + "' value='" + current_form.options[j].value + "' ";
					if (current_form.required) {
						html = html + "required";
					}
					html = html + ">" + current_form.options[j].text + "<br>";
				}
			} else if ((form_type == 'select')) {
				html = html + "<select class='form-control' id='" + current_form.id + "' name='" + current_form.name + "' ";
				options_length = current_form.options.length;
				if (current_form.required) {
						html = html + "required>";
					}
				for (var j = 0; j < options_length; j++) {
					html = html + "<option value='" + current_form.options[j].value + "'>" + current_form.options[j].text + "</option>"
				}
				html = html + "</select><br>"
			} else if ((form_type == 'textarea')) {
				html = html + "<textarea name='" + current_form.name + "' id='" + current_form.id + "'></textarea><br>";
			}
			html = html + "<br>";
			form_dom.append(html);
		}
		var button = "<input type='reset' class='btn btn-primary'></input> <input type='submit' class='btn btn-primary'></input>"
		form_dom.append(button);
		}
	});
})
</script>
</script>