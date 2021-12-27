<?php
    if(isset($_POST['btn-sendPost'])){
        $UserID = $_POST['UserID'];
        $content = $_POST['txt-content'];
        //KẾT NỐI SQL
        $conn = mysqli_connect('localhost','root','','facebook');
        if(!$conn){
            die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
        }
        //INSERT COMMENT
        if($content != ''){
            // $sql = "INSERT INTO comment(PostID, UserID, CommentContent) VALUES($PostID, $UserID, '$Comment')";
            $sql = "INSERT INTO `post` (`UserID`, `PostTime`,`PostCaption`) VALUES ('" . $UserID . "', '" . date("Y-m-d h:i:s") . "','" . $content . "');";
            mysqli_query($conn,$sql);
            $sql = "INSERT INTO `images` (`PostID`) VALUES ('" . $UserID . "');";
            mysqli_query($conn,$sql);
            header("location: ../../userProfile.php");
            echo $sql;
        }
        //ĐÓNG KẾT NỐI
        mysqli_close($conn);
    } else{
        header("location: ../../userProfile.php");
    }
?>