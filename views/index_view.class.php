<?php
/*
 * Author: Sean Wilson
 * Date: 3/28/2022
 * Name: index_view.class.php
 * Description: the parent class for all view classes. The two functions display page header and footer.
 */

class IndexView {

    //this method displays the page header
    static public function displayHeader($page_title) {
        ?>
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        //variables for a user’s login, name, and role
        $login = '';
        $name = '';
        $role = 0;

        //if the use has logged in, retrieve login, name, and role.
        if (isset($_SESSION['login_id']) AND isset($_SESSION['first_name']) AND
        isset($_SESSION['permissions_id'])) {
        $login = $_SESSION['login_id'];
        $name = $_SESSION['first_name'];
        $role = $_SESSION['permissions_id'];
        }

        //declare count
        $count=0;

        //retrieve cart contents
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            if ($cart) {
                $count = array_sum($cart);
            }
        }
        ?>
       <!DOCTYPE HTML>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="<?= BASE_URL ?>/www/css/bookstorestyle.css" />
        <title><?php echo $page_title; ?></title>
    </head>
    <script>
    //create the JavaScript variable for the base url
    var base_url = "<?= BASE_URL ?>";
   </script>
    <body>
        <div id="wrapper">
            <div class="topnav">
                <a href="<?= BASE_URL ?>/index">Home</a>
                <a href="<?= BASE_URL ?>/Catalog/index">Catalog</a>
                <!-- <a href="<?= BASE_URL ?>/Catalog/loans">Past Loans</a> -->
                <div class="topnav-right">
                   <?php
                    if (isset($_SESSION['permissions_id'])) {
                        if($_SESSION['permissions_id'] == 4){
                            echo "<a href=\"", BASE_URL, "/Catalog/admin\">Admin</a>";
                        }
                    }
                    ?>
                    <a href="<?= BASE_URL ?>/Catalog/cart">Cart <?php if($count > 0) {echo "(", $count, ")";} ?></a>
                    <?php
                    if ($_SESSION['login_status'] == 1) {
                    echo "<a href=\"", BASE_URL, "/Catalog/login\">Logged in as: ", $_SESSION['login_id'], "</a>";
                    } else {
                        echo "<a href=\"", BASE_URL, "/Catalog/register\">Register</a>";
                    }
                    ?> -->
                </div>
            </div>
            <table id="banner">
                <tr>
                    <td>
                        <img src="<?= BASE_URL ?>/www/img/logo.png" alt="Bookstore">
                    </td>
                    <td class="title" align="left">
                        <div id="maintitle"></div>
                        <div id="subtitle"></div>
                    </td>
                    <td class="search" align="right">
                        <div class="search-container">
                            <form name="search" method="get" action="<?= BASE_URL ?>/Catalog/search" >
                                <input type="text" placeholder="Search our library.." name="search-terms" id="searchtextbox" autocomplete="off" onkeyup="handleKeyUp(event)">
                                <input type="image" src="<?= BASE_URL ?>/www/img/buttons/btnsearch.png" alt="Search" />
                            </form>
                       </div>
                       <div id="suggestionDiv"></div>
                    </td>
                </tr>
            </table>
                    <?php
                }//end of displayHeader function
                
                //this method displays the page footer
                public static function displayFooter() {
                    ?>
                    <div id="footer">
                        &copy <?php echo date("Y") ?> PHP Library System. All Rights Reserved.
                    </div>
                    <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
        <?php
    } //end of displayFooter function
}
