<?php
require_once('security.inc');
require_once('../connect.php');
$error = "";
$sql = "SELECT id, libelle FROM calibres"; 
$res = mysqli_query($conn, $sql);

if(isset($_POST['soumis'])){ 
    
    if(isset($_POST['proprietaire'])){
        $arme = trim(htmlspecialchars(addslashes($_POST['arme'])));
        $proprietaire = trim(htmlspecialchars(addslashes($_POST['proprietaire'])));
        $poids = trim(htmlspecialchars(addslashes($_POST['poids'])));
        $origine = trim(htmlspecialchars(addslashes($_POST['origine'])));
        $id_cal = trim(htmlspecialchars(addslashes($_POST['calibre'])));
        $description= trim(htmlspecialchars(addslashes($_POST['description'])));
        $image = $_FILES['image']['name'];
        $drapeau = $_FILES['drapeau']['name'];
        $destination ="../assets/images/";
        move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image);

        $sql2= "INSERT INTO gunz (proprietaire, arme, poids, origine, id_cal,image, drapeau, description)
                VALUES('$proprietaire','$arme','$poids', '$origine','$id_cal','$image', '$drapeau' , '$description')";
        
        $result = mysqli_query($conn, $sql2);
        if(mysqli_insert_id($conn) > 0){
            header('location:liste.php');
        }
        else
        {
            $error = '<div class="alert alert-danger">Erreur d\'insertion</div>';  
        }
        
    }
}

require_once('partials/header.inc'); 
?>
<div class="offset-2 col-8 mt-5">
<h1 class="bg-dark text-center text-white">Formulaire d'ajout</h1>
    <?= $error; ?>
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="col-5">
        <label for="proprietaire">Proprietaire*</label>
        <input type="text" class="form-control" id="proprietaire" name="proprietaire" placeholder="Entrez votre nom svp" >
    </div>
    <div class="col-5">
        <label for="arme">Arme*</label>
        <input type="text" class="form-control" id="arme" name="arme" placeholder="Entrez le nom de l'arme">
    </div>
    <div class="col-2">
        <label for="poids">Poids*</label>
        <input type="text" class="form-control" id="poids" name="poids" placeholder="Entrez le poids de l'arme" >
    </div>
    </div>
    
    <div class="row">
    <div class="col-3">
        <label for="origine">Origine de l'arme*</label>
        <input type="text" class="form-control" id="origine" name="origine" placeholder="Entrez l'origine de l'arme" >
    </div>
    <div class="col-3">
        <label for="image">Photo</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <div class="col-3">
        <label for="drapeau">Drapeau</label>
        <input type="file" class="form-control" id="drapeau" name="drapeau">
    </div>
    <div class="col-3">
        <label for="calibre">Calibres*</label>
        <select class="form-select" id="calibre" name="calibre" >
        <option >Choisir un calibre</option>
        <?php while($rows = mysqli_fetch_assoc($res)){ ?>
            <option value="<?=$rows['id']; ?>"><?=$rows['libelle']; ?></option>
        <?php } ?>
        </select>
    </div>
    </div>
    <div class="row">
    <div class="col mb-2">
        <label for="description">Description</label>
        <textarea  class="form-control" id="description" name="description" rows="5" placeholder="Entrez la description de l'arme"></textarea>
    </div>

    </div>
    <button type="submit" class="btn btn-dark col-12" name="soumis" >Ajouter</button>
    </form>
</div>
<?php require_once('partials/footer.inc');?>