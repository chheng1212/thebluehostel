<?php
    include'checkin_api.php';

// ទិន្នន័យដែលទទួលបានពី Form Check-in
$guestName    = $_POST['cus_name'];    // ឧទាហរណ៍៖ "លោក សុខ"
$checkInDate  = $_POST['cdate']; // ឧទាហរណ៍៖ "2026-06-23"
$roomNumber   = $_POST['roomnum'];   // ឧទាហរណ៍៖ "202"
$price        = $_POST['price'];         // ឧទាហរណ៍៖ "25$"

// រៀបចំសារឱ្យមានទម្រង់ស្អាត (ប្រើ \n ដើម្បីចុះបន្ទាត់)
$message = "🛎 <b>ព័ត៌មានការ Check-in ថ្មី</b>\n\n" .
           "👤 ឈ្មោះភ្ញៀវ៖ " . $guestName . "\n" .
           "🚪 លេខបន្ទប់៖ " . $roomNumber . "\n" .
           "📅 ថ្ងៃចូល៖ " . $checkInDate . "\n" .
           "💰 តម្លៃ៖ " . $price . "\n\n" .
           "<i>សូមរៀបចំបន្ទប់ឱ្យបានស្អាត!</i>";

// ហៅ Function ផ្ញើសារ
sendTelegramNotification($message);

  date_default_timezone_set('Asia/bangkok');
    session_start();
    include('session.php');
        include "connect.php";

       if(isset($_POST['CheckIn'])){

             if (isset($_POST['cash_payment'])) {
        $payment_method = "Card";
    } else {
        $payment_method = "Cash";
    }

        
            
            $name=$_POST["roomnum"];
            $customer=$_POST["cus_name"];
            $depos=$_POST["desposit"];
           
            $datein=$_POST["cdate"];
            $time=date('g:i a');
            $dateout=$_POST["udate"];
            $qty=$_POST["totalNights"];
            $price=$_POST["price"];
            $pay=$_POST["pay"];
            $status="stay";
            $arrived="Pendding";
            $gender=$_POST["gender"];
            $passport=$_POST["passport"];
            $national=$_POST["nationlity"];
            $user=$login_session;
            $sql="insert into tblroom (roomnumber,customer,gender,passport,nationality,deposit,disposit_type,checkdate,ch_time,checkout,qty,price,pay,status,customer_arrive,user) values ('$name','$customer','$gender','$passport','$national',$depos,'$payment_method','$datein','$time','$dateout','$qty',' $price','$pay','$status','$arrived','$user')"; 
            mysqli_query($conn,$sql);

            $sqls="update tblstcokroom set status='Busy' where roomtype='$name'"; 
            mysqli_query($conn,$sqls);
            
             header("location: index.php");
           
            
       }
?>