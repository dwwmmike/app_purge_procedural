<?php
session_start();
$error = '';
require_once('../connect.php');
    if(isset($_SESSION['utilisateurs']) && $_SESSION['utilisateurs']['role'] != 1){
        header('location:index.php');
    }

if(isset($_POST['submit'])){
    if(!empty($_POST['login']) && !empty($_POST['pass'])){
        $login = trim(htmlentities(addslashes($_POST['login'])));
        $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
        
        if(isset($_POST['role'])){
            $role = trim(htmlentities(addslashes($_POST['role'])));
        }
        else{
            $role = 3;
        }

        $sql = "INSERT INTO utilisateurs(login, pass, role)
                VALUES('$login','$pass','$role')";

        $result = mysqli_query($conn, $sql);

        if($result){

            header('location:index.php');
        }
    }
}

?>
<?php require_once('partials/header.inc'); ?>
<div class="container">
<div class="card offset-4 col-4 mt-5">
  <?=$error;?>
  <div class="card-header text-center">
    Formulaire d'inscription
  </div>
  <div class="card-body">
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
    <div class="mb-2">
        <label for="login" class="form-label">Identifiant*</label>
        <input type="text" class="form-control" id="login" name="login"placeholder="Entrez votre identifiant" required>
    </div>
    <div class="mb-2">
        <label for="pass" class="form-label">Mot de passe*</label>
        <input type="password" class="form-control" id="pass" name="pass" placeholder="Entrer votre mot de passe" required>
    </div>
    
    <div class="mb-3 form-check">
        <input type="radio" class="form-check-input" id="role" value="1" name="role">
        <label class="form-check-label" for="role">Administrateur</label>
    </div>
    <div class="mb-3 form-check">
        <input type="radio" class="form-check-input" id="role" value="2" name="role">
        <label class="form-check-label" for="role">Utilisateur(Ajout)</label>
    </div>
    <div class="mb-3 form-check">
        <input type="radio" class="form-check-input" id="role" value="3" name="role">
        <label class="form-check-label" for="role">Utilisateur(Consultant)</label>
    </div>
    
    <button type="submit" class="btn btn-dark col-12" name="submit">Inscrire</button>
    </form>
  </div>
</div>
</div>
<?php require_once('partials/footer.inc'); ?>