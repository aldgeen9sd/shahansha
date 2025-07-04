<?php include('partials-front/menu-index.php'); ?>

<!-- <head>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/search-icon.css">
    <link rel="stylesheet" href="css/footer.css">
    </haed> -->
<!-- start page specialty.php -->
<div class="" id="page-index">
<?php include('icon-search.php');?>
    <!-- specialty Section Starts Here -->
    <section class="specialty">
        <div class="container-specialty">
            <h2 class="text-center">دليل التخصصات</h2>

            <?php 

                //Display all the specialty that are active
                //Sql Query
                $sql = "SELECT * FROM tbl_specialty WHERE active='Yes'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether specialty available or not
                if($count>0)
                {
                    //specialty Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                ?>
            <div class="dispaly-specialty spe-1">
                <a class="box-3-sp float-container"
                    href="<?php echo SITEURL; ?>specialty-doctor.php?specialty_id=<?php echo $id; ?>">
                    <div class="overlay"></div>
                    <div class="circle">
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
                        <img src="<?php echo SITEURL; ?>images/img_specialty/<?php echo $image_name; ?>"
                            alt="تعذر تحميل الصورة">
                        <?php
                                    }
                                ?>

                    </div>


                    <p><?php echo $title; ?></p>
                </a>
            </div>
            <?php
                    }
                }
                else
                {
                    //specialty Not Available
                    echo "<div class='error'>التخصص غير متوفرة.</div>";
                }
            
            ?>
        </div>
    </section>
</div>
<!-- end page specialty.php -->
<!--Footer Part Start-->
<?php include('partials-front/footer1.php'); ?>
<!--Footer Part End-->