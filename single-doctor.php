<?php include("partials-front/menu-index.php");?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;" />
    <link rel="stylesheet" type="text/css" href="css/single-doctor.css" media="all" />
    <!-- <script>
    function myfunction(note, done) {
        var bok = $("#ready");
        box.find(".message").text(note);
        box.find(".btn").unbind().click(function() {
            box.hide();
        });
        box.find(".btn").click(done);
        box.show();

    }
    </script> -->
    <script type="text/javascript">
    function resetform() {
        document.forms[0].elements[1] == "";
    }

    function submitForms() {
        if (isname() && ishistory() && isemail() && istelephone() && isnum_years() && iscertificates())
            if (confirm("\n انت على وشك الانظمام الى الموقع . \n\nاضغط موفق. او الغاء الانظمام.")) {
                alert("شكرا لك على انظمامك الي موقعنا سوف يتم التواصل معك لاكمال عملية الانظمام.");
                return true;
            }
        else {
            alert("لقد احترت الغاء الانظمام الرجاء المحاولة مرة اخرى.");
            return false;
        } else
            return false;
    }

    function isname() 
    {
        if (document.forms[0].elements[0].value == " ") 
        {
            alert("حقل الاسم فارغ. الرجاء ادخل الاسم.")
            document.forms[0].elements[0].focus();
            return false;
        }
        return true;
    }


    function ishistory() {
        if (document.forms[0].elements[1].value == " ") {
            alert("حقل تاريخ الميلاد فارغ . \n\nالرجاء ادخال تاريخ الميلاد.")
            document.forms[0].elements[1].focus();
            return false;
        }
        return true;
    }


    function isemail() {
        ml = document.forms[0].elements[2].value;
        if (ml == " ") {
            alert("حقل البؤيد الالكتروني فارغ.\n\nالرجاء ادخال البريد الالكتروني.")
            document.forms[0].elements[2].focus();
            return false;
        } else {
            // if (ml.length < 8) {
            //     alert("Email length cannot be less than 8 characters");
            //     document.forms[0].elements[2].focus();
            //     return false;
            // }

            if (ml.indexOf("@") == -1) {
                alert("يجب على البريد الالكتروني ان يحتوي على '@' واحدة");
                document.forms[0].elements[2].focus();
                return false;
            }

            pos1 = ml.indexOf("@")
            if (pos1 < 1) {
                alert("لا يكن ان يبد البريد الالكتروني بعلامة '@' ابدا");
                document.forms[0].elements[2].focus();
                return false;
            }

            if (ml.indexOf(".") == -1) {
                alert("يجب ان يحتوي البريد الالكتروني على  '.' علامة");
                document.forms[0].elements[2].focus();
                return false;
            }

            pos = ml.indexOf(" ")
            if (pos != -1) {
                alert("لا يمكن ان يحتوي البريد الالكتروني على مسافات.");
                document.forms[0].elements[2].focus();
                return false;
            }

            pos2 = (pos1 + 1)
            server = ml.substring(pos2);

            if (server.indexOf("@") != -1) {
                alert("يجب ان يحتوي البريد الالكتروني الصالح على علامة '@' واحدة");
                document.forms[0].elements[2].focus();
                return false;
            }
            if (server.indexOf(".") == 0) {
                alert("يجب ان يكون هناك نص بين '@' و '.' علامة");
                document.forms[0].elements[2].focus();
                return false;
            }

            server_pos = server.lastIndexOf(".")
            reqtype = server.substring(server_pos + 1)

            if (reqtype == "") {
                alert("يجب ان ينتهي البريد الالكتروني على احد هذة الاحرف(like .com,.net,.org)");
                document.forms[0].elements[2].focus();
                return false;
            }

            type_end = reqtype.substring(reqtype.length - 1)

            if (type_end.toUpperCase() < "A" || type_end.toUpperCase() > "Z") {
                alert("يجب ان ينتهي معرف البريد الالكتروني  مع الرقم او الرمز");
                document.forms[0].elements[2].focus();
                return false;
            }
            return true;
        }
    }


    // function istelephone()
    // {
    // if (document.forms[0].elements[3].value == "")
    // {
    // alert ("حقل رقم الهاتف فارغ. \n\nالرجاء ادخال رقم الهاتف.")
    // document.forms[0].elements[3].focus();
    // return false;
    // }
    // return true;
    // }
    function istelephone() {
        T = document.forms[0].elements[3].value;
        if (T == "") {
            alert("حقل رقم الهاتف فارغ.")
            document.forms[0].elements[3].focus();
            return false;
        } else {
            if (T.length < 9) {
                alert("يجب ان يحتوي رقم الهاتف على 9 قيم رقمية");
                document.forms[0].elements[3].focus();
                return false;
            }

            if (T.indexOf("7") == -1) {
                alert("يجب ان يحتوي الهاتف على الرقم '7'");
                document.forms[0].elements[3].focus();
                return false;
            }

            pos1 = T.indexOf("7")
            if (!pos1 < 1) {
                alert("يجب ان يبد رقم الهاتف برقم '7'");
                document.forms[0].elements[3].focus();
                return false;
            }
            return true;
        }
    }


    function isnum_years() {
        if (document.forms[0].elements[4].value == " ") {
            alert("حقل عدد سنوات الخبرة فارغ. \n\nالرجاء تحديد عدد سنوات الخبرة")
            document.forms[0].elements[4].focus();
            return false;
        }
        return true;
    }

    function iscertificates() {
        if (document.forms[0].elements[5].value == " ") {
            alert("حقل الشهادات الحاصل عليها فارغ.\n\nالرجاء اخال الشهادات الحاصل عليها.")
            document.forms[0].elements[5].focus();
            return false;
        }
        return true;
    }


    // End -->
    </script>
    <!-- <style>
    #ready {
        display: none;
        background: #f10044;
        border: 1px solid #aaa;
        position: fixed;
        width: 250px;
        left: 50%;
        margin-left: -100px;
        padding: 6px 8px 8px;
        box-sizing: border-box;
        text-align: center;
    }

    #ready button {
        background: #00ff56;
        display: inline-block;
        border-radius: 50%;
        border: 1px solid #aaa;
        text-align: center;
        width: 80px;
        cursor: pointer;
    }

    #ready .message {
        text-align: center;
    }
    </style> -->

