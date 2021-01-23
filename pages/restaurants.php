<div class="container">
    <h1>Liste des restaurants</h1>
    <div class="row">
        <?php
        foreach($restaurants as $restaurant){
            echo parse('restaurant-small.html', $restaurant);
        }
        ?>
    </div>
</div>