
"use strict";



function getviewdealer(ele) {
	var id = $(ele).parent().attr('id');
	window.location.href = base_url+'admin/viewdealer/'+id;
	// urlv =base_url+'inventoryarea/getInventoryDataFromId';
 //  	var $this = $(ele);

 //  	$.ajax({
 //        url : urlv,
 //        method : "POST",
 //        data : {id : inv_id},
 //        beforeSend: function() {
 //          $this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');  
 //        },
 //        success :function(data){
 //          $('.ldr').remove();         
 //          //console.log(data);
 //          var json = JSON.parse(data);
 //          //console.log(json[0].inv_vin);

 //          $('#view_inventory_info').modal('show');

 //          $('#view_inventoryinfo_vin').val(json[0].inv_vin);
 //          $('#view_inventoryinfo_year').val(json[0].inv_year);
 //          $('#view_inventoryinfo_make').val(json[0].inv_make);
 //          $('#view_inventoryinfo_model').val(json[0].inv_model);
 //          $('#view_inventoryinfo_style').val(json[0].inv_style);
 //          $('#view_inventoryinfo_stocknumber').val(json[0].inv_stock);
 //          $('#view_inventoryinfo_color').val(json[0].inv_color);
 //          $('#view_inventoryinfo_mileage').val(json[0].inv_mileage);
 //          $('#view_inventoryinfo_totalcost').val(json[0].inv_flrc);
 //          $('#view_inventoryinfo_stickerprice').val(json[0].inv_price);

 //        }
 //    });
}

$( "#add_package_form" ).submit(function( event ) { 
  
	var urlv = base_url+'admin/addpackage';
  	var $this = $(this);
  	$('.alert').slideUp();  

	var arrInfo = [];
	var i = 0;
 	$(".add_package_info").each(function(){
		arrInfo[i++] = $(this).val();
	});

  	//var formDatapro = new FormData(this);
    $.ajax({
        url : urlv,
        method : "POST",
        data : {
        	add_package_name: $("#add_package_name").val(),
        	add_package_price: $("#add_package_price").val(),
        	add_package_days: $("#add_package_days").val(),
        	add_package_status: $("input:radio.add_package_status:checked").val(),
        	add_package_info: serialize(arrInfo)
        },
        beforeSend: function() {
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');  
        },
        success :function(data){
          //console.log(data);
          $('.ldr').remove();         

          if(data == 'done'){
            $('.form_field').val('');
            var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<div class="alert-text">Package added successfully</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert); 
            setTimeout(location.reload(), 3000);
          
          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Package submission failed<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);   
            return false;          
          }
        }
    });

  event.preventDefault(); 
});

function geteditpackage(ele){
	var id = $(ele).parent().attr('id');
	// data-toggle="modal" data-target="#edit_package"

	var $this = $(this);
	var urlv =base_url+'admin/getpackagedataByid';
    $.ajax({
	    url : urlv,
	    method : "POST",
	    data : {id : id},
	    beforeSend: function() {
	      	$this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');  
		},
		success :function(data){
			$('.ldr').remove();         
		  	//console.log(data);
		  	var json = JSON.parse(data);
		  	var packageInfo = json.subscription_info;
		  	// console.log(packageInfo);
		  	$('#edit_package_info_div').html('');
		  	for (var i = 0; i < packageInfo.length; i++) {
			  // console.log(packageInfo[i]);
			  
			  	var html = $('<div data-repeater-item class="form-group row">'+
				'<div class="col-lg-10">'+
				'<input type="text" class="form-control edit_package_info" placeholder="Package Info" value="'+packageInfo[i]+'" required=""/>'+
				'</div>'+
				'<div class="col-lg-2">'+
				'<a href="javascript:;" data-repeater-delete="" class="btn font-weight-bold btn-danger btn-icon">'+
				'<i class="la la-remove"></i>'+
				'</a></div></div>');
				$('#edit_package_info_div').append(html);
			}

			$('#edit_package').modal('show');	
			
			$("#edit_package_id").val(json.id);
			$("#edit_package_name").val(json.group_title);
			$("#edit_package_price").val(json.subscription_fee);
			$("#edit_package_days").val(json.subscription_days);

			$("#edit_package_info_div").val();
			
			$('.edit_package_status[value="' + json.status + '"]').prop('checked', true);
		}
	});
	
}

