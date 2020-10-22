<?php
    
	if(isset($_SESSION['Current_Business']))
    { 
	$bid=$_SESSION['Current_Business'];
	}
	else
	{
	$bid=$_SESSION['status']['business_id'];
	}
	$current_year=date("Y");
	$productids=array();
	$jan=0;$feb=0;$mar=0;$apr=0;$may=0;$jun=0;$jul=0;$aug=0;$sep=0;$oct=0;$nov=0;$dec=0;
	$jan1=0;$feb1=0;$mar1=0;$apr1=0;$may1=0;$jun1=0;$jul1=0;$aug1=0;$sep1=0;$oct1=0;$nov1=0;$dec1=0;
	$All_orders= $this->db->Query("select *from dev_orders where business_id='$bid' && status='0'");
	$orderbymonths= $this->db->Query("SELECT MONTH(`date`) as mon,count(*) as o FROM `dev_orders` where YEAR(`date`)='$current_year' && business_id='$bid' && status='0' group by MONTH(`date`)");
	$All_orders_array=$orderbymonths->result_array();
	$productmonths=$this->db->Query("SELECT MONTH(`dateandtime`) as m,count(*) as p FROM `dev_products` where YEAR(`dateandtime`)='$current_year' && business_id='$bid'  group by MONTH(`dateandtime`)");
	$productmonths_array=$productmonths->result_array();
	$All_Supplier= $this->db->Query("select *from dev_supplier where business_id='$bid'");	
	$All_Engineers= $this->db->Query("select *from dev_engineer where business_id='$bid'");	
	$most_orders=$this->db->query("select id from dev_orders where business_id='$bid' && status='0'");
	if($bid=='0')
	{
	$All_orders= $this->db->Query("select *from dev_orders where status='0'");
	$orderbymonths= $this->db->Query("SELECT MONTH(`date`) as mon,count(*) as o FROM `dev_orders` where YEAR(`date`)='$current_year'  group by MONTH(`date`)");
	$All_orders_array=$orderbymonths->result_array();
	$productmonths=$this->db->Query("SELECT MONTH(`dateandtime`) as m,count(*) as p FROM `dev_products` where YEAR(`dateandtime`)='$current_year'  group by MONTH(`dateandtime`)");
	$productmonths_array=$productmonths->result_array();
	$All_Supplier= $this->db->Query("select *from dev_supplier ");	
	$All_Engineers= $this->db->Query("select *from dev_engineer ");	
	$most_orders=$this->db->query("select id from dev_orders where status='0'");
	}
	
/********************************order by year and month of a business*******************************/
	foreach($All_orders_array as $numbersoforder)
    {
	    $month=$numbersoforder[mon];
		if($month=="1"){ $jan=$numbersoforder[o]; }    
		if($month=="2"){ $feb=$numbersoforder[o]; }  
		if($month=="3"){ $mar=$numbersoforder[o]; }  
		if($month=="4"){ $apr=$numbersoforder[o]; }  
		if($month=="5"){ $may=$numbersoforder[o]; }  
		if($month=="6"){ $jun=$numbersoforder[o]; }  
		if($month=="7"){ $jul=$numbersoforder[o]; }  
		if($month=="8"){ $aug=$numbersoforder[o]; }  
		if($month=="9"){ $sep=$numbersoforder[o]; }  
		if($month=="10"){ $oct=$numbersoforder[o];}  
		if($month=="11"){ $nov=$numbersoforder[o];}  
		if($month=="12"){ $dec=$numbersoforder[o];}  
	}
/********************************order by year and month of a business*******************************/	
	foreach($productmonths_array as $numbersofproduct)
    {
		
	    $month=$numbersofproduct[m];
		if($month=="1"){ $jan1=$numbersofproduct[p]; }    
		if($month=="2"){ $feb1=$numbersofproduct[p]; }  
		if($month=="3"){ $mar1=$numbersofproduct[p]; }  
		if($month=="4"){ $apr1=$numbersofproduct[p]; }  
		if($month=="5"){ $may1=$numbersofproduct[p]; }  
		if($month=="6"){ $jun1=$numbersofproduct[p]; }  
		if($month=="7"){ $jul1=$numbersofproduct[p]; }  
		if($month=="8"){ $aug1=$numbersofproduct[p]; }  
		if($month=="9"){ $sep1=$numbersofproduct[p]; }  
		if($month=="10"){ $oct1=$numbersofproduct[p]; }  
		if($month=="11"){ $nov1=$numbersofproduct[p]; }  
		if($month=="12"){ $dec1=$numbersofproduct[p]; }  
	}
