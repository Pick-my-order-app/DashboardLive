<?php 
error_reporting(0); 
if($_SESSION['status']['iswholseller'])
{ echo "hhh";
	$type="Users";
	$business_id=$_SESSION['status']['business_id'];
}
else
{  
	$type="Engineers";
	$business_id=$_SESSION['status']['business_id'];
}
if($business_id)
{
$bussindata=$this->db->query("select business_name from dev_business where id=$business_id");
$bussinessname=$bussindata->result_array();
$thenaame=$bussinessname[0]['business_name'];
}
else
{    
	$thenaame="Pickmyorder";    
}
?>
<!DOCTYPE html>
<!-- 
Theme: Keen - The Ultimate Bootstrap Admin Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: You must have a valid license purchased only from https://themes.getbootstrap.com/product/keen-the-ultimate-bootstrap-admin-theme/ in order to legally use the theme for your project.
-->
<html lang="en">

	<!-- begin::Head -->
	<head>

		<!--begin::Base Path (base relative path for assets of this page) -->
		<base href="../">

		<!--end::Base Path -->
		<meta charset="utf-8" />
		
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<!--begin::Fonts -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
		
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>

		<!--end::Fonts -->

		<!--begin::Page Vendors Styles(used by this page) -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link href="<?php echo base_url(); ?>/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

		<!--end::Page Vendors Styles -->

		<!--begin:: Global Mandatory Vendors -->
		<link href="<?php echo base_url(); ?>/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
		<link href="<?php echo base_url(); ?>/assets/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="<?php echo base_url(); ?>/assets/css/demo1/style.bundle.css" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->
		<link href="<?php echo base_url(); ?>/assets/css/demo1/skins/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/css/demo1/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/css/demo1/skins/brand/navy.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>/assets/css/demo1/skins/aside/navy.css" rel="stylesheet" type="text/css" />

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/media/logos/fevicon_iocn.png" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<!--<a href="<?php echo base_url(); ?>/demo1/index.html">
					<img alt="Logo" src="<?php echo base_url(); ?>//assets/media/logos/logo-6.png" />
				</a>-->
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>
		

		<!-- end:: Header Mobile -->

		<!-- begin:: Root -->
		<div class="kt-grid kt-grid--hor kt-grid--root">

			<!-- begin:: Page -->
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<!-- begin:: Aside -->
				<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>


				<!-- end:: Aside -->

				<!-- begin:: Wrapper -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

						<!-- begin:: Header Menu -->
						
						<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
						<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
						<?php if(isset($_SESSION['status'])){ if($_SESSION['status']['role']=='1') {?>
							<div id="kt_header_menu" >
							<?php $Get_Data_object = $this->db->query("select * from dev_business where iswholeapp='0'"); 
							   $Get_Data = $Get_Data_object->result_array(); ?>
							   
							<Select class="select_business" class="form-control"><option value="0">Contractors Apps</option><?php foreach($Get_Data as $Data) { ?>
							
							
							<option class="test" value="<?= $Data['id'];?>" <?php if(isset($_SESSION['Current_Business'])){if($Data['id']==$_SESSION['Current_Business']){?> selected <?php }} ?> ><?= $Data['business_name']; ?></option>
							<?php } ?></select>
								
								</ul>
							</div>
							<div id="kt_header_menu2" >
							<?php $Get_Data_object = $this->db->query("select * from dev_business where iswholeapp='1'"); 
							   $Get_Data=$Get_Data_object->result_array();
							?>
							
							<Select class="select_business repeatselect" class="form-control"><option value="0">Wholesaler Apps</option><?php foreach($Get_Data as $Data) { ?>
							
							<option value="<?= $Data['id'];?>" <?php if(isset($_SESSION['Current_Business'])){if($Data['id']==$_SESSION['Current_Business']){?> selected <?php }} ?> ><?= $Data['business_name']; ?></option>
							<?php } ?></select>
								
								</ul>
							</div>
						<?php } } ?>
						</div>

						<!-- end:: Header Menu -->

						<!-- begin:: Header Topbar -->
						<div class="kt-header__topbar">
						
							<!--end:: Languages -->

							<!--begin: User Bar -->
							<div class="customdivheader">
								

									<h5><?php echo $thenaame.' ';  if(isset($_SESSION['status'])){ if($_SESSION['status']['role']=='2') { echo "Admin";  }else{ echo "Super Admin";}}?> </h5>
									
										<!--<span class="kt-header__topbar-welcome kt-hidden-mobile">Hi <?php if(isset($_SESSION['status'])){ echo ucfirst($_SESSION['status']['name']); }?></span>-->
										

										
										
									
									<span>Welcome <b><?php if(isset($_SESSION['status'])){ echo ucfirst($_SESSION['status']['name']); }?></b></span> | <span><?php echo date('M d Y');?></span> | <a href="<?php echo site_url('logout'); ?>">Logout</a> | <a href="<?php echo base_url();?>"><i class="fa fa-globe" aria-hidden="true"></i></a>
								
								<!--<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-sm">
									<div class="kt-user-card kt-margin-b-40 kt-margin-b-30-tablet-and-mobile" style="background-image: url(<?php echo base_url(); ?>/assets/media/misc/head_bg_sm.jpg)">
										<div class="kt-user-card__wrapper">
											<div class="kt-user-card__pic">
												<img alt="Pic" src="<?php echo base_url(); ?>/assets/media/users/300_21.jpg" />
											</div>
											
										</div>
									</div>       
									<ul class="kt-nav kt-margin-b-10">
										
										<li class="kt-nav__item kt-nav__item--custom kt-margin-t-15">
											<a href="<?php echo site_url('logout'); ?>" target="_blank" class="btn btn-label-brand btn-upper btn-sm btn-bold">Sign Out</a>
										</li>
									</ul>
								</div>-->
							</div>

						</div>

						<!-- end:: Header Topbar -->
					</div>

					<!-- end:: Header -->
					<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

						<!-- begin:: Subheader -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">Dashboard</h3>
								<span class="kt-subheader__separator kt-hidden"></span>
								<div class="kt-subheader__breadcrumbs">
									<a href="#" class="kt-subheader__breadcrumbs-home">/</a>
									
									<span class="kt-subheader__breadcrumbs-link">
										<?php 
										
										//$take= ucfirst(trim($_SERVER['SCRIPT_URL'],'/'));
										
										$take = ucfirst(trim($_SERVER['PATH_INFO'],'/'));
										 
										 //$take = ucfirst(ltrim($_SERVER['REQUEST_URI'],'setup/AppLogin'));
										 
										if($take=='Editbusiness'){ echo "Edit Business";}
										else if($take=='Editusers'){ echo "Edit Users";}
										else if($take=='Edit_single_product'){ echo "Edit Single Product";}
										else if($take=='CatDetails'){ echo "Category Details";}
										else if($take=='SubCatDetails'){ echo "Sub Category Details";}
										else if($take=='Editsuppliers'){echo "Edit Suppliers";}
										else if($take=='Editengineer'){echo "Edit $type";}
										else if($take=='Editprojects'){echo "Edit Projects";}
										else if($take=='Variationpage'){echo "Variation Page";}
										else if($take=='Wholesaler'){echo "Users";}
										else if($take=='EditWholesaler'){echo "Edit User";}
										else if($take=='ManageOrder'){echo "Manage Order";}
										else if($take=='Categorylist'){echo "Category List";}
										else if($take=='Catinsidelist'){echo "Category of list";}
										else if($take=='CategoriesListTransfer'){echo "Categories List Transfer";}
										else if($take=='Cetalogues'){echo "Catalogues";}
										else if($take=='Engineer'){echo "$type";} 
										else{echo $take;} 
										?> </span>
								
								</div>
							</div>
							<!--<div class="kt-subheader__toolbar">
								<div class="kt-subheader__wrapper">
									
									<span  id="kt_dashboard_daterangepicker" data-toggle="kt-tooltip" title="" data-placement="left" data-original-title="Select dashboard daterange">
										<span class="kt-opacity-7" id="kt_dashboard_daterangepicker_title">Today:</span>&nbsp;
										<span class="kt-font-bold" id="kt_dashboard_daterangepicker_date"><?php echo date('M d');?></span>
										<i class="flaticon-calendar-with-a-clock-time-tools kt-padding-l-5 kt-padding-r-0"></i>
									</span>
								</div>
							</div>-->
						</div>

						<!-- end:: Subheader -->
<!----Boot model --->
 <div class="modal fade" id="myConModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Confirmation</h4>
		  <button type="button" class="close" data-dismiss="modal"></button>
        </div>
        <div class="modal-body">
       <p>Are you sure you want to delete this item?</p>
        </div>
        <div class="modal-footer">
         <a class="btn btn-default" id="deca" href="">Confirm</a>
	  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>
<!----bott model----->
