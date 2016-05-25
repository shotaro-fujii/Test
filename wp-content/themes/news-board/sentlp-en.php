<?php
/*
Template Name: [sentLP-en]
*/




require_once ( 'PHPMailer/PHPMailerAutoload.php' );
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <!--meta-->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <!--css-->
  <link rel="stylesheet" type="text/css" href="https://dl.dropboxusercontent.com/u/31225734/forum/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://dl.dropboxusercontent.com/u/31225734/forum/css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <!--js-->
  <script src="https://dl.dropboxusercontent.com/u/31225734/forum/https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://dl.dropboxusercontent.com/u/31225734/forum/js/jquery.easing.min.js"></script>
  <script type="text/javascript" src="https://dl.dropboxusercontent.com/u/31225734/forum/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(function(){
      $('a[href^=#]').click(function(){
        var speed = 500;
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        position = position - 150;
        $("html, body").animate({scrollTop:position}, speed, "swing");
        console.log(position)
        return false;
      });
    });
</script>

</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_KS/sdk.js#xfbml=1&version=v2.5&appId=100219970324410";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<header class="navbar">
   <div class="container　header--wrap">
     <h1 class="navbar-header hidden-xs">
        <img class="header-logos" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/logo-w.gif">
     </h1>
     <ul class="nav navbar-nav list-inline">
      <li><a href="#concept--anchr">CONCEPT</a></li>
      <li><a href="#project--anchr">PROJECTS</a></li>
      <li><a href="#specialty--anchr">SPECIALITY</a></li>
      <li><a href="#schedule--anchr">SCHEDULE</a></li>
      <li><a href="#sponsors--anchr">SPONSORS</a></li>
      <li><a href="#meta--anchr">META INFO</a></li>
     </ul>
   </div>
</header>
<section>
  
</section>
<section class="invitation" id="invitation--anchr">
  <div class="container invitation--wrap">
    <div class="row title--row">
      <h1 class="col-xs-12 col-md-2">
        <span class="section--title bg-w">INVITATION</span>
      </h1>
    </div>
    <div class="row inv--contents">
      <div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 invitation--area">
        <h2 class="inv--title-w"><span class="inv--title">
          INVITATION
          </span>
        </h2>
        <p class="inv--first--scentence">
          Please come and see the works in KMD!
        </p>
        <p class="inv--desc">You need only 2 minutes to apply for invitation.</p>
        <p class="inv--desc">After the applcation is confirmed, you will be sent your 4 digit serial number by e-mail.</p>
        <p class="inv--desc">There will be some privilages so please apply if you are interested.</p>
        <p class="inv--desc">We are waiting to see you there.</p>
        <div class="row ">
          <ul class="col-xs-12 col-md-10 col-lg-12 invitation-speciality">
            <li class="speciality-list"><img class="speciality-img" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/i-entrance.png"><span class="speciality-desc">Fast Pass to the show case</span></li>
            <li class="speciality-list"><img class="speciality-img" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/i-cofee.png"><span class="speciality-desc">Free coffee made by KMD Factory</span></li>
            <li class="speciality-list"><img class="speciality-img" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/i-cont.png" ><span class="speciality-desc">Special Contents prepared ( Professors colume and lecture videos etc) </span></li>
           <li class="speciality-list"><img class="speciality-img" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/i-rotte.png" ><span class="speciality-desc">Number ticket of Special Blues Rock Live ( 4pm-5:30pm 27th)</span></li>
            <li class="speciality-list"><img class="speciality-img" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/i-contact.png"><span class="speciality-desc">Reminding Emails about the newest information of KMD) </span></li>
          </ul>
            <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<footer>
  <div class="container footer--wrap">
    <div class="col-xs-12 col-md-4 social--moduele">
      <div class="module--wrap" style="width:100%;">
        <div class="fb-page" data-href="https://www.facebook.com/KMDForum" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/KMDForum"><a href="https://www.facebook.com/KMDForum">KMD Forum</a></blockquote></div></div>
    </div>
    </div>
    <ul class="hidden-xs col-md-2 site--map">
      <li><a href="#concept--anchr">CONCEPT</a></li>
      <li><a href="#project--anchr">PROJECTS</a></li>
      <li><a href="#specialty--anchr">SPECIALITY</a></li>
      <li><a href="#schedule--anchr">SCHEDULE</a></li>
      <li><a href="#sponsors--anchr">SPONSORS</a></li>
      <li><a href="#meta--anchr">META INFO</a></li>
    </ul>
    <img class="col-xs-12 col-md-6" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/sponsors-b.png">
    <p class="col-xs-12 col-md-12 copy-right--p">Copyright © 2015 - Keio Media Design, All rights reserved.</p>
  </div>
</footer>

</body>
</html>