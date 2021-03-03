$(document).ready(function() {
  setTimeout(function(){
    $('[autocomplete=off]').val('');
  }, 15);
});

// $("#inventoryinfo_mileage").blur(function(){
//   var $this= $(this);
//   console.log($this.val());
// });

function makeExemptRequire(ele,ele_cb) {
  var value = $(ele).val();
  // console.log($(ele).val());
  // console.log($(ele).attr('id')+" >>");
  if(value != "")
    $('#'+ele_cb).prop('required',false);
  else
    $('#'+ele_cb).prop('required',true);
}

function makeExemptRequire_cb(ele,ele_input) {
  if ($(ele).prop("checked")) {
    $('#'+ele_input).prop("required", false);
  }else{
    $('#'+ele_input).prop("required", true);
  }
}
// $("#inventoryinfo_exempt_cb").click(function() {

// });

$(".chb").change(function(){
  $(".chb").prop('checked',false);
  $(this).prop('checked',true);
  // console.log($(this).val());
  if($(this).val() == "monthly"){
    $('.calc_result_monthly').css('display','table-row');
    $('.calc_result_biweekly').css('display','none');
  }else{
    $('.calc_result_monthly').css('display','none');
    $('.calc_result_biweekly').css('display','table-row');
  }
});

// Header
$(function() {
  var header = $(".start-style");
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if (scroll >= 10) {
      header.removeClass('start-style').addClass("scroll-on");
    } else {
      header.removeClass("scroll-on").addClass('start-style');
    }
  });
});

// Preloader
$(window).on('load', function() {
  if ($('#preloader').length) {
    $('#preloader').delay(100).fadeOut('slow', function() {
      $(this).remove();
    });
  }
});

// Back to top button
$(window).scroll(function() {
  if ($(this).scrollTop() > 100) {
    $('.back-to-top').fadeIn('slow');
  } else {
    $('.back-to-top').fadeOut('slow');
  }
});

$('.back-to-top').click(function() {
  $('html, body').animate({
    scrollTop: 0
  }, 1500);
  return false;
});

// Show the first tab by default
// $('.login_signup_tabsstage>div').hide();
// $('.login_signup_tabsstage div:first').show();
// $('.login_signup_tabsnav li:first').addClass('login_signup_tabactive');

// Change tab class and display content
$('.login_signup_tabsnav a').on('click', function(event){
  event.preventDefault();
  $('.login_signup_tabsnav li').removeClass('login_signup_tabactive');
  $(this).parent().addClass('login_signup_tabactive');
  $('.login_signup_tabsstage>div').hide();
  $($(this).attr('href')).show();
});

$('.hide-password').on('click', function(){
  var $this= $(this);
    $password_field = $this.parent().find('input');

  ( 'password' == $password_field.attr('type') ) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');
  ( 'Hide' == $this.text() ) ? $this.text('Show') : $this.text('Hide');
  //focus and move cursor to the end of input field
  $password_field.putCursorAtEnd();
});

$(document).ready(function(){
  $(".back_login").click(function(){
    $(".forgot_form").hide(150);
    $(".login_form").show(150);
  });
  $(".forgot_pass").click(function(){
    $(".forgot_form").show(150);
    $(".login_form").hide(150);
  });
});

var datav = {
    action: 'is_user_logged_inv'
};
var is_user_logged_in = true;
$.post(base_url+'login_check', datav, function(response) {
    if(response == '1') {
      is_user_logged_in = true;
    } else {
      is_user_logged_in = false;
    }
});

$(document).on('click','.user_login_btn',function(e) {

  urlv = base_url+'home/doLogin';
  var $this = $(this).parent();
  var ing = $this.data('ing');
  var prv = $this.html();

  if($('#login_email').val()!='' && $('#login_password').val()!='' )
  {
    $.ajax({
        url : urlv,
        method : "POST",
        data : {login_email : $('#login_email').val() , login_password: $('#login_password').val()},
        beforeSend: function() {
          $this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          // console.log(data);
          $('.ldr').hide();
          $this.html(prv);

          if(data == 'done'){
            // $.toastr.success('Success SignIn.', {position: 'top-center',size: 'lg',time: 5000});
            setTimeout(window.location.href = base_url+'dashboard', 2000);

          }else if(data == 'doneA'){
            setTimeout(window.location.href = base_url+'admin/dealer', 2000);
          }else if(data == 'deactive'){

            //$.toastr.warning('SignIn failed'+'<br> Email address or password not match', {position: 'top-center',size: 'lg',time: 5000});
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">SignIn failed<br>Your account has been deactivated</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert);

          }else if(data == 'notmatch'){

            //$.toastr.warning('SignIn failed'+'<br> Email address or password not match', {position: 'top-center',size: 'lg',time: 5000});
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">SignIn failed<br>Email address or password not match</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert);
          }else{
            // $.toastr.error('SignIn failed'+'<br>'+data, {position: 'top-center',size: 'lg',time: 5000});
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">SignIn failed<br>'+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }

        }
    });
  }else{
      // $.toastr.error('Empty Credential', {position: 'top-center',size: 'lg',time: 5000});
      var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Empty Credential</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
      return false;
  }

});

$( "#user_signup_form" ).submit(function( event ) {

  urlv = base_url+'home/registration';
  var $this = $(this);
  //var ing = $this.data('ing');
  //var prv = $this.html();
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
  if(isPasswordValid($('#signup_password').val()) == true){
  if($('#signup_password').val() == $('#signup_conpassword').val() )
  {
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          // console.log(data);
          $('.ldr').hide();
          //$this.html(prv);

          if(data == 'done'){
            $('.form_field').val('');
            $('#do_signup_form').submit();
            //setTimeout(window.location.href = base_url+'member', 2000);
            // $.toastr.success('Success SignIn.', {position: 'top-center',size: 'lg',time: 5000});
            //setTimeout(window.location.href = base_url+'member', 2000);
          }else if (data == 'nopackage') {
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">SignIn failed<br>first select package from home page</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }else{
            // $.toastr.error('SignIn failed'+'<br>'+data, {position: 'top-center',size: 'lg',time: 5000});
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">SignIn failed<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });
  }else{
      // $.toastr.error('Empty Credential', {position: 'top-center',size: 'lg',time: 5000});
      var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Password not match</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);

      return false;
  }
}else{
   var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Invalid password<br>Input Password and Submit [8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character]</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);

      return false;
}
event.preventDefault();
});

$( "#login_forgot_form" ).submit(function( event ) {

  urlv = base_url+'home/forgetpassword';
  var $this = $(this);
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          // console.log(data);
          $('.ldr').hide();
          //$this.html(prv);

          if(data == 'done'){
           $('.form_field').val('');
            var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<div class="alert-text">Forget password link sent on email successfully</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert);
            setTimeout(location.reload(), 3000);
            // $.toastr.success('Success SignIn.', {position: 'top-center',size: 'lg',time: 5000});
            //setTimeout(window.location.href = base_url+'member', 2000);
          }else if(data == 'notfound'){
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Member not fount!</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert);
            return false;
          }else if(data == 'invalid'){
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Email format is invalid!</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert);
            return false;
          }else{
            // $.toastr.error('SignIn failed'+'<br>'+data, {position: 'top-center',size: 'lg',time: 5000});
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Forget password link sent failed!<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });

event.preventDefault();

});

$(document).on('click','.user_resetpass_btn',function(e) {

  urlv = base_url+'home/setnewpassword';
  var $this = $(this);
  $('.alert').slideUp();

  if($('#main_password').val()!='' && $('#confirm_password').val()!='')
  {
    if($('#main_password').val() == $('#confirm_password').val())
    {
    $.ajax({
        url : urlv,
        method : "POST",
        data : {password : $('#main_password').val(),tokenid : $('#tokenid').val()},
        beforeSend: function() {
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          // console.log(data);
          $('.ldr').remove();

          if(data == 'done'){
            var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<div class="alert-text">Password successfully changed.</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.parent().after(alert);
            setTimeout(window.location.href = base_url, 2000);

          }else if(data == 'expired'){
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">link is expired</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.parent().after(alert);
            return false;

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Something is wrong<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.parent().after(alert);
            return false;
          }

        }
    });
  }else{
    var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">confirm password not match</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.parent().after(alert);
    return false;
  }
  }else{
    var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Empty Credential</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.parent().after(alert);
      return false;
  }

});

$(document).on('click','.btn_check_vin_number',function(e) {

  urlv ='https://vpic.nhtsa.dot.gov/api/vehicles/DecodeVINValuesBatch';
  var $this = $(this);
  $('.alert').slideUp();
  if($('#input_vin_number').val()!='')
  {
    $.ajax({
        url : urlv,
        method : "POST",
        data : {format : 'json', data: $('#input_vin_number').val()},
        beforeSend: function() {
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          // console.log(data);
          // console.log(data["Results"][0]['ModelYear']);
          $('#add_inventory').modal('toggle');
          $('#add_inventory_info').modal('show');

          $('#inventoryinfo_vin').val($('#input_vin_number').val());
          $('#inventoryinfo_year').val(data["Results"][0]['ModelYear']);
          $('#inventoryinfo_make').val(data["Results"][0]['Make']);
          $('#inventoryinfo_model').val(data["Results"][0]['Model']);
          $('#inventoryinfo_style').val(data["Results"][0]['BodyClass']);
          $('#inventoryinfo_drivetype').val(data["Results"][0]['DriveType']);
          $('#inventoryinfo_enginesize').val(data["Results"][0]['DisplacementL']);

          $('.ldr').hide();

        }
    });
  }else{
      // $.toastr.error('Empty Credential', {position: 'top-center',size: 'lg',time: 5000});
      var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Empty Credential</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
      return false;
  }

});

$( "#add_inventory_info_form" ).submit(function( event ) {

  urlv = base_url+'inventoryarea/insert_inventory';
  var $this = $(this);
  //var ing = $this.data('ing');
  //var prv = $this.html();
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          //console.log(data);
          $('.ldr').hide();
          //$this.html(prv);

          if(data == 'done'){
            $('.form_field').val('');
            //location.reload();
            window.location.href = base_url+'inventoryarea'
            //setTimeout(window.location.href = base_url+'member', 2000);

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Inventory insert failed<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });

  event.preventDefault();
});

$(document).on('click','.btn_check_vin_number_trade',function(e) {

  urlv ='https://vpic.nhtsa.dot.gov/api/vehicles/DecodeVINValuesBatch';
  var $this = $(this);
  $('.alert').slideUp();
  if($('#input_vin_number_trade').val()!='')
  {
  	/*urlv =base_url+'inventoryarea/getInventoryDataFromVIN';
	  $.ajax({
	        url : urlv,
	        method : "POST",
	        data : {vin : $('#input_vin_number_trade').val()},
	        beforeSend: function() {
	          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
	        },
	        success :function(data){
	          $('.ldr').remove();
	          //console.log(data);
	          if(data == "notfound"){
 				var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
	              '<div class="alert-text">Vehicle not found in inventory</div>'+
	              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
	            '</div>');
	           $this.parent().after(alert);
            	return false;
	          }else{
	          	var json = JSON.parse(data);

	            $('#add_trade').modal('toggle');
          		$('#add_trade_info').modal('show');

	          $('#tradeinfo_vin').val(json[0].inv_vin);
	          $('#tradeinfo_year').val(json[0].inv_year);
	          $('#tradeinfo_make').val(json[0].inv_make);
	          $('#tradeinfo_model').val(json[0].inv_model);
	          $('#tradeinfo_style').val(json[0].inv_style);
	          // $('#tradeinfo_stocknumber').val(json[0].inv_stock);
	          $('#tradeinfo_color').val(json[0].inv_color);
	          $('#tradeinfo_mileage').val(json[0].inv_mileage);
	          $('#tradeinfo_allowance').val(json[0].inv_flrc);

				}
	        }
	    });*/
    $.ajax({
        url : urlv,
        method : "POST",
        data : {format : 'json', data: $('#input_vin_number_trade').val()},
        beforeSend: function() {
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          // console.log(data);
          $('.ldr').hide();
          // console.log(data["Results"][0]['ModelYear']);
          $('#add_trade').modal('toggle');
          $('#add_trade_info').modal('show');

          $('#tradeinfo_vin').val($('#input_vin_number_trade').val());
          $('#tradeinfo_year').val(data["Results"][0]['ModelYear']);
          $('#tradeinfo_make').val(data["Results"][0]['Make']);
          $('#tradeinfo_model').val(data["Results"][0]['Model']);
          $('#tradeinfo_style').val(data["Results"][0]['BodyClass']);
          $('#tradeinfo_drivetype').val(data["Results"][0]['DriveType']);
          $('#tradeinfo_enginesize').val(data["Results"][0]['DisplacementL']);

        }
    });
  }else{
      // $.toastr.error('Empty Credential', {position: 'top-center',size: 'lg',time: 5000});
      var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Empty Credential</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.parent().after(alert);
      return false;
  }

});


$( "#add_trade_info_form" ).submit(function( event ) {

  urlv = base_url+'inventoryarea/insert_trade';
  var $this = $(this);
  //var ing = $this.data('ing');
  //var prv = $this.html();
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          console.log(data);
          $('.ldr').hide();
          //$this.html(prv);

          if(data == 'done'){
            $('.form_field').val('');
            // location.reload();
            window.location.href = base_url+'inventoryarea?type=trade'
            //setTimeout(window.location.href = base_url+'member', 2000);

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Trade insert failed<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });

  event.preventDefault();
});

function geteditinventoryId(ele) {
  // console.log($(ele).parent().parent().parent().parent().parent().prev('tr').attr('id'));
  var inv_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(inv_id === undefined){
    inv_id = $(ele).parent().attr('id');
  }

  // $('#add_inventory').modal('toggle');
  // $('#edit_inventory_info').modal('show');

  urlv =base_url+'inventoryarea/getInventoryDataFromId';
  var $this = $(ele);

  $.ajax({
        url : urlv,
        method : "POST",
        data : {id : inv_id},
        beforeSend: function() {
          $this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          $('.ldr').remove();
          //console.log(data);
          var json = JSON.parse(data);
          // console.log(json[0].inv_vin);

          $('#edit_inventory_info').modal('show');

          $('#edit_inventoryinfo_ivn_id').val(json[0].inv_id);
          $('#edit_inventoryinfo_vin').val(json[0].inv_vin);
          $('#edit_inventoryinfo_year').val(json[0].inv_year);
          $('#edit_inventoryinfo_make').val(json[0].inv_make);
          $('#edit_inventoryinfo_model').val(json[0].inv_model);
          $('#edit_inventoryinfo_style').val(json[0].inv_style);
          $('#edit_inventoryinfo_stocknumber').val(json[0].inv_stock);
          $('#edit_inventoryinfo_color').val(json[0].inv_color);
          $('#edit_inventoryinfo_drivetype').val(json[0].drive_type);
          $('#edit_inventoryinfo_enginesize').val(json[0].engine_size);
          $('#edit_inventoryinfo_mileage').val(json[0].inv_mileage);
          if(json[0].inv_exempt == "yes") $('#edit_inventoryinfo_exempt_cb').prop('checked',true);
          $('#edit_inventoryinfo_cost').val(json[0].inv_cost);
          $('#edit_inventoryinfo_addedcost').val(json[0].inv_addedcost);
          $('#edit_inventoryinfo_totalcost').val(json[0].inv_flrc);
          $('#edit_inventoryinfo_stickerprice').val(json[0].inv_price);

        }
    });
}

$( "#edit_inventory_form" ).submit(function( event ) {

  urlv = base_url+'inventoryarea/update_inventory';
  var $this = $(this);
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          //console.log(data);
          $('.ldr').hide();

          if(data == 'done'){
            $('.form_field').val('');
            var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<div class="alert-text">Inventory updated successfully</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert);
            setTimeout(window.location.href = base_url+'inventoryarea', 3000);

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Inventory update failed<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });

  event.preventDefault();
});

function getviewinventoryId(ele) {
  // console.log($(ele).parent().parent().parent().parent().parent().prev('tr').attr('id'));
  var inv_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(inv_id === undefined){
    inv_id = $(ele).parent().attr('id');
  }

  // $('#add_inventory').modal('toggle');
  // $('#view_inventory_info').modal('show');

  urlv =base_url+'inventoryarea/getInventoryDataFromId';
  var $this = $(ele);

  $.ajax({
        url : urlv,
        method : "POST",
        data : {id : inv_id},
        beforeSend: function() {
          $this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          $('.ldr').remove();
          //console.log(data);
          var json = JSON.parse(data);
          //console.log(json[0].inv_vin);

          $('#view_inventory_info').modal('show');

          $('#view_inventoryinfo_vin').val(json[0].inv_vin);
          $('#view_inventoryinfo_year').val(json[0].inv_year);
          $('#view_inventoryinfo_make').val(json[0].inv_make);
          $('#view_inventoryinfo_model').val(json[0].inv_model);
          $('#view_inventoryinfo_style').val(json[0].inv_style);
          $('#view_inventoryinfo_stocknumber').val(json[0].inv_stock);
          $('#view_inventoryinfo_color').val(json[0].inv_color);
          $('#view_inventoryinfo_drivetype').val(json[0].drive_type);
          $('#view_inventoryinfo_enginesize').val(json[0].engine_size);
          $('#view_inventoryinfo_mileage').val(json[0].inv_mileage);
          if(json[0].inv_exempt == "yes") $('#view_inventoryinfo_exempt_cb').prop('checked',true);
          $('#view_inventoryinfo_cost').val(json[0].inv_cost);
          $('#view_inventoryinfo_addedcost').val(json[0].inv_addedcost);
          $('#view_inventoryinfo_totalcost').val(json[0].inv_flrc);
          $('#view_inventoryinfo_stickerprice').val(json[0].inv_price);

        }
    });
}

function getremoveinventoryId(ele) {
  var buyer_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(buyer_id === undefined){
    buyer_id = $(ele).parent().attr('id');
  }
        Swal.fire({
        title: 'Are you sure?',
        text: "Remove vehicle from inventory!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3498db',
        cancelButtonColor: '#ff0000',
        confirmButtonText: 'Yes, Remove it!',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
      }).then(function (result) {
        if (result.value) {

          urlv =base_url+'inventoryarea/delete_inventory';
          $.ajax({
                url : urlv,
                method : "POST",
                data : {id : buyer_id},
                beforeSend: function() {
                  //$this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
                },
                success :function(data){
                  $("#rowinv"+buyer_id).fadeOut();
                  Swal.fire(
                    {
                      type: "success",
                      title: 'Remove!',
                      text: 'Vehicle has been Removed.',
                      confirmButtonClass: 'btn btn-success',
                    }
                  )
                }
            });
          // Swal.fire(
          //   {
          //     type: "success",
          //     title: 'Remove!',
          //     text: 'Vehicle has been Remove.',
          //     confirmButtonClass: 'btn btn-success',
          //   }
          // )
        }
      })
}

/////////trade start////////
function addToInventoryFromTrade(ele) {
  // console.log($(ele).parent().parent().parent().parent().parent().prev('tr').attr('id'));
  var inv_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(inv_id === undefined){
    inv_id = $(ele).parent().attr('id');
  }

  urlv =base_url+'inventoryarea/addToInventoryFromTrade';
  var $this = $(ele);

  $.ajax({
        url : urlv,
        method : "POST",
        data : {id : inv_id},
        beforeSend: function() {
          $this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          $('.ldr').remove();
          console.log(data);
          if(data == "done"){
            window.location.href = base_url+'inventoryarea?type=trade'
          }else{
            Swal.fire({
              type: "warning",
              title: 'Not added to inventory',
              text: 'This VIN number already exist in inventory or something went wrong!',
              confirmButtonClass: 'btn btn-success',
            })
          }
        }
    });
}
function getedittradeId(ele) {
  // console.log($(ele).parent().parent().parent().parent().parent().prev('tr').attr('id'));
  var inv_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(inv_id === undefined){
    inv_id = $(ele).parent().attr('id');
  }

  urlv =base_url+'inventoryarea/getTradeDataFromId';
  var $this = $(ele);

  $.ajax({
        url : urlv,
        method : "POST",
        data : {id : inv_id},
        beforeSend: function() {
          $this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          $('.ldr').remove();
          //console.log(data);
          var json = JSON.parse(data);
          // console.log(json[0].inv_vin);

          $('#edit_trade_info').modal('show');

          $('#edit_tradeinfo_ivn_id').val(json[0].trade_inv_id);
          $('#edit_tradeinfo_vin').val(json[0].trade_inv_vin);
          $('#edit_tradeinfo_year').val(json[0].trade_inv_year);
          $('#edit_tradeinfo_make').val(json[0].trade_inv_make);
          $('#edit_tradeinfo_model').val(json[0].trade_inv_model);
          $('#edit_tradeinfo_style').val(json[0].trade_inv_style);
          $('#edit_tradeinfo_color').val(json[0].trade_inv_color);
          $('#edit_tradeinfo_drivetype').val(json[0].trade_drive_type);
          $('#edit_tradeinfo_enginesize').val(json[0].trade_engine_size);
          $('#edit_tradeinfo_mileage').val(json[0].trade_inv_mileage);
          if(json[0].trade_inv_exempt == "yes") $('#edit_tradeinfo_exempt_cb').prop('checked',true);
          $('#edit_tradeinfo_allowance').val(json[0].trade_inv_price);

        }
    });
}

$( "#edit_trade_form" ).submit(function( event ) {

  urlv = base_url+'inventoryarea/update_trade';
  var $this = $(this);
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          //console.log(data);
          $('.ldr').hide();

          if(data == 'done'){
            $('.form_field').val('');
            var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<div class="alert-text">Trade updated successfully</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');

            $this.after(alert);
            setTimeout(window.location.href = base_url+'inventoryarea?type=trade', 3000);

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Trade update failed<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });

  event.preventDefault();
});

