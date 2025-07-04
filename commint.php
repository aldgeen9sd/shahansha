<script LANGUAGE="JavaScript">
function acceptY() {
    var minlength = 7;
    var username = document.forms[0].elements[0].value;
    if (document.forms[0].elements[0].value.length < minlength) {
        alert('يجب ان يكون اسم المستخدم على الاقل من 10 احرف');
        document.forms[0].elements[0].value = "";
        document.forms[0].elements[0].focus();
        return false;
    }
}
</script>
<!-- start add comment to page -->
<fieldset>
    <legend class="title-comment">
        <!-- <div class=''> -->
        <span class='comment-text'>التعليقات</span>
        <!-- </div> -->
    </legend>
    <?php 
    echo"
    <div class='send-comment'>
    <form action='' method='post'  enctype='multipart/form-data'>
    <table style='' class='writing-comment' cellpadding='20'>
    <tr>
    <!-- <td style='width: 5%;'><img src='../images/icon/avatar.png' class='avatar' alt='not found img'/></td> -->
    <td class='in-username'>
    <input class='text-username-co' maxlength='20' size='20' type='text' name='username' onchange='acceptY();' placeholder='الاسم'></td>
    </tr>
    <tr>
    <td colspan='1' class='in-username'>
    <textarea class='text-username-co' name='comment' cols='40' rows='3' placeholder='نص التعليق'></textarea></td>
    </tr>
    <tr>
    <td colspan='1'>
    <input class='right' name='submit' value='ارسال تعليق' type='submit' onclick= /><i class='icon-send'></i></td>
    <!--<td colspan='1' class='in-username'>
     <button class='display-commint'><a href='display-comment.php'>عرض التعليقات</a></button></td>-->
    </tr>
    </table>
    </form>
    </div>
    ";
    
    ?>
</fieldset>
<?php 
    if(isset($_POST['submit'])) 
    { 
    $username= $_POST['username'];
    $comment=$_POST['comment']; 
    $time = date("Y-m-d h:i:sa");
    if (!empty($username)){
        if (!empty($comment)){                
if(mysqli_connect_error()){
    die('connect_error('.mysqli_connect_erron() . ')' . mysqli_connect_error());
}else{
    $insert="INSERT INTO comments SET
    username = '$username',
    comment = '$comment',
    time = '$time'
    ";
    $rest1 = mysqli_query($conn, $insert);
    if($rest1 = true){
       echo "<div><script>alert('شكرا لك على تعليقك.')</script></div> ";
       echo "<script>window.location.href='index.php';</script>";

    }
}
$conn->close();
        }else{
            echo "<div><script>alert('.الرجاءادخال نص التعليق')</script></div>"; 
        }
    }else{
        echo "<div><script>alert('الرجاء ادخال اسم المستخدم.')</script></div>";
    }
     
    } 
    ?>

<!-- end add comment to page -->