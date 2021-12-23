<?php
    include "template/header.php";
?>
<!--MAIN-->  
    <main>
<!--LEFT-SIDE-BAR-->
    <div id="left-side-bar">
        <?php   
            include "template/sidebar.php"
        ?>
    </div>
<!--MAIN-NEW-FEED-->
    <div id="main-news-feed">
<!--THINKING POST-->
        <div class="card mb-4 thinking-post">
            <div class="card-body">
                <div class="d-flex">
                    <a id="thinking-user" href="userProfile.php">
                        <img src="assets/images/content-img.jpeg" alt="" class="rounded-circle border"/>
                    </a>
                    <button
                      class="btn btn-light btn-block btn-rounded bg-light" data-mdb-toggle="modal" data-mdb-target="#buttonModalUserPost">
                      Bạn đang nghĩ gì?
                    </button>
                </div>
                  <hr>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-link btn-lg"><i class="fas fa-video"></i> Video trực tiếp</button>
                    <button class="btn btn-link btn-lg"><i class="fas fa-images"></i> Ảnh/Video</button>
                    <button class="btn btn-link btn-lg"><i class="far fa-grin-wink"></i> Cảm xúc</button>
                </div>
            </div>
        </div>
<!--News-->
<?php
    //KẾT NỐI SQL
        $conn = mysqli_connect('localhost','root','','facebook');
        if(!$conn){
            die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
        }
    //TRUY VẤN POST, POST_USER
        $sql = "SELECT PostID, UserID, UserName, PostCaption, PostTime
                from
                    (SELECT *
                    FROM friend_ship INNER JOIN view_post
                    on UserID = User1ID or UserID = User2ID
                    WHERE User1ID = 2 or User2ID = 2) as Bang
                WHERE UserID != 2";
        $result_news = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result_news) > 0){ 
            while($row_news = mysqli_fetch_assoc($result_news)){
?>
        <div class="news">
            <div class="row">
                <div class="heading">
                    <a class="user-ava" href="userProfile.php">
                        <img class="user-img" src="assets/images/content-img.jpeg" alt="">
                    </a>
                    <div class="user-name-time">
                        <a href="userProfile.php" class="user-name text-decoration-none link-dark">
                            <b><?php echo $row_news['UserName']?></b>
                        </a>
                        <h6 class="time">
                            <?php echo $row_news['PostTime'] ?>
                        </h6>
                    </div>
                    <div class="option ms-auto">
                        <div class="option-icon"  data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <span class="material-icons-outlined" style="position: absolute;">
                                more_horiz
                            </span>
                        </div>
                        <div class="collapse" id="collapseExample">
                            <div class="option-item">
                                <div class="col-md-12 items">
                                <span class="material-icons-outlined">history</span>
                                    <b>Xem lịch sử chỉnh sửa</b>
                                </div>
                                <div class="col-md-12 items">
                                    <span class="material-icons-outlined">bookmarks</span>
                                    <b>Lưu bài viết</b>
                                </div>
                                <div class="col-md-12 items">
                                <span class="material-icons-outlined">report</span>
                                    <b>Báo cáo bài viết</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-content">
                    <div class="content-caption">
                        <?php echo $row_news['PostCaption'] ?>
                    </div>
                    <div class="content-images">
                        <img src="assets/images/content-img.jpeg" alt="">
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
    $sql_count_comment = "SELECT count(CommentID) FROM comment where PostID=" .$row_news['PostID'];
    $result_count_comment = mysqli_query($conn, $sql_count_comment);
    $row_count_comment = mysqli_fetch_assoc($result_count_comment);
?>
                        <div class="comment-index">
                            <div class="comment-index-item" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                                <?php echo $row_count_comment['count(CommentID)'];?> bình luận 
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
                    <div class="col-md-12 comment-input-form">
                        <a class="icon"  href="userProfile.html">
                            <img class="user-img" src="assets/images/content-img.jpeg" alt="">
                        </a>
                        <div class="comment-input">
                            <input type="text" placeholder=" Viết bình luận" class="form-control">
                        </div>
                    </div>
                </div>
<!--COMMENTS-->
    <ul class="collapse collapse-horizontal comments" id="collapseWidthExample">
<?php
//TRUY VẤN COMMENT, COMMENT_USET
            $sql_comment = "SELECT * from view_comment WHERE PostID =" .$row_news['PostID'];
            $result_comment = mysqli_query($conn, $sql_comment);
            if(mysqli_num_rows($result_comment) > 0){
                while ($row_comment = mysqli_fetch_assoc($result_comment)){
?>
        <li class="comment-item">
            <a class="icon" href="userProfile.php">
                <img class="user-img" src="assets/images/content-img.jpeg" alt="">
            </a>
            <div class="commentator-name">
                <a href="userProfile.php" class="user-name text-decoration-none link-dark">
                    <b><?php echo $row_comment['UserName'];?></b>
                </a>
                    <p class="comment-content">
                        <?php echo $row_comment['CommentContent'];?>
                    </p>
            </div>
        </li>
<?php
                    }   
                }
?>
    </ul>
            </div>
        </div>
<?php
            }
        }

?>
<!--THINKING POST-->
    <div class="col-md-9 mb-4 mb-md-0 thinking-post">
        <div class="modal fade" id="buttonModalUserPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">
                        <strong>Tạo bài viết</strong>
                      </h5>
                      <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <textarea id="post-writing" cols="50" rows="5" class="modal-body" placeholder="Hãy viết gì đó..."></textarea>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                            Đóng
                        </button>
                        <button type="button" class="btn btn-primary">
                            Lưu
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--RIGHT-SIDE-BAR-->
    <div id="right-side-bar">
        <div class="row">
            <h6>Người liên hệ</h6>  
        </div>
<?php
    $sql_friend = "SELECT *
                    FROM(SELECT UserID, CONCAT(UserFirstName, ' ', UserLastName) as UserName, UserAva
                        FROM friend_ship INNER JOIN user_profile
                        on UserID = User1ID or UserID = User2ID
                        WHERE User1ID = 1 or User2ID = 1) as Bang
                    WHERE UserID != 1";
    $result_friend = mysqli_query($conn, $sql_friend);
    if(mysqli_num_rows($result_friend) > 0){
        while($row_friend = mysqli_fetch_assoc($result_friend)){

?>
        <div class="row">
            <div class="sidebar-item">
                <div class="icon"></div>
                <div class="text">
                    <b><?php  echo $row_friend['UserName'];?></b>
                </div>
            </div>
        </div>
<?php
        }
    }

?>

        <div class="row">
            <hr>    
        </div>
        <div class="row">
            <h6>Cuộc trò chuyện nhóm</h6>
        </div>
    </div>
    </main>
<?php
    include "template/footer.php";
?>