function getviewtradeId(ele) {
  // console.log($(ele).parent().parent().parent().parent().parent().prev('tr').attr('id'));
  var inv_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(inv_id === undefined){
    inv_id = $(ele).parent().attr('id');
  }

  // $('#add_inventory').modal('toggle');
  // $('#view_inventory_info').modal('show');

  urlv =base_url+'inventoryarea/getTradeDataFromId';
  var $this = $(ele);

  $.ajax({
        url : urlv,
        method : "POST",
        data : {id : inv_id},
        beforeSend: function() {
          $this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          $('.ldr').remove();
          //console.log(data);
          var json = JSON.parse(data);
          //console.log(json[0].inv_vin);

          $('#view_trade_info').modal('show');

          $('#view_trade_vin').val(json[0].trade_inv_vin);
          $('#view_trade_year').val(json[0].trade_inv_year);
          $('#view_trade_make').val(json[0].trade_inv_make);
          $('#view_trade_model').val(json[0].trade_inv_model);
          $('#view_trade_style').val(json[0].trade_inv_style);
          $('#view_trade_color').val(json[0].trade_inv_color);
          $('#view_tradeinfo_drivetype').val(json[0].trade_drive_type);
          $('#view_tradeinfo_enginesize').val(json[0].trade_engine_size);
          $('#view_trade_mileage').val(json[0].trade_inv_mileage);
          if(json[0].trade_inv_exempt == "yes") $('#view_trade_exempt_cb').prop('checked',true);
          $('#view_trade_allowance').val(json[0].trade_inv_price);

        }
    });
}

function getdeletetradeId(ele) {
  var inv_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(inv_id === undefined){
    inv_id = $(ele).parent().attr('id');
  }
        Swal.fire({
        title: 'Are you sure?',
        text: "Remove vehicle from trade!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3498db',
        cancelButtonColor: '#ff0000',
        confirmButtonText: 'Yes, Remove it!',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
      }).then(function (result) {
        if (result.value) {

          urlv =base_url+'inventoryarea/delete_trade';
          $.ajax({
                url : urlv,
                method : "POST",
                data : {id : inv_id},
                beforeSend: function() {
                  //$this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
                },
                success :function(data){
                  $("#rowtrade"+inv_id).fadeOut();
                  Swal.fire(
                    {
                      type: "success",
                      title: 'Remove!',
                      text: 'Vehicle has been Removed.',
                      confirmButtonClass: 'btn btn-success',
                    }
                  )
                }
            });
          // Swal.fire(
          //   {
          //     type: "success",
          //     title: 'Remove!',
          //     text: 'Vehicle has been Remove.',
          //     confirmButtonClass: 'btn btn-success',
          //   }
          // )
        }
      })
}


$( "#add_buyer_info_form" ).submit(function( event ) {

  urlv = base_url+'buyerarea/insert_buyer';
  var $this = $(this);
  //var ing = $this.data('ing');
  //var prv = $this.html();
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
  if($('#add_buyer_workphone').val() != "" || $('#add_buyer_homephone').val() != "" || $('#add_buyer_mobile').val() != ""){
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          //console.log(data);
          $('.ldr').hide();

          if(data == 'done'){
            $('.form_field').val('');
            //location.reload();
            var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<div class="alert-text">Buyer inserted successfully</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert);
            //setTimeout(location.reload(), 2000);
            setTimeout(window.location.href = base_url+'buyerarea', 2000);

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Buyer insert failed<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });
  }else{
    var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Any one phone number is mandatory</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
  }

  event.preventDefault();
});

$( "#add_cobuyer_info_form" ).submit(function( event ) {

  urlv = base_url+'buyerarea/insert_cobuyer';
  var $this = $(this);
  //var ing = $this.data('ing');
  //var prv = $this.html();
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
  if($('#add_cobuyer_select_buyer').val() != 0){
  if($('#add_cobuyer_workphone').val() != "" || $('#add_cobuyer_homephone').val() != "" || $('#add_cobuyer_mobile').val() != ""){

    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          //console.log(data);
          $('.ldr').hide();

          if(data == 'done'){
            $('.form_field').val('');
            //location.reload();
            var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<div class="alert-text">Co-Buyer inserted successfully</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert);
            setTimeout(window.location.href = base_url+'buyerarea?type=cobuyer', 2000);
            // setTimeout(location.reload(), 2000);
            //setTimeout(window.location.href = base_url+'member', 2000);

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Co-Buyer insert failed<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });

  }else{
     var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Any one phone number is mandatory</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
  }
  }else{
     var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Select Buyer first!</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
  }

  event.preventDefault();
});

/////////buyer start////////
function geteditbuyerId(ele) {
  // console.log($(ele).parent().parent().parent().parent().parent().prev('tr').attr('id'));
  var buyer_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(buyer_id === undefined){
    buyer_id = $(ele).parent().attr('id');
  }
  urlv =base_url+'buyerarea/getBuyerDataFromId';
  var $this = $(ele);

  $.ajax({
        url : urlv,
        method : "POST",
        data : {id : buyer_id},
        beforeSend: function() {
          $this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          $('.ldr').remove();
          //console.log(data);
          var json = JSON.parse(data);
          // console.log(json[0].inv_vin);

          $('#edit_buyer').modal('show');

          $('#edit_buyer_buyer_id').val(json[0].buyers_id);
          $('#edit_buyer_firstname').val(json[0].buyers_first_name);
          $('#edit_buyer_middlename').val(json[0].buyers_mid_name);
          $('#edit_buyer_lastname').val(json[0].buyers_last_name);
          $('#edit_buyer_address').val(json[0].buyers_address);
          $('#edit_buyer_city').val(json[0].buyers_city);
          $('#edit_buyer_country').val(json[0].buyers_county);
          $('#edit_buyer_state').val(json[0].buyers_state);
          $('#edit_buyer_zip').val(json[0].buyers_zip);
          $('#edit_buyer_email').val(json[0].buyers_pri_email);
          $('#edit_buyer_workphone').val(json[0].buyers_work_phone);
          $('#edit_buyer_homephone').val(json[0].buyers_home_phone);
          $('#edit_buyer_mobile').val(json[0].buyers_pri_phone_cell);
          $('#edit_buyer_dlnumber').val(json[0].buyers_DL_number);
          $('#edit_buyer_dlstate').val(json[0].buyers_DL_state);
          $('#edit_buyer_dlexpire').val(json[0].buyers_DL_expire);
          $('#edit_buyer_dldob').val(json[0].buyers_DL_dob);
          $('#edit_buyer_temp_tag_number').val(json[0].buyers_temp_tag_number);

        }
    });
}

$( "#edit_buyer_info_form" ).submit(function( event ) {

  urlv = base_url+'buyerarea/update_buyer';
  var $this = $(this);
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
  if($('#edit_buyer_workphone').val() != "" || $('#edit_buyer_homephone').val() != "" || $('#edit_buyer_mobile').val() != ""){
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          //console.log(data);
          $('.ldr').hide();

          if(data == 'done'){
            $('.form_field').val('');
            var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<div class="alert-text">Buyer updated successfully</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert);
            setTimeout(window.location.href = base_url+'buyerarea', 2000);

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Buyer update failed<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });
  }else{
     var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Any one phone number is mandatory</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
  }

  event.preventDefault();
});

function getviewbuyerId(ele) {
  // console.log($(ele).parent().parent().parent().parent().parent().prev('tr').attr('id'));
  var inv_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(inv_id === undefined){
    inv_id = $(ele).parent().attr('id');
  }

  // $('#add_inventory').modal('toggle');
  // $('#view_inventory_info').modal('show');

  urlv =base_url+'buyerarea/getBuyerDataFromId';
  var $this = $(ele);

  $.ajax({
        url : urlv,
        method : "POST",
        data : {id : inv_id},
        beforeSend: function() {
          $this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          $('.ldr').remove();
          //console.log(data);
          var json = JSON.parse(data);
          //console.log(json[0].inv_vin);

          $('#view_buyer').modal('show');

          $('#view_buyer_firstname').val(json[0].buyers_first_name);
          $('#view_buyer_middlename').val(json[0].buyers_mid_name);
          $('#view_buyer_lastname').val(json[0].buyers_last_name);
          $('#view_buyer_address').val(json[0].buyers_address);
          $('#view_buyer_city').val(json[0].buyers_city);
          $('#view_buyer_country').val(json[0].buyers_county);
          $('#view_buyer_state').val(json[0].buyers_state);
          $('#view_buyer_zip').val(json[0].buyers_zip);
          $('#view_buyer_email').val(json[0].buyers_pri_email);
          $('#view_buyer_workphone').val(json[0].buyers_work_phone);
          $('#view_buyer_homephone').val(json[0].buyers_home_phone);
          $('#view_buyer_mobile').val(json[0].buyers_pri_phone_cell);
          $('#view_buyer_dlnumber').val(json[0].buyers_DL_number);
          $('#view_buyer_dlstate').val(json[0].buyers_DL_state);
          $('#view_buyer_dlexpire').val(json[0].buyers_DL_expire);
          $('#view_buyer_dldob').val(json[0].buyers_DL_dob);
          $('#view_buyer_temp_tag_number').val(json[0].buyers_temp_tag_number);

          $('#view_cobuyer_firstname').val(json[0].co_buyers_first_name);
          $('#view_cobuyer_middlename').val(json[0].co_buyers_mid_name);
          $('#view_cobuyer_lastname').val(json[0].co_buyers_last_name);
          $('#view_cobuyer_address').val(json[0].co_buyers_address);
          $('#view_cobuyer_city').val(json[0].co_buyers_city);
          $('#view_cobuyer_country').val(json[0].co_buyers_county);
          $('#view_cobuyer_state').val(json[0].co_buyers_state);
          $('#view_cobuyer_zip').val(json[0].co_buyers_zip);
          $('#view_cobuyer_email').val(json[0].co_buyers_pri_email);
          $('#view_cobuyer_workphone').val(json[0].co_buyers_work_phone);
          $('#view_cobuyer_homephone').val(json[0].co_buyers_home_phone);
          $('#view_cobuyer_mobile').val(json[0].co_buyers_pri_phone_cell);
          $('#view_cobuyer_dlnumber').val(json[0].co_buyers_DL_number);
          $('#view_cobuyer_dlstate').val(json[0].co_buyers_DL_state);
          $('#view_cobuyer_dlexpire').val(json[0].co_buyers_DL_expire);
          $('#view_cobuyer_dldob').val(json[0].co_buyers_DL_dob);


          $('#view_insurance_company').val(json[0].ins_company);
          $('#view_insurance_policynumber').val(json[0].ins_pol_num);
          $('#view_insurance_agentname').val(json[0].ins_agent);
          $('#view_insurance_agentphone').val(json[0].ins_phone);
          $('#view_insurance_address').val(json[0].ins_address);
          $('#view_insurance_city').val(json[0].ins_city);
          $('#view_insurance_state').val(json[0].ins_state);
          $('#view_insurance_zip').val(json[0].ins_zip);

        }
    });
}

function getdeletebuyerId(ele) {
  var inv_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(inv_id === undefined){
    inv_id = $(ele).parent().attr('id');
  }
        Swal.fire({
        title: 'Are you sure?',
        text: "Remove Buyer!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3498db',
        cancelButtonColor: '#ff0000',
        confirmButtonText: 'Yes, Remove it!',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
      }).then(function (result) {
        if (result.value) {

          urlv =base_url+'buyerarea/delete_buyer';
          $.ajax({
              url : urlv,
              method : "POST",
              data : {id : inv_id},
              beforeSend: function() {
                  //$this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
              },
              success :function(data){
                $("#rowbuyer"+inv_id).fadeOut();
                // $(ele).parent().parent().parent().parent().parent().fadeOut();
                Swal.fire(
                  {
                    type: "success",
                    title: 'Remove!',
                    text: 'Buyer has been Removed.',
                    confirmButtonClass: 'btn btn-success',
                  }
                )
              }
          });
        }
      })
}

function addcobuyerbyid(ele) {
  // console.log($(ele).parent().parent().parent().parent().parent().prev('tr').attr('id'));
  var buyer_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(buyer_id === undefined){
    buyer_id = $(ele).parent().attr('id');
  }
  urlv =base_url+'buyerarea/getBuyerDataFromId';
  var $this = $(ele);

  $.ajax({
        url : urlv,
        method : "POST",
        data : {id : buyer_id},
        beforeSend: function() {
          $this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          $('.ldr').remove();
          //console.log(data);
          var json = JSON.parse(data);
          // console.log(json[0].inv_vin);

          $('#add_cobuyer_buyer').modal('show');

          $('#add_cobuyer_buyer_buyername').val(json[0].buyers_first_name+' '+json[0].buyers_last_name);
          $('#add_cobuyer_buyer_id').val(json[0].buyers_id);
          $('#add_cobuyer_buyer_firstname').val(json[0].co_buyers_first_name);
          $('#add_cobuyer_buyer_middlename').val(json[0].co_buyers_mid_name);
          $('#add_cobuyer_buyer_lastname').val(json[0].co_buyers_last_name);
          $('#add_cobuyer_buyer_address').val(json[0].co_buyers_address);
          $('#add_cobuyer_buyer_city').val(json[0].co_buyers_city);
          $('#add_cobuyer_buyer_country').val(json[0].co_buyers_county);
          $('#add_cobuyer_buyer_state').val(json[0].co_buyers_state);
          $('#add_cobuyer_buyer_zip').val(json[0].co_buyers_zip);
          $('#add_cobuyer_buyer_email').val(json[0].co_buyers_pri_email);
          $('#add_cobuyer_buyer_workphone').val(json[0].co_buyers_work_phone);
          $('#add_cobuyer_buyer_homephone').val(json[0].co_buyers_home_phone);
          $('#add_cobuyer_buyer_mobile').val(json[0].co_buyers_pri_phone_cell);
          $('#add_cobuyer_buyer_dlnumber').val(json[0].co_buyers_DL_number);
          $('#add_cobuyer_buyer_dlstate').val(json[0].co_buyers_DL_state);
          $('#add_cobuyer_buyer_dlexpire').val(json[0].co_buyers_DL_expire);
          $('#add_cobuyer_buyer_dldob').val(json[0].co_buyers_DL_dob);

        }
    });
}


$( "#add_cobuyer_buyer_form" ).submit(function( event ) {

  urlv = base_url+'buyerarea/insert_cobuyer_from_buyer';
  var $this = $(this);
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
  if($('#add_cobuyer_buyer_workphone').val() != "" || $('#add_cobuyer_buyer_homephone').val() != "" || $('#add_cobuyer_buyer_mobile').val() != ""){

    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          //console.log(data);
          $('.ldr').hide();

          if(data == 'done'){
            $('.form_field').val('');
            var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<div class="alert-text">Co-Buyer inserted successfully</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert);
            setTimeout(location.reload(), 3000);

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Co-Buyer insert failed<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });
}else{
  var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Any one phone number is mandatory</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
}
  event.preventDefault();

});

function addinsurancebyid(ele) {

  var buyer_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(buyer_id === undefined){
    buyer_id = $(ele).parent().attr('id');
  }
  urlv =base_url+'buyerarea/getBuyerDataFromId';
  var $this = $(ele);

  $.ajax({
        url : urlv,
        method : "POST",
        data : {id : buyer_id},
        beforeSend: function() {
          $this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          $('.ldr').remove();
          //console.log(data);
          var json = JSON.parse(data);
          // console.log(json[0].inv_vin);

          $('#add_insurance_buyer').modal('show');

          $('#add_insurance_buyer_buyer_id').val(json[0].buyers_id);
          $('#add_insurance_buyer_buyername').val(json[0].buyers_first_name+" "+json[0].buyers_last_name);
          $('#add_insurance_buyer_companyname').val(json[0].ins_company);
          $('#add_insurance_buyer_policynumber').val(json[0].ins_pol_num);
          $('#add_insurance_buyer_agentname').val(json[0].ins_agent);
          $('#add_insurance_buyer_agentphone').val(json[0].ins_phone);
          $('#add_insurance_buyer_address').val(json[0].ins_address);
          $('#add_insurance_buyer_city').val(json[0].ins_city);
          $('#add_insurance_buyer_state').val(json[0].ins_state);
          $('#add_insurance_buyer_zip').val(json[0].ins_zip);

        }
    });
}

$( "#add_insurance_info_buyer_form" ).submit(function( event ) {

  urlv = base_url+'buyerarea/insert_insurance_from_buyer';
  var $this = $(this);
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          //console.log(data);
          $('.ldr').hide();

          if(data == 'done'){
            $('.form_field').val('');
            var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<div class="alert-text">Insurance inserted successfully</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert);
            setTimeout(location.reload(), 3000);

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Insurance insert failed<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });

  event.preventDefault();
});

/////////cobuyer start////////
function geteditcobuyerbyId(ele) {
  // console.log($(ele).parent().parent().parent().parent().parent().prev('tr').attr('id'));
  var buyer_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(buyer_id === undefined){
    buyer_id = $(ele).parent().attr('id');
  }
  urlv =base_url+'buyerarea/getBuyerDataFromId';
  var $this = $(ele);

  $.ajax({
        url : urlv,
        method : "POST",
        data : {id : buyer_id},
        beforeSend: function() {
          $this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          $('.ldr').remove();
          //console.log(data);
          var json = JSON.parse(data);
          // console.log(json[0].inv_vin);

          $('#edit_cobuyer').modal('show');

          $("#edit_cobuyer_buyer_id").val(json[0].buyers_id);
          $("#edit_cobuyer_buyername").val(json[0].buyers_first_name+' '+json[0].buyers_last_name);
          $('#edit_cobuyer_firstname').val(json[0].co_buyers_first_name);
          $('#edit_cobuyer_middlename').val(json[0].co_buyers_mid_name);
          $('#edit_cobuyer_lastname').val(json[0].co_buyers_last_name);
          $('#edit_cobuyer_address').val(json[0].co_buyers_address);
          $('#edit_cobuyer_city').val(json[0].co_buyers_city);
          $('#edit_cobuyer_country').val(json[0].co_buyers_county);
          $('#edit_cobuyer_state').val(json[0].co_buyers_state);
          $('#edit_cobuyer_zip').val(json[0].co_buyers_zip);
          $('#edit_cobuyer_email').val(json[0].co_buyers_pri_email);
          $('#edit_cobuyer_workphone').val(json[0].co_buyers_work_phone);
          $('#edit_cobuyer_homephone').val(json[0].co_buyers_home_phone);
          $('#edit_cobuyer_mobile').val(json[0].co_buyers_pri_phone_cell);
          $('#edit_cobuyer_dlnumber').val(json[0].co_buyers_DL_number);
          $('#edit_cobuyer_dlstate').val(json[0].co_buyers_DL_state);
          $('#edit_cobuyer_dlexpire').val(json[0].co_buyers_DL_expire);
          $('#edit_cobuyer_dldob').val(json[0].co_buyers_DL_dob);

        }
    });
}

$( "#edit_cobuyer_info_form" ).submit(function( event ) {

  urlv = base_url+'buyerarea/update_cobuyer';
  var $this = $(this);
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
  if($('#edit_cobuyer_workphone').val() != "" || $('#edit_cobuyer_homephone').val() != "" || $('#edit_cobuyer_mobile').val() != ""){

    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          //console.log(data);
          $('.ldr').hide();

          if(data == 'done'){
            $('.form_field').val('');
            var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<div class="alert-text">Co-Buyer updated successfully</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert);
            setTimeout(window.location.href = base_url+'buyerarea?type=cobuyer', 2000);

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Co-Buyer update failed<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });
}else{
   var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Any one phone number is mandatory</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
}
  event.preventDefault();

});

function getviewcobuyerbyId(ele) {
  // console.log($(ele).parent().parent().parent().parent().parent().prev('tr').attr('id'));
  var buyer_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(buyer_id === undefined){
    buyer_id = $(ele).parent().attr('id');
  }

  // $('#add_inventory').modal('toggle');
  // $('#view_inventory_info').modal('show');

  urlv =base_url+'buyerarea/getBuyerDataFromId';
  var $this = $(ele);

  $.ajax({
        url : urlv,
        method : "POST",
        data : {id : buyer_id},
        beforeSend: function() {
          $this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          $('.ldr').remove();
          //console.log(data);
          var json = JSON.parse(data);
          //console.log(json[0].inv_vin);

          $('#view_cobuyer').modal('show');

          $('#view_cobuyer2_buyername').val(json[0].buyers_first_name+' '+json[0].buyers_last_name);
          $('#view_cobuyer2_firstname').val(json[0].co_buyers_first_name);
          $('#view_cobuyer2_middlename').val(json[0].co_buyers_mid_name);
          $('#view_cobuyer2_lastname').val(json[0].co_buyers_last_name);
          $('#view_cobuyer2_address').val(json[0].co_buyers_address);
          $('#view_cobuyer2_city').val(json[0].co_buyers_city);
          $('#view_cobuyer2_country').val(json[0].co_buyers_county);
          $('#view_cobuyer2_state').val(json[0].co_buyers_state);
          $('#view_cobuyer2_zip').val(json[0].co_buyers_zip);
          $('#view_cobuyer2_email').val(json[0].co_buyers_pri_email);
          $('#view_cobuyer2_workphone').val(json[0].co_buyers_work_phone);
          $('#view_cobuyer2_homephone').val(json[0].co_buyers_home_phone);
          $('#view_cobuyer2_mobile').val(json[0].co_buyers_pri_phone_cell);
          $('#view_cobuyer2_dlnumber').val(json[0].co_buyers_DL_number);
          $('#view_cobuyer2_dlstate').val(json[0].co_buyers_DL_state);
          $('#view_cobuyer2_dlexpire').val(json[0].co_buyers_DL_expire);
          $('#view_cobuyer2_dldob').val(json[0].co_buyers_DL_dob);

        }
    });
}

function getdeletecobuyerbyId(ele) {
  var inv_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(inv_id === undefined){
    inv_id = $(ele).parent().attr('id');
  }
        Swal.fire({
        title: 'Are you sure?',
        text: "Remove Buyer!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3498db',
        cancelButtonColor: '#ff0000',
        confirmButtonText: 'Yes, Remove it!',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
      }).then(function (result) {
        if (result.value) {

          urlv =base_url+'buyerarea/delete_cobuyer';
          $.ajax({
              url : urlv,
              method : "POST",
              data : {id : inv_id},
              beforeSend: function() {
                  //$this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
              },
              success :function(data){
                $("#rowcobuyer"+inv_id).fadeOut();
                $(ele).parent().parent().parent().parent().parent().fadeOut();
                Swal.fire(
                  {
                    type: "success",
                    title: 'Remove!',
                    text: 'Buyer has been Removed.',
                    confirmButtonClass: 'btn btn-success',
                  }
                )
              }
          });
        }
      })
}


$( "#insurance_info_form" ).submit(function( event ) {

  urlv = base_url+'buyerarea/insert_insurance';
  var $this = $(this);
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
  if($('#add_insurance_select_buyer').val() != 0){
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          //console.log(data);
          $('.ldr').hide();

          if(data == 'done'){
            $('.form_field').val('');
            //location.reload();
            var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<div class="alert-text">Insurance inserted successfully</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert);
            //setTimeout(location.reload(), 2000);
            setTimeout(window.location.href = base_url+'buyerarea?type=insurance', 2000);

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Insurance insert failed<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });
  }else{
     var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Empty Credential<br>Select Buyer</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
  }

  event.preventDefault();
});

