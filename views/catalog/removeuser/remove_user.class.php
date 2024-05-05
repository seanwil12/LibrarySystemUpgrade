<?php
/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * File: admin_users.class.php
 * Description: the class to view the cart
 *
 */
class CatalogRemoveUser extends CatalogIndexView {

    public function display() {
        //display page header
        parent::displayHeader("Delete User");
        ?>

        <!--display results in a table-->
        <h2>Manage Users</h2>
        <p>The selected user has been deleted.</p>
        <?php
        parent::displayFooter();
    }

//end of display method
}