/********************************Top rated products of a business************************************/
   $idsfor=$most_orders->result_array();
   foreach($idsfor as $current)
   {
	  $orderid=$current['id'];
	   $most_product_order=$this->db->query("select product_id from dev_single_order where Reffrence_id='$orderid'");
	   $Allproducts=$most_product_order->result_array();
	   foreach($Allproducts as $single)
	   {
		  
		  array_push($productids,$single['product_id']);
	   }
   }
  
   $howmanytimeandwho = array_count_values($productids);
/*************************************************close************************************************/
  
  
?>
<div class="container">
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--begin::Dashboard 1-->
        <!--begin::Row-->
        <div class="row">

            <div class="col-lg-12">
                <div class="kt-portlet sec-dashboard">

                    <div class="select-sec">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Select Date Range</label>
                            <div class="col-sm-4">
                                <select class="form-control days">
                                    <option value="0" selected disabled>---Select---</option>
                                    <option value="60">Last 60 days</option>
                                    <option value="30">Last 30 days</option>
                                    <option value="14">Last 14 days</option>
                                    <option value="7">Last 7 days</option>
                                   
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="kt-portlet sec-dashboard">

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="kt-widget-15__info">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="btn btn-icon btn-sm  btn-success"><i class="fa fa-shopping-cart"></i>
                                        </div>
                                    </div>

                                    <div class="col-lg-8">
                                        <div class="kt-widget-15__info--item">

                                             Orders <span id="hiddenorderbydate"></span>
                                            <br>
                                            <span id="hidordernumber"><?php print_r($All_orders->num_rows());?><span>

								</div></div>
							</div>
	</div>
		</div>
	<div class="col-lg-4">
<div class="kt-widget-15__info">
<div class="row">
							<div class="col-lg-4 ">	
								<div  class="btn btn-icon btn-sm  btn-success"><i class="far fa-user"></i></div> </div> 
								<div class="col-lg-8 ">	<div  class="kt-widget-15__info--item">Total Engineer<br>
								<span><?php print_r($All_Supplier->num_rows());?><span>
</div>
							</div>
	</div>
	</div>
	</div>
	<div class="col-lg-4">
<div class="kt-widget-15__info">
<div class="row">
							<div class="col-lg-4 ">
								<div  class="btn btn-icon btn-sm  btn-success"><i class="fas fa-parachute-box"></i></div>
</div>								
							<div class="col-lg-8">	<div  class="kt-widget-15__info--item">Total Suppliers<br>
								<span><?php print_r($All_Engineers->num_rows());?><span>
</div>
							</div></div>
	</div>
	</div></div>
	</div>

<!--end::Portlet-->	</div>

<div class="col-lg-12">
                    

                             <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Top Ordered Product <span id="topratedpro"></span></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Description</th>
                      <th>Sku</th>
                      <th>Net</th>
                      <th>Sale</th>
                      
                    </tr>
                  </thead>
                  <tbody id="pdbody">
                   <?PHP 
	  foreach($howmanytimeandwho as $key=>$thisval)
		{
			if($thisval>1)
			{
			$mostproduct= $this->db->Query("select *from dev_products where id='$key'");
			$product_array=$mostproduct->result_array();
			foreach($product_array as $pro){
	  ?>
        <tr>
          <td><img width="30px" height="30px" src="<?php echo $pro['products_images'];?>"></td>
          <td><?php echo $pro['title'];?>t</td>
          <td><?php echo $pro['SKU']; ?></td>
		   <td><?php echo $pro['ex_vat'];?></td>
		     <td><?php echo $pro['inc_vat'];?></td>
          
        
        </tr>
			<?php }} 
	      }?>
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>

                  
                    <!--end::Portlet-->
                </div>
	<div class="col-lg-6">
		<!--begin::Portlet-->
