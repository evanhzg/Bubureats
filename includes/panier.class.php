<?php
class Panier {

    public $plats = [];
    public $totaux = [];
    public $status = null;
    public $id_restaurant = null;
    public $nom_restaurant = null;
    public $erreur = null;

    function __construct()
    {
        if(isset($_SESSION['panier'])){
            $this->plats = $_SESSION['panier']['plats'];
            $this->totaux = $_SESSION['panier']['totaux'];
            $this->status = $_SESSION['panier']['status'];
            $this->id_restaurant = $_SESSION['panier']['id_restaurant'];
            $this->nom_restaurant = $_SESSION['panier']['nom_restaurant'];
        }
        $this->totalCommande();
    }

    public function ajoutPlat($id_plat, $quantite = 1, $id_restaurant = null){
        $alert = null;
        $membres = db_get('membres', $_SESSION['id']);
        $plat = db_get('plats', $id_plat)[0];
        $prix_plat = $plat['prix'];
        $totaux = $this->totaux['montant'];

        if(isset($_SESSION['panier']) && $_SESSION['panier']['id_restaurant'] != $id_restaurant){
            $this->erreur = "Veuillez terminer ou annuler votre commande en cours avant d'en recommencer une autre.";
        }
        else if($membres[0]['solde'] < ($totaux + $prix_plat)){
            $this->erreur = "Solde insuffisant pour ajouter cet article.";
        }
        else{
            if (isset($this->plats[$id_plat])) {
                $this->plats[$id_plat]['quantite'] += $quantite;
            }
            else {
                $this->plats[$id_plat] = db_get('plats', $id_plat)[0];
                $this->plats[$id_plat]['quantite'] =  $quantite;
            }
            $this->id_restaurant = $id_restaurant;
            $this->nom_restaurant = db_get('restaurants', $id_restaurant)[0]['nom']; 
            $this->enregistrerPanier();
        }
        $this->totalCommande();
        return $this->erreur;
    }

    public function retirerPlat($id_plat){
        $this->plats[$id_plat]['quantite'] = 0;
        unset($this->plats[$id_plat]);
        $this->enregistrerPanier();
    }

    public function totalCommande(){
        $total = [
            'horscommission' => 0,
            'commission' => 0,
            'montant' => 0,
            'nombredeplats' => 0
        ];
        foreach($this->plats as $plat){
            $total['horscommission'] += $plat['prix'] * $plat['quantite'];
            $total['nombredeplats'] += $plat['quantite'];
        }
        $total['commission'] = count($this->plats) > 0 ? MONTANT_COMMISSION : 0;
        $total['montant'] =  $total['horscommission'] + $total['commission'];
        $this->totaux = $total;
    }

    public function viderPanier($redirect = true){
        unset($_SESSION['panier']);
        if($redirect == true){
            header('Location: index.php?page=' . $_GET['page'] . '&restaurant_id=' . $_GET['restaurant_id']);
        }
    }

    public function finaliserPanier(){
        $this->totalCommande();
        $commande = [
            'plats' => json_encode($this->plats),
            'nombre_plats' => $this->totaux['nombredeplats'],
            'total_ht' => $this->totaux['horscommission'],
            'montant_commission' => $this->totaux['commission'],
            'id_client' => $_SESSION['id'],
            'id_restaurant' => $this->id_restaurant,
            'statut' => 'atraiter'
        ];
        $membre = db_get('membres', $_SESSION['id']);
        $montant = $commande['montant_commission'] + $commande['total_ht'];

        $solde = $membre[0]['solde'];
        $reducsolde = ['solde' => $solde-$montant];
        $insert = db_insert('commandes', $commande);

        if($insert['success'] == true){

            $this->viderPanier(false);
            db_update('membres', $_SESSION['id'], $reducsolde);

            $restaurant = db_get('restaurant', $this->id_restaurant)[0];
            //$mail = envoiEmail($restaurant['email'],ADMIN_EMAIL, 'Nouvelle commande', 'Vous avez une nouvelle commande. Veuillez vous connecter à votre espace restaurateur.');
            
            header("Location: index.php?page=merci&commande=" . $insert['insertId']);

        }
    }

    private function enregistrerPanier(){
        $this->totalCommande();        
        $_SESSION['panier'] = [
            'plats' => $this->plats,
            'totaux' => $this->totaux,
            'status' => $this->status,
            'id_restaurant' => $this->id_restaurant,
            'nom_restaurant' => $this->nom_restaurant
        ];
    }
}