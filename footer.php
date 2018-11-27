
<div class="at-modal"></div>
<div class="at-snackbar"></div>


<script>

jQuery(function($){
	
$(document) .on('click','button#forgot-pass',function(){
	$('.at-modal').load('alumni-id-modal.php').show();
});

$(document) .on('submit','form#id-number-form',function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
	e.stopPropagation();
	var form1 = new FormData(this);
	$.ajax({
		'processData' : false,
		'contentType': false,
		'type' : 'post',
		'url' : 'validate-id-number.php',
		'data' : form1,
		'success' : function(response){
			if(response != "" && response != " "){
				var respo = JSON.parse(response);
				if(respo.type == 'success'){
					$('.at-modal').load('alumni-sq-modal.php');
				}else{
					$('.at-snackbar') .removeClass('sb-active error success');
					$('.at-snackbar') .addClass('error sb-active').html(respo.msg);
					setTimeout(function(){
						$('.at-snackbar').removeClass('sb-active error');
					},3000);
				}
			}
		}
	});
});



$(document) .on('submit','form#sq-form-fp',function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
	e.stopPropagation();
	var form1 = new FormData(this);
	var submitBtn = $(this).find('button#submit');
	$.ajax({
		'beforeSend' : function(){
			$(submitBtn).attr('disabled','disabled');
			$('.at-snackbar') .removeClass('sb-active success error') .addClass('sb-active success').html("Please Wait...");
		},
		'processData' : false,
		'contentType': false,
		'type' : 'post',
		'url' : 'validate-answers.php',
		'data' : form1,
		'success' : function(response){
			if(response != "" && response != " "){
				var respo = JSON.parse(response);
				$('.at-snackbar') .removeClass('sb-active error success');
				$('.at-snackbar') .addClass(respo.type+' sb-active').html(respo.msg);
				setTimeout(function(){
					$('.at-snackbar').removeClass('sb-active error');
				},2800);
				if(respo.type == 'success'){
					$('.at-modal').hide().html('');
				}
			}
			$(submitBtn).removeAttr('disabled');
		}
	});
});
	
	
	
$(document) .on('click','img#cict, button#login-admin',function(){
	$('.at-modal').show().load('admin-login-form.php');
});	

window.onclick = function(event){
		if( (event.target.matches('.at-modal') ) ){
		}
}
$(document) .on('click','button.close',function(){
		$('.at-modal').hide().html();
});
$(document) .on('focus','.at-input-wrapper input',function(){
	$(this).parents('.at-input-field').css({
		'border-color' : 'black',
		'background' : 'black'
	});
	if($(this).val() == ""){
		$(this).parents('.at-input-field').css({
			'border-color' : 'grey',
			'background' : 'grey'
		});
	}else{
		$(this).parents('.at-input-field').css({
			'border-color' : 'black',
			'background' : 'black'
		});		
	}
});

$(document) .on('blur','.at-input-wrapper input',function(){
	$(this).parents('.at-input-field').css({
		'border-color' : 'grey',
		'background' : 'grey'
	});
	if($(this).val() == ""){
		$(this).parents('.at-input-field').css({
			'border-color' : 'grey',
			'background' : 'grey'
		});
	}else{
		$(this).parents('.at-input-field').css({
			'border-color' : 'black',
			'background' : 'black'
		});		
	}
});

$(document) .on('keyup', 'input#login-username, input#login-password, input#admin-username, input#admin-password',function(){
	var username = $('input#login-username').val();
	var password = $('input#login-password').val();
	var adminUsername = $('input#admin-username').val();
	var adminPassword = $('input#admin-password').val();
	
	thisParent = $(this).parents('.at-input-field');
	if($(this).val() != "" ){
		thisParent.css({
			'border-color' : 'black',
			'background' : 'black'			
		});
	}else{
		thisParent.css({
			'border-color' : 'grey',
			'background' : 'grey'
		});
	}
	
	if(username != "" && password != ""){
		$('input#login-btn').removeAttr('disabled');
		$('.at-af-btns').css({
			'background' : 'black',
			'border-color' : 'black',
			'color' : 'red'
		});
	}else{
		$('input#login-btn').attr('disabled','disabled');
		$('.at-af-btns').css({
			'background' : 'grey',
			'border-color' : 'grey'
		});
	}

	if(adminUsername != "" && adminPassword != ""){
		adminBtn = $('input#admin-login-btn');
		adminBtn.removeAttr('disabled');
		adminBtn.parents('.at-af-btns').css({
			'background' : 'black',
			'border-color' : 'black',
			'color' : 'white'
		});
	}else{
		adminBtn.attr('disabled','disabled');
		adminBtn.parents('.at-af-btns').css({
			'background' : 'grey',
			'border-color' : 'grey',
		});
	}
});

$(document) .on('click','a#showSearchWrapper',function(){
	$(this).toggleClass('active');
	$(this).siblings('div.search-wrapper').toggleClass('active');
});

$(document) .on('click','a#add-alumni',function(){
	$('.at-modal').show().load('add-alumni-form.php');
});

