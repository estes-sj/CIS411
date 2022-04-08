<?php
   $severname = "localhost";
   $dbname = "bargain_bites";
   $dbusername = "root";
   $dbpassword = "";
   // Create connection
   $conn = new mysqli($severname, $dbusername, $dbpassword, $dbname);
   // Check connection
   if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
   }
   ?>