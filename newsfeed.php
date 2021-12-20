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
                    <a id="thinking-user" href="userProfile.html">
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
        <div class="news">
            <div class="row">
                <div class="heading">
                    <a class="user-ava" href="userProfile.html">
                        <img class="user-img" src="assets/images/content-img.jpeg" alt="">
                    </a>
                    <div class="user-name-time">
                        <a href="userProfile.html" class="user-name text-decoration-none link-dark">
                            <b>User Name</b>
                        </a>
                        <h6 class="time">Hôm qua lúc 19:00</h6>
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
                                    <span class="material-icons-outlined">report</span>
                                    <b>Lưu bài viết</b>
                                </div>
                                <div class="col-md-12 items">
                                <span class="material-icons-outlined">bookmarks</span>
                                    <b>Báo cáo bài viết</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-content">
                    <div class="content-caption">
                        Hello World!Hello World!Hello World!Hello World!Hello World!Hello World!Hello World!Hello World!
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
                        <div class="comment-index">
                            <div class="comment-index-item" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                                100 bình luận 
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
        <li class="comment-item">
            <a class="icon" href="userProfile.html">
                <img class="user-img" src="assets/images/content-img.jpeg" alt="">
            </a>
            <div class="commentator-name">
                <a href="userProfile.html" class="user-name text-decoration-none link-dark">
                    <b>User Name</b>
                </a>
                    <p class="comment-content">đây là commentđây là commentđây là commentđây là comment
                    đây là commentđây là commentđây là commentđây là comment
                    đây là commentđây là commentđây là commentđây là comment
                    đây là commentđây là commentđây là commentđây là comment
                    đây là commentđây là commentđây là commentđây là comment
                    đây là commentđây là commentđây là commentđây là comment
                    đây là commentđây là commentđây là commentđây là comment
                    </p>
            </div>
        </li>
    </ul>
            </div>
        </div>
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
                    <div class="modal-body">...</div>
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
        <div class="row">
            <div class="sidebar-item">
                <div class="icon"></div>
                <div class="text">
                    <b>User Name</b>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="sidebar-item">
                <div class="icon"></div>
                <div class="text">
                    <b>User Name</b>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="sidebar-item">
                <div class="icon"></div>
                <div class="text">
                    <b>User Name</b>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="sidebar-item">
                <div class="icon"></div>
                <div class="text">
                    <b>User Name</b>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="sidebar-item">
                <div class="icon"></div>
                <div class="text">
                    <b>User Name</b>
                </div>
            </div>
        </div>
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