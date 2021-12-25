<?php
    include "template/header.php";

    if(isset($_POST['search-btn'])){
        $search = $_POST['search-input'];
        //KẾT NỐI SQL
        $conn = mysqli_connect('localhost','root','','facebook');
        if(!$conn){
            die("Kết nối thất bại. Vui lòng kiểm tra lại các thông tin máy chủ");
        }
        //SEARCH FRIEND
        if($search != ''){
?>

<main id="search-main">
    <div class="row search-results">
<?php
        $sql_search = " SELECT UserID, UserName, UserAva
                        FROM 	(SELECT UserID ,CONCAT(UserFirstName, ' ', UserLastName) as UserName, UserAva
                                FROM user_profile) as Bang
                        WHERE UserName LIKE '%$search%'";
        $result_search = mysqli_query($conn, $sql_search);
        if(mysqli_num_rows($result_search) > 0){
            while($row_search = mysqli_fetch_assoc($result_search)){
?>
        <a class="col-md-12 search-result-item" href="userProfile_friend.php">
            <div class="icon">
                <img class="user-img" src="assets/images/content-img.jpeg" alt="">
            </div>
            <div class="text">
                <b><?php echo $row_search['UserName'] ?></b>
            </div>
        </a>
        <hr>
<?php
               }
            }
        }
?>
    </div>
</main>

<?php
   //ĐÓNG KẾT NỐI
   mysqli_close($conn);
    }
    else{
        header("location: index.php");
    }
    include "template/footer.php";
?>