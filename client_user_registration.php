<!--Client User Registration by Ssamuel Estes-->
<!--Form Validation Authored by Samuel Estes (HTML Validation)-->
<!--POST method to add new user to database by Samuel Estes-->
<?php
include("config2.php");
session_start();

if(isset($_GET['first_name']) & isset($_GET['last']) & isset($_GET['password']) & isset($_GET['email']) & isset($_GET['phone'])) {
    $firstName = $_GET['first_name'];
    $lastName = $_GET['last'];
    $password = $_GET['password']; 
    $email = $_GET['email']; 
    $mobileNumber = $_GET['phone'];  

    $sql = "INSERT INTO users (id, firstName, lastName, email, password, mobileNumber) VALUES (NULL, '$firstName', '$lastName', '$email', '$password', '$mobileNumber')";
    //echo $sql; exit; //debug query
    $result = $conn->query($sql);
    //header("location: Dashboard.html");
    if($result)//successfully inserted
    {
        response(200, "User Inserted",$result);
        header("location: Dashboard.html");
    } else{
        response(400,"User not inserted",$result);
    }
}
else {
    response(400,"Invalid Request",NULL);
}
function response($status,$status_message,$data) {
    header("HTTP/1.1 ".$status);
    $response['status_message']=$status_message;
    $response['data']=$data;

    $json_response = json_encode($response);
    #echo $json_response;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up - Bargain Bites</title>
    <link rel="stylesheet" href="user_reg.css">
</head>

<body>
    <header>
        <img src="BargainBites.png" id="logo" alt="BargainBites">
        <hr>
    </header>
    <section name="sign_form" id="sign_form">
        <h1>Sign-Up</h1>
        <p>
            Already have an account? <a href="client_login.php">Sign in</a>
        </p>
        <form method="GET" action="">
            <div class="outerform" style="text-align: center;">
                <div style="display: inline-block; text-align: left;">
                    <div>
                        <label for="first" class="name" id="first_label">First Name</label>
                        <label for="last" class="name">Last Name</label>
                        <br>
                        <input type="text" id="first" name="first_name" required>
                        <input type="text" name="last" id="last" required>
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <br>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div>
                        <label for="password">Password <small>(8-20 characters)</small></label>
                        <br>
                        <input type="password" name="password" id="password" minlength="8" maxlength="20" required>
                    </div>
                    <div>
                        <label for="country_code">Country</label>
                        <label for="mobile_number">Mobile Number</label>
                        <br>
                        <select name="country_code" id="country_code" required>
                            <option value="1">+1 (US)</option>
                        </select>
                        <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                        <small>Format: 123-456-7890</small>
                    </div>
                    <br>
                </div>
                <button id="signup">Sign Up</button>
            </div>
        </form>
    </section>
</body>

</html>