<?php
/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * Name: catalog_add_book.class.php
 * Description: This class defines the add book class
 */

class CatalogAddBook extends CatalogIndexView {

    public function display($result) {
        //display page header
        parent::displayHeader("Book Update");
        ?>
        <h2>Add Book</h2>
        <p>The book has been added.</p>
<?php
        parent::displayFooter();
    }
}
