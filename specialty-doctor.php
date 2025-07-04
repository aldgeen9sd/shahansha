<?php include('partials-front/menu-index.php'); ?>
<?php 
        //CHeck whether id is passed or not
        if(isset($_GET['specialty_id']))
        {
            //specialty id is set and get the id
            $specialty_id = $_GET['specialty_id'];
            // Get the specialty Title Based on specialty ID
            $sql = "SELECT title FROM tbl_specialty WHERE id=$specialty_id";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Get the value from Database
            $row = mysqli_fetch_assoc($res);
            //Get the TItle
            $specialty_title = $row['title'];
        }
        else
        {
            //specialty not passed
            //Redirect to Home page
            header('location:'.SITEURL);
        }
    ?>
<!-- specialty-doctor.php sEARCH Section Starts  -->
<div class="" id="page-index">
<?php include('icon-search.php');?>
    <!-- <section class="doctor-search text-center"> -->
        <section>

            <h3>
                <a href="<?php echo SITEURL; ?>specialty.php" class="text-white">الدكاترة الموجودين على
                    تخصص"<?php echo $specialty_title; ?>"</a>
            </h3>

        </section>
    <!-- </section> -->
    <section class="doctor-menu">
        <!-- <h2 class="text-center">قائمة التخصصات</h2> -->
        <div class="container-doctor">


            <?php 
            
                //Create SQL Query to Get doctor based on Selected specialty
                $sql2 = "SELECT * FROM tbl_doctor WHERE specialty_id=$specialty_id";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //Count the Rows
                $count2 = mysqli_num_rows($res2);

                //CHeck whether doctor is available or not
                if($count2>0)
                {
                    //doctor is Available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $name_doctor = $row2['name_doctor'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        $cite_doctor = $row2['cite_doctor'];
                        $brief = $row2['brief'];
                        ?>

            <div class="doctor-menu-box">
                <div class="doctor-menu-img">
                    <?php 
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>الصورة غير متاحة.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                    <a href="<?php echo SITEURL; ?>display_doctor.php?id=<?php echo $id; ?>">
                        <img src="<?php echo SITEURL; ?>images/doctor/<?php echo $image_name; ?>"
                            alt="الصورة غير موجودة" class="img-spectaily img-curve">
                    </a>
                    <?php
                                    }
                                ?>

                </div>

                <div class="doctor-menu-desc">
                    <div class="info">
                    <h2 class="doctor-name"><?php echo $name_doctor; ?></h2>
                    <?php 
                                $sqlarry =mysqli_query($conn,"SELECT * FROM tbl_specialty where id=$row2[specialty_id]");
                                    $ro = mysqli_fetch_array($sqlarry); 
                                        $id = $ro['id'];
                                        $title = $ro['title'];                       
                                ?>
                    <p class="doctor-specialty">
                        <?php echo $ro['title']; ?></p>
                    <p class="doctor-detail"><?php echo $brief; ?></p>
                </div>
                </div>
            </div>

            <?php
                    }
                }
                else
                {
                    //doctor not available
                    echo "<div class='error'><center><b>للاسف لا يوجد دكتور في هذا التخصص. </center> </b></div>";
                    echo "<script>alert('لا يوجد دكتور متوفر في هذا التخصص .')</script>";
                }
            
            ?>
        </div>
    </section>
</div>
<!-- end page specialty-doctor.php -->
<!-- Footer Part Start -->
<?php include('partials-front/footer1.php'); ?>
<!-- Footer Part End -->