function alumniInfo(){
	var id_number = $('input#id-number').val();
	var fname = $('input#fname').val();
	var mname = $('input#mname').val();
	var lname = $('input#lname').val();
	var password = $('input#password').val();
	var address_present = $('input#address-present').val();
	var address_permanent = $('input#address-permanent').val();
	var gender = $('select#gender').val();
	var date_of_birth = $('input#date-of-birth').val();
	var place_of_birth = $('input#place-of-birth').val();
	var civil_status = $('select#civil-status').val();
//	var email_address = $('input#email-address').val();
	var mobile_number = $('input#mobile-number').val();
	var youtube_link = $('input#youtube-link').val();
	var blog_link = $('input#blog-link').val();
	var facebook_url = $('input#facebook-url').val();
	var twitter_acc = $('input#twitter-acc').val();
	var course = $('select#course').val();
	var date_graduated = $('input#date-graduated').val();
	var parents_fname1 = $('input#parents_fname1').val();
	var parents_mname1 = $('input#parents_mname1').val();
	var parents_lname1 = $('input#parents_lname1').val();
	var parents_bday1 = $('input#parents_bday1').val();
	var parents_gender1 = $('select#parents_gender1').val();
	var parents_relationship1 = $('input#parents_relationship1').val();
	var parents_fname2 = $('input#parents_fname2').val();
	var parents_mname2 = $('input#parents_mname2').val();
	var parents_lname2 = $('input#parents_lname2').val();
	var parents_bday2 = $('input#parents_bday2').val();
	var parents_gender2 = $('select#parents_gender2').val();
	var parents_relationship2 = $('input#parents_relationship2').val();
	var email_adds = [];
	$('input#email-address').each(function(){
		var val = $(this).val();
		if(val != " " && val != ""){
			email_adds.push(val);
		}
	});
	personal_data = {
		'id-number' : id_number,
		'fname' : fname,
		'mname' : mname,
		'lname' : lname,
		'password' : password,
		'address-present' : address_present,
		'address-permanent' : address_permanent,
		'gender' : gender,
		'date-of-birth' : date_of_birth,
		'place-of-birth' : place_of_birth,
		'civil-status' : civil_status,
		'email-adds' : email_adds,
//		'email-address' : email_address,
		'mobile-number' : mobile_number,
		'youtube-link' : youtube_link,
		'blog-link' : blog_link,
		'facebook-url' : facebook_url,
		'twitter-acc' : twitter_acc,
		'course' : course,
		'date-graduated' : date_graduated,
		'parents_fname1' : parents_fname1,
		'parents_mname1' : parents_mname1,
		'parents_lname1' : parents_lname1,
		'parents_bday1' : parents_bday1,
		'parents_gender1' : parents_gender1,
		'parents_relationship1' : parents_relationship1,
		'parents_fname2' : parents_fname2,
		'parents_mname2' : parents_mname2,
		'parents_lname2' : parents_lname2,
		'parents_bday2' : parents_bday2,
		'parents_gender2' : parents_gender2,
		'parents_relationship2' : parents_relationship2
		}
	return personal_data;
}

$(document) .on('click','input#employment-status',function(){
	alumniInfo();
	personal_data.fields = "employment-status";
	var initAlumniId = $('input#init-alumni-id').val();
	var action = "";
	if(initAlumniId == 0){
		action = "save";
	}else{
		action = "update";
	}
	var fields = "employment-status";
	$.ajax({
		'type' : 'post',
		'url' : 'validate-alumni-form.php',
		'data' : personal_data,
		'success' : function(response){
			if(response == "SUCCESS!"){
				var sbClass = "success";
			}else{
				var sbClass = "error";
			}
			if(sbClass == 'error'){
				$('.at-snackbar').addClass('sb-active').addClass(sbClass).html(response);
				setTimeout(function(){
					$('.at-snackbar').removeClass('sb-active success error').html('');
						$('input#degree-finished').focus();
						$('.employment-form').html('');
						$('input#employment-status').removeAttr('checked');
				},2800);
			}
		}
	});
	
	
	var val = $(this).val();
	var url = "";
	if(val == 'Employed'){
		url = "employment-employed-form.php";
	}else if(val == 'Self-Employed'){
		url = "employment-self-employed-form.php";
	}else if(val == 'Unemployed'){
		url = "employment-unemployed-form.php";
	}
	$('.employment-form').load(url);
});

$(document) .on('focus','select#course, input#date-graduated',function(){
	alumniInfo();
	var fields = "educational-background";
	personal_data.fields = fields;
	$.ajax({
		'type' : 'post',
		'url' : 'validate-alumni-form.php',
		'data' : personal_data,
		'success' : function(response){
			if(response == "SUCCESS!"){
				var sbClass = "success";
			}else{
				var sbClass = "error";
			}
			if(sbClass == 'error'){
				$('.at-snackbar').toggleClass('sb-active').addClass(sbClass).html(response);
				setTimeout(function(){
					$('.at-snackbar').removeClass('sb-active success error').html('');
						$('input#degree-finished, input#university, input#date-graduated').blur();
				},2800);
			}
		}
	});
});


function performFilters(){
	var courses = [];
		if($('input#it').val() != ""){
			courses.push($('input#it').val());
		}
		if($('input#is').val() != ""){
			courses.push($('input#is').val());
		}
		if($('input#cs').val() != ""){
			courses.push($('input#cs').val());
		}
		var date_from = $('input#hidden-date-from').val();
		var date_to = $('input#hidden-date-to').val();
		var keyword = $('input#hidden-keyword').val();
		var sort = $('input#hidden-sort').val();
		$.ajax({
			'type' : 'post',
			'url' : 'graduate-list.php',
			'data' : {
				'sort' : sort,
				'courses' : courses.valueOf(),
				'date-from' : date_from,
				'date-to' : date_to,
				'keyword' : keyword
			},
			'success' : function(response){
				$('.alumni-list-wrapper').html(response);
			}
		});

}

