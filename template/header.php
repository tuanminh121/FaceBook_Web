<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--THƯ VIỆN BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!--THƯ VIỆN FONT AWASOME-->
    <script src="https://kit.fontawesome.com/f15068147b.js" crossorigin="anonymous"></script>
<!--THƯ VIỆN GOOGLE FONT-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
<!--CSS MDB-->
    <link rel="stylesheet" href="assets/css_mdb/mdb.min.css" />
<!--CSS FOR HEADER-->
    <link rel="stylesheet" href="assets/css/header.css">
<!--CSS FOR SIDEBAR-->
    <link rel="stylesheet" href="assets/css/sidebar.css">
<!--CSS FOR NEWSFEED-->
    <link rel="stylesheet" href="assets/css/newsfeed2.css">
<!--CSS FOR SEARCH-->
    <link rel="stylesheet" href="assets/css/search.css">
<!--CSS FOR USERPROFILE-->
    <link rel="stylesheet" href="assets/css/userProfile.css">
<!--FaceBook LOGO-->
    <link rel="icon" href="assets\images\Facebook_logo\Facebook_logo.ico" type="image/x-icon"/>
    <title>Facebook</title>
</head>
<body>
<?php
    session_start();    
    if(!isset($_SESSION['isLoginOk'])) {
        header('Location: login.php');
    }
    $UserID = $_SESSION['isLoginOk'];
?>
<!--HEADER-->
    <header class="container-fluid">
    <nav class="navbar navbar-light bg-light fixed-top fb-navbar">
        <div class="container-fluid inner-fb-navbar">
            <div class="navbar-left">
          <a class="navbar-brand" href="index.php">
            <div class="fb_logo icon">
                <i class="fab fa-facebook-f fb-icon"></i>
            </div>
          </a>
          <form class="d-flex" action="search.php" method="post" autocomplete="off">
            <input name="search-input" class="form-control me-2 search-input" type="search" placeholder="Tìm kiếm..." aria-label="Search">
            <button name="search-btn" class="search-button" type="submit">
                <span class="material-icons-round search-icon">
                    search
                </span>
            </button>
          </form>
          <a class="sidebar-menu button link-dark" href="bookmarks.php">
            <span class="material-icons-round sidebar-menu-icon">
                menu
            </span>
          </a>
          </div>
          <div class="col-md 4 navbar-center">
            <div class="navbar-center-list">
            <div class="nav-item">
                <a class="nav-link active navbar-center-item" aria-current="page" href="index.php">
                    <div class="home icon" title="Home">
                        <span class="material-icons-round home-icon" style="color: #1877F2;">
                            home
                        </span>
                    </div>
                    <div class="underline"> </div>
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link navbar-center-item" href="#">
                    <div class="watch icon" title="Watch">
                        <span class="material-icons-round iconn watch-icon" style="color: rgb(97, 97, 97)">
                            ondemand_video
                        </span>
                    </div>
                    <div class="underline"> </div>
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link navbar-center-item" href="#">
                    <div class="marketplace icon" title="Marketplace">
                        <span class="material-icons marketplace-icon iconn"style="color: rgb(97, 97, 97)">
                            storefront
                        </span>
                    </div>
                    <div class="underline"> </div>
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link navbar-center-item" href="#">
                    <div class="groups icon" title="Groups">
                        <span class="material-icons-round groups-icon iconn"style="color: rgb(97, 97, 97)">
                            groups
                        </span>
                    </div>
                    <div class="underline"> </div>
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link navbar-center-item" href="#">
                    <div class="games icon" title="Games">
                        <span class="material-icons-round games-icon iconn"style="color: rgb(97, 97, 97)">
                            gamepad
                        </span>
                    </div>
                    <div class="underline"> </div>
                </a>
            </div>
            </div>
          </div>
          <div class="navbar-nav ms-auto mb-2 mb-lg-0 navbar-right">
            <div class="nav-item">
<?php
    include "src/connectDB.php";
    include "template/info.php";
    $sql_user_ava = "SELECT CONCAT(UserFirstName, ' ', UserLastName) as UserName, UserAva FROM user_profile WHERE UserID = $UserID";
    $result_user_ava = mysqli_query($conn, $sql_user_ava);
    if(mysqli_num_rows($result_user_ava) > 0){
        $row_user_ava = mysqli_fetch_assoc($result_user_ava);
?>
                <a id="user" class="text-decoration-none link-dark" href="userProfile.php">
                    <div id="user-ava">
                        <img src="<?php echo defaultImage($row_user_ava['UserAva']) ?>" alt="">
                    </div>
                    <div id="user-name">
                        <b><?php echo $row_user_ava['UserName'];?></b>
                    </div>
                </a>
<?php
    }
    //ĐÓNG KẾT NỐI
    mysqli_close($conn);
