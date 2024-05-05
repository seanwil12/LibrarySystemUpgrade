<?php
/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * Name: catalog_login.class.php
 * Description: This class defines the login class for the catalog, allows the user to log in
 */

class CatalogAdmin extends CatalogIndexView {
    public function display() {
        parent::displayHeader("Admin Control System");
        ?>

        <h1 class="homepage">Admin Control Center</h1>
        <a href="<?= BASE_URL ?>/Catalog/listusers"><img src="<?= BASE_URL ?>/www/img/buttons/btnmanageusers.png"></a>
        <?php
        parent::displayFooter();
    }
}
