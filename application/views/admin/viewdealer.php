<!DOCTYPE html>
<html lang="en">
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
								<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true">
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
								<li class="kt-menu__item" aria-haspopup="true">
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
								<div class="col-xl-12 col-lg-12">
									<h3 class="kt-subheader__title">View Dealer Profile</h3>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-4 col-lg-4">
									<div class="profile_box">
										<div class="profile_box_body">
											<center><h3 id="dealer_img"><?php echo $memberdata->first_name.' '.$memberdata->last_name; ?></h3></center>
										</div>
									</div>
									<center>
										<button type="button" class="btn btn-md btn-label-success btn-bold" id="active" data-uid="<?php echo $memberdata->id ?>">Active</button>
										<button type="button" class="btn btn-md btn-label-danger btn-bold" id="deactive" data-uid="<?php echo $memberdata->id ?>">Deactive</button>
										 <button type="button" data-toggle="modal" data-target="#edit-profile" class="btn btn-md btn-label-primary btn-bold">Edit Profile</button>
									</center>
								</div>
								<div class="col-xl-8 col-lg-8">
									<div class="row">
										<div class="col-lg-12 col-md-12">
											<div class="profile_box">
												<div class="profile_box_body">
													<ul class="user_info row">
														<li class="user_info_li email col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">Email</span>
																<span class="user_info_ans"><?php echo $memberdata->email ?></span>
															</div>
														</li>
														<li class="user_info_li phone col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">Phone No.</span>
																<span class="user_info_ans"><?php echo $memberdata->phone ?></span>
															</div>
														</li>
														<li class="user_info_li company col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">Company</span>
																<span class="user_info_ans"><?php echo $memberdata->company_name ?></span>
															</div>
														</li>
														<li class="user_info_li website col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">Website</span>
																<span class="user_info_ans"><a href="<?php echo $memberdata->website ?>" target="_blank"><?php echo $memberdata->website ?></a></span>
															</div>
														</li>
														<li class="user_info_li address col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">Address</span>
																<span class="user_info_ans"><?php echo $memberdata->address ?></span>
															</div>
														</li>
														<li class="user_info_li address col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">City</span>
																<span class="user_info_ans"><?php echo $memberdata->city ?></span>
															</div>
														</li>
														<li class="user_info_li address col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">State</span>
																<span class="user_info_ans"><?php echo $memberdata->state ?></span>
															</div>
														</li>
														<li class="user_info_li address col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">Zip</span>
																<span class="user_info_ans"><?php echo $memberdata->zip ?></span>
															</div>
														</li>
														<li class="user_info_li company col-md-12">
															<div class="user_info_div">
																<span class="user_info_title">Package</span>

																<?php $packageData = $this->crud_model->filter_one("memberlogin_groups","id",$memberdata->group_id);
																if($packageData)
																	echo '<span class="user_info_ans">'.$packageData[0]['group_title'].'</span>';
																else
																	echo '<span class="user_info_ans">NA</span>'; 
																?>
															</div>
														</li>
														<li class="user_info_li type col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">Start Date</span>
																<span class="user_info_ans"><?php echo date('Y-d-m',strtotime($memberdata->created)) ?></span>
															</div>
														</li>
														<li class="user_info_li type col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">End Date</span>
																<span class="user_info_ans"><?php echo $memberdata->membership_expire ?></span>
															</div>
														</li>
													</ul>
												</div>
											</div>

											<div class="profile_box">
												<div class="profile_box_body">
													<ul class="user_info row">
														<li class="user_info_li email col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">For our everyday business purposes</span>
																<span class="user_info_ans"><?php echo $memberdata->ebd ?></span>
															</div>
														</li>
														<li class="user_info_li phone col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">For our marketing purposes</span>
																<span class="user_info_ans"><?php echo $memberdata->omp ?></span>
															</div>
														</li>
														<li class="user_info_li company col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">For joint marketing with other financial companies</span>
																<span class="user_info_ans"><?php echo $memberdata->jmf ?></span>
															</div>
														</li>
														<li class="user_info_li website col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">For our affiliates' everyday business purposes(information about your transactions and experiences)</span>
																<span class="user_info_ans"><a href="<?php echo $memberdata->website ?>" target="_blank"><?php echo $memberdata->aebt ?></a></span>
															</div>
														</li>
														<li class="user_info_li address col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">For our affiliates' everyday business purposes(information about your creditworthiness)</span>
																<span class="user_info_ans"><?php echo $memberdata->aebc ?></span>
															</div>
														</li>
														<li class="user_info_li address col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">For our affiliates to market to you</span>
																<span class="user_info_ans"><?php echo $memberdata->atm ?></span>
															</div>
														</li>
														<li class="user_info_li address col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">For nonaffiliates to market to you</span>
																<span class="user_info_ans"><?php echo $memberdata->natm ?></span>
															</div>
														</li>
														<li class="user_info_li address col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">Can Sharing Be Limited?</span>
																<span class="user_info_ans"><?php echo $memberdata->share ?></span>
															</div>
														</li>
														<li class="user_info_li company col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">Tax Rate</span>
																<span class="user_info_ans"><?php echo $memberdata->tax; ?></span>
															</div>
														</li>
														<li class="user_info_li type col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">Service Fee</span>
																<span class="user_info_ans"><?php echo $memberdata->dealer_fee; ?></span>
															</div>
														</li>
														<li class="user_info_li type col-md-6">
															<div class="user_info_div">
																<span class="user_info_title">Tag/Registration</span>
																<span class="user_info_ans"><?php echo $memberdata->dmv ?></span>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
		<?php $this->load->view('admin/common/footer');?>

					<!-- BEGIN: modal-->

					<!-- Modal-->
                    <div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="edit-profileLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                </div>
                                <form class="package_form" id="edit-profile-form">
                                	<div class="modal-body">
			                            <div class="form-body">
			                                <div class="row">

			                                	<div class="col-12">
			                                        <div class="form-group row">
			                                            <div class="col-lg-3 col-form-label text-right">
			                                                <h5 class="form_h5">First name</h5>
			                                            </div>
			                                            <div class="col-md-9">
			                                                <input type="text" id="firstname" class="form-control" name="firstname" placeholder="First name" value="<?php echo $memberdata->first_name?>">
			                                                <input type="hidden" name="memberid" value="<?php echo $memberdata->id ?>">
			                                            </div>
			                                        </div>
			                                    </div>

			                                    <div class="col-12">
			                                        <div class="form-group row">
			                                            <div class="col-lg-3 col-form-label text-right">
			                                                <h5 class="form_h5">Last name</h5>
			                                            </div>
			                                            <div class="col-md-9">
			                                                <input type="text" id="lastname" class="form-control" name="lastname" placeholder="Last name" value="<?php echo $memberdata->last_name?>">
			                                            </div>
			                                        </div>
			                                    </div>

			                                    <div class="col-12">
			                                        <div class="form-group row">
			                                            <div class="col-lg-3 col-form-label text-right">
			                                                <h5 class="form_h5">Email</h5>
			                                            </div>
			                                            <div class="col-md-9">
			                                                <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="<?php echo $memberdata->email?>">
			                                            </div>
			                                        </div>
			                                    </div>

			                                    <div class="col-12">
			                                        <div class="form-group row">
			                                            <div class="col-lg-3 col-form-label text-right">
			                                                <h5 class="form_h5">Phone No.</h5>
			                                            </div>
			                                            <div class="col-md-9">
			                                                <input type="text" id="phone" class="form-control" name="phone" placeholder="Phone No." value="<?php echo $memberdata->phone?>">
			                                            </div>
			                                        </div>
			                                    </div>

			                                    <div class="col-12">
			                                        <div class="form-group row">
			                                            <div class="col-lg-3 col-form-label text-right">
			                                                <h5 class="form_h5">Company</h5>
			                                            </div>
			                                            <div class="col-md-9">
			                                                <input type="text" id="company" class="form-control" name="company" placeholder="Company" value="<?php echo $memberdata->company_name?>">
			                                            </div>
			                                        </div>
			                                    </div>

			                                    <div class="col-12">
			                                        <div class="form-group row">
			                                            <div class="col-lg-3 col-form-label text-right">
			                                                <h5 class="form_h5">Website</h5>
			                                            </div>
			                                            <div class="col-md-9">
			                                                <input type="text" id="website" class="form-control" name="website" placeholder="Website" value="<?php echo $memberdata->website?>">
			                                            </div>
			                                        </div>
			                                    </div>

			                                    <div class="col-12">
			                                        <div class="form-group row">
			                                            <div class="col-lg-3 col-form-label text-right">
			                                                <h5 class="form_h5">Address</h5>
			                                            </div>
			                                            <div class="col-md-9">
			                                                <input type="text" id="address" class="form-control" name="address" placeholder="Address" value="<?php echo $memberdata->address?>">
			                                            </div>
			                                        </div>
			                                    </div>

			                                    <div class="col-12">
			                                        <div class="form-group row">
			                                            <div class="col-lg-3 col-form-label text-right">
			                                                <h5 class="form_h5">City</h5>
			                                            </div>
			                                            <div class="col-md-9">
			                                                <input type="text" id="city" class="form-control" name="city" placeholder="City" value="<?php echo $memberdata->city?>">
			                                            </div>
			                                        </div>
			                                    </div>

			                                    <div class="col-12">
			                                        <div class="form-group row">
			                                            <div class="col-lg-3 col-form-label text-right">
			                                                <h5 class="form_h5">State</h5>
			                                            </div>
			                                            <div class="col-md-9">
			                                                <select name="state" id="state" class="form-control">
																<?php foreach ($states as $key => $value) { ?>
											     					<option value="<?php echo $value['name'] ?>" <?php if($value['name'] == $memberdata->state) echo "selected"; ?>><?php echo $value['name'] ?></option>
											     				<?php } ?>
															</select>
			                                            </div>
			                                        </div>
			                                    </div>

			                                    <div class="col-12">
			                                        <div class="form-group row">
			                                            <div class="col-lg-3 col-form-label text-right">
			                                                <h5 class="form_h5">Zip</h5>
			                                            </div>
			                                            <div class="col-md-9">
			                                                <input type="text" id="zip" class="form-control" name="zip" placeholder="Zip" value="<?php echo $memberdata->zip?>">
			                                            </div>
			                                        </div>
			                                    </div>

			                                    <div class="col-12">
			                                        <div class="form-group row">
			                                            <div class="col-lg-3 col-form-label text-right">
			                                                <h5 class="form_h5">Package</h5>
			                                            </div>
			                                            <div class="col-md-9">
			                                            	<select class="form-control" id="package" name="package">
										                        <?php foreach ($packagedata as $key => $value) { ?>
											     					<option value="<?php echo $value['id'] ?>" <?php if($value['id'] == $memberdata->group_id) echo "selected"; ?>><?php echo $value['group_title'] ?></option>
											     				<?php } ?>
										                      </select>
			                                            </div>
			                                        </div>
			                                    </div>

			                                    <div class="col-12">
			                                        <div class="form-group row">
			                                            <div class="col-lg-3 col-form-label text-right">
			                                                <h5 class="form_h5">Start Date</h5>
			                                            </div>
			                                            <div class="col-md-9">
			                                                <input type="text" id="startdate" class="form-control pickadate" name="startdate" placeholder="Start Date" value="<?php echo date('Y-d-m',strtotime($memberdata->created)) ?>">
			                                            </div>
			                                        </div>
			                                    </div>

			                                    <div class="col-12">
			                                        <div class="form-group row">
			                                            <div class="col-lg-3 col-form-label text-right">
			                                                <h5 class="form_h5">End Date</h5>
			                                            </div>
			                                            <div class="col-md-9">
			                                                <input type="text" id="enddate" class="form-control pickadate" name="enddate" placeholder="End Date" value="<?php echo date('Y-d-m',strtotime($memberdata->membership_expire)) ?>">
			                                            </div>
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
			        <!-- END: modal-->
					
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