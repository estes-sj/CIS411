<html>
<!-- Author: Cadet Emily Hattman, HR: W3schools.com  --> 
    <head>
        <link rel="stylesheet" href="manageUser.css" />
        <title>Bargain Bites User Mangament </title>

            <style>

                h1{ 
                color: #E07A5F; 
                font-size: 25px;
                font-family:Georgia, 'Times New Roman', Times, serif;
                text-align: center;  
                }
                 .container {  
                    text-align: center;
                 }

                 .button1{ 
                 background-color: #E07A5F;
                 border: none; 
                 color:#f4f1de;
                 border-radius: 50px; 
                 width: 200px;
                }
                table {
                border-collapse: collapse;
                width: 100%;
                color: #588c7e;
                font-family: monospace;
                font-size: 25px;
                text-align: left;
                }
                th {
                background-color: #588c7e;
                color: white;
                }
                tr:nth-child(even) {background-color: #f2f2f2}
            </style> 
    </head>
  <body>
      <h1> Bargain Bites User Management  </h1>
      <div class ="container"> 
            <button class= "button1" onclick = "window.location.href= 'AdminDashboard.html';"> 
             Return To Dashboard
             </button>
        </div>

    <table>
    <tr>
    <th>Id</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Password</th>
    <th>Mobile Number</th>    
    </tr>

<?php 
$conn = mysqli_connect("localhost", "root", "", "bargain_bites"); 

if ($conn -> connect_error) { 
    die ("Connection failed:". $conn-> connect_error);
}

$sql= "SELECT id, firstName, lastName, email, password, mobileNumber from users"; 
$result = $conn-> query($sql);
if ($result -> num_rows > 0) { 
    while($row = $result-> fetch_assoc()){ 
        echo "<tr><td>". $row["id"]. "</td><td>". $row["firstName"]. "</td><td>". $row["lastName"]. "</td><td>". $row["email"].
        "</td><td>". $row["password"]. "</td><td>". $row["mobileNumber"]. "</td><td>" ;
    }
    echo "</table>"; 
}
    else { 
        echo "0 Results";
    }
$conn-> close();
?> 
  </table>
  <form class= "delete" action= "clientDelete.php" method="get"> 
      Enter Email to Delete User: <input type ="text" name="email"><br>
      <input type="submit">
     </form>
    </body> 
</html>


       