<div class="kt-portlet kt-portlet--height-fluid">
	<div class="kt-portlet__head  kt-portlet__head--noborder">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title"></h3>
		</div>
		
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fluid">
                          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        </div>
                    </div>
					</div>
              
                <div class="col-lg-6">
                    <!--begin::Portlet-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__head  kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title"></h3>
                            </div>
                   
                        </div>
                        <div class="kt-portlet__body kt-portlet__body--fluid">
                             <div id="chartProductContainer" style="height: 370px; width: 100%;"></div>
                        </div>
                    </div>
                    <!--end::Portlet-->
                </div>

            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row">

               

                <!----<div class="col-lg-12 col-xl-8 order-lg-2 order-xl-1">

<div class="kt-portlet kt-portlet--height-fluid-half kt-widget-14">
	<div class="kt-portlet__body">

		<div id="kt-widget-slider-14-1" class="kt-slider carousel slide" data-ride="carousel" data-interval="8000">
			<div class="kt-slider__head">
				<div class="kt-slider__label">New Products</div>
				<div class="kt-slider__nav">
					<a class="kt-slider__nav-prev carousel-control-prev" href="#kt-widget-slider-14-1" role="button" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a class="kt-slider__nav-next carousel-control-next" href="#kt-widget-slider-14-1" role="button" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item">
					<div class="kt-widget-14__body">
						<div class="kt-widget-14__product">
							<div class="kt-widget-14__thumb">
								<a href="#"><img src="/keen/themes/keen/theme/demo1/dist/assets/media/blog/1.jpg" class="kt-widget-14__image--landscape" alt="" title=""></a>
							</div>
							<div class="kt-widget-14__content">
								<a href="#"><h3 class="kt-widget-14__title">Active Smartwatch</h3></a>
								<div class="kt-widget-14__desc">
									Beautifully designed watch that helps you track your fitness and diet – while keeping you motivated!
								</div>
							</div>
						</div>
						<div class="kt-widget-14__data">
							<div class="kt-widget-14__info">
								<div class="kt-widget-14__info-title kt-font-brand">246</div>
								<div class="kt-widget-14__desc">Purchases</div>
							</div>
							<div class="kt-widget-14__info">
								<div class="kt-widget-14__info-title">37</div>
								<div class="kt-widget-14__desc">Reviews</div>
							</div>
						</div>
					</div>
					<div class="kt-widget-14__foot">
						<div class="kt-widget-14__foot-info">
							<div class="kt-widget-14__foot-label btn btn-sm btn-label-brand btn-bold">
								24 Nov, 2018
							</div> 
							<div class="kt-widget-14__foot-desc">Date of Release</div>
						</div>
						<div class="kt-widget-14__foot-toolbar">
							<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Preview</a>
							<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Details</a>
						</div>
					</div>
				</div>
				<div class="carousel-item active">
					<div class="kt-widget-14__body">
						<div class="kt-widget-14__product">
							<div class="kt-widget-14__thumb">
								<a href="#"><img src="/keen/themes/keen/theme/demo1/dist/assets/media/blog/2.jpg" class="kt-widget-14__image--landscape" alt="" title=""></a>
							</div>
							<div class="kt-widget-14__content">
								<a href="#"><h3 class="kt-widget-14__title">DSLR Lens</h3></a>
								<div class="kt-widget-14__desc">
									Wide-angle, Quick Focus. Emphasis is on modern lenses for 35 mm film SLRs and for DSLRs with sensor sizes less than or equal to 35 mm.
								</div>
							</div>
						</div>
						<div class="kt-widget-14__data">
							<div class="kt-widget-14__info">
								<div class="kt-widget-14__info-title kt-font-brand">142</div>
								<div class="kt-widget-14__desc">Purchases</div>
							</div>
							<div class="kt-widget-14__info">
								<div class="kt-widget-14__info-title">25</div>
								<div class="kt-widget-14__desc">Reviews</div>
							</div>
						</div>
					</div>
					<div class="kt-widget-14__foot">
						<div class="kt-widget-14__foot-info">
							<div class="kt-widget-14__foot-label btn btn-sm btn-label-brand btn-bold">
								24 Nov, 2018
							</div> 
							<div class="kt-widget-14__foot-desc">Date of Release</div>
						</div>
						<div class="kt-widget-14__foot-toolbar">
							<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Preview</a>
							<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Details</a>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<div class="kt-widget-14__body">
						<div class="kt-widget-14__product">
							<div class="kt-widget-14__thumb">
								<a href="#"><img src="/keen/themes/keen/theme/demo1/dist/assets/media/blog/4.jpg" class="kt-widget-14__image--landscape" alt="" title=""></a>
							</div>
							<div class="kt-widget-14__content">
								<a href="#"><h3 class="kt-widget-14__title">Polaroid Camera</h3></a>
								<div class="kt-widget-14__desc">
									Instant is back! Make photos fun again with the new range of Polaroid Instant Cameras with Vintage Effects and Built in Flash
								</div>
							</div>
						</div>
						<div class="kt-widget-14__data">
							<div class="kt-widget-14__info">
								<div class="kt-widget-14__info-title kt-font-brand">3578</div>
								<div class="kt-widget-14__desc">Purchases</div>
							</div>
							<div class="kt-widget-14__info">
								<div class="kt-widget-14__info-title">457</div>
								<div class="kt-widget-14__desc">Reviews</div>
							</div>
						</div>
					</div>
					<div class="kt-widget-14__foot">
						<div class="kt-widget-14__foot-info">
							<div class="kt-widget-14__foot-label btn btn-sm btn-label-brand btn-bold">
								24 Nov, 2018
							</div> 
							<div class="kt-widget-14__foot-desc">Date of Release</div>
						</div>
						<div class="kt-widget-14__foot-toolbar">
							<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Preview</a>
							<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Details</a>
						</div>
					</div>
				</div> 		
			</div>
		</div>
	</div>
