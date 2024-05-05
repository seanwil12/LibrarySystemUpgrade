<?php

/*
 * Author: Sean Wilson
 * Date: 3/28/2022
 * File: catalog_model.class.php
 * Description: the movie model
 * 
 */

class CatalogModel {

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblBook;
    private $tblAuthor;
    private $tblPublisher;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getMovieModel method must be called.


    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblBook = $this->db->getCatalogTable();
        $this->tblAuthor = $this->db->getAuthorTable();
        $this->tblPublisher = $this->db->getPublisherTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars. 
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars 
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

        //initialize movie ratings
        //if (!isset($_SESSION['movie_ratings'])) {
        //    $ratings = $this->get_movie_ratings();
        //    $_SESSION['movie_ratings'] = $ratings;
        //}
    }

    //static method to ensure there is just one MovieModel instance
    public static function getCatalogModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new CatalogModel();
        }
        return self::$_instance;
    }

    /*
     * the list_movie method retrieves all movies from the database and
     * returns an array of Movie objects if successful or false if failed.
     * Movies should also be filtered by ratings and/or sorted by titles or rating if they are available.
     */

    public function list_books() {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        $sql = "SELECT * FROM " . $this->tblBook . "," . $this->tblAuthor . "," . $this->tblPublisher .
            " WHERE " . $this->tblBook . ".author_id=" . $this->tblAuthor . ".author_id
             AND " . $this->tblBook . ".publisher_id=" . $this->tblPublisher . ".publisher_id";

        //execute the query
        try {

        $query = $this->dbConnection->query($sql);

        // if the query failed, return false. 
        if (!$query)
            //return false;
            throw new DatabaseExecutionException("Error encountered when executing the SQL.");

        //if the query succeeded, but no movie was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned movies
        $movies = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $movie = new Book(stripslashes($obj->book_id), stripslashes($obj->book_title), stripslashes($obj->genre), stripslashes($obj->author_name), stripslashes($obj->author_id), stripslashes($obj->publisher_name), stripslashes($obj->publisher_id), stripslashes($obj->Cost), stripslashes($obj->ISBN), stripslashes($obj->Descr), stripslashes($obj->copies));

            //set the id for the book
            $movie->setId($obj->book_id);

            //add the movie into the array
            $movies[] = $movie;
        }

            return $movies;
        } catch (DatabaseExecutionException $e) {
            $view = new CatalogError();
            $view->display($e->getMessage());

        } catch (Exception $e) {
            $view = new CatalogError();
            $view->display($e->getMessage());
        }
    }

    public function book_details($id) {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        $sql = "SELECT * FROM " . $this->tblBook . "," . $this->tblAuthor . "," . $this->tblPublisher .
            " WHERE " . $this->tblBook . ".author_id=" . $this->tblAuthor . ".author_id
             AND " . $this->tblBook . ".publisher_id=" . $this->tblPublisher . ".publisher_id";

        $sql .= " AND book_id = '" . $id . "'";

        //execute the query
        try {

            $query = $this->dbConnection->query($sql);

            // if the query failed, return false.
            if (!$query)
                //return false;
                throw new DatabaseExecutionException("Error encountered when executing the SQL.");

            //if the query succeeded, but no movie was found.
            if ($query->num_rows == 0)
                return 0;

            //handle the result
            //create an array to store all returned movies
            $movies = array();

            $obj = $query->fetch_object();

            //loop through all rows in the returned recordsets
            $book = new Book(stripslashes($obj->book_id), stripslashes($obj->book_title), stripslashes($obj->genre), stripslashes($obj->author_name), stripslashes($obj->author_id), stripslashes($obj->publisher_name), stripslashes($obj->publisher_id), stripslashes($obj->Cost), stripslashes($obj->ISBN), stripslashes($obj->Descr), stripslashes($obj->copies));

            return $book;
        } catch (DatabaseExecutionException $e) {
            $view = new CatalogError();
            $view->display($e->getMessage());

        } catch (Exception $e) {
            $view = new CatalogError();
            $view->display($e->getMessage());
        }
    }

    public function book_update($book_id,$book_title,$genre,$author_id,$publisher_id,$copies,$ISBN,$cost,$descr) {
        //Define MySQL update statement
        $sql = "UPDATE books SET
        book_title='$book_title',
        genre='$genre',
        author_id='$author_id',
        publisher_id='$publisher_id',
        copies='$copies',
        ISBN='$ISBN',
        Cost='$cost',
        Descr='$descr'
        WHERE book_id=$book_id";
        //Execute the query.
        $query = $this->dbConnection->query($sql);

        if(!$query) {
            throw new DatabaseExecutionException("Error encountered when executing the SQL.");
        }
    }

    public function book_add($book_title,$genre,$author_id,$publisher_id,$copies,$ISBN,$cost,$descr) {
        //Define MySQL update statement
        $sql = "INSERT INTO books VALUES (book_id = last_insert_id() + 1,
        '$book_title',
        '$genre',
        '$author_id',
        '$publisher_id',
        '$copies',
        '$ISBN',
        '$cost',
        '$descr')";
        //Execute the query.
        $query = $this->dbConnection->query($sql);

        if(!$query) {
            throw new DatabaseExecutionException("Error encountered when executing the SQL.");
        }
    }
        public function delete_book($id) {
            //retrieve, sanitize, and escape all fields from the form

            //Define MySQL update statement
            $sql = "DELETE FROM books WHERE
            book_id=$id";
            //Execute the query.
            $query = $this->dbConnection->query($sql);
        }

        //search the database for movies that match words in titles. Return an array of movies if succeed; false otherwise.
        public function search_book($terms)
        {
            $terms = explode(" ", $terms); //explode multiple terms into an array
            //select statement for AND each

            $sql = "SELECT * FROM " . $this->tblBook . "," . $this->tblAuthor .
                    " WHERE " . $this->tblBook . ".author_id=" . $this->tblAuthor . ".author_id";

           foreach ($terms as $term) {
                $sql .= " AND book_title LIKE '%" . $term . "%'";
            }

            //$sql .= ")";

            //execute the query
            $query = $this->dbConnection->query($sql);

            // the search failed, return false.
            if (!$query)
                return false;

            //search succeeded, but no movie was found.
            if ($query->num_rows == 0)
                return 0;

            //search succeeded, and found at least 1 movie found.
            //create an array to store all the returned movies
            $movies = array();

            //loop through all rows in the returned recordsets
            while ($obj = $query->fetch_object()) {
                $movie = new Book(stripslashes($obj->book_id), stripslashes($obj->book_title), stripslashes($obj->genre), stripslashes($obj->author_name), stripslashes($obj->author_id), stripslashes($obj->publisher_name), stripslashes($obj->publisher_id), stripslashes($obj->Cost), stripslashes($obj->ISBN), stripslashes($obj->Descr), stripslashes($obj->copies));

                //set the id for the book
                $movie->setId($obj->id);

                //add the movie into the array
                $movies[] = $movie;
            }
            return $movies;
        }

        public function login($user, $pass) {
            //start session if it has not already started
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            //create variable login status.
            $_SESSION['login_status'] = 2;
            //$username = $password = "";

            $username = $user;
            $password = $pass;

            //validate user name and password against a record in the users table in the database. If they are valid, create session variables.
            $sql = "SELECT * FROM users WHERE login_id='$username' AND passwd='$password'";
            //execute the query
            $query = $this->dbConnection->query($sql);

            if ($query -> num_rows) {
            //It is a valid user. Need to store the user in session variables.
                $row = $query->fetch_assoc();
                $_SESSION['login_id'] = $username;
                $_SESSION['permissions_id'] = $row['permissions_id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                $_SESSION['login_status'] = 1;
            }
        }

        public function register($login_id, $first_name, $last_name, $password, $street_num, $street_name, $city, $state, $zip, $permissions_id) {
            //start session if it has not already started
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            //create variable login status.
            $_SESSION['login_status'] = 5;

            $sql = "INSERT INTO users VALUES (user_id = last_insert_id() + 1,
            '$login_id',
            '$first_name',
            '$last_name',
            '$password',
            '$street_num',
            '$street_name',
            '$city',
            '$state',
            '$zip',
            '$permissions_id')";

            //Execute the query.
            $query = $this->dbConnection->query($sql);

            //if failure, return false
            if (!$query)
                return false;
        }

        public function view_cart() {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            //retrieve cart contents
            if (isset($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
                if ($cart) {
                    $count = array_sum($cart);
                }
            }
            $cart = $_SESSION['cart'];

            $sql = "SELECT * FROM books WHERE 0";
            foreach (array_keys($cart) as $id) {
                $sql .= " OR book_id=$id";
            }

            $query = $this->dbConnection->query($sql);

            if (!$query) {
                throw new DatabaseExecutionException("Error encountered when executing the SQL.");
            }

            $books = array();

            //loop through all rows in the returned recordsets
            while ($obj = $query->fetch_object()) {
                $book = new Book(stripslashes($obj->book_id), stripslashes($obj->book_title), stripslashes($obj->genre), stripslashes($obj->author_name), 2, stripslashes($obj->publisher_name), 2, stripslashes($obj->Cost), stripslashes($obj->ISBN), stripslashes($obj->Descr), stripslashes($obj->copies));

                //set the id for the book
                $book->setId($obj->book_id);

                //add the movie into the array
                $books[] = $book;
            }
            return $books;

        }

        public function list_users() {
            $sql = "SELECT * FROM users
            inner join permissions on permissions.permissions_id = users.permissions_id";

            $query = $this->dbConnection->query($sql);

            return $query;
        }

        public function add_user($login_id, $first_name, $last_name, $password, $street_num, $street_name, $city, $state, $zip, $permissions_id) {
            $sql = "INSERT INTO users VALUES (user_id = last_insert_id() + 1,
            '$login_id',
            '$first_name',
            '$last_name',
            '$password',
            '$street_num',
            '$street_name',
            '$city',
            '$state',
            '$zip',
            '$permissions_id')";

            $query = $this->dbConnection->query($sql);

            if (!$query) {
                throw new DatabaseExecutionException("Error encountered when executing the SQL.");
            }
        }

        public function get_user($user_id) {
            //select statement
            $sql = "SELECT * FROM users WHERE user_id=" . $user_id;
            $query = $this->dbConnection->query($sql);

            return $query;
        }

        public function edit_user($user_id, $login_id, $first_name, $last_name, $password, $street_num, $street_name, $city, $state, $zip, $permissions_id) {
            //Define MySQL update statement
            $sql = "UPDATE users SET
            login_id='$login_id',
            first_name='$first_name',
            last_name='$last_name',
            passwd='$password',
            street_num='$street_num',
            street_name='$street_name',
            city='$city',
            state='$state',
            zip='$zip',
            permissions_id = '$permissions_id'
            WHERE user_id=$user_id";

            $query = $this->dbConnection->query($sql);
            if (!$query) {
                throw new DatabaseExecutionException("Error encountered when executing the SQL.");
            }
        }

        public function remove_user($user_id) {
            $sql = "DELETE FROM users WHERE
            user_id=$user_id";

            $query = $this->dbConnection->query($sql);
            if (!$query) {
                throw new DatabaseExecutionException("Error encountered when executing the SQL.");
            }
        }


    /*
     * the viewMovie method retrieves the details of the movie specified by its id
     * and returns a movie object. Return false if failed.
     */

    /*
    public function view_movie($id) {
        //the select ssql statement
        $sql = "SELECT * FROM " . $this->tblMovie . "," . $this->tblMovieRating .
                " WHERE " . $this->tblMovie . ".rating=" . $this->tblMovieRating . ".rating_id" .
                " AND " . $this->tblMovie . ".id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a movie object
            $movie = new Movie(stripslashes($obj->title), stripslashes($obj->rating), stripslashes($obj->release_date), stripslashes($obj->director), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the movie
            $movie->setId($obj->id);

            return $movie;
        }

        return false;
    }

    //the update_movie method updates an existing movie in the database. Details of the movie are posted in a form. Return true if succeed; false otherwise.
    public function update_movie($id) {
        try {

        //if the script did not received post data, display an error message and then terminite the script immediately
        if (!filter_has_var(INPUT_POST, 'title') ||
                !filter_has_var(INPUT_POST, 'rating') ||
                !filter_has_var(INPUT_POST, 'release_date') ||
                !filter_has_var(INPUT_POST, 'director') ||
                !filter_has_var(INPUT_POST, 'image') ||
                !filter_has_var(INPUT_POST, 'description')) {

            //return false;
            throw new DataMissingException("Missing values in table.  ");
        }



        //retrieve data for the new movie; data are sanitized and escaped for security.
		$title = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'title')));
		$rating = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'rating')));
		$release_date = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'release_date'));
		$director = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'director')));
		$image = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'image')));
		$description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'description')));

        if(!strtotime($release_date)) {
            throw new InvalidDateException("The movie release date is not valid");
        }

        //query string for update 
        $sql = "UPDATE " . $this->tblMovie .
                " SET title='$title', rating='$rating', release_date='$release_date', director='$director', "
                . "image='$image', description='$description' WHERE id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);
		
		return $query;
        } catch(DataMissingException $e) {
            $view = new MovieError();
            $view->display($e->getMessage());
        } catch (InvalidDateException $e) {
            $view = new MovieError();
            $view->display($e->getMessage());
        } catch (Exception $e) {
            $view = new MovieError();
            $view->display($e->getMessage());
        }
    }



    //get all movie ratings
    private function get_movie_ratings() {
        $sql = "SELECT * FROM " . $this->tblMovieRating;

        //execute the query
        $query = $this->dbConnection->query($sql);

        if (!$query) {
            return false;
        }

        //loop through all rows
        $ratings = array();
        while ($obj = $query->fetch_object()) {
            $ratings[$obj->rating] = $obj->rating_id;
        }
        return $ratings;
    }
    */

}
