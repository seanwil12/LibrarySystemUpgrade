<?php
/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * Name: catalog_delete.class.php
 * Description: This class defines the delete class for the catalog
 */

class CatalogDelete extends CatalogIndexView {
    public function display($message) {
        parent::displayHeader("Register with the Library System");
        echo "$message";
        echo "<br>";
        echo "<br>";
        echo "<a href=\"index\"><img src=\"", BASE_URL, "/www/img/buttons/btnbackcat.png\"></a>";
    }


}