</div>

<div class="kt-portlet kt-portlet--height-fluid-half kt-widget-15">
	<div class="kt-portlet__body">

		<div id="kt-widget-slider-14-2" class="kt-slider carousel slide" data-ride="carousel" data-interval="8000">
			<div class="kt-slider__head">
				<div class="kt-slider__label">New Authors</div>
				<div class="kt-slider__nav">
					<a class="kt-slider__nav-prev carousel-control-prev" href="#kt-widget-slider-14-2" role="button" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a class="kt-slider__nav-next carousel-control-next" href="#kt-widget-slider-14-2" role="button" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item">
					<div class="kt-widget-15__body">
						<div class="kt-widget-15__author">
							<div class="kt-widget-15__photo">
								<a href="#"><img src="/keen/themes/keen/theme/demo1/dist/assets/media/users/100_14.jpg" alt="" title=""></a>
							</div>
							<div class="kt-widget-15__detail">
								<a href="#" class="kt-widget-15__name">Andy John</a>
								<div class="kt-widget-15__desc">
									AngularJS Expert
								</div>
							</div>
						</div>
						<div class="kt-widget-15__wrapper">
							<div class="kt-widget-15__info">
								<a href="#" class="btn btn-icon btn-sm btn-circle btn-success"><i class="fa fa-envelope"></i></a> 
								<a href="#" class="kt-widget-15__info--item">sale@boatline.com</a>
							</div>
							<div class="kt-widget-15__info">
								<a href="#" class="btn btn-icon btn-sm btn-circle btn-brand"><i class="fa fa-phone"></i></a> 
								<a href="#" class="kt-widget-15__info--item">(+44) 345 345 4705</a>
							</div>
						</div>
					</div>		
					<div class="kt-widget-15__foot">
						<div class="kt-widget-15__foot-info">
							<div class="kt-widget-15__foot-label btn btn-sm btn-label-brand btn-bold">
								01 Sep, 2018
							</div> 
							<div class="kt-widget-15__foot-desc">Joined Date</div>
						</div>
						<div class="kt-widget-15__foot-toolbar">
							<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Message</a>
							<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Profile</a>
						</div>
					</div>				
				</div>
				<div class="carousel-item">
					<div class="kt-widget-15__body">
						<div class="kt-widget-15__author">
							<div class="kt-widget-15__photo">
								<a href="#"><img src="/keen/themes/keen/theme/demo1/dist/assets/media/users/100_3.jpg" alt="" title=""></a>
							</div>
							<div class="kt-widget-15__detail">
								<a href="#" class="kt-widget-15__name">Patrick Smith</a>
								<div class="kt-widget-15__desc">
									ReactJS Expert
								</div>
							</div>
						</div>
						<div class="kt-widget-15__wrapper">
							<div class="kt-widget-15__info">
								<a href="#" class="btn btn-icon btn-sm btn-circle btn-success"><i class="fa fa-envelope"></i></a> 
								<a href="#" class="kt-widget-15__info--item">patrick@boatline.com</a>
							</div>
							<div class="kt-widget-15__info">
								<a href="#" class="btn btn-icon btn-sm btn-circle btn-brand"><i class="fa fa-phone"></i></a> 
								<a href="#" class="kt-widget-15__info--item">(+44) 345 345 5574</a>
							</div>
						</div>
					</div>
					<div class="kt-widget-15__foot">
						<div class="kt-widget-15__foot-info">
							<div class="kt-widget-15__foot-label btn btn-sm btn-label-brand btn-bold">
								01 Sep, 2018
							</div> 
							<div class="kt-widget-15__foot-desc">Joined Date</div>
						</div>
						<div class="kt-widget-15__foot-toolbar">
							<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Message</a>
							<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Profile</a>
						</div>
					</div>						
				</div>
				<div class="carousel-item active">
					<div class="kt-widget-15__body">
						<div class="kt-widget-15__author">
							<div class="kt-widget-15__photo">
								<a href="#"><img src="/keen/themes/keen/theme/demo1/dist/assets/media/users/100_7.jpg" alt="" title=""></a>
							</div>
							<div class="kt-widget-15__detail">
								<a href="#" class="kt-widget-15__name">Amanda Collin</a>
								<div class="kt-widget-15__desc">
									Project Manager
								</div>
							</div>
						</div>
						<div class="kt-widget-15__wrapper">
							<div class="kt-widget-15__info">
								<a href="#" class="btn btn-icon btn-sm btn-circle btn-success"><i class="fa fa-envelope"></i></a> 
								<a href="#" class="kt-widget-15__info--item">amanda@boatline.com</a>
							</div>
							<div class="kt-widget-15__info">
								<a href="#" class="btn btn-icon btn-sm btn-circle btn-brand"><i class="fa fa-phone"></i></a> 
								<a href="#" class="kt-widget-15__info--item">(+44) 345 345 1247</a>
							</div>
						</div>
					</div>	
					<div class="kt-widget-15__foot">
						<div class="kt-widget-15__foot-info">
							<div class="kt-widget-15__foot-label btn btn-sm btn-label-brand btn-bold">
								01 Sep, 2018
							</div> 
							<div class="kt-widget-15__foot-desc">Joined Date</div>
						</div>
						<div class="kt-widget-15__foot-toolbar">
							<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Message</a>
							<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Profile</a>
						</div>
					</div>				
				</div> 
			</div>
		</div>
	</div>
