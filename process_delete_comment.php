
<?php
    include "template/header.php";
    $UserID = $_GET['UserID'];
    $CommentUserID = $_GET['CommentUserID'];
    $CommentID = $_GET['CommentID'];
    //KẾT NỐI SQL
    $conn = mysqli_connect('localhost','root','','facebook');
    if(!$conn){
        die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
    }
    //DELETE COMMENT
    if($CommentUserID == $UserID){
        $sql = "DELETE FROM comment WHERE CommentID = $CommentID";
        mysqli_query($conn,$sql);
        header("location: newsfeed.php");
    }
    else{
        echo '<div style="margin-top:70px; color:red">Không thể xóa bình luận của người khác</div>';
    }
    //ĐÓNG KẾT NỐI
    mysqli_close($conn);
    include "template/footer.php";
?>