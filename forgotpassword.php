<?php include('includes/header.php');?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <form method="post" id="forgotpasswordform">
                    <h5 class="text-danger">
                        Mot de passe oublié ? Entrer votre email adresse: 
                    </h5>
                    <div class="form-group">
                        <label for="forgotemail">Email:</label>
                        <input class="form-control" type="email" name="forgotemail" id="forgotemail" placeholder="Email" maxlength="50">
                    </div>
                    <button type="button" class="btn btn-success">
                        Valider
                    </button>  
                </form>
            </div>              
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>