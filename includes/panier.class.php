<?php
class Panier {

    public $plats = [];
    public $totaux = [];
    public $status = null;
    public $id_restaurant = null;

    function __construct()
    {
        if(isset($_SESSION['panier'])){
            $this->plats = $_SESSION['panier']['plats'];
            $this->totaux = $_SESSION['panier']['totaux'];
            $this->status = $_SESSION['panier']['status'];
            $this->id_restaurant = $_SESSION['panier']['id_restaurant'];
        }
    }

    public function ajoutPlat($id_plat, $quantite = 1){
        if  (isset($this->plats[$id_plat])) {
            $this->plats[$id_plat]['quantite'] += $quantite;
        }
        else {
            $this->plats[$id_plat] = db_get('plats', $id_plat)[0];
            $this->plats[$id_plat]['quantite'] =  $quantite;
        }
        $this->enregistrerPanier();
    }

    public function totalCommande(){

    }

    public function viderPanier(){
        
    }

    public function finaliserPanier(){

    }

    private function enregistrerPanier(){
        $_SESSION['panier'] = [
            'plats' => $this->plats,
            'totaux' => $this->totaux,
            'status' => $this->status,
            'id_restaurant' => $this->id_restaurant,
        ];
    }
}