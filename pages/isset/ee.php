<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);


    session_start();

    var_dump($_SESSION);

    

    ?>


<nav>

<?php 

if(isset($_SESSION["membre"]) && !empty($_SESSION["membre"])){
    if(isset($_SESSION["membre"]["name_username"]) && !empty($_SESSION["membre"]["name_username"])){
        echo "<h3> " . $_SESSION["membre"]["name_username"] . " </h3>";
}
}
?>

</nav>


<?php



$tab = [ "id","name","email"];

for ($i=0;$i<count($tab);$i++){
     switch ($i) {
         case 0:
           ?>
         <div class="id">
             <p> l'id est : <?=$tab[$i] ?></p>
         </div>
           <?php
             break;
         case 1:
             ?>
             <div class="id">
                 <p> le nom est : <?=$tab[$i] ?></p>
             </div>
               <?php          
             break;
         case 2:
      ?>
             <div class="id">
                 <p> le email est : <?=$tab[$i] ?></p>
             </div>
               <?php
             break;
         default:
         ?>
         <div class="id">
             <p> rien</p>
         </div>
           <?php
             break;
         }
    if($i==0): ?>
        <div class="id">
            <p> l'id est : <?=$tab[$i] ?></p>
        </div>
        <?php endif; 
    if($i==1): ?>
        <div class="id">
            <p> le nom est : <?=$tab[$i] ?></p>
        </div>
        <?php endif; 
    if($i==3): ?>
        <div class="id">
            <p> le email est : <?=$tab[$i] ?></p>
        </div>
        <?php endif; 

}

$tab2=[
    "id"=>123,
    "name"=>"Nassaf",
    "email"=>"nassaf@gmail.com"
];

for($i=0;$i<count($tab2);$i++){
    echo $tab2[$i];
}

foreach($tab2 as $value){
    echo $value;
    echo "<br>";
}


function rrr() {
    return [
        '$b = "fsbvkzbk";',
        '<?php $b = "fsbvkzbk"; ?>'
    ];
}
 
$var=rrr();

echo $var[1];

 var_export( eval($var[1]));
        


function rr() {
    return '$b = "fsbvkzbk";';
}

// Génère du code PHP et l’exécute :
eval(rr());

echo $b; // ✅ Affiche: fsbvkzbk

$user=[
    "id"=> 1233,
    "name_username"=>"Nassaf",
    "email"=>"nassaf@gmail.com",
    "role"=>"admin",
    "image"=>"votre adresse photo"
];

$menu=["home","profil","backoffice"];

$produit=[
    [
        "name"=>"ordinateur",
        "prix"=>1000,
        "category"=>"informatique"
    ],
    [
        "name"=>"chaise",
        "prix"=>3000,
        "category"=>"meubles"
    ],
    [
        "name"=>"chaussures",
        "prix"=>20,
        "category"=>"vêtements"
    ]
];


if($b): ?>

    <p> le b est : <?=$b ?></p>

    <?php else: ?>
    <p> le b n'est pas /p>   

<?php endif; ?>
