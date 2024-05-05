<?php

/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * File: catalog_controller.class.php
 * Description: the main catalog controller
 *
 */

class CatalogController {

    private $book_model;

    //default constructor
    public function __construct() {
        //create an instance of the MovieModel class
        $this->book_model = CatalogModel::getCatalogModel();
    }

    //index action that displays all movies
    public function index() {
        //retrieve all movies and store them in an array
        $books = $this->book_model->list_books();
        if (!$books) {
        //display an error
            $message = "There was a problem displaying movies.";
            $this->error($message);
            return;
        }
        // display all movies
        $view = new CatalogIndex();
        $view->display($books);

    }

    public function details() {
        //retrieve book id
        $book_id = $_GET['id'];

        $book = $this->book_model->book_details($book_id);

        if (!$book) {
            //display an error
            $message = "There was a problem displaying movies.";
            $this->error($message);
            return;
        }

        //display book details
        $view = new CatalogDetail();
        $view->display($book);

    }

    //login action that displays login screen
    public function login() {
        //start session if it has not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //create variable login status.
        $login_status = $_SESSION['login_status'];

        //retrieve user name and password from the form in the login form
        if (filter_has_var(INPUT_POST, 'username') || filter_has_var(INPUT_POST, 'password')) {
            $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
            $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        }
        if(is_null($username) or is_null($password)) {
            $view = new CatalogLogin();
            $view->display();
        } else {
            $this->book_model->login($username, $password);
            $view = new CatalogLogin();
            $view->display();
        }

    }

    public function delete() {
        $book_id = $_GET['id'];

        $book = $this->book_model->delete_book($book_id);

        //display book details
        $message = "The selected book was deleted.";
        $view = new CatalogDelete();
        $view->display($message);
    }

    public function edit()
    {
        $book_id = $_GET['id'];

        $book = $this->book_model->book_details($book_id);

        if (!$book) {
            //display an error
            $message = "There was a problem displaying the book.";
            $this->error($message);
            return;
        }

        //display book details
        $view = new CatalogEdit();
        $view->display($book);
    }

    public function add() {
        $view = new CatalogAdd();
        $view->display();
    }
    
    public function addbookdb() {
        //retrieve, sanitize, and escape all fields from the form
        $book_title = trim(filter_input(INPUT_GET, 'title', FILTER_SANITIZE_STRING));
        $genre = trim(filter_input(INPUT_GET, 'genre', FILTER_SANITIZE_STRING));
        $author_id = trim(filter_input(INPUT_GET, 'author', FILTER_SANITIZE_NUMBER_INT));
        $publisher_id = trim(filter_input(INPUT_GET, 'publisher', FILTER_SANITIZE_NUMBER_INT));
        $copies = trim(filter_input(INPUT_GET, 'copies', FILTER_SANITIZE_NUMBER_INT));
        $ISBN = trim(filter_input(INPUT_GET, 'isbn', FILTER_SANITIZE_NUMBER_INT));
        $cost = trim(filter_input(INPUT_GET, 'cost', FILTER_SANITIZE_STRING));
        $descr = trim(filter_input(INPUT_GET, 'descr', FILTER_SANITIZE_STRING));

        $book = $this->book_model->book_add($book_title,$genre,$author_id,$publisher_id,$copies,$ISBN,$cost,$descr);

        $view = new CatalogAddBook();
        $view->display($book);
    }

    public function update() {
        //retrieve, sanitize, and escape all fields from the form
        $book_id = trim(filter_input(INPUT_GET, 'book_id', FILTER_SANITIZE_NUMBER_INT));
        $book_title = trim(filter_input(INPUT_GET, 'title', FILTER_SANITIZE_STRING));
        $genre = trim(filter_input(INPUT_GET, 'genre', FILTER_SANITIZE_STRING));
        $author_id = trim(filter_input(INPUT_GET, 'author', FILTER_SANITIZE_NUMBER_INT));
        $publisher_id = trim(filter_input(INPUT_GET, 'publisher', FILTER_SANITIZE_NUMBER_INT));
        $copies = trim(filter_input(INPUT_GET, 'copies', FILTER_SANITIZE_NUMBER_INT));
        $ISBN = trim(filter_input(INPUT_GET, 'isbn', FILTER_SANITIZE_NUMBER_INT));
        $cost = trim(filter_input(INPUT_GET, 'cost', FILTER_SANITIZE_STRING));
        $descr = trim(filter_input(INPUT_GET, 'descr', FILTER_SANITIZE_STRING));

        $book = $this->book_model->book_update($book_id,$book_title,$genre,$author_id,$publisher_id,$copies,$ISBN,$cost,$descr);

        $view = new CatalogUpdate();
        $view->display($book);
    }

