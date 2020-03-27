<?php /* Template Name: Arrangementsinfo Admin*/ ?>
<?php
get_header();
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
<?php

require("arr-functions.php");
require("db-connection.php");

if (ISSET($_GET['arr'])) {

    $sqlArr = "SELECT * FROM Arrangement WHERE ArrangementsID = " . $_GET['arr'] . ";";
    $resultatArr = mysqli_query($connection, $sqlArr);

    while($row = mysqli_fetch_array($resultatArr)) {

        $arrId = $testarrangement[$_GET['arr']];

        $dato = date('j/n/Y', strtotime($row['Dato']));
        $opprettet = date('j/n/Y H:i', strtotime($row['Opprettet']));

        echo "<h1>" . $row['Tittel'] . "</h1>
      <p>Opprettet: " . $opprettet . "</p>
      <p>Dato: " . $dato . " " . $row['Tid'] . "</p>
      <p>" . $row['Beskrivelse'] . "</p><br>";
    }
}
mysqli_close($connection);
?>
        </main><!-- .site-main -->


    </div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

