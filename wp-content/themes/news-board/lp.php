<?php
/*
Template Name: [LP]
*/

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <!--meta-->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta property="og:type" content="article">
  <meta property="og:title" content="KMD FACTORY - KMD FORUM 2015">
  <meta property="og:url" content="http://kmd-media.com/forum">
  <meta property="og:image" content="https://dl.dropboxusercontent.com/u/31225734/forum/img/forum.png">
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

<div class="live-button">
<a href="https://www.youtube.com/watch?v=MDhxiXGI1Ck">
  <div class="l-button--wrap">
    <span class="r">◉</span><span class="l-b--title"> YouTubeLive：</span>
    <div class="l-b--desc marqueeRightLeft"><p>こちらをクリックして配信ページへ。12時よりKMD学校説明会、14時より稲見教授特別講義を配信中</p></div>
  </div>
</a>
</div>
<style type="text/css">
  .live-button{
    position: fixed;
    bottom: 0;
    left: 0;
    padding: 8px;
    font-size: 1em;
    background-color: #464646;
    color: white;
    z-index: 10000000;
  }
  .l-button--wrap{
    border: 1px solid white;
    padding: 12px;
  }
  .r{
    color: red;
  }
.marqueeRightLeft {
  width: 10em;
  height: 1.2em;
  overflow: hidden;
  display: inline-block;
  text-align: left;
  color:#CCC;
}
.marqueeRightLeft p:after {
  content: "";
  white-space: nowrap;
}
.marqueeRightLeft p {
  margin: 0;
  padding-left: 100%;
  display: inline-block;
  white-space: nowrap;
    -webkit-animation-name:marqueeRL;
    -webkit-animation-timing-function:linear;
    -webkit-animation-duration:25s;
    -webkit-animation-iteration-count:infinite;
    -moz-animation-name:marqueeRL;
    -moz-animation-timing-function:linear;
    -moz-animation-duration:25s;
    -moz-animation-iteration-count:infinite;
    -ms-animation-name:marqueeRL;
    -ms-animation-timing-function:linear;
    -ms-animation-duration:25s;
    -ms-animation-iteration-count:infinite;
    -o-animation-name:marqueeRL;
    -o-animation-timing-function:linear;
    -o-animation-duration:25s;
    -o-animation-iteration-count:infinite;
    animation-name:marqueeRL;
    animation-timing-function:linear;
    animation-duration:25s;
    animation-iteration-count:infinite;
}
 
@-webkit-keyframes marqueeRL {
  from {-webkit-transform:translate(0);} to {-webkit-transform:translate(-100%);}
}
@-moz-keyframes marqueeRL {
  from {-moz-transform:translate(0);} to {-moz-transform:translate(-100%);}
}
@-ms-keyframes marqueeRL {
  from {-ms-transform:translate(0);} to {-ms-transform:translate(-100%);}
}
@-o-keyframes marqueeRL {
  from {-o-transform:translate(0);} to {-o-transform:translate(-100%);}
}
@keyframes marqueeRL {
  from {transform:translate(0);} to {transform:translate(-100%);}
}
</style>
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
      <li><a href="#invitation--anchr">INVITATION</a></li>
     </ul>
     <div class="header-meta hidden-xs" style="position: absolute;
    color: white;
    text-align: right;
    bottom: 34px;
    right: 100px;">
      <p>日時 : 2015年11月27・28日（金・土）</p>
      <p>会場 : 五反田　東京デザインセンター</p>
     </div>
   </div>
</header>

<section class="top">
  <img class="logos" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/logo-b.gif">
  <a href="#invitation--anchr" style="display:inline-block; text-align:center; margin-top: 14%;
" class="inv--anc--button">
    <div class="invitation--link" style="background-color:#1A1A1A; padding:5px;">
      <span class="invitation--link-span" style="display:inline-block; border:solid 1px #FFFFFF; padding:5px 20px;">招待状を受け取る</span>
    </div>
  </a>
