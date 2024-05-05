<?php
/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * Name: catalog_update.class.php
 * Description: This class defines the update class
 */

class CatalogUpdate extends CatalogIndexView {

    public function display($result) {
        //display page header
        parent::displayHeader("Book Update");
        ?>
        <h2>Update Book</h2>
        <p>The book has been updated.</p>
<?php
        parent::displayFooter();
    }
}
