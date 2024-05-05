<?php
/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * File: catalog_cart.class.php
 * Description: the class to view the cart
 *
 */
class CatalogAddCart extends CatalogIndexView {

    public function display($error) {
        //display page header
        parent::displayHeader("View Cart");
        ?>

        <h2>Cart</h2>
        <p>The item has been added to the cart</p>
            <?php
        parent::displayFooter();
    }

//end of display method
}