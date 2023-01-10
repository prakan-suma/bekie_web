<?php
use FFI\Exception;

session_start();
//db connect
$conn = new mysqli('localhost', 'root', '', 'web_ecommerce');
$conn->set_charset('utf8');
date_default_timezone_set('asia/bangkok');

//sql func
function get($sql){
    global $conn;
    try {
        $query = $conn->query($sql);
        $queryrow = $query->fetch_all(MYSQLI_ASSOC);

    }catch(Exception $e){
        $queryrow = [];
    }
    return $queryrow;
}
function set($sql){
    global $conn;
    try{
        $rel = $conn->query($sql);
    }catch(Exception $e){
        echo $e->getMessage();
    }
    return $rel;
}

//rount
function rount($link){
    header('location:' . $link);
    exit;
}

//เอาไว้เช็ค สถานะ login 
function auth(){
    if(empty($_SESSION['auth'])){
        rount('login.php');
    }
}

//เอาไว้ดึงข้อมูล User มาโข ถ้าไม่มีจะ ส่งคำว่าไม่มีข้อมูลกลับไป
function user($userdata){
    return $_SESSION['user'][$userdata] ?? 'ไม่มีข้อมูลอยู่';
}

//เอาไว้เช็คว่าผู้ใช่เป็น ประเภท seller ไหม
function sellerAuth(){
    if($_SESSION['user']['type'] != 'seller' || empty($_SESSION['user']) ){
        rount('login.php');
    }
}

//เอาไว้เช็คว่าผู้ใช่เป็น ประเภท customer ไหม
function custommerAuth(){
    if($_SESSION['user']['type'] != 'seller' || empty($_SESSION['user']) ){
        rount('login.php');
    }
}

// เก็บ session alert และ ส่งผู้ใช้ไปหน้าอื่น มี 3 paramiter $class = ชื่อ class css เช่น danger warning | $mess = ข้อความที่จะแสดงerror | $rount = จะส่งผู้ใช้กลับไปหน้าไหน

// ตอนเรียกใช้้ให้ใส่ paramiter 3 ตัว เช่น alertSess('danger','ไม่สามารถลงทะเบียนได้','register.php')  
function alertSess($class,$mess,$rount){
    $_SESSION['alert-class'] = $class;
    $_SESSION['alert-message'] = $mess;
    rount($rount);
}

//Show alert ถ้ามี $_SESSION['alert-class'] กับ $_SESSION['alert-message'] ส่งมาจะทำการ Show alert
function alertShow(){
    if(isset($_SESSION['alert-class']) && isset($_SESSION['alert-message'])){
        echo '<div class="alert-'.$_SESSION['alert-class'].' p-3 btn-block mb-3 rounded">'.$_SESSION['alert-message'] .'</div>';
    }
}


?>