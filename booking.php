<?php include('partials-front/menu-index.php'); ?>

<head>
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/footer.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../onliedoctor/css/icons.css" />
    <title>صفحة الحجز</title>
</head>
<div class="" id="page-index">
    <?php 
        //CHeck whether doctor id is set or not
        if(isset($_GET['doctor_id']))
        {
            //Get the doctor id and details of the selected doctor
            $doctor_id = $_GET['doctor_id'];

            //Get the DEtails of the SElected Doctor
            $sql = "SELECT * FROM tbl_doctor WHERE id=$doctor_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);

                $name_doctor = $row['name_doctor'];
                $description = $row['description'];
                $image_name = $row['image_name'];
                $cite_doctor = $row['cite_doctor'];
                $site = $row['site'];
            }
            else
            {
                //Doctor not Availabe
                //REdirect to Home Page
                header('location:'.SITEURL);
            }
        }
        else
        {
            //Redirect to homepage
            header('location:'.SITEURL);
            // header('location:'.SITEURL);
        }
    ?>

    <!-- doctor sEARCH Section Starts Here -->
    <section class="doctor-search">
        <div class="container">

            <h2 class="text-center text-white">:حجز استشارة مع الدكتور</h2>

            <form action="" method="POST" class="booking">
                <fieldset>

                    <div class="doctor-menu-img">
                        <?php 
                        
                            //CHeck whether the image is available or not
                            if($image_name=="")
                            {
                                //Image not Availabe
                                echo "<div class='error'>االصورة غير متاحة.</div>";
                            }
                            else
                            {
                                //Image is Available
                                ?>
                        <img src="<?php echo SITEURL; ?>images/doctor/<?php echo $image_name; ?>"
                            alt=" الصورة غير موجودة." class="img-responsives img-curves">
                        <?php
                            }
                        
                        ?>

                    </div>

                    <div class="doctor-menu-desc">
                        <h3>د.<?php echo $name_doctor; ?></h3>
                        <input type="hidden" name="name_doctor" value="<?php echo $name_doctor; ?>">
                        <p><a herf="<?php echo $site; ?>"><?php echo $cite_doctor; ?></a></p>
                        <h3><?php echo $description; ?></h3>
                        <input type="hidden" name="description" value="<?php echo $description; ?>">

                    </div>

                </fieldset>

                <fieldset>
                    <legend>تفاصيل الحجز</legend>
                    <div class="booking-label">اسم المريض</div>
                    <input type="text" name="sick_name" placeholder="اكتب اسمك الكامل" class="input-responsive"
                        required>

                    <div class="order-label">رقم الهاتف</div>
                    <input type="tel" name="number_sick" placeholder="اكتب رقم الهاتف" class="input-responsive"
                        required>

                    <input type="submit" name="submit" value="تاكيد الحجز" class="btn btn-primary" style="width: 70px;">
                </fieldset>

            </form>


            <?php 

                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    $name_doctor = $_POST['name_doctor'];

                    $booking_date = date("Y-m-d h:i:sa"); //booking DAte

                    $status = "Reservation"; 
                    $sick_name = $_POST['sick_name'];
                    $number_sick = $_POST['number_sick'];
                    
                    //Save the Reservation in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO tbl_booking SET 
                        name_doctor = '$name_doctor',
                        booking_date = '$booking_date',
                        status = '$status',
                        sick_name = '$sick_name',
                        number_sick = '$number_sick'
                    ";

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2==true)
                    {

                        //Query Executed and Reservation Saved
                        $_SESSION['booking'] = "<div class='success text-center'><script>alert(' تم الحجز بنجاح.' )</script></div>";
                        // header('location:'.SITEURL. 'icons.html');
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        //Failed to Save Reservation
                        $_SESSION['booking'] = "<div class='error text-center'>فشل في الحجز. حاول مرة اخرئ</div>";
                        header('location:'.SITEURL);
                    }

                }
            
            ?>

        </div>

    </section>
</div>
<!-- doctor sEARCH Section Ends Here -->

<?php include('partials-front/footer1.php'); ?>