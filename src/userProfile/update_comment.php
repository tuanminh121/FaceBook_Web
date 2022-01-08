<?php
    if(isset($_POST['btn-edit'])){
        $UserID = $_POST['UserID'];
        $CommentUserID = $_POST['CommentUserID'];
        $CommentID = $_POST['CommentID'];
        $Comment = $_POST['txt-edit'];
        //KẾT NỐI SQL
        $conn = mysqli_connect('localhost','root','','facebook');

        if(!$conn){
            die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
        }
        //UPDATE COMMENT
        if($Comment != ''){
            $sql = "UPDATE comment SET CommentContent='$Comment' WHERE CommentID=$CommentID";
            mysqli_query($conn,$sql);
            header("location: ../../user_profile.php");
        }
        //ĐÓNG KẾT NỐI
        mysqli_close($conn);
    }
    else{
        header("location: ../../user_profile.php");
    }
?>