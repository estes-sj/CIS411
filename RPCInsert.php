<?php
$connect = mysqli_connect("localhost", "root", "", "bargainbites") or die("could not connect");
if (isset($_GET['Name'], $_GET['Address'], $_GET['FoodType'], $_GET['PhoneNumber'])) {
    $Name = addSlashes($_GET['Name']);
    $Address = addSlashes($_GET['Address']);
    $FoodType = addSlashes($_GET['FoodType']);
    $PhoneNum = addSlashes($_GET['PhoneNumber']);
    $sql = "INSERT INTO `bargainbites`.`resturants` (`Name`, `Address`, `Food Type`, `Phone Number`, ID) VALUES ('$Name', '$Address', '$FoodType', '$PhoneNum', NULL)";
    $query = mysqli_query($connect,$sql);
    if ($query) {
        echo "Successfully Inserted";
    } else {
        echo "Failed to insert";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="adminDashboard.css" />
    <title>Bargain Bites Restaurant Management</title>
</head>
<body>
<h2> Bargain Bites Restaurant Management - Add a restaurant</h2>
<form action="RPCInsert.php" method="get">
    <label>Name:</label>
    <input type="text" name="Name" placeholder="The Restaurant"/>
    <br />
    <label>Address:</label>
    <input type="text" name="Address" placeholder="e.g. 123 Main Street"/>
    <br />
    <label>Food Type:</label>
    <input type="text" name="FoodType" placeholder="e.g. Chinese" />
    <br />
    <label>Phone Number:</label>
    <input type="text" name="PhoneNumber" placeholder="123-456-7890"/>
    <br />
    <input type="submit" value="Submit" />

</body>
</html>
