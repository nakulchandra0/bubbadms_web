<!DOCTYPE html>
<html lang="en">
	<!-- begin::Head -->
	<head>
		<base href="">
		<meta charset="utf-8" />
		<title>Bubba Billing Dashbord</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Roboto:300,400,500,600,700">
		<link href="<?php echo base_url(); ?>assets/back/style.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/back/media/favicon.png" />
		
		<?php $this->load->view('admin/common/seo');?>

	</head>
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="<?php echo base_url(); ?>admin/dealer">
				<img alt="Logo" src="<?php echo base_url(); ?>assets/back/media/logo.png" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
					<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
						<div class="kt-aside__brand-logo">
							<a href="<?php echo base_url(); ?>admin/dealer">
							<img alt="Logo" src="<?php echo base_url(); ?>assets/back/media/logo.png" />
							</a>
						</div>
						<div class="kt-aside__brand-tools">
							<button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
											<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
										</g>
									</svg>
								</span>
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
											<path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
										</g>
									</svg>
								</span>
							</button>
						</div>
					</div>
					<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
						<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
							<ul class="kt-menu__nav ">
								<li class="kt-menu__item" aria-haspopup="true">
									<a href="<?php echo base_url(); ?>admin/dealer" class="kt-menu__link ">
										<span class="kt-menu__link-icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24"/>
													<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
													<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
												</g>
											</svg>
										</span>
										<span class="kt-menu__link-text">Dealer</span>
									</a>
								</li>
								<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
									<a href="<?php echo base_url(); ?>admin/package" class="kt-menu__link ">
										<span class="kt-menu__link-icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											        <rect x="0" y="0" width="24" height="24"/>
											        <path d="M5.84026576,8 L18.1597342,8 C19.1999115,8 20.0664437,8.79732479 20.1528258,9.83390904 L20.8194924,17.833909 C20.9112219,18.9346631 20.0932459,19.901362 18.9924919,19.9930915 C18.9372479,19.9976952 18.8818364,20 18.8264009,20 L5.1735991,20 C4.0690296,20 3.1735991,19.1045695 3.1735991,18 C3.1735991,17.9445645 3.17590391,17.889153 3.18050758,17.833909 L3.84717425,9.83390904 C3.93355627,8.79732479 4.80008849,8 5.84026576,8 Z M10.5,10 C10.2238576,10 10,10.2238576 10,10.5 L10,11.5 C10,11.7761424 10.2238576,12 10.5,12 L13.5,12 C13.7761424,12 14,11.7761424 14,11.5 L14,10.5 C14,10.2238576 13.7761424,10 13.5,10 L10.5,10 Z" fill="#000000"/>
											        <path d="M10,8 L8,8 L8,7 C8,5.34314575 9.34314575,4 11,4 L13,4 C14.6568542,4 16,5.34314575 16,7 L16,8 L14,8 L14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 C10.4477153,6 10,6.44771525 10,7 L10,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
											    </g>
											</svg>
										</span>
										<span class="kt-menu__link-text">Package</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
						<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
						</div>
						<div class="kt-header__topbar">
							<div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper">
									<div class="kt-header__topbar-user">
										<a href="<?php echo base_url(); ?>admin/logout"><span class="kt-header__topbar-username kt-hidden-mobile">Log Out</span></a>
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path d="M7.62302337,5.30262097 C8.08508802,5.000107 8.70490146,5.12944838 9.00741543,5.59151303 C9.3099294,6.05357769 9.18058801,6.67339112 8.71852336,6.97590509 C7.03468892,8.07831239 6,9.95030239 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,9.99549229 17.0108275,8.15969002 15.3875704,7.04698597 C14.9320347,6.73472706 14.8158858,6.11230651 15.1281448,5.65677076 C15.4404037,5.20123501 16.0628242,5.08508618 16.51836,5.39734508 C18.6800181,6.87911023 20,9.32886071 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,9.26852332 5.38056879,6.77075716 7.62302337,5.30262097 Z" fill="#fd397a" fill-rule="nonzero"/>
												<rect fill="#fd397a" opacity="0.8" x="11" y="3" width="2" height="10" rx="1"/>
											</g>
										</svg>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
							<div class="row">
								<div class="col-xl-12 col-lg-12 order-lg-3 order-xl-1">
									<div class="kt-portlet kt-portlet--height-fluid">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
													Package
												</h3>
											</div>
											<button type="button" class="btn btn-primary add_btn" data-toggle="modal" data-target="#add_package_info">Add New Package</button>
										</div>
										<div class="kt-portlet__body">
											<table class="table table-separate table-head-custom table-hover table-checkable" id="package_table">
												<thead>
													<tr>
														<th>ID</th>
														<th>Name</th>
														<th>Price</th>
														<th>Days</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>	
													<?php $no=1; foreach ($packagedata as $key => $value) { ?>
													
													<tr>
														<td><?php echo $no++; ?></td>
														<td><?php echo $value['group_title']; ?></td>
														<td><?php if($value['subscription_fee'] == 0.00) echo "Free"; else echo '$'.$value['subscription_fee']; ?></td>
														<td><?php echo $value['subscription_days']; ?> Days</td>
														<td>
															<?php if($value['status'] == "T"){ ?>
																<span class="label label-success label-dot mr-2"></span>
																<span class="font-weight-bold text-success">Active</span>
															<?php }else{ ?>
																<span class="label label-danger label-dot mr-2"></span>
																<span class="font-weight-bold text-danger">Deactive</span>
															<?php } ?>
														</td>
														<td nowrap id="<?php echo $value['id']?>"></td>
													</tr>
													
													<?php } ?>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php $this->load->view('admin/common/footer');?>
					

					<!-- Modal-->
                    <div class="modal fade" id="add_package_info" tabindex="-1" role="dialog" aria-labelledby="add_packageLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Package</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                </div>
                                <form class="package_form" id="add_package_form">
                                	<div class="modal-body">
								        <div class="card-body">
								            <div class="form-group row">
								                <label class="col-lg-3 col-form-label text-right">Package Name:</label>
								                <div class="col-lg-9">
								                    <input type="text" class="form-control" name="add_package_name" id="add_package_name" placeholder="Package Name" required="" />
								                </div>
								            </div>
								            <div class="form-group row">
								                <label class="col-lg-3 col-form-label text-right">Package Price:</label>
								                <div class="col-lg-9">
								                    <input type="text" class="form-control" name="add_package_price" id="add_package_price" placeholder="Package Price" onkeypress="return isFloatNumber(this,event)" required="" />
								                </div>
								            </div>
								            <div class="form-group row">
								                <label class="col-lg-3 col-form-label text-right">Package Days:</label>
								                <div class="col-lg-9">
								                    <input type="number" class="form-control" name="add_package_days" id="add_package_days"  placeholder="Package Days" required="" />
								                </div>
								            </div>
								            <div id="add_package_info">
								                <div class="form-group row">
								                    <label class="col-lg-3 col-form-label text-right">Package Info:</label>
								                    <div data-repeater-list="" class="col-lg-9">
								                        <div data-repeater-item class="form-group row">
								                            <div class="col-lg-10">
											                    <input type="text" class="form-control add_package_info" placeholder="Package Info" required="" />
											                </div>
								                            <div class="col-lg-2">
								                                <a href="javascript:;" data-repeater-delete="" class="btn font-weight-bold btn-danger btn-icon">
								                                    <i class="la la-remove"></i>
								                                </a>
								                            </div>
								                        </div>
								                    </div>
								                </div>
								                <div class="form-group row">
								                    <div class="col-lg-3"></div>
								                    <div class="col">
								                        <div data-repeater-create="" class="btn font-weight-bold btn-primary">
								                            <i class="la la-plus"></i>
								                            Add
								                        </div>
								                    </div>
								                </div>
								            </div>
								            <div class="form-group row">
								                <label class="col-lg-3 col-form-label text-right">Package Status:</label>
								                <div class="col-lg-9">
								                    <div class="radio-inline mt-3">
						                                <label class="radio radio-success">
						                                    <input type="radio" name="package_status" class="add_package_status" value="T" checked=""> Active
						                                    <span></span>
						                                </label>
						                                <label class="radio radio-danger">
						                                    <input type="radio" name="package_status" class="add_package_status" value="F"> Deactive
						                                    <span></span>
						                                </label>
						                            </div>
								                </div>
								            </div>
								        </div>
                                	</div>
	                                <div class="modal-footer">
	                                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
	                                    <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
	                                    <!-- data-dismiss="modal" id="add_package" -->
	                                </div>
								</form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal-->
                    <div class="modal fade" id="edit_package" tabindex="-1" role="dialog" aria-labelledby="add_packageLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Package</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                </div>
                                <form class="package_form" id="edit_package_form">
                                	<div class="modal-body">
								        <div class="card-body">
								        	<input type="hidden" name="edit_package_id" id="edit_package_id">
								            <div class="form-group row">
								                <label class="col-lg-3 col-form-label text-right">Package Name:</label>
								                <div class="col-lg-9">
								                    <input type="text" class="form-control" placeholder="Package Name" name="edit_package_name" id="edit_package_name" value="Free" required="" />
								                </div>
								            </div>
								            <div class="form-group row">
								                <label class="col-lg-3 col-form-label text-right">Package Price:</label>
								                <div class="col-lg-9">
								                    <input type="text" class="form-control" placeholder="Package Price" name="edit_package_price" id="edit_package_price" value="Free" onkeypress="return isFloatNumber(this,event)" required="" />
								                </div>
								            </div>
								            <div class="form-group row">
								                <label class="col-lg-3 col-form-label text-right">Package Days:</label>
								                <div class="col-lg-9">
								                    <input type="number" class="form-control" placeholder="Package Days" name="edit_package_days" id="edit_package_days" value="30 Days" required="" />
								                </div>
								            </div>
								            <div id="edit_package_info">
								                <div class="form-group row">
								                    <label class="col-lg-3 col-form-label text-right">Package Info:</label>
								                    <div data-repeater-list="" class="col-lg-9" id="edit_package_info_div">
								                    	<div  data-repeater-item class="form-group row">
								                            <div class="col-lg-10">
											                    <input type="text" class="form-control edit_package_info" placeholder="Package Info" />
											                </div>
								                            <div class="col-lg-2">
								                                <a href="javascript:;" data-repeater-delete="" class="btn font-weight-bold btn-danger btn-icon">
								                                    <i class="la la-remove"></i>
								                                </a>
								                            </div>
								                        </div>
								                        <div data-repeater-item class="form-group row">
								                            <div class="col-lg-10">
											                    <input type="text" class="form-control edit_package_info" placeholder="Package Info" />
											                </div>
								                            <div class="col-lg-2">
								                                <a href="javascript:;" data-repeater-delete="" class="btn font-weight-bold btn-danger btn-icon">
								                                    <i class="la la-remove"></i>
								                                </a>
								                            </div>
								                        </div>
								                    </div>
								                </div>
								                <div class="form-group row">
								                    <div class="col-lg-3"></div>
								                    <div class="col">
								                        <div data-repeater-create="" class="btn font-weight-bold btn-primary">
								                            <i class="la la-plus"></i>
								                            Add
								                        </div>
								                    </div>
								                </div>
								            </div>
								            <div class="form-group row">
								                <label class="col-lg-3 col-form-label text-right">Package Status:</label>
								                <div class="col-lg-9">
								                    <div class="radio-inline mt-3">
						                                <label class="radio radio-success">
						                                    <input type="radio" name="package_status" class="edit_package_status" value="T"> Active
						                                    <span></span>
						                                </label>
						                                <label class="radio radio-danger">
						                                    <input type="radio" name="package_status" class="edit_package_status" value="F"> Deactive
						                                    <span></span>
						                                </label>
						                            </div>
								                </div>
								            </div>
								        </div>
                                	</div>
                                	<div class="modal-footer">
                                    	<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                    	<button type="submit" class="btn btn-primary font-weight-bold" >Save changes</button>
                                    	<!-- data-dismiss="modal" id="save_package" -->
                                	</div>
                                </form>
                            </div>
                        </div>
                    </div>

				</div>
			</div>
		</div>
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"dark": "#282a3c",
						"light": "#ffffff",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": [
							"#c5cbe3",
							"#a1a8c3",
							"#3d4465",
							"#3e4466"
						],
						"shape": [
							"#f0f3ff",
							"#d9dffa",
							"#afb4d4",
							"#646c9a"
						]
					}
				}
			};
		</script>
		<?php $this->load->view('admin/common/footer-script');?>
	</body>
</html>