</section>

<section class="concept" id="concept--anchr">
  <div class="container concept--wrap">
    <div class="row concept--contents">
      <h1 class="col-xs-12 col-md-2">
        <span class="section--title bg-b">CONCEPT</span>
      </h1>
    </div>
    <div class="row concept--contents">
      <div class="col-xs-12 col-md-12 concept--desc" style="text-align:center;">
        <p class="first--sentence">動くさまに、人は動かされる。</p>
        <p>歯車が音をたてて動く、蒸気があがる、せわしく手を動かす、<br>小さな部品一つひとつが、いつしか大きなものを動かす。<br>そのさまになぜか、人は心を動かされる。</p>
        <p>KMDが生まれて８年が経った。<br>KMDとは何であるのか？ KMDは何を動かしていくのか？<br>それを示す場として、2010年よりKMDforumを開催。</p>
        <p>KMDは仕組みをつくるだけでもなく、手を動かすだけでもなく、<br>”細部を持った全体”をつくり、手を動かし、軸をもって送り出す。<br>DTMPやリアルプロジェクト、それぞれのパイプは交差し、社会へとつながっている。<br>その姿はまさに一つの工場だ。</p>
        <p>KMD FACTORY、その動くさまをぜひ体感いただきたい。</p>
      </div>
    </div>
  </div>
</section>

<section class="project" id="project--anchr">
  <div class="container projects--wrap">
    <div class="row title--row">
      <h1 class="col-xs-2">
        <span class="section--title bg-w">PROJECTS</span>
      </h1>
    </div>
    <div class="row project--card--area">
      <article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">KATO鉄道模型 × デザイン思考</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/kato.jpg');">
          <span class="project--name">OIKOS</span>
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
デザイン思考を用いて生まれた鉄道模型の新たな体験価値を、共同研究パートナーであるKATOと共に、壮大でリアルな模型とジオラマを使い展示。鉄道模型を五感で体験し、没入感を味わうことのできる経験を創出します。
        </p>
      </article>
      <article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">Lap</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/lap.jpg');">
          <span class="project--name">OIKOS</span>
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
          カップルが密着して、見知らぬ土地を走り抜けるCouple mobility「lap」
