<?php
require_once('security.inc');
require_once('../connect.php');

if(isset($_POST['submit']) && !empty($_POST['search'])){
    $motCle = trim(addslashes(htmlentities($_POST['search'])));
    $sql = "SELECT *
            FROM gunz g
            INNER JOIN calibres c
            ON g.id_cal = c.id
            WHERE proprietaire LIKE '%$motCle%' OR arme LIKE '%$motCle%'";
}else{
    $sql = "SELECT * FROM gunz g
        INNER JOIN calibres c
        ON g.id_cal = c.id";
}

$result = mysqli_query($conn, $sql); 

?>
<?php require_once('partials/header.inc'); ?>
<style>
    .corps{
        background-size: 100% 100%;
        background-repeat:no-repeat;
        background-image:url(../assets/images/alexander-yartsev-patronen2018-2.jpg);
        background-attachment:fixed;
    }
  </style> 
  
<div class="corps">
<div class="container">
<?php if(isset($_SESSION['utilisateurs']) && $_SESSION['utilisateurs']['role'] == 1 || $_SESSION['utilisateurs']['role'] == 2){?>
<p><a href="ajouter.php" class="btn btn-dark col-12"><i class="fas fa-plus"> Ajouter </i></a></p>
<?php } ?>
<form action="<?=$_SERVER['PHP_SELF']; ?>" method="post">

    <div class="input-group justify-content-end">
    
        <input type="search" class="form-control offset-9 mb-2 col-3 text-center" name="search" id="search" placeholder="Rechercher">
        <button type="submit" name="submit" class="btn btn-dark mb-2 fas fa-search"></button>
    </div>
</form>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th>Id</th>
            <th>Proprietaire</th>
            <th>Arme</th>
            <th>Poids</th>
            <th>Origine</th>
            <th>Image</th>
            <th>Calibre</th>
            <th>Drapeau</th>
            <th>Date de creation</th>
            <?php if(isset($_SESSION['utilisateurs']) && $_SESSION['utilisateurs']['role'] == 1){?>
            <th colspan="2" class="text-center">Actions</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
    <?php while($rows = mysqli_fetch_assoc($result)){  ?>
        <tr>
            <td><?= $rows['id_gun']; ?></td>
            <td><?= $rows['proprietaire']; ?></td>
            <td><?= $rows['arme']; ?></td>
            <td><?= $rows['poids']; ?></td>
            <td><?= $rows['origine']; ?></td>
            <td><img src="../assets/images/<?=$rows['image']; ?>"width="100"/></td> 
            <td><?= $rows['libelle']; ?></td>
            <td><img src="../assets/images/<?=$rows['drapeau']; ?>"width="80"/></td> 
            <td><?= $rows['created']; ?></td>
            <?php if(isset($_SESSION['utilisateurs']) && $_SESSION['utilisateurs']['role'] == 1){?>
            <td><a href="modif.php?id=<?=$rows['id_gun'];?>" class="btn btn-primary"><i class="fas fa-edit"></a></td>
            <td><a href="supprimer.php?id=<?=$rows['id_gun'];?>" class="btn btn-danger" onclick="return confirm('Etes vous sûr de vouloir supprimer cette arme?')"><i class="fas fa-trash"></i></a></td>
            <?php } ?>
        </tr>
    <?php } ?>
    </tbody>
</table>
</div>
</div>
<?php require_once('partials/footer.inc'); ?>