<?php
    include "template/header.php";
    if(isset($_POST['search-btn'])){
        $search = $_POST['search-input'];
        //KẾT NỐI SQL
        include "src/connectDB.php";
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
                if($row_search['UserID'] == $UserID){
?>
        <a class="col-md-12 search-result-item" href="userProfile.php">
            <div class="icon">
                <img class="user-img" src="<?php echo $row_search['UserAva']?>" alt="">
            </div>
            <div class="text">
                <b><?php echo $row_search['UserName'] ?></b>
            </div>
        </a>
        <hr style="margin: 0px">

<?php

                }
                else{
?>
        <a class="col-md-12 search-result-item" href="userProfile_friend.php?UserIDFriend=<?php echo $row_search['UserID'];?>">
            <div class="icon">
                <img class="user-img" src="<?php echo $row_search['UserAva']?>" alt="">
            </div>
            <div class="text">
                <b><?php echo $row_search['UserName'] ?></b>
            </div>
        </a>
        <hr style="margin: 0px">
<?php

                }
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