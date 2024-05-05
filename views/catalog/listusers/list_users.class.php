<?php
/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * File: admin_users.class.php
 * Description: the class to view the cart
 *
 */
class CatalogListUsers extends CatalogIndexView {

    public function display($query) {
        //display page header
        parent::displayHeader("List All Users");
        ?>

        <!--display results in a table-->
        <h2>Manage Users</h2>
        <a href="<?= BASE_URL ?>/Catalog/adduser"><img src="<?= BASE_URL ?>/www/img/buttons/btnadduser.png"></a>
        <table class="userlist">
        <tr>
            <th>User Name</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Street Number</th>
            <th>Street Name</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Role</th>
            <th>Edit User</th>
            <th>Delete User</th>
        </tr>

        <?php
        //insert a row into the table for each row of data
        while (($row = $query->fetch_assoc()) !== NULL){
            echo "<tr>";
            echo "<td><a href=", BASE_URL, "/Catalog/userdetail?id=", $row['user_id'], ">", $row['login_id'],"</a></td>";
            echo "<td>", $row['first_name'], "</td>";
            echo "<td>", $row['last_name'], "</td>";
            echo "<td>", $row['street_num'], "</td>";
            echo "<td>", $row['street_name'], "</td>";
            echo "<td>", $row['city'], "</td>";
            echo "<td>", $row['state'], "</td>";
            echo "<td>", $row['zip'], "</td>";
            echo "<td>", $row['title'], "</td>";
            echo "<td><a href=", BASE_URL, "/Catalog/edituser?id=", $row['user_id'], "><img src='", BASE_URL, "/www/img/buttons/btnedituser.png'></a></td>";
            echo "<td><a href=", BASE_URL, "/Catalog/removeuser?id=", $row['user_id'], "><img src='", BASE_URL, "/www/img/buttons/btndelete.png'></a></td>";
            echo "</tr>";
        }
        ?>
        </table>
        <?php
        parent::displayFooter();
    }

//end of display method
}
