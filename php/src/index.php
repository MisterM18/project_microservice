<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<?php if (!isset($_SESSION['id'])) { #ไม่ได้ล็อกอิน
?>

<body>
    <div class="container" style="color: #fff;">
        <center>
            <?php include "nav.php"; ?>
            <br>
            <div>
                <section id="intro" class="s-intro">
                    <br>
                    <br>
                    <br>
                    <div class="s-intro__bg"></div>
                    <div class="row s-intro__content">
                        <div class="column lg-12">

                            <div class="s-intro__content-top">
                                <h1>
                                    We are currently working on something awesome. Stay tuned!
                                </h1>
                                <p class="">
                                    Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin,
                                    lorem quis bibendum auctor, nisi elit consequat ipsum.
                                </p>
                            </div> <!-- end s-intro__content-top -->

                            <div class="s-intro__content-sep">
                                <span></span>
                                <span>Time left until launching</span>
                                <span></span>
                            </div> <!-- end s-intro__content-sep -->

                            <div class="s-intro__content-counter counter">
                                <div class="counter__time">
                                    <span class="ss-days">365</span>
                                    <span>Days</span>
                                </div>
                                <div class="counter__time">
                                    <span class="ss-hours">03</span>
                                    <span>Hours</span>
                                </div>
                                <div class="counter__time minutes">
                                    <span class="ss-minutes">01</span>
                                    <span>Mins</span>
                                </div>
                                <div class="counter__time">
                                    <span class="ss-seconds">55</span>
                                    <span>Secs</span>
                                </div>
                            </div> <!-- end counter -->



                        </div>
                    </div> <!-- intro__content -->

                </section> <!-- end s-intro -->
        </center>
    </div>
    </div>
</body>
<?php } else { # login แล้ว 
?>

<body>
    <div class="container">
        <!-- <H1 style="text-align: center;">Webboard</H1> -->
        <?php include "nav.php"; ?>
        <br>


    </div>
</body>
<?php } ?>


</html>