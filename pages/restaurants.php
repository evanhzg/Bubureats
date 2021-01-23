<div class="container">
    <h1>Liste des restaurants</h1>
    <div class="card-deck">
        <?php
        foreach($restaurants as $restaurant){
            echo parse('restaurant-small.html', $restaurant);
            //echo '<div><a href="index.php?page=restaurant&restaurant_id=' . $restaurant['id'] . '">' . $restaurant['nom'] . '</a></div>';
        }
        ?>
    </div>
</div>