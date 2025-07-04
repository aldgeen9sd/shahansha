<?php include('partials-front/menu-index.php'); 

?>

<?php include('visited.php');?>

<div class="indexin" id="page-index" onload="onlodeweb()">

    <?php include('icon-search.php');?>
    <?php include("alenat.html");?>
    <?php include("count.class.php");?>

    <!-- <p>&#128578;</p>
<div class="rotate"> دليل الاطباء</div> -->
    <?php 
        if(isset($_SESSION['add'])) 
        //Checking whether the SEssion is Set of Not
        {
            echo $_SESSION['add']; 
            //Display the SEssion Message if SEt
            unset($_SESSION['add']); 
            //Remove Session Message
        }
        if(isset($_SESSION['booking']))
        {
            echo $_SESSION['booking'];
            unset($_SESSION['booking']);
        }
    ?>
    <!-- doctor Section Starts Here -->
    <!-- <button class="custom-btn btn-1">الصفحة الرئيسية </button> -->
    <!-- doctor MEnu Section Starts Here -->
    <section class="doctor-menu">
        <?php 
            
            //Getting doctors from Database that are active and featured
            //SQL Query
            $sql2 = "SELECT * FROM tbl_doctor WHERE  active='Yes' AND featured='Yes' LIMIT 10 ";
            "<div style='' id='#more-result'>$sql2 = 'SELECT * FROM tbl_doctor WHERE ctive='Yes' AND featured='Yes' LIMIT 15 ';</div>";
            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //CHeck whether doctor available or not
            if($count2>0)
            {
                //doctor Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
                    $id = $row['id'];
                    $name_doctor = $row['name_doctor'];
                    $cite_doctor = $row['cite_doctor'];
                    // $description = $row['description'];
                    $specialty_id = $row['specialty_id'];
                    $image_name = $row['image_name'];
                    $brief = $row['brief'];

                    ?>

        <div class="container">

            <div class="card">
                <!-- <input accept="image/png, image/jpeg" name="avatar" type="file"> -->
                <main>
                    <a href="<?php echo SITEURL; ?>display_doctor.php?id=<?php echo $id; ?>" role="link">
                        <img src="<?php echo SITEURL; ?>images/doctor/<?php echo $image_name; ?>"
                            class="img-responsive img-curve lazyloaded" data-ll-status="loaded" alt="not found img">
                        <style type="text/css">
                        .st0 {
                            fill: #BAC5E1;
                        }

                        .st1 {
                            fill: #FFFFFF;
                        }
                        </style>

                    </a>
                    </main>

                    <span>
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                            height="12" width="12" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                            </path>
                        </svg>
                    </span>

            </div>
            <div class="info">
                <a href="<?php echo SITEURL; ?>display_doctor.php?id=<?php echo $id; ?>">
                    <h2 class="doctor-name">د.<?php echo $name_doctor; ?></h2>
                </a>
                <!-- جلب تخصص الدكتور من جدول التخصصات -->
                <?php 
                $sqlarry =mysqli_query($conn,"SELECT * FROM tbl_specialty where id=$row[specialty_id]");
                $ro = mysqli_fetch_array($sqlarry); 
        
                $id = $ro['id'];
                $title = $ro['title'];                
            
        ?>
                <p class="doctor-specialty">
                    <?php echo $ro['title']; ?>
                </p>
                <p class="doctor-detail"><?php echo $brief; "<br>"?></p>
            </div>
        </div>
        <?php
                }
            }
   
            ?>
</div>
</section>

<!--  end page doctor Menu Section Ends Here -->
<section>
    <div class="page-add text-right">
        <a href="<?php echo SITEURL; ?>single-doctor.php" class="btn btn-info btn-sm text-white">انضم الان</a>
    </div>
</section>
<!-- <div class="clearfix">
    <a href="coment.php" target="_blank" rel="noopener noreferrer">
        <img src="../onliedoctorbooking/images/icon/ic_action_google_play.png" alt="img not foind" class="img-clearfix">
        <div class="text-clearfix">اعلان</div>
    </a>
</div> -->
<hr style="margin:10px; border:2px solid red;">
<!-- <div class="page-more text-center"> -->
<!-- <button onclick="openmore()">عرض المزيد</button><br/> -->
<!-- <input type="button" name="submit" value="عرض المزيد" onclick="openmore()"> -->
<!-- </a> -->
<!-- </div> -->
</div>
<?php include("flexslider.php");?>

<!-- start page commment.php -->
<?php include ('commint.php');?>
<!-- end page comment.php -->
<?php include('partials-front/footer1.php'); ?>