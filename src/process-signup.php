<?php

if(isset($_POST['btnSignUp'])){
    $UserFirstName = $_POST['firstnameSignUp'];
    $UserLastName = $_POST['lastnameSignUp'];
    $UserMail = $_POST['emailSignUp'];
    $UserPasswd = $_POST['pwSignUp'];
    $UserBirth = "{$_POST['yearOfBirth']}-{$_POST['monthOfBirth']}-{$_POST['dayOfBirth']}";
    $UserGender = intval($_POST['genderSignUp']);

    require('./connectDB.php');

    $sql = "select * from user_profile where UserEmail = '$UserMail'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0){
        $token = md5($UserMail).rand(10,9999);
        $pass_hash = password_hash($UserPasswd, PASSWORD_DEFAULT);
        $sql2 = "insert into user_profile (UserEmail, UserPass, UserGender, UserFirstName, UserLastName, UserBirth, VerifyLink) values ('$UserMail', '$UserPasswd', {$UserGender}, '$UserFirstName', '$UserLastName', '$UserBirth', '$token')";
        $result2 = mysqli_query($conn, $sql2);
        if($result2) {
            $link = "localhost/src/verify-email.php?key=".$UserMail."&token=".$token."";
            require('./process-mailer.php');
            sendMail($UserMail, $link);
            //header("location: index.php");
        } else {
            echo "'$sql2'";
        }
    } else {
        echo "error";
    }
}

?>
