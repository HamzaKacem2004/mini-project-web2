<?php
class Session {
    public function __construct() {
        session_start();
        if (!isset($_SESSION['visites'])) {
            $_SESSION['visites'] = 0;
        }
    }
    public function incrementerVisite() {
        $_SESSION['visites']++;
    }
    public function getNombreVisites() {
        return $_SESSION['visites'];
    }
    public function reinitialiserSession() {
        session_destroy();
        session_start();
        $_SESSION['visites'] = 0;
    }
}
?>