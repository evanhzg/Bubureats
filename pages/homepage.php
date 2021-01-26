<header class="masthead text-center text-white">
    <div class="masthead-content">
      <div class="container">
        <h1 class="masthead-heading mb-0">BUBUR Eats</h1>
        <h2 class="masthead-subheading mb-0">Livraison de miam-miam à la maison!</h2>
      </div>
    <section style="margin: 20em; margin-top: 0; margin-bottom: 0">
      <div id="carousel-hp" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselp" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-hp" data-slide-to="1"></li>
            <li data-target="#carousel-hp" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/re01.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/re02.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/re03.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carousel-hp" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-hp" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
      </div>
    </section>

    <div class="container mt-4">
      <h1>Liste des restaurants</h1>
    <div class="row">
      <?php
      foreach($restaurants as $restaurant){
          echo parse('restaurant-small.html', $restaurant);
      }
      ?>
    </div>


    <a href="index.php?page=restaurants" class="btn btn-primary btn-xl rounded-pill mt-5">Voir tous les restaurants</a>

</div>
  
</header>