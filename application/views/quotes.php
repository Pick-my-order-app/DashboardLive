<link href="<?php base_url()?>//assets/css/demo1/style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Manage Quotes</a></li>
    <li><a data-toggle="tab" href="#menu1">Quotes</a></li>
		
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane  active background">
		  <h3>Manage Quotes</h3>
	  <div class="container">
  
  <table class="table">
    <thead>
      <tr>
        <th>Quotes No.</th>
        <th>Date</th>
		<th>Refrence No.</th>
		<th>Total EX.VAT </th>
		<th>Total INC.VAT </th>
		<th>Edit</th>
		<th>Delete</th>
      </tr>
    </thead>
    <tbody>
	<?php for($i=1;$i<=1;$i++){ ?>
      <tr>
        <td><?php echo $i; ?></td>
        
		<td>10/12/2018</td>
		<td>Test Quotes</td>
		<td>1.00</td>
		<td>1.50</td>
		<td><i class="fa fa-pencil" aria-hidden="true"></i></td> 
		<td><i class="fa fa-times-circle" aria-hidden="true"></i></td>
      </tr>      
	<?php } ?>
    </tbody>
  </table>
</div>
    <hr>
	



	 
    </div>
    <div id="menu1" class="tab-pane fade background">
  <h3>Quotes Numbar : #1234</h3>
     <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
	 <div class="container">
  
  <table class="table">
    <thead>
      <tr>
        <th>Item</th>
        <th>Image</th>
		<th>Qty</th>
		<th>Price</th>
		<th>Total</th>
		<th>Edit</th>
		<th>Delete</th>
      </tr>
    </thead>
    <tbody>
	<?php for($i=1;$i<=1;$i++){ ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><img style="width:50px;height:50px" src="http://ledandlampsdirect.co.uk/wp-content/uploads/2018/11/cameras-300x206-1.jpg"></td>
		<td>10</td>
		<td>2.00</td>
		<td>€20.00</td>
		<td><i class="fa fa-pencil" aria-hidden="true"></i></td> 
		<td><i class="fa fa-times-circle" aria-hidden="true"></i></td>
      </tr>      
	<?php } ?>
    </tbody>
  </table>
</div><hr>
 <div class="row">
	<div class="col-sm-9">
      <div class="col-sm-6">
      <h3>Supplier Quotes</h3>
	 
	  
	  <input type="text" value="Supplier Name">
	  
	  </div>
	  <div class="col-sm-3">
	  <input type="submit" value="Re-Order">
	  </div>
    </div>
   <div class="col-sm-3">
      <h4>SUB TOTAL : €40.00</h4>
	  <h4>VAT : €6.00</h4>
	  <h4>Total : €46.00</h4>
    </div>
  </div>
	
	 
	 </div>
  </div>
  
