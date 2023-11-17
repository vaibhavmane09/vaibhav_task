<?php
    ob_start();
    session_start();
    if(isset($_SESSION['email'])){
        header("location:profile.php");
    }
    else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>SIGN IN Page</title>
</head>
<body>
    <div class="container">
        <h1>LogIn Here<hr>
        </h1>
        <div class="sm-container">

            <?php
                if(isset($_POST['login'])){
                    $conn = mysqli_connect("localhost", "root", "", "intern");

                    $email = $_POST['email'];
                    $pwd = $_POST['pwd'];

                    $select = "select *from emp where email = '$email' and pwd = '$pwd'";
                    $res = mysqli_query($conn, $select) or die("Could not execute the Query!");

                    if(mysqli_num_rows($res) == 1){
                        $_SESSION['email'] = $email;
                        header("location:profile.php");
                        exit();
                    }
                    else{
                        echo '<script>';
                        echo 'alert("Sorry, LogIn Failed, Please check E-mail and Passsword!")';
                        echo '</script>';
                    }
                }
            ?>
            <form action="#" method="post" autocomplete="off">

                <div class="tab">
                    <h4>E-Mail ID: </h4>
                    <input type="text" name="email" />
                </div>

                <div class="tab">
                    <h4>Password: </h4>
                    <input type="password" name="pwd" />
                </div>
                
                <div>
                    <input type="submit" name="login" value="LogIn" class="btn">
                </div>
                <div class="footer">
                    <p>Don't have an Account? ><a href="sign-up.php">SIGN UP</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
    }
?>
