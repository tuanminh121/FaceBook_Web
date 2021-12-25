<?php
    include "template/header.php"
?>
    <main>
      <!-- Section: white bg -->
      <section class="bg-white mb-4 shadow-2">
        <div class="container">
          <!-- Section: images -->
          <section class="mb-10">
            <!-- Background image -->
            <div
              class="p-5 text-center bg-image shadow-1-strong rounded-bottom"
              style="
                background-image: url('assets/images_dev/sky.jpg');
                height: 400px;
              "
            ></div>
<?php
    //KẾT NỐI SQL
        $conn = mysqli_connect('localhost','root','','facebook');
        if(!$conn){
            die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
        }
        $sql_ava = "SELECT * from user_profile where UserID=1";
        $result_ava = mysqli_query($conn, $sql_ava);
        if(mysqli_num_rows($result_ava) > 0) {
          while($row_ava = mysqli_fetch_assoc($result_ava)) {
            global $row_ava;
?>
            <div class="d-flex justify-content-center">
              <img
                src=" <?php echo $row_ava['UserAva'] ?>"
                alt=""
                class="
                  rounded-circle
                  shadow-3-strong
                  position-absolute
                  border border-white
                " 
                id = "avatarImg"
                style="width: 168px; margin-top: -60px"
                onClick="clickImg()"
              />
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
              <button
                type="button"
                class="btn btn-link bg-light"
                datadata-ripple-color="dark"
              >
                Bài viết
              </button>
              <button
                type="button"
                class="btn btn-link text-reset"
                datadata-ripple-color="dark"
                onClick="document.location.href='userProfile_gioithieu.php'"
              >
                Giới thiệu
              </button>
              <button
                type="button"
                class="btn btn-link text-reset"
                datadata-ripple-color="dark"
                onclick="document.location.href=''"
              >
                Bạn bè
              </button>
              <button
                type="button"
                class="btn btn-link text-reset"
                datadata-ripple-color="dark"
              >
                Ảnh
              </button>
              <button
                type="button"
                class="btn btn-link text-reset"
                datadata-ripple-color="dark"
              >
                Video
              </button>
              <div class="dropdown d-inline-block">
                <button
                  class="btn btn-link dropdown-toggle text-reset"
                  type="button"
                  id="dropdownMenuButton"
                  data-mdb-toggle="dropdown"
                  aria-expanded="false"
                >
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
              <button
                type="button"
                class="btn btn-light bg-light mr-2"
                data-mdb-ripple-color="dark"
              >
                <i class="far fa-edit me-2"></i>Chỉnh sửa trang cá nhân
              </button>
              <button
                type="button"
                class="btn btn-light bg-light mr-2"
                data-mdb-ripple-color="dark"
              >
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
                  <button
                    type="button"
                    class="btn mt-3 btn-light bg-light btn-block"
                  >
                    <strong> Thêm tiểu sử</strong>
                  </button>
                  <ul class="list-unstyled text-muted mt-3">
                    <li>
                      <i class="fas fa-house-damage me-2 mt-3"></i>Sống tại
                      <a
                        href="https://vi.wikipedia.org/wiki/H%C3%A0_N%E1%BB%99i"
                        ><strong> <?php echo $row_ava['UserAddress'] ?> </strong></a
                      >
                    </li>
                    <li>
                      <i class="fas fa-map-marker-alt me-2 mt-3"></i>Đến từ
                      <a
                        href="https://vi.wikipedia.org/wiki/H%C3%A0_N%E1%BB%99i"
                        ><strong> <?php echo $row_ava['UserAddress'] ?> </strong></a
                      >
                    </li>
                    <li>
                      <i class="fab fa-github me-2 mt-3"></i
                      ><a href="https://github.com/vantranthao"
                        >https://github.com/vantranthao</a
                      >
                    </li>
                    <li>
                      <i class="fas fa-school me-2 mt-3"></i
                      ><a href="http://c3chuongmya.edu.vn/">THPT Chương Mỹ A</a>
                    </li>
                  </ul>

                  <button
                    type="button"
                    class="btn btn-light bg-light btn-block mt-3"
                  >
                    <strong> Chỉnh sửa chi tiết</strong>
                  </button>
                  <button
                    type="button"
                    class="btn btn-light bg-light btn-block mt-3"
                  >
                    <strong>Thêm sở thích</strong>
                  </button>
<?php
      }
    }
    mysqli_close($conn);
