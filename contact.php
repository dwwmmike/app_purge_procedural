<?php

 require_once('connect.php');
 $error="";

if(isset($_POST['soumis'])){ 

    if(isset($_POST['nom'])){
        $nom = trim(htmlspecialchars(addslashes($_POST['nom'])));
        $prenom = trim(htmlspecialchars(addslashes($_POST['prenom'])));
        $telephone = trim(htmlspecialchars(addslashes($_POST['telephone'])));
        $email = trim(htmlspecialchars(addslashes($_POST['email'])));
        $adresse = trim(htmlspecialchars(addslashes($_POST['adresse'])));
        $message= trim(htmlspecialchars(addslashes($_POST['message'])));
       
        $sql= "INSERT INTO contact (nom, prenom, telephone, email, adresse, message)
                VALUES('$nom', '$prenom', '$telephone', '$email', '$adresse', '$message')";

        $result = mysqli_query($conn, $sql);

        if(mysqli_insert_id($conn) > 0){
            $error = '<div class="alert alert-success text-center">Message envoyé</div>';
        }
        else
        {
            $error = '<div class="alert alert-danger text-center">Erreur d\'envoie</div>';  
        }
    }
}
?>

<?php require_once('partials/header.inc');?>
<div class="container">
    <h1>Contact</h1>
    <?= $error; ?>
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
        <div class="row m-2">
            <div class="mb-2 col-6">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nom" placeholder="Entrez votre nom...">
            </div>
            <div class="mb-2 col-6">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="prenom" placeholder="Entrez votre prenom...">
            </div>
            <div class="mb-2 col-6">
                <label for="tel" class="form-label">N° Telephone</label>
                <input type="tel" class="form-control" id="tel" name="telephone" aria-describedby="tel" placeholder="Entrez votre numero...">
            </div>
            <div class="mb-2 col-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Entrez votre email...">
            </div>
            <div class="mb-2 col-6">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" name="adresse" id="adresse" aria-describedby="adresse" placeholder="Entrez votre adresse...">
                <div id="emailHelp" class="form-text">112 rue de l'Ak 47, 223 Atlanta...</div>
            </div>
            <div class="mb-2 col-6">
                <label for="message" class="form-label"  placeholder="Encrivez votre message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
            </div>
            <button type="submit" name="soumis" class="btn btn-dark mb-2">Envoyer</button>
            <h4>Où nous trouver..</h4>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d212270.74112956238!2d-84.56068787707888!3d33.76763377373763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88f5045d6993098d%3A0x66fede2f990b630b!2zQXRsYW50YSwgR8Opb3JnaWUsIMOJdGF0cy1Vbmlz!5e0!3m2!1sfr!2sfr!4v1615984989123!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>  
        </div>          
    </form>        
<?php require_once('partials/footer.inc'); ?>

