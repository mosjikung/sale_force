<?php
session_start();
ini_set('display_errors', 0);
error_reporting(~0);

$ddlSelect = null;

if(isset($_POST["ddlSelect"]))
{
  $ddlSelect = $_POST["ddlSelect"];
}
if(isset($_POST["ddlSelect2"]))
{
  $ddlSelect = $_POST["ddlSelect2"];
}
    require_once "db.php";

    $json = array();
    $sqlQuery = "SELECT * FROM tbl_event WHERE username = '".$_GET["ddlSelect"]."'";
    mysqli_set_charset($conn, "utf8");

    $result = mysqli_query($conn, $sqlQuery);
    /*$eventArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($eventArray, $row);
    }
    mysqli_free_result($result);*/
    $num = mysqli_num_rows($result);
    for ($e=1; $e<=$num; $e++) {
      $data = mysqli_fetch_assoc($result);


      $data_return[] = array(
    		'id'   => $data['id'],
    		'title'   => $data['detail']."\n\r".$data['username']."\n\r".$data['company_name'],
     		'start'   => $data['start'],
    		'end'   => $data['end'],
    		'allDay' => false,
        'textColor' => "#00000",
        'backgroundColor' => "#cae3cc",
        'borderColor' => "#f7d07a",
        /*'dataEvent' => $val,
        /*'dataEventDetail' => $data_detail,
        /*'roomTitle' => $data_room->room_title,
        /*'subjectTitle' => $data_subject->vis_name,*/
    	);
    }

    mysqli_close($conn);
    echo json_encode($data_return, JSON_UNESCAPED_UNICODE);
?>
