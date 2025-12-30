<?php

    // $birth = $S_POST['birth'];

    // $age = date('Y') - $birth;

    // echo "당신의 나이는 $age 입니다";
    

        // $cur_year = date('y');
        // $end_year = $cur_year - 100;

        // for($year = $cur_year; $year > $end_year; $year--){
            // echo "<option calue = '$year'>year</option>";
        // }
        

$people = $_POST['people'];
$age = $_POST['age'];

if ($age >= 18) {
    $price = 20000;
} elseif ($age >= 7) {
    $price = 15000;
} else {
    $price = 0;
}

$total = $people * $price;

echo "총 인원은 {$people}명이고, 입장료는 " . number_format($total) . "원 입니다.";
?>
