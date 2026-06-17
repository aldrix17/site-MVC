<?php
require_once __DIR__ . '/Modele.php';
class Billet extends Modele {
    public function getBillets(){
        $pdo = self::getPDO();
        $stmt = $pdo->query("SELECT * FROM t_billet ORDER BY BIL_DATE DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getBillet($idBillet){
        $pdo = self::getPDO();
        $stmt = $pdo->prepare("SELECT * FROM t_billet WHERE BIL_ID = :id");
        $stmt->execute([':id' => $idBillet]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}