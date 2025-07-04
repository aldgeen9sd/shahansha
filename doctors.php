<?php include('partials-front/menu-index.php'); ?>
<!-- <head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/search-icon.css">
    </haed> -->
<!-- doctor sEARCH Section Starts Here -->
<div class="" id="page-index">
<?php include('icon-search.php');?>
    <h2 class="text-center"> طاقم الاطباء</h2>
    <!-- start page doctors.php  -->
    <section class="doctor-menu">
        <div class="container-doctor">
            <?php 
            
            //Getting doctors from Database that are active and featured
            //SQL Query
            $sql2 = "SELECT * FROM tbl_doctor WHERE  active='Yes'";

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

            <div class="doctor-menu-box">
                <div class="doctor-menu-img">
                    <?php 
                                //Check whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>الصورة عير موجودة</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                    <a href="<?php echo SITEURL; ?>display_doctor.php?id=<?php echo $id; ?>">
                        <img src="<?php echo SITEURL; ?>images/doctor/<?php echo $image_name; ?>"
                            class="img-responsive img-curve lazyloaded" alt="تعذر تحميل الصورة" data-ll-status="loaded">
                    </a>
                    <?php
                                }
                            
                            ?>

                </div>

                <div class="doctor-menu-desc">
                    <div class="info">
                    <a href="<?php echo SITEURL; ?>display_doctor.php?id=<?php echo $id; ?>">
                        <h2 class="doctor-name">د.<?php echo $name_doctor; ?></h2>
                    </a>
                    <!-- <span class="author-badge me-2">M.D</span> -->
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
                    <p class="doctor-detail">
                        <?php echo $brief; "<br>"?>
                    </p>
                </div>
                </div>
            </div>
            <?php
                }
                }
                else
                {
                    //doctor not Available
                    echo "<div class='error'>الدكتور هذه غير موجود.</div>";
                }
            ?>
            
        </div>
    </section>
</div>
<!-- end page doctors.php -->
<!-- start page footer1.php -->
<?php include('partials-front/footer1.php'); ?>
<!-- end page footer1.php -->