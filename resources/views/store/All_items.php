<div class="container my-5">

<div class="row">
      	<div class="col-10">
      		<h2 id="count1"></h2>
      	</div>
      	<div class="col-2">
      		<a href="#" data-toggle="modal" data-target="#add_item_modal" class="add_item_modal btn btn-primary btn-sm">Add Item</a>
      	</div>
      </div>

      <div class="modal fade" id="add_item_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-item-form" enctype="multipart/form-data" onsubmit="return false">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Item Name</label>
		        		<input type="text" name="item_name" class="form-control" placeholder="Enter Name">
		        	</div>
        		</div>
            <div class="col-12">
              <div class="form-group">
                <label>Selling Price</label>
                <input type="text" name="selling_price" class="form-control" placeholder="Enter Selling Price">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Buying Price</label>
                <input type="text" name="buying_price" class="form-control" placeholder="Enter Buying Price">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Quantity</label>
                <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Barcode</label>
                <input type="text" name="barcode" class="form-control" placeholder="Enter Bar Code">
              </div>
            </div>

            <div class="col-12">
        			<div class="form-group">
		        		<label>Image <small>(format: jpg, jpeg, png)</small></label>
		        		<input type="file" name="image" class="form-control">
		        	</div>
        		</div>
        		
        		<div class="col-12 my-3">
        			<button type="submit" class="btn btn-primary add-item">Add Item</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_item_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id= "edit-item-form" enctype="multipart/form-data" onsubmit="return false">
        <div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Item Name</label>
		        		<input type="text" name="item_name" class="form-control" placeholder="Enter Name">
		        	</div>
        		</div>
            <div class="col-12">
              <div class="form-group">
                <label>Selling Price</label>
                <input type="text" name="selling_price" class="form-control" placeholder="Enter Price">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Buying Price</label>
                <input type="text" name="buying_price" class="form-control" placeholder="Enter Price">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Quantity</label>
                <input type="text" name="quantity" class="form-control" placeholder="Enter Price">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Barcode</label>
                <input type="text" name="barcode" class="form-control" placeholder="Enter Price">
              </div>
            </div>
            <div class="col-12">
        			<div class="form-group">
		        		<label>Image <small>(format: jpg, jpeg, png)</small></label>
		        		<input type="file" name="image" class="form-control">
                <img src="#" class="img-fluid" width="50">
		        	</div>
        		</div>
            <input type="hidden" name="pid">
        		<div class="col-12 my-3">
        			<button type="submit" class="btn btn-primary submit-edit-item">Edit Item</button>
        		</div>
        	</div>
          
        </form>
      </div>
    </div>
  </div>
</div>

   <!-- Section: Block Content -->
   <section class="team-section">
      
      <div class="card-body">
        <div class="row text-center item_list pt-4">


          
        </div>
      </div>
    

  </section>
  <!-- Section: Block Content -->

</div>
