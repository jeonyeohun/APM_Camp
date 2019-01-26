<?php
include("../../inc/config.php");
$page = "";
$filecnt=0;
$searchtitle = "";
$pagesize = 4;
$Category = "";
$cstat = $cstat1 = $cstat2 = "";

if(isset($_GET['Category'])){
  if(!isset($_GET['page'])){
    $page = 1;
  }else{
    $page = $_GET['page'];
  }
  if ($_GET['Category'] == 'ilban'){
    $Category = $_GET['Category'];
    $sql2 = "select * from handonglist where category = 'ilban'";
    $result2 = $conn->query($sql2);
    $totalcnt = $result2->num_rows;

    $cnt=ceil($totalcnt/$pagesize);
    $initpage=$pagesize*($page-1);

    $sql = "select * from handonglist where category ='ilban' order by id desc limit $initpage, $pagesize";
    $result1= $conn->query($sql);
  }
  else{
    $Category = $_GET['Category'];
    $sql2 = "select * from handonglist where category ='hakbu'";
    $result2 = $conn->query($sql2);
    $totalcnt = $result2->num_rows;

    $cnt=ceil($totalcnt/$pagesize);
    $initpage=$pagesize*($page-1);

    $sql = "select * from handonglist where category ='hakbu' order by id desc limit $initpage, $pagesize";
    $result1= $conn->query($sql);
  }
  if($page==1){
    // 공지만 가져오는 쿼리 //
    $gong = "select * from handonglist where isNotice = 'Y'";
    $gong = $conn->query($gong);
  }
}else{
    if(!isset($_GET['page'])){
      $page = 1;
    }else{
      $page = $_GET['page'];
    }

    if(isset($_GET['searchtitle'])) {
      $searchtitle = $_GET['searchtitle'];
      $sql2 = "select * from handonglist where title like '%$searchtitle%'";
      $result2 = $conn->query($sql2);
      $totalcnt = $result2->num_rows;

      $cnt=ceil($totalcnt/$pagesize);
      $initpage=$pagesize*($page-1);

      $sql = "select * from handonglist where title like '%$searchtitle%' order by id desc limit $initpage, $pagesize";
      $result1= $conn->query($sql);


    }else{
    // 저장된 정보의 총 개수를 가져오는 쿼리 //
      $sql2 = "select * from handonglist";
      $result2 = $conn->query($sql2);
      $totalcnt = $result2->num_rows;

      $cnt=ceil($totalcnt/$pagesize);
      $initpage=$pagesize*($page-1);

      // 한번에 두개씩 가져오는 쿼리 //
      $sql = "select * from handonglist order by id desc limit $initpage, $pagesize";
      $result1= $conn->query($sql);
    }

    if($page==1){
      // 공지만 가져오는 쿼리 //
      $gong = "select * from handonglist where isNotice = 'Y'";
      $gong = $conn->query($gong);
    }
  }
?>


<html>
  <head>
    <head>
      <base href="https://www.handong.edu">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<meta name="dcp" content="menu_no=501" />
		<title>공지게시판</title>
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
  <body>

