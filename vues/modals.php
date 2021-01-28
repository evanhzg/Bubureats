
<!-- Modal nouveau plat-->
<div class="modal fade text-dark" id="nouveauplat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un plat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="post" action="index.php?page=profil-restaurant">
                <div class="form-group">
                    <label for="nom">Nom du plat</label>
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input type="number" step="0.01" class="form-control" id="prix" name="prix">
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <input type="text" class="form-control" id="tags" name="tags">
                </div>
                <div class="form-group">
                    <label for="customFile">Photo</label>
                    <div class="custom-file">
                        <label class="custom-file-label" for="customFile"></label>
                        <input type="file" class="custom-file-input" id="customFile">
                    </div>
                </div>
                <input type="hidden" name="id_restaurant" value="<?php echo $restaurant['id']; ?>">
                <input type="hidden" name="_form" value="formAjoutPlat">
                <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['edit_plat'])) {
    $plats = db_get('plats', $_GET['edit_plat'])[0];
?>
<!-- Modal edit plat-->
<div class="modal fade text-dark open" id="nouveauplat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier un plat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="post" action="index.php?page=profil-restaurant">
                <div class="form-group">
                    <label for="nom">Nom du plat</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $plat['nom'];?>">
                </div>
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input type="number" step="0.01" class="form-control" id="prix" name="prix" value="<?php echo $plat['prix'];?>">
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <input type="text" class="form-control" id="tags" name="tags" value="<?php echo $plat['tags'];?>">
                </div>
                <div class="form-group">
                    <label for="customFile">Photo</label>
                    <div class="custom-file">
                        <label class="custom-file-label" for="customFile"></label>
                        <input type="file" class="custom-file-input" id="customFile" value="<?php echo $plat['photo'];?>">
                    </div>
                </div>
                <input type="hidden" name="id_restaurant" value="<?php echo $restaurant['id']; ?>">
                <input type="hidden" name="_form" value="formEditPlat">
                <input type="hidden" name="_id" value="<?php echo $plat['id'];?>">
                <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<?php
}