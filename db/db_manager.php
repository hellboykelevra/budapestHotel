<?php
    //require_once('../model/customer.php');
    
    function getConnection (){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "hotel";

        $conn = mysqli_connect($servername, $username, $password,$db);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
       //echo "Connected successfully";
        return $conn;
    }

    function getUserId($username){
        $conn = getConnection();
        $sql = "SELECT id FROM customer WHERE name = '$username';";
        //echo $sql;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return $row["id"];
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function getAvailableRooms ($dateIn, $dateOut, $amountOfGuest){
        $conn = getConnection();
        $sql = "SELECT r.id, r.roomNumber, rt.roomType, rt.roomPrice
                FROM room r 
                LEFT JOIN roomType rt ON r.roomTypeId = rt.id
                WHERE r.id NOT IN 
                ( SELECT b.roomId 
                    FROM book b 
                    WHERE (b.dateOut <= '$dateOut' AND b.dateIn >= '$dateIn')
                    OR (b.dateOut >= '$dateOut' AND b.dateIn >= '$dateIn')
                ) 
                AND rt.amountOfGuests = $amountOfGuest
                GROUP BY r.id
                ORDER BY r.id;";

        //debug($sql);
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    function book ($userId, $dateIn, $dateOut){
        $conn = getConnection();
        $sql = "";
    }

    function insertUser (Customer $user){
        $conn = getConnection();
        $sql = $user->getInsertSQLQuery ();
        return $conn->query($sql);
    }

    function getUser ($email, $password){
        $conn = getConnection();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "SELECT * FROM customer WHERE email='$email' AND password = '$password' LIMIT 1;";
        $result = $conn->query($sql);
       
        if ($result->num_rows == 1) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $user = new Customer (
                    $row['name'],
                    $row['surname'],
                    $row['dni'],
                    $row['email'],
                    $row['password'],
                    $row['phone'],
                    $row['card_number']
                );

                $user->setId($row['id']);
                return $user;
            }
        } else {
            return null;
        }
        $conn->close();
    }
?>