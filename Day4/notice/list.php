<?php
include("../../inc/config.php");
$page = "";
$filecnt=0;

if(empty($_GET)){
  $page = 1;
}else{
  $page = $_GET['page'];
}
$pagesize = 2;


// 저장된 정보의 총 개수를 가져오는 쿼리 //
$sql2 = "select * from handonglist";
$result2 = $conn->query($sql2);
$totalcnt = $result2->num_rows;

$cnt=ceil($totalcnt/$pagesize);
$initpage=$pagesize*($page-1);

// 한번에 두개씩 가져오는 쿼리 //
$sql = "select * from handonglist order by id desc limit $initpage, $pagesize";
$result1= $conn->query($sql);

// 공지만 가져오는 쿼리 //
$gong = "select * from handonglist where isNotice = 'Y'";
$gong = $conn->query($gong);


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
		<li class="on"><a href="?group=0">전체보기</a></li>
<!-- 나중에 이부분 변수써서 온오프 맨위에서 조건문 설정-->
		<li class="off"><a href="?group=57">일반공지</a></li>

		<li class="off"><a href="?group=55">주요공지</a></li>

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
          <td class="title al"><a href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/view.php?id=<?=$row['id']?>"><?=$row['title'];?> </a></td>
          <td class="dn3 row1" width="10%"><?=$filecnt;?></th>
    			<td class="dn3 row3"><?=$row['writer'];?></td>
    			<td class="dn3 row2"><?=$row['viewcnt'];?></td>
    			<td class="dn3 row4"><?=$row['regdate'];?></td>
    		</tr>
        <?php
          }
        }
    if ($result1->num_rows > 0) {
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

    ?>
		<tr class="td" style="background:#fcfcfc;">
      <th width="10%"><?=$row['id'];?></th>
      <td class="title al"><a href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/view.php?id=<?=$row['id']?>"><?=$row['title'];?> </a></td>
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
	<div class="paging">
		<a class="prev" href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/list.php?page=1"><img src="/site/handong/res/img/bbs-begin.png" onerror="src='/res/img/bbs/bbs-begin.png';" alt="first"></a>
		<a class="prev" href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/list.php?page=
    <?php
    if ($page == 1){
      echo 1;
    }
    else{
      echo $page-1;
    }
    ?>">
    <img src="/site/handong/res/img/bbs-prev.png" onerror="src='/res/img/bbs/bbs-prev.png';" alt="prev"></a>

    <?php
    for ($i=1 ; $i<=$cnt ; $i++){
      if($i == $page){
        $cl = "on";
      }
      else{
        $cl = "off";
      }
      ?>
		<a class=<?=$cl;?> href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/list.php?page=<?=$i;?>"><?=$i;?></a>
    <?php
    }
    ?>


		<a class="next" href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/list.php?page=
    <?php
    if ($page == $cnt){
      echo $cnt;
    }
    else{
      echo $page+1;
    }
    ?>"><img src="/site/handong/res/img/bbs-next.png" onerror="src='/res/img/bbs/bbs-next.png';" alt="next"></a>
		<a class="next" href="http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/list.php?page=<?=$cnt?>"><img src="/site/handong/res/img/bbs-end.png" onerror="src='/res/img/bbs/bbs-end.png';" alt="last"></a>
	</div>

  </body>
</html>
