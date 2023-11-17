<?php
    session_start();
    if(isset($_SESSION['email']))
    {
        $email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>User Profile</title>
</head>
<body>
    <div class="container">
        <?php
            $conn = mysqli_connect("localhost", "root", "", "intern");
            $sql = "select *from emp where email='$email'";
            $res = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_array($res);
        ?>
        <h1>Wel-Come <span><?php echo $rows['name']; ?></span></h1>
        <div class="sm-container ">
            <form action="#" method="post">
                <div class="tab">
                    <h4>Name: </h4>
                    <input type="text" name="name" value="<?php echo $rows['name'] ?>" readonly/>
                </div>

                <div class="tab">
                    <h4>E-Mail ID: </h4>
                    <input type="text" name="email" value="<?php echo $rows['email'] ?>" readonly/>
                </div>

                <div class="tab">
                    <h4>Mobile No: </h4>
                    <input type="number" name="mobno" value="<?php echo $rows['mobno'] ?>" readonly/>
                </div>

                <div class="tab">
                    <h4>Address: </h4>
                    <input type="text" name="address" value="<?php echo $rows['address'] ?>" readonly />
                </div>
                
                <div class="tab">
                    <h4>Password: </h4>
                    <input type="text" name="address" value="<?php echo $rows['pwd'] ?>" readonly />
                </div>
                
                <div class="footer">
                    <p>Thank You!!! <a href="logout.php">LogOut</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
    }
    else{
        header("location: sign-in.php");
    }
?>