    public function logout() {
        $view = new CatalogLogout();
        $view->display();
    }

    public function register() {
        //retrieve, sanitize, and escape all fields from the form
        $login_id = trim(filter_input(INPUT_POST, 'login_id', FILTER_SANITIZE_STRING));
        $first_name = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING));
        $last_name = trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING));
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        $street_num = trim(filter_input(INPUT_POST, 'street_num', FILTER_SANITIZE_NUMBER_INT));
        $street_name = trim(filter_input(INPUT_POST, 'street_name', FILTER_SANITIZE_STRING));
        $city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING));
        $state = trim(filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING));
        $zip = trim(filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_NUMBER_INT));
        if(filter_has_var(INPUT_POST, 'permissions_id')){
            $permissions_id = trim(filter_input(INPUT_POST, 'permissions_id', FILTER_SANITIZE_NUMBER_INT));
        } else {
            $permissions_id = 1;
        }

        if(empty($login_id) or empty($first_name)) {
            $view = new CatalogRegister();
            $view->display();
        } else {
            $this->book_model->register($login_id, $first_name, $last_name, $password, $street_num, $street_name, $city, $state, $zip, $permissions_id);
            $view = new CatalogLogin();
            $view->display();
        }
    }

    public function admin() {
        $view = new CatalogAdmin();
        $view->display();
    }

    public function cart() {
        $book = $this->book_model->view_cart();

        $view = new CatalogCart();
        $view->display($book);

    }

    public function addtocart() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //retrieve session variable named cart and store it
        if(isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        } else {
            $cart = array();
        }

        //if book id cannot be found, terminate script.
        if (!filter_has_var(INPUT_GET, 'id')) {
            $error = "Book id not found. Operation cannot proceed.<br><br>";
            $view = new CatalogAddCart();
            $view->display($error);
        }

        //retrieve book id and make sure it is a numeric value.
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if (!is_numeric($id)) {
            $error = "Invalid book id. Operation cannot proceed.<br><br>";
            $view = new CatalogAddCart();
            $view->display($error);
        }

        if (array_key_exists($id, $cart)) {
            $cart[$id] = $cart[$id] + 1;
        } else {
            $cart[$id] = 1;
        }

        //update the session variable
        $_SESSION['cart'] = $cart;

        $error = "none";
        $view = new CatalogAddCart();
        $view->display($error);
    }

    public function checkout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //empty the cart
        $_SESSION['cart'] = array();

        $view = new CatalogCheckout();
        $view->display();
    }

    public function listusers() {
        $users = $this->book_model->list_users();

        $view = new CatalogListUsers();
        $view->display($users);
    }

    public function adduser() {
        if(isset($_POST['login_id'])) {
            //retrieve, sanitize, and escape all fields from the form
            $login_id = trim(filter_input(INPUT_POST, 'login_id', FILTER_SANITIZE_STRING));
            $first_name = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING));
            $last_name = trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING));
            $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
            $street_num = trim(filter_input(INPUT_POST, 'street_num', FILTER_SANITIZE_NUMBER_INT));
            $street_name = trim(filter_input(INPUT_POST, 'street_name', FILTER_SANITIZE_STRING));
            $city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING));
            $state = trim(filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING));
            $zip = trim(filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_NUMBER_INT));
            if(filter_has_var(INPUT_POST, 'permissions_id')){
                $permissions_id = trim(filter_input(INPUT_POST, 'permissions_id', FILTER_SANITIZE_NUMBER_INT));
            } else {
                $permissions_id = 1;
            }

            $users = $this->book_model->add_user($login_id, $first_name, $last_name, $password, $street_num, $street_name, $city, $state, $zip, $permissions_id);



            $process = 1;

            $view = new CatalogAddUser();
            $view->display($process);
        } else {
            $process = 2;
            $view = new CatalogAddUser();
            $view->display($process);
        }
    }

    public function edituser() {

        if(isset($_POST['login_id'])) {

            //retrieve, sanitize, and escape all fields from the form
            $user_id = trim(filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_STRING));
            $login_id = trim(filter_input(INPUT_POST, 'login_id', FILTER_SANITIZE_STRING));
            $first_name = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING));
            $last_name = trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING));
            $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
            $street_num = trim(filter_input(INPUT_POST, 'street_num', FILTER_SANITIZE_NUMBER_INT));
            $street_name = trim(filter_input(INPUT_POST, 'street_name', FILTER_SANITIZE_STRING));
            $city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING));
            $state = trim(filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING));
            $zip = trim(filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_NUMBER_INT));
            if (filter_has_var(INPUT_POST, 'permissions_id')) {
                $permissions_id = trim(filter_input(INPUT_POST, 'permissions_id', FILTER_SANITIZE_NUMBER_INT));
            } else {
                $permissions_id = 1;
            }
            $this->book_model->edit_user($user_id, $login_id, $first_name, $last_name, $password, $street_num, $street_name, $city, $state, $zip, $permissions_id);
            $user = $this->book_model->get_user($user_id);

            $process = 1;
            $view = new CatalogEditUser();
            $view->display($user, $process);
        } else {
            $id = trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING));
            $process = 2;
            $user = $this->book_model->get_user($id);

            $view = new CatalogEditUser();
            $view->display($user, $process);
        }
    }

    public function removeuser() {
        $id = trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING));
        $this->book_model->remove_user($id);

        $view = new CatalogRemoveUser();
        $view->display();
    }

    /*
    //show details of a movie
    public function detail($id) {
        //retrieve the specific movie
        $movie = $this->book_model->view_movie($id);
        if (!$movie) {
        //display an error
            $message = "There was a problem displaying the movie id='" . $id . "'.";
            $this->error($message);
            return;
        }
        //display movie details
        $view = new MovieDetail();
        $view->display($movie);

    }
    */

    //handle an error
    public function error($message) {
        //create an object of the Error class
        $error = new MovieError();
        //display the error page
        $error->display($message);

    }


    //search movies
    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['search-terms']);

        //if search term is empty, list all movies
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching movies
        $movies = $this->book_model->search_book($query_terms);

        if ($movies === false) {
       //handle error
            $message = "there were no books";
            $this->error($message);
            return;
       }
        //display matched movies
        $search = new CatalogSearch();
        $search->display($query_terms, $movies);
    }

    //autosuggestion
    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $movies = $this->book_model->search_book($query_terms);

        //retrieve all movie titles and store them in an array
        $titles = array();
        if ($movies) {
            foreach ($movies as $movie) {
                $titles[] = $movie->getTitle();
            }
        }

        echo json_encode($titles);
    }

/*
    //handle calling inaccessible methods
    public function __call($name, $arguments) {
        //$message = "Route does not exist.";
        // Note: value of $name is case sensitive.
        $message = "Calling method '$name' caused errors. Route does not exist.";

        $this->error($message);
        return;
    }

    //display a movie in a form for editing
/*
    public function edit($id) {
        //retrieve the specific movie
        $movie = $this->book_model->view_movie($id);

        if (!$movie) {
            //display an error
            $message = "There was a problem displaying the movie id='" . $id . "'.";
            $this->error($message);
            return;
        }

        $view = new MovieEdit();
        $view->display($movie);
    }

    //update a movie in the database
    public function update($id) {
        //update the movie
        $update = $this->book_model->update_movie($id);
        if (!$update) {
            //handle errors
            $message = "There was a problem updating the movie id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display the updateed movie details
        $confirm = "The movie was successfully updated.";
        $movie = $this->book_model->view_movie($id);

        $view = new MovieDetail();
        $view->display($movie, $confirm);
    }
*/

}
