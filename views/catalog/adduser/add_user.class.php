<?php
/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * File: add_user.class.php
 * Description: this class allows user to add a user
 *
 */
class CatalogAddUser extends CatalogIndexView {

public function display($process) {
//display page header
parent::displayHeader("Add a New Library User");
if($process == 1) {
    echo "<p>You have successfully added a new user</p>";
}
?>

<h1>Add a New User</h1>

    <form name="adduser" action="<?= BASE_URL ?>/Catalog/adduser" method="post">
        <table class="userdetails">
            <tr>
                <th>Login ID</th>
                <td><input name="login_id"/></td>
            </tr>
            <tr>
                <th>First Name</th>
                <td><input name="first_name" required /></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><input name="last_name" required /></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="password" class="adminpass" name="passwd"  required /></td>
            </tr>
            <tr>
                <th>Street Number</th>
                <td><input name="street_num" required /></td>
            </tr>
            <tr>
                <th>Street Name</th>
                <td><input name="street_name" required /></td>
            </tr>
            <tr>
                <th>City</th>
                <td><input name="city" required /></td>
            </tr>
            <tr>
                <th>State</th>
                <td><input name="state" required /></td>
            </tr>
            <tr>
                <th>zip</th>
                <td><input name="zip" required /></td>
            </tr>
            <tr>
                <th>Permissions</th>
                <td>
                    <select name="permissions_id" required />
                    <option value="1">User</option>
                    <option value="2">Employee</option>
                    <option value="3">Manager</option>
                    <option value="4">Admin</option>
                </td>
            </tr>
        </table>
        <br>
        <input type="image" src="<?= BASE_URL ?>/www/img/buttons/btnadduser2.png" alt="Add Book" />
        <a href="listusers.php"><img src="<?= BASE_URL ?>/www/img/buttons/btncancel.png"></a>
    </form>
    <?php
    parent::displayFooter();
}

//end of display method
}