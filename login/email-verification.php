<?php
	session_start();

	include("../common/checkconnection.php");
	include("../common/functions.php");
 

    if (isset($_POST["verify_email"]))
    {
        $email = $_POST["email"];
        $verification_code = $_POST["verification_code"];
 
        // mark email as verified
        $sql = "UPDATE login SET VERIFIED_AT = NOW() WHERE EMAIL = '" . $email . "' AND VERIFY_CODE = '" . $verification_code . "'";
        $result  = mysqli_query($conn, $sql);
 
        if (mysqli_affected_rows($conn) == 0)
        {
            die("Verification code failed.");
			header( "refresh:2;url=login.php" );
			die;
        }
 
        echo "<p>You can login now.</p>";
        header( "refresh:5;url=login.php" );
		die;
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/mystyles.css">
    <script src="../javascript/responsive-nav.js"></script>
</head>

<body>
    <nav>
        <?php print_nav(); ?>
    </nav>

    <main>
        <div class="login-container">
            <div class="login-form">
			
			<h1> Verify Email </h1>
				<form method="POST">
					<input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
					<input type="text" name="verification_code" placeholder="Enter verification code" required />
				 
					<input type="submit" name="verify_email" value="Verify Email" class="btn">
				</form>
			</div>
        </div>
    </main>

    <footer>
        <?php print_footer(); ?>
    </footer>
</body>

</html>