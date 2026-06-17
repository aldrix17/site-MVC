<?php
require_once __DIR__ . '/ControleurAccueil.php';
require_once __DIR__ . '/ControleurBillet.php';
require_once __DIR__ . '/../Vue/Vue.php';

class Routeur {

    private $controleurAccueil;
    private $controleurBillet;

    // Constructeur : crée les deux contrôleurs
    public function __construct() {
        $this->controleurAccueil = new ControleurAccueil();
        $this->controleurBillet  = new ControleurBillet();
    }

    // Analyse la requête et exécute l'action correspondante
    public function routerRequete() {

        // Lire le paramètre "action" dans l'URL (GET)
        $action = $this->getParametre($_GET, 'action');

        if ($action === null) {
            // Pas d'action → page d'accueil
            $this->controleurAccueil->accueil();

        } elseif ($action === 'billet') {
            // Action "billet" → afficher un billet
            $id = $this->getParametre($_GET, 'id');

            if ($id === null) {
                $this->erreur("Paramètre 'id' absent");

            } elseif (!is_numeric($id)) {
                $this->erreur("Identifiant de billet non valide");

            } else {
                $this->controleurBillet->billet((int)$id);
            }

        } elseif ($action === 'commenter') {
            // Action "commenter" → ajouter un commentaire (POST)
            $auteur   = $this->getParametre($_POST, 'auteur');
            $contenu  = $this->getParametre($_POST, 'contenu');
            $idBillet = $this->getParametre($_POST, 'id');

            if ($auteur === null || $contenu === null || $idBillet === null) {
                $this->erreur("Paramètres du commentaire manquants");
            } else {
                $this->controleurBillet->commenter($auteur, $contenu, (int)$idBillet);
            }

        } else {
            $this->erreur("Action inconnue : " . htmlspecialchars($action));
        }
    }

    // Affiche une page d'erreur
    public function erreur($msgErreur) {
        Vue::generer('Vue/vueErreur.php', [
            'msgErreur' => $msgErreur
        ]);
    }

    // Cherche un paramètre dans un tableau (GET ou POST)
    // Retourne null si absent
    public function getParametre($tableau, $nom) {
        if (isset($tableau[$nom]) && $tableau[$nom] !== '') {
            return $tableau[$nom];
        }
        return null;
    }
}