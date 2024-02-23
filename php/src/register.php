<?php session_start();
if(isset($_SESSION['id'])){
    header("location:index.php");
    die();
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    
    <script src="scripts.js"></script>
</head>

<body>
    <div class="container" >
        <?php include "nav.php"; ?>
        <?php
                    if(isset($_SESSION['add_login'])){
                        if($_SESSION['add_login']=="error"){
                            echo "<div class= 'alert alert-danger'>
                                    ชื่อบัญชีซ้ำหรือฐานข้อมูลมีปัญหา</div>";
                        }else if($_SESSION['add_login']=="success") {
                        echo "<div class= 'alert alert-success'>
                                    เพิ่มบัญชีเรียบร้อยแล้ว</div>";
                        }
                        unset($_SESSION['add_login']);
                    }
                
                ?>
                <br>
                <br><center>
       <div class="card-register">
            <div class="form-box">
            <br>
                <h2 style="color:#fff;"><center>Register</center></h2>
                <form action="register_save.php" method="post">
                    <div class="input-box">
                        <span class="icon" style="color:#fff;" >
                        <ion-icon name="person-circle"></ion-icon>
                        </span>
                        <input type="Username" name="login" required>
                        <label>Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon" style="color:#fff;">
                        <ion-icon name="mail"></ion-icon>
                        </span>
                        <input type="text" name ="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <input type="password" name="pwd" required>
                        <label>Password</label>
                        
                    </div>
                    <div class="input-box">
                        <input type="password" name="pwd" required>
                        <label>ConfirmPassword</label>
                        
                    </div>
                   
                    <div class="input-box">
                        <span class="icon"></span>
                        <input type="text" name="namelastname" required>
                        <label>Name & Surname</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"></span>
                        <input type="text" name="phoneNumber" required>
                        <label>PhoneNumber</label>
                    </div>
                    <div class="form-wrapper">
                        <select name id class="form-control">
                            <option   option value disabled selected> Select Your Gender</option required>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="o">Other</option>
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                    </div>
                                <br>
                                <br>
                    <button type="submit" class="btn">Register</button>
                    <br>
                    <br>
                        <div style="color:#fff;"> 
                            if your have account <a href="login.php"> login </a> here 
                        </div>
                </form>
            </div>
           
       </div>
       <center>
    </div>
</body>

</html>