function getdeletedealer(ele){
	var id = $(ele).parent().attr('id');
	// data-toggle="modal" data-target="#edit_package"

	var $this = $(this);
	var urlv =base_url+'admin/getdeletedataByid';

	swal.fire({
        title: 'Are you sure?',
        text: "Delete Dealer!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then(function(result){
        if (result.value) {
		    $.ajax({
			    url : urlv,
			    method : "POST",
			    data : {id : id},
			    beforeSend: function() {
			      	$this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');  
				},
				success :function(data){
					$('.ldr').remove();         
				  	//console.log(data);
				  	$('#row'+id).fadeOut('slow');
				  	swal.fire({
				        title: 'Delete!',
				        text: "Dealer has been deleted",
				        type: 'success'
				    });
				  	
				}
			});
		}
	})
}

$( "#edit_package_form" ).submit(function( event ) { 
  
	var urlv = base_url+'admin/editpackage';
  	var $this = $(this);
  	$('.alert').slideUp();  

	var arrInfo = [];
	var i = 0;
 	$(".edit_package_info").each(function(){
		arrInfo[i++] = $(this).val();
	});

  	//var formDatapro = new FormData(this);
    $.ajax({
        url : urlv,
        method : "POST",
        data : {
        	edit_package_id: $("#edit_package_id").val(),
        	edit_package_name: $("#edit_package_name").val(),
        	edit_package_price: $("#edit_package_price").val(),
        	edit_package_days: $("#edit_package_days").val(),
        	edit_package_status: $("input:radio.edit_package_status:checked").val(),
        	edit_package_info: serialize(arrInfo)
        },
        beforeSend: function() {
          $this.after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');  
        },
        success :function(data){
          //console.log(data);
          $('.ldr').remove();         

          if(data == 'done'){
            $('.form_field').val('');
            var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<div class="alert-text">Package edited successfully</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert); 
            setTimeout(location.reload(), 3000);
          
          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Package update failed<br> '+data+'</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
           $this.after(alert);   
            return false;          
          }
        }
    });

  event.preventDefault(); 
});