旅先とのつながりを持ちながら、開放的に２人だけの空間を楽しみ、思い出は車体を通して記録される。体験した後にはきっと、相手のことがもっと好きになる。
        </p>
      </article>
      <article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">超人スポーツ</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/chojin.jpg');">
          <span class="project--name">Superhuman Sports</span>
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
          「超人スポーツ」は、いつでも、どこでも、誰もが楽しむことのできる新たなスポーツです。そんな誰でも楽しめる未来のスポーツのかたち「超人ポーツ」の研究成果やコミュニティ活動を紹介します。
        </p>
      </article>
      <article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">OIKOS MUSIC PROJECT Special Blues ROCK LIVE</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/music-live.jpg');">
          <span class="project--name">OIKOS</span>
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
          「 Bluesギタリストのichiro LIVE開催！ KMD OIKOS MUSIC PROJECTで開講しているPOPS＆ROCK 研究授業の講師であるichiro氏のライブをKMDフォーラムで開催します。 ichiro氏の魂の音楽、自由な心の表現Blues ROCKを感じてください。
        </p>
      </article>
      <article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">CiP</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/cip.jpg');">
          <span class="project--name">Pop Power</span>
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
CiPは、港区の竹芝にデジタルとコンテンツの産業集積地を形成することを目標に活動しているプロジェクト。研究開発・人材育成・起業支援・ビジネスマッチングを一気通貫で行える世界のどこにもない場を構築していきます。        </p>
      </article>
      <article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">情報銀行</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/nwm.jpg');">
          <span class="project--name">Network Media</span>
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
インターネット上に蓄積されたパーソナル情報をどう扱うべきか様々な議論がなされています。 「情報銀行」は、パーソナル情報を取り扱うHUBとなり、安全にそして安心してパーソナル情報を預け、それらを活用する試みです。        </p>
      </article>
      <article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">Virtual Window</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/vw.jpg');">
          <span class="project--name">Creato!</span>
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
Virtual Windowはディスプレイを窓のように見せるプロジェクトです。ユーザーの運動視差により視域を変化させることで空間的な広がりを感じることができます。全天球映像の視聴、インタラクディブアドへの利用を考えています。        </p>
      </article>
      <article class="col-xs-12 col-md-4 project--card" >
        <h1 class="card--title">Social Things</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/socialthings.jpg');">
          <span class="project--name">PLAY</span>
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
          IoT(モノのインターネット)の新たなあり方を提案するプロジェクトです。モノが勝手につながり相互作用してしまうSocial Thingsの世界で、モノたちがどんなふるまいをするのかを示します。
        </p>
      </article>
      <article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">伝統工芸みらいプロジェクト</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/mirai.jpg');">
          <span class="project--name">Creative Industry</span>
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
          「伝統工芸みらいプロジェクト」は、異なる視点やデザイン、デジタル技術を使って、日本の伝統工芸品がさらに輝くよう取り組みます。いま、福井県鯖江市の漆器産業が培ってきた「技」に、新たな魅力が融合します。
        </p>
      </article>
      <article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">ニョキニョキ豆の木</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/nyoki.jpg');">
          <span class="project--name">Geist</span>
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
          豆の木を登って、鬼に奪われた"雨"を取り戻せ。本作品はロープデバイスとCG表現により高所へ登る感覚を与えるVR作品です。IVRCにてVR学会賞 (準優勝)とLaval Virtual賞を受賞しました。
        </p>
      </article>
      <article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">Projection Doors</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/a-door.jpg');">
          <span class="project--name">Play</span>
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
          自動ドアに投影された画像（映像）が、ドアの開閉に合わせて変化するプロジェクションドア。イルミネーションから広告表示まで、すでに日本全国に設置されている自動ドアが建物の印象を自由自在に操ります。
        </p>
      </article>
      <article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">Bus Signage in Singapore</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/nhi.jpg');">
          <span class="project--name">Creato!</span>
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
プローブ情報システムは、道路交通に関する統合的な情報通信システムである高度道路交通システム(ITS)における新たなサービスのトレンドとして注目されています。本研究では、プローブ情報と位置情報を含めた周辺環境情報に基づいたコンテンツ配信プラットホームの開発を目指し、シンガポールにて、実証実験を行っています。</p>
      </article>
      <article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">デジタルえほん</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/d-kids.jpg');">
          <span class="project--name">Digital Kids</span>
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
タブレット等におけるこども向けの新しいデジタル表現「デジタルえほん」。Digital Kidsは、株式会社デジタルえほん・NPO法人 CANVASと共に「国際デジタルえほんフェア」の企画運営を行い世界中からデジタルえほんを集めています。
        </p>
      </article>
      <article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">Geist</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/geist.jpg');">
          <span class="project--name">Geist</span>
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
プロジェクト名でもあるGeistはドイツ語でMindのことを意味します。このプロジェクトではアイ・ウェアデバイスをはじめとするテクノロ ジーを用いて人間の"Mind"に迫り、”人間を知る”ということを目的に活動しています。
        </p>
      </article>
      <article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">Global Education</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/gedu.jpg');">
          <span class="project--name">Global Education</span>
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
世界中の教育現場をフィールドに、国境を超えグローバルに学びあう環境をテクノロジを使って構築しています。幼稚園、小学校、高校から大学に至るまで、あらゆる世代の人々を対象に「新しい学び」を創出する研究プロジェクトです。 
        </p>
      </article>
      <article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">JST ACCEL Embodied Media Project </h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/emp.jpg');">
          <span class="project--name">Reality Media</span>
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
触原色原理に基づく「触覚」の伝送技術を実用化し、視聴覚と同様にメディアとして扱えるようにすることで、人の能動的な身体的経験を時間・空間を超えて伝える次世代の「身体性メディア」の創出をめざしています。</p>
      </article>
      <article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">SONY × KMD Enchanted Media Project</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/sony.jpg');">
          <span class="project--name">Reality Media</span>
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
身体的経験をより気持ちよく演出・共有する新しいメディアの創出を目指し、日常をドラマティックに記録する傘「Photobrella」と子供部屋に魔法をかける家具「Dramagic」をデザインし開発しました。</p>
      </article>
    </div>
  </div>
