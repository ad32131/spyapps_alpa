

<?php
include_once "dbcon.php";
include_once "common.php";
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>문자조회</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<!-- partial:index.partial.html -->
<body>
<div id="wrapper">
    <h1>문자조회</h1>

    <table id="keywords" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th><span>메세지갯수</span></th>
            <th><span>번호</span></th>
            <th><span>메세지최신날짜</span></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "select count(*) as CT,phonenumber as PH, MAX( msg_date ) as msg_date FROM `smsdata` group by phonenumber;";
        select_run($sql, $total_record , $result, $connect);
        for($i=0; $i < $total_record; $i++) {
            mysqli_data_seek($result, $i);
            $row = mysqli_fetch_array($result);

            echo "<tr>";
            echo "<td>".$row['CT']."</td>";
            echo "<td><a style='color: cornflowerblue;text-decoration: none;' href='/view_msg.php?phonenumber=".$row['PH']."''>".$row['PH']."</a></td>";
            echo "<td>".$row['msg_date']."</td>";
            echo "</tr>";
        }




        ?>
        </tbody>
    </table>
</div>
</body>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.14/js/jquery.tablesorter.min.js'></script><script  src="js/script.js"></script>


</html>