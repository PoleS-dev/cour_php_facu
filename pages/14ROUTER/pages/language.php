<?php
print '<pre>';
print_r($_SESSION);
print '<pre>';

if (!isset($_SESSION['logged_in'])) {
    header('Location: home');
    exit();
}

if (isset($_POST['set_language'])) {
  $languageChoice = $_POST['language'];

    $_SESSION['language'] = $languageChoice;

    createCookie("language", $languageChoice);
    header('Location: home');
    exit();
}   


?>

<form method="post">
    <label for="language">choisissez votre langue</label>
    <select name="language">
        <option value="English">English</option>
        <option value="French">French</option>
        <option value="Spanish">Spanish</option>
    </select>
    <input type="submit" name="set_language" value="Save Language">
</form>




