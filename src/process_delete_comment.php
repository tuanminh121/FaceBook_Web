        
<?php
    $UserID = $_GET['UserID'];
    $CommentUserID = $_GET['CommentUserID'];
    $CommentID = $_GET['CommentID'];
    
    //KẾT NỐI SQL
    $conn = mysqli_connect('localhost','root','','facebook');
    if(!$conn){
        die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
    }
    $sql = "DELETE FROM comment WHERE CommentID = $CommentID";
    mysqli_query($conn,$sql);
    header("location: ../index.php");
    
    //ĐÓNG KẾT NỐI
    mysqli_close($conn);

?>