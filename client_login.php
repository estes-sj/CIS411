<!--GET method used to verify username and password with database by Samuel Estes-->
<!--User Login Authored by Samuel Estes-->
<!--Form Validation Authored By Samuel Estes (JavaScript) (Uncomment to use)-->
<!--HR: https://www.tutorialspoint.com/php/php_mysql_login.htm-->

<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['fusername']);
      $mypassword = mysqli_real_escape_string($db,$_POST['fpassword']); 
      
      $sql = "SELECT id FROM users WHERE email = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        //session_register("myusername");
        $_SESSION['login_user'] = $myusername;
        response(200, "Successful Login", $result);
        header("location: Dashboard.html");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo '<script>alert("Incorrect Username and/or Password.")</script>';
        # response(400,"Bad Request",$result);
      }
   }

   function response($status,$status_message,$data) 
   {
       $response['status']=$status;
       $response['status_message']=$status_message;
       $response['data']=$data;

       $json_response = json_encode($response);
       echo $json_response;
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up - Bargain Bites</title>
    <link rel="stylesheet" href="user_signin.css">
</head>

<body>
    <header>
        <img src="BargainBites.png" id="logo" alt="BargainBites">
        <hr>
    </header>
    <section name="sign_form" id="sign_form">
        <h1>Sign-In</h1>
        <p>
            Don't have an account? <a href="client_user_registration.php">Sign Up</a>
        </p>
        <form name="loginForm" action="" method="post">
        <!-- <form name="loginForm" action="Dashboard.html" method="post" onsubmit=validateForm()> -->
            <div class="outerform" style="text-align: center;">
                <div style="display: inline-block; text-align: left;">
                    <div>
                        <label for="fusername">Email</label>
                        <br>
                        <input type="text" name="fusername" id="fusername">
                    </div>
                    <br>
                    <div>
                        <label for="fpassword">Password </label>
                        <br>
                        <input type="password" name="fpassword" id="fpassword">
                    </div>
                    <br>
                </div>
                <input type="submit" value="Sign-In" id="submit">
            </div>
        </form>
        <script>
            function validateForm() {
                let x = document.forms["loginForm"]["fusername"].value;
                if (x == "") {
                    alert("Email must be filled out");
                    return false;
                }
                else if (!x.includes("@")) {
                    alert("Email not valid, must contain a '@'");
                    return false;
                }

                let y = document.forms["loginForm"]["fpassword"].value;
                if (y == "") {
                    alert("Password must be filled out.");
                    return false;
                }
                else if (y.length < 8 || y.length > 20) {
                    alert("Password must be between 8 and 20 characters.");
                    return false;
                }
            }
        </script>
    </section>
</body>

</html>