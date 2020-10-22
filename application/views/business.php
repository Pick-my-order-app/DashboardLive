			<?php error_reporting(0); ?>
			<link href="<?php base_url()?>//assets/css/demo1/style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Manage Business</a></li>
    <li><a data-toggle="tab" href="#menu1">Add Business</a></li>
		
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane  active background">
      <h3>Manage Business</h3>
     <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
	 <div class="container">
	 
  <?php 
  
	 
  if(isset($_SESSION['Current_Business'])){
	  $Get_Data = $this->DataModel->Select_All_business($_SESSION['Current_Business']);}
   else{
	   $Get_Data = $this->DataModel->Select_All_business(0);
   }
  ?>
  <table class="table table-striped">
    <thead>
      <tr>
	    <th>ID</th>
        <th>Business</th>
        <th>Email</th>
		<th>Active</th>
		<th>Edit</th>
		<th>Delete</th>
      </tr>
    </thead>
    <tbody>
	<?php foreach($Get_Data as $Data) { ?>
      <tr>
	    <td><?= $Data['id']; ?></td>
        <td><?= $Data['business_name']; ?></td>
        <td><?= $Data['email']; ?></td>
        <td><?php if($Data['app_status']==0){echo "No";}else{ echo "Yes";} ?></td>
		<td><a href="<?php echo site_url('editbusiness?id='.$Data["id"]); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td> 
		<td><a href="#" class="newanchor" id="<?php echo site_url('delete?id='.$Data["id"].'&type=business'); ?>" data-toggle="modal" data-target="#myConModal" ><i class="fa fa-times-circle" aria-hidden="true"></i></td>
      </tr>      
    <?php  }?>
    </tbody>
  </table>
</div>
	 
	 
    </div>
    <div id="menu1" class="tab-pane fade background">
      
      <!--<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>-->
<div id="form">
<div class="container">
	 
	    <div class="row">
<div class="col-md-12">
	 <h2>Add Business</h2>
</div>
	    <div class="col-md-6 col-xs-12 ">
         <h3>General Details</h3>
		 
	
  <form  method="post" enctype="multipart/form-data" action="<?php echo site_url('business'); ?>">
  
  	 <div class="jumbotron-sec marg ">

  <div class="form-horizontal">
 <!----------------busniss-name------------------------->   
   <div class="form-group ">
      <label class="control-label col-sm-4" for="name">Business Name</label>
	
	  <div class="col-md-8">
      <input type="name" class="form-control" required placeholder="Enter Business Name" name="Business_Name">
    </div>
	  </div>
   <!----------------address------------------------->   
   <div class="form-group  ">
      <label <label class="control-label col-sm-4" for="address">Address</label>
	 
	  <div class="col-md-8  ">
      <input type="text" class="form-control" required placeholder="Enter Your Complete Address" name="address">
    </div> </div>
	<!-------------------------------city------------------------------->
	
   <div class="form-group  ">
      <label <label class="control-label col-sm-4" for="address">City</label>
	 
	  <div class="col-md-8  ">
      <input type="text" class="form-control" required placeholder="Enter Your Complete Address" name="city">
    </div> </div>
   <!----------------post code------------------------->
   <div class="form-group   ">
      <label class="control-label col-sm-4" for="code">Post Code</label>
	
	  <div class="col-md-8  ">
      <input type="text" class="form-control" required placeholder="Enter Post Code" name="Post_Code">
    </div>
	  </div>
	
   <!----------------Email------------------------->
   <div class="form-group ">
      <label class="control-label col-sm-4" for="email">Email</label>
	 
	  <div class="col-md-8  ">
      <input type="email" class="form-control" required placeholder="Enter Email" name="Email">
    </div> </div>
   <!----------------Contact Name------------------------->
   <div class="form-group  ">
      <label class="control-label col-sm-4" for="name">Contact Name</label>
	  
	  <div class="col-md-8  ">
      <input type="text" class="form-control" required placeholder="Enter Contact Name" name="Contact_Name">
    </div></div>
   <!----------------Contact Number------------------------->
   <div class="form-group">
      <label class="control-label col-sm-4" for="email">Contact Number</label>
	 
	  <div class="col-md-8">
      <input type="number" class="form-control" required placeholder="Enter Contact Number" name="Contact_Number">
    </div> </div>
	
	<div class="form-group">
		<label class="control-label col-sm-4" for="img">Business Logo</label>
		
		<div class="col-md-8">
		<input type="file" name="business_logo" required>
		</div>
	</div>
  
</div>
</div>
</div>
<!------------------------second------section--------------------------->
	    <div class="col-md-6 col-xs-12 border">
         <h3>Account Details</h3>
		 <div class="jumbotron-sec marg ">
 <div class="form-horizontal">
 <!----------------busniss-name------------------------->   
   <div class="form-group ">
     <label class="control-label col-sm-4" for="name">Contact Name</label>
	 
	  <div class="col-md-8 ">
      <input type="text" class="form-control" required placeholder="Contact Name" name="Acc_Contact_Name">
    </div>
	 </div>
   <!----------------address------------------------->
   <div class="form-group">