</section>

<section class="specialty" id="specialty--anchr">
  <div class="container projects--wrap">
    <div class="row title--row">
      <h1 class="col-xs-2">
        <span class="section--title bg-w">SPECIALITY</span>
      </h1>
    </div>
    <div class="row project--card--area">
      <a href="http://kmd-media.com/"><article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">KMD Journal</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/journal.jpg');">
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
          Forum開催までにまだ世間からは謎の多いKMDをより多くの方に知っていただこうと、KMD Journalを開設しました！KMDとしてJournalismを持ち、KMDのメタ情報から教授たちのコラム、日々の生活、OBOGの活躍、イベント情報まで・・・随時配信中！
          
        </p>
      </article></a>
      <a href="http://kmd-media.com/static/tsunagi">
      <article class="col-xs-12 col-md-4 project--card" >
        <h1 class="card--title">KMD つなぎ女子</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/tsunagi.jpg');">
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
          つなぎと女の子の組み合わせはどうしてこんなにも胸が踊るのか・・・KMD FACTORYのつなぎをつくり、KMDに在学中の女子たちに着せて撮影をしました！ KMDの魅力や研究内容を紹介！Forum当日はつなぎを着た彼女たちに会えるかも?!
    
        </p>
      </article>
      </a>
      <a href="http://kmd-media.com/forum#invitation--anchr">
      <article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">KMD FACTORY COFFEE</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/cofee.jpg');">
        </div>
        <p class="card--desc" style="color:#FFFFFF;">
KMD FACTORYの世界観に合わせて豆を選び、淹れたてのコーヒーを当日ご提供いたします。招待状の登録をしていただくと、１杯無料でサービスさせていただきます！ぜひコーヒーを片手に展示をお楽しみください。
        </p>
      </article>
      </a>
      <!-- <article class="col-xs-12 col-md-4 project--card">
        <h1 class="card--title">KMD FACTORYからの招待状</h1>
        <div class="card--thum" style="background-image:url('https://dl.dropboxusercontent.com/u/31225734/forum/img/invitation.jpg');">
        </div>
        <p class="card--desc" style="color:#FFFFFF;">こちらから簡単にKMD FACTORYの招待状をご登録できます！素敵な特典がたくさんです！当日のスムーズな入場や、コーヒーのサービス、発行した方だけの特別コンテンツの視聴や抽選会の参加など・・・登録するしかないっ！</a>
        </p>
      </article> -->
    </div>
  </div>
</section>
<section class="schedule" id="schedule--anchr">
  <div class="container schedule--wrap">
    <div class="row title--row">
      <h1 class="col-xs-12 col-md-4">
        <span class="section--title bg-b">SCHEDULE</span>
      </h1>
      <p class="col-xs-12 col-md-4" style="color:#FFFFFF; font-size:10px;">
        ※ ゲストのご予定によって、タイムスケジュール・イベント内容は変更になる可能性がございます。ご了承くださいませ。
      </p>
    </div>
    <div class="row sponsors--area">
    <img class="col-md-12 hidden-xs" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/schedule.png">
      <img class="col-xs-12 hidden-md hidden-lg" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/schedule-sp.png">
    </div>
  </div>
