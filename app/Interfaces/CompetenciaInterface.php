<?php

   namespace App\Interfaces;

   interface CompetenciaInterface extends BaseInterface
   {

        public function findByCode(int $codigo);
        public function findByName(strign $nombre);
        public function findByHour(int $horas);
        public function findByHourAndName(int $horas,strign $nombre);
        

   }



?>