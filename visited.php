
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>عدد الزوار</title>
        <meta name="keywords" content=""/>
        <meta name="description" content="">
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <!-- $ip = getenv("REMOTE_ADDR");
    $port = getenv("REMOTE_PORT");
    $browser= getenv("HTTP_USER_AGENT"); 
    $date=getenv(date("Y-m-d h:i:sa")); -->
    <body>
        <?php
        $ipvist = $_SERVER['REMOTE_ADDR'];
        $port = getenv("REMOTE_PORT");
        $browser= getenv("HTTP_USER_AGENT");
        $date=getenv(date("Y-m-d h:i:sa"));
        // $select = mysqli_query($conn,"select * from vist ") or die(mysqli_error());
        // $rowvist = mysqli_fetch_array($select);
        $visitor = mysqli_query($conn,"select * from vist") or die(mysqli_error());
        $numvisitor = mysqli_num_rows($visitor);
        $rowvisitor = mysqli_fetch_array($visitor);
        if($numvisitor !== null){
            $insertvisitor = mysqli_query($conn,"INSERT INTO vist (visitor, visitbr ,openorclose,ipvisted) VALUES('$port','$browser','$date','$ipvist') ") or die(mysqli_error());
        }
        // $vist = $rowvist['ipvist'];
        //  $vist ++;
        // $addvist = mysqli_query($conn,"update vist set ipvist = '$vist' where id='1'") or die(mysqli_error());
        // $rowopenorclose1 = mysqli_num_rows($addvist);
        // $selectopenorclose = mysqli_query($conn,"select * from settings where id = '2'") or die(mysqli_error());
        // $rowopenorclose = mysqli_fetch_array($selectopenorclose);
        // if ($rowopenorclose['openorclose'] == 0){
        //    echo "<br/><br/>
        //    <table align='center' class='indexin' >
        //    <tr class='indexf'>
        //    <td>
        //    رسالة ادارية
        //    </td>
        //    </tr>
        //    <tr class='tab'>
        //    <td>
        //    <h3>
        //    " . $rowopenorclose ['massegforclose'] ."
        //    </h3>
        //    </td>
        //    </tr>
        //    </table>";
        //    exit(); 
        // }
        // // نهاية كود الاغلاق
        // // بدية جدول التوقيعات
         ?>
        <!-- // <table align="center" width="40%" calss="indexin">
        //     <tr class="indexf">
        //         <td colspan="3" align="center" >:-- التوقيعات --:</td>
        //     </tr> -->
          <?php 
        //     $page = intval($_GET['page']);
        //     $page = filter_var($page, FILTER_VALIDATE_INT);
        //     // اعطينا شرط لو كانت قيمة الصفحة خالية اجعلها 1
        //     if (!isset($_GET['page'])){
        //         $page = 1;
        //     }else{
        //         //  لو كانت غير خالية
        //         $page = intval($_GET['page']);
        //     }
        //     $max = $rowsettings['numberoftopics'];
        //     $from = ($max*$page)-$max;
        //     $sql = mysqli_query($conn,"select * from comments order by id ") or die(mysqli_error());
        //     $slq_num = mysqli_num_rows($sql);
        //     $sql1 = mysqli_query($conn,"select * from comments order by id desc limit $from, $max") or die(mysqli_error());
        //     $slq_num1 = mysqli_num_rows($sql1);
        //     $pages = ceil($sql_num/$max);
        //     $num = mysqli_num_rows($sql);
        //     while($row = mysqli_fetch_array($sql1)){
        //         echo "<tr class='indexx'><td> add of " .$row['date']. "</td> <tr/>
        //         <tr class='indexx' ><td><b><a target='top' href='".$rowsettings['siclink']."/showmsg.php?id=".$row['id']."'>".$row['subject']."</a></b></td></tr>
        //         <tr width='100%'>
        //         <table align='center' width='100%' class='indexz'>
        //         <tr class='indexa'>
        //         <td width='25%' align='top'>
        //         <table align='center' width='100%' class='indexz'>
        //         <tr class='in'>
        //         <td>المعلومات الشخصية</td>
        //         </tr>
        //         <tr class='in'>
        //         <td>
        //         <--: ".$row['name']." :-->
        //         </td>
        //         </tr>
        //         <tr class='in'>
        //         <td>
        //         <a href='mailto:".$row['email']."'<imgg src='".$rowsettings['siclink']."/images/email.png' border='0' /></a>
        //         </td>
        //         </tr>
        //         <tr class='in'>
        //         <td>
        //         <a href='mailto:".$row['site']."'<imgg src='".$rowsettings['siclink']."/images/home.png' border='0' /></a>
        //         </td>
        //         </tr>
        //         </table>
        //         </td>
        //         <td width='75%' clospan='3' bgcolor='#d2effd' calss='azrag'>".$row['msg']."</td>
        //         </tr>
        //         </table>
        //         </td>
        //         </tr>
        //         ";

        //     }
        //     echo "</table>";
        //     mysqli_free_result($sql1);
        //     echo "<table class='tab' align='center'>
        //     <tr>";
        //     if ($page>1){
        //         $back = $page-1; 
        //         echo "<td>
        //         <a href='".$_SERVER['PHP_SELF']."?page=$back '>الصفحة السابقة</a></td>";
        //     }
        //     for($i=1; $i<=$pages; ++$i){
        //         if($page==$i){
        //             echo "[$i]";
        //         }else{
        //             echo "<td><a href='".$_SERVER['PHP_SELF']."?page=$i'>$i</a></td>";
        //         }
        //     }
        //     if($page<$pages){
        //         $next = $page + 1;
        //         echo "<td><a href='".$_SERVER['PHP_SELF']."?page=$next'>الصفحة التالية</a></td>";
        //     }
        //     echo "</tr>
        //     </table>";
        //     // نهاية اكواد تعدد الصفحات
            ?>
            <br/>
       
        <!-- </table> -->
    </body>
    </html>