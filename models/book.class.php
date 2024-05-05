<?php

/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * Name: book.class.php
 * Description: the Movie class models a real-world movie.
 */

class Book {
    //private data members
    private $id, $title, $genre, $author, $author_id, $publisher, $publisher_id, $price, $ISBN, $descr, $copies;


    public function __construct($id, $title, $genre, $author, $author_id, $publisher, $publisher_id, $price, $ISBN, $descr, $copies) {
        $this->id = $id;
        $this->title = $title;
        $this->genre = $genre;
        $this->author = $author;
        $this->author_id = $author_id;
        $this->publisher = $publisher;
        $this->publisher_id = $publisher_id;
        $this->price = $price;
        $this->ISBN = $ISBN;
        $this->descr = $descr;
        $this->copies = $copies;
    }
	
	//get the movie id
    public function getId() {
        return $this->id;
    }

	//get the movie title
    public function getTitle() {
        return $this->title;
    }

	//get the movie rating
    public function getGenre() {
        return $this->genre;
    }
	
	//get the movie release date
    public function getAuthor() {
        return $this->author;
    }

    public function getPublisher() {
        return $this->publisher;
    }

	//get the movie director
    public function getPrice() {
        return $this->price;
    }

	//get the movie image file name
    public function getISBN() {
        return $this->ISBN;
    }

    public function getDescription() {
        return $this->descr;
    }

    public function getCopies() {
        return $this->copies;
    }

    public function getAuthorId() {
        return $this->author_id;
    }

    public function getPublisherId() {
        return $this->publisher_id;
    }

    //set movie id
    public function setId($id) {
        $this->id = $id;
    }
}