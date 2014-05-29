
<?php
session_start();

include 'header.php';
include 'auth.php';

if (filter_input(INPUT_GET, 'form')) {
    if (filter_input(INPUT_GET, 'form') == "incomplet") {
        $msg = "<div class='alert alert-danger'>veillez remplir tous les champs du formulaire</div>";
    } elseif (filter_input(INPUT_GET, 'form') == "mail_exist") {
        $msg = "<div class='alert alert-danger'>vous avez choisi une adresse email qui existe déjà</div>";
    }
    echo $msg;
}
?>

    <div class="panel panel-warning col-lg-offset-1 col-lg-10 col-lg-offset-1">
    <div class="panel-heading">
        <h3 class="panel-title titre">Edition d'un salarié</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" action="save_salarie.php" method="post">
            <input type="hidden" name="auteur" value="<?php echo $_SESSION["NAME"]; ?>">
            <div class="form-group">
                <label for="nom_sal" class="col-sm-2 control-label">Nom du salarié</label>
                <div class="col-sm-10">
                    <input type="text" name="nom_sal" class="form-control" id="nom_sal" required placeholder="Nom du salarié">
                </div>
            </div>
            <div class="form-group">
                <label for="prenom_sal" class="col-sm-2 control-label">Prénom du salarié</label>
                <div class="col-sm-10">
                    <input type="text" name="prenom_sal" class="form-control" id="prenom_sal" required placeholder="Prénom du salarié">
                </div>
            </div>
            <div class="form-group">
                <label for="bdate" class="col-sm-2 control-label">Date de naissance</label>
                <div class="col-sm-10">
                    <input type="date" name="bdate_sal" class="form-control" id="bdate" required placeholder="Date de naissance">
                </div>
            </div>
            <div class="form-group">
                <label for="nationalite" class="col-sm-2 control-label">Nationalité</label>
                <div class="col-sm-10">
                    <input type="text" name="nation_sal" class="form-control" id="nationalite" required placeholder="Mot de passe">
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" required placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="addresspicker_map" class="col-sm-2 control-label">Adresse</label>
                <div class="col-sm-10">
                    <input type="text" name="ad_sal" class="form-control" id="addresspicker_map" required placeholder="Adresse">
                </div>
<!--                <div class="row">
                    <div class='col-sm-offset-2 col-sm-5'>
                        <div class="form-group">
                            <label class="">Localité: </label>
                            <input class="pull-right"  id="locality" disabled=disabled>
                        </div>
                        <div class="form-group">
                            <label class="">Région: </label>
                            <input class="pull-right" id="administrative_area_level_1" disabled=disabled> <br/>
                        </div>
                        <div class="form-group">
                            <label class="">Pays: </label> 
                            <input class="pull-right" id="country" disabled=disabled>
                        </div>
                        <div class="form-group">
                            <label class="">C.P: </label> 
                            <input class="pull-right" id="postal_code" disabled=disabled>
                        </div>
                        <div class="form-group">
                            <label class="">Lat: </label> 
                            <input class="pull-right" id="lat" disabled=disabled> 
                        </div>
                        <div class="form-group">
                            <label class="">Lng: </label> 
                            <input class="pull-right" id="lng" disabled=disabled>
                        </div>
                        <div class="form-group">
                            <label class="">Type: </label> 
                            <input class="pull-right" id="type" disabled=disabled /> 
                        </div>
                    </div>
                    <div class='col-sm-5 cadre'>
                        <div id="map_adr"></div>
                    </div>
                </div>-->
            </div>
            <hr/>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Valider</button>
                    <button type="reset" class="btn btn-danger col-sm-offset-2">Annuler</button>
                </div>
            </div>
        </form>  </div>
</div>


<script>
    $(function() {
        $("#bdate").datepicker();

        var addresspickerMap = $("#addresspicker_map").addresspicker({
            componentsFilter: 'country:FR',
            updateCallback: showCallback,
            mapOptions: {
                zoom: 4,
                center: new google.maps.LatLng(48, 2),
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            },
            elements: {
                map: "#map_adr",
                lat: "#lat",
                lng: "#lng",
                street_number: '#street_number',
                route: '#route',
                locality: '#locality',
                administrative_area_level_2: '#administrative_area_level_2',
                administrative_area_level_1: '#administrative_area_level_1',
                country: '#country',
                postal_code: '#postal_code',
                type: '#type'
            }
        });
        var gmarker = addresspickerMap.addresspicker("marker");
        gmarker.setVisible(true);
        addresspickerMap.addresspicker("updatePosition");
        $('#reverseGeocode').change(function() {
            $("#addresspicker_map").addresspicker("option", "reverseGeocode", ($(this).val() === 'true'));
        });
        function showCallback(geocodeResult, parsedGeocodeResult) {
            $('#callback_result').text(JSON.stringify(parsedGeocodeResult, null, 4));
        }

    });
</script>
<?php
include 'footer.php';



