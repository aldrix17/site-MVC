<?php
class Vue{
    public static function generer($fichierVue, $variable = []){
        extract($variable);
        ob_start();
        require dirname(__DIR__) . '/' . $fichierVue;
        $contenu = ob_get_clean();
        require __DIR__ . '/gabarit.php';
    }
}