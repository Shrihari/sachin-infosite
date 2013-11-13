<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Shrihari Sankaran - http://shrihari.me/" />
	
	<!-- Site Description and Keywords-->
	<meta name="keywords" content="Sachin Tendulkar" />
	<meta name="description" content="Career timeline of Sachin Tendulkar." />
      	
	<link href="assets/favicon.ico" rel="shortcut icon">
	
	<link rel="stylesheet" href="assets/css/normalize.css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet/less" href="assets/css/style.less">

	<script src="assets/js/less.js" type="text/javascript"></script>
	<script src="assets/js/jquery.js" type="text/javascript"></script>
	<script src="assets/js/popup.js" type="text/javascript"></script>
	<script src="assets/js/custom.js" type="text/javascript"></script>

	<title>Sachin Tendulkar - a timeline</title>
  
</head>

<body>

	<div id="intro-container">
		<div id="intro" class="wrap">
			<img src="assets/img/sachin.png" />
			<h1>Sachin Tendulkar</h1>
			<h2>a <span>leg</span> glance at the legend's cricketing career</h2>
		</div>
	</div>

	<div id="body-container">
		<div id="body" class="wrap">
			<div id="timeline-bg">
				<div id="timeline"></div>
			</div>


			<ul id="events">

<?php
// $row = 1;
if (($handle = fopen("data.csv", "r")) !== FALSE) 
{
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
				<li class="featured test">
					<a href="#" class="anchor">•</a>

					<div class="content">
						<div class="content-inner">
							<div class="meta">
								<div class="date"><?php echo $data[0]; ?></div>
							</div>
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
?>
				<li class="<?php echo strtolower($data[6]); ?>">
					<a href="#" class="small-anchor"></a>
					<div class="small-content">
						<div class="small-content-inner">
							<div class="meta">
								<div class="date"><?php echo $data[0]; ?></div>
								<div class="venue"><?php echo $data[4]; ?></div>
							</div>
							<div class="title">
								<span class="score"><?php echo $data[3]; ?></span>
								<small>vs.</small>
								<span class="opponent"><?php echo $data[2]; ?></span>
							</div>
						</div>
					</div>
				</li>
<?php
        }
        else
        {
?>
				<li class="featured <?php echo strtolower($data[6]); ?>">
					<div id="image1" class="image">
						<a href="assets/images/1-2.jpg"><img src="assets/images/1-2.jpg" width="150" height="150" /></a>
						<a href="assets/images/1.jpeg"><img src="assets/images/1.jpeg" width="150" height="150" /></a>
					</div>

					<a href="#" class="anchor"><?php echo ($data[1] == 'x' ? '•' : $data[1]); ?></a>

					<div class="content">
						<div class="content-inner">
							<div class="meta">
								<div class="date"><?php echo $data[0]; ?></div>
								<div class="venue"><?php echo $data[4]; ?></div>
							</div>
							<div class="title">
								<span class="score"><?php echo $data[3]; ?></span>
								<small>vs.</small>
								<span class="opponent"><?php echo $data[2]; ?></span>
							</div>
							<div class="details">
								<ul>
									<?php echo $data[5]; ?>
								</ul>
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

</body>

</html>