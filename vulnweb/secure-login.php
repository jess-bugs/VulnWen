

<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $server = '192.168.1.14';
    $user = 'bugs';
    $pass = 'Onesandzeroes23!';
    $database = 'vuln_users';
    $port = 4443;
    
    
    
    
    
    
    $conn = mysqli_connect($server, $user, $pass, $database, $port);
    
    if(!$conn) {
        
        echo "<br>ERROR: " . mysqli_connect_error() . "<br>";
        
    } else {
        
        echo "<br>Connected<br>";
        
    }




    $username = $_POST['username'];
    $password = $_POST['password'];






    $query = "select Username, Password from Users WHERE Username = ? AND Password = ?";
    $stmt = mysqli_prepare($conn, $query);

    if($stmt) {

        //bind the input with the stmt
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);


        //now, execute
        mysqli_stmt_execute($stmt);
        

        //get the result
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0) {

            header('Location: success.html');
        } else {

            header('Location: error.html');
        }


    } else {

        echo "<br>Error: " . mysqli_error($conn);
    }








    
    
    
}


