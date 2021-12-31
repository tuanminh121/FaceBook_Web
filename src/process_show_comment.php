<?php
/* $UserID = $_SESSION['isLoginOk'];
$conn = mysqli_connect('localhost','root','','ajax' );
$sql_comment = "SELECT * from view_comment WHERE PostID =" . $row_news['PostID'];
$result_comment = mysqli_query($conn, $sql_comment);

$output = '';
if (mysqli_num_rows($result_comment) > 0) {
    while ($row_comment = mysqli_fetch_assoc($result_comment)) {
        if ($row_comment['UserID'] == $UserID) {
        $output .= '
                                        <li class="comment-item myDIV">
                                            <a class="icon" href="userProfile.php">
                                                <img class="user-img" src="'.($row_comment['UserAva']).'" alt="">
                                            </a>
                                            <div class="commentator-name">
                                                <a href="userProfile.php" class="user-name text-decoration-none link-dark">
                                                    <b>'.$row_comment['UserName'].'</b>
                                                </a>
                                                <p class="comment-content">
                                                    '.$row_comment['CommentContent'].'
                                                </p>
                                            </div>
                                            <div id="edit-comment" class="hide">
                                                <div class="option-comment option-icon collapsible">
                                                    <span id="btn-edit" class="material-icons-outlined option-comment option-icon" style="font-size:15px">
                                                        edit
                                                    </span>
                                                </div>
                                                <form class="content" id="form-edit-comment" action="src/process_update_comment.php" method="post">
                                                    <input class="ID" type="text" value="'.$row_comment['UserID'].'" name="CommentUserID">
                                                    <input class="ID" type="text" value="<?php echo $UserID; ?>" name="UserID">
                                                    <!--Người đăng nhập-->
                                                    <input class="ID" type="text" value="'.$row_comment['CommentID'].'" name="CommentID">
                                                    <textarea id="input-edit-comment" name="txt-edit" id="" cols="30" rows="4">'.$row_comment['CommentContent'].'</textarea>
                                                    <button id="btn-edit-comment" name="btn-edit" type="submit">Lưu</button>
                                                </form>
                                                <a href="src/process_delete_comment.php?CommentID='.$row_comment['CommentID'].'
                                                    &&CommentUserID='.$row_comment['UserID'].'&&UserID='.$UserID.'" class="link-dark">
                                                    <!--Người đăng nhập-->
                                                    <span class="hide material-icons-outlined option-comment option-icon" style="font-size:15px">
                                                        delete_forever
                                                    </span>
                                                </a>
                                            </div>
                                        </li>';
        }
        else{
            $output .= '
                                        <li class="comment-item myDIV">
                                            <a class="icon" href="userProfile_friend.php?UserIDFriend='.$row_comment['UserID'].'">
                                                <img class="user-img" src="'.($row_comment['UserAva']).'" alt="">
                                            </a>
                                            <div class="commentator-name">
                                                <a href="userProfile_friend.php?UserIDFriend='.$row_comment['UserID'].'" class="user-name text-decoration-none link-dark">
                                                    <b>'.$row_comment['UserName'].'</b>
                                                </a>
                                                <p class="comment-content">
                                                    '.$row_comment['CommentContent'].'
                                                </p>
                                            </div>
                                        </li>';
        }
    }
}

echo $output;
 */
?>