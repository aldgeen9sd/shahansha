<?php 
class counter{
    var $db_HOST = "localhost";
    var $db_USER = "root";
    var $db_PASS = "";
    var $db_name = "databasedoctor";
    var $conn;

    var $ip;
    var $day;
    var $year;
    var $month;
    var $time;
    function counter(){
        $this->ip = $_SERVER('REMOTE_ADDR');
        $this->day = date('d');
        $this->month = date('m');
        $this->year = date('Y');
        $this->time = date();

        $this->connect_db();
    }

    function connect_db()
    {
        $this->conn = mysqli_connect(
            $this->db_HOST, $this->db_USER, $this->db_PASS
        ) or dir("open <b>count.class.php</b> and edit your database informaion");
        $m = mysqli_select_db(
            $this->db_name, $this->conn
        );
        return ($conn);
    }

    function check_insert(){
        $query = "SELECT * FROM counter";
        $result = mysqli_query($query, $conn);
        $num = mysqli_num_rows($result);
        $check = "SELECT * FROM counter WHERE ip='$this->ip' and day = '$this->day' and month= '$this->month' and year='$this->year'";
        $result2 = mysqli_query($check, $this->conn);
        $rowvisitor = mysqli_fetch_array($check);
        $num2 = mysqli_num_rows($result2);

        if ($num2 != 0){
            mysqli_close($this->conn);
            // exit;
        }
        $insert = "INSERT INTO counter (id, ip, day, month, year, time) VALUES ('$this->ip', '$this->day', '$this->month', '$this->year', '$this->time')";
        $res = mysqli_query($insert, $this->conn);
        if($res= true){
            echo "تم اضافة الزائر بنجاح";
        }else{
            echo "لم يتم اضافة الزائر ";
        }
    }
    function all_visit(){
        $select1 = "SELECT COUNT(*) FROM counter GROUP BY ip";
        $result3 = mysqli_query($select1, $this->conn);
        $rowvisitor = mysqli_fetch_array($result3);
        echo mysqli_num_rows($result3);
    }

    function visit_today(){
        $select = "SELECT COUNT(*) FROM counter WHERE day = '$this->day' and month='$this->month' and year='$this->year'";
        $result = mysqli_query($select, $this->conn);
        echo mysqli_num_rows($result);
    }
    function visit_month(){
        $select = "SELECT COUNT(*) FROM counter WHERE month = '$this->month' and year='$this->year' GROUP BY ip";
        $result = mysqli_query($select, $this->conn);
        echo mysqli_num_rows($result);
    }
    function visit_year(){
        $select = "SELECT COUNT(*) FROM counter WHERE year = '$this->year' GROUP BY ip";
        $result = mysqli_query($select, $this->conn);
        echo mysqli_num_rows($result);
    }
    function visit_u(){
        $select = "SELECT * FROM counter WHERE ip = '$this->ip'";
        $result = mysqli_query($select, $this->conn);
        echo mysqli_num_rows($result);
    }
    function close_db(){
        $this->conn = mysqli_close($this->conn);
    }

}  
// $nonav = '';
// include('config/constants.php');
// if (isset($_SERVER['HTTP_REFERER'])){
//     $visit = $_SERVER['HTTP_REFERER'];
// }else{
//     $visit = '';
// }
// $day = date('d');
// $month =date('m');
// $year = date('Y');
// $time = date('h:i');
// $stmt = $conn->prepare("INSERT INTO `counter` (`visit`, `day`, `month`, `year`, `time`) VALUES (:visit, :day, :month, :year, :time)");
// $stmt->execute(array(
//     'visit' => $visit,
//     'day' => $day,
//     'month' => $month,
//     'year' => $year,
//     'time' => $time
// ));
// $stmt = $conn->prepare("SELECT visits FROM `visits` WHERE visit_id = 1");
// $stmt->execute();
// $visitRow = $stmt->fetch();
// $lastvisit = $visitRow['visits'];
// $newvisit = $lastvisit + 1;
// echo $newvisit;
// $stmt = $conn->prepare("UPDATE visits SET visit = ? WHERE visit_id = 1");
// $stmt->execute(array(
//    $newcounter
// ))

?>
<!-- <a href="index.php" class="button btn-success">copanle</a> -->