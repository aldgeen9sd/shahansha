<?php include('partials-front/menu-index.php'); ?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/display.css">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<script>
function home_tab() {
    document.getElementById('home-tab-pane').style.display = "block"
    document.getElementById('contact-tab-pane').style.display = "none"
    document.getElementById('disabled-tab-pane').style.display = "none"

}

function contact_tab() {
    document.getElementById('home-tab-pane').style.display = "none"
    document.getElementById('contact-tab-pane').style.display = "block"
    document.getElementById('disabled-tab-pane').style.display = "none"

}

function disabled_tab() {
    document.getElementById('home-tab-pane').style.display = "none"
    document.getElementById('contact-tab-pane').style.display = "none"
    document.getElementById('disabled-tab-pane').style.display = "block"

}
</script>
<!-- start page display-doctor.php -->
<div class="" id="page-index">
<!-- onclick="openfunctiondisplay()" -->
    <div class="page-wrapper author-page" id="author-wrapper" >
        <main class="site-main">
            <div class="container-display">
                <!-- Get the author info -->
                <?php 
                    if (isset($_GET['id'])){
                        $id = $_GET['id'];
                    //Getting doctors from Database that are active and featured
                    //SQL Query
                    $sql2 = "SELECT * FROM tbl_doctor WHERE id = ".$_GET['id'];
                    //Execute the Query
                    $result = mysqli_query($conn , $sql2);
                    //Count Rows
                    if (mysqli_num_rows($result) > 0){
                        $row = mysqli_fetch_array($result);
                
                    //Get all the values
                    $id = $row['id'];
                    $name_doctor = $row['name_doctor'];
                    $cite_doctor = $row['cite_doctor'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    $specialty_id = $row['specialty_id'];
                    $brief = $row['brief'];
                    $testimonials = $row['testimonials'];
                    $commun = $row['commun'];
                    $site = $row['site'];
                    $whatsapp = $row['whatsapp'];
                
                ?>
                <section class="d-flex ">
                    <div class="mb-4 ">
                        <?php 
                            if($image_name=="")
                            {
                                //Image not Available
                                echo "<div class='error'>الصورة غير متاحة.</div>";
                            }else{
                        //Image Available
                        ?>
                        <div class="card">
                            <main>
                                <img src="<?php echo SITEURL; ?>images/doctor/<?php echo $image_name; ?>"
                                    class="img-responsive-dis img-curve-dis lazyloaded" alt="تعذر تحميل الصورة" data-ll-status="loaded">
                                <style type="text/css">
                                .st0 {
                                    fill: #BAC5E1;
                                }

                                .st1 {
                                    fill: #FFFFFF;
                                }
                                </style>
                                <g>

                                    <ellipse ry="64.8" rx="64.8" cy="64.8" cx="64.8" class="st0"
                                        transform="matrix(0.7071 -0.7071 0.7071 0.7071 -26.8258 64.7633)"></ellipse>
                                    <ellipse ry="32.6" rx="25.2" cy="54.2" cx="64.8" class="st1"></ellipse>
                                    <path d="M64.8,89.1c-21.1,0-39.6,6.4-50.5,16.2c11.9,14.7,30.1,24.2,50.5,24.2c20.4,0,38.6-9.4,50.5-24.2
		                            C104.4,95.6,85.8,89.1,64.8,89.1z" class="st1"></path>
                                    <path d="M67.6,105.9H62c-5.3,0-9.6-4.3-9.6-9.6V74.4c0-5.3,4.3-9.6,9.6-9.6h5.6c5.3,0,9.6,4.3,9.6,9.6v21.9
		                            C77.2,101.6,72.9,105.9,67.6,105.9z" class="st1"></path>
                                    <path
                                        d="M43,55.7c1.5,4.2,0.9,8.3-1.3,9s-5.1-2.1-6.6-6.3c-1.5-4.2-0.9-8.3,1.3-9C38.6,48.6,41.6,51.4,43,55.7z"
                                        class="st1"></path>
                                    <ellipse ry="4.2" rx="8.1" cy="57" cx="90.4" class="st1"
                                        transform="matrix(0.328 -0.9447 0.9447 0.328 6.8843 123.7582)"></ellipse>
                                    <path d="M42.7,55.5c-3.3-6-6.6-12.3-6.5-19.1c0.2-6.8,5.3-14,12.1-13.7c1.2,0,2.4,0.3,3.5,0.1c2.3-0.3,4.1-2.3,6-3.7
		                            c4.3-3.2,10.3-3.9,15.2-1.9c3.1,1.2,5.7,3.4,8.6,4.8c5.6,2.6,12.4,2.4,17.8-0.7c-1.1,2.1-3,3.8-5.2,4.6c2,0.6,4.3,0.6,6.3-0.2
                                    c0.9,0,1.7,0,2.6,0c-2.9,4.1-5.7,8.2-8.6,12.4c-0.8,1.2-1.7,2.4-2.9,3.2c-1,0.6-2.2,0.9-3.3,1.2c-8.5,1.9-17.2,2.5-25.8,1.7
                                    c-3-0.3-6-0.8-8.4-2.6c-2.3-1.8-3.6-5.4-2-7.8" class="st1"></path>
                                    <path
                                        d="M48.5,95.3c0.2-3.4,0.6-6.8,1.3-10.2c1.7,1.9,4.6,2.2,7.1,2.3c3.9,0.2,7.8,0.3,11.6,0.5
                                        c0.5,2.6,0.8,5.8-1.1,7.6c-0.9,0.9-2.1,1.3-3.3,1.6c-2.6,0.7-5.3,1.1-8,1.1c-3.2,0-7.1-0.9-8.1-4c0.3-0.3,0.7-0.6,1-0.9"
                                        class="st1"></path>
                                    <path
                                        d="M81,95.3c-0.2-3.4-0.6-6.8-1.3-10.2c-1.7,1.9-4.6,2.2-7.1,2.3c-3.9,0.2-7.8,0.3-11.6,0.5
                                        c-1.2,2.2-3.2,3.9-5.5,4.8c1.7,0.1,3.4,0.2,5.2,0.4c-1.5,2.1-3.6,3.7-6,4.6c1.4,0,2.7,0.1,4.1,0.1c-1,3-3.6,5.4-6.7,6.1
		                                c-0.5,2.6-0.8,5.8,1.1,7.6c0.9,0.9,2.1,1.3,3.3,1.6c2.6,0.7,5.3,1.1,8,1.1c3.2,0,7.1-0.9,8.1-4c-0.3-0.3-0.7-0.6-1-0.9"
                                        class="st1"></path>
                                </g>
                            </main>
                        </div>
                        <?php
                    }
                    ?>
                    </div>
                    <!-- php select -->
                    <div class="flex-grow-1 ">
                        <div class="d-flex flex-column">
                            <!-- Col-1 -->
                            <div class="flex-grow-1 ">
                                <span class="d-inline-block text-primary ">د.<?php echo $name_doctor; ?></span><br>
                                <?php 
                                        $sqlarry =mysqli_query($conn,"SELECT * FROM tbl_specialty where id=$row[specialty_id]");
                                            $ro = mysqli_fetch_array($sqlarry); 
                                                $id = $ro['id'];
                                                $title = $ro['title'];                
                                    ?>
                                <span class="d-block text-info "><?php echo $ro['title']; ?></span><br>
                            </div>
                            <!-- Col-2 -->
                            <div class="d-flex flex-column ">
                                <!-- <a href="<?php echo SITEURL; ?>booking.php?doctor_id=<?php echo $row['id']; ?>" class="btn btn-outline-info d-flex">حجز إستشارة</a> -->
                                </a>
                                <a href="https://api.whatsapp.com/send?phone=+967<?php echo $whatsapp; ?>"
                                    class="btn btn-outline-info d-flex" target="_blank">للأستفسار
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path
                                            d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 
                                    16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 
                                    7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 
                                    2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 
                                    6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 
                                    0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
    <div class="card-tabs">
        <div class="container-bag">
            <ul class="nav nav-tabs " id="myTab">
            <!-- <ul class="nav nav-tabs " id="myTab" role="tablist"> -->
                <li class="nav-item" >
                <!-- <li class="nav-item" role="presentation"> -->
                    <div class="nav-link active" id="home_tab" type="button"
                        onclick="home_tab()">نبذة</div>
                </li>
                <li class="nav-item" >
                    <div class="nav-link" id="contact_tab" type="button"
                        onclick="contact_tab()">الشهادات</div>
                </li>
                <li class="nav-item" >
                    <div class="nav-link" id="disabled_tab" type="button"
                        onclick="disabled_tab()">التواصل</div>
                </li>
            </ul>
            <!-- <div class="blob"> -->

        </div>
    </div>

<div class="container-contin-width">
    <div class="tab-content user-tabs-content ">
        <div class="tab-pane fade show active" id="home-tab-pane">
            <p class="color-datails"><?php echo $brief; ?> <br></p>
        </div>
        <div class="tab-pane fade" id="contact-tab-pane">
            <p class="color-datails"><?php echo $testimonials; ?></p>
        </div>
        <div class="tab-pane fade" id="disabled-tab-pane">
            <div class="row">
                <div class="col-md-6 col-12 mb-3 mb-md-0">
                    <span class="d-block text-secondary-add ">
                        <a href="https://goo.gl/maps/<?php echo $site; ?>" target="_blank"><?php echo $cite_doctor; ?>
                            <div class="loader"></div>
                        </a>
                    </span>
                    <p class="phone-text" style="text-align:right;"><a class="map-marker tabeeb-marker"
                            href="tel:<?php echo $commun; ?>" target="_blank" rel="noopener">
                            <img src="<?php echo SITEURL; ?>images/icon/ic_action_phone_end.png" width="30px"
                                height="30px" alt="تعذر تحميل الصورة"><?php echo $commun;?></a></p><br/>
                    <!-- <h6 class="phone"><a class="tel-marker tabeeb-marker" href="tel:+967776352818" target="_blank" rel="noopener">+967 776 352 818</a></h6> -->
                    <hr style="border:2px solid blue;">
                    <h5 class="title-Times">مواعيد الدوام:</h5>

                        <?php 
                            $sqlarry =mysqli_query($conn,"SELECT * FROM tbl_times where id_doctor=$row[id]");
                            if(mysqli_num_rows($sqlarry)){
                                $ro = mysqli_fetch_array($sqlarry); 
                                    $id_t = $ro['id_t'];
                                    $time_day1 = $ro['time_day1'];   
                                    $time_day2 = $ro['time_day2'];  
                                    $time_day3 = $ro['time_day3'];  
                                    $time_day4 = $ro['time_day4'];  
                                    $time_day5 = $ro['time_day5'];                                                       
                                    $time_day6 = $ro['time_day6'];  
                                    $time_day7 = $ro['time_day7'];  
                            ?>
                            <table>
                        <tr>
                            <td>السبت:-</td>
                            <td class="Times-doctor"><?php echo $time_day1; ?></td>
                        </tr>
                        <tr>
                            <td>الاحد:-</td>
                            <td class="Times-doctor"><?php echo $time_day2; ?></td>
                        </tr>
                        <tr>
                            <td>الاثنين:-</td>
                            <td class="Times-doctor"><?php echo $time_day3; ?></td>
                        </tr>
                        <tr>
                            <td>الثلاثاء:-</td>
                            <td class="Times-doctor"><?php echo $time_day4; ?></td>
                        </tr>
                        <tr>
                            <td>الاربعاء:-</td>
                            <td class="Times-doctor"><?php echo $time_day5; ?></td>
                        </tr>
                        <tr>
                            <td>الخميس:-</td>
                            <td class="Times-doctor"><?php echo $time_day6; ?></td>
                        </tr>
                        <tr>
                            <td>الجمعة:-</td>
                            <td class="Times-doctor"><?php echo $time_day7; ?></td>
                        </tr>
                        </table>
                    <?php 
                                
                            }else{
                                echo "لا يوجد دوام لهذا الدكتور";
                            }

                        // }else{
                        //     echo "يوجد خطاء في البيانات";
                        // }
                            
                            ?>
                </div>
            </div>
        </div>
        </div>
        <!-- <div class="tab-pane fade list-with-br" id="home" style="display:none">
            <a href="#home-tab" onclick="ShowHide('home');">single</a>
        </div> -->
    </div>
</div>

<?php
// }else{
//     echo "error";
// }
// }else{
//     echo "لم يتم تحديد اي تخصص";
// }
}else{
    echo "لم يتم العثور على بيانات الطبيب ";

}
}else{
    echo "لم يتم تحديد اي طبيب";
}
// }else{
//     echo "لا يوجد تخصص";
// }

?>
</div>
<!-- end page display-doctor.php -->
<script src="js/script.js" type="text/javascript"></script>
<!-- <script src="js/min.js" type="text/javascript"></script> -->

<!--Footer Part Start-->
<?php include('partials-front/footer1.php'); ?>
<!--Footer Part End-->