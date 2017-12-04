$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

/* Update Employee or Create Employee */

$(document).on('click', '.update-employee-button', function (e) {
	e.preventDefault();

	console.log($('.update-employee-button').attr("id"))

	var edit_form = $('#edit-form').serialize();
	var employee_id = $(this).val();
	var buttonState = $('.update-employee-button').attr("id");
	var type;
	var ajaxUrl;

	if (buttonState === "update-btn") {
		type = 'put';
		ajaxUrl = 'employee/' + employee_id;
	}

	if (buttonState === "add-btn") {
		console.log('haha');
		type = 'post';
		ajaxUrl = 'employee';
	}

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		type: type,
		url: ajaxUrl,
		data: edit_form,
		dataType: 'json',
		success: function (data) {

			console.log(data);

			if (data.sex === '0') {
				data.sex = 'Male';
			}
			if (data.sex === '1') {
				data.sex = 'Female';
			}
			var replacedData = '<tr data-id="' + data.id + '"><td>' +
				data.first_name + '</td>' + '<td>' + data.last_name + '</td>';
			replacedData += '<td><button class="btn btn-warning view-employee-button" data-toggle="modal" data-target="#viewModal"  value="' + data.id + '"> View </button>\n';
			replacedData += '<button class="btn btn-primary edit-employee-button" value="' + data.id + '"> Edit </button>\n';
			replacedData += '<button class="delete-modal btn btn-danger" data-toggle="modal" data-target="#deleteModal"  value="' + data.id + '"> Delete </button></td></tr>';
			console.log(data.id);
			console.log($("tr[data-id=" + data.id + "]"));

			if (buttonState === "update-btn") {
				$("tr[data-id=" + data.id + "]").replaceWith(replacedData);
			}
			else if (buttonState === "add-btn") {
				if ($(".table").length === 0) {
					$(".no-employees-text").hide();
					var addTable = '<table class="table"><tr id="table-heading"> <th>First Name</th> <th>Last Name</th></tr> ';
					addTable += '<tbody id="employee-list" name="employee-list"><tr>';
					$('.panel-body').append(addTable);
				}

				$('#employee-list').append(replacedData);
			}
		},
		error: function (data) {
			console.log('Error:', data);
		}
	});
});
$(document).on('click', '.delete-modal', function (e) {

	var employee_id = $(this).val();
	$(".delete-button").val(employee_id);
});

// Delete employee

$(document).ready(function () {
	$('.delete-button').on('click', function () {

		var employee_id = $(this).val();

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type: 'delete',
			url: 'employee/' + employee_id,
			success: function (data) {
				$("tr[data-id=" + employee_id + "]").remove();

				if ($('#employee-list tr td').length === 0) {
					$(".table").remove();
					$('.no-employees-text').show();
				}
			},
			error: function (data) {
				console.log('Error:', data)
			}
		});
	});
});

////----- Open the modal to UPDATE a Employee -----////

$(document).on('click', '.edit-employee-button', function (e) {

	jQuery.noConflict();
	$('#editModal').modal('show');

	$(".update-employee-button").attr("id", "update-btn");

	var employee_id = $(this).val();

	$(".edit-employee-title").text('Edit Employee');
	$(".update-employee-button").show();
	$(".update-employee-button").text('Update Employee');
	$(".update-employee-button").val(employee_id);

	// console.log(employee_id)
	$.get('employee/' + employee_id, function (employee) {
		$('#first_name').val(employee.first_name);
		$('#last_name').val(employee.last_name);
		$('#sex').val(employee.sex);
		$('#address').val(employee.address);
		$('#email').val(employee.email);
		$('#phone').val(employee.phone);
		$('#department').val(employee.department);
		$('#job').val(employee.job);
		$('#salary').val(employee.salary);
		$('#job_description').val(employee.job_description);
	})
});

$(document).on('click', '.view-employee-button', function (e) {

	var employee_id = $(this).val();

	$.get('employee/' + employee_id, function (employee) {
		$('#view-first-name').text(employee.first_name);
		$('#view-last-name').text(employee.last_name);
		if (employee.sex === 0) {
			$('#view-sex').text('Male');
		}
		else
			$('#view-sex').text('Female');

		$('#view-address').text(employee.address);
		$('#view-email').text(employee.email);
		$('#view-phone').text(employee.phone);
		$('#view-department').text(employee.department);
		$('#view-job').text(employee.job);
		$('#view-salary').text(employee.salary);
		$('#view-job-description').text(employee.job_description);
	})

});

$(document).ready(function () {
	$('.add-employee-button').on('click', function () {

		// change modal design

		$(".update-employee-button").attr("id", "add-btn");

		$(".edit-employee-title").text('Add Employee');
		$(".update-employee-button").show();
		$(".update-employee-button").text('Add Employee');

		// clear textfields

		$('#first_name').val("");
		$('#last_name').val("");
		$('#first_name').val("");
		$('#last_name').val("");
		$('#address').val("");
		$('#email').val("");
		$('#phone').val("");
		$('#department').val("");
		$('#job').val("");
		$('#salary').val("");
		$('#job_description').val("");
	});
});