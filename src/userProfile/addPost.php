<?php
if (isset($_POST['btn-sendPost'])) {
    $UserID = $_POST['UserID'];
    $content = $_POST['txt-content'];
    $PostID = 0;

    //KẾT NỐI SQL
    $conn = mysqli_connect('localhost', 'root', '', 'facebook');
    if (!$conn) {
        die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
    }

    //INSERT COMMENT
    if ($content != '') {
        // $sql = "INSERT INTO comment(PostID, UserID, CommentContent) VALUES($PostID, $UserID, '$Comment')";
        $sql = "INSERT INTO `post` (`UserID`, `PostTime`,`PostCaption`) VALUES ('" . $UserID . "', '" . date("Y-m-d h:i:s") . "','" . $content . "');";
        mysqli_query($conn, $sql);

        $queryPostId = "SELECT MAX(PostID) as PostID from post where UserID='$UserID'";
        $result_id = mysqli_query($conn, $queryPostId);
        if (mysqli_num_rows($result_id) > 0) {
            $row_id = mysqli_fetch_assoc($result_id);
            $PostID = $row_id['PostID'];
        } // fetch du lieu ra
    }


    $statusMsg = ''; // tạo ra 1 biến để lưu lại trạng thái upload nhằm mục tiêu phản hồi lại cho người dùng

    // 1. Động tác thiết lập cho việc chuẩn bị upload
    $targetDir = "assets/uploads/"; // thư mục chỉ định, nằm trong cùng project này để lưu trữ tệp tải lên
    $fileName = basename($_FILES["myFile"]["name"]); // $_FILE là 1 biến siêu toàn cục lưu trữ toàn bộ phần tử file trên form
    $uploadDir = "../../" . $targetDir . $fileName; // Đây là đường dẫn upload ảnh vào thư mục uploads (tên đầy đủ + đường dẫn sau khi việc upload hoàn thành)
    $targetFilePath = $targetDir . $fileName; // Đây là đường dẫn insert db (tên đầy đủ + đường dẫn sau khi việc upload hoàn thành)
    // nó là giá trị cần phải truyền vào hàm move_upload_file

    $fileType = pathinfo($uploadDir, PATHINFO_EXTENSION); // bắt định dạng tệp tin, ktra định dạng có hợp lệ hay k

    if (!empty($_FILES["myFile"]["name"])) {
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) { // phương thức in_array kiểm tra 1 giá trị có thuộc mảng hay không
            // nếu có -> xử lý upload cái tệp tin đang lưu ở thư mục tạm C:\xampp\tmp\$_FILES["myFile"]["tmp_name"]
            if (move_uploaded_file($_FILES["myFile"]["tmp_name"], $uploadDir)) { // nghĩa là lấy từ nơi tạm đẩy vào nơi chính
                // lưu đường dẫn vào csdl
                $sql = "INSERT into images (PostID, images) VALUES ('" . $PostID . "', '" . $targetFilePath . "')";
                $insert = mysqli_query($conn, $sql); // giống mysqli_query
                if ($insert) { // ktra việc query thành công?
                    $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                    header("location: ../../user_profile.php");
                } else { // prbolem
                    $statusMsg = "File upload failed, please try again.";
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    }
    //ĐÓNG KẾT NỐI
    mysqli_close($conn);
} else {
    header("location: ../../user_profile.php");
}