/////////Insurance start////////
function geteditinsurancebyId(ele) {
  // console.log($(ele).parent().parent().parent().parent().parent().prev('tr').attr('id'));
  var buyer_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(buyer_id === undefined){
    buyer_id = $(ele).parent().attr('id');
  }
  urlv =base_url+'buyerarea/getBuyerDataFromId';
  var $this = $(ele);

  $.ajax({
        url : urlv,
        method : "POST",
        data : {id : buyer_id},
        beforeSend: function() {
          $this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          $('.ldr').remove();
          //console.log(data);
          var json = JSON.parse(data);
          // console.log(json[0].inv_vin);

          $('#edit_insurance').modal('show');

          $('#edit_insurance_buyer_id').val(json[0].buyers_id);
          $('#edit_insurance_buyername').val(json[0].buyers_first_name+" "+json[0].buyers_last_name);
          $('#edit_insurance_companyname').val(json[0].ins_company);
          $('#edit_insurance_policynumber').val(json[0].ins_pol_num);
          $('#edit_insurance_agentname').val(json[0].ins_agent);
          $('#edit_insurance_agentphone').val(json[0].ins_phone);
          $('#edit_insurance_address').val(json[0].ins_address);
          $('#edit_insurance_city').val(json[0].ins_city);
          $('#edit_insurance_state').val(json[0].ins_state);
          $('#edit_insurance_zip').val(json[0].ins_zip);

        }
    });
}

$( "#edit_insurance_info_form" ).submit(function( event ) {

  urlv = base_url+'buyerarea/update_insurance';
  var $this = $(this);
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          //console.log(data);
          $('.ldr').hide();

          if(data == 'done'){
            $('.form_field').val('');
            var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<div class="alert-text">Insurance updated successfully</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert);
            setTimeout(window.location.href = base_url+'buyerarea?type=insurance', 2000);

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Insurance update failed<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });

  event.preventDefault();
});

function getviewinsurancebyId(ele) {
  // console.log($(ele).parent().parent().parent().parent().parent().prev('tr').attr('id'));
  var buyer_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(buyer_id === undefined){
    buyer_id = $(ele).parent().attr('id');
  }

  // $('#add_inventory').modal('toggle');
  // $('#view_inventory_info').modal('show');

  urlv =base_url+'buyerarea/getBuyerDataFromId';
  var $this = $(ele);

  $.ajax({
        url : urlv,
        method : "POST",
        data : {id : buyer_id},
        beforeSend: function() {
          $this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          $('.ldr').remove();
          //console.log(data);
          var json = JSON.parse(data);
          //console.log(json[0].inv_vin);

          $('#view_insurance').modal('show');

          $('#view_insurance_info_buyername').val(json[0].buyers_first_name+" "+json[0].buyers_last_name);
          $('#view_insurance_info_company').val(json[0].ins_company);
          $('#view_insurance_info_policynumber').val(json[0].ins_pol_num);
          $('#view_insurance_info_agentname').val(json[0].ins_agent);
          $('#view_insurance_info_agentphone').val(json[0].ins_phone);
          $('#view_insurance_info_address').val(json[0].ins_address);
          $('#view_insurance_info_city').val(json[0].ins_city);
          $('#view_insurance_info_state').val(json[0].ins_state);
          $('#view_insurance_info_zip').val(json[0].ins_zip);

        }
    });
}

function getremoveinsurancebyId(ele) {
  var inv_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(inv_id === undefined){
    inv_id = $(ele).parent().attr('id');
  }
        Swal.fire({
        title: 'Are you sure?',
        text: "Remove Insurance!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3498db',
        cancelButtonColor: '#ff0000',
        confirmButtonText: 'Yes, Remove it!',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
      }).then(function (result) {
        if (result.value) {

          urlv =base_url+'buyerarea/delete_insurance';
          $.ajax({
              url : urlv,
              method : "POST",
              data : {id : inv_id},
              beforeSend: function() {
                  //$this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
              },
              success :function(data){
                $("#rowins"+inv_id).fadeOut();
                $(ele).parent().parent().parent().parent().parent().fadeOut();
                Swal.fire(
                  {
                    type: "success",
                    title: 'Remove!',
                    text: 'Insurance has been Removed.',
                    confirmButtonClass: 'btn btn-success',
                  }
                )
              }
          });
        }
      })
}

$('#payment_calc_form').submit(function( event ){


  var amountFinance = $('#calc_ammount_finance').val();
  var downpayment = $('#calc_downpayment').val();
  // var tradeinCredit = $('#calc_tradein_credit').val();
  var loanLength    = $('#calc_loan_length_select').val();
  var interentRate  = $('#calc_interest_rate').val();
  computeForm(amountFinance,downpayment,loanLength,interentRate);
 //  if(downpayment != ""){
 //    amountFinance = amountFinance - downpayment;
 //  }

 //  // if(tradeinCredit != ""){
 //  //   amountFinance = amountFinance - tradeinCredit;
 //  // }
 //  var principal = parseFloat(amountFinance);
 //  var interest = parseFloat(interentRate) / 100 / 12;
 //  var payments = parseFloat(loanLength);

 //  var x = Math.pow(1 + interest, payments); //Math.pow computes powers
 //  var monthly = (principal*x*interest)/(x-1);
 //  var bimonthly = ((principal*x*interest)/(x-1))*.5;
 //  var weekly = ((principal*x*interest)/(x-1))*.25;

 //  if (isFinite(monthly)){
 //  // Fill in the output fields, rounding to 2 decimal places

 //  $('#calc_result_monthly_payment').text("$"+monthly.toFixed(2));
 //  $('#calc_result_biweekly_payment').text("$"+bimonthly.toFixed(2));
 //  $('#calc_result_weekly_payment').text("$"+weekly.toFixed(2));
 //  $('#calc_result_total_payment').text("$"+(monthly * payments).toFixed(2));
 //  $('#calc_result_total_interest').text("$"+((monthly*payments)-principal).toFixed(2));

 // }
 // else {
 // // Result was Not-a-Number or infinite, which means the input was
 // // incomplete or invalid. Clear any previously displayed output.
 //  $('#calc_result_monthly_payment').text("");// Erase the content of these elements
 //  $('#calc_result_total_payment').text("");
 //  $('#calc_result_total_interest').text("");

 // }

  event.preventDefault();

});

function computeMonthlyPayment(prin, numPmts, intRate) {

var pmtAmt = 0;

if(intRate == 0) {
   pmtAmt = prin / numPmts;
} else {
     intRate = intRate / 100.0 / 12;

   var pow = 1;
   for (var j = 0; j < numPmts; j++)
      pow = pow * (1 + intRate);

   pmtAmt = (prin * pow * intRate) / (pow - 1);

}

return pmtAmt;

}

function fns(num, places, comma, type, show) {

    var sym_1 = "";
    var sym_2 = "";

    var isNeg=0;

    if(num < 0) {
       num=num*-1;
       isNeg=1;
    }

    var myDecFact = 1;
    var myPlaces = 0;
    var myZeros = "";
    while(myPlaces < places) {
       myDecFact = myDecFact * 10;
       myPlaces = Number(myPlaces) + Number(1);
       myZeros = myZeros + "0";
    }

  onum=Math.round(num*myDecFact)/myDecFact;

  integer=Math.floor(onum);

  if (Math.ceil(onum) == integer) {
    decimal=myZeros;
  } else{
    decimal=Math.round((onum-integer)* myDecFact)
  }
  decimal=decimal.toString();
  if (decimal.length<places) {
        fillZeroes = places - decimal.length;
     for (z=0;z<fillZeroes;z++) {
        decimal="0"+decimal;
        }
     }

   if(places > 0) {
      decimal = "." + decimal;
   }

   if(comma == 1) {
  integer=integer.toString();
  var tmpnum="";
  var tmpinteger="";
  var y=0;

  for (x=integer.length;x>0;x--) {
    tmpnum=tmpnum+integer.charAt(x-1);
    y=y+1;
    if (y==3 & x>1) {
      tmpnum=tmpnum+",";
      y=0;
    }
  }

  for (x=tmpnum.length;x>0;x--) {
    tmpinteger=tmpinteger+tmpnum.charAt(x-1);
  }


  finNum=tmpinteger+""+decimal;
   } else {
      finNum=integer+""+decimal;
   }

    if(isNeg == 1) {
       if(type == 1 && show == 1) {
          finNum = "-" + sym_1 + "" + finNum + "" + sym_2;
       } else {
          finNum = "-" + finNum;
       }

    } else {
       if(show == 1) {
          if(type == 1) {
             finNum = sym_1 + "" + finNum + "" + sym_2;
          } else
          if(type == 2) {
             finNum = finNum + "%";
          }

       }

    }

  return finNum;
}

function computeFixedInterestCost(principal, intRate, pmtAmt) {

   var i = eval(intRate);
   i /= 100;
   i /= 12;

   var prin = eval(principal);
   var intPort = 0;
   var accumInt = 0;
   var prinPort = 0;
   var pmtCount = 0;
   var testForLast = 0;

   //CYCLES THROUGH EACH PAYMENT OF GIVEN DEBT
   while(prin > 0) {

      testForLast = (prin * (1 + i));

      if(pmtAmt < testForLast) {
         intPort = prin * i;
         accumInt = eval(accumInt) + eval(intPort);
         prinPort = eval(pmtAmt) - eval(intPort);
         prin = eval(prin) - eval(prinPort);
      } else {
      //DETERMINE FINAL PAYMENT AMOUNT
      intPort = prin * i;
      accumInt = eval(accumInt) + eval(intPort);
      prinPort = prin;
      prin = 0;
      }

      pmtCount = eval(pmtCount) + eval(1);

      if(pmtCount > 1000 || accumInt > 1000000000) {
         prin = 0;
      }

   }

return accumInt;

}

function computeForm(amountFinance,downpayment,loanLength,interentRate) {

   var prin1 = amountFinance;
   var rate = interentRate;
   var numPmts1 = loanLength;
   var Vpayextra = downpayment;

   {

      // var prin2 = amountFinance;

      var i = rate / 100.0;

      var i1  = i / 12;
      var i2 = i / 26;

      if(Vpayextra != ""){
        prin1 = prin1 - Vpayextra;
      }

      var pmt1 = computeMonthlyPayment(prin1, numPmts1, rate);
      $('#calc_result_monthly_payment').text("$"+fns(pmt1,2,1,1,1));
      $('#calc_result_total_payment').text("$"+fns(pmt1*numPmts1,2,1,1,1));
      // var pmt2 = (pmt1 / 2) + Number(Vpayextra);
      var pmt2 = (pmt1 / 2);
      // document.calc.biwkPmt.value = fns(pmt2,2,1,1,1);

      var VbiwkPmt0 = pmt1 * 12 / 26;
      $('#calc_result_biweekly_payment').text("$"+fns(VbiwkPmt0,2,1,1,1));

      var count = 0;
      var prin = prin1;
      var intPort = 0;
      var prinPort = 0;
      var accumInt = 0.0;

      while(prin > 0) {

         if((parseInt(prin) + (parseInt(prin) * i)) > pmt2) {
            intPort = prin * i2;
            prinPort = pmt2 - intPort;
            prin = prin - prinPort;
            accumInt = accumInt + intPort;

         } else {
            intPort = prin * i2;
            prinPort = prin;
            prin = prin - prinPort;
            accumInt = accumInt + intPort;

         }

         count = count + 1;



      }

      var numPmts2 = count;

      var numPmts3 = Math.ceil(numPmts1 - (12 * numPmts2/26));

      var VmoInt = computeFixedInterestCost(prin1, rate, pmt1);
      $('#calc_result_monthly_interest').text("$"+fns(VmoInt,2,1,1,1));

      var VbiwkInt = accumInt;

      $('#calc_result_biweekly_interest').text("$"+fns(VbiwkInt,2,1,1,1));
      $('#calc_result_biweekly_total_payment').text("$"+fns(parseInt(prin1) + parseInt(VbiwkInt),2,1,1,1));



      // var VintSave = Number(VmoInt) - Number(VbiwkInt);
      // document.calc.intSave.value = fns(VintSave,2,1,1,1);

      // var v_summary = "In essence, what biweekly payments do is add a 13th monthly payment, ";
      // v_summary += "though it is split across 26 bi-weekly payments. In your case means ";
      // v_summary += "that by paying an extra " + fns(Vpayextra + pmt1 / 26,2,1,1,1) + " every two weeks you ";
      // v_summary += "will pay off your loan in " + parseInt(numPmts2 /26*12,10) + " months instead of ";
      // v_summary += "the current " + numPmts1 + " months. This will save you " + numPmts3 + " months of payments and " + fns(VintSave,2,1,1,1) + " in loan ";
      // v_summary += "interest in the process. You can <strong>save even more</strong> by adding an extra amount to your biweekly payments or by <strong><a href='#viewcurrent'>refinancing your auto loan with a lower rate</a></strong>.";

      // var v_summary_cell = document.getElementById("summary");
      // v_summary_cell.innerHTML = "<strong>Summary:</strong> " + v_summary + "";

   }

}

$('#math_btn_total_first').on('click', function () {

  var $this = $(this).parent();
  $('.alert').slideUp();

  var buyer_id      = $("#math_buyer_select").val();//buyer_id
  var saleprice     = $("#math_saleprice").val();//sale_price
  var cashcredit    = $("#math_cashcredit").val();//cash_credit
  var tradecredit   = $("#math_tradecredit").val();//trade_credit
  // var tradebalance  = $("#math_tradebalance").val();//trade_balance
  var taxrate       = $("#math_taxrate").val();
  var servicefee    = $("#math_servicefee").val();//dealer_fee
  var tagregistration = $("#math_tagregistration").val();//dmv
  var tavtprice     = $("#math_tavtprice").val();

  if(saleprice != "" && cashcredit != "" && tradecredit != "" && taxrate != "" && servicefee != "" && tagregistration != "" && tavtprice != "" )
  {
    var no1=parseFloat(saleprice);
    var no2=parseFloat(cashcredit);
    var no3=parseFloat(tradecredit);
    // var no4=parseFloat(tradebalance);
    var no5=parseFloat(taxrate);
    var no6=parseFloat(servicefee);
    var no7=parseFloat(tagregistration);
    var no8=parseFloat(tavtprice);

// Sales price – Down payment- Trade in credit= Tax able amount *Tax Rate = Tax Due
// Total Due = Taxable amount + Tax Due + Service Fee + Tag Fees + gavt

    var taxableAmount = no1-no2-no3
    var tax = taxableAmount*no5/100
    var tax2=tax.toFixed(2)
    var totaldue = taxableAmount + tax + no6 + no7 + no8
    var no82 = totaldue.toFixed(2)

    var st1=no1-no3
    var st2=st1+no6
    var st3=st2+no7+tax

    $("#total_due").val(no82);//total_due
    // mathform.btn9.value=su2
    $("#tax").val(tax2);//tax
    // mathform.btn12.value=txa
    // mathform.btn13.value=su3
    $("#sub_due").val(st1);//sub_due
    $("#sub_due1").val(st2);//sub_due1
    $("#sub_due2").val(st3);//sub_due2
    // mathform.btn24.value=st4

    $("#math_taxdue").val(tax2);
    $("#math_totaldue").val(no82);

    // var no9=no1-no2-no3+no6+no7
    // var txa=no8-no3
    // var tax=txa*no5
    // var tax2=tax.toFixed(2)
    // var su1=no5-no3+no6+no7
    // var su2=(su1+tax).toFixed(2)
    // var su3=txa+no6
    // var no81=no9+tax
    // var no82=no81.toFixed(2)
    // var st1=no1-no3
    // var st2=st1+no6
    // var st3=st2+no7+tax
    // var st4=st3-no2

    // $("#total_due").val(no82);//total_due
    // // mathform.btn9.value=su2
    // $("#tax").val(tax2);//tax
    // // mathform.btn12.value=txa
    // // mathform.btn13.value=su3
    // $("#sub_due").val(st1);//sub_due
    // $("#sub_due1").val(st2);//sub_due1
    // $("#sub_due2").val(st3);//sub_due2
    // // mathform.btn24.value=st4

    // $("#math_taxdue").val(tax2);
    // $("#math_totaldue").val(no82);


}else{
  var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Please fill in the missing information</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
  $this.after(alert);
}

});

function autocalculater() {
  var $this = $("#math_btn_total").parent();
  $('.alert').slideUp();

  var buyer_id      = $("#math_buyer_select").val();//buyer_id
  var saleprice     = $("#math_saleprice").val();//sale_price
  var cashcredit    = $("#math_cashcredit").val();//cash_credit
  var tradecredit   = $("#math_tradecredit").val();//trade_credit
  // var tradebalance  = $("#math_tradebalance").val();//trade_balance
  var taxrate       = $("#math_taxrate").val();
  var servicefee    = $("#math_servicefee").val();//dealer_fee
  var tagregistration = $("#math_tagregistration").val();//dmv
  var tavtprice     = $("#math_tavtprice").val();

  if(saleprice != "" && cashcredit != "" && tradecredit != "" && taxrate != "" && servicefee != "" && tagregistration != "" && tavtprice != "" )
  {
    var no1=parseFloat(saleprice);
    var no2=parseFloat(cashcredit);
    var no3=parseFloat(tradecredit);
    // var no4=parseFloat(tradebalance);
    var no5=parseFloat(taxrate);
    var no6=parseFloat(servicefee);
    var no7=parseFloat(tagregistration);

    var tavtprice = no1*6.6/100;
    $("#math_tavtprice").val(tavtprice.toFixed(2));

    var no8=parseFloat(tavtprice);

    // Sales price – Down payment- Trade in credit= Tax able amount *Tax Rate = Tax Due
    // Total Due = Taxable amount + Tax Due + Service Fee + Tag Fees + gavt

    var taxableAmount = no1-no2-no3
    // var tax = taxableAmount*no5/100
    var tax = tavtprice*no5/100
    var tax2=tax.toFixed(2)
    //console.log(taxableAmount +' '+ tax +' '+ no6 +' '+ no7 +' '+ no8);
    // var totaldue = taxableAmount + tax + no6 + no7 + no8
    var totaldue = taxableAmount + tax + no6 + no7
    var no82 = totaldue.toFixed(2)

    var st1=no1-no3
    var st2=st1+no6
    var st3=st2+no7+tax

    $("#total_due").val(no82);//total_due
    // mathform.btn9.value=su2
    $("#tax").val(tax2);//tax
    // mathform.btn12.value=txa
    // mathform.btn13.value=su3
    $("#sub_due").val(st1);//sub_due
    $("#sub_due1").val(st2);//sub_due1
    $("#sub_due2").val(st3);//sub_due2
    // mathform.btn24.value=st4

    $("#math_taxdue").val(tax2);
    $("#math_totaldue").val(no82);
    $("#calc_ammount_finance").val(no82);
    // $("#calc_downpayment").val(cashcredit);

}else{
  var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Please fill in the missing information</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
  $this.after(alert);
}
}


$('#math_update_form').submit(function( event ){


urlv = base_url+'math/mathupdate';
  var $this = $("#math_update_submit").parent();
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          //console.log(data);
          $('.ldr').hide();

          if(data == 'done'){
            $('.form_field').val('');
            var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<div class="alert-text">Math updated successfully</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert);
            setTimeout(location.reload(), 3000);

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Math update failed<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });

  event.preventDefault();

});

$(document).on('click','.btn_check_vin_number_sd',function(e) {

  urlv ='https://vpic.nhtsa.dot.gov/api/vehicles/DecodeVINValuesBatch';
  var $this = $(this);
  $('.alert').slideUp();
  if($('#input_vin_number').val()!='')
  {
    $.ajax({
        url : urlv,
        method : "POST",
        data : {format : 'json', data: $('#input_vin_number').val()},
        beforeSend: function() {
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          console.log(data);
          // console.log(data["Results"][0]['ModelYear']);
          $('#add_inventory').modal('toggle');
          $('#add_inventory_info').modal('show');

          $('#sd_inventoryinfo_vin').val($('#input_vin_number').val());
          $('#sd_inventoryinfo_year').val(data["Results"][0]['ModelYear']);
          $('#sd_inventoryinfo_make').val(data["Results"][0]['Make']);
          $('#sd_inventoryinfo_model').val(data["Results"][0]['Model']);
          $('#sd_inventoryinfo_style').val(data["Results"][0]['BodyClass']);
          $('#sd_inventoryinfo_drivetype').val(data["Results"][0]['DriveType']);
          $('#sd_inventoryinfo_enginesize').val(data["Results"][0]['DisplacementL']);
          $('.ldr').hide();

        }
    });
  }else{
      // $.toastr.error('Empty Credential', {position: 'top-center',size: 'lg',time: 5000});
      var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Empty Credential</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.parent().after(alert);
      return false;
  }

});

