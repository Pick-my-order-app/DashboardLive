<?php error_reporting(0); 


?>
<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Category Transfer</a></li> 		
  </ul>
 <div class="tab-content">
    <div id="home" class="tab-pane  active background">
   
          <form class="form-signin" id="login" method="post" action="Notifications">
		  <div class="row">
		  <table>
		  <tr id="noticetable"></tr>
		  </table>
		  </div>
		  <div class="row">
				<div class="col-lg-8">
				<div class="col-lg-4">
				<span>Source Bussiness</span>
				</div>
				<div class="col-lg-4">
				<?php $Get_Data = $this->DataModel->Select_All_business(0); ?>
					 <select class="form-control" id="source">
					 <option value="" disabled selected>Select Bussiness</option>
					 <?php foreach($Get_Data as $Data) { ?>
						<option value="<?= $Data['id'];?>" ><?php echo $Data['business_name']; ?></option>
						
					 <?php } ?>
					</select>
				</div>
					 
				</div >
				
	  
	</div>
	<div class="row" style="Margin-top:20px">
	      <div class="col-lg-8">
				<div class="col-lg-4">
					<span>Destination Bussiness</span>
				</div>
				<div class="col-lg-4">
					 <select class="form-control" id="desti">
					 <option value="" disabled selected>Select Bussiness</option>
					 <?php foreach($Get_Data as $Data) { ?>
						<option value="<?= $Data['id'];?>" ><?php echo $Data['business_name']; ?></option>
						
					 <?php } ?>
					</select>
				</div>	 
		  </div >  
     </div> 
	 	<div class="row">
		<div class="col-lg-8">
	      <div class="col-lg-4">
				
					
				</div>
				<div class="col-lg-4">
					 <span  class="form-control btn btn-info" id="enter">Copy All Category</span >
				</div>
		  </div >  
		 </div>
     </div> 
	
	 </form>
	</div>
    </div>

  </div>
  <script>
  $('#enter').click(function(){  
	 bid=$('#source option:selected').val(); 
	  newbid=$('#desti option:selected').val();
	 $.ajax({
		url:"<?= base_url('')?>getbusinesscat", 
		method:"get",
		data:{'bid':bid,'newbid':newbid,'listid':'0'},
		success:function(data)
		{    
		   
			if(data==0)
			{
				alert("Category already Exsist");
			}
		    else 
			{
				alert("Category Add Successfully");
			}
		}
	 });
	 
  });
  
  
  </script>

