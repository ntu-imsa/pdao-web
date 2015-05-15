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
						<a href="#staff" class="icon fa-group"><span>Staff</span></a>
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
								<div id="scoreboard_table" style="zoom:0.7">

								</div>
								<div id="scroeboard_updated" style="zoom:0.7"></div>
								<script type="text/javascript">
								if (typeof String.prototype.endsWith !== 'function') {
									String.prototype.endsWith = function(suffix) {
								  	return this.indexOf(suffix, this.length - suffix.length) !== -1;
								  };
								}
								var refresh = function(){
									var dateNow = Date.now();
									$.ajax({
									  url: "scoreboard_data.php?" + dateNow
									}).done(function(data) {
									  $("#scoreboard_table").html(data);
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
										$("td:contains('0/--')").removeClass();
									  var dd = new Date(dateNow);
									  $("#scroeboard_updated").html("Last updated: " + dd.toString());
									});
								}
								refresh();
<?php
if(ONLINE == 1){
?>
								setInterval(refresh, 3000);
<?php
}
?>
								</script>
								<section>

								</section>
							</article>


						<!-- Staff -->
							<article id="staff" class="panel">
								<header>
									<h2>Staff</h2>
								</header>
								<p>
									Phasellus enim sapien, blandit ullamcorper elementum eu, condimentum eu elit.
									Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
									luctus elit eget interdum.
								</p>
								<section>
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
								</section>
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

	</body>
</html>
