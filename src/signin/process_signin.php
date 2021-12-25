<?php
if(isset($_POST['btnSignIn']) && isset($_POST['UserEmail'])) {
    require('../connectDB.php');
    $email = $_POST['UserEmail'];
    $pass = $_POST['UserPassword'];
    $sql = "select * from user_profile where UserEmail=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    if(mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $UserId, $UserEmail, $UserPass, $UserGender, $UserFirstName, $UserLastName, $UserBirth, $UserAddress, $UserAva, $Reported, $Description, $VerifyLink, $Active, $VerifyDate);
        if (mysqli_stmt_fetch($stmt)){
            if(password_verify($pass, $UserPass)){
                header("Location: ../../");
            } else {
                $error= "Tài khoản hoặc mật khẩu không chính xác!";
                header("location: ../../login.php?error=$error");
            }
        } else {
            echo 'Du lieu khong khop';
        }
    } else {
        echo 'khong co du lieu';
    }    
}  
?>