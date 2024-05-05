<?php
/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * Name: movie_index_view.class.php
 * Description: the parent class that displays a search box.
 */

class AdminIndexView extends IndexView {

    public static function displayHeader($title) {
        parent::displayHeader($title)
        ?>
        <?php
    }

    public static function displayFooter() {
        parent::displayFooter();
    }

}
