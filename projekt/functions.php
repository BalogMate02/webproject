<?php
function check_login($conn){
    if(isset($_SESSION['Email'])){
        $id = $_SESSION['Email'];
        $query = "SELECT * FROM eloado where Email = '$id' limit 1";
        $query1 = "SELECT * FROM resztvevo where Email = '$id' limit 1";
        $result = mysqli_query($conn,$query);
        if($result && mysqli_num_rows($result)>0){
            $userdata = mysqli_fetch_assoc($result);
            return $userdata;
        }
        else{
            $result = mysqli_query($conn,$query1);
            if($result && mysqli_num_rows($result)>0){
                $userdata = mysqli_fetch_assoc($result);
                return $userdata;
            }
        }

    }
    //header("Location: login.php");
    die;
}
function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');</script>"; 
} 
?>