?>
<?php
    //KẾT NỐI SQL
        $conn = mysqli_connect('localhost','root','','facebook');
        if(!$conn){
            die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
        }
        $sql_img = "SELECT * from images, post, user_profile where images.PostID = post.PostID and post.UserID = user_profile.UserID 
        and user_profile.UserID = 1";
        $result_img = mysqli_query($conn, $sql_img);
        if(mysqli_num_rows($result_img) > 0) {
          while($row_img = mysqli_fetch_assoc($result_img)) {
            global $row_img;
?>
                  <div class="lightbox mt-4">
                    <div class="row gx-2">
<!-- ảnh đang sửa ở đây -->

                      <div class="col-lg-4 mb-3">
                        <a href="<?php echo $row_img['images'] ?>" target="_blank">
                          <img
                            src="<?php echo $row_img['images'] ?>"
                            alt=""
                            class="w-100 shadow-1-strong rounded"
                          />
                        </a>
                      </div>
                    </div>
                  </div>
<?php
      }
    }
    mysqli_close($conn);
?>
                  <button
                    type="button"
                    class="btn btn-light bg-light btn-block"
                  >
                    <strong>Chỉnh sửa</strong>
                  </button>
                </div>
              </div>
<!-- chưa làm được phần ả`nh này!!!! -->
              <!-- ảnh feature -->
              <div class="card mb-3">
                <div class="card-body">
                  <a href="" class="text-reset d-inline-block"
                    ><h5 class="card-title mt"><strong>Ảnh</strong></h5></a
                  >
                  <a
                    href=""
                    class="btn btn-link d-inline-block py-1 px-3"
                    style="float: right"
                    >Xem tất cả ảnh</a
                  >
                  <div class="lightbox mt-4">
                    <div class="row gx-2">
                      <div class="col-lg-4 mb-3">
                        <img
                          src="assets/images_dev/aot_01.jpg"
                          alt=""
                          class="w-100 h-100 shadow-1-strong rounded"
                        />
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
                    <a href="" class="text-reset"
                      ><h5 class="card-title mt"><strong>Bạn bè</strong></h5></a
                    >
                    <p class="friend_numbers">1420 người bạn</p>
                  </div>
                  <div class="card_right d-inline-block" style="float: right">
                    <a href="" class="btn btn-link py-1 px-3"
                      >Xem tất cả bạn bè</a
                    >
                  </div>

                  <div class="row gx-2">
                    <div class="col-lg-4 text-center mb-4">
                      <img
                        src="assets/images_dev/ava1.jpg"
                        alt=""
                        class="w-100 h-100 shadow-1-strong rounded"
                      />
                      <p><small>Kelly Hel</small></p>
                    </div>
                    
                  </div>
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
              <!-- Modal -->
              <div
                class="modal fade"
                id="buttonModalUserPost"
                tabindex="-1"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
              >
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

<?php
    //KẾT NỐI SQL
        $conn = mysqli_connect('localhost','root','','facebook');
        if(!$conn){
            die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
        }
        $sql_ava = "SELECT * from user_profile where UserID=1";
        $result_ava = mysqli_query($conn, $sql_ava);
        if(mysqli_num_rows($result_ava) > 0) {
          while($row_ava = mysqli_fetch_assoc($result_ava)) {
            global $row_ava;
?>
              <div class="card mb-4">
                <div class="card-body">
                  <div class="d-flex">
                    <a style="margin-right: 0.5rem;" href=""
                      ><img
                        src="<?php echo $row_ava['UserAva'] ?>"
                        alt=""
                        style="height: 40px; margin-right: 8px"
                        class="rounded-circle border"
                    /></a>
                    <button
                      class="btn btn-light btn-block btn-rounded bg-light" data-mdb-toggle="modal"
                      data-mdb-target="#buttonModalUserPost"
                    >
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
<?php
                    }   
                }
?>
<!-- bài viết từ đây -->
<?php
    //KẾT NỐI SQL
        $conn = mysqli_connect('localhost','root','','facebook');
        if(!$conn){
            die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
        }
        $sql_news = "SELECT * from post INNER JOIN user_profile on post.UserID = user_profile.UserID inner join images on images.PostID = post.PostID WHERE user_profile.UserID = 1;";
        $result_news = mysqli_query($conn, $sql_news);
        if(mysqli_num_rows($result_news) > 0) {
          while($row_news = mysqli_fetch_assoc($result_news)) {
            global $row_news;
?>
              <div class="card text-start|center|end mb-3">
                <div class="card-body">
                  <div class="d-flex">
                    <a href="<?php echo $row_news['UserAva'] ?>"
                      ><img
                        src="<?php echo $row_news['UserAva'] ?>"
                        alt=""
                        style="height: 40px; margin-right: 8px"
                        class="rounded-circle border"
                    /></a>
                    <div class="mb-2">
                      <a href="" class="text-dark mb-0"><strong> <?php echo $row_news['UserFirstName'] . " " . $row_news['UserLastName'] ?></strong></a>
                      <a href="" class="text-muted d-block" style="margin-top: -6px;"><small> <?php echo $row_news['PostTime'] ?></small></a>
                    </div>
<!-- option -->
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

                  <p><?php echo $row_news['PostCaption'] ?></p>

                </div>
                <div class="content-images">
                  <a href="<?php echo $row_news['images'] ?>" target="_blank">
                    <img src="<?php echo $row_news['images'] ?>" class="w-100" alt="">
                  </a>
                </div>
                <div class="action-comment">
                    <div class="action-comment-above">
                        <div class="action-index">
                            <span class="material-icons-round">
                                emoji_emotions
                            </span>
                        </div>

<?php
  //ĐẾM LƯỢT BÌNH LUÂN ???
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
<!--COMMENT INPUT--><?php
//TRUY VẤN COMMENT, COMMENT_USET ???
            $sql_comment = "SELECT * from view_comment WHERE PostID =" .$row_news['PostID'];
            $result_comment = mysqli_query($conn, $sql_comment);
            if(mysqli_num_rows($result_comment) > 0){
                while ($row_comment = mysqli_fetch_assoc($result_comment)){
?>
  <ul class="collapse collapse-horizontal comments" id="collapseWidthExample">
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
            <div id="edit-comment" class="hide">
                <span class="hide material-icons-outlined option-comment option-icon" style="font-size:15px">
                    edit
                </span>
                <a href="process_delete_comment.php?CommentID=<?php echo $row_comment['CommentID'];?>
                        &&CommentUserID=<?php echo $row_comment['UserID']?>&&UserID=2" class="link-dark">
                <span class="hide material-icons-outlined option-comment option-icon" style="font-size:15px">
                    delete_forever
                </span>
                </a>
            </div>
        </li>
  </ul>
  <?php
                    }   
                }
?>
              </div>
<?php
                    }   
                }
?>
            </div>
            <!-- right -->

          </div>
        </div>

      </section>
      <!-- Section grey bg -->
    </main>
    <script>
function clickImg() {
    var avatarImg = document.getElementById('avatarImg')
    var url = avatarImg.getAttribute('scr');
    window.open(url, "_blank");
}

</script>

<?php
    include "template/footer.php"
?>