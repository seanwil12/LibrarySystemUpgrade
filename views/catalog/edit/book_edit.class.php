<?php
/*
 * Author: Sean Wilson
 * Date: Mar 27, 2017
 * File: movie_edit.class.php
 * Description: The method to edit a book in the library
 *
 */
class CatalogEdit extends CatalogIndexView {

    public function display($book) {
        //display page header
        parent::displayHeader("Edit Book Details");
        //retrieve movie details by calling get methods
        $id = $book->getId();
        $title = $book->getTitle();
        $genre = $book->getGenre();
        $author_id = $book->getAuthor();
        $price = $book->getPrice();
        $ISBN = $book->getISBN();
        $copies = $book->getCopies();
        $publisher_id = $book->getPublisher();
        $description = $book->getDescription();
        ?>

        <h2>Edit Book</h2>


<!-- edit user table -->
<form name="editbook" action="<?= BASE_URL ?>/Catalog/update" method="get">
    <table class="userdetails">
        <tr>
            <th>Book ID</th>
            <td><input name="book_id" value="<?php echo $id ?>" readonly="readonly" /></td>
        </tr>
        <tr>
            <th>Title</th>
            <td><input name="title" value="<?php echo $title ?>" size="30" required /></td>
        </tr>
        <tr>
            <th>Genre</th>
            <td><input name="genre" value="<?php echo $genre ?>" size="30" required /></td>
        </tr>
        <tr>
            <th>Author</th>
            <td>
                <select name="author" selected="<?php echo $author_id ?>" required />
                    <option value=4 <?php if($author_id == '4'){echo("selected");}?>>Prince Harry</option>
                    <option value="5" <?php if($author_id == '5'){echo("selected");}?>>John Grisham</option>
                    <option value="6" <?php if($author_id == '6'){echo("selected");}?>>Stephen King</option>
                    <option value="7" <?php if($author_id == '7'){echo("selected");}?>>Jordan Moore</option>
                    <option value="8" <?php if($author_id == '8'){echo("selected");}?>>Colleen Hoover</option>
            </td>
        </tr>
        <tr>
            <th>Publisher</th>
            <td>
                <select name="publisher" value="<?php echo $publisher_id ?>" required />
                    <option value=4 <?php if($publisher_id == '4'){echo("selected");}?>>Random House</option>
                    <option value="5" <?php if($publisher_id == '5'){echo("selected");}?>>Doubleday</option>
                    <option value="6" <?php if($publisher_id == '6'){echo("selected");}?>>Grand Central Publishing</option>
                    <option value="7" <?php if($publisher_id == '7'){echo("selected");}?>>Red Panda Press</option>
                    <option value="8" <?php if($publisher_id == '8'){echo("selected");}?>>Scribner</option>
            </td>
        </tr>
        <tr>
            <th>Copies</th>
            <td><input name="copies" value="<?php echo $copies ?>" required /></td>
        </tr>
        <tr>
            <th>ISBN</th>
            <td><input name="isbn" value="<?php echo $ISBN ?>" required /></td>
        </tr>
        <tr>
            <th>Cost</th>
            <td><input name="cost" value="<?php echo $price ?>" required /></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><textarea name="descr" rows="4" cols="50" required><?php echo $description ?></textarea></td>
        </tr>
    </table>
    <br>
    <!--<input type="submit" value="Update"> -->
    <input type="image" src="<?= BASE_URL ?>/www/img/buttons/btnupdate.png" alt="Update Book" />
    <a href="<?= BASE_URL ?>/Catalog/details?id=<?php echo $id ?>"><img src="<?= BASE_URL ?>/www/img/buttons/btncancel.png"></a>
</form>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}