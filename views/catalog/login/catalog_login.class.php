<?php
/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * Name: catalog_login.class.php
 * Description: This class defines the login class for the catalog, allows the user to log in
 */

class CatalogLogin extends CatalogIndexView {
    public function display() {
        parent::displayHeader("Login to Library System");

    $message = "Please enter your username and password to login.";
    //check the login status
    $login_status = '';
    if (isset($_SESSION['login_status']))
        $login_status = $_SESSION['login_status'];

    //the user's last login attempt succeeded
    if ($login_status == 1) {
        echo "<p>You are logged in as " . $_SESSION['login_id'] . ".</p>";
        echo "<a href='", BASE_URL, "/Catalog/logout'>Log out</a><br />";
        include('includes/footer.php');
        exit();
    }

    //the user has just registered
    if ($login_status == 3) {
        echo "<p>Thank you for registering with us. Your account has been created.</p>";
        echo "<a href='", BASE_URL, "/Catalog/logout'>Log out</a><br />";
        include('includes/footer.php');
        exit();
    }
    //the user's last login attempt failed
    if ($login_status == 2) {
        $message = "Username or password invalid. Please try again.";
    }

    if ($login_status == 5) {
        $message = "Your user has been created, please log in.";
    }
    ?>
    <div class="login-container">
        <!-- display the login form -->
        <div class="login">
            <form action="<?= BASE_URL ?>/Catalog/login" method="post">
                <h1>Login to an Existing Account</h1>
                <?php echo '<p>',$message,'</p>' ?>

                <label for="username"><b>Email</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="psw"><b>Password</b></label>
                <input class="indexpass" type="password" placeholder="Enter Password" name="password" required>

                <button type="submit" class="btn">Login</button>
                <br>
                <br>
                <a href="<?= BASE_URL ?>/Catalog/register">Click here to register</a>
            </form>
        </div>
        <!-- display the registration form -->
    </div>
<?php
        parent::displayFooter();
    }
}
