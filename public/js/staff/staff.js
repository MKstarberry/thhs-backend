
var formTitle = $('#formTitle');
var formname = "save_staff_form";
/**DataTable */
$('#staff_datatable').dataTable({
	"lengthChange": false,
	"order": [],
	"columnDefs": [{
		"targets": 9,
		"bSort": false,
		"orderable": false
	}],
	autoWidth: false,
	initComplete: function () {
		this.api()
			.columns()
			.every(function () {
				let column = this;
				// let title = column.footer().textContent;

				// Create input element
				// let input = document.createElement('input');
				// input.placeholder = title;
				// column.footer().replaceChildren(input);

				// Event listener for user input
				// input.addEventListener('keyup', () => {
				//     if (column.search() !== this.value) {
				//         column.search(input.value).draw();
				//     }
				// });
			});
	}
});

/**Table filter */ 
$('#filter_status').on('change', function () {
	var table = $('#staff_datatable').DataTable();
	table.column(7).
		search(this.value && `^${this.value}$`, true, false).
		draw();
});
// $('#filter_organization').on('change', function() {
// 	var table = $('#staff_datatable').DataTable();
// 	table.column(7).
// 	  search(this.value && `^${this.value}$`, true, false).
// 		draw();
// });

/**Form validation */
$(document).on('click', '#save_staff_btn', function () {
	jQuery(`#${formname}`).validate({
		rules: {
			firstname: {
				required: true,
				minlength: 1,
				maxlength: 40,
				lettersonly: true
			},
			lastname: {
				required: true,
				minlength: 1,
				maxlength: 40,
				lettersonly: true,
			},
			email: {
				required: true,
				maxlength: 64,
				validmail: true,
				noSpace: true,
			},
			submit_date: {
				required: true,
			},
			termination_date: {
				required: true,
			},
			ssn: {
				required: true,
			},
			organization: {
				required: true,
			},
			position: {
				required: true,
			},
			gender: {
				required: true,
			},
			language: {
				required: true,
			},
			employment_type: {
				required: true,
			},
			staff_status: {
				required: true,
			}
		},

		messages: {
			firstname: {
				required: "First Name cannot be empty",
				maxlength: "First Name cannot exceed 40 characters",
				lettersonly: "First Name should contain only alphabets",
			},
			lastname: {
				required: "Last Name cannot be empty",
				maxlength: "Last Name cannot exceed 40 characters",
				lettersonly: "Last Name should contain only alphabets",
			},

			email: {
				required: "Email ID cannot be empty",
				maxlength: "Email address cannot exceed 64 characters",
				validmail: "Enter a valid Email ID",
				noSpace: "Space are not allowed",
			},

			submit_date: {
				required: "Date hired cannot be empty",
			},
			termination_date: {
				required: "Terminatio Date hired cannot be empty",
			},

			ssn: {
				required: "SSN cannot be empty",
			},
			organization: {
				required: "Organization cannot be empty",
			},
			gender: {
				required: "Gender cannot be empty",
			},
			language: {
				required: "Language cannot be empty",
			},
			staff_status: {
				required: "Status cannot be empty",
			},
			corporation_name: {
				required: "corporation cannot be empty",
			},
			employment_type: {
				required: "Tax cannot be empty",
			},
			position: {
				required: "Position cannot be empty",
			},
			submit_date: {
				required: "Submit Date cannot be empty",

			},
		},
		errorElement: "span",
		errorPlacement: function (error, element) {

			$('span.removeclass-valid').remove();
			var placement = $(element).data('error');
			if (placement) {
				$(placement).append(error)
			} else {
				if (element.hasClass('select2') && element.next('.select2-container').length) {
					error.insertAfter(element.next('.select2-container'));
				} else {
					error.insertAfter(element);
				}
			}
		}
	});
}); 

/**Form Submit */
$(document).on('submit', `#${formname}`, function (e) {
	var form = $(`#${formname}`);
	var formBtnId = 'save_staff_btn';
	if ($(this).hasClass('ajax-form')) {
		e.preventDefault()
		let url = $(this).attr('action');
		let target = ('#' + $(this).attr('id') == '#undefined') ? 'body' : '#' + $(this).attr('id');
		var formData = new FormData(this);
		loadingButton(formBtnId)
		$.ajax({
			url: url,
			type: "POST",
			data: formData,
			contentType: false,
			dataType: 'json',
			processData: false,
			success: function (data) {
				unloadingButton(formBtnId)
				form.trigger("reset");
				if (data.status) {
					toastr.success(data.message)
					location.reload();
				} else {
					toastr.error(data.message)
				}

			},
			error: function (err) {
				unloadingButton(formBtnId)
				if (err.responseJSON) {
					toastr.error(err.responseJSON.message)
				}
				handleFail(err.responseJSON, {
					container: target,
					errorPosition: "field"
				})
				// location.reload();
			}
		});
	}
});


/**Delete Popup */ 
$(function () {
	$(".cancel_btn").click(function () {
		$('.offcanvas').offcanvas('hide');
	});
});
$(document).on('click', 'button', function (e) {
	if ($(this).attr("data-dismiss") == "modal") {
		$(".modal").modal("hide");
	}
})
$(document).on('click', '#confirm_btn', function (e) {
	eval($("#function_name").val() + "()");
});
function delete_staff_confirmation() {
	$("#modal_msg").text("Are you sure want delete the Staff?");
	$("#function_name").val("delete_staff");
	$("#ConfirmModal").modal("show");
}



