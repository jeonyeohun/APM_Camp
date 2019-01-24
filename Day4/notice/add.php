<?php
$id = $title = $detail = $writer = $isNotice = $check = "";

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

  $title = $row['title'];
  $detail = $row['detail'];
  $writer = $row['writer'];
  $isNotice = $row['isNotice'];

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
		<title>한동대학교</title>
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
<style>
  .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
</style>
	</head>




				</div>
			</div>
			<div id="m_head">









<style>
	.m_on {display:none;}
	@media only screen and (max-width:1024px) {
		.m_no {display:none;}
	}
	@media only screen and (max-width:860px) {
		.m_off {display:none;}
		.m_on {display:inline-block;}
		#my {display:none;}
	}
</style>



<script type="text/javascript">
	$(".menu .gnb_s").click(function () {
		if ("none" == $("#m_head .search").css("display")) {
			$(".search").slideDown();
			$(".m_gnb").slideUp();
		} else {
			$(".search").slideUp();
		}
	});

	$(".menu .on").click(function () {
		if ("none" == $(".m_gnb").css("display")) {
			$(".m_gnb").slideDown();
			$(".search").slideUp();
		} else {
			$(".m_gnb").slideUp();
		}
	});

	$(".m_gnb .m_menu div").click(function () {
		if ("none" == $(this).next().css("display")) {
			$(".m_gnb .m_menu div").removeClass("on");
			$(this).addClass("on");
			$(".m_gnb .m_menu ul").slideUp();
			$(this).next().slideDown();
		} else {
			$(this).next().slideUp();
		}
	});

	$(window).resize(function() {
		if ($(".m_gnb").css("display") != "none") {
			if (1024 < $("#head").css("width").replace("px", "")) {
				$(".m_gnb").css("display", "none");
			}
		}
   	});
</script>

			</div>





</script>

<!--여기부터 수정한거-->
<div>
  <form method = "post" name= "form1" enctype="multipart/form-data" action = <?=$action?>>
			<div class="check">
				<div class="t14">제 &nbsp; &nbsp;  &nbsp;   &nbsp; 목 &nbsp; &nbsp; &nbsp; &nbsp; </div>
				<div><input type= "text" name="title" value="<?=$title?>"></div>

				<div class="t14"> 작 &nbsp; 성 &nbsp; 자 </div>
        <input type= "text" name="writer" value="<?=$writer?>"><br>

        <div class="t14">공 &nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;지 </div>
        <input type = "checkbox" name="isNotice" value = "Y" <?=$check?>><br><br><br>

        <div class="t14">첨 &nbsp; &nbsp;  부  &nbsp; &nbsp; 파 &nbsp; &nbsp;일 </div>
        <input type="file" name="fileToUpload1" id="fileToUpload1">
        <input type="file" name="fileToUpload2" id="fileToUpload2">
        <br><br><br>

				<div class="t14">내 &nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;용</div>
				<textarea name="detail"> <?=$detail?></textarea><br>
				<div class="but"><button type="submit" value="submit">쓰기</button></div>

				</div>
			</div>
		</form>



</div>

</div>


</div>

<script type="text/javascript">
	$(".qlink .on").click(function () {
		if ("block" == $(".qlink .top").css("display")) {
			$(".qlink .top").fadeToggle(1);
// 			$("#tail .qlink .socialize .on").css({"transform" : "rotate(0deg)" , "transition" : "transform 0.1s"});
			$("#tail .qlink .socialize .on").css("transform" , "rotate(0deg)");
		} else {
			$(".qlink .top").fadeToggle(1);
// 			$("#tail .qlink .socialize .on").css({"transform" : "rotate(180deg)" , "transition" : "transform 0.5s"});
			$("#tail .qlink .socialize .on").css("transform" , "rotate(180deg)");
		}
	});
</script>
			</div>

		</div>
		<script type="text/javascript">
			$(document).ready(function() {
				if (jQuery.browser.mobile) {
					$(".print").css("display", "none");
				} else {
/*
					$(".ibook").fancybox({
				 		height: '95%',
						autoWidth: true,
						autoHeight: true,
				 		openEffect: 'elastic',
				 		closeEffect: 'elastic'
				 	});
*/
				}

				var filter = "win16|win32|win64|mac";
				if (navigator.platform){
					if (filter.indexOf(navigator.platform.toLowerCase())<0 ){
						$(".sub .mw").each(function(index) {
							$(this).wrap("<a href='"+this.src+"' target='_blank'></a>");
						});
					}
				}

			});
		</script>







<script type="text/javascript">
	$(function() {
		$.ajax({
			'url': '/dcp/log/putlog.dcp',
			'data': {'menu': 494},
			'success': function(result) {
				//alert(result);
			},
			'error': function(xhr) {
				//alert(xhr.message);
			}
		});
	});
</script>
	</body>
</html>
