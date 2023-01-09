<div class="container my-5">
<div class="row">
      	<div class="col-12">
      		<h2 id="count2"></h2>
      	</div>
<div class="row text-center box p-3 my-3">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Transaction</div>
					<div class="panel-body">
						<div class="row">

							<div class="col-md-1 col-xs-2"><b>ID</b></div>
							<div class="col-md-1 col-xs-2"><b>Bar Code</b></div>
                            <div class="col-md-2 col-xs-2"><b>Quantity</b></div>
							<div class="col-md-2 col-xs-2"><b>Total</b></div>
							<div class="col-md-2 col-xs-2"><b>Created At</b></div>
							<div class="col-md-2 col-xs-2"><b>Update At</b></div>
                            <div class="col-md-2 col-xs-2"><b>Acion</b></div>
						</div>
						<div id="trans_list">

            </div>
					</div>
				</div>
				<div class="panel-footer">
        <div id="total"></div>

		<div class="modal fade text-start" id="edit_trans_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Trans</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-trans-form" enctype="multipart/form-data" onsubmit="return false">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Bar Code</label>
                <input type="text" name="e_barcode" class="form-control" placeholder="Enter Bar Code">
              </div>
            </div>
          
            <div class="col-12">
              <div class="form-group">
                <label>Item Quantity</label>
                <input type="text" name="e_item_q" class="form-control" placeholder="Enter Item Quantity">
              </div>
            </div>
			<div class="col-12">
              <div class="form-group">
                <label>Transaction Amount</label>
                <input type="text" name="e_trans_a" class="form-control" placeholder="Enter Transaction Amount">
              </div>
            </div>
            <input type="hidden" name="pid">
            <div class="col-12 my-3">
              <button type="submit" class="btn btn-primary submit-edit-trans">Edit Trans</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
        
        </div>
			</div>
		
		</div>
</div>