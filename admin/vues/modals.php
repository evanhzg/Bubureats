<!-- Modal nouveau membre-->
<div class="modal fade" id="nouveaumembre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un membre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="post">
                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="email" class="form-control" id="mail" aria-describedby="emailHelp" name="mail">
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom">
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse">
                </div>
                <div class="form-group">
                    <label for="motdepasse">Mot de passe</label>
                    <input type="password" class="form-control" id="motdepasse" name="motdepasse">
                </div>
                <div class="form-group">
                    <label for="solde">Solde</label>
                    <input type="number" class="form-control" id="solde" name="solde">
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="role" value="client" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline1">Client</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="role" value="restaurateur" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline2" >Restaurateur</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline3" name="role" value="admin" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline3" >Administrateur</label>
                </div>
                <input type="hidden" name="_form" value="formAjoutMembre">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal nouveau plat-->
<div class="modal fade" id="nouveauplat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un plat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="post">
                <div class="form-group">
                    <label for="nom">Nom du plat</label>
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Prix</label>
                    <input type="number" class="form-control" id="prix" name="prix">
                </div>
                <div class="form-group">
                    <label for="adresse">Tags</label>
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

<!-- Modal nouveau restaurant-->
<div class="modal fade" id="nouveaurestaurant" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un restaurant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="post">
                <div class="form-group">
                    <label for="nom">Nom du restaurant</label>
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Nom du restaurateur</label>
                    <select class="form-control" id="id_restaurateur" name="id_restaurateur">
                        <option></option>
                    <?php
                    foreach($restaurateurs as $restaurateur) {
                        echo '<option value="' . $restaurateur['id'] . '">' . $restaurateur['nom'] . '</option>';
                    }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="adresse">Tags</label>
                    <input type="text" class="form-control" id="tags" name="tags">
                </div>
                <div class="form-group">
                    <label for="adresse">Email de contact</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="adresse">Ville</label>
                    <input type="text" class="form-control" id="ville" name="ville">
                </div>
                <div class="form-group">
                    <label for="customFile">Photo</label>
                    <div class="custom-file">
                        <label class="custom-file-label" for="customFile"></label>
                        <input type="file" class="custom-file-input" id="customFile">
                    </div>
                </div>
                <input type="hidden" name="_form" value="formAjoutRestaurant">
                <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>