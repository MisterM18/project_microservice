<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website With Login & Registration | Codehal</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<!-- Before Login -->

<?php if (!isset($_SESSION['id'])) { ?>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" >
   <div class="container-fluid">
    <a class="navbar-brand text-white" href="index.php">Welcome!</a>
      <button class="navbar-toggler white-border" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
      </button>


    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="#"><i class="bi bi-house-fill"></i>&nbsp;&nbsp; Dormitory</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white"  aria-current="page" href="board.php"><i class="bi bi-chat-square-text-fill"></i>&nbsp;&nbsp; WebBoard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white"  aria-current="page" href="login.php"><i class="bi bi-pencil-square"></i>&nbsp;&nbsp; Login</a>
        </li>
    </div>
  </div>
</nav>
 
<?php } else { ?>
<!-- After login  -->

<nav class="navbar navbar-expand-lg navbar-light bg-blur fixed-top " style="backdrop-filter: blur(30px);">
   <div class="container-fluid">
    <a class="navbar-brand text-white" href="index.php">Welcome!<?php echo $_SESSION['username']; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="#"><i class="bi bi-house-fill"></i>&nbsp;&nbsp; Dormitory</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white"  aria-current="page" href="board.php"><i class="bi bi-chat-square-text-fill"></i>&nbsp;&nbsp; WebBoard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white"  aria-current="page" href="login.php"><i class="bi bi-pencil-square"></i>&nbsp;&nbsp; Logout</a>
        </li>
    </div>
  </div>
</nav>

<?php } ?>

</html> 