</div>
<!--end::Portlet--></div>

            <!---	<div class="col-lg-12 col-xl-4 order-lg-2 order-xl-1">

<div class="kt-portlet kt-portlet--height-fluid">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title">Latest Uploads</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-actions">
				<a href="#" class="btn btn-default btn-upper btn-sm btn-bold">All FILES</a>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--fluid">
		<div class="kt-widget-7">
			<div class="kt-widget-7__items">
				<div class="kt-widget-7__item">
					<div class="kt-widget-7__item-pic">
						<img src="/keen/themes/keen/theme/demo1/dist/assets/media/files/doc.svg" alt="">
					</div>
					<div class="kt-widget-7__item-info">
						<a href="#" class="kt-widget-7__item-title">
							Keeg Design Reqs
						</a>
						<div class="kt-widget-7__item-desc">
							95 MB
						</div>
					</div>
					<div class="kt-widget-7__item-toolbar">
						<div class="dropdown dropdown-inline">
							<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="flaticon-more-1"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<ul class="kt-nav">
									<li class="kt-nav__section kt-nav__section--first">
										<span class="kt-nav__section-text">EXPORT TOOLS</span>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon la la-eye"></i>
											<span class="kt-nav__link-text">View</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon la la-comment-o"></i>
											<span class="kt-nav__link-text">Coments</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon la la-copy"></i>
											<span class="kt-nav__link-text">Copy</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon la la-file-excel-o"></i>
											<span class="kt-nav__link-text">Excel</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="kt-widget-7__item">
					<div class="kt-widget-7__item-pic">
						<img src="/keen/themes/keen/theme/demo1/dist/assets/media/files/pdf.svg" alt="">
					</div>
					<div class="kt-widget-7__item-info">
						<a href="#" class="kt-widget-7__item-title">
							S.E.R Agreement
						</a>
						<div class="kt-widget-7__item-desc">
							805 MB
						</div>
					</div>
					<div class="kt-widget-7__item-toolbar">
						<div class="dropdown dropdown-inline">
							<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="flaticon-more-1"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<ul class="kt-nav">
									<li class="kt-nav__section kt-nav__section--first">
										<span class="kt-nav__section-text">EXPORT TOOLS</span>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon la la-eye"></i>
										<span class="kt-nav__link-text">View</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon la la-comment-o"></i>
										<span class="kt-nav__link-text">Coments</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon la la-copy"></i>
										<span class="kt-nav__link-text">Copy</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon la la-file-excel-o"></i>
										<span class="kt-nav__link-text">Excel</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="kt-widget-7__item">
					<div class="kt-widget-7__item-pic">
						<img src="/keen/themes/keen/theme/demo1/dist/assets/media/files/jpg.svg" alt="">
					</div>
					<div class="kt-widget-7__item-info">
						<a href="#" class="kt-widget-7__item-title">
							FlyMore Screenshot
						</a>
						<div class="kt-widget-7__item-desc">
							4 MB
						</div>
					</div>
					<div class="kt-widget-7__item-toolbar">
						<div class="dropdown dropdown-inline">
							<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="flaticon-more-1"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<ul class="kt-nav">
									<li class="kt-nav__section kt-nav__section--first">
										<span class="kt-nav__section-text">EXPORT TOOLS</span>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon la la-eye"></i>
										<span class="kt-nav__link-text">View</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon la la-comment-o"></i>
										<span class="kt-nav__link-text">Coments</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon la la-copy"></i>
										<span class="kt-nav__link-text">Copy</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon la la-file-excel-o"></i>
										<span class="kt-nav__link-text">Excel</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="kt-widget-7__item">
					<div class="kt-widget-7__item-pic">
						<img src="/keen/themes/keen/theme/demo1/dist/assets/media/files/zip.svg" alt="">
					</div>
					<div class="kt-widget-7__item-info">
						<a href="#" class="kt-widget-7__item-title">
							ST.11 Dacuments
						</a>
						<div class="kt-widget-7__item-desc">
							Unknown
						</div>
					</div>
					<div class="kt-widget-7__item-toolbar">
						<div class="dropdown dropdown-inline">
							<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="flaticon-more-1"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<ul class="kt-nav">
									<li class="kt-nav__section kt-nav__section--first">
										<span class="kt-nav__section-text">EXPORT TOOLS</span>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon la la-eye"></i>
										<span class="kt-nav__link-text">View</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon la la-comment-o"></i>
										<span class="kt-nav__link-text">Coments</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon la la-copy"></i>
										<span class="kt-nav__link-text">Copy</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon la la-file-excel-o"></i>
										<span class="kt-nav__link-text">Excel</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="kt-widget-7__item">
					<div class="kt-widget-7__item-pic">
						<img src="/keen/themes/keen/theme/demo1/dist/assets/media/files/xml.svg" alt="">
					</div>
					<div class="kt-widget-7__item-info">
						<a href="#" class="kt-widget-7__item-title">
							XML AOL Data Fetchin
						</a>
						<div class="kt-widget-7__item-desc">
							4 MB
						</div>
					</div>
					<div class="kt-widget-7__item-toolbar">
						<div class="dropdown dropdown-inline">
							<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="flaticon-more-1"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<ul class="kt-nav">
									<li class="kt-nav__section kt-nav__section--first">
										<span class="kt-nav__section-text">EXPORT TOOLS</span>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon la la-eye"></i>
										<span class="kt-nav__link-text">View</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon la la-comment-o"></i>
										<span class="kt-nav__link-text">Coments</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon la la-copy"></i>
										<span class="kt-nav__link-text">Copy</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
										<i class="kt-nav__link-icon la la-file-excel-o"></i>
										<span class="kt-nav__link-text">Excel</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>-->
            <!---<div class="kt-widget-7__foot">
				<img src="/keen/themes/keen/theme/demo1/dist/assets/media/misc/clouds.png" alt="">
				<div class="kt-widget-7__upload">
					<a href="#"><i class="flaticon-upload"></i></a>	
					<span>Drag files here</span>
				</div>
			</div>
		</div>
	</div>
