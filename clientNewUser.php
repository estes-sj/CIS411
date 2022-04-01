<?php 
//User Post


$apiURL = "http//localhost/BargainBites/serverPOST.php";

$curl = curl_init($apiURL);

curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);// Get method

/* $firstName = mysqli_real_escape_string($db,$_POST['first']);
$lastName = mysqli_real_escape_string($db,$_POST['last']);
$password = mysqli_real_escape_string($db,$_POST['password']); 
$email = mysqli_real_escape_string($db,$_POST['email']); 
$mobileNumber = mysqli_real_escape_string($db,$_POST['mobile_number']); */ 

if(isset($_GET['first_name']) & isset($_GET['last']) & isset($_GET['password']) & isset($_GET['email']) & isset($_GET['phone']) ){
    $name = $_GET['first_name'];

    $firstName = $_GET['first_name'];
    $lastName = $_GET['last'];
    $password = $_GET['password']; 
    $email = $_GET['email']; 
    $mobileNumber = $_GET['phone'];  

    //curl_setopt($curl,CURLOPT_POSTFIELDS, "price=63300&make='Nissan2019'&model='Versa'&year='201533'");//POST method
    $post_field = 'firstName='.urlencode($firstName).'&lastName='.urlencode($lastName).'&email='.urlencode($email).'&password='.urlencode($password).'&mobileNumber='.urlencode($mobileNumber);
    echo $post_field;
    #curl_setopt($curl,CURLOPT_POSTFIELDS, "firstName='" . $firstName . "'&lastName='" . $lastName . "'&email='" . $email . "'&password='" . $password . "'&mobileNumber='" . $mobileNumber . "'");//POST method
    curl_setopt($curl, CURLOPT_POSTFIELDS,'firstName='.urlencode($firstName).'&lastName='.urlencode($lastName).'&email='.urlencode($email).'&password='.urlencode($password).'&mobileNumber='.urlencode($mobileNumber));


    $response = curl_exec($curl);

    curl_close($curl);


    $result = json_decode($response);
    
    if($result->status == 201){
        echo "User Inserted";
    echo "$result->status.Data successfully Posted in the Server DB";
    }else{
    echo $result->status_message;
    }

}else{
    echo "Please fill in all the fields";
}

?>