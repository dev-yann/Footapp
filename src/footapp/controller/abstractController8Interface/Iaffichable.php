<?php
namespace controller\abstractController8Interface\Iaffichable;

interface Iaffichable {
    public function afficherBallon(); // Donc obligatoirement la fct afficher dans les class qui implements Iaffichable
    public function image($img);
}