$( "#add_inventory_sd_form" ).submit(function( event ) {

  urlv = base_url+'startdeal/insert_inventory';
  var $this = $(this);
  //var ing = $this.data('ing');
  //var prv = $this.html();
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          console.log(data);
          $('.ldr').hide();
          //$this.html(prv);
          var json = JSON.parse(data);
          if(json.request_status == 'done'){
            $('.form_field_inv_form').val('');
            $('#sd_main_inventory_inv_id').append('<option value="'+json.inv_id+'" selected>'+json.inv_stock+' '+json.inv_year+' '+json.inv_make+' '+json.inv_model+' '+json.inv_vin+'</option>');

            $('#sd_math_saleprice').val(json.inv_price);
            autocalculatersd();

            // $('#sd_calc_saleprice').val(json.insert_inventory);

             $('#add_inventory_info').modal('toggle');
             $('#next_trade').removeAttr("style");
             $('#next_trade_skip').removeAttr("style");
             Swal.fire({
              type: "success",
              title: 'Added!',
              text: 'Vehicle added successfully in inventory.',
              confirmButtonClass: 'btn btn-success'
            })


          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Inventory insert failed<br> '+json.msg+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });

  event.preventDefault();
});

$(document).on('click','.btn_check_vin_number_trade_sd',function(e) {
  urlv ='https://vpic.nhtsa.dot.gov/api/vehicles/DecodeVINValuesBatch';
  var $this = $(this);
  $('.alert').slideUp();
  if($('#input_vin_number_trade').val()!='')
  {
  	//urlv =base_url+'inventoryarea/getInventoryDataFromVIN';
	  /*$.ajax({
	        url : urlv,
	        method : "POST",
	        data : {vin : $('#input_vin_number_trade').val()},
	        beforeSend: function() {
	          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
	        },
	        success :function(data){
	          $('.ldr').remove();
	          //console.log(data);
	          if(data == "notfound"){
 				var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
	              '<div class="alert-text">Vehicle not found in inventory</div>'+
	              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
	            '</div>');
	           $this.parent().after(alert);
            	return false;
	          }else{
	          	var json = JSON.parse(data);

	            $('#add_trade').modal('toggle');
          		$('#add_trade_info').modal('show');

	          $('#sd_tradeinfo_vin').val(json[0].inv_vin);
	          $('#sd_tradeinfo_year').val(json[0].inv_year);
	          $('#sd_tradeinfo_make').val(json[0].inv_make);
	          $('#sd_tradeinfo_model').val(json[0].inv_model);
	          $('#sd_tradeinfo_style').val(json[0].inv_style);
	          $('#sd_tradeinfo_color').val(json[0].inv_color);
	          $('#sd_tradeinfo_mileage').val(json[0].inv_mileage);

				}
	        }
	    });*/

      $.ajax({
        url : urlv,
        method : "POST",
        data : {format : 'json', data: $('#input_vin_number_trade').val()},
        beforeSend: function() {
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          console.log(data);

          // console.log(data["Results"][0]['ModelYear']);
          $('#add_trade').modal('toggle');
          $('#add_trade_info').modal('show');

          $('#sd_tradeinfo_vin').val($('#input_vin_number_trade').val());
          $('#sd_tradeinfo_year').val(data["Results"][0]['ModelYear']);
          $('#sd_tradeinfo_make').val(data["Results"][0]['Make']);
          $('#sd_tradeinfo_model').val(data["Results"][0]['Model']);
          $('#sd_tradeinfo_style').val(data["Results"][0]['BodyClass']);
          $('#sd_tradeinfo_drivetype').val(data["Results"][0]['DriveType']);
          $('#sd_tradeinfo_enginesize').val(data["Results"][0]['DisplacementL']);
          $('.ldr').hide();

        }
    });
  }else{
      // $.toastr.error('Empty Credential', {position: 'top-center',size: 'lg',time: 5000});
      var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Empty Credential</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.parent().after(alert);
      return false;
  }

});

$( "#add_trade_sd_form" ).submit(function( event ) {

  urlv = base_url+'startdeal/insert_trade';
  var $this = $(this);
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          //console.log(data);
          $('.ldr').hide();
          //$this.html(prv);

          var json = JSON.parse(data);
          if(json.request_status == 'done'){
            $('#sd_main_trade_inv_id').append('<option value="'+json.trade_inv_id+'" selected>'+json.trade_inv_year+' '+json.trade_inv_make+' '+json.trade_inv_model+' '+json.trade_inv_vin+'</option>');
            $('#sd_math_tradecredit').val(json.trade_inv_price);
            autocalculatersd();

            $('#add_trade_info').modal('toggle');
             Swal.fire({
              type: "success",
              title: 'Added!',
              text: 'Vehicle added successfully in trade.',
              confirmButtonClass: 'btn btn-success'
            })
             $('#next_trade').removeAttr("style");

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Trade insert failed<br> '+json.msg+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });

  event.preventDefault();
});

$( "#add_buyer_info_form_sd" ).submit(function( event ) {

  urlv = base_url+'startdeal/insert_buyer';
  var $this = $(this);
  //var ing = $this.data('ing');
  //var prv = $this.html();
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
  if($('#sd_add_buyer_workphone').val() != "" || $('#sd_add_buyer_homephone').val() != "" || $('#sd_add_buyer_mobile').val() != ""){

    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          console.log(data);
          $('.ldr').hide();

          var json = JSON.parse(data);
          if(json.request_status == 'done'){
            $('.add_buyer_info_field').val('');
            $('#sd_main_buyers_id').append('<option value="'+json.buyers_id+'" selected>'+json.buyers_first_name+' '+json.buyers_last_name+'</option>');
            $('#add_buyer').modal('toggle');
            $('#next_buyers').removeAttr('style');
            $('#sd_math_buyer_select').val(json.buyers_first_name+' '+json.buyers_last_name);


            // if(json.co_buyers_first_name != ""){
            //   $("#sd_main_cobuyers_id option").remove();
            //   $('#sd_main_cobuyers_id').append('<option value="'+json.buyers_id+'" selected>'+json.co_buyers_first_name+' '+json.co_buyers_last_name+'</option>');
            // }
            $('#sd_add_cobuyer_buyerid').val(json.buyers_id);
            $('#sd_add_cobuyer_buyer').val(json.buyers_first_name+' '+json.buyers_last_name);
            $('#sd_add_insurance_buyerid').val(json.buyers_id);
            $('#sd_add_insurance_buyer').val(json.buyers_first_name+' '+json.buyers_last_name);
            // $('#sd_main_option_insurance').val(json.buyers_id);
            // $('#sd_main_option_insurance').text(json.ins_pol_num);
            //$("#sd_main_insurance_buyers_id option").remove();
            //$('#sd_main_insurance_buyers_id').append('<option value="'+json.buyers_id+'">'+json.ins_pol_num+'</option>');



             Swal.fire({
              type: "success",
              title: 'Added!',
              text: 'Buyer inserted successfully .',
              confirmButtonClass: 'btn btn-success'
            })

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Buyer insert failed<br> '+json.msg+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });
}else{
		var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Any one phone number is mandatory</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
}
  event.preventDefault();
});
//2870
$( "#add_cobuyer_info_form_sd" ).submit(function( event ) {

  urlv = base_url+'startdeal/insert_cobuyer';
  var $this = $(this);
  //var ing = $this.data('ing');
  //var prv = $this.html();
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
  // if($('#sd_add_cobuyer_select_buyer').val() != 0){
  if($('#sd_add_cobuyer_workphone').val() != "" || $('#sd_add_cobuyer_homephone').val() != "" || $('#sd_add_cobuyer_mobile').val() != ""){

    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          //console.log(data);
          $('.ldr').hide();

          var json = JSON.parse(data);
          if(json.request_status == 'done'){
            $('.add_cobuyer_info_field').val('');
            $('#sd_main_cobuyers_id').append('<option value="'+json.buyers_id+'" selected>'+json.co_buyers_first_name+' '+json.co_buyers_last_name+'</option>');
            // $('#sd_main_option_cobuyer').val(json.buyers_id);
            // $('#sd_main_option_cobuyer').text(json.co_buyers_first_name+' '+json.co_buyers_last_name);
             $('#add_cobuyer').modal('toggle');
             Swal.fire({
              type: "success",
              title: 'Added!',
              text: 'Co-Buyer inserted successfully .',
              confirmButtonClass: 'btn btn-success'
            })

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Co-Buyer insert failed<br> '+json.msg+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });
  // }else{
  //    var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
  //             '<div class="alert-text">Empty Credential<br>Select Buyer</div>'+
  //             '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
  //           '</div>');
  //          $this.after(alert);
  //           return false;
  // }
}else{
		var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Any one phone number is mandatory</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
}
  event.preventDefault();

});

$( "#add_insurance_info_form_sd" ).submit(function( event ) {

  urlv = base_url+'startdeal/insert_insurance';
  var $this = $(this);
  //var ing = $this.data('ing');
  //var prv = $this.html();
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
  if($('#sd_add_insurance_buyerid').val() != 0){
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          //console.log(data);
          $('.ldr').hide();

          var json = JSON.parse(data);
          if(json.request_status == 'done'){
            $('.add_insurance_info_field').val('');
            // $('#sd_main_option_cobuyer').append('<option value="'+json.buyers_id+'">'+json.co_buyers_first_name+' '+json.co_buyers_last_name+'</option>');
            // $('#sd_main_option_insurance').val(json.buyers_id);
            // $('#sd_main_option_insurance').text(json.ins_pol_num);
            // $("#sd_main_insurance_buyers_id option").remove();

            $('#sd_main_insurance_buyers_id').append('<option value="'+json.buyers_id+'" selected>'+json.ins_pol_num+'</option>');
             $('#add_insurance').modal('toggle');
             Swal.fire({
              type: "success",
              title: 'Added!',
              text: 'Insurance inserted successfully .',
              confirmButtonClass: 'btn btn-success'
            })
            //setTimeout(location.reload(), 2000);
            //setTimeout(window.location.href = base_url+'member', 2000);
          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Insurance insert failed<br> '+json.msg+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });
  }else{
     var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Empty Credential<br>Select Insurance</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
  }
  event.preventDefault();
});

$(document).on('click','#sd_btn_calc_calculate',function(e) {


  var saleprice     = $('#sd_calc_saleprice').val();
  var downpayment   = $('#sd_calc_downpayment').val();
  // var tradeinCredit = $('#sd_calc_tradein_credit').val();
  var loanLength    = $('#sd_calc_loan_length_select').val();
  var interentRate  = $('#sd_calc_interest_rate').val();

  computeFormSD(saleprice,downpayment,loanLength,interentRate);
 //  if(downpayment != ""){
 //    saleprice = saleprice - downpayment;
 //  }
 //  // if(tradeinCredit != ""){
 //  //   saleprice = saleprice - tradeinCredit;
 //  // }
 //  var principal = parseFloat(saleprice);
 //  var interest = parseFloat(interentRate) / 100 / 12;
 //  var payments = parseFloat(loanLength);

 //  var x = Math.pow(1 + interest, payments); //Math.pow computes powers
 //  var monthly = (principal*x*interest)/(x-1);
 //  var bimonthly = ((principal*x*interest)/(x-1))*.5;
 //  var weekly = ((principal*x*interest)/(x-1))*.25;

 //  if (isFinite(monthly)){
 //  // Fill in the output fields, rounding to 2 decimal places

 //  $('#sd_calc_result_monthly_payment').text("$"+monthly.toFixed(2));
 //  $('#sd_calc_result_biweekly_payment').text("$"+bimonthly.toFixed(2));
 //  $('#sd_calc_result_weekly_payment').text("$"+weekly.toFixed(2));
 //  $('#sd_calc_result_total_payment').text("$"+(monthly * payments).toFixed(2));
 //  $('#sd_calc_result_total_interest').text("$"+((monthly*payments)-principal).toFixed(2));

 // }
 // else {
 // // Result was Not-a-Number or infinite, which means the input was
 // // incomplete or invalid. Clear any previously displayed output.
 //  $('#sd_calc_result_monthly_payment').text("$00 / month");// Erase the content of these elements

 // }

  event.preventDefault();

});

function computeFormSD(amountFinance,downpayment,loanLength,interentRate) {

   var prin1 = amountFinance;
   var rate = interentRate;
   var numPmts1 = loanLength;
   var Vpayextra = downpayment;
   {

      // var prin2 = amountFinance;

      var i = rate / 100.0;

      var i1  = i / 12;
      var i2 = i / 26;

      if(Vpayextra != ""){
        prin1 = prin1 - Vpayextra;
      }

      var pmt1 = computeMonthlyPayment(prin1, numPmts1, rate);
      $('#sd_calc_result_monthly_payment').text("$"+fns(pmt1,2,1,1,1));
      $('#sd_calc_result_total_payment').text("$"+fns(pmt1*numPmts1,2,1,1,1));

      var pmt2 = (pmt1 / 2);
      // document.calc.biwkPmt.value = fns(pmt2,2,1,1,1);

      var VbiwkPmt0 = pmt1 * 12 / 26;
      $('#sd_calc_result_biweekly_payment').text("$"+fns(VbiwkPmt0,2,1,1,1));

      var count = 0;
      var prin = prin1;
      var intPort = 0;
      var prinPort = 0;
      var accumInt = 0;

      while(prin > 0) {

         if((parseInt(prin) + (parseInt(prin) * i)) > pmt2) {
            intPort = prin * i2;
            prinPort = pmt2 - intPort;
            prin = prin - prinPort;
            accumInt = accumInt + intPort;
         } else {
            intPort = prin * i2;
            prinPort = prin;
            prin = prin - prinPort;
            accumInt = accumInt + intPort;
         }

         count = count + 1;

      }
      var numPmts2 = count;

      var numPmts3 = Math.ceil(numPmts1 - (12 * numPmts2/26));

      var VmoInt = computeFixedInterestCost(prin1, rate, pmt1);
      $('#sd_calc_result_monthly_interest').text("$"+fns(VmoInt,2,1,1,1));

      var VbiwkInt = accumInt;

      $('#sd_calc_result_biweekly_interest').text("$"+fns(VbiwkInt,2,1,1,1));
      $('#sd_calc_result_biweekly_total_payment').text("$"+fns(parseInt(prin1) + parseInt(VbiwkInt),2,1,1,1));

      // var VintSave = Number(VmoInt) - Number(VbiwkInt);
      // document.calc.intSave.value = fns(VintSave,2,1,1,1);

      // var v_summary = "In essence, what biweekly payments do is add a 13th monthly payment, ";
      // v_summary += "though it is split across 26 bi-weekly payments. In your case means ";
      // v_summary += "that by paying an extra " + fns(Vpayextra + pmt1 / 26,2,1,1,1) + " every two weeks you ";
      // v_summary += "will pay off your loan in " + parseInt(numPmts2 /26*12,10) + " months instead of ";
      // v_summary += "the current " + numPmts1 + " months. This will save you " + numPmts3 + " months of payments and " + fns(VintSave,2,1,1,1) + " in loan ";
      // v_summary += "interest in the process. You can <strong>save even more</strong> by adding an extra amount to your biweekly payments or by <strong><a href='#viewcurrent'>refinancing your auto loan with a lower rate</a></strong>.";

      // var v_summary_cell = document.getElementById("summary");
      // v_summary_cell.innerHTML = "<strong>Summary:</strong> " + v_summary + "";

   }

}

$('#sd_math_btn_total_first').on('click', function () {

  var $this = $(this).parent();
  $('.alert').slideUp();

  // var buyer_id      = $("#sd_math_buyer_select").val();//buyer_id
  var saleprice     = $("#sd_math_saleprice").val();//sale_price
  var cashcredit    = $("#sd_math_cashcredit").val();//cash_credit
  var tradecredit   = $("#sd_math_tradecredit").val();//trade_credit
  // var tradebalance  = $("#sd_math_tradebalance").val();//trade_balance
  var taxrate       = $("#sd_math_taxrate").val();
  var servicefee    = $("#sd_math_servicefee").val();//dealer_fee
  var tagregistration = $("#sd_math_tagregistration").val();//dmv
  var tavtprice     = $("#sd_math_tavtprice").val();

  if(saleprice != "" && cashcredit != "" && tradecredit != "" && taxrate != "" && servicefee != "" && tagregistration != "" && tavtprice != "" )
  {
    var no1=parseFloat(saleprice);
    var no2=parseFloat(cashcredit);
    var no3=parseFloat(tradecredit);
    // var no4=parseFloat(tradebalance);
    var no5=parseFloat(taxrate);
    var no6=parseFloat(servicefee);
    var no7=parseFloat(tagregistration);
    var no8=parseFloat(tavtprice);

    var taxableAmount = no1-no2-no3
    var tax = taxableAmount*no5/100
    var tax2=tax.toFixed(2)
    var totaldue = taxableAmount + tax + no6 + no7 + no8
    var no82 = totaldue.toFixed(2)

    var st1=no1-no3
    var st2=st1+no6
    var st3=st2+no7+tax

    $("#total_due").val(no82);//total_due
    // mathform.btn9.value=su2
    $("#tax").val(tax2);//tax
    // mathform.btn12.value=txa
    // mathform.btn13.value=su3
    $("#sub_due").val(st1);//sub_due
    $("#sub_due1").val(st2);//sub_due1
    $("#sub_due2").val(st3);//sub_due2
    // mathform.btn24.value=st4

    $("#sd_math_taxdue").val(tax2);
    $("#sd_math_totaldue").val(no82);


    // var no9=no1-no2-no3+no6+no7
    // var txa=no8-no3
    // var tax=txa*no5
    // var tax2=tax.toFixed(2)
    // var su1=no5-no3+no6+no7
    // var su2=(su1+tax).toFixed(2)
    // var su3=txa+no6
    // var no81=no9+tax
    // var no82=no81.toFixed(2)
    // var st1=no1-no3
    // var st2=st1+no6
    // var st3=st2+no7+tax
    // var st4=st3-no2

    // $("#total_due").val(no82);//total_due
    // // mathform.btn9.value=su2
    // $("#tax").val(tax2);//tax
    // // mathform.btn12.value=txa
    // // mathform.btn13.value=su3
    // $("#sub_due").val(st1);//sub_due
    // $("#sub_due1").val(st2);//sub_due1
    // $("#sub_due2").val(st3);//sub_due2
    // // mathform.btn24.value=st4

    // $("#sd_math_taxdue").val(tax2);
    // $("#sd_math_totaldue").val(no82);
}else{
  var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Please fill in the missing information</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
  $this.after(alert);
}

});

function autocalculatersd() {
  var $this = $("#sd_math_btn_total").parent();
  $('.alert').slideUp();

  // var buyer_id      = $("#sd_math_buyer_select").val();//buyer_id
  var saleprice     = $("#sd_math_saleprice").val();//sale_price
  var cashcredit    = $("#sd_math_cashcredit").val();//cash_credit
  var tradecredit   = $("#sd_math_tradecredit").val();//trade_credit
  // var tradebalance  = $("#sd_math_tradebalance").val();//trade_balance
  var taxrate       = $("#sd_math_taxrate").val();
  var servicefee    = $("#sd_math_servicefee").val();//dealer_fee
  var tagregistration = $("#sd_math_tagregistration").val();//dmv
  var tavtprice     = $("#sd_math_tavtprice").val();

  if(saleprice != "" && cashcredit != "" && tradecredit != "" && taxrate != "" && servicefee != "" && tagregistration != "" && tavtprice != "" )
  {
    var no1=parseFloat(saleprice);
    var no2=parseFloat(cashcredit);
    var no3=parseFloat(tradecredit);
    // var no4=parseFloat(tradebalance);
    var no5=parseFloat(taxrate);
    var no6=parseFloat(servicefee);
    var no7=parseFloat(tagregistration);

    var tavtprice = no1*6.6/100;
    $("#sd_math_tavtprice").val(tavtprice.toFixed(2));

    var no8=parseFloat(tavtprice);

    var taxableAmount = no1-no2-no3
    var tax = tavtprice*no5/100
    // var tax = taxableAmount*no5/100
    var tax2=tax.toFixed(2)
    // var totaldue = taxableAmount + tax + no6 + no7 + no8
    var totaldue = taxableAmount + tax + no6 + no7
    var no82 = totaldue.toFixed(2)

    var st1=no1-no3
    var st2=st1+no6
    var st3=st2+no7+tax



    $("#total_due").val(no82);//total_due
    // mathform.btn9.value=su2
    $("#tax").val(tax2);//tax
    // mathform.btn12.value=txa
    // mathform.btn13.value=su3
    $("#sub_due").val(st1);//sub_due
    $("#sub_due1").val(st2);//sub_due1
    $("#sub_due2").val(st3);//sub_due2
    // mathform.btn24.value=st4

    $("#sd_math_taxdue").val(tax2);
    $("#sd_math_totaldue").val(no82);
    $("#sd_calc_saleprice").val(no82);


    // $("#sd_calc_downpayment").val(cashcredit);


    // var no9=no1-no2-no3+no6+no7
    // var txa=no8-no3
    // var tax=txa*no5
    // var tax2=tax.toFixed(2)
    // var su1=no5-no3+no6+no7
    // var su2=(su1+tax).toFixed(2)
    // var su3=txa+no6
    // var no81=no9+tax
    // var no82=no81.toFixed(2)
    // var st1=no1-no3
    // var st2=st1+no6
    // var st3=st2+no7+tax
    // var st4=st3-no2

    // $("#total_due").val(no82);//total_due
    // // mathform.btn9.value=su2
    // $("#tax").val(tax2);//tax
    // // mathform.btn12.value=txa
    // // mathform.btn13.value=su3
    // $("#sub_due").val(st1);//sub_due
    // $("#sub_due1").val(st2);//sub_due1
    // $("#sub_due2").val(st3);//sub_due2
    // // mathform.btn24.value=st4

    // $("#sd_math_taxdue").val(tax2);
    // $("#sd_math_totaldue").val(no82);
  }else{
    var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
                '<div class="alert-text">Please fill in the missing information</div>'+
                '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
              '</div>');
    $this.after(alert);
  }
}

$(document).on('click','#sd_math_update_info',function(e) {
  var saleprice     = $("#sd_math_saleprice").val();//sale_price
  var cashcredit    = $("#sd_math_cashcredit").val();//cash_credit
  var tradecredit   = $("#sd_math_tradecredit").val();//trade_credit
  var tradebalance  = $("#sd_math_tradebalance").val();//trade_balance
  var taxrate       = $("#sd_math_taxrate").val();
  var servicefee    = $("#sd_math_servicefee").val();//dealer_fee
  var tagregistration = $("#sd_math_tagregistration").val();//dmv
  var tavtprice     = $("#sd_math_tavtprice").val();
  var taxdue     = $("#sd_math_taxdue").val();
  var totaldue     = $("#sd_math_totaldue").val();

  var $this = $(this);
  if(saleprice != "" && cashcredit != "" && tradecredit != "" && tradebalance != "" && taxrate != "" && servicefee != "" && tagregistration != "" && tavtprice != "" && taxdue != "" && totaldue != "" )
  {
    console.log($('#sd_main_buyers_id').val());
    urlv = base_url+'startdeal/mathupdate';

    $('.alert').slideUp();

      $.ajax({
          url : urlv,
          method : "POST",
          data : {
            id:$('#sd_main_buyers_id').val(),
            sd_math_saleprice:saleprice,
            sd_math_tradecredit:tradecredit,
            sd_math_tradebalance:tradebalance,
            sd_math_cashcredit:cashcredit,
            sd_math_tavtprice:tavtprice,
            sd_math_taxdue:taxdue,
            sd_math_servicefee:servicefee,
            sd_math_tagregistration:tagregistration,
            sd_math_totaldue:totaldue,
            sub_due:$("#sub_due").val(),
            sub_due1:$("#sub_due1").val(),
            sub_due2:$("#sub_due2").val()
          },
          beforeSend: function() {
            $this.parent().after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
          },
          success :function(data){
            //console.log(data);
            $('.ldr').hide();

            if(data == 'done'){
              var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<div class="alert-text">Math updated successfully</div>'+
                '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
              '</div>');
              $this.parent().after(alert);

            }else{
              var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
                '<div class="alert-text">Math update failed<br> '+data+'</div>'+
                '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
              '</div>');
             $this.parent().after(alert);
              return false;
            }
          }
      });
  }else{
    var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
      '<div class="alert-text">Please fill all fields to proceed</div>'+
      '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
      '</div>');
      $this.parent().after(alert);
      return false;
  }
});


// $(document).on('click','#next_calculator',function(e) {

//     var $this = $(this);
//     console.log($('#sd_main_buyers_id').val());
//     urlv = base_url+'startdeal/getBuyerInvData';

//       $('.alert').slideUp();
//       $.ajax({
//           url : urlv,
//           method : "POST",
//           data : {
//             buyers_id:$('#sd_main_buyers_id').val(),
//             inv_id:$('#sd_main_inventory_inv_id').val()
//           },
//           beforeSend: function() {
//             $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
//           },
//           success :function(data){
//             console.log(data);
//             $('.ldr').hide();

//             if(data == 'done'){
//               $('.form_field').val('');
//               var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
//                 '<div class="alert-text">Math updated successfully</div>'+
//                 '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
//               '</div>');
//               $this.after(alert);

//             }else{
//               var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
//                 '<div class="alert-text">Math update failed<br> '+data+'</div>'+
//                 '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
//               '</div>');
//              $this.after(alert);
//               return false;
//             }
//           }
//       });
// });

$(document).on('click','#sd_main_buyers_update_form',function(e) {
  // var saleprice     = $("#sd_math_saleprice").val();//sale_price
  // var cashcredit    = $("#sd_math_cashcredit").val();//cash_credit
  // var tradecredit   = $("#sd_math_tradecredit").val();//trade_credit
  // var tradebalance  = $("#sd_math_tradebalance").val();//trade_balance
  // var taxrate       = $("#sd_math_taxrate").val();
  // var servicefee    = $("#sd_math_servicefee").val();//dealer_fee
  // var tagregistration = $("#sd_math_tagregistration").val();//dmv
  // var tavtprice     = $("#sd_math_tavtprice").val();
  // var taxdue     = $("#sd_math_taxdue").val();
  // var totaldue     = $("#sd_math_totaldue").val();

  var $this = $(this);
  // if(saleprice != "" && cashcredit != "" && tradecredit != "" && tradebalance != "" && taxrate != "" && servicefee != "" && tagregistration != "" && tavtprice != "" && taxdue != "" && totaldue != "" )
  // {
    console.log($('#sd_main_buyers_id').val());
    urlv = base_url+'startdeal/update_buyer';

    $('.alert').slideUp();

      $.ajax({
          url : urlv,
          method : "POST",
          data : {
            id:$('#sd_main_buyers_id').val(),
            sd_main_buyers_firstname:$('#sd_main_buyers_firstname').val(),
            sd_main_buyers_middlename:$('#sd_main_buyers_middlename').val(),
            sd_main_buyers_lastname:$('#sd_main_buyers_lastname').val(),
            sd_main_buyers_address:$('#sd_main_buyers_address').val(),
            sd_main_buyers_city:$('#sd_main_buyers_city').val(),
            sd_main_buyers_country:$('#sd_main_buyers_country').val(),
            sd_main_buyers_state:$('#sd_main_buyers_state').val(),
            sd_main_buyers_zip:$('#sd_main_buyers_zip').val(),
            sd_main_buyers_email:$('#sd_main_buyers_email').val(),
            sd_main_buyers_workphone:$('#sd_main_buyers_workphone').val(),
            sd_main_buyers_homephone:$('#sd_main_buyers_homephone').val(),
            sd_main_buyers_mobile:$('#sd_main_buyers_mobile').val(),
            sd_main_buyers_dlnumber:$('#sd_main_buyers_dlnumber').val(),
            sd_main_buyers_dlstate:$('#sd_main_buyers_dlstate').val(),
            sd_main_buyers_dlexpire:$('#sd_main_buyers_dlexpire').val(),
            sd_main_buyers_dldob:$('#sd_main_buyers_dldob').val(),
            sd_main_buyers_temp_tag_number:$('#sd_main_buyers_temp_tag_number').val()

          },
          beforeSend: function() {
            $this.parent().after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
          },
          success :function(data){
            //console.log(data);
            $('.ldr').hide();

            if(data == 'done'){
              var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<div class="alert-text">Buyer updated successfully</div>'+
                '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
              '</div>');
              $this.parent().after(alert);

            }else{
              var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
                '<div class="alert-text">Buyer update failed<br> '+data+'</div>'+
                '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
              '</div>');
             $this.parent().after(alert);
              return false;
            }
          }
      });
  // }else{
  //   var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
  //     '<div class="alert-text">Empty Credential</div>'+
  //     '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
  //     '</div>');
  //     $this.parent().after(alert);
  //     return false;
  // }
});

