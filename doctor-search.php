<?php include('partials-front/menu-index.php'); ?>

<!-- <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</haed> -->

<!--start page doctor-search.php -->
<div class="" id="page-index">
<?php include('icon-search.php');?>
    <section class="result-search">
            <?php 

                //Get the Search Keyword
                $search = $_POST['search'];
            
            ?>
        <!-- <h2 class="h2-title"> -->
            <div href="#" class="text-white" title="البحث مرة اخرئ">نتائج البحث..(<?php echo $search; ?>)</div>
        <!-- </h2> -->
    </section>
    <!-- doctor MEnu Section Starts Here -->
    <section class="doctor-menu">
        <div class="containert">
            <!-- <div class="text-center">دليل البحث</div> -->
            <?php 
               
                // SQL Query to Get foods based on search keyword
                $sql = "SELECT * FROM tbl_doctor WHERE name_doctor LIKE '%$search%' OR description LIKE '%$search%'";
                // $result = "SELECT do.name_doctor ,sp.title,do.description ,do.image_name,do.brief,do.cite_doctor FROM tbl_doctor as do, tbl_specialty as sp WHERE do.specialty_id=sp.id AND do.name_doctor LIKE '%$search%' OR sp.title LIKE '%$search%'";
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                // $res = mysqli_query($conn ,$result);
                //Count Rows
                $count = mysqli_num_rows($res);

                // Check whether doctor available of not
                if($count>0)
                {
                    //doctor Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id = $row['id'];
                        $name_doctor = $row['name_doctor'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        $brief = $row['brief'];
                        $cite_doctor = $row['cite_doctor'];
                        // $specialty_id = $row['specialty_id'];
                        ?>
            <div class="doctor-menu-box">
                <div class="info">
                <div class="doctor-menu-img">
                    <?php 
                    // Check whether image name is available or not
                    if($image_name=="")
                    {
                        //Image not Available
                        echo "<div class='error'>الصورة غير متاحة.</div>";
                    }
                    else
                    {
                        //Image Available
                        ?>
                    <a href="<?php echo SITEURL; ?>display_doctor.php?id=<?php echo $id; ?>"><img
                            src="<?php echo SITEURL; ?>images/doctor/<?php echo $image_name; ?>"
                            alt=" الصورة غير موجودة." class="img-responsive img-curve"></a>
                    <?php 

                    }
                    ?>

                </div>

                <div class="doctor-menu-desc">
                    <a href="<?php echo SITEURL; ?>display_doctor.php?id=<?php echo $id; ?>">
                        <h2 class="doctor-name"><?php echo $name_doctor; ?></h2>
                    </a>
                    <?php 
                     $sqlarry =mysqli_query($conn,"SELECT * FROM tbl_specialty where id=$row[specialty_id] ");
                     $ro = mysqli_fetch_array($sqlarry); 
                         $id = $ro['id'];
                         $title = $ro['title']; 
                    ?>
                    <p class="doctor-specialty">
                        <?php echo $title; ?>
                    </p>
                    <p class="doctor-detail" style="color:#ffbf00;"><?php echo $brief; ?></p>
                    <p class="doctor-detail" style="color:#ffbf00;"><?php echo $cite_doctor; ?></p>
                    <!-- <br> -->
                </div>
            </div>
            </div>
            <?php
                }
                }
                else
                {
                    //doctor Not Available
                    echo "<div class='error'><center><b>للاسف لا يوجد نتائج ابحث عن مرة اخر. </center> </b></div>";
                    echo "<script>alert('لاسف لا يود نتائج يرجاء البحث مرة اخرى')</script>";
                }
            
            ?>
        </div>
    </section>
</div>
<!-- end page doctor-search.php -->
<?php include('partials-front/footer1.php'); ?>