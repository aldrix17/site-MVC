<?php
require_once __DIR__ . '/../Modele/Billet.php';
require_once __DIR__ . '/../Vue/Vue.php';

class ControleurAccueil{
    private $billet;
    public function __construct(){
        $this->billet = new Billet();
    }
    public function accueil(){
        $billets = $this->billet->getBillets();

        Vue::generer('Vue/vueAccueil.php', [
            'billets' => $billets
        ]);
    }
}