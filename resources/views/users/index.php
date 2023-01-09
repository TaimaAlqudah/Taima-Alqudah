<div class="container my-5">

<div class="row">
      	<div class="col-10">
      		<h2 id="count"></h2>
      	</div>
      	<div class="col-2">
      		<a href="#" data-toggle="modal" data-target="#add_user_modal" class="add_user_modal btn btn-primary btn-sm">Add User</a>
      	</div>
      </div>


      

<div class="modal fade" id="add_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-user-form" enctype="multipart/form-data" onsubmit="return false">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Name</label>
		        		<input type="text" name="username" class="form-control" placeholder="Enter Name">
		        	</div>
        		</div>
            <div class="col-12">
        			<div class="form-group">
		        		<label>Role</label>
		        		<select class="form-control " name="role">
		        			<option value="">Select Role</option>
                  <option value="Admin">Admin</option>
                  <option value="Seller">Seller</option>
                  <option value="Procurement">Procurement</option>
                  <option value="Accountant">Accountant</option>
		        		</select>
		        	</div>
        		</div>
            <div class="col-12">
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Enter Email">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
              </div>
            </div>
            <div class="col-12">
        			<div class="form-group">
		        		<label>Image <small>(format: jpg, jpeg, png)</small></label>
		        		<input type="file" name="image" class="form-control">
		        	</div>
        		</div>
        		<div class="col-12 my-3">
        			<button type="submit" class="btn btn-primary add-user">Add User</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-user-form" enctype="multipart/form-data" onsubmit="return false">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="username" class="form-control" placeholder="Enter Name">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Role</label>
                <select class="form-control" name="role">
                  <option value="">Select Role</option>
                  <option value="Admin">Admin</option>
                  <option value="Seller">Seller</option>
                  <option value="Procurement">Procurement</option>
                  <option value="Accountant">Accountant</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Enter Email">
              </div>
            </div>
          
            <div class="col-12">
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
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
              <button type="submit" class="btn btn-primary submit-edit-user">Edit User</button>
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
        <div class="row text-center user_list pt-4">


          
        </div>
      </div>
    

  </section>
  <!-- Section: Block Content -->

</div>
  <!-- Section: Block Content -->


