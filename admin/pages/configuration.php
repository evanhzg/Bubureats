<h1 class="text-center my-4">Délai de livraison actuel: <strong class="text-primary"><?php echo TEMPS_LIVRAISON, "mn"; ?></strong></h1>

<form class="container mb-4 w-50" method="post">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text bg-primary text-white">Heures</span>
        </div>
        <input type="number" class="form-control" name="temps_heures" id="temps_heures" aria-label="Combien d'heures?" placeholder="<?php echo round(TEMPS_LIVRAISON/60); ?>">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text bg-primary text-white">Minutes</span>
        </div>
        <input type="number" class="form-control" name="temps_minutes" id="temps_minutes" aria-label="Combien de minutes?" placeholder="<?php echo TEMPS_LIVRAISON%60; ?>">
    </div>
    <input type="hidden"name="_form" value="formEditLivraison">
    <button class="btn btn-success btn-block" type="submit">Enregistrer le délai</button>
</form>


<h1 class="text-center my-4">Frais de commission actuels: <strong class="text-primary"><?php echo MONTANT_COMMISSION, "€"; ?></strong></h1>

<form class="container mb-4 w-50" method="post">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text bg-primary text-white">Euros</span>
        </div>
        <input type="number" step="0.01" class="form-control" name="montant_commission" id="montant_commission" aria-label="Quel montant?" placeholder="<?php echo MONTANT_COMMISSION; ?>">
    </div>
    <input type="hidden" name="_form" value="formEditCommission">
    <button class="btn btn-success btn-block" type="submit">Enregistrer les frais</button>
</form>