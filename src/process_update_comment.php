<?php
    if(isset($_POST['btn-edit'])){
        $UserID = $_POST['UserID'];
        $CommentUserID = $_POST['CommentUserID'];
        $CommentID = $_POST['CommentID'];
        $Comment = $_POST['txt-edit'];
        //KẾT NỐI SQL
        if($UserID == $CommentUserID){
            $conn = mysqli_connect('localhost','root','','facebook');
            if(!$conn){
                die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
            }
            //INSERT COMMENT
            if($Comment != ''){
                $sql = "UPDATE comment SET CommentContent='$Comment' WHERE CommentID=$CommentID";
                mysqli_query($conn,$sql);
                header("location: ../index.php");
            }
            //ĐÓNG KẾT NỐI
            mysqli_close($conn);
        }
        else{
            echo '<div style="margin-top:70px; color:red">Không thể chỉnh sửa bình luận của người khác</div>';
        }
    }
    else{
        header("location: ../index.php");
    }
?>