</div>

	</div>--->

        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	
	var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", // "light2", "dark1", "dark2"
	animationEnabled: false, // change to true		
	title:{
		text: "ORDERS"
	},
	data: [
	{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "line",
		  dataPoints: [
			{ label: "Jan",  y:<?php echo $jan; ?>  },
			{ label: "Feb",  y:<?php echo $feb; ?>  },
			{ label: "Mar",  y:<?php echo $mar; ?>  },
			{ label: "Apr",  y:<?php echo $apr; ?>  },
			{ label: "May",  y:<?php echo $may; ?>  },
			{ label: "Jun",  y:<?php echo $jun; ?>  },
			{ label: "Jul",  y:<?php echo $jul; ?>  },
			{ label: "Aug",  y:<?php echo $aug; ?>  },
			{ label: "Sep",  y:<?php echo $sep; ?>  },
			{ label: "Oct",  y:<?php echo $oct; ?>  },
			{ label: "Nov",  y:<?php echo $nov; ?>  },
			{ label: "Dec",  y:<?php echo $dec; ?>  }
	] 
	
	}
	]
});
chart.render();
var chartproduct = new CanvasJS.Chart("chartProductContainer", {
	theme: "light1", // "light2", "dark1", "dark2"
	animationEnabled: false, // change to true		
	title:{
		text: "PRODUCTS"
	},
	data: [
	{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "line",
		  dataPoints: [
			{ label: "Jan",  y:<?php echo $jan1; ?>  },
			{ label: "Feb",  y:<?php echo $feb1; ?>  },
			{ label: "Mar",  y:<?php echo $mar1; ?>  },
			{ label: "Apr",  y:<?php echo $apr1; ?>  },
			{ label: "May",  y:<?php echo $may1; ?>  },
			{ label: "Jun",  y:<?php echo $jun1; ?>  },
			{ label: "Jul",  y:<?php echo $jul1; ?>  },
			{ label: "Aug",  y:<?php echo $aug1; ?>  },
			{ label: "Sep",  y:<?php echo $sep1; ?>  },
			{ label: "Oct",  y:<?php echo $oct1; ?>  },
			{ label: "Nov",  y:<?php echo $nov1; ?>  },
			{ label: "Dec",  y:<?php echo $dec1; ?>  }
	] 
	
	}
	]
});
chartproduct.render();
$('.days').change(function(){
	 var days=$(this).val();
	$('#hiddenorderbydate').html("in last "+$(this).val()+" days");
	$('#topratedpro').html("in last "+$(this).val()+ " days");
	$.ajax({
		url:"<?= base_url('')?>getordersbyselecteddays",
		method:"post",
		data:{'days':days,'bid':<?php echo $bid;?>},
		success:function(data)
		{
			$('#hidordernumber').html(data);
		}
	});
	$.ajax({
		url:"<?= base_url('')?>toporderedproduct",
		method:"post",
		data:{'days':days},
		success:function(data)
		{
			$('#pdbody').empty();
			obj=jQuery.parseJSON(data);
			 length=obj.length;
			 for(i=0;i<=length-1;i++)
			 {
				 var $row = $('<tr>'+'<td><img style="width:50px;height:50px" src='+obj[i].products_images+'></td>'+'<td>'+obj[i].title+'</td>'+'<td>'+obj[i].SKU+'</td>'+'<td>'+obj[i].ex_vat+'</td>'+'<td>'+obj[i].inc_vat+'</td>'+'</tr>');  
				 $('#dataTable> tbody').append($row);
			 }
		}
	});
	
});



});





</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>