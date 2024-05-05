<?php
/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * File: welcome_controller.class.php
 * Description: This scripts define the class for the welcome controller; this is the default controller.
 * 
 */

class WelcomeController {
    //put your code here
    public function index() {
        $view = new WelcomeIndex();
        $view->display();
    }
}
