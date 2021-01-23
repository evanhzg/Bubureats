<div class="container">
    <?php
    echo parse('restaurant-header.html', $restaurant);
    ?>
    <h2>Nos plats</h2>
    <div class="row liste-plats">
        <?php
        foreach($plats as $plat){
            echo parse('plats-small.html', $plat);
        }
        ?>
    </div>
</div>