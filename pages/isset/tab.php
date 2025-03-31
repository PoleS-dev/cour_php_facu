<?php



ini_set('display_errors', 1);
error_reporting(E_ALL);



$list = array("element1","element2",1,false,123.5);

// echo $list;
echo $list[3];

echo "<pre>";
print_r($list);

echo "</pre>";
echo "<pre>";
var_dump($list);

echo "</pre>";


$utilisateur = [
    "id" => 123,
    "name_username" => "Alice",
    "email" => null,
    
];

if (isset($utilisateur["email"])) {
    echo "La clé 'email' existe et a une valeur non nulle.";
} else {
    echo "La clé 'email' n'existe pas ou est null.";
}


$tab2=[
  "user","email","password"
];


function saluer( $nom): int {
    return  $nom;
}

echo saluer("123"); // Bonjour, Marie


$txt = " Hello ";
trim($txt);

echo "strlen : longueur de '$txt' = " . strlen(trim($txt)) . "\n";

// strtoupper() / strtolower()
echo "strtoupper : " . strtoupper("bonjour") . "\n";
echo "strtolower : " . strtolower("BOfffOUR") . "\n";

function appliqueTva($nombre) : int {
    return $nombre ;
}
 echo appliqueTva("123");

 class Utilisateur {
    public $id;
    public $name_username;
    public $email;
    public function __construct($iduser, $name_username, $email) {
        echo "Utilisateur créé";
        $this->id = $iduser;
        $this->name_username = $name_username;
        $this->email = $email;
    }
 }

 $utilisateur = new Utilisateur(123, "Alice", null);

 echo $utilisateur->id;
echo !empty($utilisateur->email) ?  "Utilisateur connecté" :  "Utilisateur non connecté";