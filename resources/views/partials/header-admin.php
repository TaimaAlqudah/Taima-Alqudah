
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTU-POS</title>
    <script src="https://use.fontawesome.com/c0444a4f04.js"></script>
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['HTTP_HOST'] ?>/resources/css/styles.css">
</head>

<body class="admin-view">
 

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">HTU-POS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <?php if($_SESSION["user"]["user_role"] == "Admin"): ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/dashboard">Home</a>
        </li>
        <?php endif; ?>
        <?php if($_SESSION["user"]["user_role"] == "Procurement"): ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/store">Home</a>
        </li>
        <?php endif; ?>
        <?php if($_SESSION["user"]["user_role"] == "Accountant"): ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/trans">Home</a>
        </li>
        <?php endif; ?>
        <?php if($_SESSION["user"]["user_role"] == "Seller"): ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/selling">Home</a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="/userprofile">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout">Sign out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div id="admin-area" class="row">
    <div class="col-auto col-md-2 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <?php if($_SESSION["user"]["user_role"] == "Admin"): ?>
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link align-middle px-0">
                            DASHBOARD
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if($_SESSION["user"]["user_role"] == "Admin"): ?>
                            <li class="nav-item">
                                <a href="/users" class="nav-link px-0">Users</a>
                            </li>
                            <?php endif; ?>
                            <?php if($_SESSION["user"]["user_role"] == "Admin" || $_SESSION["user"]["user_role"] == "Procurement"): ?>
                            <li class="nav-item">
                                <a href="/store" class="nav-link px-0">Store</a>
                            </li>
                            <?php endif; ?>
                            <?php if($_SESSION["user"]["user_role"] == "Admin" || $_SESSION["user"]["user_role"] == "Seller"): ?>
                     
                            <li class="nav-item">
                                <a href="/selling" class="nav-link px-0">Selling</a>
                            </li>
                            <?php endif; ?>
                            <?php if($_SESSION["user"]["user_role"] == "Admin" || $_SESSION["user"]["user_role"] == "Accountant"): ?>
                            <li class="nav-item">
                                <a href="/trans" class="nav-link px-0">Transaction</a>
                            </li>
                            <?php endif; ?>
                        <hr>
                       <!--  <div class="dropdown pb-4">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                <span class="d-none d-sm-inline mx-1"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                <li><a class="dropdown-item" href="/admin/profile">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="/logout" method="POST" class="dropdown-item">
                                        <button type="submit" class="btn btn-outline-light">Sign out</button>
                                    </form>
                                </li>
                            </ul>
                        </div> -->
                </div>
            </div>
       
        <div class="col-10 admin-area-content">
            <div class="container my-5">