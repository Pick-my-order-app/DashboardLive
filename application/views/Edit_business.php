       <?php 
	   error_reporting(0); 
	   $editid=$_GET['id'];
	   
	    $select_single_business_query="select * from dev_business where id='$editid'";
		$select_single_business=$this->db->query($select_single_business_query);
		$select_single=$select_single_business->result_array();
		$select_single= $select_single[0];
	 
	    $select_single_businessacc_query="select * from dev_account where business_id='$editid'";
		
		$select_single_businessaccc=$this->db->query($select_single_businessacc_query);
		
		$select_singleacc=$select_single_businessaccc->result_array();
		$select_singleacc= $select_singleacc[0];
	
	   ?>		
		<link href="<?php base_url()?>//assets/css/demo1/style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
  <ul class="nav nav-tabs">
   
    <li><a data-toggle="tab" href="#menu1">Edit Business</a></li>
		
  </ul>

  <div class="tab-content">

    <div id="menu1" class="tab-pane active background">
      
      <!--<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>-->
<div id="form">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Edit Business</h2>
			</div>
	    <div class="col-md-6 col-xs-12">
         <h3>General Details</h3>
		 
	
  <form  method="post" action="<?php echo site_url('editbusiness'); ?>" enctype="multipart/form-data">
  
  	 <div class="jumbotron-sec marg ">

  <div class="form-horizontal">
 <!----------------busniss-name------------------------->   
   <div class="form-group ">
      <label class="control-label col-sm-4" for="name">Business Name</label>
	
	  <div class="col-md-8">
      <input type="name" class="form-control"  required placeholder="Enter Business Name" name="Business_Name" value="<?php echo  $select_single['business_name']; ?>">
    </div> <input name="hid" type="hidden" value="<?php echo  $select_single['id']; ?>">
	  </div>
  
	<!----------------adress------------------------->   
   <div class="form-group  ">
      <label <label class="control-label col-sm-4" for="address">Address</label>
	 
	  <div class="col-md-8  ">
      <input type="text" class="form-control" required placeholder="Enter Your Complete Address" name="address" value="<?php echo  $select_single['address']; ?>">
    </div> </div>
	 <!----------------city------------------------->   
   <div class="form-group  ">
      <label <label class="control-label col-sm-4" for="address">City</label>
	 
	  <div class="col-md-8  ">
      <input type="text" class="form-control" required placeholder="Enter Your Complete Address" name="city" value="<?php echo  $select_single['city']; ?>">
    </div> </div>
   <!----------------post code------------------------->
   <div class="form-group   ">
      <label class="control-label col-sm-4" for="code">Post Code</label>
	
	  <div class="col-md-8  ">
      <input type="text" class="form-control" required placeholder="Enter Post Code" name="Post_Code" value="<?php echo  $select_single['post_code']; ?>">
    </div>
	  </div>
	
   <!----------------Email------------------------->
   <div class="form-group ">
      <label class="control-label col-sm-4" for="email">Email</label>
	 
	  <div class="col-md-8  ">
      <input type="email" class="form-control" required placeholder="Enter Email" name="Email" value="<?php echo  $select_single['email']; ?>" >
    </div> </div>
   <!----------------Contact Name------------------------->
   <div class="form-group  ">
      <label class="control-label col-sm-4" for="name">Contact Name</label>
	  
	  <div class="col-md-8  ">
      <input type="text" class="form-control" required placeholder="Enter Contact Name" name="Contact_Name" value="<?php echo  $select_single['contact_name']; ?>">
    </div></div>
   <!----------------Contact Number------------------------->
	<div class="form-group">
		<label class="control-label col-sm-4" for="email">Contact Number</label>
		<div class="col-md-8">
			<input type="number" class="form-control" required placeholder="Enter Contact Number" name="Contact_Number" value="<?php echo  $select_single['contact_number']; ?>">
		</div> 
	</div>
	
	<!----------------------------------Business Logo-------------------------------->
	<div class="form-group">
		<label class="control-label col-sm-4" for="logo">Business Logo</label>
		<div class="col-md-8">
		<?php if($select_single['bussiness_logo']==''){ ?>
			<input type="file" required name="business_logo">
		<?php }else{?>
		<input type="hidden" value="<?php echo $select_single['bussiness_logo'];?>" name="business_url">	 
		<?php } ?>
			<img src="<?php echo $select_single['bussiness_logo']; ?>" height="100px" width="100px">
	</div>
	</div>
  
