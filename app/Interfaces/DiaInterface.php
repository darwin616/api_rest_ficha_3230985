<?php

    namespace App\Interfaces;

    interface DiaInterface extends BaseInterface{
        public function findByName(string $nombre);
        public function findByOrder(string $orden);
    }

?>