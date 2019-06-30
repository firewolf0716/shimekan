<?php

$page_flag = 0;
$clean = array();

if( !empty($_POST) ) {
  foreach( $_POST as $key => $value ) {
    $clean[$key] = htmlspecialchars( $value, ENT_QUOTES);
  }
}

if( !empty($clean['confirm']) ) {
    $page_flag = 1;
    session_start();    
    $_SESSION['page'] = true;  
}elseif( !empty($clean['submit']) ) {

    session_start();
    if( !empty($_SESSION['page']) && $_SESSION['page'] === true ) {

        unset($_SESSION['page']);

        $page_flag = 2;
        
        require 'send_form_email.php';

    }else{
        $page_flag = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>使命館</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Firewolf Shop UI description" name="description">
  <meta content="Firewolf Shop UI keywords" name="keywords">
  <meta content="Firewolf" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-">
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="#">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="./css/style.css" rel="stylesheet">
  <!-- Global styles END -->   

</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body id="contact-body">
    <div class="container contact"> 

        <!-- BEGIN HEADER -->
        <div class="header">
            <div class="header-navigation">
                <ul>
                    <li>
                        <a href="./index.html">
                            <div class="nav-box">
                                <img src="./img/right-arrow.png">
                                <span class="header-nav">トップ</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="./service.html">
                            <div class="nav-box">
                                <img src="./img/right-arrow.png">
                                <span class="header-nav">サービス</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="./instagram.html">       
                            <div class="nav-box">
                                <img src="./img/right-arrow.png">
                                <span class="header-nav">写真一覧</span>
                            </div>
                        </a>         
                    </li>
                    <li>
                        <a href="./index.html">
                            <span class="site-title"><img src="./img/logo.png" alt="使命館"></span>
                        </a>
                    </li>
                    <li>
                        <a href="./profile.html">
                            <div class="nav-box">
                                <img src="./img/right-arrow.png">
                                <span class="header-nav">会社概要</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="./contact.php">
                            <div class="nav-box">
                                <img src="./img/right-arrow.png">
                                <span class="header-nav">お問い合わせ</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Header END -->

	    <div class="subpage-title contact-title">
	    	<div class="content">
		    	<img src="./img/service-line.png" class="pull-left">
		    	<div class="pull-left">
		    		<p>お問い合わせ</p>
		    		<p>Contact</p>
		    	</div>
		    	<img src="./img/service-line.png" class="pull-left">
	    	</div>
	    </div>

        <div class="contact-part">


<?php if( $page_flag === 1 ): ?>

            <div class="description">
                <p>確認画面</p>
                <p>ご入力された内容の確認をおいします。</p>
                <p>&nbsp;</p>
            </div>
            <div class="form-box">
                <form method="post" action="">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-6">
                                <div class="label">
                                    <label>お名前*</label>
                                </div>
                                <div class="value">
                                    <input type="text" size="65" name="name" id="name" readonly value="<?php echo $clean['name']; ?>" >
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-6">
                                <div class="label margin-l17">
                                    <label>ふりがな</label>
                                </div>
                                <div class="value">
                                    <input type="text" size="65" name="hurigana" id="hurigana" readonly value="<?php echo $clean['hurigana']; ?>">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="label">
                                <label>メールアドレス*</label>
                            </div>
                            <div class="value">
                                <input type="email" size="65" name="email" id="email" readonly value="<?php echo $clean['email']; ?>" >
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="label">
                                <label>電話番号*</label>
                            </div>
                            <div class="value">
                                <input type="text" size="65" name="telephone" id="telephone" readonly value="<?php echo $clean['telephone']; ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="label">
                                <label>件名</label>
                            </div>
                            <div class="value">
                                <input type="text" name="subject" id="subject" readonly value="<?php echo $clean['subject']; ?>">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="label">
                                <label>お問い合わせ </br>内容*</label>
                            </div>
                            <div class="value">
                                <textarea cols="55" name="question" id="question" readonly><?php echo $clean['question']; ?></textarea>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-action">
                        <input type="button" value="戻る" name="reset" id="reset" onClick="history.back()">
                        <input type="submit" value="送信" name="submit" id="submit">
                    </div>
                </form>
            </div> 

<?php elseif( $page_flag === 2 ): ?>

            <div class="description">
                <p>メールフォーム</p>
                <p>送信が完了しました。</p>
                <p>お問い合わせありがとうございます。</p>
                <p>&nbsp;</p>
            </div>

<?php else: ?>

            <div class="description">
                <p>メールフォーム</p>
                <p>下記のフォームに必要事項をご記入の上、確認ボタンを押してください。</p>
                <p>「*」が必要事項です。</p>
                <p>ご入力いただいた情報は、お問い合わせ内容へのご回答の目的のみに利用いたします。</p>
                <p>内容によっては、時間がかかる場合や回答いたしかねる場合がございますのでご了承願います。</p>
            </div>
            <div class="form-box">
                <form method="post" name="contactus" id="contactus" action="<?php $_SERVER['SCRIPT_NAME'] ?>#contactus">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-6">
                                <div class="label">
                                    <label>お名前*</label>
                                </div>
                                <div class="value">
                                    <input type="text" size="65" name="name" id="name" required  oninvalid="setCustomValidity('「お名前」は必ず入力してください。')" oninput="setCustomValidity('')" >
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-6">
                                <div class="label margin-l17">
                                    <label>ふりがな</label>
                                </div>
                                <div class="value">
                                    <input type="text" size="65" name="hurigana" id="hurigana">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="label">
                                <label>メールアドレス*</label>
                            </div>
                            <div class="value">
                                <input type="email" size="65" name="email" id="email" required="required" oninvalid="setCustomValidity('「メールアドレス」は正しい形式で入力してください。')" oninput="setCustomValidity('')" >
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="label">
                                <label>電話番号*</label>
                            </div>
                            <div class="value">
                                <input type="text" size="65" name="telephone" id="telephone" required oninvalid="setCustomValidity('「電話番号」は必ず入力してください。')" oninput="setCustomValidity('')">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="label">
                                <label>件名</label>
                            </div>
                            <div class="value">
                                <input type="text" name="subject" id="subject">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="label">
                                <label>お問い合わせ </br>内容*</label>
                            </div>
                            <div class="value">
                                <textarea cols="30" rows="8" name="question" id="question" required oninvalid="setCustomValidity('「お問い合わせ内容」は必ず入力してください。')" oninput="setCustomValidity('')"></textarea>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-action action-confirm">
                        <input type="submit" value="確認" name="confirm" id="confirm">
                    </div>
                </form>
            </div>  

<?php endif; ?>
                  
            <div class="clearfix"></div>
        </div>

        <!-- BEGIN FOOTER -->
        <div class="footer">	    	
        	<div class="footer-navigation">
            	<ul>
            		<li>
                        <a href="./index.html">
                			<div class="nav-box">
            	    			<img src="./img/right-arrow.png">
            	    			<span class="footer-nav">トップ</span>
            	    		</div>
                        </a>
            		</li>
            		<li>
                        <a href="./service.html">
                			<div class="nav-box">
            	    			<img src="./img/right-arrow.png">
            	    			<span class="footer-nav">サービス</span>
            	    		</div>
                        </a>
            		</li>
            		<li>
                        <a href="./instagram.html"> 
                			<div class="nav-box">
            	    			<img src="./img/right-arrow.png">
            	    			<span class="footer-nav">写真一覧</span>
            	    		</div>
                        </a>
            		</li>
            		<li>
                        <a href="./profile.html">
                			<div class="nav-box">
            	    			<img src="./img/right-arrow.png">
            	    			<span class="footer-nav">会社概要</span>
            	    		</div>
                        </a>
            		</li>
            		<li>
                        <a href="./contact.php">
                			<div class="nav-box">
            	    			<img src="./img/right-arrow.png">
            	    			<span class="footer-nav">お問い合わせ</span>
            	    		</div>
                        </a>
            		</li>
            	</ul>
            </div>
            <div class="footer-bar">
            	<a href="./index.html">
                    <img src="./img/logo.png" alt="使命館">
                </a>
            	<p>Copyright © 2018 使命館 Inc. All Rights Reserved.</p>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- END FOOTER -->
        
	    <div class="clearfix"></div>
	</div>

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <script src="./js/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">var page = 6;</script>
    <script src="./js/layout.js" type="text/javascript"></script>
<?php if( $page_flag === 2 ): ?>
    <script type="text/javascript">
    $(document).ready(function(){
        var vph = $(window).height()-555;
        $(document).find('.contact-part').css('height', vph + 'px');
    });
    </script>
<?php endif; ?>
    <!-- END CORE PLUGINS -->
</body>
<!-- END BODY -->
</html>