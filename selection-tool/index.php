<?php
    // Start session
    session_start();

    // Include common functions
    include("../common/functions.php");
	
	// started request would be set here despite unsetting
	unset($_SESSION['started-request']);
	
    // Handle form submission
    if (isset($_POST['next'])) {
        // Store all form values in the session for later use
		foreach ($_POST as $key => $value) {
			$_SESSION['info'][$key] = $value;
		}

		// Remove 'next' value from session
		unset($_SESSION['info']['next']);
		// could use this as a way for other pages to display or not
		// like a validation thingy
		// also will use this for the login/signup stuff later


        // Redirect to the next page
        header("Location: furniture-type.php");
        exit; // Stop further execution after redirection
    }
	
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/selection-tool.css">
    <link rel="stylesheet" href="../styles/mystyles.css">

    <!-- Script for responsive navigation -->
    <script src="../javascript/responsive-nav.js"></script>
    <title>Start Building</title>
</head>

<body>
    <!-- Navigation Section -->
    <nav>
        <?php print_nav(); ?>
    </nav>
    <main>
        <div class="page-container">
            <!-- Header Section -->
            <div class="header-container">
                <div class="title">
                    <h1>Start Building</h1>
                </div>
            </div>

            <!-- Form Section -->
            <div class="selection-tool-container">
                <form action='' method="POST">
                    <div class="nav-controls">

                        <!-- Submit Button -->
                        <input class="btn" type="submit" value="Start" name="next"><br><br><br><br>
						
						<!-- TODO: FIX THIS LAYOUT OF PAGE ITS BAD -->
						<!-- TODO: Might want to make these buttons and just in case unset some stuff -->
						<!-- TODO: Breadcrumbs????? -->
						Have an Account?<br><br>
						<a href='../login/login.php'>Log in here</a><br><br><br>
						or Sign up<br><br>
						<a href='../login/signup.php'>Sign up here</a><br>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <footer>
        <?php print_footer(); ?>
    </footer>
</body>

</html>