/**Open Popup */  
function openStaffPopup() {
	formTitle.text('Add new Staff');
	$('.hideField').show();
	$('.offcanvas').offcanvas('show');
	$(`#${formname}`).trigger("reset")
	$(`#${formname} [name=id]`).val('');
	uploadClear();
}

/**Upload Clear */  
function uploadClear() {
	const preview = document.getElementById("signature_image");
	preview.src = "";
	$(`#signature_image`).hide()
	$(`#signature64`).val("")
	$(`#upload_button`).text("Upload your e signature")
} 

/**Get Details */  
function get_staff(id) {
	formTitle.text('Edit Staff');
	$('.hideField').hide();
	$.ajax({
		url: `${location.pathname}/get_staff/${id}`,
		type: "GET",
		contentType: false,
		dataType: 'json',
		success: function (response) {
			$('.offcanvas').offcanvas('show');
			uploadClear();
			let staff = response.data.staff
			$(`#${formname} [name=id]`).val(staff.id);
			$(`#${formname} [name=firstname]`).val(staff.firstname);
			$(`#${formname} [name=middlename]`).val(staff.middlename);
			$(`#${formname} [name=lastname]`).val(staff.lastname);
			$(`#${formname} [name=dob]`).val(moment(staff.birth_date).format('MM/DD/YYYY'));
			$(`#${formname} [name=submit_date]`).val(moment(staff.hire_date).format('MM/DD/YYYY'));
			$(`#${formname} [name=ssn]`).val(staff.ssn);
			$(`#${formname} [name=organization]`).val(staff.organization);
			$(`#${formname} [name=position]`).val(staff.position);
			$(`#${formname} [name=gender]`).val(staff.gender);
			$(`#${formname} [name=email]`).val(staff.email);
			$(`#${formname} [name=language]`).val(staff.language_id);
			$(`#${formname} [name=staff_status]`).val(staff.staff_status);
			$(`#${formname} [name=employment_type]`).val(staff.role);
			$(`#${formname} [name=termination_date]`).val(moment(staff.termination_date).format('MM/DD/YYYY'));
			$(`#${formname} [name=corporation_name]`).val(staff.corporation_name);
			$(`#${formname} [name=tax_id]`).val(staff.tax_id);
			if (staff.signature_path) {
				document.getElementById('signature_image').src = `${window.location.origin}/thhs-backend/${staff.signature_path}`;
				$(`#signature_image`).show()
			}
		},
		error: function (err) {
			toastr.error("Data getting failed")
		}
	});
}

function cancel_interview() {
	var formBtnId = 'confirm_btn';
	let url = $("#cancel_interview_btn").attr('data-url');
	let target = ('#' + $(this).attr('id') == '#undefined') ? 'body' : '#' + $(this).attr('id');
	loadingButton(formBtnId)
	$.ajax({
		url: url,
		type: "GET",
		contentType: false,
		dataType: 'json',
		processData: false,
		success: function (data) {
			unloadingButton(formBtnId)
			if (data.status) {
				toastr.success(data.message)
			} else {
				toastr.error(data.message)
			}
			location.reload();
		},
		error: function (err) {
			unloadingButton(formBtnId)
			if (err.responseJSON) {
				toastr.error(err.responseJSON.message)
			}
			handleFail(err.responseJSON, {
				container: target,
				errorPosition: "field"
			})
			location.reload();
		}
	});

}

function previewFile(name, target, image) {
	const preview = document.getElementById(image);
	const file = document.querySelector(`input[name=${name}]`).files[0];
	const reader = new FileReader();

	reader.addEventListener(
		"load",
		() => {
			// convert image file to base64 string 
			if ((file.size / 1000) > 999) {
				$(`#${formname} [name=signature_file]`).val("");
				toastr.error('File too Big, please select a file less than 1mb')
				uploadClear();
			} else {
				preview.src = reader.result;
				$(`#${target}`).val(reader.result)
				$(`#upload_button`).text(file.name)
				$(`#signature_image`).show()
			}
		},
		false,
	);

	if (file) {
		reader.readAsDataURL(file);
	}
}

/**Delete */  
function delete_staff() {
	var formBtnId = 'confirm_btn';
	let url = $("#delete_staff_btn").attr('data-url');
	let target = ('#' + $(this).attr('id') == '#undefined') ? 'body' : '#' + $(this).attr('id');
	loadingButton(formBtnId)
	$.ajax({
		url: url,
		type: "GET",
		contentType: false,
		dataType: 'json',
		processData: false,
		success: function (data) {
			unloadingButton(formBtnId)
			if (data.status) {
				toastr.success(data.message)
			} else {
				toastr.error(data.message)
			}
			reload_page();
		},
		error: function (err) {
			unloadingButton(formBtnId)
			if (err.responseJSON) {
				toastr.error(err.responseJSON.message)
			}
			handleFail(err.responseJSON, {
				container: target,
				errorPosition: "field"
			})
			// reload_page();
		}
	});

}

function thisFileUpload() {
	document.getElementById("customFile").click();
}