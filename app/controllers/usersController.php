<?php
require_once __DIR__ . "/../models/users.php";

class UsersController {
    public function index() {
        $user = new User();
        $users = $user->getAll();
        require_once __DIR__ . "/../views/users/index.php";
    }
}
?>
