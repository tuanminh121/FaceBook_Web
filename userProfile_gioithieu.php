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
                class="btn btn-link text-reset"
                datadata-ripple-color="dark"
              >
                Bài viết
              </button>
              <button
                type="button"
                class="btn btn-link bg-light"
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

      <?php
      }
    }
    mysqli_close($conn);
?>

<!-- giới thiệu -->
<div class="container mb-3">
    <div class="bg-white mb-5 shadow-2 rounded">
        <h2 class="pt-3" style="padding-left: 3rem"><strong>Giới Thiệu</strong></h2>
        <div class="row">
            <div class="col-2"></div> 
            <div class="col-3 pt-4 pb-4">
                <h4>icon here Usermail</h4>
                <hr>
                <h4>usergender</h4>
                <hr>
                <h4>first name + last name</h4>
                <hr>
                <h4>datebirth</h4>
                <hr>
                <h4>address</h4>
                <hr>
            </div>
            <div class="col-1">
            </div>
            <div class="col-4 pt-4 pb-4">
            <h4>Usermail</h4>
                <hr>
                <h4>usergender</h4>
                <hr>
                <h4>first name + last name</h4>
                <hr>
                <h4>datebirth</h4>
                <hr>
                <h4>address</h4>
                <hr>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</div>

<!-- bạn bè  -->
<div class="container mb-3">
    <div class="bg-white mb-5 shadow-2 rounded">
        <h2 class="pt-3" style="padding-left: 3rem"><strong>Bạn bè</strong></h2>
        <div class="row">
            <div class="col-2"></div> 

            <div class="col-4 pt-4 pb-4">
                <div class="d-flex border rounded align-items-center"> 
                    <a href=""><img src="assets/images/content-img.jpeg" style="max-wdith: 200px; max-height: 100px" alt="" class="mr-3"></a>
                    <p style="margin-left: 1rem;"><strong>ten nguoi</strong></p>
                </div>
            </div>

            <div class="col-4 pt-4 pb-4">
                <div class="d-flex border rounded align-items-center"> 
                        <a href=""><img src="assets/images/content-img.jpeg" style="max-wdith: 200px; max-height: 100px" alt="" class="mr-3"></a>
                        <p style="margin-left: 1rem;"><strong>ten nguoi</strong></p>
                    </div>
            </div>

            <div class="col-2"></div>
        </div>
    </div>
</div>

<!-- ảnh  -->
<div class="container mb-3">
    <div class="bg-white mb-5 shadow-2 rounded">
        <h2 class="pt-3" style="padding-left: 3rem"><strong>Ảnh</strong></h2>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-md-2 w-100 h-100">
                <a href=""><img src="" alt="" class="img-responsive"></a>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</div>