</div>
</div>
</div>
<!------------------------second------section--------------------------->
	    <div class="col-md-6 col-xs-12">
         <h3>Account Details</h3>
		 <div class="jumbotron-sec marg ">
 <div class="form-horizontal">
 <!----------------busniss-name------------------------->   
   <div class="form-group ">
     <label class="control-label col-sm-4" for="name">Contact Name</label>
	 
	  <div class="col-md-8 ">
      <input type="text" class="form-control" required placeholder="Contact Name" name="Acc_Contact_Name" value="<?php echo  $select_singleacc['contact_name']; ?>">
    </div>
	 </div>
   <!----------------address------------------------->
   <div class="form-group">
<label class="control-label col-sm-4" for="address">Address</label>
	
	  <div class="col-md-8  ">
      <input type="text" class="form-control" required placeholder="Enter Your Complete Address" name="acc_address" value="<?php echo  $select_singleacc['address']; ?>">
    </div>  </div>
	<!----------------city------------------------->
   <div class="form-group">
<label class="control-label col-sm-4" for="address">City</label>
	
	  <div class="col-md-8  ">
      <input type="text" class="form-control" required placeholder="Enter Your Complete Address" name="acc_city" value="<?php echo  $select_singleacc['acc_city']; ?>">
    </div>  </div>
   <!----------------post code------------------------->
   <div class="form-group">
  <label class="control-label col-sm-4" for="text">Post Code</label>
	  
	  <div class="col-md-8  ">
      <input type="text" class="form-control" required placeholder="Enter Post Code" name="PostCode" value="<?php echo  $select_singleacc['post_code']; ?>">
    </div>
	</div>
   <!----------------Email------------------------->
   <div class="form-group">
    <label class="control-label col-sm-4" for="email">Email</label>
	  
	  <div class="col-md-8  ">
      <input type="email" class="form-control" required placeholder="Enter Email" name="acc_email" value="<?php echo  $select_singleacc['email']; ?>">
    </div></div> 
   <!----------------Contact Number------------------------->
   <div class="form-group">
     <label class="control-label col-sm-4" for=" Number">Contact Number</label>
	
	  <div class="col-md-8  ">
      <input type=" Number" class="form-control" required placeholder="Enter Contact Number" name=" acc_Number" value="<?php echo  $select_singleacc['contact_number']; ?>">
    </div>
	  </div>
   <!----------------VAT Number------------------------->
   <div class="form-group">
   <label class="control-label col-sm-4" for=" Number">VAT Number</label>
	
	  <div class="col-md-8  ">
      <input type=" Number" class="form-control" required placeholder="Enter VAT Number" name="VAT_Number" value="<?php echo  $select_singleacc['vat_number']; ?>">
    </div>
	  </div>
	   <div class="form-group">
   <label class="control-label col-sm-4" for=" Number">Wholesaler App</label>
	
	  <div class="col-md-8  ">
      <input id="wholesaleryes" type="checkbox" class="form-control"   name="iswholeapp" <?php if($select_single['iswholeapp']=='1'){  ?> checked <?php } ?>>
    </div>
	  </div>
	  	  <!-----------------------------field for delevery cost------------------------------->
	
	  <!---------------------------------------------------------------------------------->
	  	  <div class="form-group" id="paymentoptions" style="display:none">
   <label class="control-label col-sm-4" for=" Number">Dedicate Account</label>
	
	 
     
	  <div class="col-sm-8"><input <?php if($select_single['isdedicate']=='1'){ ?> checked <?php } ?>type="checkbox" id="DedicateAccount" class="method"  name="DedicateAccount" ></div>
   
	  </div>
	  <!---------------payment method------------------>
	  <div id="DedicateAccountdiv" style="display:none">
		  <div class="form-group">
			 <label class="control-label col-sm-4" for=" Number">Secret Key</label>
			
			  <div class="col-md-8  ">
			  <input type="text" class="form-control dedicatevalue"  name="Secretkey" value="<?php echo $select_single['stripe_secretkey']; ?>">
			</div>
			  </div>
			  <div class="form-group">
			 <label class="control-label col-sm-4" for=" Number">Publish Key</label>
			
			  <div class="col-md-8  ">
			  <input type="text" class="form-control dedicatevalue"   name="Publishkey" value="<?php echo $select_single['stripe_publishkey']; ?>">
			</div>
			  </div>
	  </div>
 
