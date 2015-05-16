<?php
	include 'config.php';
?><!DOCTYPE HTML>
<html>
	<head>
		<title>NTUIM PDAO 2015 - 台大資管系 程式設計與最佳化競賽</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper-->
			<div id="wrapper">

				<!-- Nav -->
					<nav id="nav">
						<a href="#me" class="icon fa-home active"><span>Home</span></a>
						<a href="#scoreboard" class="icon fa-bar-chart"><span>Scoreboard</span></a>
						<a href="#credits" class="icon fa-group"><span>Credits</span></a>
<!--						<a href="#contact" class="icon fa-envelope"><span>Contact</span></a> -->
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Me -->
							<article id="me" class="panel">
								<header>
									<h1>NTUIM PDAO 2015</h1>
									<p>
										台大資管系 程式設計與最佳化競賽<br><br>
										<span style="font-size: 0.6em; line-height: 10%">
											時間：2015/05/17 09:00 ~ 17:00<br>
											地點：台大管院電腦教室<br>
											主辦：PDOGS Dev.，協辦：台大資管系
										</span>
									</p>
								</header>
								<a href="#scoreboard" class="jumplink pic">
									<span class="arrow icon fa-chevron-right"><span>Scoreboard!</span></span>
									<img src="images/me.png" alt="" />
								</a>
							</article>

						<!-- Work -->
							<article id="scoreboard" class="panel">
								<header>
									<h2>Scoreboard</h2>
								</header>
								<div id="scoreboard_table" style="zoom:0.6"><span style="font-size: 3200px">&nbsp;</span></div>
								<div id="scoreboard_updated" style="zoom:0.6"></div>
<?php
if(ONLINE == 1){
?>
<br>
								<h2>Realtime Chat for Audiences</h2>
								<div id="pdao_chat"></div>
<?php
}
?>
								<script type="text/javascript">
								if (typeof String.prototype.endsWith !== 'function') {
									String.prototype.endsWith = function(suffix) {
								  	return this.indexOf(suffix, this.length - suffix.length) !== -1;
								  };
								}
								var teams = ['','梵平與梵平的快樂小夥伴', 'IM Hungry', '吃吃又吃吃，比賽當飯局', '暗黑霸破墮天倦哥安', '泰師拉茶', '我一不小心就', '程設助教與他快樂的夥伴們', '2分的逆襲', '小小兵好可愛', '不放手直到夢想到手', '我好喜歡香菇', '看到PDAO就更絕望啦', '英國藍你為什麼要欺騙我的感情', '林翰伸是小拉機', '丁丁4M', '不放手 直到AC到手', '智能吃飯糰'];	
								var refresh = function(){
									var dateNow = Date.now();
									$.ajax({
									  url: "scoreboard_data.php?" + dateNow
									}).done(function(data) {
									 	$("#scoreboard_table").html(data);
										for(var i = teams.length - 1; i > 0; i--){
											$("td:contains('team"+i+"')").html('team ' + i + ' - '  + teams[i]);
										}
										$("td").addClass('score-red');
										$("td:contains('/')").removeClass('score-red').addClass('score-green');
										for(var i = 1; i <= 4; i++){
											$("tr td:nth-child(" + i + ")").removeClass();
										}
										$("tr td:nth-last-child(1)").removeClass();
										$("tbody tr:nth-last-child(1) td").removeClass();
										$("tbody tr:nth-last-child(2) td").removeClass();
										$("tbody tr:nth-last-child(3) td").removeClass();
										$("tbody tr:nth-last-child(4)").empty();
										var cols = $("#scoreboard_table").find('tr')[0].cells.length;
										var rows = $('#scoreboard_table tr').length;
										for(var i = 5; i < cols; i++){
											var first_ac = $("tbody tr:nth-last-child(2) td:nth-child(" + i + ")").html();
											for(var j = 2; j < rows - 3; j++){
												if($("tbody tr:nth-child(" + j + ") td:nth-child(" + i + ")").html().endsWith("/" + first_ac)){
													$("tbody tr:nth-child(" + j + ") td:nth-child(" + i + ")").removeClass().addClass('score-first');
												}
											}
										}
										$("td:contains('/--')").removeClass().addClass('score-red');
										$("td:contains('0/--')").removeClass();
									  var dd = new Date(dateNow);
									  $("#scoreboard_updated").html("Last updated: " + <?php echo (ONLINE == 1 ? "dd.toString()" : '"'.LAST_UPDATE_TIME.'"'); ?>);
									});
								}
								refresh();
<?php
if(ONLINE == 1){
	echo 'setInterval(refresh, 3000);';
?>
	$('#pdao_chat').html('<iframe src="<?=CHAT_URL ?>" style="width: 100%; height: 500px"></iframe>');
<?php
}
?>
								</script>
								<section>

								</section>
							</article>


						<!-- Staff -->
							<article id="credits" class="panel">
								<header>
									<h2>Credits</h2>
								</header>
								<p>
									Advisor: rrro<br>
									Organizer: bonnie<br>
									Problems: bigelephant29, rilak<br>
									Verifications: arbuztw, c2251393, eddy1021, magrady24, music960633, tzupengwang<br>
									Website: shouko
								</p>
<!--								<section>
									<div class="row">
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic01.jpg" alt=""></a>
										</div>
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic02.jpg" alt=""></a>
										</div>
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic03.jpg" alt=""></a>
										</div>
									</div>
									<div class="row">
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic04.jpg" alt=""></a>
										</div>
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic05.jpg" alt=""></a>
										</div>
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic06.jpg" alt=""></a>
										</div>
									</div>
									<div class="row">
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic07.jpg" alt=""></a>
										</div>
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic08.jpg" alt=""></a>
										</div>
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic09.jpg" alt=""></a>
										</div>
									</div>
									<div class="row">
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic10.jpg" alt=""></a>
										</div>
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic11.jpg" alt=""></a>
										</div>
										<div class="4u">
											<a href="#" class="image fit"><img src="images/pic12.jpg" alt=""></a>
										</div>
									</div>
								</section> -->
							</article>

						<!-- Contact -->
<!--							<article id="contact" class="panel">
								<header>
									<h2>Contact Me</h2>
								</header>
								<form action="#" method="post">
									<div>
										<div class="row">
											<div class="6u">
												<input type="text" name="name" placeholder="Name" />
											</div>
											<div class="6u">
												<input type="text" name="email" placeholder="Email" />
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<input type="text" name="subject" placeholder="Subject" />
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<textarea name="message" placeholder="Message" rows="8"></textarea>
											</div>
										</div>
										<div class="row">
											<div class="12u">
												<input type="submit" value="Send Message" />
											</div>
										</div>
									</div>
								</form>
							</article>
-->

					</div>

				<!-- Footer -->
					<div id="footer">
						<ul class="copyright" style="font-weight: 600; text-shadow: 1px 1px 1px black">
							<li>&copy; Deptartment of Information Management, National Taiwan University</li><li>Design: HTML5up.net</a></li>
						</ul>
					</div>

			</div>
<script type="text/javascript">
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-45786123-2', 'auto');
 
	ga('send', 'pageview');
</script>

	</body>
</html>