$( "#edit-profile-form" ).submit(function( event ) { 
  
	var urlv = base_url+'admin/editprofileform';
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
          // console.log(data);
          $('.ldr').remove();         

          if(data == 'done'){
            $('.form_field').val('');
            var alert = $('<div class="alert alert-success alert-dismissible" role="alert">'+
              '<div class="alert-text">Profile edited successfully</div>'+
              '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div>'+
            '</div>');
            $this.after(alert); 
            setTimeout(location.reload(), 3000);
          
          }else{
            var alert = $('<div class="alert alert-danger alert-dismissible" role="alert">'+
              '<div class="alert-text">Profile edited failed<br> '+data+'</div>'+
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

	var KTDatatablesAdvancedColumnRendering = {
	init: function () {
		$("#dealer_table").DataTable({
			dom: "<'row'<'col-sm-12 col-md-6'f><'col-sm-12 col-md-6'B>>" +
              "<'row'<'col-sm-12'tr>>" +
              "<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-3'i><'col-sm-12 col-md-6'p>>",
			responsive: true,
			paging: !0,
			lengthMenu: [
	            [ 10, 25, 50, -1 ],
	            [ '10', '25', '50', 'Show all' ]
	        ],
	        buttons: [
	            {
	              extend: 'pdfHtml5',
	              title: 'Dealer List',
	              exportOptions: {
	                  columns: [ 0, 2, 3, 4, 5, 6, 7, 8 ]
	              }
	            }
	        ],
			columnDefs: [{
				targets: 1,
				title: "Dealer",
				render: function (t, a, e, s) {
					return '\t\t\t\t\t\t\t<div class="d-flex align-items-center">\t\t\t\t\t\t\t<div class="symbol symbol-50 symbol-light-' + ["success", , "danger", "success", "warning", "dark", "primary", "info"][KTUtil.getRandomInt(0, 6)] + '" flex-shrink-0">\t\t\t\t\t\t\t<div class="symbol-label font-size-h5">' + e[2].substring(0, 1) + '</div>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t<div class="ml-3">\t\t\t\t\t\t\t<span class="text-dark-75 font-weight-bold line-height-sm d-block pb-2">' + e[2] + '</span>\t\t\t\t\t\t\t<a href="#" class="text-muted text-hover-primary">' + e[3] + '</a>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t</div>'
				}
			}, {
                "targets": [ 2, 3 ],
                "visible": false
            }
            , {
				targets: -1,
				title: "Actions",
				orderable: !1,
				render: function (t, a, e, s) {
					return '\t\t\t\t\t\t\t<a href="javascript:;" onclick="getviewdealer(this)" class="btn btn-sm btn-clean btn-icon" title="Edit details">\t\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t\t</a>\t\t\t\t\t\t\t<a href="javascript:;" onclick="getdeletedealer(this)" class="btn btn-sm btn-clean btn-icon" title="Delete details">\t\t\t\t\t\t\t\t<i class="la la-trash-o"></i>\t\t\t\t\t\t\t</a>'
				}
			}
			// , {
			// 	targets: 7,
			// 	render: function (t, a, e, s) {
			// 		var l = {
			// 			1: {
			// 				title: "Free",
			// 				class: " label-light-warning"	
			// 			},
			// 			2: {
			// 				title: "Monthly",
			// 				class: " label-light-info"
			// 			},
			// 			3: {
			// 				title: "Yearly",
			// 				class: " label-light-primary"
			// 			},
			// 			4: {
			// 				title: "Additional Services",
			// 				class: " label-light-success"
			// 			}
			// 		};
			// 		return void 0 === l[t] ? t : '<span class="label label-lg font-weight-bold' + l[t].class + ' label-inline">' + l[t].title + "</span>"
			// 	}
			// }, {
			// 	targets: 8,
			// 	render: function (t, a, e, s) {
			// 		var l = {
			// 			1: {
			// 				title: "Deactive",
			// 				state: "danger"
			// 			},
			// 			2: {
			// 				title: "Active",
			// 				state: "success"
			// 			}
			// 		};
			// 		return void 0 === l[t] ? t : '<span class="label label-' + l[t].state + ' label-dot mr-2"></span><span class="font-weight-bold text-' + l[t].state + '">' + l[t].title + "</span>"
			// 	}
			// }
			]
		}), $("#kt_datatable_search_status").on("change", function () {
			datatable.search($(this).val().toLowerCase(), "Status")
		}), $("#kt_datatable_search_type").on("change", function () {
			datatable.search($(this).val().toLowerCase(), "Type")
		}), $("#kt_datatable_search_status, #kt_datatable_search_type").selectpicker()
	}
};
jQuery(document).ready(function () {
	KTDatatablesAdvancedColumnRendering.init()
});

$('#active').click(function(e) {
	var id = $(this).attr('data-uid');
    swal.fire({
        title: 'Are you sure?',
        text: "Dealer Actived!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Actived it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then(function(result){
        if (result.value) {
        	var $this = $(this);
			var urlv =base_url+'admin/getDealerActive';
        	$.ajax({
		        url : urlv,
		        method : "POST",
		        data : {id : id},
		        beforeSend: function() {
		          $this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');  
		        },
		        success :function(data){
		        	$('.ldr').remove();         
		          	//console.log(data);
		        	swal.fire(
	                	'Successfully!',
	                	'Dealer Actived!.',
	                	'success'
	            	)
		        }
		    });
            
            // result.dismiss can be 'cancel', 'overlay',
            // 'close', and 'timer'
        } else if (result.dismiss === 'cancel') {
            swal.fire(
                'Cancelled',
                'Dealer Not Actived :)',
                'error'
            )
        }
    });
});

$('#deactive').click(function(e) {
	var id = $(this).attr('data-uid');
    swal.fire({
        title: 'Are you sure?',
        text: "Dealer Deactived!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Deactived it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then(function(result){
        if (result.value) {
        	var $this = $(this);
            var urlv = base_url+'admin/getDealerDeactive';
        	$.ajax({
		        url : urlv,
		        method : "POST",
		        data : {id : id},
		        beforeSend: function() {
		          $this.parent().find('a:last-child').after('<div class="ldr"><i class="fa fa-circle-o-notch fa-spin"></i></div>');  
		        },
		        success :function(data){
		        	$('.ldr').remove();         
		          	//console.log(data);
		          	//console.log(json[0].inv_vin);
		        	swal.fire(
	                	'Successfully!',
	                	'Dealer Actived!.',
	                	'success'
	            	)
		        }
		    });
            // result.dismiss can be 'cancel', 'overlay',
            // 'close', and 'timer'
        } else if (result.dismiss === 'cancel') {
            swal.fire(
                'Cancelled',
                'Dealer Not Deactived :)',
                'error'
            )
        }
    });
});

"use strict";
var KTDatatablespackagetable = {
	init: function () {
		$("#package_table").DataTable({
			dom: "<'row'<'col-sm-12 col-md-6'f><'col-sm-12 col-md-6'B>>" +
              "<'row'<'col-sm-12'tr>>" +
              "<'row'<'col-sm-12 col-md-3'l><'col-sm-12 col-md-3'i><'col-sm-12 col-md-6'p>>",
			responsive: true,
			paging: !0,
			lengthMenu: [
	            [ 10, 25, 50, -1 ],
	            [ '10', '25', '50', 'Show all' ]
	        ],
	        buttons: [
	            {
	              extend: 'pdfHtml5',
	              title: 'Package List',
	              exportOptions: {
	                  columns: [ 0, 1, 2, 3, 4 ]
	              }
	            }
	        ],
			columnDefs: [ {
				targets: -1,
				title: "Actions",
				orderable: !1,
				render: function (t, a, e, s) {
					return '\t\t\t\t\t\t\t<a href="javascript:;" onclick="geteditpackage(this)" class="btn btn-sm btn-clean btn-icon" title="Edit details">\t\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t\t</a>'
				}
			}
			// , {
			// 	targets: 4,
			// 	render: function (t, a, e, s) {
			// 		var l = {
			// 			1: {
			// 				title: "Deactive",
			// 				state: "danger"
			// 			},
			// 			2: {
			// 				title: "Active",
			// 				state: "success"
			// 			}
			// 		};
			// 		return void 0 === l[t] ? t : '<span class="label label-' + l[t].state + ' label-dot mr-2"></span><span class="font-weight-bold text-' + l[t].state + '">' + l[t].title + "</span>"
			// 	}
			// }
			]
		}), $("#kt_datatable_search_status").on("change", function () {
			datatable.search($(this).val().toLowerCase(), "Status")
		}), $("#kt_datatable_search_type").on("change", function () {
			datatable.search($(this).val().toLowerCase(), "Type")
		}), $("#kt_datatable_search_status, #kt_datatable_search_type").selectpicker()
	}
};
jQuery(document).ready(function () {
	KTDatatablespackagetable.init()
});
// data-toggle="modal" data-target="#edit_package"

$('#dealer_img').each(function() {
  var str = $(this).text();
  var matches = str.match(/\b(\w)/g);  
  var acronym = matches.join(''); 
  $(this).prepend('<div class="symbol symbol-100 symbol-light-primary"><div class="symbol-label font-size-h1">' + acronym + '</div></div>');
  
})


var KTFormadd_package_info = function() {
    var add_package_info = function() {
        $('#add_package_info').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            }
        });
    }
    return {
        // public functions
        init: function() {
            add_package_info();
        }
    };
}();
jQuery(document).ready(function() {
    KTFormadd_package_info.init();
});

var KTFormedit_package_info = function() {
    var edit_package_info = function() {
        $('#edit_package_info').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            }
        });
    }
    return {
        // public functions
        init: function() {
            edit_package_info();
        }
    };
}();
jQuery(document).ready(function() {
    KTFormedit_package_info.init();
});

$('#add_package').click(function(e) {
    swal.fire({
        title: 'Add',
        text: "Package add Successfully!",
        type: 'success'
    });
});

$('#save_package').click(function(e) {
    swal.fire({
        title: 'Update',
        text: "Package infomation Update!",
        type: 'success'
    });
});

