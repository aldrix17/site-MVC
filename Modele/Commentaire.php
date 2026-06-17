<?php
require_once __DIR__ . '/Modele.php';
class Commentaire extends Modele {
    public function getCommentaires($idBillet){
        $pdo = self::getPDO();
        $stmt = $pdo->prepare(
            "SELECT * FROM t_commentaire WHERE BIL_ID = :id ORDER BY COM_DATE ASC"
        );
        $stmt->execute([':id' => $idBillet]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function ajouterCommentaire($auteur, $contenu, $idBillet){
        $pdo = self::getPDO();
        $stmt = $pdo->prepare(
            "INSERT INTO t_commentaire (COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)
            VALUES (NOW(), :auteur, :contenu, :idBillet)"
        );
        $stmt->execute([
            ':auteur' => $auteur,
            ':contenu' => $contenu,
            ':idBillet' => $idBillet
        ]);
    }
}