<div class="container text-center">
<div class="row text-center box p-3">
  <div class="col-sm-12 my-3">
  <form >
  <div class="row">
    <div class="col"></div>
    <div class="col-md-6">
    <input type="text" placeholder="Bar Code" class="form-control" id="input_barcode" name="barcode" aria-describedby="basic-addon3">
    </div>
    <div class="col-md-2">
    <button class="btn-search btn-primary btn" type="submit" name="barcode" id="barcode_btn">Search</button>
    </div>
         <div class="col"></div>
  </div>
    </form>
  </div>
</div></div>

<div class="container text-start box my-5">
<form id="sell" onsubmit="return false">
<table class="table">

                    <thead>
                      <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Amount</th>
                      </tr>
                    </thead>
                    <tbody id="x">
                    <tr>
                <th><input type="text"  name="e_bar" class="form-control w-50" disabled id="inputZip"></th>
                <td><input type="text"  name="e_name" class="form-control w-100" disabled id="inputZip"></td>
                <td><input type="text"  name="e_price" class="form-control w-50" disabled id="inputZip"></td>
                <td><input type="text"  name="e_quantity" class="form-control w-50" id="inputZip"></td>
                <td><input type="text"  id="dis"  name="e_discount" class="form-control w-50" id="inputZip"></td>
                <td><input type="text"  name="e_amount" class="form-control w-50" disabled id="inputZip"></td>
              </tr>
            </tbody>
                    
          </table>
          <input type="hidden" name="selp" value="">
          <input type="hidden" name="qq" value="">
          <input type="hidden" id="user_id" value="">
          <div class="row text-end">
            <div class="col"></div>
            <div class="col-2">
            <div class="text-end">	<button class="add-store btn btn-success">Add Store</button></div>
            </div>
            <div class="col-2">
            <div class="text-end">	<button type="submit"  class="btn btn-primary">Add Cart</button></div>
            </div>
         
        
          </div>
         </form>
                 
</div>
<div class="container my-5">
<div class="row text-center box p-3">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Checkout</div>
					<div class="panel-body">
						<div class="row">
              <div class="col-md-1 col-xs-1"></div>
							<div class="col-md-2 col-xs-2"><b>Name</b></div>
              <div class="col-md-2 col-xs-2"><b>Quantity</b></div>
							<div class="col-md-2 col-xs-2"><b>Price</b></div>
              <div class="col-md-2 col-xs-2"><b>Amount</b></div>
              <div class="col-md-2 col-xs-2"><b>Acion</b></div>
              <div class="col-md-1 col-xs-1"></div>
						</div>
						<div id="cart_checkout">
           
           
					
            </div>

					</div>
				</div>
				<div class="panel-footer">
        <div id="total"></div>

        <div class="text-end">	<button type="submit" id="sellend" class="btn btn-primary">Sell</button></div>
      
        
        </div>
			</div>
		
		</div>
</div>