$(document).on('click','#sd_main_inventory_update_form',function(e) {
  // var saleprice     = $("#sd_math_saleprice").val();//sale_price
  // var cashcredit    = $("#sd_math_cashcredit").val();//cash_credit
  // var tradecredit   = $("#sd_math_tradecredit").val();//trade_credit
  // var tradebalance  = $("#sd_math_tradebalance").val();//trade_balance
  // var taxrate       = $("#sd_math_taxrate").val();
  // var servicefee    = $("#sd_math_servicefee").val();//dealer_fee
  // var tagregistration = $("#sd_math_tagregistration").val();//dmv
  // var tavtprice     = $("#sd_math_tavtprice").val();
  // var taxdue     = $("#sd_math_taxdue").val();
  // var totaldue     = $("#sd_math_totaldue").val();

  var $this = $(this);
  // if(saleprice != "" && cashcredit != "" && tradecredit != "" && tradebalance != "" && taxrate != "" && servicefee != "" && tagregistration != "" && tavtprice != "" && taxdue != "" && totaldue != "" )
  // {
    console.log($('#sd_main_buyers_id').val());
    urlv = base_url+'startdeal/update_inventory';

    $('.alert').slideUp();

      $.ajax({
          url : urlv,
          method : "POST",
          data : {
            inv_id:$('#sd_main_inventory_inv_id').val(),
            trade_inv_id:$('#sd_main_trade_inv_id').val(),
            sd_main_inventory_vin:$('#sd_main_inventory_vin').val(),
            sd_main_inventory_stocknumber:$('#sd_main_inventory_stocknumber').val(),
            sd_main_inventory_year:$('#sd_main_inventory_year').val(),
            sd_main_inventory_make:$('#sd_main_inventory_make').val(),
            sd_main_inventory_model:$('#sd_main_inventory_model').val(),
            sd_main_inventory_style:$('#sd_main_inventory_style').val(),
            sd_main_inventory_color:$('#sd_main_inventory_color').val(),
            sd_main_inventory_drivetype:$('#sd_main_inventory_drivetype').val(),
            sd_main_inventory_enginesize:$('#sd_main_inventory_enginesize').val(),
            sd_main_inventory_mileage:$('#sd_main_inventory_mileage').val(),
            sd_main_inventory_exempt_cb:$('#sd_main_inventory_exempt_cb').prop("checked") ? 'yes':'no',
            sd_main_inventory_cost:$('#sd_main_inventory_cost').val(),
            sd_main_inventory_addedcost:$('#sd_main_inventory_addedcost').val(),
            sd_main_inventory_price:$('#sd_main_inventory_price').val(),
            sd_main_inventory_totalcost:$('#sd_main_inventory_totalcost').val()

          },
          beforeSend: function() {
            $this.parent().after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
          },
          success :function(data){
            //console.log(data);
            $('.ldr').hide();

            if(data == 'done'){
              var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<div class="alert-text">Vehicle updated successfully</div>'+
                '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
              '</div>');

              $this.parent().after(alert);

            }else{
              var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
                '<div class="alert-text">Vehicle update failed<br> '+data+'</div>'+
                '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
              '</div>');
             $this.parent().after(alert);
              return false;
            }
          }
      });
  // }else{
  //   var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
  //     '<div class="alert-text">Empty Credential</div>'+
  //     '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
  //     '</div>');
  //     $this.parent().after(alert);
  //     return false;
  // }
});

$(document).on('click','#sd_main_trade_update_form',function(e) {


  var $this = $(this);
    urlv = base_url+'startdeal/update_trade';

    $('.alert').slideUp();

      $.ajax({
          url : urlv,
          method : "POST",
          data : {
            trade_inv_id:$('#sd_main_trade_inv_id').val(),
            sd_main_trade_vin:$('#sd_main_trade_vin').val(),
            sd_main_trade_year:$('#sd_main_trade_year').val(),
            sd_main_trade_make:$('#sd_main_trade_make').val(),
            sd_main_trade_model:$('#sd_main_trade_model').val(),
            sd_main_trade_style:$('#sd_main_trade_style').val(),
            sd_main_trade_color:$('#sd_main_trade_color').val(),
            sd_main_trade_mileage:$('#sd_main_trade_mileage').val(),
            sd_main_trade_exempt_cb:$('#sd_main_trade_exempt_cb').prop("checked") ? 'yes':'no',
            sd_main_trade_allowance:$('#sd_main_trade_allowance').val()

          },
          beforeSend: function() {
            $this.parent().after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
          },
          success :function(data){
            //console.log(data);
            $('.ldr').hide();

            if(data == 'done'){
              var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
                '<div class="alert-text">Vehicle updated successfully</div>'+
                '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
              '</div>');

              $this.parent().after(alert);

            }else{
              var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
                '<div class="alert-text">Vehicle update failed<br> '+data+'</div>'+
                '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
              '</div>');
             $this.parent().after(alert);
              return false;
            }
          }
      });

});

$(document).on('click','#sd_main_calc_update_form',function(e) {
  $('#previous_review').click();
});


$( "#dealform" ).submit(function( event ) {

  urlv = base_url+'startdeal/insert_deal';
  var $this = $("#save_deal_submit");
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          console.log(data);
          $('.ldr').remove();

          if(data == 'done'){
            // $('.form_field').val('');
            //location.reload();
            // var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
            //   '<div class="alert-text">Insurance inserted successfully</div>'+
            //   '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            // '</div>');
            // $this.after(alert);
            // setTimeout(location.reload(), 2000);
            Swal.fire({
              type: "success",
              title: 'Save!',
              text: 'Deal saved successfully.',
              confirmButtonClass: 'btn btn-success'
            }).then(function (result) {
              if (result.value) {
                window.location.href = base_url+'yourdeal';
              }
            })
          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Deal insert failed<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });

  event.preventDefault();
});

$(document).on('click','#sd_main_readyprint_btn',function(e) {

	var inv_id =$('#sd_main_inventory_inv_id').val();
 	var trade_inv_id =$('#sd_main_trade_inv_id').val();
 	var buyers_id =$('#sd_main_buyers_id').val();

	$("#sd_main_readyprint_inv_id").val(inv_id);
	$("#sd_main_readyprint_trade_inv_id").val(trade_inv_id);
	$("#sd_main_readyprint_buyers_id").val(buyers_id);
	$("#sd_main_readyprint_transact_id").val($('#sd_main_transact_id').val());

 	urlv = base_url+'startdeal/insert_deal_print';
  var $this = $("#sd_main_readyprint_btn");
  $('.alert').slideUp();
  // var formDatapro = new FormData('#dealform');
    $.ajax({
        url : urlv,
        method : "POST",
        data : {
          sd_main_transact_id:$('#sd_main_transact_id').val(),
          sd_main_transact_status:$('#sd_main_transact_status').val(),
          sd_main_buyers_id:buyers_id,
          sd_main_inventory_inv_id:inv_id,
          sd_main_trade_inv_id:$('#sd_main_trade_inv_id').val(),
          sd_main_buyers_firstname:$('#sd_main_buyers_firstname').val(),
          sd_main_buyers_middlename:$('#sd_main_buyers_middlename').val(),
          sd_main_buyers_lastname:$('#sd_main_buyers_lastname').val(),
          sd_main_buyers_email:$('#sd_main_buyers_email').val(),
          sd_main_buyers_address:$('#sd_main_buyers_address').val(),
          sd_main_buyers_city:$('#sd_main_buyers_city').val(),
          sd_main_buyers_state:$('#sd_main_buyers_state').val(),
          sd_main_buyers_zip:$('#sd_main_buyers_zip').val(),
          sd_main_buyers_workphone:$('#sd_main_buyers_workphone').val(),
          sd_main_buyers_homephone:$('#sd_main_buyers_homephone').val(),
          sd_main_buyers_mobile:$('#sd_main_buyers_mobile').val(),
          sd_main_buyers_dlnumber:$('#sd_main_buyers_dlnumber').val(),
          sd_main_buyers_dlstate:$('#sd_main_buyers_dlstate').val(),
          sd_main_buyers_dlexpire:$('#sd_main_buyers_dlexpire').val(),
          sd_main_buyers_dldob:$('#sd_main_buyers_dldob').val(),
          sd_main_buyers_temp_tag_number:$('#sd_main_buyers_temp_tag_number').val(),
          sd_main_cobuyers_id:$('#sd_main_cobuyers_id').val(),
          sd_main_insurance_buyers_id:$('#sd_main_insurance_buyers_id').val(),
          sd_main_calc_saleprice:$('#sd_main_calc_saleprice').val(),
          sd_main_calc_tradecredit:$('#sd_main_calc_tradecredit').val(),
          sd_main_calc_tradebalance:$('#sd_main_calc_tradebalance').val(),
          sd_main_calc_cashcredit:$('#sd_main_calc_cashcredit').val(),
          sd_main_calc_tax:$('#sd_main_calc_tax').val(),
          sd_main_calc_servicefee:$('#sd_main_calc_servicefee').val(),
          sd_main_calc_tagregistration:$('#sd_main_calc_tagregistration').val(),
          sd_main_calc_total_due:$('#sd_main_calc_total_due').val(),
          sd_main_calc_sub_due:$('#sd_main_calc_sub_due').val(),
          sd_main_calc_sub_due1:$('#sd_main_calc_sub_due1').val(),
          sd_main_calc_sub_due2:$('#sd_main_calc_sub_due2').val(),
          sd_main_inventory_vin:$('#sd_main_inventory_vin').val(),
          sd_main_inventory_stocknumber:$('#sd_main_inventory_stocknumber').val(),
          sd_main_inventory_year:$('#sd_main_inventory_year').val(),
          sd_main_inventory_make:$('#sd_main_inventory_make').val(),
          sd_main_inventory_model:$('#sd_main_inventory_model').val(),
          sd_main_inventory_style:$('#sd_main_inventory_style').val(),
          sd_main_inventory_color:$('#sd_main_inventory_color').val(),
          sd_main_inventory_drivetype:$('#sd_main_inventory_drivetype').val(),
          sd_main_inventory_enginesize:$('#sd_main_inventory_enginesize').val(),
          sd_main_inventory_mileage:$('#sd_main_inventory_mileage').val(),
          sd_main_inventory_exempt_cb:$('#sd_main_inventory_exempt_cb').prop("checked") ? 'yes':'no',
          sd_main_inventory_cost:$('#sd_main_inventory_cost').val(),
          sd_main_inventory_addedcost:$('#sd_main_inventory_addedcost').val(),
          sd_main_inventory_price:$('#sd_main_inventory_price').val(),
          sd_main_inventory_totalcost:$('#sd_main_inventory_totalcost').val(),
          sd_main_trade_vin:$('#sd_main_trade_vin').val(),
          sd_main_trade_year:$('#sd_main_trade_year').val(),
          sd_main_trade_make:$('#sd_main_trade_make').val(),
          sd_main_trade_model:$('#sd_main_trade_model').val(),
          sd_main_trade_style:$('#sd_main_trade_style').val(),
          sd_main_trade_color:$('#sd_main_trade_color').val(),
          sd_main_trade_mileage:$('#sd_main_trade_mileage').val(),
          sd_main_trade_exempt_cb:$('#sd_main_trade_exempt_cb').prop("checked") ? 'yes':'no',
          sd_main_trade_allowance:$('#sd_main_trade_allowance').val()

        },
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          console.log(data);
          $('.ldr').remove();

          var json = JSON.parse(data);
          if(json.request_status == 'done'){
          // if(data == 'done'){
          	$("#sd_main_readyprint_transact_id").val(json.transact_id);
            $('#sd_main_readyprint_form').submit();
            window.location.href = base_url+'yourdeal';

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Deal insert failed<br> '+json.msg+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        }
    });


// 	var date = $('#sd_main_readyprint_date').val();
// 	var chooseall = $('#chooseall').is(':checked');
// 	var billofsale = $('#sd_main_readyprint_billofsale').is(':checked');
// 	var title_application = $('#sd_main_readyprint_title_application').val();
// 	var odometer_statement = $('#sd_main_readyprint_odometer_statement').val();
// 	var as_is = $('#sd_main_readyprint_as_is').val();
// 	var proof_of_insurance = $('#sd_main_readyprint_proof_of_insurance').val();
// 	var power_of_attorney = $('#sd_main_readyprint_power_of_attorney').val();
// 	var arbitration_agreement = $('#sd_main_readyprint_arbitration_agreement').val();
// 	var right_repossession = $('#sd_main_readyprint_right_repossession').val();
// 	var ofac_statement = $('#sd_main_readyprint_ofac_statement').val();
// 	var privacy_information = $('#sd_main_readyprint_privacy_information').val();
// 	var certificate_exemption = $('#sd_main_readyprint_certificate_exemption').val();


// 	var url = base_url+'startdeal/documents';
// 	var form = $('<form action="' + url + '" method="post" target="_blank">' +
// 	  '<input type="text" name="inv_id" value="' + inv_id + '" />' +
// 	  '<input type="text" name="trade_inv_id" value="' + trade_inv_id + '" />' +
// 	  '<input type="text" name="buyers_id" value="' + buyers_id + '" />' +
// 	  '</form>');
// 	form.submit();

	// console.log(date);
	// console.log(chooseall);
	// console.log(billofsale);
	// console.log(inv_id);
	// console.log(trade_inv_id);
	// console.log(buyers_id);

	// urlv = base_url+'startdeal/documents';
 //  var $this = $("#save_deal_submit");
 //  $('.alert').slideUp();
 //    $.ajax({
 //        url : urlv,
 //        method : "POST",
 //        data : {
	// 		inv_id:inv_id,
	// 		trade_inv_id:trade_inv_id,
	// 		buyers_id:buyers_id,
	// 		date:date,
	// 		chooseall:chooseall,
	// 		billofsale:billofsale,
	// 		title_application:title_application,
	// 		odometer_statement:odometer_statement,
	// 		as_is:as_is,
	// 		proof_of_insurance:proof_of_insurance,
	// 		power_of_attorney:power_of_attorney,
	// 		arbitration_agreement:arbitration_agreement,
	// 		right_repossession:right_repossession,
	// 		ofac_statement:ofac_statement,
	// 		privacy_information:privacy_information,
	// 		certificate_exemption:certificate_exemption
 //        },
 //        beforeSend: function() {
 //          //$this.html(ing);
 //          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
 //        },
 //        success :function(data){
 //          console.log(data);
 //          $('.ldr').remove();
 //          window.location.href = base_url+'documents'

 //        }
 //    });

});

$(document).on('click','#sd_main_bhphcontract_btn',function(e) {

	var inv_id =$('#sd_main_inventory_inv_id').val();
 	var trade_inv_id =$('#sd_main_trade_inv_id').val();
 	var buyers_id =$('#sd_main_buyers_id').val();

	$("#sd_main_bhphcontract_inv_id").val(inv_id);
	$("#sd_main_bhphcontract_trade_inv_id").val(trade_inv_id);
	$("#sd_main_bhphcontract_buyers_id").val(buyers_id);
	$("#sd_main_bhphcontract_transact_id").val($('#sd_main_transact_id').val());

 	urlv = base_url+'startdeal/insert_deal_print';
  var $this = $("#sd_main_bhphcontract_btn");


  $('.alert').slideUp();
  if($("#sd_main_bhphcontract_cb").prop('checked') == true){
  // var formDatapro = new FormData('#dealform');
    $.ajax({
        url : urlv,
        method : "POST",
        data : {
          sd_main_transact_id:$('#sd_main_transact_id').val(),
          sd_main_buyers_id:buyers_id,
          sd_main_inventory_inv_id:inv_id,
          sd_main_trade_inv_id:$('#sd_main_trade_inv_id').val(),
          sd_main_buyers_firstname:$('#sd_main_buyers_firstname').val(),
          sd_main_buyers_middlename:$('#sd_main_buyers_middlename').val(),
          sd_main_buyers_lastname:$('#sd_main_buyers_lastname').val(),
          sd_main_buyers_email:$('#sd_main_buyers_email').val(),
          sd_main_buyers_address:$('#sd_main_buyers_address').val(),
          sd_main_buyers_city:$('#sd_main_buyers_city').val(),
          sd_main_buyers_state:$('#sd_main_buyers_state').val(),
          sd_main_buyers_zip:$('#sd_main_buyers_zip').val(),
          sd_main_buyers_workphone:$('#sd_main_buyers_workphone').val(),
          sd_main_buyers_homephone:$('#sd_main_buyers_homephone').val(),
          sd_main_buyers_mobile:$('#sd_main_buyers_mobile').val(),
          sd_main_buyers_dlnumber:$('#sd_main_buyers_dlnumber').val(),
          sd_main_buyers_dlstate:$('#sd_main_buyers_dlstate').val(),
          sd_main_buyers_dlexpire:$('#sd_main_buyers_dlexpire').val(),
          sd_main_buyers_dldob:$('#sd_main_buyers_dldob').val(),
          sd_main_buyers_temp_tag_number:$('#sd_main_buyers_temp_tag_number').val(),
          sd_main_cobuyers_id:$('#sd_main_cobuyers_id').val(),
          sd_main_insurance_buyers_id:$('#sd_main_insurance_buyers_id').val(),
          sd_main_calc_saleprice:$('#sd_main_calc_saleprice').val(),
          sd_main_calc_tradecredit:$('#sd_main_calc_tradecredit').val(),
          sd_main_calc_tradebalance:$('#sd_main_calc_tradebalance').val(),
          sd_main_calc_cashcredit:$('#sd_main_calc_cashcredit').val(),
          sd_main_calc_tax:$('#sd_main_calc_tax').val(),
          sd_main_calc_servicefee:$('#sd_main_calc_servicefee').val(),
          sd_main_calc_tagregistration:$('#sd_main_calc_tagregistration').val(),
          sd_main_calc_total_due:$('#sd_main_calc_total_due').val(),
          sd_main_calc_sub_due:$('#sd_main_calc_sub_due').val(),
          sd_main_calc_sub_due1:$('#sd_main_calc_sub_due1').val(),
          sd_main_calc_sub_due2:$('#sd_main_calc_sub_due2').val(),
          sd_main_inventory_vin:$('#sd_main_inventory_vin').val(),
          sd_main_inventory_stocknumber:$('#sd_main_inventory_stocknumber').val(),
          sd_main_inventory_year:$('#sd_main_inventory_year').val(),
          sd_main_inventory_make:$('#sd_main_inventory_make').val(),
          sd_main_inventory_model:$('#sd_main_inventory_model').val(),
          sd_main_inventory_style:$('#sd_main_inventory_style').val(),
          sd_main_inventory_color:$('#sd_main_inventory_color').val(),
          sd_main_inventory_drivetype:$('#sd_main_inventory_drivetype').val(),
          sd_main_inventory_enginesize:$('#sd_main_inventory_enginesize').val(),
          sd_main_inventory_mileage:$('#sd_main_inventory_mileage').val(),
          sd_main_inventory_exempt_cb:$('#sd_main_inventory_exempt_cb').prop("checked") ? 'yes':'no',
          sd_main_inventory_cost:$('#sd_main_inventory_cost').val(),
          sd_main_inventory_addedcost:$('#sd_main_inventory_addedcost').val(),
          sd_main_inventory_price:$('#sd_main_inventory_price').val(),
          sd_main_inventory_totalcost:$('#sd_main_inventory_totalcost').val(),
          sd_main_trade_vin:$('#sd_main_trade_vin').val(),
          sd_main_trade_year:$('#sd_main_trade_year').val(),
          sd_main_trade_make:$('#sd_main_trade_make').val(),
          sd_main_trade_model:$('#sd_main_trade_model').val(),
          sd_main_trade_style:$('#sd_main_trade_style').val(),
          sd_main_trade_color:$('#sd_main_trade_color').val(),
          sd_main_trade_mileage:$('#sd_main_trade_mileage').val(),
          sd_main_trade_exempt_cb:$('#sd_main_trade_exempt_cb').prop("checked") ? 'yes':'no',
          sd_main_trade_allowance:$('#sd_main_trade_allowance').val()

        },
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          console.log(data);
          $('.ldr').remove();

          var json = JSON.parse(data);
          if(json.request_status == 'done'){
          // if(data == 'done'){
          	$("#sd_main_bhphcontract_transact_id").val(json.transact_id);
            $('#sd_main_bhphcontract_form').submit();
            window.location.href = base_url+'yourdeal';

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Deal insert failed<br> '+json.msg+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        }
    });
  }else{

  var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Please check BHPH Contract</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
  return false;
  }

});


function getdeletedealbyId(ele) {
  var tran_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  if(tran_id === undefined){
    tran_id = $(ele).parent().attr('id');
  }
        Swal.fire({
        title: 'Are you sure?',
        text: "Remove Deal!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3498db',
        cancelButtonColor: '#ff0000',
        confirmButtonText: 'Yes, Remove it!',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
      }).then(function (result) {
        if (result.value) {

          urlv =base_url+'yourdeal/delete_deal';
          $.ajax({
              url : urlv,
              method : "POST",
              data : {id : tran_id},
              beforeSend: function() {
                  //$this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
              },
              success :function(data){
                $("#rowdeal"+tran_id).fadeOut();
                $(elements).parent().parent().parent().parent().parent().fadeOut();
                Swal.fire(
                  {
                    type: "success",
                    title: 'Remove!',
                    text: 'Deal has been Removed.',
                    confirmButtonClass: 'btn btn-success',
                  }
                )
              }
          });
        }
      })
}

function geteditdealById(ele) {

	var tran_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
  	if(tran_id === undefined){
    	tran_id = $(ele).parent().attr('id');
  	}

	// var url = base_url+'yourdeal/startdeal';
	// var form = $('<form action="' + url + '" method="post">' +
	//   '<input type="hidden" name="id" value="' + tran_id + '" />' +
	//   '</form>');
	// $("#edit_startdeal_form").html(form);
	// form.submit();
	$("#edit_startdeal_form_id").val(tran_id);
	$("#edit_startdeal_form").submit();

}

function getviewdealById(ele) {
  var tran_id = $(ele).parent().parent().parent().parent().parent().prev('tr').find('td:last-child').attr('id')
    if(tran_id === undefined){
      tran_id = $(ele).parent().attr('id');
    }
    $("#view_startdeal_form_id").val(tran_id);
    $("#view_startdeal_form").submit();
}

$( "#contact_form" ).submit(function( event ) {

  urlv = base_url+'home/sendcontact';
  var $this = $(this);
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          console.log(data);
          $('.ldr').hide();
          //$this.html(prv);

          if(data == 'done'){
           $('.form_field').val('');
            var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<div class="alert-text">Message has been sent successfully</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert);

          }else{
            // $.toastr.error('SignIn failed'+'<br>'+data, {position: 'top-center',size: 'lg',time: 5000});
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Message sent failed!<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });

event.preventDefault();

});


