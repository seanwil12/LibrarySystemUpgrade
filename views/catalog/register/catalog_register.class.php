<?php
/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * Name: catalog_out.class.php
 * Description: This class defines the logout class for the catalog, allows uers to log out
 */

class CatalogRegister extends CatalogIndexView {
    public function display() {
        parent::displayHeader("Register with the Library System");
        $message = "Please enter your username and password to login.";
//check the login status
        $login_status = '';
        if (isset($_SESSION['login_status']))
            $login_status = $_SESSION['login_status'];

//the user's last login attempt succeeded
        if ($login_status == 1) {
            echo "<p>You are logged in as " . $_SESSION['login_id'] . ".</p>";
            echo "<a href='logout.php'>Log out</a><br />";
            include ('includes/footer.php');
            exit();
        }

//the user has just registered
        if ($login_status == 3) {
            echo "<p>Thank you for registering with us. Your account has been created.</p>";
            echo "<a href='", BASE_URL, "/Catalog/logout'>Log out</a><br />";
            include ('includes/footer.php');
            exit();
        }
//the user's last login attempt failed
        if($login_status == 2) {
            $message = "Username or password invalid. Please try again.";
        }
        ?>
        <!-- display the registration form -->
        <div class="registration">
            <form action="<?= BASE_URL ?>/Catalog/register" method="post" >
                <h1>Register a new Account</h1>

                <label for="firstname"><b>First Name</b></label>
                <input type="text" placeholder="Enter First Name" name="first_name" required>

                <label for="lastname"><b>Last Name</b></label>
                <input type="text" placeholder="Enter Last Name" name="last_name" required>

                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="login_id" required>

                <label for="street_num"><b>Street Number</b></label>
                <input type="text" placeholder="Enter Street Number" name="street_num" required>

                <label for="street_name"><b>Street Name</b></label>
                <input type="text" placeholder="Enter Street Name" name="street_name" required>

                <label for="city"><b>City</b></label>
                <input type="text" placeholder="Enter City" name="city" required>

                <label for="state"><b>State</b></label>
                <input type="text" placeholder="Enter State" name="state" required>

                <label for="zip"><b>Zip Code</b></label>
                <input type="text" placeholder="Enter Zip Code" name="zip" required>

                <label for="psw"><b>Password</b></label>
                <input class="indexpass" type="password" placeholder="Enter Password" name="password" required>

                <button type="submit" class="btn">Register</button>
            </form>
        </div>
        </div>
<?php
        parent::displayFooter();
    }
}
