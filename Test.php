<?php

if(isset($_POST['submit'])) {
    $country = $_POST['countries'];
    echo $country;
}

?>
<form method="POST">
<input type="text" name="race" list="landvorschlaege" placeholder="Gib das Land ein">

<datalist id="landvorschlaege">
    <option value="Afghanistan">Afghanistan</option>
    <option value="Albanien">
    <option value="Algerien">
    <option value="Angola">
    <option value="Argentinien">
    <option value="Armenien">
    <option value="Aserbaidschan">
    <option value="Ägypten">
    <option value="Äthiopien">
    <option value="Australien">
    <option value="Bahamas">
    <option value="Bangladesch">
    <option value="Belgien">
    <option value="Belize">
    <option value="Benin">
    <option value="Bhutan">
</datalist>

<button type="submit">Raten</button>
</form>