$( "#edit_dealer_profile_form" ).submit(function( event ) {

  urlv = base_url+'dealer/getupdateprofile';
  var $this = $(this);
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          console.log(data);
          $('.ldr').hide();
          //$this.html(prv);

          if(data == 'done'){
            Swal.fire({
              type: "success",
              title: 'Updated!',
              text: 'Profile Updated successfully.',
              confirmButtonClass: 'btn btn-success'
            })

          }else{
            // $.toastr.error('SignIn failed'+'<br>'+data, {position: 'top-center',size: 'lg',time: 5000});
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Profile update failed!<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });

event.preventDefault();

});

$( "#edit_dealer_password_form" ).submit(function( event ) {

  urlv = base_url+'dealer/getupdatepassword';
  var $this = $(this);
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
  if(isPasswordValid($('#edit_profile_newpassword').val()) == true){
  if($('#edit_profile_newpassword').val() == $('#edit_profile_conpassword').val() )
  {
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          console.log(data);
          $('.ldr').hide();
          //$this.html(prv);

          if(data == 'done'){
            $('.form_field_pass').val('');
            Swal.fire({
              type: "success",
              title: 'Updated!',
              text: 'Password Updated successfully.',
              confirmButtonClass: 'btn btn-success'
            })

          }else{
            // $.toastr.error('SignIn failed'+'<br>'+data, {position: 'top-center',size: 'lg',time: 5000});
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Password update failed!<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });
  }else{
      // $.toastr.error('Empty Credential', {position: 'top-center',size: 'lg',time: 5000});
      var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Password not match</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);

      return false;
  }
}else{
   var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Invalid password<br>Input Password and Submit [8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character]</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);

      return false;
}
event.preventDefault();

});

$( "#edit_dealer_perinfo_form" ).submit(function( event ) {

  urlv = base_url+'dealer/getupdateperinfo';
  var $this = $(this);
  $('.alert').slideUp();
  var formDatapro = new FormData(this);
    $.ajax({
        url : urlv,
        method : "POST",
        data : formDatapro,
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          console.log(data);
          $('.ldr').hide();
          //$this.html(prv);

          if(data == 'done'){
            Swal.fire({
              type: "success",
              title: 'Updated!',
              text: 'Personal information Updated successfully.',
              confirmButtonClass: 'btn btn-success'
            })
          }else{
            // $.toastr.error('SignIn failed'+'<br>'+data, {position: 'top-center',size: 'lg',time: 5000});
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Personal information update failed!<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        },
        cache: false,
        contentType: false,
        processData: false
    });

event.preventDefault();

});


$(document).on('click','#edit_inventory_from_dealer',function(e) {

urlv =base_url+'inventoryarea/getInventoryDataFromId';
var $this = $(this);
if($("#select_inventory_invid").val() != 0){
  $.ajax({
        url : urlv,
        method : "POST",
        data : {id : $("#select_inventory_invid").val()},
        beforeSend: function() {
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          $('.ldr').remove();
          console.log(data);
          var json = JSON.parse(data);
          // console.log(json[0].inv_vin);

          $('#edit_inventory_info').modal('show');

          $('#edit_inventoryinfo_ivn_id').val(json[0].inv_id);
          $('#edit_inventoryinfo_vin').val(json[0].inv_vin);
          $('#edit_inventoryinfo_year').val(json[0].inv_year);
          $('#edit_inventoryinfo_make').val(json[0].inv_make);
          $('#edit_inventoryinfo_model').val(json[0].inv_model);
          $('#edit_inventoryinfo_style').val(json[0].inv_style);
          $('#edit_inventoryinfo_stocknumber').val(json[0].inv_stock);
          $('#edit_inventoryinfo_color').val(json[0].inv_color);
          $('#edit_inventoryinfo_drivetype').val(json[0].drive_type);
          $('#edit_inventoryinfo_enginesize').val(json[0].engine_size);
          $('#edit_inventoryinfo_mileage').val(json[0].inv_mileage);
          $('#edit_inventoryinfo_cost').val(json[0].inv_cost);
          $('#edit_inventoryinfo_addedcost').val(json[0].inv_addedcost);
          $('#edit_inventoryinfo_totalcost').val(json[0].inv_flrc);
          $('#edit_inventoryinfo_stickerprice').val(json[0].inv_price);

        }
    });
}
});

$(document).on('click','#edit_trade_from_dealer',function(e) {
  urlv =base_url+'inventoryarea/getTradeDataFromId';
  var $this = $(this);
  if($("#select_trade_invid").val() != 0){
    $.ajax({
          url : urlv,
          method : "POST",
          data : {id : $("#select_trade_invid").val()},
          beforeSend: function() {
            $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
          },
          success :function(data){
            $('.ldr').remove();
            //console.log(data);
            var json = JSON.parse(data);
            // console.log(json[0].inv_vin);

            $('#edit_trade_info').modal('show');

            $('#edit_tradeinfo_ivn_id').val(json[0].trade_inv_id);
            $('#edit_tradeinfo_vin').val(json[0].trade_inv_vin);
            $('#edit_tradeinfo_year').val(json[0].trade_inv_year);
            $('#edit_tradeinfo_make').val(json[0].trade_inv_make);
            $('#edit_tradeinfo_model').val(json[0].trade_inv_model);
            $('#edit_tradeinfo_style').val(json[0].trade_inv_style);
            $('#edit_tradeinfo_color').val(json[0].trade_inv_color);
            $('#edit_tradeinfo_drivetype').val(json[0].trade_drive_type);
            $('#edit_tradeinfo_enginesize').val(json[0].trade_engine_size);
            $('#edit_tradeinfo_mileage').val(json[0].trade_inv_mileage);
            $('#edit_tradeinfo_allowance').val(json[0].trade_inv_price);

          }
      });
  }
});

$(document).on('click','#delete_vehicle_from_dealer',function(e) {
  var $this = $(this);
  var id = $("#select_vehicle_invid").val();
if($("#select_vehicle_invid").val() != 0){
  Swal.fire({
        title: 'Are you sure?',
        text: "Remove vehicle form trade!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3498db',
        cancelButtonColor: '#ff0000',
        confirmButtonText: 'Yes, Remove it!',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
      }).then(function (result) {
        if (result.value) {
            urlv =base_url+'inventoryarea/delete_trade';
            $.ajax({
              url : urlv,
              method : "POST",
              data : {id : $("#select_vehicle_invid").val()},
              beforeSend: function() {
                $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
              },
              success :function(data){
                $('.ldr').remove();
                $("#select_vehicle_invid option[value='"+id+"']").remove();
                Swal.fire({
                    type: "success",
                    title: 'Remove!',
                    text: 'Vehicle has been Remove from Trade.',
                    confirmButtonClass: 'btn btn-success',
                })
              }
            });
        }
      })

    }
});


$(document).on('click','#sales_report_form',function(e) {
  urlv =base_url+'reports/getcustomreport';
  var $this = $(this).parent();
  $('.alert').slideUp();
  if($("#sales_report_date_start").val() != "" && $("#sales_report_date_end").val() != ""){
    $.ajax({
          url : urlv,
          method : "POST",
          data : {
          	sales_report_date_start:$("#sales_report_date_start").val(),
          	sales_report_date_end:$("#sales_report_date_end").val()
          },
          beforeSend: function() {
            $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
          },
          success :function(data){
            $('.ldr').remove();
            console.log(data);
            var json = JSON.parse(data);
            // console.log(json[0].inv_vin);
			if(json.request_status == 'done'){

				$('#sales_report_date_range').html('Start '+$("#sales_report_date_start").val()+'<br>End '+$("#sales_report_date_end").val());
				$('#sales_report_total_sold').text(json.total_sold);
				$('#sales_report_total_cost').text(json.total_cost);
				$('#sales_report_total_profit').text(json.total_profit);
				$('#sales_report_no_car_sold').text(json.no_car_sold);
				$('#sales_report_gross_profit').text(json.gross_profit);

          	}else{
	            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
	              '<div class="alert-text">Something went wrong</div>'+
	              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
	            '</div>');
           	$this.after(alert);
            return false;
          }

          }
      });
  }else{
  	 var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
	              '<div class="alert-text">Select date first!</div>'+
	              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
	            '</div>');
           	$this.after(alert);
            return false;
  }
});

function additionCost_Addedcost() {
  var inventoryinfo_cost = $("#inventoryinfo_cost").val();
  var inventoryinfo_addedcost = $("#inventoryinfo_addedcost").val();
  if(inventoryinfo_cost == "")inventoryinfo_cost = 0;
  if(inventoryinfo_addedcost == "")inventoryinfo_addedcost = 0;
  var total_cost = parseFloat(inventoryinfo_cost)+parseFloat(inventoryinfo_addedcost);
  $('#inventoryinfo_totalcost').val(total_cost);
  console.log(total_cost);
}

function edit_additionCost_Addedcost() {
  var inventoryinfo_cost = $("#edit_inventoryinfo_cost").val();
  var inventoryinfo_addedcost = $("#edit_inventoryinfo_addedcost").val();
  if(inventoryinfo_cost == "")inventoryinfo_cost = 0;
  if(inventoryinfo_addedcost == "")inventoryinfo_addedcost = 0;
  var total_cost = parseFloat(inventoryinfo_cost)+parseFloat(inventoryinfo_addedcost);
  $('#edit_inventoryinfo_totalcost').val(total_cost);
}

function sd_additionCost_Addedcost() {
  var inventoryinfo_cost = $("#sd_inventoryinfo_cost").val();
  var inventoryinfo_addedcost = $("#sd_inventoryinfo_addedcost").val();
  if(inventoryinfo_cost == "")inventoryinfo_cost = 0;
  if(inventoryinfo_addedcost == "")inventoryinfo_addedcost = 0;
  var total_cost = parseFloat(inventoryinfo_cost)+parseFloat(inventoryinfo_addedcost);
  $('#sd_inventoryinfo_totalcost').val(total_cost);
}

function sdmain_additionCost_Addedcost() {
  var inventoryinfo_cost = $("#sd_main_inventory_cost").val();
  var inventoryinfo_addedcost = $("#sd_main_inventory_addedcost").val();
  if(inventoryinfo_cost == "")inventoryinfo_cost = 0;
  if(inventoryinfo_addedcost == "")inventoryinfo_addedcost = 0;
  var total_cost = parseFloat(inventoryinfo_cost)+parseFloat(inventoryinfo_addedcost);
  $('#sd_main_inventory_totalcost').val(total_cost);
}













































function isPasswordValid(inputtxt)
{
  var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
  if(inputtxt.match(decimal)) return true; else return false;
}

function isFloatNumber(item,evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode==46)
    {
        var regex = new RegExp(/\./g)
        var count = $(item).val().match(regex).length;
        if (count > 1)
        {
            return false;
        }
    }
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

$(document).ready(function() {
    $('#inventory').DataTable( {
        dom: "<'row'<'col-sm-12 col-md-6'f><'col-sm-12 col-md-6'B>>" +
              "<'row'<'col-sm-12'tr>>" +
              "<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-3'i><'col-sm-12 col-md-6'p>>",
        responsive: true,
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10', '25', '50', 'Show all' ]
        ],
        buttons: [
            {
              extend: 'pdfHtml5',
              text: 'Download',
              title: 'Inventory List',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
              }
            }
        ],
        columnDefs: [{
            targets: -1,
            title: "Edit/Delete/View",
            orderable: !1,
            render: function(a, t, e, s) {
                var dv;
                dv = `<a href="javascript:;" class="btn table_btn" onclick="geteditinventoryId(this);" title="Edit"><i class="fa fa-pencil"></i></a><a href="javascript:;" onclick="getremoveinventoryId(this);" class="btn table_btn" title="Delete"><i class="fa fa-trash-o"></i></a><a href="javascript:;" onclick="getviewinventoryId(this);" class="btn table_btn" title="View"><i class="fa fa-eye"></i></a>`;
                return dv;
            }
        }]
    });
});

$(document).ready(function() {
    $('#trade').DataTable( {
        dom: "<'row'<'col-sm-12 col-md-6'f><'col-sm-12 col-md-6'B>>" +
              "<'row'<'col-sm-12'tr>>" +
              "<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-3'i><'col-sm-12 col-md-6'p>>",
        responsive: true,
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10', '25', '50', 'Show all' ]
        ],
        buttons: [
            {
              extend: 'pdfHtml5',
              text: 'Download',
              title: 'Trade List',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6 ]
              }
            }
        ],

        columnDefs: [{
            targets: -1,
            title: "Edit/Delete/View",
            orderable: !1,
            render: function(a, t, e, s) {
                var dv;
                dv = `<a href="javascript:;" class="btn table_btn" onclick="getedittradeId(this);" title="Edit"><i class="fa fa-pencil"></i></a>
                <a href="javascript:;" class="btn table_btn" onclick="getdeletetradeId(this);" title="Delete"><i class="fa fa-trash-o"></i></a>
                <a href="javascript:;" class="btn table_btn" onclick="getviewtradeId(this);" title="View"><i class="fa fa-eye"></i></a>
                <a href="javascript:;" onclick="addToInventoryFromTrade(this)" class="btn table_btn table_btn_1" title="Add Co-Buyer">Add To Inventory</a>`;
                return dv;
            }
        }]
    });
});
// data-toggle="modal" data-target="#edit_trade_info"
//remove_trade_vehicle
//data-toggle="modal" data-target="#view_trade_info"

$(document).on('hidden.bs.modal', function (event) {
  if ($('.modal:visible').length) {
    $('body').addClass('modal-open');
  }
});

$('.add_inventory_vehicle_done').on('click', function () {
    Swal.fire({
      type: "success",
      title: 'Added!',
      text: 'Vehicle added successfully in inventory.',
      confirmButtonClass: 'btn btn-success'
    })
});

$('.edit_inventory_vehicle_done').on('click', function () {
    Swal.fire({
      type: "success",
      title: 'Edited!',
      text: 'Vehicle edited successfully in inventory.',
      confirmButtonClass: 'btn btn-success'
    })
});

$(document).ready(function() {
  // $('.remove_inventory_vehicle').on('click', function () {
  //     Swal.fire({
  //       title: 'Are you sure?',
  //       text: "Remove vehicle form inventory!",
  //       type: 'warning',
  //       showCancelButton: true,
  //       confirmButtonColor: '#3498db',
  //       cancelButtonColor: '#ff0000',
  //       confirmButtonText: 'Yes, Remove it!',
  //       confirmButtonClass: 'btn btn-primary',
  //       cancelButtonClass: 'btn btn-danger ml-1',
  //       buttonsStyling: false,
  //     }).then(function (result) {
  //       if (result.value) {
  //         Swal.fire(
  //           {
  //             type: "success",
  //             title: 'Remove!',
  //             text: 'Vehicle has been Remove.',
  //             confirmButtonClass: 'btn btn-success',
  //           }
  //         )
  //       }
  //     })
  // });
});

$('.add_trade_vehicle_done').on('click', function () {
    Swal.fire({
      type: "success",
      title: 'Added!',
      text: 'Vehicle added successfully in trade.',
      confirmButtonClass: 'btn btn-success'
    })
});

$('.edit_trade_vehicle_done').on('click', function () {
    Swal.fire({
      type: "success",
      title: 'Edited!',
      text: 'Vehicle edited successfully in trade.',
      confirmButtonClass: 'btn btn-success'
    })
});

$(document).ready(function() {

  $('.remove_trade_vehicle').on('click', function () {
      Swal.fire({
        title: 'Are you sure?',
        text: "Remove vehicle form trade!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3498db',
        cancelButtonColor: '#ff0000',
        confirmButtonText: 'Yes, Remove it!',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
      }).then(function (result) {
        if (result.value) {
          Swal.fire(
            {
              type: "success",
              title: 'Remove!',
              text: 'Vehicle has been Remove from Trade.',
              confirmButtonClass: 'btn btn-success',
            }
          )
        }
      })
  });
});

$(document).ready(function() {
    $('#buyer_table').DataTable( {
        dom: "<'row'<'col-sm-12 col-md-6'f><'col-sm-12 col-md-6'B>>" +
              "<'row'<'col-sm-12'tr>>" +
              "<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-3'i><'col-sm-12 col-md-6'p>>",
        responsive: true,
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10', '25', '50', 'Show all' ]
        ],
        buttons: [
            {
              extend: 'pdfHtml5',
              text: 'Download',
              title: 'Buyers List',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4]
              }
            }
        ],
        columnDefs: [{
            targets: -1,
            title: "Edit/Delete/View",
            orderable: !1,
            render: function(a, t, e, s) {
                var dv;
                dv = `<a href="javascript:;" onclick="geteditbuyerId(this)" class="btn table_btn" title="Edit"><i class="fa fa-pencil"></i></a>
                <a href="javascript:;" onclick="getdeletebuyerId(this)" class="btn table_btn" title="Delete"><i class="fa fa-trash-o"></i></a>
                <a href="javascript:;" onclick="getviewbuyerId(this)" class="btn table_btn" title="View"><i class="fa fa-eye"></i></a>
                <a href="javascript:;" onclick="addcobuyerbyid(this)" class="btn table_btn table_btn_1" title="Add Co-Buyer">Add Co-Buyer</a>
                <a href="javascript:;" onclick="addinsurancebyid(this)" class="btn table_btn table_btn_1" title="Add Insurance">Add Insurance</a>`;
                return dv;
            }
        }]
    });
});
//data-toggle="modal" data-target="#edit_buyer"
//remove_buyer
//data-toggle="modal" data-target="#view_buyer"
// data-toggle="modal" data-target="#add_cobuyer_buyer"
// data-toggle="modal" data-target="#add_insurance_buyer"

