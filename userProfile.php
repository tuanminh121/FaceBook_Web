<?php
include "template/header.php";
include "src/connectDB.php";

$queryProfile = "SELECT * from user_profile where UserID='$UserID'";
$result_ava = mysqli_query($conn, $queryProfile);
if (mysqli_num_rows($result_ava) > 0) {
  $row_ava = mysqli_fetch_assoc($result_ava);
}
?>
<main>
  <!-- Section: white bg -->
  <section class="bg-white mb-4 shadow-2">
    <div class="container">
      <!-- Section: images -->
      <section class="mb-10">
        <!-- Background image -->
        <div class="p-5 text-center bg-image shadow-1-strong rounded-bottom" style="
                background-image: url('assets/images_dev/sky.jpg');
                height: 400px;
              " onclick="clickImg('assets/images_dev/sky.jpg')"></div>

        <div class="d-flex justify-content-center">
          <img src="<?php echo defaultImage($row_ava['UserAva']) ?>" alt="" class="
                  rounded-circle
                  shadow-3-strong
                  position-absolute
                  border border-white
                " id="avatarImg" style="width: 180px;height:180px; margin-top: -60px" onclick="clickImg('<?php echo defaultImage($row_ava['UserAva']) ?>')" />
        </div>
        <!-- Background image -->
      </section>
      <!-- Section: images -->

      <!-- Section: user data -->
      <section class="text-center border-bottom">
        <div class="row d-flex justify-content-center">
          <div class="col-md-6">
            <h2><strong> <?php echo $row_ava['UserFirstName'] . " " . $row_ava['UserLastName'] ?> </strong></h2>
            <p class="text-muted">
              <?php echo $row_ava['Description'] ?>
            </p>
          </div>
        </div>
      </section>

      <!-- Section buttons -->
      <section class="py-2 d-flex justify-content-between">
        <!-- left -->
        <div>
          <button type="button" class="btn btn-link bg-light" datadata-ripple-color="dark" onclick="document.location.href='userProfile.php'">
            Bài viết
          </button>
          <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark" onclick="document.location.href='userProfile_gioithieu.php'">
            Giới thiệu
          </button>
          <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark" onclick="document.location.href='userProfile_myFriend.php'">
            Bạn bè
          </button>
          <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark" onclick="document.location.href='userProfile_image.php'">
            Ảnh
          </button>
          <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark" onclick="document.location.href='userProfile_video.php'">
            Video
          </button>
          <div class="dropdown d-inline-block">
            <button class="btn btn-link dropdown-toggle text-reset" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
              Xem thêm
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <li><a class="dropdown-item" href="#">Thể thao</a></li>
              <li><a class="dropdown-item" href="#">Âm nhạc</a></li>
              <li><a class="dropdown-item" href="#">Giải trí</a></li>
            </ul>
          </div>
        </div>
        <!-- left -->

        <!-- right -->
        <div>
          <button type="button" class="btn btn-light bg-light mr-2" data-mdb-ripple-color="dark">
            <i class="far fa-edit me-2"></i>Chỉnh sửa trang cá nhân
          </button>
          <button type="button" class="btn btn-light bg-light mr-2" data-mdb-ripple-color="dark">
            <i class="fas fa-search me-2"></i>Tìm kiếm
          </button>
        </div>
        <!-- right -->
      </section>
      <!-- Section buttons -->
    </div>
  </section>
  <!-- Section: white bg -->

  <!-- Section grey bg -->
  <section>
    <div class="container">
      <div class="row">
        <!-- left -->
        <div class="col-md-5 mb-4 mb-md-0">
          <div class="card mb-3">
            <div class="card-body">
              <h5 class="card-title mt"><strong>Giới thiệu</strong></h5>
              <button type="button" class="btn mt-3 btn-light bg-light btn-block">
                <strong> Thêm tiểu sử</strong>
              </button>
              <ul class="list-unstyled text-muted mt-3">
                <li>
                  <i class="fas fa-house-damage me-2 mt-3"></i>Sống tại
                  <a href="https://vi.wikipedia.org/wiki/H%C3%A0_N%E1%BB%99i"><strong> <?php echo $row_ava['UserAddress'] ?> </strong></a>
                </li>
                <li>
                  <i class="fas fa-map-marker-alt me-2 mt-3"></i>Đến từ
                  <a href="https://vi.wikipedia.org/wiki/H%C3%A0_N%E1%BB%99i"><strong> <?php echo $row_ava['UserAddress'] ?> </strong></a>
                </li>
                <li>
                  <i class="fab fa-github me-2 mt-3"></i><a href="https://github.com/vantranthao">https://github.com/vantranthao</a>
                </li>
                <li>
                  <i class="fas fa-school me-2 mt-3"></i><a href="http://c3chuongmya.edu.vn/">THPT Chương Mỹ A</a>
                </li>
              </ul>

              <button type="button" class="btn btn-light bg-light btn-block mt-3">
                <strong> Chỉnh sửa chi tiết</strong>
              </button>
              <button type="button" class="btn btn-light bg-light btn-block mt-3">
                <strong>Thêm sở thích</strong>
              </button>
              <?php
              $sql_img = "SELECT * from images, post, user_profile where images.PostID = post.PostID and post.UserID = user_profile.UserID 
        and user_profile.UserID = " . $UserID;
              $result_img = mysqli_query($conn, $sql_img);
              if (mysqli_num_rows($result_img) > 0) {
                while ($row_img = mysqli_fetch_assoc($result_img)) {
                  global $row_img;
              ?>
                  <div class="lightbox mt-4">
                    <div class="row gx-2">
                      <!-- ảnh đang sửa ở đây -->

                      <div class="col-lg-4 mb-3">
                        <a href="<?php echo $row_img['images'] ?>" target="_blank">
                          <img src="<?php echo $row_img['images'] ?>" alt="" class="w-100 shadow-1-strong rounded" />
                        </a>
                      </div>
                    </div>
                  </div>
              <?php
                }
              }
              ?>
              <button type="button" class="btn btn-light bg-light btn-block">
                <strong>Chỉnh sửa</strong>
              </button>
            </div>
          </div>
          <!-- chưa làm được phần ả`nh này!!!! -->
          <!-- ảnh feature -->
          <div class="card mb-3">
            <div class="card-body">
              <a href="" class="text-reset d-inline-block">
                <h5 class="card-title mt"><strong>Ảnh</strong></h5>
              </a>
              <a href="" class="btn btn-link d-inline-block py-1 px-3" style="float: right">Xem tất cả ảnh</a>
              <div class="lightbox mt-4">
                <div class="row gx-2">
                  <div class="col-lg-4 mb-3">
                    <img src="assets/images_dev/aot_01.jpg" alt="" class="w-100 h-100 shadow-1-strong rounded" />
                  </div>

                </div>
              </div>
            </div>
          </div>

          <!-- ảnh feature -->
          <!-- friends -->
          <div class="card mb-3">
            <div class="card-body">
              <div class="card_left d-inline-block">
                <a href="" class="text-reset">
                  <h5 class="card-title mt"><strong>Bạn bè</strong></h5>
                </a>
                <?php
                $queryCount = "SELECT COUNT(*) as total FROM user_profile, friend_ship 
            WHERE (friend_ship.User1ID = UserID OR friend_ship.User2ID = UserID)
            AND UserID != $UserID 
            AND (friend_ship.User1ID = $UserID OR friend_ship.User2ID = $UserID);";
                $resultCount = mysqli_query($conn, $queryCount);
                if (mysqli_num_rows($resultCount) > 0) {
                  $rowCount = mysqli_fetch_assoc($resultCount);
                  echo '<p class="friend_numbers">' . $rowCount['total'] . ' người bạn</p>';
                }
                ?>
              </div>
              <div class="card_right d-inline-block" style="float: right">
                <a href="" class="btn btn-link py-1 px-3">Xem tất cả bạn bè</a>
              </div>
              <?php
              $queryFriends = "SELECT * FROM user_profile, friend_ship 
            WHERE (friend_ship.User1ID = UserID OR friend_ship.User2ID = UserID)
            AND UserID != $UserID 
            AND (friend_ship.User1ID = $UserID OR friend_ship.User2ID = $UserID)  
            GROUP BY UserID LIMIT 6;";
              $resultFriends = mysqli_query($conn, $queryFriends);
              if (mysqli_num_rows($resultFriends) > 0) {
                $count = 0;
                while ($rowFriends = mysqli_fetch_assoc($resultFriends)) {
                  if ($count % 3 == 0) {
                    echo '<div class="row">';
                  }
                  echo '<div class="col-md-4 text-center">';
                  echo '<img src="' . defaultImage($rowFriends['UserAva']) . '" alt="" class="shadow-1-strong rounded" style="width: 75px; height: 75px;"/>';
                  echo '<p><small>' . $rowFriends['UserFirstName'] . " " . $rowFriends['UserLastName'] . '</small></p>';
                  echo '</div>';
                  if ($count % 3 == 2) {
                    echo '</div>';
                  }
                  $count++;
                }
              }
              ?>
            </div>
          </div>
          <!-- friends -->
          <!-- footer -->
          <?php
          include "template/footer_link.php"
          ?>
          <!-- footer -->
        </div>
        <!-- left -->

        <!-- right -->
        <div class="col-md-7 mb-4 mb-md-0">
          <!--THINKING POST-->
          <div class="card mb-4 thinking-post">
            <div class="card-body">
              <div class="d-flex">
                <a id="thinking-user" href="userProfile.php">
                  <img src="<?php echo defaultImage($row_ava['UserAva']) ?>" alt="" class="rounded-circle border" />
                </a>
                <button class="btn btn-light btn-block btn-rounded bg-light" data-mdb-toggle="modal" data-mdb-target="#buttonModalUserPost">
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
          //TRUY VẤN POST, POST_USER
          $sql = "SELECT * from post, user_profile, images WHERE post.UserID = user_profile.UserID AND user_profile.UserID = " . $UserID . " GROUP BY post.PostID";
          //Người đăng nhập-->
          $result_news = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result_news) > 0) {
            while ($row_news = mysqli_fetch_assoc($result_news)) {
          ?>
              <div class="news">
                <div class="row">
                  <div class="heading">
                    <a class="user-ava" href="userProfile.php">
                      <img class="user-img" src="<?php echo defaultImage($row_ava['UserAva']) ?>" alt="">
                    </a>
                    <div class="user-name-time">
                      <a href="userProfile.php" class="user-name text-decoration-none link-dark">
                        <b><?php echo $row_ava['UserFirstName'] . " " . $row_ava['UserLastName'] ?></b>
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
                      <img src="<?php echo defaultImage($row_news['images']) ?>" alt="">
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
                    <form id="comment-form" action="src/userProfile/addComment.php" method="post" autocomplete="off">
                      <div class="col-md-12 comment-input-form">
                        <a class="icon" href="userProfile.php">
                          <img class="user-img" src="<?php echo defaultImage($row_ava['UserAva']) ?>" alt="">
                        </a>
                        <input class="ID" type="text" value="<?php echo $row_news['PostID']; ?>" name="PostID">
                        <input class="ID" type="text" value="2" name="UserID">
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
                    //TRUY VẤN COMMENT, COMMENT_USET
                    $sql_comment = "SELECT * from view_comment WHERE PostID =" . $row_news['PostID'];
                    $result_comment = mysqli_query($conn, $sql_comment);
                    if (mysqli_num_rows($result_comment) > 0) {
                      while ($row_comment = mysqli_fetch_assoc($result_comment)) {
                    ?>
                        <li class="comment-item myDIV">
                          <a class="icon" href="userProfile.php">
                            <?php
                            //TRUY VẤN COMMENT, COMMENT_USET
                            $queryAvatar = "SELECT * from user_profile WHERE UserID =" . $row_comment['UserID'];
                            $resultAvatar = mysqli_query($conn, $queryAvatar);
                            if (mysqli_num_rows($resultAvatar) > 0) {
                              $rowAvatar = mysqli_fetch_assoc($resultAvatar);
                            }
                            ?>
                            <img class="user-img" src="<?php echo defaultImage($row_ava['UserAva']) ?>" alt="">
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
                            <form class="content" id="form-edit-comment" action="src/userProfile/updateComment.php" method="post">
                              <input class="ID" type="text" value="<?php echo $row_comment['UserID']; ?>" name="CommentUserID">
                              <input class="ID" type="text" value="2" name="UserID">
                              <!--Người đăng nhập-->
                              <input class="ID" type="text" value="<?php echo $row_comment['CommentID']; ?>" name="CommentID">
                              <textarea id="input-edit-comment" name="txt-edit" id="" cols="30" rows="4"><?php echo $row_comment['CommentContent']; ?></textarea>
                              <button id="btn-edit-comment" name="btn-edit" type="submit">Lưu</button>
                            </form>
                            <a href="src/userProfile/deleteComment.php?CommentID=<?php echo $row_comment['CommentID']; ?>
                        &&CommentUserID=<?php echo $row_comment['UserID'] ?>&&UserID=2" class="link-dark">
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


              </div>
          <?php
            }
          }
          ?>
          <!--THINKING POST-->
          <div class="col-md-9 mb-4 mb-md-0 thinking-post">
            <div class="modal fade" id="buttonModalUserPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <form id="post-form" action="src/userProfile/addPost.php" method="post" autocomplete="off">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">
                        <strong>Tạo bài viết</strong>
                      </h5>
                      <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <input type="text" name="UserID" value="<?php echo $UserID?>" hidden>
                    <textarea id="post-writing" cols="50" rows="5" class="modal-body" placeholder="Hãy viết gì đó..." name="txt-content"></textarea>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Đóng
                      </button>
                      <button type="submit" class="btn btn-primary" name="btn-sendPost" >
                        Lưu
                      </button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- right -->

    </div>
    </div>

  </section>
  <!-- Section grey bg -->
</main>
<script>
  function clickImg(link) {
    window.open(link, "_blank");
  }
</script>

<?php
include "template/footer.php"
?>