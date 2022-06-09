<html>
	<head>
		<title>IT WORKS</title>
	</head>
	<body>
		<h1>Trieur de mêmes</h1>
		<a href=phpinfo.php> pipi </a>
		<?php
			$servername = "localhost";
			$username = "memer";
			$password = "pazo1928";
			// Create connection
			$conn = new mysqli($servername, $username, $password);

			// Check connection
			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
			echo "Connected successfully";
		?>
		<script>
			window.location.href="white.php";
		</script>
	</body>
</html>
