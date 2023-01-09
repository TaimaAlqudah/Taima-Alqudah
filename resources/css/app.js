
$(document).ready(function(){

 // net_total();
  get_cart();
  get_trans();
  get_users();
  get_item();


  // code work when search button inside selling page click 

    $('#barcode_btn').click(function (e) {
    
      e.preventDefault();
      // get value inside input in search selling box 
       let item = $('#input_barcode').val();
      // if item empty stop work 
        if (item == "") {
            alert("You need to enter the item values to proceed!");
            return;
        }


     // call router slling / item send item bar code value 
      $.ajax({
			url : '/selling/item',
			method : 'GET',
			data : {item:item},
     // response will be json file inside it all object 
			success : function(response){


     // decode the response 

            var resp = $.parseJSON(response);


            // put the value inside the input in selling page 

            $("input[name='e_bar']").val(resp["barcode"]);
            $("input[name='e_name']").val(resp["item_name"]);
            $("input[name='e_price']").val(resp["buying_price"]);
            $("input[name='qq']").val(resp["quantity"]);
            $("input[name='selp']").val(resp["selling_price"]);
			} 

		});
    });

    $('.add-store').click(function (e) {
    
      e.preventDefault();

      var q = parseInt($("input[name='e_quantity']").val());
      var price = parseInt($("input[name='e_price']").val());
      var name = $("input[name='e_name']").val();
      var bar = $("input[name='e_bar']").val();
      var qq = $("input[name='qq']").val();
      var ss = parseInt($("input[name='selp']").val());
      var tl = q*ss;

      $.ajax({
			url : '/carts/createcarts/item',
			method : 'POST',
			data: {q:q,price:price,name:name , t:tl ,qq:qq , ss:ss , item_id:bar},
     // response will be json file inside it all object 
			success : function(response){
console.log(response);

var resp = $.parseJSON(response);
if(resp.status == 303){
  alert(resp.message);
} 
get_cart();
$("input[name='qq']").val(q+parseInt(qq));

			} 

		});
    });

    // when value of discount change 

    $("#dis").on("change", function(){
      
      // get value from input andparse it to int
      var x = parseInt( $("input[name='e_discount']").val());
      var y = parseInt($("input[name='e_quantity']").val());
      var z = parseInt($("input[name='e_price']").val());

      var discount = (x/100 )* y * z ;

      var total = (y*z)-discount;
      
      // put the value inside amount
      $("input[name='e_amount']").val(total);

  
    });

    // when submit cart form 

  $("#sell").on("submit", function(){

    // get value inside cart form 
    var q = parseInt($("input[name='e_quantity']").val());
    var price = parseInt($("input[name='e_price']").val());
    var name = $("input[name='e_name']").val();
    var tl = parseInt($("input[name='e_amount']").val());
    var qq = $("input[name='qq']").val();
    var ss = parseInt($("input[name='selp']").val());
    var bar = $("input[name='e_bar']").val();

    // send value to carts to create 

    $.ajax({
			url : '/carts/createcarts',
			method : 'POST',
      //  to get value Post["t"] = tl
			data: {q:q,price:price,name:name , t:tl ,qq:qq , ss:ss , item_id:bar},
			success : function(response){
        console.log(response);
        var resp = $.parseJSON(response);
        if(resp.status == 303){
					alert(resp.message);
				} 

        if(resp.status == 202){
          alert(resp.message);
          $("input[name='qq']").val(parseInt(qq)-q);
        }
        get_cart();
        
			} 
		});

  });

$("#sellend").on("click", function(){
  $.ajax({
    url : '/carts/end',
    method : 'POST',
    data: {sellend:1},
    success : function(response){
      console.log(response);
      get_cart();
    } 
  });

});

$(document.body).on('click', '.delete-product', function(){

  var pid = $(this).attr('pid');
  if (confirm("Are you sure to delete this item ?")) {
    $.ajax({

      url : '/carts/delete',
      method : 'POST',
      data : {pid:pid},
      success : function(response){
        var resp = $.parseJSON(response);
        if (resp.status == 202) {
          get_cart();
        }else if (resp.status == 303) {
          alert(resp.message);
        }
      }

    });
  }else{
    alert('Cancelled');
  }

});

function get_cart(){
  $.ajax({
    url : '/carts/getitems',
    method : 'GET',
    data: {item:1},
    success : function(response){
      var resp = $.parseJSON(response);
      productList = resp;
      productHTML='';

					if (productList) {
						$.each(resp, function(index, value){

							productHTML += '<div class="row my-3">'+
              '<div class="col-md-1 "></div>'+
              '<div class="col-md-2 text-center">'+value.name+'</div>'+
              '<div class="col-md-2 text-center">'+value.quantity+'</div>'+
              '<div class="col-md-2 text-center">'+value.price+'</div>'+
              '<div class="col-md-2 text-center">'+value.total+'</div>'+
              '<div class="col-md-2 "><a pid="'+value.id+'" class="btn btn-sm btn-danger delete-product" style="color:#fff;"><i class="fas fa-trash-alt"></i></a></div>'+
              '<div class="col-md-1 "></div>'+
              '</div>';
						});

						$("#cart_checkout").html(productHTML);
					}
    } 
  });
}

function get_trans(){
  $.ajax({
    url : '/trans/item',
    method : 'GET',
    data: {item:1},
    success : function(response){
      var resp = $.parseJSON(response);
      productList = resp;
      productHTML='';

					if (productList) {
						$.each(resp, function(index, value){

							productHTML += '<div class="row my-3">'+
              '<div class="col-md-1 text-center">'+value.id+'</div>'+
              '<div class="col-md-1 text-center">'+value.item_id+'</div>'+
              '<div class="col-md-2 text-center">'+value.item_quantity+'</div>'+
              '<div class="col-md-2 text-center">'+value.transaction_amount+'</div>'+
              '<div class="col-md-2 text-center">'+value.created_at+'</div>'+
              '<div class="col-md-2 text-center">'+value.update_at+'</div>'+
              '<div class="col-md-2 "><a class="btn btn-sm btn-info edit_trans_modal" style="color:#fff;"><span style="display:none;">'+JSON.stringify(value)+'</span><i class="fas fa-pencil-alt"></i></a>&nbsp;<a pid="'+value.id+'" class="btn btn-sm btn-danger delete-trans" style="color:#fff;"><i class="fas fa-trash-alt"></i></a></div>'+
              '</div>';
						});
            $("#count2").html("Transaction List ("+productList.length+")");
						$("#trans_list").html(productHTML);
					}
    } 
  });
}

function get_item(){
  $.ajax({
    url : '/store/getitems',
    method : 'GET',
    data: {item:1},
    success : function(response){
      var resp = $.parseJSON(response);
      productList = resp;
      productHTML='';

					if (productList) {
						$.each(resp, function(index, value){

							productHTML += '<div class="col-lg-3 m-3 box col-md-4 col-sm-6 pb-4">'+
              '<div class="box p-2 white text-center">'+
              '<img  src="../resources/img/'+value.image+'" class="img-fluid z-depth-1"/>'+'</div>'+
              '<div class="text-center mt-2">'+
              '<h6 class="font-weight-bold pt-2 mb-0">Name: '+ value.item_name+'</h6>'+
              '<p class="text-muted mb-0"><strong>Selling Price: '+ value.selling_price+'</strong></p>'+
              '<p class="text-muted mb-0"><strong>Buying Price: '+ value.buying_price+'</strong></p>'+
              '<p class="text-muted mb-0"><strong>Code: '+ value.barcode+'</strong></p>'+
              '<p class="text-muted mb-0"><strong>Quantity: '+ value.quantity+'</strong></p>'+
              
              '</div>'+
              '<div class="row my-3">'+
              
              '<div class="col-md-3 "><a class="btn btn-sm btn-info edit_item_modal" style="color:#fff;"><span style="display:none;">'+JSON.stringify(value)+'</span><i class="fas fa-pencil-alt"></i></a>'+
              '</div>'+
              '<div class="col"></div>'+
              '<div class="col-md-5">'+
              '<a pid="'+value.id+'" class="btn btn-sm btn-danger delete-item" style="color:#fff;"><i class="fas fa-trash-alt"></i></a></div>'+
              '</div>'+'</div>';
						});
            $("#count1").html("Items List ("+productList.length+")");
						$(".item_list").html(productHTML);
					}
    } 
  });
}

function get_users(){
  $.ajax({
    url : '/users/get',
    method : 'GET',
    data: {item:1},
    success : function(response){
      var resp = $.parseJSON(response);
      productList = resp;
      productHTML='';
 
					if (productList) {
						$.each(resp, function(index, value){
							productHTML += '<div class="col-lg-3 m-3 box col-md-4 col-sm-6 pb-4">'+
              '<a href="/userProfileInfo?id='+value.id+'"><div class="box p-2 white text-center">'+
              '<img id="cds" idc="'+value.id+'"  src="../resources/img/'+value.image+'" class="img-fluid z-depth-1"/>'+'</div></a>'+
              '<div class="text-center mt-2">'+
              '<h6 class="font-weight-bold pt-2 mb-0">'+value.username+'</h6>'+
              '<p class="text-muted mb-0"><small>'+value.role+'</small></p>'+
              '</div>'+
              '<div class="row my-3">'+
              
              '<div class="col-md-3 "><a class="btn btn-sm btn-info edit_user_modal" style="color:#fff;"><span style="display:none;">'+JSON.stringify(value)+'</span><i class="fas fa-pencil-alt"></i></a>'+
              '</div>'+
              '<div class="col"></div>'+
              '<div class="col-md-5">'+
              '<a pid="'+value.id+'" class="btn btn-sm btn-danger delete-user" style="color:#fff;"><i class="fas fa-trash-alt"></i></a></div>'+
              '</div>'+'</div>';
						});

            $("#count").html("Users List ("+productList.length+")");
						$(".user_list").html(productHTML);
					}
    } 
  });
}


$(".add-user").on("click", function(){
  var username1 = $("input[name='username']").val();
  var image1 = $("input[name='image']").val();
  var role1 = $("select[name='role']").val();
  var email1 = $("input[name='email']").val();
  var password1 = $("input[name='password']").val();

 $.ajax({
    url : '/users/createuser',
    method : 'POST',
    data : new FormData($("#add-user-form")[0]),
    contentType : false,
    cache : false,
    processData : false,
  //  data : {username:username1,password:password1,image:image1,role:role1,email:email1},
    success : function(response){
      get_users();
      $("input[name='username']").val("");
      $("input[name='image']").val("");
      $("select[name='role']").val("");
      $("input[name='email']").val("");
      $("input[name='password']").val("");
      $("#add_user_modal").modal('hide');
    }
  })

});

$(".submit-edit-user").on("click", function(){
  var username1 = $("input[name='e_username']").val();
  var image1 = $("input[name='e_image']").val();
  var role1 = $("select[name='e_role']").val();
  var email1 = $("input[name='e_email']").val();
  var password1 = $("input[name='e_password']").val();
  var id = $("input[name='pid']").val();

 $.ajax({
    url : '/users/updateuser',
    method : 'POST',
    data : new FormData($("#edit-user-form")[0]),
    contentType : false,
    cache : false,
    processData : false,
   // data : {id:id,username:username1,password:password1,image:image1,role:role1,email:email1},
    success : function(response){
      
      $("#edit_user_modal").modal('hide');
       $("input[name='username']").val("");
       $("input[name='image']").val("");
       $("select[name='role']").val("");
       $("input[name='email']").val("");
       $("input[name='password']").val("");
       $("input[name='pid']").val("");
      get_users();
    }
  })

});

$(".update").on("click", function(){

var id=  $("input[name='id']").val();

 $.ajax({
    url : '/updateprofile',
    method : 'POST',
    data : new FormData($("#pro")[0]),
    contentType : false,
    cache : false,
    processData : false,
    async: true,
   // data : {id:id,username:username1,password:password1,image:image1,role:role1,email:email1},
    success : function(response){
      console.log(response);
      var resp = $.parseJSON(response);
      if (resp.status == 202){
        $.ajax({
        url : '/getUser',
        method : 'GET',
        data : {id:id},
        success : function(response1){
          var resp1 = $.parseJSON(response1);
        
           $("input[name='username']").val(resp1[0]["username"]);
           $("#vv").html('<img  class="w-100" src="../resources/img/'+resp1[0]["image"]+'" alt="">');
           $("input[name='email']").val(resp1[0]["email"]);
           $("input[name='password']").val("");
      }
      })}
      get_users();
    }
  })



});

$(document.body).on('click', '.delete-user', function(){

  var pid = $(this).attr('pid');
  if (confirm("Are you sure to delete this user ?")) {
    $.ajax({

      url : '/users/deleteuser',
      method : 'POST',
      data : {pid:pid},
      success : function(response){
        var resp = $.parseJSON(response);
        if (resp.status == 202) {
          get_users();
        }else if (resp.status == 303) {
          alert(resp.message);
        }
      }

    });
  }else{
    alert('Cancelled');
  }

});

$(".add-item").on("click", function(){

 $.ajax({
    url : '/store/createitems',
    method : 'POST',
    data : new FormData($("#add-item-form")[0]),
    contentType : false,
    cache : false,
    processData : false,
   // data : {item_name:item_name1,barcode:barcode1,selling_price:selling_price1,image:image1,buying_price:buying_price1,quantity:quantity1},
    success : function(response){
      get_item();
      $("#add_item_modal").modal('hide');
      $("#edit-item-modal").trigger("reset");
      $("#add-item-modal").trigger('reset');

 $("input[name='item_name']").val("");
  $("input[name='image']").val("");
 $("input[name='selling_price']").val("");
 $("input[name='buying_price']").val('');
 $("input[name='quantity']").val("");
   $("input[name='barcode']").val('');
    }
  })

});

$(".submit-edit-item").on("click", function(){

 $.ajax({
    url : '/store/updateitems',
    method : 'POST',
    data : new FormData($("#edit-item-form")[0]),
    contentType : false,
    cache : false,
    processData : false,
    //data : {id:id,item_name:item_name1,barcode:barcode1,selling_price:selling_price1,image:image1,buying_price:buying_price1,quantity:quantity1},
    success : function(response){
     console.log(response);
    
      get_item();
      $("#edit_item_modal").modal('hide');
      $("#edit_item_modal").trigger("reset");
      $("#add-item-modal").trigger('reset');
      

      $("input[name='item_name']").val("");
      $("input[name='image']").val("");
     $("input[name='selling_price']").val("");
     $("input[name='buying_price']").val('');
     $("input[name='quantity']").val("");
       $("input[name='barcode']").val('');
    }
  })

});


$(document.body).on('click', '.delete-item', function(){

  var pid = $(this).attr('pid');
  if (confirm("Are you sure to delete this item ?")) {
    $.ajax({

      url : '/store/deleteitems',
      method : 'POST',
      data : {pid:pid},
      success : function(response){
        get_item();
        
      }

    });
  }else{
    alert('Cancelled');
  }

});

$(document.body).on('click', '.delete-trans', function(){

  var pid = $(this).attr('pid');
  if (confirm("Are you sure to delete this trans ?")) {
    $.ajax({

      url : '/trans/delete',
      method : 'POST',
      data : {pid:pid},
      success : function(response){
        var resp = $.parseJSON(response);
        if (resp.status == 202) {
          get_trans();
        }else if (resp.status == 303) {
          alert(resp.message);
        }
      }

    });
  }else{
    alert('Cancelled');
  }

});





    $(document.body).on('click', '.delete-trans', function(){

      var pid = $(this).attr('pid');
      if (confirm("Are you sure to delete this trans ?")) {
        $.ajax({
    
          url : '/trans/delete',
          method : 'POST',
          data : {pid:pid},
          success : function(response){
            var resp = $.parseJSON(response);
            if (resp.status == 202) {
              get_trans();
            }else if (resp.status == 303) {
              alert(resp.message);
            }
          }
    
        });
      }else{
        alert('Cancelled');
      }
    
    });


    $(".add_user_modal").on("click", function(){
		$("#add_user_modal").modal('show');
	});

  $(document.body).on('click', '.edit_user_modal', function(){  
 

      var product = $.parseJSON($.trim($(this).find('span').text()));
    
      $("input[name='username']").val(product.username);
      $("select[name='role']").val(product.role);
      $("input[name='image']").siblings("img").attr("src", "../resources/img/"+product.image);
      $("input[name='email']").val(product.email);
      $("input[name='password']").val(product.password);
      $("input[name='pid']").val(product.id);
      $("#edit_user_modal").modal('show'); 
    	$("#edit_user_modal").trigger("reset");
      $("#add_user_modal").trigger('reset');

      console.log(product.role);
      console.log($("select[name='role']").val());

    
	});
  
  $(document.body).on('click', '.edit_item_modal', function(){  
 

    var product = $.parseJSON($.trim($(this).find('span').text()));
  
    $("input[name='item_name']").val(product.item_name);
    $("input[name='image']").siblings("img").attr("src", "../resources/img/"+product.image);
    $("input[name='selling_price']").val(product.selling_price);
    $("input[name='buying_price']").val(product.buying_price);
    $("input[name='quantity']").val(product.quantity);
    $("input[name='barcode']").val(product.barcode);
    $("input[name='pid']").val(product.id);

    $("#edit_item_modal").modal('show'); 
    $("#edit_item_modal").trigger("reset");
    $("#add_item_modal").trigger('reset');

  
});
  
    $(".add_item_modal").on("click", function(){
		$("#add_item_modal").modal('show');
	});


  $(document.body).on('click', '.edit_trans_modal', function(){  
 

    var product = $.parseJSON($.trim($(this).find('span').text()));
  
    $("input[name='e_barcode']").val(product.item_id);
    $("input[name='e_item_q']").val(product.item_quantity);
    $("input[name='e_trans_a']").val(product.transaction_amount);
    $("input[name='pid']").val(product.id);

    $("#edit_trans_modal").modal('show'); 
    $("#edit_trans_modal").trigger("reset");

  
});

  $(".close").on("click", function(){

    $("#add_item_modal").modal('hide'); 
    $("#edit_item_modal").modal('hide'); 
    $("#add_user_modal").modal('hide'); 
    $("#edit_user_modal").modal('hide'); 
    $("#edit_trans_modal").modal('hide'); 

   
   });

   $(".submit-edit-trans").on("click", function(){

    $.ajax({
       url : '/trans/update',
       method : 'POST',
       data : new FormData($("#edit-trans-form")[0]),
       contentType : false,
       cache : false,
       processData : false,
       success : function(response){
        console.log(response);
       
         get_trans();
         $("#edit_trans_modal").modal('hide');
         $("#edit_trans_modal").trigger("reset");
         
   
         $("input[name='e_barcode']").val("");
         $("input[name='e_item_q']").val("");
         $("input[name='e_trans_a']").val("");

       }
     })
   
   });




});