<label class="control-label col-sm-4" for="address">Address</label>
	
	  <div class="col-md-8  ">
      <input type="text" class="form-control" required placeholder="Enter Your Complete Address" name="acc_address">
    </div>  </div>
	 <!----------------City------------------------->
   <div class="form-group">
  <label class="control-label col-sm-4" for="text">City</label>
	  
	  <div class="col-md-8  ">
      <input type="text" class="form-control" required placeholder="Enter Post Code" name="acc_city">
    </div>
	</div>
   <!----------------post code------------------------->
   <div class="form-group">
  <label class="control-label col-sm-4" for="text">Post Code</label>
	  
	  <div class="col-md-8  ">
      <input type="text" class="form-control" required placeholder="Enter Post Code" name="PostCode">
    </div>
	</div>
   <!----------------Email------------------------->
   <div class="form-group">
    <label class="control-label col-sm-4" for="email">Email</label>
	  
	  <div class="col-md-8  ">
      <input type="email" class="form-control" required placeholder="Enter Email" name="acc_email">
    </div></div>
   <!----------------Contact Number------------------------->
   <div class="form-group">
     <label class="control-label col-sm-4" for=" Number">Contact Number</label>
	
	  <div class="col-md-8  ">
      <input type=" Number" class="form-control" required placeholder="Enter Contact Number" name=" acc_Number">
    </div>
	  </div>
   <!----------------VAT Number------------------------->
   <div class="form-group">
   <label class="control-label col-sm-4" for=" Number">VAT Number</label>
	
	  <div class="col-md-8  ">
      <input type=" Number" class="form-control" required placeholder="Enter VAT Number" name="VAT_Number">
    </div>
	  </div> 
	  <div class="form-group">
   <label class="control-label col-sm-4" for=" Number">Wholesaler App</label>
	
	  <div class="col-md-8  ">
      <input type="checkbox" class="form-control"   name="iswholeapp" id="wholesaleryes">
    </div>
	  </div>
	 
	  
	  
	  
	  <!---------------payment method------------------>
	  <div class="form-group" id="paymentoptions" style="display:none">
   <label class="control-label col-sm-4" for=" Number">Dedicate Account</label>
	
	 
     
	  <div class="col-sm-8"><input type="checkbox" id="DedicateAccount" class="method"  name="DedicateAccount" ></div>
   
	  </div>
	  <!---------------payment method------------------>
	  <div id="DedicateAccountdiv" style="display:none">
		  <div class="form-group">
			 <label class="control-label col-sm-4" for=" Number">Secret Key</label>
			
			  <div class="col-md-8  ">
			  <input type="text" class="form-control dedicatevalue"  name="Secretkey">
			</div>
			  </div>
			  <div class="form-group">
			 <label class="control-label col-sm-4" for=" Number">Publish Key</label>
			
			  <div class="col-md-8  ">
			  <input type="text" class="form-control dedicatevalue"   name="Publishkey">
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

  <!--  <div class="col-md-12">
      <h2>Email Address</h2>
</div>-->
<div class="col-md-6 col-xs-12 ">

 <div class="jumbotron-sec marg ">

  <div class="form-horizontal">
 <!----------------busniss-name------------------------->   
   <div class="form-group ">
      <!--  <label class="control-label col-md-4" for=" Number">Order To Supplier</label>
	
	  <div class="col-md-8">
       <input type="email" class="form-control email" required placeholder="" name="Supplier_email">
    </div>
	  </div>

   
   <div class="form-group  ">
 
	  
	 
	  <label class="control-label col-md-12 address_cont_email" for=" Number">This email address will be the address used to send order to supplier</label>

  </div>
   ----------------------->
   <div class="form-group">
<label class="control-label col-md-4" for="Project_Tech">App Status</label>
	  <div class="col-md-8">
<select name="app_active_status" class="form-control email" required>
              <option >--Status--</option>
			   <option value="1">Active</option>
			   <option value="0">DeActive</option>
			</select>
    </div>
	<label class="control-label col-md-4" for="Project_Tech">Wholesaler Page</label>
	  <div class="col-md-8">
       <input type="checkbox" class="form-control"   name="wholesalerpage">
    </div>
    
	</div>  
	
    <div class="submit-btn-sec offset-md-4 col-md-8">
<input type="submit" class="btn btn-info  marg_1 " value="SUBMIT" name="Insert_Busi">
  </div>
</div>
</div>
</div>
<div class="col-md-6 col-xs-12 ">
</div>
</div>
</div>
</div>
</div>
<script>
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

////confirmatiom-Of-Delete
			
	$('.newanchor').click(function(){
		var myId = $(this).attr('id');
		$("#deca").attr("href", myId);
	});
</script>
