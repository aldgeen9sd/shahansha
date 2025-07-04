<!--  ملف معرة عدد الزورا -->
<?php 
$COUNT_FILE = "date.txt";
$IMG_DIR_URL = "../images/icon/";
$NB_DIGITS = 8;

if (file_exists($COUNT_FILE)){
    $fp = fopen("$COUNT_FILE", "r+");
    flock($fp,1);
    $count = fgets($fp, 4096);
    $count += 1;
    fseek($fp, 0);
    fputs($fp, $count);
    flock($fp, 3);
    fclose($fp);
}else{
    echo "خطاء: لم اجد ملف تخزين البيانات";
    exit;
}
chop($count);
$nb_digits = max(strlen($count), $NB_DIGITS);
$count = substr("0000000000".$count, -$nb_digits);
$digits = preg_split("//", $count);
for($i = 0; $i <=$nb_digits; $i++){
    if ($digits[$i] != ""){
        $html_result .= "<IMG SRC =\"$IMG_DIR_URL$digits[$i].gif\">";
    }
}
?>
<?php echo $html_result; ?>