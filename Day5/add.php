<?php
$id = $title = $detail = $writer = $isNotice = $check= $ilbancheck= $hakbucheck = "";
$stat = "쓰기";
if(empty($_GET)){
  $action = "http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/add_ok.php";
}
else{
  $id = $_GET['id'];
  $action = "http://18.216.42.161/phpmyadmin/apmcamp/day4/notice/modify_ok.php?id=$id";
  include("../../inc/config.php");
  $sql = "select * from handonglist where id=$id";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $stat = "수정";

  $title = $row['title'];
  $detail = $row['detail'];
  $writer = $row['writer'];
  $isNotice = $row['isNotice'];
  $file1 = $row['file1'];
  $file2 = $row['file2'];
  $Category = $row['category'];

  if($Category == 'ilban'){
    $ilbancheck = 'checked';
  }
  else{
    $hakbucheck = 'checked';
  }


  if($isNotice=='Y'){
    $check = 'checked';
  }
}
?>


<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ko">
	<head>
    <base href="https://www.handong.edu">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<meta name="dcp" content="menu_no=494" />
		<title>게시글 쓰기</title>
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

<!--여기부터 수정한거-->
<body>
<div>
  <form method = "post" name= "form1" enctype="multipart/form-data" action = <?=$action?>>
			<div class="check">
				<div class="t14">제 &nbsp; &nbsp;  &nbsp;   &nbsp; 목 &nbsp; &nbsp; &nbsp; &nbsp; </div>
				<div><input type= "text" name="title" value="<?=$title?>"></div>

				<div class="t14"> 작 &nbsp; 성 &nbsp; 자 </div>
        <input type= "text" name="writer" value="<?=$writer?>"><br>

        <div class="t14">공 &nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;지 </div>
        <input type = "checkbox" name="isNotice" value = "Y" <?=$check?>><br><br><br>

        <div class="t14">카 &nbsp; &nbsp;  테  &nbsp; &nbsp; 고 &nbsp; &nbsp;리 </div>
        <input type = "checkbox" name="Category" value = "ilban" <?=$ilbancheck?>>일반공지
        <input type = "checkbox" name="Category" value = "hakbu" <?=$hakbucheck?>>대학원공지<br><br><br>

        <div class="t14">첨 &nbsp; &nbsp;  부  &nbsp; &nbsp; 파 &nbsp; &nbsp;일 </div>
        <input type="file" name="fileToUpload1" id="fileToUpload1" value= "<?=$file1?>">
        <input type="file" name="fileToUpload2" id="fileToUpload2" value = "<?=$file2?>">
        <br><br><br>

				<div class="t14">내 &nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;용</div>
				<textarea name="detail"> <?=$detail?></textarea><br>
				<div class="but"><button type="submit" value="submit">쓰기</button></div>

				</div>
			</div>
		</form>
	</body>
</html>
