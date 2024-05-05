<?php
/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * File: catalog_cart.class.php
 * Description: the class to view the cart
 *
 */
class CatalogCart extends CatalogIndexView {

    public function display($books) {
        //display page header
        parent::displayHeader("View Cart");
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
            echo "Your shopping cart is empty.<br><br>";
            parent::displayFooter();
            exit();
        }

        //proceed since the cart is not empty
        $cart = $_SESSION['cart'];
        ?>

        <h2>Cart</h2>
        <table id="booklist" class="booklist">
            <tr>
                <th class="col1">Title</th>
                <th class="col2">Late Fee</th>
                <th class="col3">Quantity</th>
                <th class="col4">Rent Date</th>
                <th class="col5">Due Date</th>
            </tr>
        <?php
        foreach ($books as $book) {
        $id = $book->getId();
        $title = $book->getTitle();
        $price = $book->getPrice();
        $qty = $cart[$id];
        $total = $qty * $price;
        $todaysDate = date('m-d-y');
        $dueDate = Date('m-d-y', strtotime('+14 days'));
        echo "<tr>",
            "<td><a href='", BASE_URL, "/Catalog/details?id=$id'>$title</a></td>",
            "<td>$$price</td>",
            "<td>$qty</td>",
            "<td>$todaysDate</td>",
            "<td>$dueDate</td>",
            "</tr>";
        //display page footer

    }
        echo "</table>";
        ?>
        <br>
        <input type="button" value="Checkout" onclick="window.location.href = '<?= BASE_URL ?>/Catalog/checkout'"/>
        <input type="button" value="Cancel" onclick="window.location.href = '<?= BASE_URL ?>/Catalog/index'" />
            <?php
        parent::displayFooter();
    }

//end of display method
}