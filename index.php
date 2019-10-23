<?php include('includes/header.php');?>
    <div class="container">
        <div class="row" align="center">
            <div class="col-md-8 col-md-offset-3 header">
                <h1 class="text-left">En voiture !</h1>    
                <p class="text-left lead">Prenez la route en bonne compagnie.</p>
            </div>    
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-3">
                <form action="search.php" method="post" class="form-horizontal" id="searchForm">
                    <div class="form-group">
                        <label for="">Départ</label>
                        <input type="text" class="form-control" name="from" id="from" placeholder="Départ">
                    </div>
                    <div class="form-group">
                        <label for="">Destination</label>
                        <input type="text" class="form-control" name="to" id="to" placeholder="Arrivée">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Recherche</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div id="map">

                </div>
            </div>    
        </div>
    </div>
<?php include('includes/footer.php');?>