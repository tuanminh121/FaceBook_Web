<?php
    if(isset($_POST['btn-comment']) && $_POST['txt-comment']){
        $UserID = $_POST['UserID'];
        $PostID = $_POST['PostID'];
        $Comment = $_POST['txt-comment'];
        //KẾT NỐI SQL
        $conn = mysqli_connect('localhost','root','','facebook');
        if(!$conn){
            die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
        }
        //INSERT COMMENT
        if($Comment != ''){
            $sql = "INSERT INTO comment(PostID, UserID, CommentContent) VALUES($PostID, $UserID, '$Comment')";
            mysqli_query($conn,$sql);
            header("location: ../newsfeed.php");
        }
        //ĐÓNG KẾT NỐI
        mysqli_close($conn);
    }
    else{
        header("location: ../newsfeed.php");
    }
?>