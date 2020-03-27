<?php /* Template Name: Arrangementsinfo */ ?>
<?php
get_header();
?>
<div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
<?php

require("arr-functions.php");
require("db-connection.php");
require("Arrangementstyper-array.php");
//require("Testdata-array.php");

if (ISSET($_GET['arr'])) {

    $sql = "SELECT * FROM kalender WHERE id = " . $_GET['arr'] . ";";
    $resultat = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_array($resultat)) {
        $dato = datoTilTekst($row['dato']);

        echo "<div id='arrangementsinfo'><h1>" . $row['tittel'] . "</h1>
      <p>" . $dato . "</p>
      <p>" . $row['tid'] . "</p>
      <p>Arrangementstype: " . $arrangementstyper[$row['type']] . "</p>
      <p>" . $row['beskrivelse'] . "</p></div>";
    }
}
mysqli_close($connection);
?>
        </main><!-- .site-main -->


</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
