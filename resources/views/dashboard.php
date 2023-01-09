

<?php
 require_once 'resources\views\partials\header-admin.php';

use Core\Helpers\Helper;

if (!empty($_SESSION) && isset($_SESSION['user']) && !empty($_SESSION['user']) && $_SESSION['user']["user_role"]=="seller" ): 
   
    Helper::redirect('/selling');

   
endif; ?>


<?php
if (true): 
?>
    <section>

    <!--Grid row-->
    <div class="row">


    <div class="col-md-3 col-lg-3 text-center ps-1 py-1">
    <div class="media white box z-depth-1 rounded">
      <div>  <img src="../resources/img/user.png" class="w-25" alt=""></div>
          <i class="far fa-money-bill-alt fa-lg blue z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>count of Users</small></p>
            <h5 class="font-weight-bold mb-0"><?= $data->users_count ?></h5>
          </div>
    </div>
    </div>


    
    <div class="col-md-3 col-lg-3 text-center p-1">
    <div class="media white box z-depth-1 rounded">
      <div>  <img src="../resources/img/money.png" class="w-25" alt=""></div>
          <i class="far fa-money-bill-alt fa-lg blue z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>total sales</small></p>
            <h5 class="font-weight-bold mb-0"><?= $data->total ?> JD</h5>
          </div>
    </div>
    </div>

    <div class="col-md-3 col-lg-3 text-center p-1">
    <div class="media white box z-depth-1 rounded">
      <div>  <img src="../resources/img/wallet.png" class="w-25" alt=""></div>
          <i class="far fa-money-bill-alt fa-lg blue z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>total transactions</small></p>
            <h5 class="font-weight-bold mb-0"><?= $data->trans_count ?></h5>
          </div>
    </div>
    </div>


    <div class="col-md-3 col-lg-3 text-center ps-1 py-1">
    <div class="media white box z-depth-1 rounded">
      <div>  <img src="../resources/img/box2.png" class="w-25" alt=""></div>
          <i class="far fa-money-bill-alt fa-lg blue z-depth-1 p-4 rounded-left text-white mr-3"></i>
          <div class="media-body p-1">
            <p class="text-uppercase text-muted mb-1"><small>total items</small></p>
            <h5 class="font-weight-bold mb-0"><?= $data->items_count ?></h5>
          </div>
    </div>
    </div>




    </div>
    <!--Grid row-->

  </section>
  <!-- Section: Block Content -->
 
<?php
endif;
?>


  <!-- Section: Block Content -->
  <section class="team-section my-5 text-center">

  <h1>Top Five</h1>
      
      <div class="card-body">
        <div class="row text-center pt-4">

         <?php foreach ($data->top as $item) : ?>
          <div class="col-lg-3 m-3 box col-md-4 col-sm-6 pb-4">
            <div class="box p-2 image white text-center">
             <img  src="../resources/img/<?= $item->image ?>" class="img-fluid z-depth-1"/>
            </div>
            <div class="text-center mt-2">
              <h6 class="font-weight-bold pt-2 mb-0"><?= $item->item_name ?></h6>
              <p class="text-muted mb-0"><strong>Selling price: </strong> <?= $item->selling_price ?></p>
              <p class="text-muted mb-0"><strong>Buying price: </strong>  <?= $item->buying_price?></p>
              <p class="text-muted mb-0"><strong>Barcode: </strong>  <?= $item->barcode?></p>
              <p class="text-muted mb-0"><strong>quantity :</strong>  <?= $item->quantity?></p>
            </div>
            </div>
       

 
          <?php endforeach; ;?>
          
        </div>
      </div>
    

  </section>