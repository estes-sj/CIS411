<!-- Author: Cadet Emily Hattman, HR: W3schools.com  --> 
<?php 
$connect = mysqli_connect("localhost", "root", "", "bargain_bites") or die("could not connect");
$output ='';
//print_r($_GET); //debugging

//collect
if (isset($_GET['search'])){
    $searchq = addSlashes($_GET['search']);
    #echo $searchq; //debugging

    $sql = "SELECT * FROM `resturants` WHERE `Name` = '$searchq' or `Address` = '$searchq' or `Food Type` = '$searchq' or `Phone Number` = '$searchq' or `ID` = '$searchq'";
    
    $query = mysqli_query($connect,$sql) or die("could not search");
    $count = mysqli_num_rows($query);
    #echo $count; //debugging
    
    if($count == 0){
        $output = 'There was no search results!';
    }else{
        while($row = mysqli_fetch_array($query)){
            $name = $row['Name'];
            $address = $row['Address'];
            $food_type = $row['Food Type'];
            $phone_number = $row['Phone Number'];
            $id = $row['ID'];
            $output .= '<div>'.$name.' '.$address.' '.$food_type.' '.$phone_number.' '.$id.'</div>';
        }
    }
}

if (isset($_GET['delete'])){ 
    $deleteq = addSlashes($_GET['delete']);  

     $sql ="DELETE FROM `resturants` WHERE `resturants`.`Name` = '$deleteq'";
     echo "Resturant Deleted"; 
    
    $query = mysqli_query($connect,$sql) or die("could not delete");
}
?>
<html>
    <head>
        <link rel="stylesheet" href="manageRest.css" />
        <title>Bargain Bites Resturant Mangament </title>

            <style>

                h1{ 
                color: #E07A5F; 
                font-size: 30px;
                font-family:Georgia, 'Times New Roman', Times, serif;
                text-align: center;  
                }
                 .container {  
                    text-align: center;
                 }

                 .button1{ 
                 background-color: #81B29A;
                 border: none; 
                 color:#f4f1de;
                 border-radius: 100px; 
                 width: 400px;
                 font-size: 20px; 
                }

                #search { 
                color: #E07A5F; 
                font-size: 20px;
                font-family:Georgia, 'Times New Roman', Times, serif;
                text-align: center;

                }

                #submit { 
                background-color: #81B29A;
                 border: none; 
                 color:#f4f1de;
                 border-radius: 100px; 
                 width: 150px;
                 font-size: 20px;
                }

                #delete {
                
                 border: none; 
                 color: #E07A5F;
                 border-radius: 200px; 
                 width: 500px;
                 font-size: 20px; 

                }
                #delete2 { 
                background-color: #81B29A;
                 border: none; 
                 color:#f4f1de;
                 border-radius: 100px; 
                 width: 150px;
                 font-size: 20px;  

                }
            </style> 
    </head>
  <body>
      <h1> Bargain Bites Resturant Management  </h1>
      <div class ="container"> 
            <button class= "button1" onclick = "window.location.href= 'AdminDashboard.html';"> 
             Return To Dashboard
             </button>
        </div>
        <br>
  
    <form method= "get" id ="search" action= "ManageResturants.php"> 
      Search Resturant by Name: <input type ="text" name="search" placeholder= "Search for resturant by Name"><br>
      <input type="submit" id="submit" value ="Submit">
      </form> 
      <?php print("$output"); ?>

    <br>
    <form method= "get" id ="delete" action= "ManageResturants.php"> 
       Enter Resturant Name to Delete : <input type ="text" name="delete" placeholder= " Resturant Name"><br>
      <input type="submit" id="delete2" value ="Delete">
      </form> 
     
    </body> 
</html>