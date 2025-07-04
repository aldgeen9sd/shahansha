<html dir="rtl">
    <?php 
    $ip = getenv("REMOTE_ADDR");
    $port = getenv("REMOTE_PORT");
    $browser= getenv("HTTP_USER_AGENT"); 
    $date=getenv(date("Y-m-d h:i:sa"));

    $v_fopen = fopen("inf.txt", "a+");
    fwrite($v_fopen, "$ip *** $port *** $browser *** $date\n");
    fclose($v_fopen);

    print "<p>اهلا بك عزيزي الزائر هذة معلوماتك</p>";
    print "<table border=1 cellpadding=0 cellspacing=0 style=border-collapse: collapse bordercolor=#111111 width=50%>";
    print "<tr>";
    print "<td width=1% align=center>ip</td>";
    print "<td width=16% align=center>المنفذ</td>";
    print "<td width=16% align=center>الوقت</td>";
    print "<td width=64% align=center>المتصفح</td>";
    print "</tr>";
    print "<tr>";
    print "<td width=20% align=center>$ip</td>";
    print "<td width=16% align=center>$port</td>";
    print "<td width=64% align=center>$date</td>";
    print "<td width=64% align=center>$browser</td>";
    print "</tr>";
    print "</table>";
    ?>
</html>