<?php

$produits = [

    [

        'article' => 'jean',

        'couleur' => 'bleu',

        'prix' => 49.99,

        "description"=>"imply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining"
 
    ],

    [

        'article' => 't-shirt',

        'couleur' => 'blanc',

        'prix' => 19.99,

        "description"=>"imply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining"

    ],

    [

        'article' => 'chaussures',

        'couleur' => 'noir',

        'prix' => 89.90,

        "description"=>"imply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining"

    ]

];



foreach($produits as $index ){

    // construction de l'url 

    $url=" page2.php?article=".urlencode($index["article"])."&couleur=".urlencode($index["couleur"])."&description=".urlencode($index["description"])."&prix=".urlencode($index["prix"]);


    echo "<p><a href=\"$url\">Voir le produit : ".$index['article'] ."</a></p>";

    



}

?>

<p> la fonction urlencode() :  </p>
<p> cette fonction  sert à préparer une chaine de caractère pour être utiliser dans une URL</p>
<p>pour passer du texte sans l'abimer</p>
<p>exemple : </p>
<?php 
 echo '<a href="page2.php?nom=Jean Pierre&ville=St-Étienne">Aller</a>';

// avec urlencode 

// 👉 L’URL est cassée à cause de l’espace et des caractères spéciaux.

$nom = 'Jean Pierre';
 $ville = 'St-Étienne';
 
 $url = 'page2.php?nom=' . urlencode($nom) . '&ville=' . urlencode($ville);
 echo '<a href="' . $url . '">Aller2</a>';

// URL générée :
 


// page.php?nom=Jean+Pierre&ville=St-%C3%89tienne
// ✅ Fonctionne parfaitement, l’URL est propre et sécurisée.
