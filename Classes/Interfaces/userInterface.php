<?php
    namespace Classes\Interfaces;
    interface UserInterface {
        public  function getById(int $id) : array|null;
        public  function getByEmail( $email) : array|null;
    }

?>