$(document) .on('click','button#submit-alumni-form',function(){
	$(this).attr('disabled','disabled');
	$('.at-snackbar').removeClass('sb-active').addClass('sb-active success').html("Please Wait...");
	alumniInfo();
	var err = 0;
	
	$.ajax({
		'type' : 'post',
		'url' : 'validate-alumni-form.php',
		'data' : personal_data,
		'success': function(response){
			if(response == "SUCCESS!"){
				
			}else{
				err++;
			}
		}
	});
	if(err == 0){
		$.ajax({
			'type' : 'post',
			'url' : 'submit-alumni-form.php',
			'data' : personal_data,
			'success' : function(response){
				if(response == "SUCCESS!"){
					var sbClass = "success";
				}else{
					var sbClass = "error";
					$('button#submit-alumni-form').removeAttr('disabled');
				}
				$('.at-snackbar').addClass('sb-active '+sbClass).html(response);
				setTimeout(function(){
					$('.at-snackbar').removeClass('sb-active success error').html('');
					performFilters();
					if(sbClass == 'success'){
						$('.at-modal').hide().html('');
					}
				},2800);
			}
		});
	}
	if(err > 0){
		$(this).removeAttr('disabled');
	}

});

$(document) .on('click','a#filter',function(){
	$('.at-modal').load('filter-options.php',function(){
		if($('input#it').val() != ""){
			$('input#course[value="Bachelor of Science in Information Technology"]').attr("checked","");
		}
		if($('input#is').val() != ""){
			$('input#course[value="Bachelor of Science in Information System"]').attr("checked","");
		}
		if($('input#cs').val() != ""){
			$('input#course[value="Bachelor of Science in Computer Science"]').attr("checked","");
		}
		$('input#date-from').val($('input#hidden-date-from').val());
		$('input#date-to').val($('input#hidden-date-to').val());
		$('input#filter-keyword').val($('input#hidden-keyword').val());
	}).show();
});

$(document) .on('click','button#submit-filter',function(){
	var courses = [];
	$('input#course:checked').each(function(){
		courses.push($(this).val());
		if($(this).val() == "Bachelor of Science in Computer Science"){
			$('input#cs').val($(this).val());
		}else if($(this).val() == "Bachelor of Science in Information System"){
			$('input#is').val($(this).val());
		}else if($(this).val() == "Bachelor of Science in Information Technology"){
			$('input#it').val($(this).val());
		}
	});
	$('input#course:not(:checked)') .each(function(){
		if($(this).val() == "Bachelor of Science in Computer Science"){
			$('input#cs').val('');
		}else if($(this).val() == "Bachelor of Science in Information System"){
			$('input#is').val('');
		}else if($(this).val() == "Bachelor of Science in Information Technology"){
			$('input#it').val('');
		}
	});
	var date_from = $('input#date-from').val();
	var date_to = $('input#date-to').val();
	var keyword = $('input#filter-keyword').val();
	var sort = $('input#hidden-sort').val();
	$('input#hidden-date-from').val(date_from);
	$('input#hidden-date-to').val(date_to);
	$('input#hidden-keyword').val(keyword);
	$.ajax({
		'type' : 'post',
		'url' : 'graduate-list.php',
		'data' : {
			'courses' : courses.valueOf(),
			'date-from' : date_from,
			'date-to' : date_to,
			'keyword' : keyword,
			'sort' : sort
		},
		'success' : function(response){
			$('.alumni-list-wrapper').html(response);
		}
	});
});

$(document) .on('click','a#sort',function(){
	$('.at-modal').load('sort-options.php',function(){
		var initSort = $('input#hidden-sort').val();
		$('input#sort-option[value="'+initSort+'"]').attr('checked','');
	}).show();
});

$(document) .on('change','input#sort-option',function(){
	var val = $(this).val();
	var courses = [];
	if($('input#it').val() != ""){
		courses.push($('input#it').val());
	}
	if($('input#is').val() != ""){
		courses.push($('input#is').val());
	}
	if($('input#cs').val() != ""){
		courses.push($('input#cs').val());
	}
	var date_from = $('input#hidden-date-from').val();
	var date_to = $('input#hidden-date-to').val();
	var keyword = $('input#hidden-keyword').val();
	$.ajax({
		'type' : 'post',
		'url' : 'graduate-list.php',
		'data' : {
			'sort' : val,
			'courses' : courses.valueOf(),
			'date-from' : date_from,
			'date-to' : date_to,
			'keyword' : keyword
		},
		'success' : function(response){
			$('.alumni-list-wrapper').html(response);
			$('input#hidden-sort').val(val);
		}
	});

});

$(document) .on('click','button#delete-alumni',function(){
	var id = $(this).data('id');
	$.ajax({
		'type' : 'post',
		'url' : 'delete-confirm.php',
		'data' : { 'id' : id },
		'success' : function(response){
			$('.at-modal').html(response).show();
		}
	});
});


$(document) .on('click','button#delete-now',function(){
	var action = $(this).data('action');
	if(action == 'no'){
		$('.at-modal').hide().html('');
	}else if(action == 'yes'){
		var id = $(this).data('id');
		$('.delete-form').html("<h4> Please Wait.... </h4>");
		$.ajax({
			'type' : 'post',
			'url' : 'delete-alumni.php',
			'data' : { 'id' : id },
			'success' : function(response){
				$('.at-snackbar').addClass('sb-active success').html(response);
				performFilters();
				$('.at-modal').hide().html('');
				setTimeout(function(){
					$('.at-snackbar').removeClass('sb-active success error').html('');
					},2500);
			}
		});
	}
});

$(document) .on('click','button#view-profile',function(){
	var id = $(this).data('id');
	$.ajax({
		'type' : 'post',
		'url' : 'view-profile-modal.php',
		'data' : { 'id' : id },
		'success' : function(response){
			$('.at-modal').html(response).show();
		}
	});
});

$(document) .on('click','button#delete-portfolio-item',function(){
	var id = $(this).data('id');
	$.ajax({
		'type' : 'post',
		'url' : 'delete-portfolio-confirm.php',
		'data' : { 'id' : id },
		'success' : function(response){
			$('.at-modal').html(response).show();
		}
	});
});

