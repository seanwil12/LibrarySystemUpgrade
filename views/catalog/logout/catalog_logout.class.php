<?php
/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * Name: catalog_out.class.php
 * Description: This class defines the logout class for the catalog, allows uers to log out
 */

class CatalogLogout extends CatalogIndexView {
    public function display() {
        parent::displayHeader("Log Out of Library System");

        //start session if it has not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        //unset all the session variables
        $_SESSION = array();
        //delete the session cookie
        setcookie(session_name(), "", time() - 3600);
        //destroy the session
        session_destroy();
        ?>

        <h2>Logout</h2>
        <p>Thank you for your visit. You are now logged out.</p>
<?php
        parent::displayFooter();
    }
}
