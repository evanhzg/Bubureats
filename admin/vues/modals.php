<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            <form method="post">
                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="email" class="form-control" id="mail" aria-describedby="emailHelp" name="mail">
                    <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas vos informations personnelles.</small>
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