<?php
// Author: Cadet Emily Hattman
//REST server
$email=$_REQUEST['email'];
    //Data access
        $servername = "localhost";
        $dbname = "bargain_bites";
        $username = "root";
        $password = "";

        //Create connection
        $conn = new mysqli($servername,$username,$password,$dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }

        $sql = "delete from users WHERE email='$email'";
        //echo $sql; exit; //debug query
        $result = $conn->query($sql);

        if($result)//succesfully inserted

        {
            response(200,"User Deleted",$result);
        }
        else {
            response(400,"User not deleted",$result);
        }

        function response($status, $status_message,$data)
        {
            header("HTTP/1.1 ".$status);

            $response['status'] = $status;
            $response['status_message'] = $status_message;
            $response['data']=$data;

            $json_response = json_encode($response);
            echo $json_response;
        }

        ?>