<?php error_reporting(0); ?>
<div class="container">
  

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Manage Users</a></li>
    <li><a data-toggle="tab" href="#menu1">Add Users</a></li>
		
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane  active">
      <h3>Manage Users</h3>
     <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
	 <div class="container">
    <?php if(isset($_SESSION['Current_Business'])){ $Get_Data = $this->DataModel->Select_All_users($_SESSION['Current_Business']);}
	else{
		$Get_Data = $this->DataModel->Select_All_users(0);
	}
	?>

  <table class="table background table-striped">
    <thead>
      <tr>
        <th>User Name</th>
        <th>Business</th>
        <th>Last Login</th>
		<th>Login as this User</th>
		<th>Edit </th>
		<th>Delete</th>
      </tr>
    </thead>
    <tbody>
	<?php foreach($Get_Data as $data){?>
      <tr id=<?php echo $data["id"]; ?>>
        <td><?php echo $data['user_name']; ?></td>
        <td><?php echo $data['business']; ?></td>
        <td><?php echo $data['last_login']; ?></td>
		  <td>
		  <button type="button" class="btn btn-info getid" data-toggle="modal" data-target="#myModal">Login<span class="login-forward"><i class="fa fa-mail-forward"></i></span></button>
		  <!--<a href=<?php echo site_url('adminlogin?id='.$data["id"]); ?>>Login</a>--></td>
		<td><a href="<?php echo site_url('editusers?id='.$data['id']);?>"><i class="fa  fa-pencil" aria-hidden="true"></i></a></td> 
		<td><a href="" class="newanchor" id="<?php echo site_url('delete?id='.$data["id"].'&type=users'); ?>" data-toggle="modal" data-target="#myConModal"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
      </tr>      
     <?php  } ?>
    </tbody>
  </table>
</div>
	 
	 
    </div>
    <div id="menu1" class="tab-pane fade per">
      <h3>ADD NEW USER</h3>
      <!--<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>-->
<body>
<div id="form">
<div class="container">
	 
	    <div class="row">
	    <div class="col-md-6 col-xs-12">

  <!--<form class="form-inline" action="/action_page.php">-->
 <!----------------busniss-name------------------------->   
 <form method="post" action="<?php echo site_url('users'); ?>">
  <div class="form-horizontal">
   <div class="form-group ">
      <label class="col-md-4" for="email">Name</label>

	  <div class="col-md-8">
      <input type="text" class="form-control"  required placeholder="Enter Name" name="Name">
    </div>	
	</div>


	
   <!----------------address-------------------------> 
   <div class="form-group">
 <label class="col-md-4" for="email">User Name</label>
	 
	  <div class="col-md-8">
      <input type="text" class="form-control"  required placeholder="Enter Your User Name" name="uname">
    </div>
 </div>
   <!----------------post code------------------------->
  
   <div class="form-group ">
 <label class="col-md-4" for="email">Email Address</label>
	 
	  <div class="col-md-8">
      <input type="email" class="form-control" id="user_email" required placeholder="Email Address" name="email"><span id="user_exsist_error" style="color:red;display:none">Email Already in use</span>
    </div>
	</div>
	
	
   <!----------------Email------------------------->

   <div class="form-group ">
 <label class="col-md-4" for="email">Password</label>
	
	  <div class="col-md-8">
      <input type="Password" class="form-control"  required placeholder="Password" name="Password">
    </div>
  </div>

	
  
  </div>
</div>


 <!-- </form>-->
<hr>
</div>
<!-------email-section--->
 <div id="email_sec">
 <div class="">
   <div class="row">
     <div class="col-md-12 per">
      <h2>Permissions</h2>
</div>
<div class="col-md-6 border">
    <div class="form-check form-check-inline dis">
  <label class="form-check-label ck" for="inlineCheckbox1">Full</label>
  <input id="full" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Full" name="Full">
</div>
<div class="form-check form-check-inline dis">
  <label class="form-check-label ck" for="inlineCheckbox2">Products</label>
    <input id="p1" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Products" name="Products">
</div>
<div class="form-check form-check-inline dis">
  <label class="form-check-label ck" for="inlineCheckbox2">Orders</label>
    <input id="p2" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Orders" name="Orders">
</div>

<div class="form-check form-check-inline dis">
  <label class="form-check-label ck" for="inlineCheckbox2">Suppliers</label>
    <input id="p4" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Suppliers" name="Suppliers">
</div>
<div class="form-check form-check-inline dis">
  <label class="form-check-label ck" for="inlineCheckbox2">Engineers</label>
    <input id="p5" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Engineers" name="Engineers">
</div>
<div class="form-check form-check-inline dis">
  <label class="form-check-label ck" for="inlineCheckbox2">Projects</label>
    <input id="p6" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Projects" name="Projects">
</div>

<div class="form-check form-check-inline dis">
  <label class="form-check-label ck" for="inlineCheckbox2">Categories</label> 
    <input id="p8"  class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Categories" name="Categories">
