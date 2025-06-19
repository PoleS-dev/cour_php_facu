

<?php
//function debug print_r
function debug($array){

    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


// function cookie creation
function createCookie($name, $value){
    setcookie($name, $value, time() +( 3600*30),ROOT);
    
}
// function language

function translate($cleLanguage,$text   ){
    // creation d'une fonction à appeller qui contient un tableau  des langues et traductions
        $traduction=[
            'English' =>[
                "Welcome"=>"Welcome",
                "text"=>" Your current language is: ",
                //ajout pour exo
                "name"=>"name"
            ],
            "French"=>[
                "Welcome"=>"Bienvenue",
                "text"=>"Ta langue est : ",
                "name"=>"nom"
            ],
            "Spanish"=>[
                "Welcome"=>"Bienvenido",
                "text"=>"Tu idioma es : ",
                "name"=> "nombre"
            ]
            ];
    
            return $traduction[$cleLanguage][$text] ?? 'traduction non trouvée';
    }