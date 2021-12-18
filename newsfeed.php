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
        <div class="news">
            <div class="row">
                <div class="heading">
                    <div class="user-ava"></div>
                    <div class="user-name-time">
                        <b class="user-name">User Name</b>
                        <h6 class="time">Hôm qua lúc 19:00</h6>
                    </div>
                </div>
                <div class="news-content">
                    <div class="content-caption">
                        Hello World!
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
                            <div class="comment-index-item">
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
                            <div class="action-name">
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
                <div class="row">
                    <hr>
                </div>
                <div class="d-flex mb-2 comment-input">
                    <a href="">
                        <img src="assets/images/content-img.jpeg" alt="" class="rounded-circle border"/>
                    </a>
                    <div class="form-outline w-100">
                      <input type="text" id="formControlLg" class="form-control form-control-lg"/>
                      <label class="form-label" for="formControlLg">Viết bình luận...</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="news"></div>
        <div class="news"></div>
        <div class="news"></div>
        <div class="news"></div>
        <div class="news"></div>
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