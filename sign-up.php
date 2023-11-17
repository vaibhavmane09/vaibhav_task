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
    <title>Registration Page</title>
</head>
<body>
    <div class="container">
        <h1>Registration Form <hr>
        </h1>
        <div class="sm-container">

            <?php
                if(isset($_POST['submit'])){
                    $conn = mysqli_connect("localhost", "root", "", "intern");
                    if(!$conn){
                        die("Cannot connect to MySQL!");

                    }
                    else{
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $mobno = $_POST['mobno'];
                        $address = $_POST['address'];
                        $pwd = $_POST['pwd'];

                        $alreadyaccount = "select *from emp where email='$email'";
                        $res = mysqli_query($conn, $alreadyaccount) or die("Could Not Execute the Query!");
                        $rows = mysqli_num_rows($res);
                        if(($rows >= 1)){
                            echo '<script>';
                            echo 'alert("Sorry, You Already have an Account, Please LogIn")';
                            echo '</script>';
                        }
                        else{
                            $insertquery = "insert into emp(name, email, mobno, address, pwd) values('$name', '$email', '$mobno', '$address', '$pwd')";

                            $res = mysqli_query($conn, $insertquery);
                            if($res == 1){
                                echo '<script>';
                                echo 'alert("Good, Registration Done Successfully!")';
                                echo '</script>';

                                $_SESSION['email'] = $email;
                                header("location:profile.php");
                                exit();
                            }
                            else{
                                echo '<script>';
                                echo 'alert("Sorry, Could not Register, Please check filled Deatils!")';
                                echo '</script>';
                            }

                        }
                    }
                }
            ?>


            <form action="#" method="post" autocomplete="off" name="myForm" onsubmit="return formValidate()" > 

                <div class="tab">
                    <h4>Name: </h4>
                    <input type="text" name="name" id="name"/>
                </div>

                <div class="tab">
                    <h4>E-Mail ID: </h4>
                    <input type="text" name="email" id="email"/>
                </div>

                <div class="tab">
                    <h4>Mobile No: </h4>
                    <input type="number" name="mobno" id="mobno"/>
                </div>

                <div class="tab">
                    <h4>Address: </h4>
                    <input type="text" name="address" id="address"/>
                </div>

                <div class="tab">
                    <h4>Password: </h4>
                    <input type="password" name="pwd" id="pwd"/>
                </div>
                
                <div>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </div>
                <div class="footer">
                    <p>Already have an Account? ><a href="sign-in.php">SIGN IN</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="validation.js"></script>

</body>
</html>


<?php
    }
?>