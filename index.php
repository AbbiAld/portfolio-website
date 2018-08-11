<?php 

	// reCaptcha info
	$secret = "6Ld8hWkUAAAAAEATVGl8NLh2EFu4XUJlshIA4J7U";
	$remoteip = $_SERVER["REMOTE_ADDR"];
	$url = "https://www.google.com/recaptcha/api/siteverify";

	$response = $_POST["g-recaptcha-response"];

	// Curl Request
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, array(
	    'secret' => $secret,
	    'response' => $response,
	    'remoteip' => $remoteip
	    ));
	$curlData = curl_exec($curl);
	curl_close($curl);

	// Parse data
	$recaptcha = json_decode($curlData, true);

	if ($recaptcha["success"]) {
		$name = $_POST['user_name'];
		$email = $_POST['user_email'];
		$message = $_POST['user_message'];
		$body = "From: $name \n Email: $email \n Message:\n $message";
		$recipient = "abbi.aldrich@gmail.com";
		$subject = "Contact Form Submission";
		$from = "Contact Form User Submission";

	

	if (mail($recipient, $subject, $body, $from)) {
			$result= '<div class="alert alert-success">Thank You! I will be in touch shortly.</div>';
		} else {
			$result = '<div class="alert alert-danger"><p> Sorry there was an error sending your message. Please try again later</p></div>';
		}
		
	}

	?>

<!DOCTYPE html>
<html lang=en>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Abbi Aldrich's Portfolio</title>
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great|Open+Sans+Condensed:300,700" rel="stylesheet">
		<script src='https://www.google.com/recaptcha/api.js' async defer></script>
		<script>
        function onSubmit(data) {
            document.getElementById("form").submit(); 
            grecaptcha.execute();
        }
    </script>
	</head>
	<body>
		<!--Header-->
		<header>
			<div class="full-width vertical-column">

			<!--Navigation-->
			<nav>
				<ul>
					<li><a href=#about>About</a></li>
					<li><a href=#work>Work</a></li>
					<li><a href="https://blog.abbialdrich.com">Blog</a></li>
					<li><a href=#contact>Contact</a></li>
				</ul>
			</nav>

			<h1>Abbi Aldrich</h1>
			<h5>Front-End Web Developer<br>
			Dallas, TX</h5>
			<div id="scroll">
				<p>Scroll down</p>
				<a href=#about><img src="img/down-arrow.png" alt="Down Arrow"></a>
			</div>

			</div>
		</header>
		
		<!--About-->
		<section id="about">
			<div class="full-width" >
			<h2>I bring beautiful designs to life.</h2>
			<div class="horizontal-row">
				<div class="half-width">
					<p>Hi, I’m Abbi Aldrich, a front-end web developer based in Dallas.  My journey into the tech world was inspired by a deep love of making things that work well.  And that’s exactly what I bring to coding - writing clean code that works.  With a background in Education and Linguistics, I believe that communication is key to successful relationships with clients, users, and collaborators.</p>
				</div>

				<div class="half-width">
					<p>I take mockups and psd designs and bring them to life with HTML, CSS, and JS interactivity.  I also create custom WordPress sites that help your business or organization grow. First and foremost, I keep user experience at the heart of my work, finding creative solutions that can be used time and time again. </p>
					<p>Check out projects I’ve worked on below.<br>
					<img id="about-arrow" src="img/blue-down-arrow.png" alt="Down Arrow" >
					</p>
				</div>
			</div>
		</div>
		</section>

		<!--Work-->
		<section id="work">
		<div class="full-width">
			<h2>Work</h2>
			<div class="horizontal-row">
				<div class="third-width">
					<a class="work-sample" href="https://accelerate.abbialdrich.com">
						<figure class="work-sample-img">
							<img src="img/work-sample-accelerate.jpg" alt="Accelerate Marketing Concept Site" />
							<div class="sample-description">
								<h4 class="sample-header">Accelerate Marketing</h4>
								<p>A complete custom re-design I created for Accelerate Marketing - a sample client, including a custom WordPress theme. </p>
								<p class="skills">Created using Wordpress, HTML, and CSS</p>
						</div>
						</figure>
					</a>
				</div>
				<div class="third-width">
					<a class="work-sample" href="https://blog.abbialdrich.com">
						<figure class="work-sample-img">
							<img src="img/work-sample-blog-2.jpg" alt="Blog at abbialdrich.com" />
							<div class="sample-description">
								<h4 class="sample-header">blog.abbialdrich.com</h4>
								<p>My personal blog, created as a concept project and customized for my own uses.</p>
								<p class="skills">Created using WordPress, HTML, and CSS</p>
							</div>
						</figure>

					</a>
				</div>
				<div class="third-width">
					<a class="work-sample" href="https://roguepickings.abbialdrich.com">
						<figure class="work-sample-img">
							<img src="img/work-sample-rp.jpg" alt="Rogue Pickings Concept Site" />
							<div class="sample-description">
								<h4 class="sample-header">Rogue Pickings</h4>
								<p>A fully responsive concept site for a small food truck business.</p>
								<p class="skills"> Created using HTML and CSS</p>
							</div>
						</figure>
					</a>
				</div>
			</div>
		</div>
		</section>

		<!--Contact-->
		<section id="contact">
			<div class="full-width">
				<h2>Contact</h2>
				<div class="horizontal-row">
				<div class="half-width">
					<h3>I'd love to hear from you</h3>
					<h5> I'm excited to hear about your next project.<br>
					I'm also available for full-time employment in Dallas, Texas.</h5>
					<h4>Leave me a quick note, shoot me an email, or find me online.</h4>
					<div class="socialmedia-btns">
						<a id="github-btn" href="https://github.com/AbbiAld "><img src="img/github-icon.png" alt="GitHub Icon"></a>
						<a id="insta-btn" href="https://www.instagram.com/abbi.aldrich/"><img src="img/instagram-icon.png" alt="Instagram Icon"></a>
						<a id="linkedin-btn" href="https://www.linkedin.com/in/abigail-aldrich-5496b387/"><img src="img/linkedin-icon.png" alt="Linkedin Icon"></a>
					</div>
				</div>

				<div class="half-width">
					<form id="form" name="contact-form" method="post" action="index.php#form">
						<div>
							<input type="text" id="name" name="user_name" required placeholder="Your Name">
						</div>
						<div>
							<input type="email" id="email" name="user_email" required placeholder="Your Email">
						</div>
						<div>
							<textarea id="msg" name="user_message" required placeholder="Write a message"></textarea>
						</div>
						<button id="submit-btn" class="g-recaptcha" data-sitekey="6Ld8hWkUAAAAABlqd-GBXB1-X6JxSEnPy2q9-hMb" data-callback="onSubmit" data-size="invisible">
    					Send
						</button>
						<div id="result">
							<?php echo $result; ?>
						</div>
					</form>
				</div>
			</div>
		</div>
		</section>

		<!--Footer-->
		<footer>
			<div class="full-width">
			<p>Abbi Aldrich  &bull;  abbi.aldrich [at] gmail [dot] com</p>
		</div>
		</footer>

	</body>
</html>