$(document) .on('click','div#delete-portfolio-item button#delete-now',function(event){
	event.stopImmediatePropagation();
	event.stopPropagation();
	var action = $(this).data('action');
	if(action == 'no'){
		$('.at-modal').hide().html('');
	}else{
		var id = $(this).data('id');
		$.ajax({
			'type' : 'post',
			'url' : 'delete-portfolio.php',
			'data' : { 'id' : id },
			'success' : function(response){
				$('.at-snackbar').addClass('sb-active success').html(response);
				$('.at-modal').hide().html('');
				setTimeout(function(){
					$('.at-snackbar').removeClass('sb-active success error').html('');
					location.reload();
					},2500);
			}
		});
	}
});

$(document) .on('click','button#update-admin-acc',function(){
	var action = $(this).data('action');
	if(action == 'update'){
		$('.admin-cell input').removeAttr('disabled');
		$('input#fname').focus();
		$(this).text('Save').data('action','save');
		$('.admin-cell#password-cell').show();
		$('button.cancel-admin-acc').show();
	}else{
		var fname = $('input#fname').val();
		var mname = $('input#mname').val();
		var lname = $('input#lname').val();
		var username = $('input#username').val();
		var current_password = $('input#current-password').val();
		var new_password = $('input#new-password').val();
		$.ajax({
			'type' : 'post',
			'url' : 'update-admin-acc.php',
			'data' : {
				'fname' : fname,
				'mname' : mname,
				'lname' : lname,
				'username' : username,
				'current-password' : current_password,
				'new-password' : new_password
			},
			'success' : function(response){
				if(response == 'SUCCESS!'){
					var sbClass = "success";
					$('button#update-admin-acc').text('Update').data('action','update');
						$('input').attr('disabled','');
						$('.admin-cell#password-cell, .cancel-admin-acc').hide();
				}else{
					var sbClass = 'error';
				}
				$('.at-snackbar').removeClass('sb-active error success').addClass('sb-active '+sbClass).html(response);
				setTimeout(function(){
					$('.at-snackbar').removeClass('sb-active');
				},2800);
				$('input#current-password').val('');
				$('input#new-password').val('');
			}
		});
	}
});

$(document) .on('click','button#view-portfolio',function(){
	var id = $(this).data('id');
	$.ajax({
		'type' : 'post',
		'url' : 'view-portfolio-modal.php',
		'data' : { 'id': id },
		'success' : function(response){
			$('.at-modal').html(response).show();
		}
	});
});


$(document) .on('submit','form#image-form',function(event){
	event.preventDefault();
	event.stopPropagation();
	event.stopImmediatePropagation();

	var form1 = new FormData(this);
	
	$('.at-modal').load('liability-agreement.php').show();
	$(document) .on('click','button#agreed',function(){
		$.ajax({
			'type' : 'POST',
			'url' : 'upload-img.php',
			'contentType' : false,
			'cache' : false,
			'processData' : false,
			'mimeType' : 'multipart/form-data',
			'data' : form1,
			'success' : function(response){
				if(response.includes('SUCCESS!')){
					var sbClass = 'success';
				}else{
					var sbClass = 'error';
				}
				$('.at-snackbar').removeClass('sb-active success error').addClass('sb-active '+sbClass).html(response);
				setTimeout(function(){
					$('.at-modal').removeClass('sb-active success error');
					location.reload();
				}, 2800);
			}
		});
	});
});



$(document) .on('submit','form#file-form',function(event){
	event.preventDefault();
	event.stopPropagation();
	event.stopImmediatePropagation();
	$.ajax({
		'type' : 'post',
		'url' : 'upload-file.php',
		'contentType' : false,
		'cache' : false,
		'processData' : false,
		'mimeType' : 'multipart/form-data',
		'data' : new FormData(this),
		'success' : function(response){
			if(response.includes('SUCCESS!')){
				var sbClass = 'success';
			}else{
				var sbClass = 'error';
			}
			$('.at-snackbar').removeClass('sb-active success error').addClass('sb-active '+sbClass).html(response);
			setTimeout(function(){
				$('.at-modal').removeClass('sb-active success error');
				location.reload();
			}, 2800);
		}
	});
});

$(document) .on('submit','form#link-form',function(event){
	event.preventDefault();
	event.stopPropagation();
	event.stopImmediatePropagation();
	var lnk_url  = $(this).find('input#lnk_url').val();
	var lnk_desc  = $(this).find('input#lnk_desc').val();
	$.ajax({
		'type' : 'post',
		'url' : 'submit-link.php',
		'data' : {
			'link' : lnk_url,
			'link_desc' : lnk_desc
		},
		'success' : function(response){
			if(response == 'SUCCESS!'){
				var sbClass = 'success';
			}else{
				var sbClass = 'error';
			}
			$('.at-snackbar').removeClass('sb-active success error').addClass('sb-active '+sbClass).html(response);
			setTimeout(function(){
				$('.at-modal').removeClass('sb-active success error');
				location.reload();
			}, 2800);
		}
	});

});

$(document) .on('click','a#search',function(){
	$('.at-modal').load('search-form.php').show();
});

$(document) .on('keyup','input#keyword',function(){
	var val = $(this).val();
	$.ajax({
		'type' : 'post',
		'url' : 'graduate-list.php',
		'data' : { 'keyword' : val },
		'success' : function(response){
			$('.alumni-list-wrapper').html(response);
		}
	});
});

