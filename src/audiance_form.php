<?php
include 'header.php';
?>
<h4 class="titre">Edition d'une audiance</h4>
<hr/>
<form action="save_audiance.php" method="post" class="form-horizontal" role="form">
<div class="form-group">
    <label for="rg" class="col-sm-2 control-label">RG</label>
    <div class="col-sm-10">
      <input type="text" name="rg" class="form-control" id="rg" required placeholder="rg">
    </div>
  </div>
<div class="form-group">
    <label for="jurdiction" class="col-sm-2 control-label">Jurdiction</label>
    <div class="col-sm-10">
      <input type="text" name="jurdiction" class="form-control" id="jurdiction" required placeholder="jurdiction">
    </div>
  </div>

<div class="form-group">
    <label for="type_aud" class="col-sm-2 control-label">type d'audiance</label>
    <div class="col-sm-10">
      <input type="text" name="type_aud" class="form-control" id="type_aud" required placeholder="type d'audiance">
    </div>
  </div>
<div class="form-group">
    <label for="sect_aud" class="col-sm-2 control-label">secteur d'audiance</label>
    <div class="col-sm-10">
      <input type="text" name="sect_aud" class="form-control" id="sect_aud" required placeholder="secteur d'audiance">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Valider</button>
	<button type="reset" class="btn btn-danger col-sm-offset-2">Annuler</button>
    </div>
  </div>
</form>

<?php
include 'footer.php';
?>

