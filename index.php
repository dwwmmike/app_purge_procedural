<?php
require_once('connect.php');
$sql = "SELECT * FROM gunz g
        INNER JOIN calibres c
        ON g.id_cal = c.id";

$result = mysqli_query($conn, $sql);


function trDate($date){
    $dateArray = (explode("-",substr(($date),0,10)));
    $dateIns = $dateArray[2]."/".$dateArray[1]."/".$dateArray[0];
    return $dateIns;
}
?>
<?php require_once('partials/header.inc');?>
<div class="container">
<style>
      body {
        background-size: 100% 100%;
        background-repeat:no-repeat;
        background-image:url(./assets/images/handgun2.gif);
        background-attachment:fixed;
        }
        .banner{
        background-image:url(./assets/images/bann.gif);
        background-repeat:no-repeat;
        background-attachment:fixed;
        background-size: 100% 100%;
        }
        .scroll{
          height : 12em;
          overflow: scroll;
        }
  </style>
    <div class="banner text-center text-light p-5">
        <h1>Nos armes déclarées</h1>
        <p>Soyez "Légalement" pret pour la purge"</p>
    </div> 
    <div>
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
        <?php while($rows = mysqli_fetch_assoc($result)){ ?>
            <div class="col">
              <div class="card">
                <img src="assets/images/<?=$rows['image'];?>" class="card-img-top" alt="..." height="200">
                <div class="card-body">
                  <h5 class="card-title text-center"><span class="badge rounded-pill bg-dark">Arme N°: ReG560<?=$rows['id_gun'];?>62</h5></span>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Proprietaire: <?=$rows['proprietaire'];?></li>
                    <li class="list-group-item">Arme: <?=$rows['arme'];?></li>
                    <li class="list-group-item">Poids: <?=$rows['poids'];?></li>
                    <li class="list-group-item">Calibre: <?=$rows['libelle'];?></li>
                    <li class="list-group-item">Origine: <?=$rows['origine'];?> <img src="assets/images/<?=$rows['drapeau'];?>" width="10%" alt=""></li>
                    <li class="list-group-item">Arme enregistrée le: <?=trDate($rows['created']);?></li>
                 </ul>
                 <hr>
                  <p class="scroll card-text"><?=$rows['description'];?></p>
                </div>
              </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php require_once('partials/footer.inc');?>