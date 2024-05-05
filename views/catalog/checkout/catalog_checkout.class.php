<?php
/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * File: catalog_cart.class.php
 * Description: the class to view the cart
 *
 */
class CatalogCheckout extends CatalogIndexView {

    public function display() {
        //display page header
        parent::displayHeader("Library Checkout");
        ?>

        <h2>Checkout</h2>
        <p>Thank you for using your local library. Your business is greatly appreciated. You will be
            notified once your checked out books are shipped to you.
        </p>
            <?php
        parent::displayFooter();
    }

//end of display method
}