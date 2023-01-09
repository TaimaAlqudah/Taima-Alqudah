<div class="container py-5 z-depth-1">

 
 <!--Section: Content-->
 <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">


   <!--Grid row-->
   <div class="row d-flex ">

   <div class="col-md-6">
   <div class="container box" style="max-height: 300px; max-width: 300px;overflow: hidden;">
    <img id="pvv"  class="w-100" src="../resources/img/<?= $data->user->image ?>" alt="">
   </div>
   </div>
   

     <!--Grid column-->
     <div class="col-md-6 p-3 box text-start">
      <div id="pname" class="text_info">
        Name : <?= $data->user->username  ?>
      </div>
      <div id="pemail" class="text_info">
        Email : <?= $data->user->email ?>
      </div>
      <div id="ppass" class="text_info">
        Password : <?= $data->user->password ?>
      </div>
      <div id="prole" class="text_info">
        Role : <?= $data->user->role ?>
      </div>
      <div id="pu" class="text_info">
        Update At : <?= $data->user->updated_at ?>
      </div>
      <div id="pc" class="text_info">
        Create At : <?= $data->user->created_at ?>
      </div>
     </div>
     
   </div>
     
   <!--Grid row-->


</section>
 <!--Section: Content-->


</div>