</section>
<section class="sponsors" id="sponsors--anchr">
  <div class="container sponsors--wrap">
    <div class="row title--row">
      <h1 class="col-xs-12 col-md-2">
        <span class="section--title bg-w">SPONSORS</span>
      </h1>
    </div>
    <div class="row sponsors--area">
      <img class="col-xs-12" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/sponsors.gif">
    </div>
  </div>
</section>

<section class="meta-info" id="meta--anchr">
  <div class="container meta-info--wrap">
    <div class="row title--row">
      <h1 class="col-xs-12 col-md-2">
        <span class="section--title bg-w">META INFO</span>
      </h1>
    </div>
    <div class="row info--contents">
      <div class="col-xs-12 col-md-7 col-lg-6 info--area">
        <table class="meta-info--table">
          <tr>
            <th>日時 　:　</th>
            <td>2015年11月27・28日（金・土）<br>10:00 〜 18:00</td>
          </tr>
          <tr>
            <th>会場　:　</th>
            <td>五反田　東京デザインセンター - <a href="https://goo.gl/maps/qim1UBAaJaU2">地図アプリで確認する</a><br><p>東京都 品川区東五反田５−２５−１９ <br>東京デザインセンター</p></td>
          </tr>
          <tr>
            <th>アクセス　:　</th>
            <td>JR山手線五反田駅東口より徒歩2分<br>
都営浅草線五反田駅A7出口正面<br>
東急池上線五反田駅より徒歩3分<br>
首都高速2号線目黒ランプ　車3分</td>
          </tr>
        </table>
      </div>
      <div class="col-xs-12 col-md-5 col-lg-6 map--area">
        <img src="https://dl.dropboxusercontent.com/u/31225734/forum/img/map.png" class="wide-img">
      </div>
    </div>
  </div>
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
          KMD FACTORYの工場見学をしませんか？
        </p>
        <p class="inv--desc">こちらから簡単にKMD FACTORYの招待状をご登録いただけます。(所要時間２分)</p>
        <p class="inv--desc">ご登録いただくと、あなただけの４ケタのシリアル番号が発行され、メールでお届けします。</p>
        <p class="inv--desc">さまざまな特典がございますので、KMD FACTORYに行こうと思っている方もまだ迷われている方も、ぜひご登録ください。</p>
        <p class="inv--desc">たくさんのお越しをお待ちしております。</p>
        <div class="row ">
          <ul class="col-xs-12 col-md-10 col-lg-12 invitation-speciality">
            <li class="speciality-list"><img class="speciality-img" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/i-entrance.png"><span class="speciality-desc">当日の入場がスムーズです(当日、お名前等をご記入いただく必要がありません)</span></li>
            <li class="speciality-list"><img class="speciality-img" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/i-cofee.png"><span class="speciality-desc">KMD FACTORY特製のコーヒーを一杯サービス！</span></li>
            <li class="speciality-list"><img class="speciality-img" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/i-cont.png" ><span class="speciality-desc">発行した人だけの特別コンテンツ(KMD教授のコラムや授業動画等)をご覧いただけます!</span></li>
            <li class="speciality-list"><img class="speciality-img" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/i-contact.png"><span class="speciality-desc">KMDの最新情報や開催のリマインドメールが届きます！</span></li>
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
  <div class="smoke"></div>
  <div class="smoke"></div>
  <div class="smoke"></div>
  <div class="smoke"></div>
  <div class="smoke"></div>
  <div class="smoke"></div>
  <div class="smoke"></div>
  <div class="smoke"></div>
  <div class="smoke"></div>
  <div class="smoke"></div>
  <div class="smoke"></div>
  <div class="smoke"></div>
  <div class="smoke"></div>
  <div class="smoke"></div>
  <div class="smoke"></div>
  <div class="smoke"></div>
  <div class="smoke"></div>
  <div class="smoke"></div>
  <div class="smoke"></div>
  <div class="smoke"></div>
  <style type="text/css">
  a{color:#FFFFFF !important;}
  </style>
</body>
</html>