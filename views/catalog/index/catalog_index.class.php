<?php
/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * Name: index.class.php
 * Description: This class defines a method called "display", which displays all movies.
 */
class CatalogIndex extends CatalogIndexView {
    /*
     * the display method accepts an array of movie objects and displays
     * them in a grid.
     */

    public function display($books) {
        //display page header
        parent::displayHeader("Library Inventory");
        ?>
        <h2>Library Inventory</h2>
        <?php
        if (isset($_SESSION['permissions_id'])) {
            if($_SESSION['permissions_id'] == 4){
                echo "<a href=\"", BASE_URL, "/Catalog/add\"><img src=\"", BASE_URL, "/www/img/buttons/btnaddnewbook.png\"></a>";
            }
        }
        ?>
        <table id="booklist" class="booklist">
        <tr>
            <th class="col1">Title</th>
            <th class="col2">Author</th>
            <th class="col3">Genre</th>
            <th class="col4">Price</th>
            <th class="col5">Check Out</th>
            <th class="col6">Details</th>
            <th class="col7">Stock</th>
        </tr>

        <?php
        //insert a row into the table for each row of data

        if ($books === 0) {
            echo "No book was found.<br><br><br><br><br>";
        } else {
            //display movies in a grid; six movies per row
            foreach ($books as $book) {
                $id = $book->getId();
                $title = $book->getTitle();
                $genre = $book->getGenre();
                $author = $book->getAuthor();
                $price = $book->getPrice();
                $copies = $book->getCopies();

                echo "<tr>";
                echo "<td><a href=", BASE_URL, "/Catalog/details?id=", $id, ">", $title,"</a></td>";
                echo "<td>", $author, "</td>";
                echo "<td>", $genre, "</td>";
                echo "<td>\$", $price, "</td>";
                echo "<td> <a href=", BASE_URL, "/Catalog/addtocart?id=", $id, ">", "<img src=\"", BASE_URL, "/www/img/buttons/btnaddcart.png\"></a> </td>";
                echo "<td> <a href=", BASE_URL, "/Catalog/details?id=", $id, ">", "<img src=\"", BASE_URL, "/www/img/buttons/btndetails.png\" ></a> </td>";
                if($copies > 0) {
                    echo "<td>", $copies, " In Stock</td>";
                } else {
                    echo "<td>Out of Stock</td>";
                }
                echo "</tr>";


            }

        }
        echo "</table>";

        parent::displayFooter();

    } //end of display method

}
?>


