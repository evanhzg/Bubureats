<div class="media">
    <img src="{{photo}}" class="w-25 mb-1 mr-2" alt="{{nom}}">
    <div class="media-body">
        <div>
            {{nom}} (x{{quantite}})
        </div>
        <div>
            {{prix}}€
        </div>
        <div>
            <a href="index.php?page=restaurant&restaurant_id=<?php echo $restaurant['id']; ?>&retirerplat=<?php echo $id_plat?>" class="btn btn-lg btn-danger">Retirer</a>
        </div>
    </div>
</div>