?>
            </div>
            <div class="nav-item">
                    <button class="menu button" title="Menu">
                        <span class="material-icons-round menu-icon">
                            apps
                        </span>
                    </button>
            </div>
            <div class="nav-item">
                    <button class="messages button" title="Messenger">
                        <i class="fab fa-facebook-messenger messages-icon"></i>
                    </button>
                    <div class="messages-box">

                    </div>
            </div>
            <div class="nav-item">
                    <button class="notifications button" title="Notifications">
                        <span class="material-icons-round notifications-icon">
                            notifications
                        </span>
                    </button>
                    <div class="notify">
                    <?php
        //KẾT NỐI SQL
        include "src/connectDB.php";
        //TRUY VẤN lỜI MỜI KẾT BẠN
        $sql_friend_notify = "SELECT UserID, CONCAT(UserFirstName, ' ', UserLastName) as UserName, UserAva
                            FROM friend_ship INNER JOIN user_profile
                            on UserID = User1ID or UserID = User2ID
                            WHERE User2ID = $UserID and UserID !=$UserID AND friend_ship.Active = 0";
        $result_friend_notify = mysqli_query($conn, $sql_friend_notify);
        if(mysqli_num_rows($result_friend_notify) > 0){
            while($row_friend_notify = mysqli_fetch_assoc($result_friend_notify)){
?>
                        <a class="notify-item link-dark" href="userProfile_friend.php?UserIDFriend=<?php echo $row_friend_notify['UserID'];?>">
                            <div class="user-ava">
                                <img class="user-img" src="<?php echo ($row_friend_notify['UserAva']); ?>" alt="">
                            </div>
                            <div class="notify-content">
                                <p>
                                    <b><?php echo ($row_friend_notify['UserName']); ?></b> Đã gửi cho bạn một lời mời kết bạn
                                </p>
                            </div>
                        </a>

<?php
            }
        }
        //ĐÓNG KẾT NỐI
        mysqli_close($conn);

        //KẾT NỐI SQL
        include "src/connectDB.php";
        //TRUY VẤN POST, POST_USER NOTIFY
        $sql_notify = "SELECT PostID, Bang.UserID, UserName, PostCaption, UserAva,
                    MINUTE(TIMEDIFF(NOW(),PostTime)) as MM, HOUR(timediff(NOW(),PostTime)) as HH
                        from user_profile,
                        (SELECT *
                        FROM friend_ship INNER JOIN view_post
                        on UserID = User1ID or UserID = User2ID
                        WHERE (User1ID = $UserID or User2ID = $UserID) AND Active = 1) as Bang
                    WHERE Bang.UserID != $UserID AND Bang.UserID = user_profile.UserID
                    ORDER BY PostTime DESC";
        $result_notify = mysqli_query($conn, $sql_notify);
        if (mysqli_num_rows($result_notify) > 0) {
            while ($row_notify = mysqli_fetch_assoc($result_notify)){
                $time = 'vừa xong';
                if($row_notify['HH']==0){
                    $time = $row_notify['MM'].' phút trước';
                }
                else if($row_notify['HH']>=24){
                    $time = floor($row_notify['HH']/24) .' ngày trước';
                }
                else if($row_notify['HH']<24){
                    $time = floor($row_notify['HH']) .' giờ trước';
                }
                
        ?>
                        <a class="notify-item link-dark" href="post.php?PostID=<?php echo $row_notify['PostID'];?>">
                            <div class="user-ava">
                                <img class="user-img" src="<?php echo ($row_notify['UserAva']); ?>" alt="">
                            </div>
                            <div class="notify-content">
                                <p>
                                    <b><?php echo ($row_notify['UserName']); ?></b> Đã đăng một bài viết mới: <?php echo ($row_notify['PostCaption']);?>
                                </p>
                                <b style="color:#1877F2"><?php echo $time?></b>
                            </div>
                        </a>
        <?php
            }
        }
        //ĐÓNG KẾT NỐI
        mysqli_close($conn);
?>

                </div>
            </div>
            <div class="nav-item">
                    <button class="account button" title="Account">
                        <span class="material-icons-round account-icon">
                            arrow_drop_down
                        </span>
                    </button>
                    <div class="log-out">
                        <a class="item-logout link-dark" href="login.php">
                            <span class="material-icons-outlined">
                                logout
                            </span>
                            <b>Log-out</b>
                        </a>
                    </div>
            </div>
          </div>
        </div>
      </nav>
    </header>
