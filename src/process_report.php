<?php
    $PostUserID = $_GET['PostUserID'];
    $PostID = $_GET['PostID'];

    //KẾT NỐI SQL
    $conn = mysqli_connect('localhost','root','','facebook');
    if(!$conn){            
        die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
    }
    $sql_report_post = "UPDATE post SET Reported = 1 WHERE PostID = $PostID";
    $sql_report_user = "UPDATE user_profile SET  Reported = Reported + 1 WHERE UserID = $PostUserID";
    $KQ1= mysqli_query($conn, $sql_report_post);
    $KQ2= mysqli_query($conn, $sql_report_user);
    if($KQ1 == true && $KQ2 == true){
        echo '<div style="margin-top:70px; color:red">Bài viết và người đăng đã bị cáo cáo</div>';
    }
    else{
        echo '<div style="margin-top:70px; color:red">Lỗi!Không thể cáo cáo bài viết và người đăng</div>';
    }
    //ĐÓNG KẾT NỐI
    mysqli_close($conn);
?>