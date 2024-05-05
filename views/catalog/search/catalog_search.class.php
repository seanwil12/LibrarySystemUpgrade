<?php
/*
 * Author: Sean Wilson
 * Date: 3/28/2022
 * Name: search.class.php
 * Description: this script defines the SearchMovie class. The class contains a method named display, which
 *     accepts an array of Movie objects and displays them in a grid.
 */

class CatalogSearch extends CatalogIndexView {
    /*
     * the displays accepts an array of movie objects and displays
     * them in a grid.
     */

     public function display($terms, $books) {
        //display page header
        parent::displayHeader("Search Results");
        ?>
         <h2> Search Results for <i><?= $terms ?></i></h2>
         <h2>Library Search Results</h2>
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
                echo "<td><a href=bookdetails.php?id=", $id, ">", $title,"</a></td>";
                echo "<td>", $author, "</td>";
                echo "<td>", $genre, "</td>";
                echo "<td>\$", $price, "</td>";
                echo "<td> <a href=cart/addtocart/", $id, ">", "<img src=\"", BASE_URL, "/www/img/buttons/btnaddcart.png\"></a> </td>";
                echo "<td> <a href=bookdetails/", $id, ">", "<img src=\"", BASE_URL, "/www/img/buttons/btndetails.png\" ></a> </td>";
                if($copies > 0) {
                    echo "<td>", $copies, " In Stock</td>";
                } else {
                    echo "<td>Out of Stock</td>";
                }
                echo "</tr>";


            }

        }
        echo "</table>";

        //display footer
        parent::displayFooter();
    }

//end of display method
}
?>