<div class="bbs-list">
	<ul class="bbs_tab" style="margin-bottom:20px;">
    <?php
      if ($Category == 'ilban'){
        $cstat1 = "on";
      }
      elseif ($Category == 'hakbu'){
        $cstat2 = "on";
      }
      else{
        $cstat = "on";
      }
     ?>

		<li class=<?=$cstat?>><a href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/list.php">전체보기</a></li>
    <li class=<?=$cstat1?>><a href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/list.php?Category=ilban">일반공지</a></li>
    <li class=<?=$cstat2?>><a href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/list.php?Category=hakbu">대학원공지</a></li>

	</ul>


	<table class="list">
		<tr class="th">
			<th width="10%">번호</th>
			<th>제목</th>
			<th class="dn3 row1" width="10%">첨부파일</th>
			<th class="dn3 row3" width="10%">작성자</th>
			<th class="dn3 row2" width="10%">조회수</th>
			<th class="dn3 row4" width="20%">등록일</th>
		</tr>

    <?php
    if($page == 1){
      if ($gong->num_rows > 0) {
        while($row = $gong->fetch_assoc()){
          if(!empty($row['file1']) and !empty($row['file2'])){
            $filecnt=2;
          }
          elseif(!empty($row['file1']) or !empty($row['file2'])){
            $filecnt=1;
          }
          else{
            $filecnt="";
          }
          ?>
      		<tr class="td" style="background:#fcfcfc;">
            <td class="gong" style="color:#00467c; font-weight:bold;">공지</td>
            <td class="title al"><a href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/view.php?id=<?=$row['id']?>&page=<?=$page?>"><?=$row['title'];?> </a></td>
            <td class="dn3 row1" width="10%"><?=$filecnt;?></th>
      			<td class="dn3 row3"><?=$row['writer'];?></td>
      			<td class="dn3 row2"><?=$row['viewcnt'];?></td>
      			<td class="dn3 row4"><?=$row['regdate'];?></td>
      		</tr>
          <?php
            }
          }
      }
    if ($result1->num_rows > 0) {
      $numbering = $totalcnt-(($page-1)*$pagesize)+1;
      while($row = $result1->fetch_assoc()){
        if(!empty($row['file1']) and !empty($row['file2'])){
          $filecnt=2;
        }
        elseif(!empty($row['file1']) or !empty($row['file2'])){
          $filecnt=1;
        }
        else{
          $filecnt="";
        }

        $numbering -=1;
    ?>
		<tr class="td" style="background:#fcfcfc;">
      <th width="10%"><?=$numbering?></th>
      <td class="title al"><a href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/view.php?id=<?=$row['id']?>&page=<?=$page?>"><?=$row['title'];?> </a></td>
      <td class="dn3 row1" width="10%"><?=$filecnt;?></th>
			<td class="dn3 row3"><?=$row['writer'];?></td>
			<td class="dn3 row2"><?=$row['viewcnt'];?></td>
			<td class="dn3 row4"><?=$row['regdate'];?></td>
		</tr>
    <?php

        }
      }
     ?>
	</table>

  <a href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/add.php"<button type="button"> 쓰기 </botton></a>
<script type="text/javascript">
	$(document).ready(function() {
		$(window).resize(function() {
			var myWidth = $(".bbs-list .list").css("width").split("px")[0] / 2;
			$(".bbs-list .title").css("max-width" , myWidth + "px");
		});

		$(window).resize();
	});
</script>

  <!--페이지 번호 설정-->
	<div class="paging" style="margin">

    <?php
    if ($page<$cnt){
      ?>
      <a class="prev" href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/list.php?page=1&searchtitle=<?=$searchtitle?>"><img src="/site/handong/res/img/bbs-begin.png" onerror="src='/res/img/bbs/bbs-begin.png';" alt="first"></a>
    <?php }?>


    <?php
    if ($page>1){
      ?>
      <a class="prev" href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/list.php?page=<?=$page-1;?>&searchtitle=<?=$searchtitle?>"><img src="/site/handong/res/img/bbs-prev.png" onerror="src='/res/img/bbs/bbs-prev.png';" alt="prev"></a>
    <?php }?>

    <?php
    for ($i=1 ; $i<=$cnt ; $i++){
      if($i == $page){
        $cl = "on";
      }
      else{
        $cl = "off";
      }
      ?>
		<a class=<?=$cl?> href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/list.php?page=<?=$i?>&searchtitle=<?=$searchtitle?>"><?=$i;?></a>
    <?php
    }
    ?>



    <?php
    if ($page<$cnt){
      ?>
      <a class="next" href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/list.php?page=<?=$page+1?>&searchtitle=<?=$searchtitle?>"><img src="/site/handong/res/img/bbs-next.png" onerror="src='/res/img/bbs/bbs-next.png';" alt="next"></a>
    <?php }?>


    <?php
    if ($page<$cnt){
      ?>
      <a class="next" href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/list.php?page=<?=$cnt?>&searchtitle=<?=$searchtitle?>"><img src="/site/handong/res/img/bbs-end.png" onerror="src='/res/img/bbs/bbs-end.png';" alt="last"></a>
    <?php }?>
	</div>

  <!-- 검색창 -->
  <div syle="margin-left:30px;">
    <form method="get" action="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/list.php">
      <input type= "text" name="searchtitle">
      <input type="submit" value="검색" width = "30px">
    </form>
  </div>
  </body>
</html>
