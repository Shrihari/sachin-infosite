<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Shrihari Sankaran - http://shrihari.me/" />
	
	<!-- Site Description and Keywords-->
	<meta name="keywords" content="Sachin Tendulkar" />
	<meta name="description" content="An interactive timeline of Sachin Tendulkar's records." />
	
	<link rel="stylesheet" href="assets/css/normalize.css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto:400" rel="stylesheet" type="text/css">
	<link href="//fonts.googleapis.com/css?family=Arvo:400,700" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet/less" href="assets/css/style.less">

	<script src="assets/js/less.js" type="text/javascript"></script>
	<script src="assets/js/skrollr.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.js" type="text/javascript"></script>
	<script src="assets/js/popup.js" type="text/javascript"></script>
	<script src="assets/js/custom.js" type="text/javascript"></script>

	<title>Sachin Tendulkar - a timeline of records</title>
  
</head>

<body>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=168277226614067";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<div id="intro-container">
		<div id="intro" class="wrap">
			<!-- <img src="assets/img/sachin.png" /> -->
			<h1>Sachin Tendulkar</h1>
			<h2>a <span>leg</span> glance at the legend's history of records</h2>

			<div id="instructions">use <i class="fa fa-toggle-up fa-fw"></i> Up &amp; <i class="fa fa-toggle-down fa-fw"></i> Down keys to navigate</div>
		</div>
	</div>

	<div id="body-container">
		<div id="body" class="wrap">
			<div id="timeline-bg">
				<div id="timeline"
					 data-500="height: 0px;"
					 data-15500="height: 15000px;"></div>
			</div>


			<ul id="events">

<?php
// $row = 1;
if (($handle = fopen("data.csv", "r")) !== FALSE) 
{
    $c = 0;
    $event = 1;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
    {
        // $num = count($data);
        // echo "<p> $num fields in line $row: <br /></p>\n";
        // $row++;
        // for ($c=0; $c < $num; $c++)
        // {
        //     echo $data[$c] . "<br />\n";
        // }

        if($data[1] == 'y')
        {
?>
				<li id="event<?php echo $event++; ?>" class="featured test">

					<div class="date">
						<?php echo date("M j, Y", strtotime($data[0])); ?>
					</div>

					<a href="#" class="anchor">•</a>

					<div class="content">
						<div class="content-inner">
							<div class="trivia">
								<?php echo $data[5]; ?>
							</div>
						</div>
					</div>
				</li>
<?php
        }
        elseif($data[1] == '')
        {
        	/*
?>
				<li class="<?php echo strtolower($data[6]); ?>">
					<a href="#" class="small-anchor"></a>
					<div class="small-content">
						<div class="small-content-inner">
<!-- 							<div class="meta">
								<div class="date"><?php echo $data[0]; ?></div>
								<div class="venue"><?php echo $data[4]; ?></div>
							</div> -->
							<div class="title">
								<span class="score"><?php echo $data[3]; ?></span>
								<small>vs.</small>
								<span class="opponent"><?php echo $data[2]; ?></span>
							</div>
						</div>
					</div>
				</li>
<?php
			*/
        }
        else
        {
?>
				<li id="event<?php echo $event++; ?>" class="featured <?php echo strtolower($data[6]); ?>">

					<div class="date">
						<?php echo date("M j, Y", strtotime($data[0])); ?>
					</div>

					<a href="#" class="anchor"><?php echo ($data[1][0] == 'x' ? '•' : $data[1]); ?></a>

					<div class="content">
						<div class="content-inner">
							<div class="meta">
								<!-- <div class="date"><?php echo $data[0]; ?></div> -->
								<div class="venue"><?php echo $data[4]; ?></div>
							</div>
							<div class="title">
								<span class="score"><?php echo $data[3]; ?></span>
								<small>vs.</small>
								<span class="opponent <?php echo ($data[1] == 'x' ? : 'flag '.str_replace(' ', '-', strtolower($data[2]))); ?>"><?php echo $data[2]; ?></span>
							</div>
							<div class="details">
								<ul>
									<?php 
										$details = explode("\n", $data[5]);

										foreach($details as $detail)
										{
											echo '<li>';

											$d = explode(" ", $detail, 2);

											if($d[0] == "#")
												echo '<i class="fa fa-star fa-fw gold"></i>';
											elseif($d[0] == '*')
												echo '<i class="fa fa-star fa-fw silver"></i>';
											elseif($d[0] == '-')
												echo '<i class="fa fa-caret-right fa-fw bronze"></i>';

											echo $d[1];
											echo '</li>';
										}
									?>

								</ul>
								<div id="image<?php echo $c++; ?>" class="image">
									<?php
									foreach(glob(getcwd().'/assets/images/'.$data[1].'-*.jpg') as $imagename)
									{
									?>
										<a href="<?php echo str_replace(getcwd().'/', '', $imagename); ?>"><img src="assets/images/thumbs/<?php echo $data[1]; ?>.jpg" width="140" height="140" /></a>
									<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</li>
<?php
        }
?>

<?php
    }
    fclose($handle);
}
?>

			</ul>
		</div>
	</div>

	<div id="footer-container">
		<div id="footer" class="wrap">
			<h2>an era comes to an end</h2>
			<h1>Nov. 1989 - Nov. 2013</h1>

			<div id="share">
				<div class="fb-share-button" data-href="http://shrihari.me/sachin/" data-type="button_count"></div>
				<a href="https://twitter.com/share" class="twitter-share-button" data-via="shrihari">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			</div>

			<div id="author">
				crafted with <i class="fa fa-heart fa-fw red"></i> by <a href="http://shrihari.me/">shrihari</a>
			</div>
			<div id="thanks">
				all data from <a href="http://stats.espncricinfo.com/ci/engine/stats/index.html">cricinfo</a>. in case of any error, please email me at iamshrihari@gmail.com
			</div>
		</div>
	</div>

</body>

</html>