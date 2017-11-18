<?php
namespace \model\ballon;

class Tir{
    protected $objet;
    protected $score1;
    protected $score2;

    public function __construct(){
        $this->objet=array();
    }

    public function ajouter($leballon){
        array_push($this->objet, $leballon);
    }

    public function initscore(){
        $_SESSION['score1']=0;
        $_SESSION['score2']=0;
    }


    public function tirer(){
        foreach ($this->objet as $k => $v){  // $v est un objet
            return $v->avance();
        };
    }

    public function ajouterPoint(){
        $equip = $_GET["equip"];
        if($equip==1) {
            $_SESSION['score1']++;
        }
        else {
            $_SESSION['score2']++;
        }
    }

    public function afficherbtnDepart () //Bouton premier tir
    {
        echo "<a href='?idtir=1&pret=0&equip=1'>Commencer la séance de tir au but</a>";
    }
    public function afficherbtnTirer ()     //Bouton pour tirer
    {
        $equip = $_GET["equip"];
        $idtir = $_GET["idtir"];

        if ($equip == 1) { //Changement d'équipe
            $equip = 2;
        } else {
            $equip = 1;
        }
        if (!isset($_GET["fin"])){
            echo "<a href='?idtir=" . ($idtir) . "&pret=1&equip=" . $equip . "'>Préparer le tir suivant</a></br>";
            return $this->afficherbtnStopPartie();
      }
    }
    public function afficherbtnPrepare ()   //Bouton pour préparer le prochain tire
    {
      if (!isset($_GET["fin"])){
          $equip = $_GET["equip"];
          $idtir = $_GET["idtir"];


          $chaine = "Au tour de l'équipe ". $equip . " de ";
          $chaine .= "<a href='?idtir=" . ($idtir + 1) . "&pret=0&equip=" . $equip . "'>tirer</a></br>";

          return $chaine;
      }
    }

    public function afficherscore ()
    {
        $score = "score de l'équipe 1 :" . $_SESSION['score1']."</br>";
        $score .= "score de l'équipe 2 :" . $_SESSION['score2']."</br>";
        return $score;
    }

    public function afficherbtnStopPartie () //Bouton Finir la partie
    {
        $equip = $_GET["equip"];
        $idtir = $_GET["idtir"];
        $html = "<p>Si vous pensez que il y a un gagnant cliquer sur  ''Finir la partie''</p>";
        $html .= "<a href='?idtir=" . ($idtir) . "&pret=1&equip=" . $equip . "&fin'>Finir la partie</a>";
        return $html;
    }

    public function affichermessage()
    {
        if (isset($_GET["fin"])){
          if ($_GET["idtir"]<5){
          echo "Il n'y a pas eu assez de tir pour finir le match, Vous avez perdu";
          echo $this->afficherbtndepart();
          echo $this->initscore();

        }
    }
}
}
