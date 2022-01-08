<?php
    session_start(); 
    if (isset($_POST['removeFriend']) or isset($_POST['addFriend']) or isset($_POST['cancelFriend']) or isset($_POST['acceptFriend'])){
        require "../connectDB.php";
        if (isset($_POST['addFriend'])) {
            $UserId = $_POST['addFriend'];
            $sql = "select * from friend_ship where (User1ID='".$_SESSION['isLoginOk']."' and User2ID='".$UserId."') or (User2ID='".$_SESSION['isLoginOk']."' and User1ID='".$UserId."')";
            $result1 = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result1) <= 0) {
                $sql2 = "insert into friend_ship values ('".$_SESSION['isLoginOk']."', '".$UserId."', 0)";
                $result2 = mysqli_query($conn, $sql2);
                header("location: ../../user_profile_friend.php?UserIDFriend=$UserId");
            }
        }
        if (isset($_POST['acceptFriend'])) {
            $UserId = $_POST['acceptFriend'];
            $sql = "select * from friend_ship where (User1ID='".$_SESSION['isLoginOk']."' and User2ID='".$UserId."') or (User2ID='".$_SESSION['isLoginOk']."' and User1ID='".$UserId."')";
            $result1 = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result1) > 0) {
                $sql2 = "UPDATE friend_ship SET Active=1 WHERE (User1ID='".$_SESSION['isLoginOk']."' and User2ID='".$UserId."') or (User2ID='".$_SESSION['isLoginOk']."' and User1ID='".$UserId."')";
                $result2 = mysqli_query($conn, $sql2);
                header("location: ../../user_profile_friend.php?UserIDFriend=$UserId");
            }
        }
        if (isset($_POST['cancelFriend'])) {
            $UserId = $_POST['cancelFriend'];
            $sql = "delete from friend_ship where (User1ID='".$_SESSION['isLoginOk']."' and User2ID='".$UserId."') or (User2ID='".$_SESSION['isLoginOk']."' and User1ID='".$UserId."')";
            $result1 = mysqli_query($conn, $sql);   
            header("location: ../../user_profile_friend.php?UserIDFriend=$UserId");
        }
        if (isset($_POST['removeFriend'])) {
            $UserId = $_POST['removeFriend'];
            $sql = "delete from friend_ship where (User1ID='".$_SESSION['isLoginOk']."' and User2ID='".$UserId."') or (User2ID='".$_SESSION['isLoginOk']."' and User1ID='".$UserId."')";
            $result1 = mysqli_query($conn, $sql);   
            header("location: ../../user_profile_friend.php?UserIDFriend=$UserId");
        }
    }
?>