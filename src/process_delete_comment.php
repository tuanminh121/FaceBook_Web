        
<?php
    $UserID = $_GET['UserID'];
    $CommentUserID = $_GET['CommentUserID'];
    $CommentID = $_GET['CommentID'];
    
    //DELETE COMMENT
    if($CommentUserID == $UserID){
        //KẾT NỐI SQL
        $conn = mysqli_connect('localhost','root','','facebook');
        if(!$conn){
            die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
        }
        $sql = "DELETE FROM comment WHERE CommentID = $CommentID";
        mysqli_query($conn,$sql);
        header("location: ../newsfeed.php");
        //ĐÓNG KẾT NỐI
        mysqli_close($conn);
    }
    else{
        echo '<div style="margin-top:70px; color:red">Không thể xóa bình luận của người khác</div>';
    }
?>