<?php
require_once "../core/Database.php";
class User extends Database {
    public function login($u,$p) {
        return $this->conn->query(
            "SELECT * FROM users WHERE username='$u' AND password=MD5('$p')"
        )->fetch_assoc();
    }
}
