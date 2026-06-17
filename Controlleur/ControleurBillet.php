<?php
require_once __DIR__ . '/../Modele/Billet.php';
require_once __DIR__ . '/../Modele/Commentaire.php';
require_once __DIR__ . '/../Vue/Vue.php';

class ControleurBillet {
    private $billet;
    private $commentaire;

    public function __construct(){
       $this->billet = new Billet();
       $this->commentaire = new Commentaire();
    }

    public function billet($idBillet){
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);

        Vue::generer('Vue/vueBillet.php', [
            'billet' => $billet,
            'commentaires' => $commentaires
        ]);
    }

    public function commenter($auteur, $contenu, $idBillet){
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);

        header("Location: index.php?action=billet&id=" .$idBillet);
        exit();
    }
}