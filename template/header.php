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
<!--CSS FOR USERPROFILE-->
<link rel="stylesheet" href="assets/css/userProfile.css">
<!--CSS FOR SEARCH-->
<link rel="stylesheet" href="assets/css/search.css">
<!--FaceBook LOGO-->
    <link rel="icon" href="assets\images\Facebook_logo\Facebook_logo.ico" type="image/x-icon"/>
    <title>Facebook</title>
</head>
<body>
<!--HEADER-->
    <header class="container-fluid">
    <nav class="navbar navbar-light bg-light fixed-top fb-navbar">
        <div class="container-fluid inner-fb-navbar">
            <div class="navbar-left">
          <a class="navbar-brand" href="NewsFeed.php">
            <div class="fb_logo icon">
                <i class="fab fa-facebook-f fb-icon"></i>
            </div>
          </a>
          <form class="d-flex" action="search.php" method="post" autocomplete="off">
            <input class="form-control me-2 search-input" name="search-input" type="search" placeholder="Tìm kiếm..." aria-label="Search">
            <button class="search-button" name="search-btn" type="submit">
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
                <a class="nav-link active navbar-center-item" aria-current="page" href="newsfeed.php">
                    <div class="home icon" title="Home">
                        <span class="material-icons-round home-icon">
                            home
                        </span>
                    </div>
                    <div class="underline"> </div>
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link navbar-center-item" href="#">
                    <div class="watch icon" title="Watch">
                        <span class="material-icons-round watch-icon">
                            ondemand_video
                        </span>
                    </div>
                    <div class="underline"> </div>
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link navbar-center-item" href="#">
                    <div class="marketplace icon" title="Marketplace">
                        <span class="material-icons marketplace-icon">
                            storefront
                        </span>
                    </div>
                    <div class="underline"> </div>
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link navbar-center-item" href="#">
                    <div class="groups icon" title="Groups">
                        <span class="material-icons-round groups-icon">
                            groups
                        </span>
                    </div>
                    <div class="underline"> </div>
                </a>
            </div>
            <div class="nav-item">
                <a class="nav-link navbar-center-item" href="#">
                    <div class="games icon" title="Games">
                        <span class="material-icons-round games-icon">
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
                <a id="user" class="text-decoration-none link-dark" href="userProfile.php">
                    <div id="user-ava">
                        <img src="assets/images/content-img.jpeg" alt="">
                    </div>
                    <div id="user-name">
                        <b>User name</b>
                    </div>
                </a>
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
            </div>
            <div class="nav-item">
                    <button class="notifications button" title="Notifications">
                        <span class="material-icons-round notifications-icon">
                            notifications
                        </span>
                    </button>
            </div>
            <div class="nav-item">
                    <button class="account button" title="Account">
                        <span class="material-icons-round account-icon">
                            arrow_drop_down
                        </span>
                    </button>
            </div>
          </div>
        </div>
      </nav>
    </header>