$(document).ready(function() {
    $('#cobuyer_table').DataTable( {
        dom: "<'row'<'col-sm-12 col-md-6'f><'col-sm-12 col-md-6'B>>" +
              "<'row'<'col-sm-12'tr>>" +
              "<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-3'i><'col-sm-12 col-md-6'p>>",
        responsive: true,
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10', '25', '50', 'Show all' ]
        ],
        buttons: [
            {
              extend: 'pdfHtml5',
              text: 'Download',
              title: 'Co-Buyers List',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5]
              }
            }
        ],
        columnDefs: [{
            targets: -1,
            title: "Edit/Delete/View",
            orderable: !1,
            render: function(a, t, e, s) {
                var dv;
                dv = `<a href="javascript:;" onclick="geteditcobuyerbyId(this)" class="btn table_btn" title="Edit"><i class="fa fa-pencil"></i></a><a href="javascript:;" onclick="getdeletecobuyerbyId(this)" class="btn table_btn" title="Delete"><i class="fa fa-trash-o"></i></a><a href="javascript:;" onclick="getviewcobuyerbyId(this)" class="btn table_btn" title="View"><i class="fa fa-eye"></i></a>`;
                return dv;
            }
        }]
    });
});
//data-toggle="modal" data-target="#edit_cobuyer"
//remove_cobuyer
//data-toggle="modal" data-target="#view_cobuyer"

$(document).ready(function() {
    $('#insurance_table').DataTable( {
        dom: "<'row'<'col-sm-12 col-md-6'f><'col-sm-12 col-md-6'B>>" +
              "<'row'<'col-sm-12'tr>>" +
              "<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-3'i><'col-sm-12 col-md-6'p>>",
        responsive: true,
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10', '25', '50', 'Show all' ]
        ],
        buttons: [
            {
              extend: 'pdfHtml5',
              text: 'Download',
              title: 'Insurance List',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5 ]
              }
            }
        ],
        columnDefs: [{
            targets: -1,
            title: "Edit/Delete/View",
            orderable: !1,
            render: function(a, t, e, s) {
                var dv;
                dv = `<a href="javascript:;" onclick="geteditinsurancebyId(this)" class="btn table_btn" title="Edit"><i class="fa fa-pencil"></i></a><a href="javascript:;" onclick="getremoveinsurancebyId(this)" class="btn table_btn" title="Delete"><i class="fa fa-trash-o"></i></a><a href="javascript:;" onclick="getviewinsurancebyId(this)" class="btn table_btn" title="View"><i class="fa fa-eye"></i></a>`;
                return dv;
            }
        }]
    });
});
//data-toggle="modal" data-target="#edit_insurance"
//remove_insurance
//data-toggle="modal" data-target="#view_insurance"

$(document).ready(function() {
  $('.remove_buyer').on('click', function () {
      Swal.fire({
        title: 'Are you sure?',
        text: "Remove Buyer!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3498db',
        cancelButtonColor: '#ff0000',
        confirmButtonText: 'Yes, Remove it!',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
      }).then(function (result) {
        if (result.value) {
          Swal.fire(
            {
              type: "success",
              title: 'Remove!',
              text: 'Buyer has been Remove.',
              confirmButtonClass: 'btn btn-success',
            }
          )
        }
      })
  });
});

$('.add_buyer_done').on('click', function () {
    Swal.fire({
      type: "success",
      title: 'Added!',
      text: 'Buyer added successfully.',
      confirmButtonClass: 'btn btn-success'
    })
});

$('.edit_buyer_done').on('click', function () {
    Swal.fire({
      type: "success",
      title: 'Edited!',
      text: 'Buyer edited successfully.',
      confirmButtonClass: 'btn btn-success'
    })
});

$(document).ready(function() {
  $('.remove_cobuyer').on('click', function () {
      Swal.fire({
        title: 'Are you sure?',
        text: "Remove Co-Buyer!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3498db',
        cancelButtonColor: '#ff0000',
        confirmButtonText: 'Yes, Remove it!',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
      }).then(function (result) {
        if (result.value) {
          Swal.fire(
            {
              type: "success",
              title: 'Remove!',
              text: 'Co-Buyer has been Remove.',
              confirmButtonClass: 'btn btn-success',
            }
          )
        }
      })
  });
});

$('.add_cobuyer_done').on('click', function () {
    Swal.fire({
      type: "success",
      title: 'Added!',
      text: 'Co-Buyer added successfully.',
      confirmButtonClass: 'btn btn-success'
    })
});

$('.edit_cobuyer_done').on('click', function () {
    Swal.fire({
      type: "success",
      title: 'Edited!',
      text: 'Co-Buyer edited successfully.',
      confirmButtonClass: 'btn btn-success'
    })
});

$(document).ready(function() {
  $('.remove_insurance').on('click', function () {
      Swal.fire({
        title: 'Are you sure?',
        text: "Remove Insurance!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3498db',
        cancelButtonColor: '#ff0000',
        confirmButtonText: 'Yes, Remove it!',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
      }).then(function (result) {
        if (result.value) {
          Swal.fire(
            {
              type: "success",
              title: 'Remove!',
              text: 'Insurance has been Remove.',
              confirmButtonClass: 'btn btn-success',
            }
          )
        }
      })
  });
});

$('.add_insurance_done').on('click', function () {
    Swal.fire({
      type: "success",
      title: 'Added!',
      text: 'Insurance added successfully.',
      confirmButtonClass: 'btn btn-success'
    })
});

$('.edit_insurance_done').on('click', function () {
    Swal.fire({
      type: "success",
      title: 'Edited!',
      text: 'Insurance edited successfully.',
      confirmButtonClass: 'btn btn-success'
    })
});

$(function () {
  $(".datepicker").datepicker({
        autoclose: true,
        todayHighlight: true
  }).datepicker('update', new Date());

$('.daterange').daterangepicker({
    opens: 'left',
    autoApply: true,
    drops: 'up'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});



$(document).ready(function() {
    $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
        $($.fn.dataTable.tables( true ) ).css('width', '100%');
        $($.fn.dataTable.tables( true ) ).DataTable().columns.adjust().draw();
    } );
});

window.onscroll = function() {myFunction()};

var header = document.getElementById("SecondNav");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("stickynav");
  } else {
    header.classList.remove("stickynav");
  }
}

$('.profile_update').on('click', function () {
    Swal.fire({
      type: "success",
      title: 'Updated!',
      text: 'Profile Updated successfully.',
      confirmButtonClass: 'btn btn-success'
    })
});

$(document).ready(function() {
    $('#d_inventory').DataTable( {
        dom: "<'row'<'col-sm-12 col-md-6'f><'col-sm-12 col-md-6'B>>" +
              "<'row'<'col-sm-12'tr>>" +
              "<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-3'i><'col-sm-12 col-md-6'p>>",
        responsive: true,
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10', '25', '50', 'Show all' ]
        ],
        buttons: [
            {
              extend: 'pdfHtml5',
              text: 'Download',
              title: 'Inventory Report',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
              }
            }
        ]
    });
});

$(document).ready(function() {
    $('#d_sales').DataTable( {
        dom: "<'row'<'col-sm-12 col-md-6'f><'col-sm-12 col-md-6'B>>" +
              "<'row'<'col-sm-12'tr>>" +
              "<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-3'i><'col-sm-12 col-md-6'p>>",
        responsive: true,
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10', '25', '50', 'Show all' ]
        ],
        columnDefs: [
        {
          targets: [0],
          visible: false,
        },
      ],
        buttons: [
            {
              extend: 'pdfHtml5',
              text: 'Download',
              title: 'Sales Report',
              exportOptions: {
                  columns: [ 1, 2, 3, 4, 5, 6, 7]
              }
            }
        ]
    });
});

(function($) {
  var opts = {
    format: 'mm/dd/yyyy',
    container: '#datepicker-container',
    clearBtn: true,
    autoclose: true
  };
  $('.start_date').datepicker(opts);
  opts.forceParse = false;
  $('.end_date').datepicker(opts);
  $('.start_date').on('changeDate', function(selected) {

    var toDate = $('.end_date').datepicker('getDate');
    if (toDate) {

      if (selected.date.valueOf() > toDate.valueOf()) {
        $('.end_date').datepicker('setDate', selected.date);
      }
    }

    $('.end_date').datepicker('setStartDate', selected.date);
  });
  $('.start_date').on('clearDate', function() {
    $('.end_date').datepicker('clearDates');
  });
})(jQuery);

$(document).ready(function() {
    $('#d_a_inventory').DataTable( {
        dom: "<'row'<'col-sm-12 col-md-6'f><'col-sm-12 col-md-6'B>>" +
              "<'row'<'col-sm-12'tr>>" +
              "<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-3'i><'col-sm-12 col-md-6'p>>",
        responsive: true,
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10', '25', '50', 'Show all' ]
        ],
        buttons: [
            {
              extend: 'pdfHtml5',
              text: 'Download',
              title: 'Inventory Report',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
              }
            }
        ]
    });
});

$(document).ready(function() {
    $('#d_a_sales').DataTable( {
        dom: "<'row'<'col-sm-12 col-md-6'f><'col-sm-12 col-md-6'B>>" +
              "<'row'<'col-sm-12'tr>>" +
              "<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-3'i><'col-sm-12 col-md-6'p>>",
        responsive: true,
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10', '25', '50', 'Show all' ]
        ],
        buttons: [
            {
              extend: 'pdfHtml5',
              text: 'Download',
              title: 'Sales Report',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ]
              }
            }
        ]
    });
});



"use strict";

var current_fs, next_fs, previous_fs;
var left, opacity, scale;
var animating;

$(".next").click(function(){

  var $thiss = $(this);
  $id = $(this).attr('id');
  //console.log($id);
  if($id == 'next_calculator'){
    var inv_id =$('#sd_main_inventory_inv_id').val();
    var trade_inv_id =$('#sd_main_trade_inv_id').val();
    var buyers_id =$('#sd_main_buyers_id').val();
    var cobuyers_id =$('#sd_main_cobuyers_id').val();
    var insurance_buyers_id =$('#sd_main_insurance_buyers_id').val();

    console.log(inv_id);
    console.log(trade_inv_id);
    console.log(buyers_id);
    console.log(cobuyers_id);
    console.log(insurance_buyers_id);

    //to update review page
    var $this = $('#next_calculator');
    urlv = base_url+'startdeal/getBuyerInvData';

      $('.alert').slideUp();
      $.ajax({
          url : urlv,
          method : "POST",
          data : {
            buyers_id:buyers_id,
            inv_id:inv_id,
            trade_inv_id:trade_inv_id,
            cal_amount_finance:$('#sd_calc_saleprice').val(),
            cal_down_payment:$('#sd_calc_downpayment').val(),
            cal_monthly_payment:$('#sd_calc_result_monthly_payment').text(),
            cal_total_interest:$('#sd_calc_result_monthly_interest').text(),
            bhph_months:$('#sd_calc_loan_length_select').val(),
            bhph_rate:$('#sd_calc_interest_rate').val(),
            bhph_tpmts:$('#sd_calc_result_total_payment').text(),
            cal_biweekly_payment:$('#sd_calc_result_biweekly_payment').text(),
            cal_biweekly_total_interest:$('#sd_calc_result_biweekly_interest').text(),
            cal_biweekly_total_payment:$('#sd_calc_result_biweekly_total_payment').text()
          },
          beforeSend: function() {
            $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
          },
          success :function(data){
            console.log("real "+data);
            $('.ldr').remove();


            if(data == 'notfound'){
              var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
                '<div class="alert-text">Oops! something wrong. Please do process again</div>'+
                '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
              '</div>');
             $this.after(alert);
              return false;
            }else if(data == 'mathupdate'){
              var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
                '<div class="alert-text">Press submit button to go ahead. </div>'+
                '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
              '</div>');
             $this.after(alert);
              return false;
            }else{

              var json = JSON.parse(data);

              if(animating) return false;
              animating = true;

              current_fs = $thiss.parent();
              next_fs = $thiss.parent().next();

              $("#progressbar li").eq($(".step_group").index(next_fs)).addClass("active");
              $("#progressbar li").eq($(".step_group").index(current_fs)).removeClass("active");

              next_fs.show();

              current_fs.animate({opacity: 0}, {
                step: function(now, mx) {

                  scale = 1 - (1 - now) * 0.2;
                  left = (now * 50)+"%";

                  opacity = 1 - now;
                  current_fs.css({'transform': 'scale('+scale+')'});
                  next_fs.css({'left': left, 'opacity': opacity});
                },
                duration: 150,
                complete: function(){
                  current_fs.hide();
                  animating = false;
                },

                easing: 'easeOutQuint'
              });

              // if(json[1].trade_inv_vin == null){
              // 	console.log("not found");
              // }

              $('#sd_main_buyers_firstname').val(json[1].buyers_first_name);
              $('#sd_main_buyers_middlename').val(json[1].buyers_mid_name);
              $('#sd_main_buyers_lastname').val(json[1].buyers_last_name);
              $('#sd_main_buyers_address').val(json[1].buyers_address);
              $('#sd_main_buyers_city').val(json[1].buyers_city);
              $('#sd_main_buyers_country').val(json[1].buyers_county);
              $('#sd_main_buyers_state').val(json[1].buyers_state);
              $('#sd_main_buyers_zip').val(json[1].buyers_zip);
              $('#sd_main_buyers_email').val(json[1].buyers_pri_email);
              $('#sd_main_buyers_workphone').val(json[1].buyers_work_phone);
              $('#sd_main_buyers_homephone').val(json[1].buyers_home_phone);
              $('#sd_main_buyers_mobile').val(json[1].buyers_pri_phone_cell);
              $('#sd_main_buyers_dlnumber').val(json[1].buyers_DL_number);
              $('#sd_main_buyers_dlstate').val(json[1].buyers_DL_state);
              $('#sd_main_buyers_dlexpire').val(json[1].buyers_DL_expire);
              $('#sd_main_buyers_dldob').val(json[1].buyers_DL_dob);
              $('#sd_main_buyers_temp_tag_number').val(json[1].buyers_temp_tag_number);

              // $('sd_main_bhphcontract_inv_id').val(0);
              // $('sd_main_bhphcontract_trade_inv_id').val(0);

				// if(json.hasOwnProperty('inv_vin')){

          if(json[0].status == "both"){
          // if(json[1].inv_vin != null && json[2].trade_inv_vin != null){

                  $("#sd_main_inventory_box").removeAttr("style");
                  $("#sd_main_trade_box").removeAttr("style");

                  $('#sd_main_inventory_vin').val(json[2].inv_vin);
                  $('#sd_main_inventory_year').val(json[2].inv_year);
                  $('#sd_main_inventory_make').val(json[2].inv_make);
                  $('#sd_main_inventory_model').val(json[2].inv_model);
                  $('#sd_main_inventory_style').val(json[2].inv_style);
                  $('#sd_main_inventory_stocknumber').val(json[2].inv_stock);
                  $('#sd_main_inventory_color').val(json[2].inv_color);
                  $('#sd_main_inventory_drivetype').val(json[2].drive_type);
                  $('#sd_main_inventory_enginesize').val(json[2].engine_size);
                  $('#sd_main_inventory_mileage').val(json[2].inv_mileage);
                  if(json[2].inv_exempt == "yes") $('#sd_main_inventory_exempt_cb').prop('checked',true);
                  $('#sd_main_inventory_cost').val(json[2].inv_cost);
                  $('#sd_main_inventory_addedcost').val(json[2].inv_addedcost);
                  $('#sd_main_inventory_totalcost').val(json[2].inv_flrc);
                  $('#sd_main_inventory_price').val(json[2].inv_price);

                  $('#sd_main_trade_vin').val(json[3].trade_inv_vin);
                  $('#sd_main_trade_year').val(json[3].trade_inv_year);
                  $('#sd_main_trade_make').val(json[3].trade_inv_make);
                  $('#sd_main_trade_model').val(json[3].trade_inv_model);
                  $('#sd_main_trade_style').val(json[3].trade_inv_style);
                  $('#sd_main_trade_color').val(json[3].trade_inv_color);
                  $('#sd_main_trade_drivetype').val(json[3].drive_type);
                  $('#sd_main_trade_enginesize').val(json[3].engine_size);
                  $('#sd_main_trade_mileage').val(json[3].trade_inv_mileage);
                  if(json[3].trade_inv_exempt == "yes") $('#sd_main_trade_exempt_cb').prop('checked',true);
                  $('#sd_main_trade_allowance').val(json[3].trade_inv_price);

                  // $('sd_main_bhphcontract_inv_id').val(json[2].inv_id);
                  // $('sd_main_bhphcontract_trade_inv_id').val(json[3].trade_inv_id);
          }else{

              // if(json[2].inv_vin != null){
              if(json[0].status == "inventory"){

                  $("#sd_main_inventory_box").removeAttr("style");
                  $("#sd_main_trade_box").css('display','none');

                  // $('#edit-submitted-first-name').removeAttr('required');​​​​​

                  // $('#sd_main_trade_vin').prop('required',false);
                  // $('#sd_main_trade_year').prop('required',false);
                  // $('#sd_main_trade_make').prop('required',false);
                  // $('#sd_main_trade_model').prop('required',false);
                  // $('#sd_main_trade_style').prop('required',false);
                  // $('#sd_main_trade_color').prop('required',false);
                  // $('#sd_main_trade_mileage').prop('required',false);
                  // $('#sd_main_trade_allowance').prop('required',false);

                  $('#sd_main_inventory_vin').prop('required',true);
                  $('#sd_main_inventory_year').prop('required',true);
                  $('#sd_main_inventory_make').prop('required',true);
                  $('#sd_main_inventory_model').prop('required',true);
                  $('#sd_main_inventory_style').prop('required',true);
                  $('#sd_main_inventory_stocknumber').prop('required',true);
                  $('#sd_main_inventory_color').prop('required',true);
                  $('#sd_main_inventory_drivetype').prop('required',true);
                  $('#sd_main_inventory_enginesize').prop('required',true);
                  $('#sd_main_inventory_mileage').prop('required',true);
                  $('#sd_main_inventory_cost').prop('required',true);
                  $('#sd_main_inventory_addedcost').prop('required',true);
                  $('#sd_main_inventory_totalcost').prop('required',true);
                  $('#sd_main_inventory_price').prop('required',true);

              	 	$('#sd_main_inventory_vin').val(json[2].inv_vin);
	              	$('#sd_main_inventory_year').val(json[2].inv_year);
	              	$('#sd_main_inventory_make').val(json[2].inv_make);
	              	$('#sd_main_inventory_model').val(json[2].inv_model);
	              	$('#sd_main_inventory_style').val(json[2].inv_style);
	              	$('#sd_main_inventory_stocknumber').val(json[2].inv_stock);
                  $('#sd_main_inventory_color').val(json[2].inv_color);
                  $('#sd_main_inventory_drivetype').val(json[2].drive_type);
	              	$('#sd_main_inventory_enginesize').val(json[2].engine_size);
                  $('#sd_main_inventory_mileage').val(json[2].inv_mileage);
                  if(json[2].inv_exempt == "yes") $('#sd_main_inventory_exempt_cb').prop('checked',true);
                  $('#sd_main_inventory_cost').val(json[2].inv_cost);
	              	$('#sd_main_inventory_addedcost').val(json[2].inv_addedcost);
	             	  $('#sd_main_inventory_totalcost').val(json[2].inv_flrc);
	              	$('#sd_main_inventory_price').val(json[2].inv_price);

                  // $('sd_main_bhphcontract_inv_id').val(json[2].inv_id);

				      }else{

                  $("#sd_main_inventory_box").css('display','none');
                  $("#sd_main_trade_box").removeAttr("style");

                  // $('#sd_main_inventory_vin').prop('required',false);
                  // $('#sd_main_inventory_year').prop('required',false);
                  // $('#sd_main_inventory_make').prop('required',false);
                  // $('#sd_main_inventory_model').prop('required',false);
                  // $('#sd_main_inventory_style').prop('required',false);
                  // $('#sd_main_inventory_stocknumber').prop('required',false);
                  // $('#sd_main_inventory_color').prop('required',false);
                  // $('#sd_main_inventory_mileage').prop('required',false);
                  // $('#sd_main_inventory_totalcost').prop('required',false);
                  // $('#sd_main_inventory_price').prop('required',false);

                  $('#sd_main_trade_vin').prop('required',true);
                  $('#sd_main_trade_year').prop('required',true);
                  $('#sd_main_trade_make').prop('required',true);
                  $('#sd_main_trade_model').prop('required',true);
                  $('#sd_main_trade_style').prop('required',true);
                  $('#sd_main_trade_color').prop('required',true);
                  $('#sd_main_trade_drivetype').prop('required',true);
                  $('#sd_main_trade_enginesize').prop('required',true);
                  $('#sd_main_trade_mileage').prop('required',true);
                  $('#sd_main_trade_allowance').prop('required',true);

              	 	$('#sd_main_trade_vin').val(json[2].trade_inv_vin);
              		$('#sd_main_trade_year').val(json[2].trade_inv_year);
              		$('#sd_main_trade_make').val(json[2].trade_inv_make);
              		$('#sd_main_trade_model').val(json[2].trade_inv_model);
              		$('#sd_main_trade_style').val(json[2].trade_inv_style);
                  $('#sd_main_trade_color').val(json[2].trade_inv_color);
                  $('#sd_main_trade_drivetype').val(json[2].drive_type);
              		$('#sd_main_trade_enginesize').val(json[2].engine_size);
              		$('#sd_main_trade_mileage').val(json[2].trade_inv_mileage);
                  if(json[2].trade_inv_exempt == "yes") $('#sd_main_trade_exempt_cb').prop('checked',true);
              		$('#sd_main_trade_allowance').val(json[2].trade_inv_price);

                  // $('sd_main_bhphcontract_trade_inv_id').val(json[2].trade_inv_id);
              }
				  }

              $('#sd_main_calc_saleprice').val(json[1].sale_price);
              $('#sd_main_calc_cashcredit').val(json[1].cash_credit);
              $('#sd_main_calc_tradecredit').val(json[1].trade_credit);
              $('#sd_main_calc_tradebalance').val(json[1].trade_balance);
              $('#sd_main_calc_servicefee').val(json[1].dealer_fee);
              $('#sd_main_calc_tagregistration').val(json[1].dmv);
              $('#sd_main_calc_total_due').val(json[1].total_due);
              $('#sd_main_calc_tax').val(json[1].tax);
              $('#sd_main_calc_sub_due').val(json[1].sub_due);
              $('#sd_main_calc_sub_due1').val(json[1].sub_due1);
              $('#sd_main_calc_sub_due2').val(json[1].sub_due2);


              // $('sd_main_bhphcontract_buyers_id').val(json[1].buyers_id);
              // $('sd_main_bhphcontract_transact_id').val(json[1].sale_price);
              $('#sd_main_bhphcontract_cash_price').val(json[1].sale_price);
              $('#sd_main_bhphcontract_dealer_fee').val(json[1].dealer_fee);
              $('#sd_main_bhphcontract_taxes').val(json[1].tax);
              $('#sd_main_bhphcontract_cashdown').val(json[1].cash_credit);
              $('#sd_main_bhphcontract_deferred_down').val(json[1].cal_down_payment);
              $('#sd_main_bhphcontract_trade_allowance').val(json[1].trade_credit);
              $('#sd_main_bhphcontract_title_fee').val(json[1].dmv);
              $('#sd_main_bhphcontract_payment_amount').val(json[1].cal_monthly_payment);
              $('#sd_main_bhphcontract_number_payments').val(json[1].bhph_months);
              $('#sd_main_bhphcontract_interest_rate').val(json[1].bhph_rate);
              $('#sd_main_bhphcontract_total_payments').val(json[1].bhph_tpmts);
              $('#sd_main_bhphcontract_finance_charge').val(json[1].cal_total_interest);
              $('#sd_main_bhphcontract_tot_finance_amt').val(json[1].cal_amount_finance);
              var totalpricepaid = parseFloat(json[1].cash_credit)+parseFloat(json[1].bhph_tpmts);
              $('#sd_main_bhphcontract_tot_price_paid').val(totalpricepaid.toFixed(2));


            }
          }
      });
  }else if($id == 'next_buyers'){
    var inv_id =$('#sd_main_inventory_inv_id').val();
    var trade_inv_id =$('#sd_main_trade_inv_id').val();
    var buyers_id =$('#sd_main_buyers_id').val();

    var $this = $('#next_buyers');
    urlv = base_url+'startdeal/insertProcessingDeal';

      $('.alert').slideUp();
      $.ajax({
          url : urlv,
          method : "POST",
          data : {
            inv_id:inv_id,
            trade_inv_id:trade_inv_id,
            buyers_id:buyers_id
          },
          beforeSend: function() {
            $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
          },
          success :function(data){
            //console.log(data);
            $('.ldr').remove();

            console.log(data);
            if(data != 'notfound'){
              var json = JSON.parse(data);

              $("#sd_main_transact_id").val(json.transact_id);
              $("#sd_main_transact_status").val(json.status);

              if(animating) return false;
              animating = true;

              current_fs = $thiss.parent();
              next_fs = $thiss.parent().next();

              $("#progressbar li").eq($(".step_group").index(next_fs)).addClass("active");
              $("#progressbar li").eq($(".step_group").index(current_fs)).removeClass("active");

              next_fs.show();

              current_fs.animate({opacity: 0}, {
                step: function(now, mx) {

                  scale = 1 - (1 - now) * 0.2;
                  left = (now * 50)+"%";

                  opacity = 1 - now;
                  current_fs.css({'transform': 'scale('+scale+')'});
                  next_fs.css({'left': left, 'opacity': opacity});
                },
                duration: 150,
                complete: function(){
                  current_fs.hide();
                  animating = false;
                },

                easing: 'easeOutQuint'
              });


            }else{
              var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
                '<div class="alert-text">Something wrong<br> '+data+'</div>'+
                '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
              '</div>');
             $this.after(alert);
              return false;
            }
          }
      });

  // }else if($id == 'next_inventory'){
  //   $this = $('#next_inventory');
  //   urlv =base_url+'inventoryarea/getInventoryDataFromId';
  //   $.ajax({
  //         url : urlv,
  //         method : "POST",
  //         data : {id : $('#sd_main_inventory_inv_id').val()},
  //         beforeSend: function() {
  //           $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
  //         },
  //         success :function(data){
  //           $('.ldr').remove();
  //           //console.log(data);

  //           if(animating) return false;
  //             animating = true;
  //             current_fs = $thiss.parent();
  //             next_fs = $thiss.parent().next();
  //             $("#progressbar li").eq($(".step_group").index(next_fs)).addClass("active");
  //             $("#progressbar li").eq($(".step_group").index(current_fs)).removeClass("active");
  //             next_fs.show();
  //             current_fs.animate({opacity: 0}, {
  //               step: function(now, mx) {
  //                 scale = 1 - (1 - now) * 0.2;
  //                 left = (now * 50)+"%";
  //                 opacity = 1 - now;
  //                 current_fs.css({'transform': 'scale('+scale+')'});
  //                 next_fs.css({'left': left, 'opacity': opacity});
  //               },
  //               duration: 150,
  //               complete: function(){
  //                 current_fs.hide();
  //                 animating = false;
  //               },
  //               easing: 'easeOutQuint'
  //             });

  //             var json = JSON.parse(data);
  //             //$('#add_trade').modal('toggle');
  //             $('#add_trade_info').modal('show');

  //             $('#sd_tradeinfo_vin').val(json[0].inv_vin);
  //             $('#sd_tradeinfo_year').val(json[0].inv_year);
  //             $('#sd_tradeinfo_make').val(json[0].inv_make);
  //             $('#sd_tradeinfo_model').val(json[0].inv_model);
  //             $('#sd_tradeinfo_style').val(json[0].inv_style);
  //             $('#sd_tradeinfo_color').val(json[0].inv_color);
  //             $('#sd_tradeinfo_mileage').val(json[0].inv_mileage);

  //         }
  //     });

  }else{

    if(animating) return false;
    animating = true;

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();


    $("#progressbar li").eq($(".step_group").index(next_fs)).addClass("active");
    $("#progressbar li").eq($(".step_group").index(current_fs)).removeClass("active");


    next_fs.show();

    current_fs.animate({opacity: 0}, {
      step: function(now, mx) {


        scale = 1 - (1 - now) * 0.2;

        left = (now * 50)+"%";

        opacity = 1 - now;
        current_fs.css({'transform': 'scale('+scale+')'});
        next_fs.css({'left': left, 'opacity': opacity});
      },
      duration: 150,
      complete: function(){
        current_fs.hide();
        animating = false;
      },

      easing: 'easeOutQuint'
    });

  }

});

