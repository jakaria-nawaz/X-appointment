<?php

class GenerateLayout {

	public $title = "";

	function __construct($title) {
		$this->title = $title;
	}


	public function generateHeader($logged_in = NULL) {
		$htmlHeader = '
			<!DOCTYPE html>
			<html>
			<head>
				<title>' . $this->title . '</title>
				<link rel="stylesheet" type="text/css" href="resources/style.css">
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
			</head>
			<body class="body-tag">
				<div class="container">
					<header class="header clearfix page-header">
						<nav>
							<ul class="nav nav-pills float-right">
					            <li class="nav-item">
					              <a target="_blank" class="nav-link active" href="#">Contact<span class="sr-only">(current)</span></a>
					            </li>';
		if ($logged_in != NULL) {
			$htmlHeader .='
								<li class="nav-item">
					              <a class="nav-link" href="?logout=logout">Logout</a>
					            </li>
				          	</ul>
						</nav>
						<h3 class="text-muted">X-Appointment</h3>
					</header>';
		} else {
			$htmlHeader .='
							</ul>
						</nav>
						<h3 class="text-muted">X-Appointment</h3>
					</header>';
		}
					            
		return $htmlHeader;
	} // generateHeader


	public function generateFooter() {
		$htmlFooter = '
				<footer class="footer">
					<p>&copy; X-Appointment 2018</p>
				</footer>
				</div> <!-- end of .container -->
				<script type="text/javascript"></script>
				<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
				</body>
			</html>';
		return $htmlFooter;
	} // generateFooter

} // class ends