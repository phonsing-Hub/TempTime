#!/bin/php
<?php
$interval = $argv[1] ?? 60;
$interval = round($interval / 5) * 5;

while (true) {
    // อ่านค่าเวลาจากเครื่อง
    $dateTime = date('M d, Y - H:i:s');
    // คำนวณเวลาที่ต้องรอ
    $waitTime = ceil(time() / $interval) * $interval - time();
    // รอจนกว่าจะถึงเวลาที่ต้องรอ
    if($waitTime > 0)
    echo "WaitTime: ".$waitTime."s. before reading file every ".$interval."s.".PHP_EOL;
    sleep($waitTime);
    // อ่านค่าอุณหภูมิจากไฟล์ temp.txt
    $tempFile = 'temp.txt';
    $temp = file_exists($tempFile) ? file_get_contents($tempFile) : 'N/A';
    // แสดง data.txt
    $message = "[$dateTime] Temp: $temp";
    echo $message . PHP_EOL;
    sleep($interval);
}
?>
