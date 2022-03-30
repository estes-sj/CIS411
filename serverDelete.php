<?php 

$model=$_REQUEST['model'];
    //Data access
        $servername = "localhost";
        $dbname = "dealer";
        $username = "root";
        $password = "";

        //Create connection
        $conn = new mysqli($servername,$username,$password,$dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }

        $sql = "delete from vehicles WHERE model='$model'";
        //echo $sql; exit; //debug query
        $result = $conn->query($sql);

        if($result)//succesfully inserted

        {
            response(200,"Product Deleted",$result);
        }
        else {
            response(400,"Product not updated",$result);
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