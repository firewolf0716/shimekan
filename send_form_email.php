<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

// 変数とタイムゾーンを初期化
$username = '/*メールアドレス*/';  
$password = '/*パスワード*/'; 

$auto_reply_subject = null;
$auto_reply_text = null;
$admin_reply_subject = null;
$admin_reply_text = null;
date_default_timezone_set('Asia/Tokyo');

// auto reply
// お客様へのメールの件名を設定
$auto_reply_subject = "お問い合わせありがとうございます。";

// お客様へのメールの本文を設定
$auto_reply_text = "<p>この度は、お問い合わせ頂き誠にありがとうございます</p>" . "\n";
$auto_reply_text .= "<p>下記の内容でお問い合わせを受け付けました。</p>" . "\n\n";
$auto_reply_text .= "<p>お問い合わせ日時：" . date("Y-m-d H:i") . "</p>\n";
$auto_reply_text .= "<p>お名前：" . $clean['name'] . "</p>\n";
$auto_reply_text .= "<p>ふりがな：" . $clean['hurigana'] . "</p>\n";
$auto_reply_text .= "<p>メールアドレス：" . $clean['email'] . "</p>\n";
$auto_reply_text .= "<p>電話番号：" . $clean['telephone'] . "</p>\n\n";
$auto_reply_text .= "<p>お問い合わせ内容：" ."\n" . $clean['question'] . "</p>\n\n";
$auto_reply_text .= "<p>ーーーーーーーーーーーー" . "</p>\n";
$auto_reply_text .= "<p>カモメはり・きゅう院" . "</p>\n";
$auto_reply_text .= "<p>電話番号：00000000000" . "</p>\n";
$auto_reply_text .= "<p>メールアドレス：sample@gmail.com" . "</p>\n";
$auto_reply_text .= "<p>所在地：サンプル県サンプル市" . "</p>\n";
$auto_reply_text .= "<p>ーーーーーーーーーーーー";
// 必要であれば、上を編集して送信メールの内容を変更してください。

$auto_reply_mail = new PHPMailer(true);

//Server settings                         
$auto_reply_mail->isSMTP();     
$auto_reply_mail->CharSet = 'UTF-8';                                 
$auto_reply_mail->Host = 'smtp.gmail.com';  // if gmail, that is.If outlook, smtp-mail.outlook.com ...
$auto_reply_mail->SMTPAuth = true;                               
$auto_reply_mail->Username = $username;          
$auto_reply_mail->Password = $password;               
$auto_reply_mail->SMTPSecure = 'tls';                            
$auto_reply_mail->Port = 587;                                    

//Recipients
$auto_reply_mail->setFrom($username, '会社名'); // Add form name address
$auto_reply_mail->addAddress( $clean['email'], $clean['name']);     // Add to recipient

//Content
$auto_reply_mail->isHTML(true);                                    // Set email format to HTML
$auto_reply_mail->Subject = $auto_reply_subject;
$auto_reply_mail->Body    = $auto_reply_text;
$auto_reply_mail->send();


// 運営側へ送るメールの件名
$admin_reply_subject = "お問い合わせがありました";

// 運営側へ送るメールの本文を設定
$admin_reply_text = "<p>下記の内容でお問い合わせがありました。</p>\n\n";
$admin_reply_text .= "<p>お問い合わせ日時：" . date("Y-m-d H:i") . "</p>\n";
$admin_reply_text .= "<p>お名前：" . $clean['name'] . "</p>\n";
$admin_reply_text .= "<p>ふりがな：" . $clean['hurigana'] . "</p>\n";
$admin_reply_text .= "<p>メールアドレス：" . $clean['email'] . "</p>\n";
$admin_reply_text .= "<p>件名：" . $clean['subject'] . "</p>\n";
$admin_reply_text .= "<p>電話番号：" . $clean['telephone'] . "</p>\n\n";
$admin_reply_text .= "<p>お問い合わせ内容：" ."\n" . $clean['question'] . "</p>\n\n";

$admin_reply_mail = new PHPMailer(true);

//Server settings                         
$admin_reply_mail->isSMTP();      
$admin_reply_mail->CharSet = 'UTF-8';   
$admin_reply_mail->Host = 'smtp.gmail.com';  
$admin_reply_mail->SMTPAuth = true;                               
$admin_reply_mail->Username = $username;           
$admin_reply_mail->Password = $password;               
$admin_reply_mail->SMTPSecure = 'tls';                            
$admin_reply_mail->Port = 587;                                    

//Recipients
$admin_reply_mail->setFrom( $username, '会社名');         // Add form name address
$admin_reply_mail->addAddress( $username, '会社名');     // Add to recipient

//Content
$admin_reply_mail->isHTML(true);                                    // Set email format to HTML
$admin_reply_mail->Subject = $admin_reply_subject;
$admin_reply_mail->Body    = $admin_reply_text;
$admin_reply_mail->send();




    