$(document) .on('click','button#add-survey-form',function(){
	$('.at-modal').load('survey-form.php').show();
});
/*
$(document) .on('change','input#employment-status-survey',function(){
	var val = $(this).val();
	if(val == 'Employed'){
		var url = "employment-employed-form.php";
	}else if(val == 'Self-Employed'){
		var url = "employment-self-employed-form.php";
	}else{
		var url = "employment-unemployed-form.php";
	}
	$('.employment-form').load(url);
	$('button#submit-survey-form').attr('data-status',val);
});
*/
$(document) .on('click','button#submit-survey-form',function(){
	$('.at-snackbar').stop(true,true).removeClass('sb-active').addClass('sb-active success').html("Please Wait...");
	var status = $(this).attr('data-status');
	var myData = {};
	if(status == 'Employed'){
		myData['employer-name'] = $('input#employer-name').val();
		myData['workfield'] = $('input#workfield').val();
		myData['org-type'] = $('input#org-type').val();
		myData['employment-type'] = $('input#employment-type-val').val();
		myData['occupation-type'] = $('input#occupation-type-val').val();
		myData['num-of-months'] = $('select#num-of-months').val();
		myData['place-of-work'] = $('select#place-of-work').val();
		myData['is-first-job'] = $('select#is-first-job').val();
		myData['reason'] = $('textarea#reason').val();
		myData['designation'] = $('input#designation').val();
		myData['department'] = $('input#department').val();
		myData['status'] = $('select#status').val();
		myData['monthly-income-range'] = $('select#monthly-income-range').val();
	}else if(status == 'Self-Employed'){
		myData['nature-of-employment'] = $('input#nature-of-employment').val();
		myData['workfield'] = $('input#workfield').val();
		myData['num-of-years'] = $('select#num-of-years').val();
		myData['monthly-income-range'] = $('select#monthly-income-range').val();
	}else if(status == 'Unemployed'){
		myData['unemployed-reason'] = $('textarea#unemployed-reason').val();
		$('div#question-row input:checked') .each(function(){
			var id = $(this).attr('id');
			myData[id] = $(this).val();
		});
	}
	myData['employment-status'] = status;
	$.ajax({
		'type' : 'post',
		'url' : 'submit-survey-form.php',
		'data' : myData,
		'success' : function(response){
			if(response == "SUCCESS!"){
				var sbClass = "success";
			}else{
				var sbClass = "error";
			}
			$('.at-snackbar').removeClass('sb-active success error').addClass('sb-active '+sbClass).html(response);
			if(sbClass == 'success'){
					setTimeout(function(){
						location.reload();
					},1500);
			}
		}
	});
});

$(document) .on('click','button#update-profile-btn',function(){
	var type = $(this).data('type');
	$.ajax({
		'type' : 'post',
		'url' : 'update-profile-modal.php',
		'data' : { 'type' : type },
		'success' : function(response){
			$('.at-modal').html(response).show();
		}
	});
});

$(document) .on('change','select#upm-civil-status',function(){
	var val = $(this).val();
	if(val == 'Married'){
		$('input#new-lname').attr('type','text');
	}else{
		$('input#new-lname').attr('type','hidden');
	}
});

$(document) .on('click','button#upm-submit',function(){
	var type = $(this).data('type');
	var myData = {};
	$(this).attr('disabled','disabled');
	if(type == 'civil-status'){
		myData['civil-status'] = $('select#upm-civil-status').val();
		myData['lname'] = $('input#new-lname').val();
	}else if(type == 'employment-status'){
		myData[type] = $('select#employment-status').val();
	}else{
		myData[type] = $('input#'+type).val();
	}
	$.ajax({
		'type' : 'post',
		'url' : 'upm-submit.php',
		'data' : myData,
		'success' : function(response){
			if(response == "SUCCESS!"){
				var sbClass = 'success';
			}else{
				var sbClass = 'error';
			}
			$('.at-snackbar').removeClass('sb-active error success').addClass('sb-active '+sbClass).html(response);
			setTimeout(function(){
				if(sbClass == 'success'){
					location.reload();
				}else{
					$('.at-snackbar').removeClass('sb-active error success');
					$('button#upm-submit').removeAttr('disabled');
				}
			},2800);
		}
	});

});

$(document) .on('click','button#delete-employment-item',function(){
	var id = $(this).data('id');
	var status = $(this).data('status');
	if(confirm("ARE YOU SURE?")){
		$.ajax({
			'type' : 'post',
			'url' : 'delete-employment-item.php',
			'data' : {
				'id' : id,
				'status' : status
			},
			'success' : function(response){
				alert(response);
				location.reload();
			}
		});
	}
});

$(document) .on('change','input#skill-rating',function(){
	$(this).next('h4').css({
		'background' : '#333',
		'color' : 'white'
	});
	$(this).parents('.skill-rating').prevUntil('.skill-rating:nth-child(0)').find('h4').css({
		'background' : '#555',
		'color' : 'white',
		'border-color' : '#555'
	}).parents('.skill-rating').css({
		'border-color' : '#555'
	});
	$(this).parents('.skill-rating').nextUntil('.skill-rating:nth-child(12)').find('h4').css({
		'background' : 'white',
		'color' : 'black',
	}).parents('.skill-rating').css({
		'border-color' : '#d5d5d5'
	});
		
});

$(document) .on('submit','form#rating-form',function(e){
	$('.at-snackbar').removeClass('error success').addClass('sb-active success').html("Please Wait...");
	e.preventDefault();
	e.stopPropagation();
	e.stopImmediatePropagation();
	var myFormData = new FormData(this);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(xhttp.readyState == 4 && xhttp.status == 200){
			if(xhttp.responseText == "SUCCESS!"){
				var sbClass = 'success';
			}else{
				var sbClass = 'error';
			}
			$('.at-snackbar').removeClass('sb-active error success').addClass('sb-active '+sbClass).html(xhttp.responseText);
			setTimeout(function(){
				if(sbClass == 'success'){
					location.reload();
				}else{
					$('.at-snackbar').removeClass('sb-active error success');
					$('button#upm-submit').removeAttr('disabled');
				}
			},2800);
		}
	}
	xhttp.open("POST", "submit-rating.php", true);
	xhttp.send( myFormData );
});

