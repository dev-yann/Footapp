<?php

namespace controller\ballon;
Use controller\abstractController8Interface\Iaffichable;

class Ballon implements Iaffichable{

    protected $nom;
    protected $y=400;
    protected $x=45;
    protected $width;
    protected $vitesse;
    protected $image;


    function __construct($nom, $width, $vitesse){
        $this->nom = $nom;
        $this->width = $width;
        $this->vitesse = $vitesse;
    }

    public function afficherBallon (){

        $ch = '<div style="width:100%; height:500px; margin:auto; background-color: red;">';       // Le terrain de jeu
        $ch .= '<div style="width:45%; height:500px; margin:auto; background-color: darkgreen;">';         // Le but
        $ch .= '<img src="'.$this->image.'" alt="Ballon" style="width:'.$this->width.'px; position: absolute; top :'.$this->y.'px; left :'.$this->x.'%;">';            // Le ballon
        $ch .= '</div>';
        $ch .= '</div>';
        return $ch;
    }

    public function image($img){
        $this->image=$img;
    }
    public function avance(){
        $random = rand (0,90);
        $this->x = $random;
        $this->y = ($this->y+45);
        $this->width = 50;
        return $random;
    }

    public function nom(){
        return $this->nom;
    }

    public function x(){
        return $this->x;
    }

    public function width(){
        return $this->width;
    }

    public function height(){
        return $this->height;
    }
}
