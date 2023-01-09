<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTU-POS</title>
    <script src="https://use.fontawesome.com/c0444a4f04.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['HTTP_HOST'] ?>/resources/css/styles.css">
</head>

<body>
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
          <a class="nav-link " aria-current="page" href="/dashboard">Home</a>
        </li>
        <?php endif; ?>
        <?php if($_SESSION["user"]["user_role"] == "Procurement"): ?>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="/store">Home</a>
        </li>
        <?php endif; ?>
        <?php if($_SESSION["user"]["user_role"] == "Accountant"): ?>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="/trans">Home</a>
        </li>
        <?php endif; ?>
        <?php if($_SESSION["user"]["user_role"] == "Seller"): ?>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="/selling">Home</a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link active" href="/userprofile">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout">Sign out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>