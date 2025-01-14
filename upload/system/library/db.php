<?php
class DB {
    private $db;

    public function __construct($type, $hostname, $username, $password, $database) {
        $file = DIR_SYSTEM . 'library/database/' . $type . '.php';

        if (file_exists($file)) {
            require_once($file);

            $class = 'DB' . $type;

            $this->db = new $class($hostname, $username, $password, $database);
        } else {
            exit('Error: Could not load database file ' . $type . '.php !');
        }
    }

    public function query($sql) {
        return $this->db->query($sql);
    }

    public function escape($value) {
        return $this->db->escape($value);
    }

    public function countAffected() {
        return $this->db->countAffected();
    }

    public function getLastId() {
        return $this->db->getLastId();
    }
}