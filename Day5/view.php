<?php
  $page = "";
  $id = "";
  if(isset($_GET['id'])){
    $id = trim($_GET['id']);
  }
  if(isset($_GET['page'])){
    $page = trim($_GET['page']);
  }

  if ($id==""){
    echo "<script>
      location.href='list.php';
    </script>
    ";
  }
  // DB connection //
  include("../../inc/config.php");

  // select sql //
  $sql = "select * from handonglist where id=$id";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  $title = $row['title'];
  $detail = $row['detail'];
  $writer = $row['writer'];
  $regdate = $row['regdate'];
  $viewcnt = $row['viewcnt'];
  $file1 = $row['file1'];
  $file2 = $row['file2'];
  $viewcnt = $viewcnt + 1;

  $sqlcnt = "update handonglist set viewcnt='$viewcnt' where id = '$id'";
  $conn->query($sqlcnt);
 ?>


 <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
 <html lang="ko">
 	<head>
    <base href="https://www.handong.edu">
 		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
 		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
 		<meta name="dcp" content="menu_no=501" />
 		<title><?=$title?></title>
 		<link rel="shortcut icon" href="/site/handong/res/img/favicon.ico">
 		<link rel="stylesheet" type="text/css" href="/ext/bbs/css/common.dcp" />
 		<link rel="stylesheet" type="text/css" href="/site/handong/res/css/sub.css" />
 		<link rel="stylesheet" type="text/css" href="/res/js/fancybox/2.1.5/jquery.fancybox.css" />
 		<script type="text/javascript" src="/res/js/jquery-1.8.3.js"></script>
 		<script type="text/javascript" src="/res/js/form/3.51.0/form.js"></script>
 		<script type="text/javascript" src="/res/js/dc/1.0.0/dc_validate.js"></script>
 		<script type="text/javascript" src="/res/js/fancybox/2.1.5/jquery.fancybox.js"></script>
 		<script type="text/javascript" src="/res/js/fancybox/2.1.5/helpers/jquery.fancybox-media.js?v=1.0.0"></script>
 		<script type="text/javascript" src="/res/js/scroll-top/1.0.0/top-button.js"></script>
 		<script type="text/javascript" src="/res/js/mobile-check/detectmobilebrowser.js"></script>
 		<script type="text/javascript" src="/res/js/dc/1.0.0/dc.js"></script>
 	</head>
 	<body class="os">

 	<div class="bbs-viwe">
 		<div class="vt1">
 			<div class="t1"><?=$title?>

 			</div>
 			<div>
 				작성자: <?=$writer?> &nbsp;&nbsp;|&nbsp;&nbsp;
 				작성일: <?=$regdate?> &nbsp;&nbsp;|&nbsp;&nbsp;
 				조회: <?=$viewcnt?>
 			</div>
 		</div>



 		<div class="vt2" style="">
 			<p align="center"><span style="font-size: 18px;"><strong><?=$title?></strong></span></p>

 <p align="center">&nbsp;</p>

 <p>
   <?php
      echo $detail;
   ?>
   <br>
   <br>
   <br>
   <br> 첨부파일1: <a href="http://18.216.42.161/phpmyadmin/apmcamp/uploads/<?=$file1?>"><?=$file1?></a><br>
   첨부파일2: <a href="http://18.216.42.161/phpmyadmin/apmcamp/uploads/<?=$file2?>"><?=$file2?></a><br>

 		</div>
 		<div class="but">
 			<a href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/list.php?page=<?=$page?>"><img alt='목록' src="/site/handong/res/img/btn_list.png" onerror="src='/res/img/btn/btn_list.png'"/></a>
 		</div>
    <div class="but">
 			<a href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/delete.php?id=<?=$id?>" onclick="return confirm('정말로 삭제하시겠습니까?');"
><img alt='삭제' src="/site/handong/res/img/btn_del.png" onerror="src='/res/img/btn/btn_list.png'"/></a>
 		</div>
    <div class="but">
 			<a href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/add.php?id=<?=$id?>"><img alt='수정' src="/site/handong/res/img/btn_mod.png" onerror="src='/res/img/btn/btn_list.png'"/></a>
 		</div>

 	</div>

</script>
 	</body>
 </html>
