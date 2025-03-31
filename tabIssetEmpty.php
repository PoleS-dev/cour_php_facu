<?php

ini_set('display_errors', 1);
    error_reporting(E_ALL);

// Ton tableau de test
$tab = [
    "a" => "hello",
    "b" => "",
    "c" => null,
    "d" => 0,
    "e" => false
];
echo "\$tab =";
echo "<pre>";
var_export($tab);

echo "</pre>";

// Liste des clés à tester, y compris une qui n'existe pas ("f")
$cles = ["a", "b", "c", "d", "e", "f"];

function boolToIcon($value) {
    return $value ? "✅" : "❌";
}

?>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            background: white;
            box-shadow: 0 0 10px #ccc;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        .code {
            font-family: monospace;
            color: #333;
        }
    </style>

<body>

<h2> Analyse des fonctions <code>isset()</code>, <code>empty()</code> et <code>array_key_exists()</code></h2>

<table>
    <tr>
        <th>Clé</th>
        <th>Valeur</th>
        <th>isset()</th>
        <th>empty()</th>
        <th>array_key_exists()</th>
    </tr>

    <?php foreach ($cles as $cle): ?>
        <tr>
            <td><strong><?= $cle ?></strong></td>
            <td class="code">
                <?= array_key_exists($cle, $tab) ? var_export($tab[$cle]) : '<i>Non défini</i>' ?>
            </td>
            <td><?= boolToIcon(isset($tab[$cle])) ?></td>
            <td><?= boolToIcon(empty($tab[$cle])) ?></td>
            <td><?= boolToIcon(array_key_exists($cle, $tab)) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>

