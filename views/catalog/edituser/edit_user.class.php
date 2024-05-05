<?php
/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * File: add_user.class.php
 * Description: this class allows user to add a user
 *
 */
class CatalogEditUser extends CatalogIndexView {

public function display($query, $process) {
//display page header
parent::displayHeader("Edit a Library User");
if($process == 1) {
    echo "<h2>Edit User Details</h2>";
    echo "<p>You have successfully edited the user</p>";
    parent::displayFooter();
    exit;
}
$row = $query->fetch_assoc();
?>

    <h2>Edit User Details</h2>
    <form name="edituser" action="<?= BASE_URL ?>/Catalog/edituser" method="post">
        <table class="userdetails">
            <tr>
                <th>Login ID</th>
                <td><input name="login_id" value="<?php echo $row['login_id'] ?>"/>
                    <input hidden name="user_id" value="<?php echo $row['user_id']?>"/></td>
            </tr>
            <tr>
                <th>First Name</th>
                <td><input name="first_name" value="<?php echo $row['first_name'] ?>" required /></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><input name="last_name" value="<?php echo $row['last_name'] ?>" required /></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="password" class="adminpass" name="password" value="<?php echo $row['passwd'] ?>" required /></td>
            </tr>
            <tr>
                <th>Street Number</th>
                <td><input name="street_num" value="<?php echo $row['street_num'] ?>" required /></td>
            </tr>
            <tr>
                <th>Street Name</th>
                <td><input name="street_name" value="<?php echo $row['street_name'] ?>" required /></td>
            </tr>
            <tr>
                <th>City</th>
                <td><input name="city" value="<?php echo $row['city'] ?>" required /></td>
            </tr>
            <tr>
                <th>State</th>
                <td><input name="state" value="<?php echo $row['state'] ?>" required /></td>
            </tr>
            <tr>
                <th>zip</th>
                <td><input name="zip" value="<?php echo $row['zip'] ?>" required /></td>
            </tr>
            <tr>
                <th>Permissions</th>
                <td>
                    <select name="permissions_id" required />
                    <option value="1" <?php if($row['permissions_id'] == '1'){echo("selected");}?>>User</option>
                    <option value="2" <?php if($row['permissions_id'] == '2'){echo("selected");}?>>Employee</option>
                    <option value="3" <?php if($row['permissions_id'] == '3'){echo("selected");}?>>Manager</option>
                    <option value="4" <?php if($row['permissions_id'] == '4'){echo("selected");}?>>Admin</option>
                </td>
            </tr>
        </table>
        <br>
        <input type="image" src="<?= BASE_URL ?>/www/img/buttons/btnedituser.png" alt="Edit User" />
        <a href="<?= BASE_URL ?>/Catalog/listusers"><img src="<?= BASE_URL ?>/www/img/buttons/btncancel.png"></a>
    </form>

    <?php
    parent::displayFooter();
}

//end of display method
}