$(document) .on('submit','form#update-rating-form',function(e){
	$('.at-snackbar').removeClass('error success').addClass('sb-active success').html("Please Wait...");
	e.preventDefault();
	e.stopPropagation();
	e.stopImmediatePropagation();
	var myFormData = new FormData(this);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(xhttp.readyState == 4 && xhttp.status == 200){
			if(xhttp.responseText == "SUCCESS!"){
				var sbClass = 'success';
			}else{
				var sbClass = 'error';
			}
			$('.at-snackbar').removeClass('sb-active error success').addClass('sb-active '+sbClass).html(xhttp.responseText);
			setTimeout(function(){
				if(sbClass == 'success'){
					location.reload();
				}else{
					$('.at-snackbar').removeClass('sb-active error success');
					$('button#upm-submit').removeAttr('disabled');
				}
			},2800);
		}
	}
	xhttp.open("POST", "update-rating-submit.php", true);
	xhttp.send( myFormData );
});

$(document) .on('change','input#employment-status-survey',function(){
	var val = $(this).val();
	if(val == 'Employed'){
		$('div#company-field').show();
	}else{
		$('div#company-field').hide();
	}
});

$(document) .on('click','button#update-rating',function(){
	var id = $(this).data('id');
	$('.at-modal').load('update-rating.php',{'id':id}).show();
});

$(document) .on('click','button#search-company',function(){
	$('div.company-search').animate({'width':'250px'});
});

/*
$(document) .on('click','button#add-company',function(){
	var company_name = prompt("Enter Company Name");
	if(company_name != "" || company_name != " "){
		$.ajax({
			'type' : 'post',
			'data' : {'company-name' : company_name},
			'url' : 'add-company.php',
			'success' : function(response){
				if(response == "SUCCESS!"){
					$('div.at-modal').load('add-company-form.php',{'company-name' : company_name}).show();
				}else{
					alert(response);
				}
			}
		});
	}
});
*/

$(document) .on('click','button#add-company',function(){
	$('div.at-modal').load('add-company-form.php').show();
});

$(document) .on('click','button#apos',function(){
	var id = parseInt($(this).attr('data-id'));
	var elePar = $(this).parents('.positions-form');
	var thisEle = $(this);
	$.ajax({ 'type' : 'post', 'url' : 'position-form.php', 'data' : {'id':id}, 'success' : function(response){ $('button.submit-company').parents('.alumni-input-row').before(response); } });
	$(this).parents('.alumni-input-row').remove();
});

$(document) .on('click','button#apos2',function(){
	var id = parseInt($(this).attr('data-id'));
	var elePar = $(this).parents('.positions-form');
	var thisEle = $(this);
	$.ajax({ 'type' : 'post', 'url' : 'position-form2.php', 'data' : {'id':id}, 'success' : function(response){ $('button.submit-company').parents('.alumni-input-row').before(response); } });
	$(this).parents('.alumni-input-row').remove();
});

$(document) .on('click','button#ars2',function(){
	var id = $(this).attr('data-id');
	id = parseInt(id);
	var thisEle = $(this);
	$.ajax({ 'type' : 'post', 'url' : 'rs-input2.php', 'data' : {'id':id}, 'success' : function(response){ $(thisEle).before(response); } });
});

$(document) .on('click','button#ars',function(){
	var id = $(this).attr('data-id');
	id = parseInt(id);
	var thisEle = $(this);
	$.ajax({ 'type' : 'post', 'url' : 'rs-input.php', 'data' : {'id':id}, 'success' : function(response){ $(thisEle).before(response); } });
});



$(document) .on('submit','form#add-company-form',function(e){
	e.preventDefault();
	e.stopPropagation();
	e.stopImmediatePropagation();
	$.ajax({
		'type' : 'post',
		'processData' : false,
		'contentType' : false,
		'beforeSend' : function(){	$('.at-snackbar').removeClass('error success').addClass('sb-active success').html("Please Wait..."); },
		'url' : 'add-company-submit.php',
		'data' : new FormData(this),
		'success' : function(response){
			if(response == "SUCCESS!"){
				$('.at-snackbar').removeClass('error success').addClass('sb-active success').html(response);
				setTimeout(function(){
					location.reload();
				}, 1000);
			}else{
				$('.at-snackbar').removeClass('error success').addClass('sb-active error').html(response);
			}
		}
	})
})

$(document) .on('submit','form#update-company-form',function(e){
	e.preventDefault();
	e.stopPropagation();
	e.stopImmediatePropagation();
	var form1 = new FormData(this);
	$.ajax({
		'processData' : false,
		'contentType' : false,
		'type' : 'post',
		'url' : 'update-company-submit.php',
		'data' : form1,
		'success' : function(response){
			if(response != "" && response != " "){
				var respo = JSON.parse(response);
				if(respo.type == "success"){
					$('.at-snackbar').removeClass('error success').addClass('sb-active success').html(respo.msg);
					setTimeout(function(){
						location.reload();
					}, 1000);
				}else{
					$('.at-snackbar').removeClass('error success').addClass('sb-active error').html(respo.msg);
				}
			}
		}
	});
});

$(document) .on('click','button#change-password',function(){
	$('.at-modal').load('change-password-modal.php').show();
});

