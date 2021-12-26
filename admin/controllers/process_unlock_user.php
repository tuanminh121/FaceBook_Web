<?php
    $UserID = $_GET['UserID'];
    //KÊT NỐI SQL
    $conn = mysqli_connect('localhost','root','','facebook');
    //UPDATE ACTIVE = 1
    $sql = "UPDATE user_profile SET Active = 1, LockTime = NULL WHERE UserID = $UserID";
    if(!$conn){
        die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
    }
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