<div class="container">
    <?php
    foreach($restaurants as $restaurant){
        echo parse('restaurant-small.html', $restaurant);
        //echo '<div><a href="index.php?page=restaurant&restaurant_id=' . $restaurant['id'] . '">' . $restaurant['nom'] . '</a></div>';
    }
    ?>
</div>