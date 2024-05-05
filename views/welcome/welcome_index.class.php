<?php
/*
 * Author: Sean Wilson
 * Date: 3/28/2022
 * Name: index.class.php
 * Description: This class defines the method "display" that displays the home page.
 */

class WelcomeIndex extends IndexView {

    public function display() {
        //display page header
        parent::displayHeader("Library System Home");
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $login_status = $_SESSION['login_status'];
        ?>
        <!-- login with background -->
        <div class="bg-img">
        <form action="<?= BASE_URL ?>/Catalog/login" class="container" method="post">
        <h1>Library Login</h1>
        <?php
        if ($login_status == 1) {
            echo "<p>You are logged in as " . $_SESSION['login_id'] . ".</p>";
            echo "<a href='", BASE_URL, "/Catalog/logout'>Log out</a><br />    </form>
</div>";
        } else {
            echo "<label for=\"username\"><b>Username</b></label>
        <input type=\"text\" placeholder=\"Enter Username\" name=\"username\" required>

        <label for=\"psw\"><b>Password</b></label>
        <input class=\"indexpass\" type=\"password\" placeholder=\"Enter Password\" name=\"password\" required>

        <button type=\"submit\" class=\"btn\">Login</button>
    </form>
</div>";
        }
        ?>

        <h1 class="homepage">Welcome to your public library</h1>
        <p>This template is able to be used by any library in need of an online check-out system for their customers.</p>
        <p>Major features include:</p>
        <ul>
            <li>Search available books with keywords in titles</li>
            <li>Checkout books</li>
            <li>Login/logout</li>
            <li>Register/create new accounts</li>
            <li>Manage your library account</li>
        </ul>

        <h2>Books in our library catalog</h2>
        <!-- beginning of slideshow -->


        <!-- end of slideshow -->

        <table class="hometable">
            <td><img src="www/img/books/1668002175.jpg"></td>
            <td><img src="www/img/books/0321112725.jpg"></td>
            <td><img src="www/img/books/0547167024.gif"></td>
            <td><img src="www/img/books/593593804.jpg"></td>
            <td><img src="www/img/books/887680026.jpg"></td>
        </table>

        <?php
        //display page footer
        parent::displayFooter();
    }

}
