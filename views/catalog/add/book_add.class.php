<?php
/*
 * Author: Sean Wilson
 * Date: Mar 27, 2017
 * File: book_add.class.php
 * Description: The method to add a book to the library
 *
 */
class CatalogAdd extends CatalogIndexView {

    public function display() {
        //display page header
        parent::displayHeader("Edit Book Details");
        ?>

        <h1>Add a Book</h1>

        <form name="addbook" action="<?= BASE_URL ?>/Catalog/addbookdb" method="get">
            <table class="userdetails">
                <tr>
                    <th>Book Title</th>
                    <td><input name="title"/></td>
                </tr>
                <tr>
                    <th>Genre</th>
                    <td><input name="genre" size="30" required /></td>
                </tr>
                <tr>
                    <th>Author</th>
                    <td>
                        <select name="author" required />
                        <option value="4">Prince Harry</option>
                        <option value="5">John Grisham</option>
                        <option value="6">Stephen King</option>
                        <option value="7">Jordan Moore</option>
                        <option value="8">Colleen Hoover</option>
                    </td>
                </tr>
                <tr>
                    <th>Publisher</th>
                    <td>
                        <select name="publisher" required />
                        <option value="4">Random House</option>
                        <option value="5">Doubleday</option>
                        <option value="6">Grand Central Publishing</option>
                        <option value="7">Red Panda Press</option>
                        <option value="8">Scribner</option>
                    </td>
                </tr>
                <tr>
                    <th>Copies</th>
                    <td><input name="copies" required /></td>
                </tr>
                <tr>
                    <th>ISBN</th>
                    <td><input name="isbn" required /></td>
                </tr>
                <tr>
                    <th>Cost</th>
                    <td><input name="cost" required /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><textarea name="descr" rows="4" cols="50" required></textarea></td>
                </tr>
            </table>
            <br>
            <input type="image" src="<?= BASE_URL ?>/www/img/buttons/btnaddbook.png" alt="Add Book" />
            <a href="<?= BASE_URL ?>/Catalog/index"><img src="<?= BASE_URL ?>/www/img/buttons/btncancel.png"></a>
        </form>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}