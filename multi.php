<?php

include('mysqli.php');
//phpinfo();
$gamerget = (int) $_GET['id_gracza'];
$result = $db->query("SELECT * FROM gracze_logowania");
$gamerip = $db->query("SELECT * FROM gracze_logowania WHERE" . $gamerget);

$total_num_rows = $result->num_rows;
echo $total_num_rows;
$data = array();
$justdata = array();
while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}

while ($row = mysqli_fetch_array($gamerip)) {
    $data[] = $row;
}

echo $data[255]['id_gracza'];
echo "Rezultaty sledztwa : <br>";


$j = 0;

while ($j < $total_num_rows) {

    $ip = $data[$j]['ip'];
    $date = $data[$j]['data'];
    $gamer = $data[$j]['id_gracza'];
    $j++;
    //	echo "Numer petli: ".$j."<br>";
    $gracz = "";
    if ($date > '2015-09-25 11:13:38') {
        for ($i = 0; $i < $total_num_rows; $i++) {



            if ($ip == $data[$i]['ip'] && $gamer != $data[$i]['id_gracza'] && $data[$i]['id_gracza'] != $gracz) {
                echo "<b>Przypadek " . $d . ". </b><br>
								id gracza1 : " . $gamer . " id gracza2:" . $data[$i]['id_gracza'] . " Data: " . $date . " <br>";
                $d++;
                $gracz = $data[$i]['id_gracza'];
                $justdata[] = [$data][$i][['id_gracza'];
            }
        }
    }
}
?>