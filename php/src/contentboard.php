<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php include "nav.php"; ?>
        <br>
        <?php if (!isset($_SESSION['id'])) { #ไม่ได้ล็อกอิน?>

<!-- ตัวอย่างหน้าตา board talking  -->
<div class="d-flex justify-content-between">
                        
                
            
            <br>
            <br>
            <div class="card h-50 w-100 text-start">
                <div class="card-body text-left">
                    <h5 class="card-title" style="color: #fff;">
                        <i class="bi bi-chat-left-dots"></i>&nbsp;&nbsp;ทำยังไงให้เรียนเก่ง
                    </h5>
                    <p class="card-text" style="color: #fff;">
                        With supporting text below as a natural lead-in to additional content.
                    </p>

                    <div id="message-board">
        <h1 style="color: #fff;">Simple Message Board</h1>

        <form method="post" action="">
            <label for="message" style="color: #fff;">Post a message:</label>
            <textarea id="message" name="message" required></textarea>
            <br>
            <button type="submit">Post Message</button>
        </form>

        <?php
        // Display messages
        if (!empty($messages)) {
            echo '<h2>Messages</h2>';
            foreach ($messages as $msg) {
                echo '<div class="message">' . htmlspecialchars($msg) . '</div>';
            }
        } else {
            echo '<p>No messages yet.</p>';
        }
        ?>
    </div>
                </div>
            </div>
            </div>
                <?php
              include 'db.php';
                $login = ''; // กำหนดค่าเริ่มต้นเป็นสตริงว่าง
                if (isset($_POST['login'])) {
                    $login = $_POST['login']; // กำหนดค่า $login จากข้อมูล POST
                }
                $sql = "SELECT * FROM user where login='$login'";
                $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>{$row['name']} <a href=post.php?id={$row['id']} style='text-decoration:none'>{$row['title']}</a></td><td>{$row['login']} - {$row['post_date']}</td></tr>";
                }
            } 
            $conn->close();
              ?>
            </table> -->
            </div>
    </div>
</body>
<?php } else { # login แล้ว ?>

<body>
    <div class="container">
        <!-- <H1 style="text-align: center;">Webboard</H1> -->
        <?php include "nav.php"; ?>
        <br>
        <div class="d-flex justify-content-between">
            <div>
                <label>หมวดหมู่:</label>
                <span class="dropdown">
                    <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="Button2"
                        data-bs-toggle="dropdown" aria-expanded="false">--ทั้งหมด--</button>
                    <ul class="dropdown-menu" aria-labelledby="Button2">
                        <li><a href="#" class="dropdown-item">ทั้งหมด</a></li>
                        <?php
                         include 'db.php';
                           $login = ''; // กำหนดค่าเริ่มต้นเป็นสตริงว่าง
                           if (isset($_POST['login'])) {
                           $login = $_POST['login']; // กำหนดค่า $login จากข้อมูล POST
                           }
                           // ต่อมาสร้างคำสั่ง SQL โดยใช้ $login
                           $sql = "SELECT * FROM user where login='$login'";
                           $sql = "SELECT * FROM category";
                            foreach ($conn->query($sql) as $row) {
                                echo "<li><a class=dropdown-item href=#>$row[name]</a></li>";
                            }
                            $conn = null
                            ?>
                    </ul>
                </span>
            </div>
            <div><a href="newpost.php" class="btn btn-success btn-sm"><i class="bi bi-plus"></i> สร้างกระทู้ใหม่</a>
            </div>
        </div>
        <br>
        <table class="table table-striped">
            <?php
                include 'db.php';
                if ($conn->connect_error) {
                    die("การเชื่อมต่อกับฐานข้อมูลล้มเหลว: " . $conn->connect_error);
                }

                // เปลี่ยน $sql เพื่อค้นหาผู้ใช้โดยใช้ $login
                $login = mysqli_real_escape_string($conn, $login); // ป้องกัน SQL Injection
                $sql = "SELECT t3.name,t1.title,t1.id,t2.login,t1.post_date
                FROM post as t1 INNER JOIN user as t2 ON (t1.user_id=t2.id) 
                INNER JOIN category as t3 ON (t1.cat_id=t3.id) 
                ORDER BY t1.post_date DESC";

                $result = $conn->query($sql);

                if ($result === false) {
                    die("เกิดข้อผิดพลาดในการดึงข้อมูล: " . $conn->error);
                }

                while ($row = $result->fetch_array()) {
                echo "<tr><td>{$row[0]} <ahref='post.php?id={$row[2]}' style='text-decoration:none'>{$row[1]}</a><br>{$row[3]} - {$row[4]}</td>";
                if ($_SESSION['role'] == 'a') {
                echo  "<td><a href='delete.php?id={$row[2]}'><button type='button' class='btn btn-danger btn-sm'><i class='bi bi-trash'></i></button></a></td>";
                }
                echo "</tr>";
                }
                $conn->close();
            ?>

        </table>


        <!-- ตัวอย่างหน้าตา board talking  -->
            <div class="card h-50 w-100 text-start">
                <div class="card-body text-left">
                    <h5 class="card-title" style="color: #fff;">
                        <i class="bi bi-chat-left-dots"></i>&nbsp;&nbsp;ทำยังไงให้เรียนเก่ง
                    </h5>
                    <p class="card-text" style="color: #fff;">
                        With supporting text below as a natural lead-in to additional content.
                    </p>
                    <a href="#" class="btn btn-primary">Read</a>
                </div>
            </div>

        <br>
        <div class="card h-50 , w-100">
            <div class="card-body">
             <h5 class="card-title" style="color: #fff;"><i class="bi bi-chat-left-dots"></i>&nbsp;&nbsp;แนะนำร้านอาหารหลังมจพ.</h5>
             <p class="card-text"style="color: #fff;">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Read</a>
            </div>
        </div>
        <!-- board talking -->
    </div>
</body>
<?php } ?>
<div class="card-board">


</div>
</div>

</center>
</body>

</html>