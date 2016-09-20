<?php 
	/* Standard Variables
	-------------------------*/
	$n0="\n"; $n1=$n0."\t"; $n2=$n1."\t"; $n3=$n2."\t"; $n4=$n3."\t"; $n5=$n4."\t"; $n6=$n5."\t";

	$errName ='';
	$errEmail = '';
	$errMessage ='';
	$errHuman ='';
	$result ='';
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$headers = 'From: webmaster@tristanjesse.com' . "\r\n";
		$to = 'tristanljesse@gmail.com';

		$subject = "TristanJesse.com Contact Form";
		
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		if (!$_POST['email']) {
			$errEmail = 'Please enter a valid e-mail';
		}
		
		if (!$_POST['message']) {
			$errMessage = 'Please enter a message';
		}

		if ($human !== 23){
			$errHuman = 'Your answer is not correct';
		}
		
		if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
			$body = "From: $name\n Email: $email\n Message: $message";
			$headers .= 'Cc: ' . "$email" . "\r\n";

			if (mail ($to, $subject, $body, $headers)) {
				$result='<div class="alert alert-success">Thank you! I will get back to you as soon as possible!</div>';
			} else {
				$result='<div class="alert alert-danger">There was an error sending your message, sorry! Please try again later</div>';
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA=Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Tristan Jesse Design | Contact. Get in touch for help with a project, questions about my work or if you just want to say hello.">
	<meta name="author" content="Tristan Jesse">
	<meta name="keywords" content="web development, web, development, programming, engineering, computer, electronics, design, web design, web design services, developer, wordpress, html, html5, javascript, node, mongo, php, sql, mysql"

	<link rel="icon" href="">
	<meta property="og:site_name" content="Tristan Jesse Design">
	<meta property="og:title" content="Electronic Design, Programming and Web Development">
	<meta property="og:url" content="http://www.tristanjesse.com">
	<meta property="og:type" content="website">

	<title>Tristan Jesse Design | Contact</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" >
	<script type="text/javascript" src="js/jquery.min.js"></script>
  </head>
  <body id="page">
  	<div role="navigation" class="nav navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" class="navbar-toggle collapsed">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">
					<img alt="Tristan Jesse" class="img-responsive">
				</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="./">Home</a></li>
					<li><a class="smoothScroll" href="./portfolio.html">Portfolio</a></li>
					<li><a class="smoothScroll" href="#contact">Contact</a></li>
				</ul>
			</div>
		</div>
	</div>

  	<div id="wrap">
		<div id="includedContent"></div>
		<div class="jumbotron">
	      <div class="container">
	        <h1>Contact Me</h1>
	      </div>
	    </div>

  	<div class="container">
  		<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<form class="form-horizontal" role="form" method="post" action="contact.php" name="contact">
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">Name</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php if(isset($name)) {echo htmlspecialchars($_POST['name']);} ?>">
								<?php echo "<span class='text-danger'>$errName</span>";?>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-5">
								<input type="email" class="form-control" id="email" name="email" placeholder="yourEmail@domain.com" value="<?php if(isset($email)) {echo htmlspecialchars($_POST['email']);} ?>">
								<?php echo "<span class='text-danger'>$errEmail</span>";?>
							</div>
						</div>
						<div class="form-group">
							<label for="message" class="col-sm-2 control-label">Message</label>
							<div class="col-sm-9">
								<textarea class="form-control" rows="4" id="message" name="message" placeholder="Please type your message here"></textarea>
								<?php echo "<span class='text-danger'>$errMessage</span>";?>
							</div>
						</div>
						<div class="form-group">
							<label for="human" class="col-sm-2 control-label">44 - 21 = ?</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="human" name="human" placeholder="Answer" value="">
								<?php echo "<span class='text-danger'>$errHuman</span>";?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-9 col-sm-offset-2">
								<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary btn-lg">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-9 col-sm-offset-2">
								<?php echo $result; ?>
							</div>
						</div>
					</form>
				</div>
			</div>
		<div class="container">

			<div class="push"></div>
		</div>
	</div> <!-- wrapper -->

	<div id="footerContent"></div>
	<script src="js/bootstrap.min.js"></script>
  </body>
</html>