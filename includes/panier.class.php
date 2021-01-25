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

    public function ajoutPlat($id_plat, $quantite = 1, $id_restaurant = null){
        if  (isset($this->plats[$id_plat])) {
            $this->plats[$id_plat]['quantite'] += $quantite;
        }
        else {
            $this->plats[$id_plat] = db_get('plats', $id_plat)[0];
            $this->plats[$id_plat]['quantite'] =  $quantite;
        }
        $this->id_restaurant = $id_restaurant;
        $this->enregistrerPanier();
    }

    public function totalCommande(){
        return 10;
    }

    public function viderPanier(){
        
    }

    public function finaliserPanier(){
        $commande  = [
            'plats' => json_encode($this->plats),
            'nombre_plats' => count($this->plats),
            'total_ht' => $this->totalCommande(),
            'montant_commission' => MONTANT_COMMISSION,
            'id_client' => $_SESSION['id'],
            'id_restaurant' => $this->id_restaurant
        ];
        $insert = db_insert('commandes', $commande);
        var_dump($insert);
        var_dump($this->en);
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