</div>
</div>

</div>
<hr>
</div>

<!-------email-section--->

  <div class="row form-status">

   <!-- <div class="col-md-12">
      <h2>Email Address</h2>
</div>-->
<div class="col-md-6 col-xs-12 ">

 <div class="jumbotron-sec marg ">

  <div class="form-horizontal">
 
   <div class="form-group ">
        <!------------<label class="control-label col-md-4" for=" Number">Order To Supplier</label>
	
	  <div class="col-md-8">
      <input type="email" class="form-control email" required  placeholder="" name="Supplier_email" value="<?php echo  $select_single['supplier_email']; ?>">
	 
    </div>
	  </div>

   
   <div class="form-group  ">
 
	  
	 
	  <label class="control-label col-md-12 address_cont_email" for=" Number">This email address will be the address used to send order to supplier</label>

  </div>
-->
   <div class="form-group">
<label class="control-label col-md-4" for="Project_Tech">App Status</label>
	  <div class="col-md-8">
    <select name="app_active_status" class="form-control">
			<?php   if($select_single['app_status']=='1'){ $val='YES';}else{$val='NO';} ?>
			   <option value="<?php echo  $select_single['app_status']; ?>"><?php echo  $val; ?></option>
			   <option value="1">Active</option>
			   <option value="0">DeActive</option>
			</select>
    </div>
	<label class="control-label col-md-4" for="Project_Tech">Wholesaler Page</label>
	  <div class="col-md-8">
       <input type="checkbox" class="form-control"   name="wholesalerpage" <?php if($select_single['iswholpageview']=='1'){  ?> checked <?php } ?>>
    </div>
   
	</div>
	
    <div class="submit-btn-sec offset-md-4 col-md-8">
<input type="submit" class="btn btn-info  marg_1 " value="Update" name="update_Busi">



    </div>
</div>
</div>
</div>
<div class="col-md-6 col-xs-12 ">
</div>
</div>

</div>


</div>
 </form>
    </div>
  </div>
</div>
<script>
jQuery(document).ready(function()
{
	if(jQuery('#wholesaleryes').prop('checked') == true)
	{
			jQuery('#paymentoptions').css('display','block');
			
	  
			if(jQuery('#DedicateAccount').prop('checked') == true)
			{
				jQuery('#DedicateAccountdiv').css('display','block');
				$(".dedicatevalue").prop('required',true);
				$(".dedicatevalue").prop('required',true);
			}
			
			if(jQuery('#DedicateAccount').prop('checked') == false)
			{
				jQuery('#DedicateAccountdiv').css('display','none');
				$(".dedicatevalue").prop('required',false);
				$(".dedicatevalue").prop('required',false);
			}
	}
	if(jQuery('#wholesaleryes').prop('checked') == false)
	{
		jQuery('#paymentoptions').css('display','none');
		jQuery('#DedicateAccountdiv').css('display','none');
		$(".dedicatevalue").prop('required',false);
		$(".dedicatevalue").prop('required',false);
		$(".dedicatevalue").prop('required',false);

	}
	// if click
	
	

});

jQuery('#wholesaleryes').change(function()
{
	if(jQuery('#wholesaleryes').prop('checked') == true)
	{
    jQuery('#paymentoptions').css('display','block');
	}
	if(jQuery('#wholesaleryes').prop('checked') == false)
	{
		jQuery('#paymentoptions').css('display','none');
		jQuery('#DedicateAccountdiv').css('display','none');
		$(".dedicatevalue").prop('required',false);
		$(".dedicatevalue").prop('required',false);
	}

});
jQuery('.method').change(function()                           // change on dedicate 
{
	if(jQuery('#DedicateAccount').prop('checked') == true)
	{
		jQuery('#DedicateAccountdiv').css('display','block');
		$(".dedicatevalue").prop('required',true);
		$(".dedicatevalue").prop('required',true);
	}
	
	if(jQuery('#DedicateAccount').prop('checked') == false)
	{
		jQuery('#DedicateAccountdiv').css('display','none');
		$(".dedicatevalue").prop('required',false);
		$(".dedicatevalue").prop('required',false);
	}
});

</script>


