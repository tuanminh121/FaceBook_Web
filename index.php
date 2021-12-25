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
                WHERE UserID != 2"; //Người đăng nhập-->
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
                        <div class="option-icon collapsibleOption" >
                            <span class="material-icons-outlined" style="position: absolute;">
                                more_horiz
                            </span>
                        </div>
                        <div class="collapse contentOption" >
                            <div class="option-item">
                                <div class="col-md-12 items">
                                <span class="material-icons-outlined">history</span>
                                    <b>Xem lịch sử chỉnh sửa</b>
                                </div>
                                <div class="col-md-12 items">
                                    <span class="material-icons-outlined">bookmarks</span>
                                    <b>Lưu bài viết</b>
                                </div>
                                <a class="col-md-12 items link-dark" href="src/process_report.php?PostID=<?php echo $row_news['PostID'];?>
                                &&PostUserID=<?php echo $row_news['UserID'];?>">
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
                    <form id="comment-form" action="src/process_add_comment.php" method="post" autocomplete="off">
                        <div class="col-md-12 comment-input-form">
                            <a class="icon"  href="userProfile.php">
                                <img class="user-img" src="assets/images/content-img.jpeg" alt="">
                            </a>
                            <input class="ID" type="text" value="<?php echo $row_news['PostID'];?>" name="PostID">
                            <input class="ID" type="text" value="2" name="UserID">    <!--Người đăng nhập-->
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
//TRUY VẤN COMMENT, COMMENT_USET
            $sql_comment = "SELECT * from view_comment WHERE PostID =" .$row_news['PostID'];
            $result_comment = mysqli_query($conn, $sql_comment);
            if(mysqli_num_rows($result_comment) > 0){
                while ($row_comment = mysqli_fetch_assoc($result_comment)){
?>
        <li class="comment-item myDIV">
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
<!--EDIT COMMENT-->
            <div id="edit-comment" class="hide">
                <div class="option-comment option-icon collapsible">
                    <span id="btn-edit" class="material-icons-outlined option-comment option-icon" style="font-size:15px">
                        edit
                    </span>
                </div>
                <form class="content" id="form-edit-comment" action="src/process_update_comment.php" method="post">
                    <input class="ID" type="text" value="<?php echo $row_comment['UserID'];?>" name="CommentUserID">
                    <input class="ID" type="text" value="2" name="UserID"> <!--Người đăng nhập-->
                    <input class="ID" type="text" value="<?php echo $row_comment['CommentID'];?>" name="CommentID">
                    <textarea id="input-edit-comment" name="txt-edit" id="" cols="30" rows="4"><?php echo $row_comment['CommentContent']; ?></textarea>
                    <button id="btn-edit-comment" name="btn-edit" type="submit">Lưu</button>
                </form>
                <a href="src/process_delete_comment.php?CommentID=<?php echo $row_comment['CommentID'];?>
                        &&CommentUserID=<?php echo $row_comment['UserID']?>&&UserID=2" class="link-dark">
                <span class="hide material-icons-outlined option-comment option-icon" style="font-size:15px">
                    delete_forever
                </span>
                </a>
            </div>
        </li>
<?php
                    }   
                }
?>
    </ul>
            </div>
<<<<<<< HEAD
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="src/signup/process-signup.php" method="post">
              <div class="mb-3">
                <div class="firstRow d-flex align-items-center justify-content-center">
                  <input name="firstnameSignUp" type="text" class="form-control me-2 p-2 form-control-input" id="recipient-first-name" placeholder="First name" required autofocus>
                  <input name="lastnameSignUp" type="text" class="form-control p-2 form-control-input" id="recipient-sur-name" placeholder="Last name" required>
                </div>
                <input name="emailSignUp" type="email" class="form-control mt-2 p-2 form-control-input" id="recipient-mobile-mail" placeholder="Email address" required>
                <input name="pwSignUp" type="password" class="form-control mt-2 p-2 form-control-input" id="recipient-password" placeholder="New password" required>
              </div>
              <div class="mb-3">
                <span class="form-description">Date of birth</span>
                <div class="date-of-birth-wrapper d-flex align-items-center justify-content-center">
                  <select name="dayOfBirth" class="form-select" id="" required>
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                  </select>
                  <select name="monthOfBirth" class="form-select ms-2" id="" required>
                    <option value="1" selected>Jan</option>
                    <option value="2">Feb</option>
                    <option value="3">Mar</option>
                    <option value="4">Apr</option>
                    <option value="5">May</option>
                    <option value="6">Jun</option>
                    <option value="7">Jul</option>
                    <option value="8">Aug</option>
                    <option value="9">Sep</option>
                    <option value="10">Oct</option>
                    <option value="11">Nov</option>
                    <option value="12">Dec</option>
                  </select>
                  <select name="yearOfBirth" class="form-select ms-2" id="" required>
                    <option value="2021" selected>2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                    <option value="2004">2004</option>
                    <option value="2003">2003</option>
                    <option value="2002">2002</option>
                    <option value="2001">2001</option>
                    <option value="2000">2000</option>
                    <option value="1999">1999</option>
                    <option value="1998">1998</option>
                    <option value="1997">1997</option>
                    <option value="1996">1996</option>
                    <option value="1995">1995</option>
                    <option value="1994">1994</option>
                    <option value="1993">1993</option>
                    <option value="1992">1992</option>
                    <option value="1991">1991</option>
                  </select>
=======
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
>>>>>>> ad9fe155c4d1e1700ba11b5a65baa66b98c6c253
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
        <a class="row" href="userProfile_friend.php">
            <div class="sidebar-item">
                <div class="icon"></div>
                <div class="text">
                    <b><?php  echo $row_friend['UserName'];?></b>
                </div>
            </div>
        </a>
<?php
        }
    }
    //ĐÓNG KẾT NỐI
    mysqli_close($conn);
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