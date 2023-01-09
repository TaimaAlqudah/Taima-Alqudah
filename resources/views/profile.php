<div class="container py-5 z-depth-1">

 
 <!--Section: Content-->
 <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">


   <!--Grid row-->
   <div class="row d-flex ">
   <p class="h4 my-5">Profile</p>

   <div class="col-md-6">
   <div id="vv" class="container box" style="max-height: 300px; max-width: 300px;overflow: hidden;">
    <img  class="w-100" src="../resources/img/<?=$_SESSION["user"]["image"] ?>" alt="">
   </div>
   </div>
   

     <!--Grid column-->
     <div class="col-md-6 p-3 box">

       <!-- Default form subscription -->
       <form id="pro"  enctype="multipart/form-data" onsubmit="return false">
         <!-- Name -->
         <input type="text"  name="username"value="<?=$_SESSION["user"]["username"] ?>" class="form-control mb-4" placeholder="Name">

         <!-- Email -->
         <input type="email" name="email"value="<?=$_SESSION["user"]["user_email"] ?>" class="form-control mb-4" placeholder="E-mail">
         

         <input type="text"  name="id" value="<?=$_SESSION["user"]["user_id"]?>" class="form-control mb-4" hidden >
         <!-- Name -->
         <input type="text"  name="password" class="form-control mb-4" placeholder="New password">

       
         <input type="file"   name="image" class="form-control mb-4" placeholder="Photo">
     </div>
     
   </div>

        <button class="btn btn-info btn-block mt-5 update" type="submit">save</button>
       <!-- Default form subscription -->
</form>
     
   <!--Grid row-->


</section>
 <!--Section: Content-->


</div>
