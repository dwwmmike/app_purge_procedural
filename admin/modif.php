<?php
require_once('security.inc');
require_once('../connect.php');
$error = "";

$sql = "SELECT id, libelle FROM calibres";
$res = mysqli_query($conn, $sql);

if(isset($_GET['id']) && $_GET['id'] <= 1000 && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
    $id = htmlspecialchars(addslashes($_GET['id']));
    $sql2 = "SELECT * FROM gunz g
            INNER JOIN calibres c
            ON g.id_cal = c.id
            WHERE g.id_gun = '$id'";
    $result = mysqli_query($conn, $sql2);
    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
    }
}

if(isset($_POST['soumis'])){
    if(isset($_POST['proprietaire']) && strlen($_POST['proprietaire'])<=50){
        $id_gun = trim(htmlspecialchars(addslashes($_POST['id_gun'])));
        $proprietaire = trim(htmlspecialchars(addslashes($_POST['proprietaire'])));
        $arme = trim(htmlspecialchars(addslashes($_POST['arme'])));
        $poids = trim(htmlspecialchars(addslashes($_POST['poids'])));
        $origine = trim(htmlspecialchars(addslashes($_POST['origine'])));
        $id_cal = trim(htmlspecialchars(addslashes($_POST['calibre'])));
        $description= trim(htmlspecialchars(addslashes($_POST['description'])));
        $image = $_FILES['image']['name'];

        $destination ="../assets/images/";
        move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image);

        if(empty($image)){
            $sql = "UPDATE gunz SET proprietaire = '$proprietaire', arme = '$arme', poids = '$poids', origine = '$origine' , id_cal = '$id_cal', description = '$description' 
            WHERE id_gun = '$id_gun'";
        }else{
            if(file_exists('../assets/images/'.$data['image'])){

                unlink('../assets/images/'.$data['image']);
            }
            $sql = "UPDATE gunz SET proprietaire = '$proprietaire', arme = '$arme', poids = '$poids', origine = '$origine' , id_cal = '$id_cal', description = '$description', image = '$image' 
            WHERE id_gun = '$id_gun'";
        }

        $resultat = mysqli_query($conn, $sql);

        if($resultat){
            header('location:liste.php');
        }
        else{
            $error = '<div class="alert alert-danger">Erreur d\'insertion</div>';
        }
        var_dump($sql);
    }
    }
    

 require_once('partials/header.inc'); 
?>
<div class="offset-2 col-8 mt-5">
<h1 class="bg-dark text-center text-white">Formulaire d'édition</h1>
    <?= $error; ?>
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_gun" value="<?=$data['id_gun'];?>">
    <div class="row">
    <div class="col-5">
        <label for="proprietaire">Proprietaire*</label>
        <input type="text" class="form-control" id="proprietaire" name="proprietaire" value="<?=$data['proprietaire'];?>" placeholder="Entrez le nom du proprietaire" required>
    </div>
    <div class="col-5">
        <label for="arme">Arme*</label>
        <input type="text" class="form-control" id="arme" name="arme" value="<?=$data['arme'];?>" placeholder="Entrez le nom de l'arme" required>
    </div>
    <div class="col-2">
        <label for="poids">Poids*</label>
        <input type="text" class="form-control" id="poids" name="poids" value="<?=$data['poids'];?>" placeholder="Entrez le poids de l'arme" required>
    </div>
    </div>
    <div class="row">
    <div class="col">
        <label for="origine">Origine*</label>
        <input type="text" class="form-control" id="origine" name="origine" value="<?=$data['origine'];?>" placeholder="Entrez l'origine de l'arme" required>
    </div>
    </div>
    <div class="row">
    <div class="col">
        <label for="image">Photo</label>
        <input type="file" class="form-control" id="image" name="image">
        <img src="../assets/images/<?=$data['image'];?>" width="50" alt="">
    </div>
    <div class="col">
        <label for="calibre">Calibres*</label>
        <select class="form-select" id="calibre" name="calibre" >
        <option value="<?=$data['id_cal'];?>"><?= ucfirst($data['libelle']);?></option>
        <?php while($rows = mysqli_fetch_assoc($res)){ if($data['id_cal'] !== $rows['id']){ ?>
            <option value="<?=$rows['id']; ?>"><?=ucfirst($rows['libelle']); ?></option>
        <?php }} ?>
        </select>
    </div>
    </div>
    <div class="row">
    <div class="col mb-2">
        <label for="desc">Description</label>
        <textarea  class="form-control" id="description" name="description" rows="5" placeholder="Entrez la description de l'arme"><?=$data['description'];?></textarea>
    </div>

    </div>
    <button type="submit" class="btn btn-dark col-12" name="soumis" >Modifier</button>
    </form>
</div>
<?php require_once('partials/footer.inc');?>