$(document) .on('submit','form#change-password-form',function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
	e.stopPropagation();
	var form1 = new FormData(this);
	$.ajax({
		'processData' : false,
		'contentType' : false,
		'type' : 'post',
		'url' : 'change-password-submit.php',
		'data' : form1,
		'success' : function(response){
			if(response != "" && response != " "){
				var respo = JSON.parse(response);
				if(respo.type == "success"){
					$('.at-snackbar').removeClass('error success').addClass('sb-active success').html(respo.msg);
					setTimeout(function(){
						location.reload();
					}, 1000);
				}else{
					$('.at-snackbar').removeClass('error success').addClass('sb-active error').html(respo.msg);
					setTimeout(function(){
						$('.at-snackbar').removeClass('sb-active');
					}, 3000);
				}
			}
		}
	});
});

$(document) .on('click','button#view-security-questions',function(){
	$('.at-modal').load('alumni-security-questions.php').show();	
});

$(document) .on('submit','form#sq-update',function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
	e.stopPropagation();
	var form1 = new FormData(this);
	$.ajax({
		'processData' : false,
		'contentType' : false,
		'type' : 'post',
		'url' : 'update-security-questions.php',
		'data' : form1,
		'success' : function(response){
			if(response != "" && response != " "){
				var respo = JSON.parse(response);
				if(respo.type == "success"){
					$('.at-snackbar').removeClass('error success').addClass('sb-active success').html(respo.msg);
					setTimeout(function(){
						location.reload();
					}, 1000);
				}else{
					$('.at-snackbar').removeClass('error success').addClass('sb-active error').html(respo.msg);
					setTimeout(function(){
						$('.at-snackbar').removeClass('sb-active');
					}, 3000);
				}
			}
		},
		'error' : function(xhr){
			alert(xhr.status+" "+xhr.statusText);
		}
	});
});

$(document) .on('click','button#add-qualification',function(){
	var company_name = $('input#company-name').val();
	var skill_id = $(this).data('id');
	var skill_name = $(this).data('name');
	var rating = parseInt(prompt("Enter Qualfication Rating for "+skill_name+":"));
	if(parseInt(rating) > 0){
		$.ajax({
			'type' : 'post',
			'url' : 'add-qualification.php',
			'data' : { 'company-name' : company_name , 'skill-id' : skill_id, 'rating' : rating },
			'success' : function(response){
				if(response == "SUCCESS!"){
					$("<div class='ss-skill'> <h4 class='ss-name'> "+skill_name+"</h4> <button id='add-qualification' disabled > "+rating+"</button>  </div>").prependTo('.skills-selected');
				}else{
					alert(response);
				}
			}
		});
	}
});

function searchCompany(){
	var val = $('input#company-search').val();
	$.ajax({
		'type' : 'post',
		'url' : 'company-list.php',
		'data' : {'keyword' : val},
		'success': function(response){
			$('div.companies').html(response);
		}
	});
}

$(document) .on('keyup change','input#company-search',function(){
	searchCompany();
});

$(document) .on('click','button#search-company',function(){
	searchCompany();
});

$(document) .on('click','button#add-experience',function(){
	$('div.at-modal').load('experience-form.php').show();
});

$(document) .on('submit','form#experience-form',function(event){
	event.preventDefault();
	event.stopPropagation();
	event.stopImmediatePropagation();
	$.ajax({
		'type' : 'post',
		'url' : 'experience-submit.php',
		'contentType' : false,
		'cache' : false,
		'processData' : false,
		'data' : new FormData(this),
		'success' : function(response){
			if(response.includes('SUCCESS!')){
				var sbClass = 'success';
			}else{
				var sbClass = 'error';
			}
			$('.at-snackbar').removeClass('sb-active success error').addClass('sb-active '+sbClass).html(response);
			setTimeout(function(){
				$('.at-modal').removeClass('sb-active success error');
				location.reload();
			}, 2800);
		}
	});
});

$(document) .on('click','button#add-field',function(){
	var fields = [];
	$('select#fields') .each(function(){
		var val = $(this).val();
		if(val != 0){
			fields.push(val);
		}
	});
	$.ajax({
		'type' : "post",
		'url' : 'add-field.php',
		'data' : { 'fields' : fields.valueOf() },
		'success' : function(response){
			$('h4.ef-label') .after(response);
		}
	});	

});

$(document) .on('click','button#form-add-email-add',function(){
	var addField = "<br/><div class='input-wrapper'> <input type='text' name='email-address[]' id='email-address' placeholder='Email Address' /> </hr/> </div>";
	$(this).parents('label').before(addField);
	/*
	var email_adds = [];
	$('input#email-address').each(function(){
		var val = $(this).val();
		if(val != " " && val != ""){
			email_adds.push(val);
		}
	});
	$.ajax({
		'type' : 'post',
		'url' : 'email-adds.php',
		'data' : { 'email-adds' : email_adds },
		'success' : function(response){
			alert(response);
		}
	});
	*/
});

$(document) .on('click','button#add-email-add-profile',function(){
	$('.at-modal').load("add-email-modal.php").show();
});
$(document) .on('click','button#update-email-add',function(){
	var email_add = $(this).parents('h4').text();
	var email_id = $(this).data('id');
	$.ajax({
		'type' : 'post',
		'url' : 'update-email-modal.php',
		'data' : { 'email-id' : email_id, 'email-add' : email_add },
		'success' : function(response){
			$('.at-modal').html(response).show();
		}
	});
});