</head>
<!-- start page single-doctor.php -->
<div class="" id="page-index">
    <!-- <div id="ready">
        <div class="message">مرحباء . بكم في دليل الاطباء</div>
        <button class="btn">OK</button>
    </div> -->
    <article class="post-2075 type-page status-publish hentry" id="post-2075">
        <fieldset class="fieldset">
            <legend>
                <h1 class="entry-title mb-3 mb-md-4">تسجيل حساب طبيب</h1>
            </legend>

            <div class="entry-content">
                <div class="wpforms-container wpforms-container-full contact-form" id="wpforms-2068">
                    <form action="" method="POST" enctype="multipart/form-data" class="single-doctor"
                        onSubmit="return submitForms()">
                        <!-- onsubmit="return validate(this);" -->
                        <table class="tbl-30">

                            <tr role="row">
                                <td role="cell">
                                    <input type="text" class="inter-data" name="name" size="18"
                                        placeholder="اكتب اسم الدكتور " id="Name">
                                </td>
                            </tr>

                            <tr role="row">

                                <td role="cell">
                                    <input type="text" class="inter-data" name="history" placeholder="تاريخ الميلاد"
                                        id="history">
                                </td>
                            </tr>

                            <tr role="row">
                                <td role="cell">
                                    <select name="specialty" class="inter-data">

                                        <?php 
                            //Create PHP Code to display categories from Database
                            //1. CReate SQL to get all active categories from database
                            $sql = "SELECT * FROM tbl_specialty WHERE active='Yes'";
                            
                            //Executing qUery
                            $res = mysqli_query($conn, $sql);

                            //Count Rows to check whether we have specialtys or not
                            $count = mysqli_num_rows($res);

                            //IF count is greater than zero, we have categories else we donot have specialtys
                            if($count>0)
                            {
                                //WE have specialtys
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    //get the details of specialtys
                                    $id = $row['id'];
                                    $title = $row['title'];

                                    ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                }
                            }
                            else
                            {
                                //WE do not have specialty
                                ?>
                                        <option value="0">لم يتم العثور على تخصص</option>
                                        <?php
                            }
                        

                            //2. Display on Drpopdown
                        ?>

                                    </select>
                                </td>
                            </tr>

                            <tr role="row">
                                <td role="cell">
                                    <input type="email" class="inter-data" name="email" size="18"
                                        placeholder=" بريدك الإلكتروني" id="Email">
                                </td>
                            </tr>
                            <tr role="row">
                                <td role="cell">
                                    <input type="text" class="inter-data" name="telephone" placeholder="رقم الموبايل"
                                        id="Telephone" maxlength="9" onclick="">
                                </td>
                            </tr>
                            <tr role="row">
                                <td role="cell">
                                    <input type="number" class="inter-data" pattern="\d*" name="num_years"
                                        placeholder="عدد سنوات الخبر" id="Num_years">
                                </td>
                            </tr>
                            <tr role="row">
                                <td role="cell">
                                    <input type="text" class="inter-data" name="certificates"
                                        placeholder="الشهادات (M.D, CCT, MSc)" id="Certificates">
                                </td>
                            </tr>
                            <tr role="row">
                                <td>اختار اللغة:
                                    <lable for="arabic"><input type="checkbox" name="arabic" value="عربي">العربية
                                    </lable>
                                    <lable for="english"><input type="checkbox" name="english"
                                            value="انجليزي">الانجليزية</lable>
                                </td>
                            </tr>
                            <tr role="row">
                                <td role="cell">
                                    <lable for="ok">
                                        <input type="checkbox" name="ok" value="أواﻓﻖ" role="checkbox"> أواﻓﻖ ﻋﻠﻰ ﺷﺮوط
                                        اﻟﺄﺳﺘﺨﺪام
                                        وسياسةالخصوصية
                                    </lable>
                                </td>

                            </tr>
                            <tr role="row">
                                <!-- onclick="show_pup()"onclick="myfunction();" -->
                                <td colspan="2" role="cell">
                                    <input type="submit" name="submit" value=" تسجيل" class="btn-secondary">
                                </td>
                            </tr>

                        </table>

                    </form>
                    <?php 

            // This first query is just to get the total count of rows
                
            if(isset($_POST['submit']))
            {
                //Add the doctor in Database
                //echo "Clicked";
                //1. Get the DAta from Form
                $name = $_POST['name'];
                $history = $_POST['history'];
                $email = $_POST['email'];
                $telephone = $_POST['telephone'];
                $specialty = $_POST['specialty'];
                $num_years = $_POST['num_years'];
                $certificates = $_POST['certificates'];

                //Check whether  button for arabic and active are checked or not
                if(isset($_POST['arabic']))
                {
                    $arabic = $_POST['arabic'];
                }else{
                    $arabic = "No"; //SEtting the Default Value
                }
                if (isset($_POST['english']))
                {
                    $english = $_POST['english'];   
                }else{
                    $english = "No";
                }
                if (isset($_POST['ok']))
                {
                    $ok = $_POST['ok'];
                }else
                {
                    $ok = "No";
                }
                // $query = mysqli_query($conn, $sql);
                // $sql = "SELECT COUNT(*) FROM tbl_single WHERE email LIKE '$email'";
	
                // $query = mysqli_query($conn, $sql);

                // $row = mysqli_fetch_row($query);
                
                // // Here we have the total row count
                // $rows = $row[0];

                // if($rows == 0)
                // {
                if (!empty($ok)){
                    if(mysqli_connect_error()){
                        die('connect_error('.mysqli_connect_erron() . ')' . mysqli_connect_error());
                    }else{
                    //Save the single-doctor in Databaase
                    //Create SQL to save the data
                    $sql = "INSERT INTO tbl_single SET
                        name='$name', 
                        history= $history, 
                        email = '$email', 
                        telephone = $telephone, 
                        specialty_id = '$specialty', 
                        num_years = $num_years, 
                        certificates = '$certificates', 
                        arabic = '$arabic', 
                        english = '$english',
                        ok = '$ok'
                        ";
                    //Execute the Query    
                    $rest1 = mysqli_query($conn, $sql);

                    //Check whether query executed successfully or not
                    if($rest1 == true)
                    {
                        //Query Executed and single-doctor Saved
                        $_SESSION['add'] = "<div class='sessen'><script>alert('شكراً لكم للانظمام الينا.سوف يتم التواصل معاكم ')</script></div>";
                        echo "<script>window.location.href='index.php';</script>";
                        // exit();
                    }
                    else
                    {
                        //Failed to Save single-doctor
                        echo "<div><script>alert('حدث خطأ اثناء تحميل البيانات يرجى المحاولة مرة اخرى لأحقا.')</script></div>";
                        echo "<script>window.location.href='single-doctor.php';</script>";
                        // exit();

                    }
                }
            }else{
                echo ".هل انت موفق على شروط الاستخدام وساسة الخصوصية";
                // exit();
            }
                
                // Close your database connection
                mysqli_close($conn);
            // }else{
            //     echo "<div class='success'><script>alert(' هذاء البريد الالكتروني موجود بالفعل  .')</script></div>";
            //     // echo "<meta http-equiv='refresh' content='2; url=single-doctor.php'>";
            //     exit();
            // }
        }
            ?>

                </div>
            </div>
        </fieldset>
    </article>
</div>
<!-- end page single-doctor.php -->
<?php include('partials-front/footer1.php'); ?>