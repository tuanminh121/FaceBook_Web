<?php
    include "template/header.php";
    $PostID = $_GET['PostID'];
?>
<main>
        <!--MAIN-NEW-FEED-->
        <div id="main-news-feed">
    
        <!--News-->
        <?php
        //KẾT NỐI SQL
        include "src/connectDB.php";
        //TRUY VẤN POST, POST_USER
        $sql = "SELECT PostID, view_post.UserID, UserName, PostCaption, PostTime, UserAva
                from view_post INNER JOIN user_profile 
                on view_post.UserID = user_profile.UserID
                WHERE PostID = $PostID";                   
        $result_news = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result_news) > 0) {
           $row_news = mysqli_fetch_assoc($result_news);
        ?>
                <div class="news">
                    <div class="row">
                        <div class="heading">
                            <a class="user-ava" href="userProfile_friend.php?UserIDFriend=<?php echo $row_news['UserID']; ?>">
                                <img class="user-img" src="<?php echo ($row_news['UserAva']); ?>" alt="">
                            </a>
                            <div class="user-name-time">
                                <a href="userProfile_friend.php?UserIDFriend=<?php echo $row_news['UserID']; ?>" class="user-name text-decoration-none link-dark">
                                    <b><?php echo $row_news['UserName'] ?></b>
                                </a>
                                <h6 class="time">
                                    <?php echo $row_news['PostTime'] ?>
                                </h6>
                            </div>
                            <div class="option ms-auto">
                                <div class="option-icon collapsibleOption">
                                    <span class="material-icons-outlined" style="position: absolute;">
                                        more_horiz
                                    </span>
                                </div>
                                <div class="collapse contentOption">
                                    <div class="option-item">
                                        <div class="col-md-12 items">
                                            <span class="material-icons-outlined">history</span>
                                            <b>Xem lịch sử chỉnh sửa</b>
                                        </div>
                                        <div class="col-md-12 items">
                                            <span class="material-icons-outlined">bookmarks</span>
                                            <b>Lưu bài viết</b>
                                        </div>
                                        <a class="col-md-12 items link-dark" href="src/process_report.php?PostID=<?php echo $row_news['PostID']; ?>
                                &&PostUserID=<?php echo $row_news['UserID']; ?>">
                                            <span class="material-icons-outlined">report</span>
                                            <b>Báo cáo bài viết</b>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="news-content">
                            <div class="content-caption">
                                <?php echo $row_news['PostCaption'] ?>
                            </div>
                            <div class="content-images">
                                <?php
                                $sql_img_content = "SELECT * FROM images INNER JOIN post ON post.PostID = images.PostID WHERE post.PostID=" . $row_news['PostID'];
                                $result_img_content = mysqli_query($conn, $sql_img_content);
                                if (mysqli_num_rows($result_img_content) > 0) {
                                    while ($row_img_content = mysqli_fetch_assoc($result_img_content)) {

                                ?>
                                        <img src="<?php echo $row_img_content['images']; ?>" alt="" onclick="clickImg('<?php echo $row_img_content['images']; ?>')">
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="action-comment">
                            <div class="action-comment-above">
                                <div class="action-index">
                                    <span class="material-icons-round">
                                        emoji_emotions
                                    </span>
                                </div>
                                <?php
                                //ĐẾM LƯỢT BÌNH LUÂN
                                $sql_count_comment = "SELECT count(CommentID) FROM comment where PostID=" . $row_news['PostID'];
                                $result_count_comment = mysqli_query($conn, $sql_count_comment);
                                $row_count_comment = mysqli_fetch_assoc($result_count_comment);
                                ?>
                                <div class="comment-index">
                                    <div class="comment-index-item" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                                        <?php echo $row_count_comment['count(CommentID)']; ?> bình luận
                                    </div>
                                    <div class="share-index-item">
                                        100 lượt chia sẻ
                                    </div>
                                </div>
                            </div>
                            <div class="action-comment-under">
                                <div class="action-comment-under-item">
                                    <div class="action-icon">
                                        <span class="material-icons-outlined like-icon">
                                            thumb_up
                                        </span>
                                    </div>
                                    <div class="action-name">
                                        <h6>Thích</h6>
                                    </div>
                                </div>
                                <div class="action-comment-under-item">
                                    <div class="action-icon">
                                        <span class="material-icons-outlined comment-icon">
                                            chat_bubble_outline
                                        </span>
                                    </div>
                                    <div class="action-name" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                                        <h6>Bình luận</h6>
                                    </div>
                                </div>
                                <div class="action-comment-under-item">
                                    <div class="action-icon">
                                        <i class="far fa-share-square share-icon"></i>
                                    </div>
                                    <div class="action-name">
                                        <h6>Chia sẻ</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--COMMENT INPUT-->
                        <div class="row">
                            <form id="comment-form" action="src/process_add_comment.php" method="post" autocomplete="off">
                                <div class="col-md-12 comment-input-form">
                                    <a class="icon" href="userProfile.php">
                                        <?php
                                        $sql_comment_ava = "SELECT CONCAT(UserFirstName, ' ', UserLastName) as UserName, UserAva FROM user_profile WHERE UserID = $UserID";
                                        $result_comment_ava = mysqli_query($conn, $sql_comment_ava);
                                        if (mysqli_num_rows($result_comment_ava) > 0) {
                                            $row_comment_ava = mysqli_fetch_assoc($result_comment_ava)
                                        ?>
                                            <img class="user-img" src="<?php echo ($row_comment_ava['UserAva']); ?>" alt="">
                                        <?php
                                        }
                                        ?>
                                    </a>
                                    <input class="ID" type="text" value="<?php echo $row_news['PostID']; ?>" name="PostID">
                                    <input class="ID" type="text" value="<?php echo $UserID; ?>" name="UserID">
                                    <!--Người đăng nhập-->
                                    <div class="comment-input">
                                        <input id="comment-input" name="txt-comment" type="text" placeholder=" Viết bình luận" class="form-control">
                                    </div>
                                    <button id="send-comment" name="btn-comment" type="submit">
                                        <span class="material-icons-round send-icon">
                                            reply
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!--COMMENTS-->
                        <ul class="collapse collapse-horizontal comments" id="collapseWidthExample">
                            <?php
                            //TRUY VẤN COMMENT, COMMENT_USER
                            $sql_comment = "SELECT * from view_comment WHERE PostID =" . $row_news['PostID'];
                            $result_comment = mysqli_query($conn, $sql_comment);
                            if (mysqli_num_rows($result_comment) > 0) {
                                while ($row_comment = mysqli_fetch_assoc($result_comment)) {
                                    if ($row_comment['UserID'] == $UserID) {
                            ?>
                                        <!--COMMENT OF USER LOGIN-->
                                        <li class="comment-item myDIV">
                                            <a class="icon" href="userProfile.php">
                                                <img class="user-img" src="<?php echo ($row_comment['UserAva']); ?>" alt="">
                                            </a>
                                            <div class="commentator-name">
                                                <a href="userProfile.php" class="user-name text-decoration-none link-dark">
                                                    <b><?php echo $row_comment['UserName']; ?></b>
                                                </a>
                                                <p class="comment-content">
                                                    <?php echo $row_comment['CommentContent']; ?>
                                                </p>
                                            </div>
                                            <!--EDIT COMMENT-->
                                            <div id="edit-comment" class="hide">
                                                <div class="option-comment option-icon collapsible">
                                                    <span id="btn-edit" class="material-icons-outlined option-comment option-icon" style="font-size:15px">
                                                        edit
                                                    </span>
                                                </div>
                                                <form class="content" id="form-edit-comment" action="src/process_update_comment.php" method="post">
                                                    <input class="ID" type="text" value="<?php echo $row_comment['UserID']; ?>" name="CommentUserID">
                                                    <input class="ID" type="text" value="<?php echo $UserID; ?>" name="UserID">
                                                    <!--Người đăng nhập-->
                                                    <input class="ID" type="text" value="<?php echo $row_comment['CommentID']; ?>" name="CommentID">
                                                    <textarea id="input-edit-comment" name="txt-edit" id="" cols="30" rows="4"><?php echo $row_comment['CommentContent']; ?></textarea>
                                                    <button id="btn-edit-comment" name="btn-edit" type="submit">Lưu</button>
                                                </form>
                                                <a href="src/process_delete_comment.php?CommentID=<?php echo $row_comment['CommentID']; ?>
                                                    &&CommentUserID=<?php echo $row_comment['UserID'] ?>&&UserID=<?php echo $UserID; ?>" class="link-dark">
                                                    <!--Người đăng nhập-->
                                                    <span class="hide material-icons-outlined option-comment option-icon" style="font-size:15px">
                                                        delete_forever
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                    <?php
                                    } else {
                                    ?>
                                        <!--COMMENT OF USER FRIEND-->
                                        <li class="comment-item myDIV">
                                            <a class="icon" href="userProfile_friend.php?UserIDFriend=<?php echo $row_comment['UserID']; ?>">
                                                <img class="user-img" src="<?php echo ($row_comment['UserAva']); ?>" alt="">
                                            </a>
                                            <div class="commentator-name">
                                                <a href="userProfile_friend.php?UserIDFriend=<?php echo $row_comment['UserID']; ?>" class="user-name text-decoration-none link-dark">
                                                    <b><?php echo $row_comment['UserName']; ?></b>
                                                </a>
                                                <p class="comment-content">
                                                    <?php echo $row_comment['CommentContent']; ?>
                                                </p>
                                            </div>
                                        </li>

                            <?php
                                    }
                                }
                            }
                            ?>
                        </ul>
                    </div>


                </div>
        <?php
        }
        ?>
    </div>
</main>
<?php
    include "template/footer.php";
?>