$(document) .on('click','button#update-email-submit',function(){
	var email_id = $('input#email-id').val();
	var email_add = $('input#email-add').val();
	$.ajax({
		'type' : 'post',
		'url' : 'update-email-submit.php',
		'data' : { 'email-id' : email_id, 'email-add' : email_add },
		'success' : function(response){
			if(response != "" && response != " "){
				var respo = JSON.parse(response);
				$('.at-snackbar').removeClass('sb-active success error').addClass('sb-active '+respo.type).html(respo.msg);
				setTimeout(function(){
					$('.at-snackbar').removeClass('sb-active success error');
					if(respo.type == 'success'){
						location.reload();
					}
				}, 2800);
			}
		}
	});
});

$(document) .on('click','button#add-email-submit',function(){
	var email_add = $('input#email-add').val();
	$.ajax({
		'type' : 'post',
		'url' : 'add-email-submit.php',
		'data' : {'email-add' : email_add },
		'success' : function(response){
			if(response != "" && response != " "){
				var respo = JSON.parse(response);
				$('.at-snackbar').removeClass('sb-active success error').addClass('sb-active '+respo.type).html(respo.msg);
				setTimeout(function(){
					$('.at-snackbar').removeClass('sb-active success error');
					if(respo.type == 'success'){
						location.reload();
					}
				}, 2800);
			}
		}
	});
});

$(document) .on('click','button#view-contacts',function(){
	var id = $(this).data('id');
	$('.at-modal').load('company-contacts-modal.php', {'id' : id}).show();
});

$(document) .on('click','button#company-update',function(){
	var id = $(this).data('id');
	$('.at-modal').load('update-company-form.php', {'id' : id}).show();
});

$(document) .on('submit','form#update-forgotten-pass',function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
	e.stopPropagation();
	var form1 = new FormData(this);
	$.ajax({
		'processData' : false,
		'contentType' : false,
		'type' : 'post',
		'url' : 'update-forgotten-pass.php',
		'data' : form1,
		'success' : function(response){
			if(response != " " && response != ""){
				var respo = JSON.parse(response);
				$('.at-snackbar').removeClass('sb-active error success');
				$('.at-snackbar').addClass('sb-active '+respo.type).html(respo.msg);
				setTimeout(function(){
					$('.at-snackbar').removeClass('sb-active error success');
					if(respo.type == 'success'){
						$('.at-modal').hide().html('');
					}
				},3000);
			}
		}
	});
});

$(document) .on('click','button#biodata-actions',function(){
	$('.at-modal').load('biodata-actions-modal.php').show();
});

$(document) .on('change','input#biodata',function(){
	$('form#biodata-actions').submit();
});

$(document) .on('submit','form#biodata-actions',function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
	e.stopPropagation();
	var form1 = new FormData(this);
	$.ajax({
		'processData' : false,
		'contentType' : false,
		'url' : 'upload-biodata.php',
		'type' : 'post',
		'data' : form1,
		'success' : function(response){
			if(response != " " && response != ""){
				var respo = JSON.parse(response);
				$('.at-snackbar').removeClass('sb-active error success');
				$('.at-snackbar').addClass('sb-active '+respo.type).html(respo.msg);
				setTimeout(function(){
					$('.at-snackbar').removeClass('sb-active error success');
					if(respo.type == 'success'){
						$('.at-modal').hide().html('');
					}
				},3000);
			}
		}
	});
});

$(document) .on('change','input#dd-check',function(){
	$('input#dd-check:checked').each(function(){
		$(this).click();
	});
	$(this).click();
});

$(document) .on('click','button#company-delete',function(){
	var id = $(this).data('id');
	if(confirm("ARE YOU SURE TO DELETE COMPANY? THIS CANNOT BE UNDONE.") !== false){
		$.ajax({
			'type' : 'post',
			'url' : 'delete-company.php',
			'data' : { 'id' : id },
			'success' : function(response){
				var respo = JSON.parse(response);
				alert(respo.msg);
				location.reload();
			}
		});
	}
});


$(document) .on('click','a#update-we',function(){
	var id = $(this).data('id');
	$('.at-modal').load('experience-form-update.php',{'id' : id}).show();
});

$(document) .on('submit','form#experience-form-update',function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
	e.stopPropagation();
	var form1 = new FormData(this);
	var url = $(this).attr('action');
	$.ajax({
		'processData' : false,
		'contentType' : false,
		'type' : 'post',
		'url' : url,
		'data' : form1,
		'success' : function(response){
			var respo = JSON.parse(response);
			$('.at-snackbar').removeClass('sb-active error success');
			$('.at-snackbar').addClass('sb-active '+respo.type).html(respo.msg);
			setTimeout(function(){
				$('.at-snackbar').removeClass('sb-active error success');
				if(respo.type == 'success'){
					location.reload();
				}
			},3000);
			
		}
	});
});

$(document) .on('click','button#add-educ-bgs',function(){
	$('.at-modal').load('educ-bgs-form.php').show();
});

$(document) .on('submit','form#educ-bgs-form',function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
	e.stopPropagation();
	var form1 = new FormData(this);
	var url = $(this).attr('action');
	$.ajax({
		'processData' : false,
		'contentType' : false,
		'type' : 'post',
		'url' : url,
		'data' : form1,
		'success' : function(response){
			var respo = JSON.parse(response);
			$('.at-snackbar').removeClass('sb-active error success');
			$('.at-snackbar').addClass('sb-active '+respo.type).html(respo.msg);
			setTimeout(function(){
				$('.at-snackbar').removeClass('sb-active error success');
				if(respo.type == 'success'){
					location.reload();
				}
			},3000);
			
		}
	});
});

$(document) .on('click','button#view-exp',function(){
	var id = $(this).data('id');
	$.ajax({
		'type' : 'post',
		'url' : 'view-exp.php',
		'data' : {'id' : id },
		'success' : function(response){
			$('.at-modal').html(response).show();
		}
	});
});

});


</script>

</body>
</html>