</div>
<div class="form-check form-check-inline dis">
  <label class="form-check-label ck" for="inlineCheckbox2">Notifications</label>
    <input id="p9" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Notifications" name="Notifications">
</div>
<!-----------------------------stores------------------------->
<div class="form-check form-check-inline dis">
  <label class="form-check-label ck" for="inlineCheckbox2">Stores</label>
    <input id="p12" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Stores" name="Stores">
</div>
<!------------------------------------------------------------>
<!-----------------------------delevery cost------------------------->
<div class="form-check form-check-inline dis">
  <label class="form-check-label ck" for="inlineCheckbox2">delevery cost</label>
    <input id="p13" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="deleverycost" name="deleverycost">
</div>
<!------------------------------------------------------------>
</div>
<div class="col-md-6">

   <div class="col-md-4">
	     <p>Buisness</p>
		 </div>
	    <div class="col-md-8">
        <select class="businessclass" required name="Buisness">
		<option value='' selected disabled>---Select Bussiness---</option>
		<?php $Get_Data = $this->db->query('select *from dev_business');
          $All_business=$Get_Data->result_array();
		?>	
		<?php foreach($All_business as $Data) { ?>
		<option value="<?php echo $Data['business_name']; ?>"><?php echo $Data['business_name']; ?></option>
		<?php } ?>
		</select>
		  </div>
	
		  <div class="col-md-12">
   <div class="super_cont">
  <label  style="padding: 0px;" class=" ck col-md-4" for="inlineCheckbox2">Super Admin</label>
     <div  class="col-md-8"> <input id="p10" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Super_Admin" name="Super Admin"></div>
</div>
 
		  </div>
		   <div class="col-md-12">
		  <div class="super_cont">
  <label style="padding: 0px;" class=" ck col-md-4" for="inlineCheckbox2">Wholesaler App </label>
     <div class="col-md-8"> <input id="p11" class="form-check-input" type="checkbox" value="Wholesaler_App " name="Wholesaler_App"></div>
</div></div>
  <div class="offset-md-4 col-md-8"> <input type="submit" name="Insert_user"></div>
     </div>
</div>
</form>
   </div>
  
 </div>
</div>


	  
    </div>
    
  </div>
</div>
<!----Boot model --->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Confirmation</h4>
		  <button type="button" class="close" data-dismiss="modal"></button>
        </div>
        <div class="modal-body">
       <p>This will log you out of your current session and log you back in as this user.Do you want to proceed.</p>
        </div>
        <div class="modal-footer">
         <a class="btn btn-default" id="ur" href=<?php echo site_url('adminlogin?id=7'); ?>>Confirm</a>
	  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>
<!----bott model----->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
	jQuery('#p11').change(function(){
	if (jQuery('#p11').prop('checked')==true)
	{
		jQuery('#p1').prop('checked',true);
		jQuery('#p2').prop('checked',true);
		jQuery('#p5').prop('checked',true);
		//jQuery('#p6').prop('checked',true);
		jQuery('#p8').prop('checked',true);
		jQuery('#p9').prop('checked',true);
	}
	else
	{
		jQuery('#p1').prop('checked',false);
		jQuery('#p2').prop('checked',false);
		jQuery('#p5').prop('checked',false);
		//jQuery('#p6').prop('checked',false);
		jQuery('#p8').prop('checked',false);
		jQuery('#p9').prop('checked',false);
	}
	});
	
	
	//old
	jQuery('#full').change(function(){


	if($("#full").prop('checked') == true)
		{
		    jQuery('#p12').prop('checked', true);
		    jQuery('#p13').prop('checked', true);
				for(i=1;i<=9;i++)
				{
					jQuery('#p'+i).prop('checked', true);
				}
		}
		else
		{
		    jQuery('#p12').prop('checked', false);
		    jQuery('#p13').prop('checked', false);
		
				for(i=1;i<=9;i++)
				{
					jQuery('#p'+i).prop('checked', false);
				}
		}

});
	$('.getid' ).click(function(){
	   var bid = this.id; // button ID
	   
	   var trid = $(this).closest('tr').attr('id'); // table row ID
	   $("#ur").attr("href", "/adminlogin?id="+trid);
	 });
	$("#p10").change(function() {
	if($(this).prop("checked")==true)
	{
		$('.businessclass').removeAttr("required");
	}		 
	else
	{
		$('.businessclass').prop('required',true);
	}
	});
	$('#user_email').focus(function(){
		$('#user_exsist_error').css('display','none');
	});
	$('#user_email').blur(function(){
		var user_email=$(this).val();
		if(user_email!='')
		{
			$.ajax({
				url:"<?= base_url('')?>checkuserexsist",
				method:'post',
				data:{'useremail':user_email},
				success:function(data)
				{
					
					if(data=='1')
					{
						$('#user_exsist_error').css('display','block');
						$('#user_email').val('');
					}
					
			    }
			       });
			
		}
		
	});
});

////confirmatiom-Of-Delete
			
	$('.newanchor').click(function(){
		var myId = $(this).attr('id');
		$("#deca").attr("href", myId);
	});

</script>

