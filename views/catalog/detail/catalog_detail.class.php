<?php
/*
 * Author: Sean Wilson
 * Date: 3/28/2022
 * Name: movie_view.class.php
 * Description: This class defines a method "display".
 *              The method accepts a Movie object and displays the details of the movie in a table.
 */

class CatalogDetail extends CatalogIndexView {

    public function display($book) {
        //display page header
        parent::displayHeader("Book Details");

        //retrieve movie details by calling get methods
        $id = $book->getId();
        $title = $book->getTitle();
        $genre = $book->getGenre();
        $author = $book->getAuthor();
        $price = $book->getPrice();
        $ISBN = $book->getISBN();
        $publisher = $book->getPublisher();
        $description = $book->getDescription();
        ?>

        <!-- item details -->
        <br>
        <h1>book details</h1>
        <table id="catalogdetails" class="catalogdetails">
            <tr>
                <td class="image" rowspan="7">
                    <?php echo "<img class=\"thumbnail\" src=\"", BASE_URL, "\www\img\books", "\\", $ISBN, ".jpg\""?>;
                </td>
            </tr>
            <tr>
                <td class="title"> <h2><?php echo $title ?></h2> </td>
            </tr>
            <tr>
                <td class="price"><p>Price: $<?php echo $price ?></p></td>
            </tr>
            <tr>
                <td class="buttons"><a href="cart/addtocart.php?id=<?php echo $id ?>"><img class="button2" src="<?= BASE_URL ?>/www/img/buttons/btnaddcart.png"></a>
                    <a href="listbooks.php"><img class="button2" src="<?= BASE_URL ?>/www/img/buttons/btnback.png"></a>
                    <?php
                    if (isset($_SESSION['permissions_id'])) {
                        if($_SESSION['permissions_id'] == 4){
                            echo "<br><a href=", BASE_URL, "/Catalog/edit?id=", $id, ">", "<img class=\"button2\" src=\"", BASE_URL, "\www/img/buttons/btnedit.png\"></a>";
                            echo " <a href=", BASE_URL, "/Catalog/delete?id=", $id, ">","<img  class=\"button2\" src=\"", BASE_URL, "\www/img/buttons/btndelete.png\"></a>";
                        }
                    }
                    ?>
            </tr>
            <tr>
                <td class="description">
                    <p>Author: <?php echo $author ?></p>
                    <p>Genre: <?php echo $genre ?></p>
                    <p>ISBN-10: <?php echo $ISBN ?></p>
                    <p>Publisher: <?php echo $publisher ?></p>
                </td>
            </tr>
        </table>
        <br>
        <table id="description" class="description">
            <th><h1>Description</h1></th>
            <tr>
                <td>
                    <p><?php echo $description ?></p>
                </td>
            </tr>
        </table>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}
