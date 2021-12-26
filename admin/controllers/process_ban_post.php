<?php
    $PostID = $_GET['PostID'];
    //KÊT NỐI SQL
    include "../../src/connectDB.php";
    //UPDATE ACTIVE = 0
    $sql1 = "DELETE FROM comment WHERE PostID = $PostID";  //xóa comment của post
    $sql2 = "DELETE FROM post WHERE PostID = $PostID";     //xóa post
        //  DELETE FROM images  WHERE PostID = $PostID

    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);
    if(!$result1 || !$result2){
        header("location: ../../components/404page.php");
    }
    else{
        header("location: ../admin.php");
    }
    //ĐÓNG KẾT NỐI
    mysqli_close($conn);
?>