$(".previous").click(function(){
  if(animating) return false;
  animating = true;

  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();


  $("#progressbar li").eq($(".step_group").index(previous_fs)).addClass("active");
  $("#progressbar li").eq($(".step_group").index(current_fs)).removeClass("active");


  previous_fs.show();

  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {


      scale = 0.8 + (1 - now) * 0.2;

      left = ((1-now) * 50)+"%";

      opacity = 1 - now;
      current_fs.css({'left': left});
      previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
    },
    duration: 150,
    complete: function(){
      current_fs.hide();
      animating = false;
    },

    easing: 'easeOutQuint'
  });
});

$('#sd_main_inventory_inv_id').on('change', function() {
  // console.log( this.value );
  // console.log( $('#hidden_inv_price'+this.value).val() );
  $('#sd_math_saleprice').val($('#hidden_inv_price'+this.value).val())
  autocalculatersd();

  if(this.value != '0'){
    // $('#next_inventory').removeAttr("style");
    $('#next_trade').removeAttr("style");
    $('#next_trade_skip').removeAttr("style");
  }else{
    //$('#next_inventory').css("display","none");

	if($('#sd_main_trade_inv_id').val() == '0'){
	    $('#next_trade').css("display","none");
	    $('#next_trade_skip').css("display","none");
	}
  }
});

$('#sd_main_trade_inv_id').on('change', function() {
  // console.log( this.value );
  $('#sd_math_tradecredit').val($('#hidden_trade_inv_price'+this.value).val())
  autocalculatersd();

  if(this.value != '0'){
    $('#next_trade').removeAttr("style");
  }else{
  	if($('#sd_main_inventory_inv_id').val() == '0'){
  		$('#next_trade').css("display","none");
	    $('#next_trade_skip').css("display","none");
  	}else{
  		$('#next_trade').css("display","none");
  	}
    //$('#next_trade').css("display","none");

  }
});

$('#sd_main_buyers_id').on('change', function() {
  // console.log( this.value );
  var $this = $(this);
  if(this.value != '0'){
    var urlv = base_url+'startdeal/getCobuyerData';
    $.ajax({
        url : urlv,
        method : "POST",
        data : {id:this.value},
        beforeSend: function() {
            $this.parent().after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          // console.log(data);
          $('.ldr').remove();
          var json = JSON.parse(data);

            // $('#sd_main_option_cobuyer').val(json[0].buyers_id);
            // $('#sd_main_option_cobuyer').text(json[0].co_buyers_first_name+' '+json[0].co_buyers_last_name);

            if(json[0].co_buyers_first_name != ""){
              $("#sd_main_cobuyers_id option").remove();
              $('#sd_main_cobuyers_id').append('<option value="0">Choose Co-Buyer</option>');
              $('#sd_main_cobuyers_id').append('<option value="0">No Co-buyer</option>');
              $('#sd_main_cobuyers_id').append('<option value="'+json[0].buyers_id+'" selected>'+json[0].co_buyers_first_name+' '+json[0].co_buyers_last_name+'</option>');
            }
            $('#sd_add_cobuyer_buyerid').val(json[0].buyers_id);
            $('#sd_add_cobuyer_buyer').val(json[0].buyers_first_name+' '+json[0].buyers_last_name);
            $('#sd_add_insurance_buyerid').val(json[0].buyers_id);
            $('#sd_add_insurance_buyer').val(json[0].buyers_first_name+' '+json[0].buyers_last_name);
            // $('#sd_main_option_insurance').val(json[0].buyers_id);
            // $('#sd_main_option_insurance').text(json[0].ins_pol_num);
            if(json[0].ins_pol_num != ""){
              $("#sd_main_insurance_buyers_id option").remove();
              $('#sd_main_insurance_buyers_id').append('<option value="0">Choose Insurance</option>');
              $('#sd_main_insurance_buyers_id').append('<option value="0">No Insurance</option>');
              $('#sd_main_insurance_buyers_id').append('<option value="'+json[0].buyers_id+'">'+json[0].ins_pol_num+'</option>');
            }
            $('#sd_math_buyer_select').val(json[0].buyers_first_name+' '+json[0].buyers_last_name);
            $('#next_buyers').removeAttr("style");

        }
    });
  }else{
      $('#next_buyers').css("display","none");
  }
});

// $('#sd_main_cobuyers_id').on('change', function() {
//   // console.log( this.value );
//   if(this.value != '0'){
//     var urlv = base_url+'startdeal/getCobuyerData';
//     $.ajax({
//         url : urlv,
//         method : "POST",
//         data : {id:$('#sd_main_buyers_id').val()},
//         beforeSend: function() {

//         },
//         success :function(data){
//           // console.log(data);

//           var json = JSON.parse(data);

//             $('#sd_main_option_insurance').val(json[0].buyers_id);
//             $('#sd_main_option_insurance').text(json[0].ins_pol_num);
//             // $('#next_cobuyers').removeAttr("style");

//         }
//     });
//   }
//   // else{
//   //   $('#next_cobuyers').css("display","none");

//   // }
// });

// $('#sd_main_insurance_buyers_id').on('change', function() {
//   // console.log( this.value );
//   if(this.value != '0'){
//     $('#next_insurance').removeAttr("style");
//   }
//   // else{
//   //   $('#next_insurance').css("display","none");

//   // }
// });

$(".submit").click(function(){
  return false;
})

$('.action-button').click(function() {
  $('html, body').animate({
    scrollTop: 0
  }, 250);
  return false;
});


$('.update_buyer_done').on('click', function () {
    Swal.fire({
      type: "success",
      title: 'Updated!',
      text: 'Buyer Profile Updated successfully.',
      confirmButtonClass: 'btn btn-success'
    })
});

$('.update_vehicle_done').on('click', function () {
    Swal.fire({
      type: "success",
      title: 'Updated!',
      text: 'Vehicle information Updated successfully.',
      confirmButtonClass: 'btn btn-success'
    })
});

$('.change_numbers_done').on('click', function () {
    Swal.fire({
      type: "success",
      title: 'Updated!',
      text: 'Calculation Updated successfully.',
      confirmButtonClass: 'btn btn-success'
    })
});

$("#chooseall").click(function() {
  $(".print_deal_option").prop("checked", $(this).prop("checked"));
});

$(".print_deal_option").click(function() {
  if (!$(this).prop("checked")) {
    $("#chooseall").prop("checked", false);
  }
});

$(document).ready(function() {
    $('#your_deal').DataTable( {
        dom: "<'row'<'col-sm-12 col-md-6'f><'col-sm-12 col-md-6'B>>" +
              "<'row'<'col-sm-12'tr>>" +
              "<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-3'i><'col-sm-12 col-md-6'p>>",
        responsive: true,
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10', '25', '50', 'Show all' ]
        ],
        buttons: [
            {
              extend: 'pdfHtml5',
              text: 'Download',
              title: 'Your Deal',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5 ]
              }
            }
        ],
        columnDefs: [
          {
						targets: [6],
						visible: false,
					},{
            targets: -1,
            title: "Edit/Delete/View",
            orderable: !1,
            render: function(a, t, e, s) {
                var dv;
                if(e[6] == "deal_not_closed"){
                  dv = `<a href="javascript:;" onclick="getdeletedealbyId(this)" class="btn table_btn" title="Delete"><i class="fa fa-trash-o"></i></a>
                  <a href="javascript:;" onclick="getviewdealById(this)" class="btn table_btn" title="View"><i class="fa fa-eye"></i></a>`;
                }else{
                  dv = `<a href="javascript:;" onclick="geteditdealById(this)" class="btn table_btn" title="Edit"><i class="fa fa-pencil"></i></a>
                  <a href="javascript:;" onclick="getdeletedealbyId(this)" class="btn table_btn" title="Delete"><i class="fa fa-trash-o"></i></a>
                  <a href="javascript:;" onclick="getviewdealById(this)" class="btn table_btn" title="View"><i class="fa fa-eye"></i></a>`;
                }

                return dv;
            }
        }]
    });
});
//remove_deal

$(document).ready(function() {
  $('.remove_deal').on('click', function () {
      Swal.fire({
        title: 'Are you sure?',
        text: "Remove Deal!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3498db',
        cancelButtonColor: '#ff0000',
        confirmButtonText: 'Yes, Remove it!',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
      }).then(function (result) {
        if (result.value) {
          Swal.fire(
            {
              type: "success",
              title: 'Remove!',
              text: 'Deal has been Remove.',
              confirmButtonClass: 'btn btn-success',
            }
          )
        }
      })
  });
});

$('.save_deal').on('click', function () {
    Swal.fire({
      type: "success",
      title: 'Save!',
      text: 'Deal save_deal successfully.',
      confirmButtonClass: 'btn btn-success'
    })
});


$("#chooseall"+userstate).click(function() {
  $(".print_deal_option"+userstate).prop("checked", $(this).prop("checked"));
});

$(".print_deal_option"+userstate).click(function() {
  if (!$(this).prop("checked")) {
    $("#chooseall"+userstate).prop("checked", false);
  }
});

function openPrintModel(state) {
  console.log(state);
  if(state == "GEORGIA") $('#print_deal').modal('show');
  else $('#print_deal_'+state).modal('show');
}

$(document).on('click','#sd_main_readyprint_btn'+userstate,function(e) {

  var inv_id =$('#sd_main_inventory_inv_id').val();
  var trade_inv_id =$('#sd_main_trade_inv_id').val();
  var buyers_id =$('#sd_main_buyers_id').val();

  $("#sd_main_readyprint_inv_id"+userstate).val(inv_id);
  $("#sd_main_readyprint_trade_inv_id"+userstate).val(trade_inv_id);
  $("#sd_main_readyprint_buyers_id"+userstate).val(buyers_id);
  $("#sd_main_readyprint_transact_id"+userstate).val($('#sd_main_transact_id').val());

  urlv = base_url+'startdeal/insert_deal_print';
  var $this = $("#sd_main_readyprint_btn"+userstate);
  $('.alert').slideUp();
  // var formDatapro = new FormData('#dealform');
    $.ajax({
        url : urlv,
        method : "POST",
        data : {
          sd_main_transact_id:$('#sd_main_transact_id').val(),
          sd_main_transact_status:$('#sd_main_transact_status').val(),
          sd_main_buyers_id:buyers_id,
          sd_main_inventory_inv_id:inv_id,
          sd_main_trade_inv_id:$('#sd_main_trade_inv_id').val(),
          sd_main_buyers_firstname:$('#sd_main_buyers_firstname').val(),
          sd_main_buyers_middlename:$('#sd_main_buyers_middlename').val(),
          sd_main_buyers_lastname:$('#sd_main_buyers_lastname').val(),
          sd_main_buyers_email:$('#sd_main_buyers_email').val(),
          sd_main_buyers_address:$('#sd_main_buyers_address').val(),
          sd_main_buyers_city:$('#sd_main_buyers_city').val(),
          sd_main_buyers_state:$('#sd_main_buyers_state').val(),
          sd_main_buyers_zip:$('#sd_main_buyers_zip').val(),
          sd_main_buyers_workphone:$('#sd_main_buyers_workphone').val(),
          sd_main_buyers_homephone:$('#sd_main_buyers_homephone').val(),
          sd_main_buyers_mobile:$('#sd_main_buyers_mobile').val(),
          sd_main_buyers_dlnumber:$('#sd_main_buyers_dlnumber').val(),
          sd_main_buyers_dlstate:$('#sd_main_buyers_dlstate').val(),
          sd_main_buyers_dlexpire:$('#sd_main_buyers_dlexpire').val(),
          sd_main_buyers_dldob:$('#sd_main_buyers_dldob').val(),
          sd_main_buyers_temp_tag_number:$('#sd_main_buyers_temp_tag_number').val(),
          sd_main_cobuyers_id:$('#sd_main_cobuyers_id').val(),
          sd_main_insurance_buyers_id:$('#sd_main_insurance_buyers_id').val(),
          sd_main_calc_saleprice:$('#sd_main_calc_saleprice').val(),
          sd_main_calc_tradecredit:$('#sd_main_calc_tradecredit').val(),
          sd_main_calc_tradebalance:$('#sd_main_calc_tradebalance').val(),
          sd_main_calc_cashcredit:$('#sd_main_calc_cashcredit').val(),
          sd_main_calc_tax:$('#sd_main_calc_tax').val(),
          sd_main_calc_servicefee:$('#sd_main_calc_servicefee').val(),
          sd_main_calc_tagregistration:$('#sd_main_calc_tagregistration').val(),
          sd_main_calc_total_due:$('#sd_main_calc_total_due').val(),
          sd_main_calc_sub_due:$('#sd_main_calc_sub_due').val(),
          sd_main_calc_sub_due1:$('#sd_main_calc_sub_due1').val(),
          sd_main_calc_sub_due2:$('#sd_main_calc_sub_due2').val(),
          sd_main_inventory_vin:$('#sd_main_inventory_vin').val(),
          sd_main_inventory_stocknumber:$('#sd_main_inventory_stocknumber').val(),
          sd_main_inventory_year:$('#sd_main_inventory_year').val(),
          sd_main_inventory_make:$('#sd_main_inventory_make').val(),
          sd_main_inventory_model:$('#sd_main_inventory_model').val(),
          sd_main_inventory_style:$('#sd_main_inventory_style').val(),
          sd_main_inventory_color:$('#sd_main_inventory_color').val(),
          sd_main_inventory_drivetype:$('#sd_main_inventory_drivetype').val(),
          sd_main_inventory_enginesize:$('#sd_main_inventory_enginesize').val(),
          sd_main_inventory_mileage:$('#sd_main_inventory_mileage').val(),
          sd_main_inventory_cost:$('#sd_main_inventory_cost').val(),
          sd_main_inventory_addedcost:$('#sd_main_inventory_addedcost').val(),
          sd_main_inventory_price:$('#sd_main_inventory_price').val(),
          sd_main_inventory_totalcost:$('#sd_main_inventory_totalcost').val(),
          sd_main_trade_vin:$('#sd_main_trade_vin').val(),
          sd_main_trade_year:$('#sd_main_trade_year').val(),
          sd_main_trade_make:$('#sd_main_trade_make').val(),
          sd_main_trade_model:$('#sd_main_trade_model').val(),
          sd_main_trade_style:$('#sd_main_trade_style').val(),
          sd_main_trade_color:$('#sd_main_trade_color').val(),
          sd_main_trade_drivetype:$('#sd_main_trade_drivetype').val(),
          sd_main_trade_enginesize:$('#sd_main_trade_enginesize').val(),
          sd_main_trade_mileage:$('#sd_main_trade_mileage').val(),
          sd_main_trade_allowance:$('#sd_main_trade_allowance').val()

        },
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          console.log(data);
          $('.ldr').remove();

          var json = JSON.parse(data);
          if(json.request_status == 'done'){
          // if(data == 'done'){
            $("#sd_main_readyprint_transact_id"+userstate).val(json.transact_id);
            $('#sd_main_readyprint_form'+userstate).submit();
            window.location.href = base_url+'yourdeal';

          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Deal insert failed<br> '+json.msg+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);
            return false;
          }
        }
    });
});

$(document).on('click','#deal_not_closed_submit',function(e) {
// $("#deal_not_closed_submit").click(function() {
  urlv = base_url+'startdeal/deal_not_closed';
  var $this = $("#deal_not_closed_submit");
  $('.alert').slideUp();
  // var formDatapro = new FormData('#dealform');
    $.ajax({
        url : urlv,
        method : "POST",
        data : {
          sd_main_transact_id:$('#sd_main_transact_id').val()
        },
        beforeSend: function() {
          //$this.html(ing);
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
        },
        success :function(data){
          console.log(data);
          $('.ldr').remove();

          var json = JSON.parse(data);
          if(json.request_status == 'done'){
            Swal.fire({
              type: "success",
              title: 'Save!',
              text: 'Deal removed from saved deal list successfully.',
              confirmButtonClass: 'btn btn-success'
            }).then(function (result) {
              if (result.value) {
                window.location.href = base_url+'yourdeal';
              }
            })
          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">'+json.msg+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert);
            return false;
          }
        }
    });
});
