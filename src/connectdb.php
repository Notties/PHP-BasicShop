<?php 
    try {
        $db = new PDO("mysql:host=localhost; dbname=shop", 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOEXCEPTION $e) {
        $e->getMessage();
    }
?>