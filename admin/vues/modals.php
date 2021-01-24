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
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mail">
                    <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas vos informations personnelles.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nom</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="nom">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Prénom</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="prenom">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Adresse</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="adresse">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="motdepasse">
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="role" value="client" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline1">Client</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="role" value="restaurateur" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline2" >Restaurateur</label>
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