<?php
    $UserID = $_GET['UserID'];
    //KÊT NỐI SQL
    include "../../src/connectDB.php";
    //UPDATE ACTIVE = 0
    $sql = "UPDATE user_profile SET Active = 0, LockTime = NOW() WHERE UserID = $UserID";

    $result = mysqli_query($conn,$sql);
    if(!$result){
        header("location: ../../components/404page.php");
    }
    else{
        header("location: ../admin.php");
    }
    //ĐÓNG KẾT NỐI
    mysqli_close($conn);
?>