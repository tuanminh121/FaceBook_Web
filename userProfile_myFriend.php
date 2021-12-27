<?php
include "template/header.php";
include "src/connectDB.php";

$queryProfile = "SELECT * from user_profile where UserID='$userId'";
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
                    <img src=" <?php echo defaultImage($row_ava['UserAva']) ?>" alt="" class="
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
                    <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark" onclick="document.location.href='userProfile.php'">
                        Bài viết
                    </button>
                    <button type="button" class="btn btn-link text-reset" datadata-ripple-color="dark" onclick="document.location.href='userProfile_gioithieu.php'">
                        Giới thiệu
                    </button>
                    <button type="button" class="btn btn-link bg-light" datadata-ripple-color="dark" onclick="document.location.href='userProfile_myFriend.php'">
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
    <!-- bạn bè  -->
    <div class="container mb-3">
        <div class="bg-white mb-5 shadow-2 rounded">
            <h2 class="pt-3" style="padding-left: 3rem"><strong>Bạn bè</strong></h2>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="row">
                        <?php
                        $queryFriends = "SELECT * FROM user_profile, friend_ship 
            WHERE (friend_ship.User1ID = UserID OR friend_ship.User2ID = UserID)
            AND UserID != $userId 
            AND (friend_ship.User1ID = $userId OR friend_ship.User2ID = $userId) 
            GROUP BY UserID;";
                        $resultFriends = mysqli_query($conn, $queryFriends);
                        if (mysqli_num_rows($resultFriends) > 0) {
                            while ($rowFriends = mysqli_fetch_assoc($resultFriends)) {
                                echo '<div class="col-4 pt-4 pb-4">';
                                echo '<div class="d-flex border rounded align-items-center">';
                                echo '<a href=""><img src="' . defaultImage($rowFriends['UserAva']) . '" style="max-wdith: 200px; max-height: 100px" alt="" class="mr-3"></a>';
                                echo '<p style="margin-left: 1rem;"><strong>' . $rowFriends['UserFirstName'] . " " . $rowFriends['UserLastName'] . '</strong></p>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>