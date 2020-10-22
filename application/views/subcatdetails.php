<?php error_reporting(0); ?>
<link href="<?php base_url()?>//assets/css/demo1/style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php 
     $cat_id= $_GET['id'];
     $cat_name= $_GET['cat_name'];
?>

<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Category List</a></li>
   
		
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane  active background">
      <h3>Manage SubCategory</h3>
     <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
	 <div class="container">
   
<?php 
   if(isset($_SESSION['Current_Business'])){
		$bid=$_SESSION['Current_Business'];
	
 }else
 {
	 $bid=$_SESSION['status']['business_id'];
	 
 }

$AllCatList= $this->ProductCategoryModal->GetAllCat($bid);?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">UniqeID</th>
      <th scope="col">Sub Category Name</th>
      <th scope="col">Sub Sub Category</th>
	  <!--<th scope="col">Edit</th>-->
     
      
    </tr>
  </thead>
  <tbody>
 
    <tr>
      
	  <?php 
   
	  $AllSubCat=$this->db->query("select * from super_sub_cat where sub_cat='$cat_id'");
	  $AllSubCat=$AllSubCat->result_array();  
	  if($AllSubCat){
	  ?>
	  <td><?php echo $cat_id; ?></td>
	  <td><?php echo  $cat_name; ?></td>
      <td><?php foreach( $AllSubCat as  $SubCatList){ ?><?php echo $SubCatList['name']."  (UniqueId=".$SubCatList['id'].'<br>'; ?>
	  <?php }?></td>
	  <?php }else{?>
		  <td><?php echo $cat_id; ?></td>
	  <td><?php echo  $cat_name; ?></td>
		   <td>No Sub Sub category found</td>
	 <?php } ?>
	  
 </tr>
  
  </tbody>
</table>
</div>
	 
	 
    </div>
    
  </div>
</div>


