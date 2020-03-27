<?php /* Template Name: Nytt arrangement */ ?>
<?php
get_header();
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
<?php

require("arr-functions.php");
require("Arrangementstyper-array.php");
require("db-connection.php");

//for oppretting av nytt arrangement
if (ISSET($_POST['lagreNytt'])) {
    $tittel = filter_var($_POST['tittel'], FILTER_SANITIZE_STRING);
    $dato = konverterDato($_POST['dato']);
    $tid = filter_var($_POST['tid'], FILTER_SANITIZE_STRING);
    $sted = filter_var($_POST['sted'], FILTER_SANITIZE_STRING);
    $arrType = filter_var($_POST['arrType'], FILTER_SANITIZE_STRING);
    $beskrivelse = filter_var($_POST['beskrivelse'], FILTER_SANITIZE_STRING);

    $sql = "INSERT INTO kalender(tittel, dato, tid, sted, type, beskrivelse) VALUES
      ('" . $tittel . "', '" . $dato . "', '" . $tid . "', '" . $sted . "', '" . $arrType . "', '" . $beskrivelse . "');";

    if(mysqli_query($connection, $sql)) {
        echo "<h2>" . $tittel . " er lagt til</h2>
        <a href='" . site_url() . "/?page_id=234'>Til arrangementsoversikt</a>";
    }
    else {
        echo "<p>Det oppsto en feil, vennligst prøv igjen.</p>";
    }
}

//for redigering av arrangement
else if (ISSET($_POST['lagreRediger'])) {
    $arrId = filter_var($_POST['arrId'], FILTER_SANITIZE_NUMBER_INT);
    $tittel = filter_var($_POST['tittel'], FILTER_SANITIZE_STRING);
    $dato = konverterDato($_POST['dato']);
    $tid = filter_var($_POST['tid'], FILTER_SANITIZE_STRING);
    $sted = filter_var($_POST['sted'], FILTER_SANITIZE_STRING);
    $arrType = filter_var($_POST['arrType'], FILTER_SANITIZE_STRING);
    $beskrivelse = filter_var($_POST['beskrivelse'], FILTER_SANITIZE_STRING);

    $sql = "UPDATE kalender SET tittel='" . $tittel . "', dato='" . $dato . "', tid='" . $tid . "', sted='" . $sted . "', type='" . $arrType . "', beskrivelse='" . $beskrivelse . "' WHERE id = " . $arrId . ";";

    if(mysqli_query($connection, $sql)) {
        echo "<h2>" . $tittel . " er oppdatert</h2>
        <a href='" . site_url() . "/?page_id=234'>Til arrangementsoversikt</a>";
    }
    else {
        echo "<p>Det oppsto en feil, vennligst prøv igjen.</p>";
    }
}

//tomt skjema før lagre/rediger-knappen er trykket
//NB: har ikke gjort noe inputvalidering
else {
    if(ISSET($_GET['arr'])) {
        $arrId = $testarrangement[$_GET['arr']];

        $sql = "SELECT * FROM kalender WHERE id = " . $_GET['arr'] . ";";
        $resultat = mysqli_query($connection, $sql);

        while($row = mysqli_fetch_array($resultat)) {
            echo "<a href='" . site_url() . "/?page_id=234' class='avbrytlink'>Avbryt</a>
					<h1>Rediger arrangement</h1>
					<div class='paamelding-arrangement'>
	          <form action='' method='post'>
	            <p>
	              <label for='tittel'>Tittel</label>
	              <input type='text' name='tittel' id='tittel' size='40' value='" . $row['tittel'] . "'/>
	            </p>
	            <p>
	              <label for='dato'>Dato</label>
	              <input type='text' name='dato' id='dato' value='" . $row['dato'] . "'/>
	            </p>
	            <p>
	              <label for='tid'>Tid</label>
	              <input type='text' name='tid' id='tid' value='" . $row['tid'] . "'/>
	            </p>
	            <p>
	              <label for='sted'>Sted</label>
	              <input type='text' name='sted' id='sted' value='" . $row['sted'] . "'/>
	            </p>
	            <p>
	              <label for='beskrivelse'>Beskrivelse</label><br>
	              <textarea name='beskrivelse' cols='40' rows='10' id='beskrivelse'>" . $row['beskrivelse'] . "</textarea>
	            </p>
	            <p>
	            <input type='hidden' name='arrId' value='" . $row['id'] . "'>
	              <label for='arrType'>Arrangementstype</label>
	              <select name='arrType'>";

            $arrType = $row['type'];
            foreach($arrangementstyper as $key => $value) {
                if ($key == $arrType) {
                    echo "<option value='" . $key . "' selected>" . $value . "</option>";
                }
                else {
                    echo "<option value='" . $key . "'>" . $value . "</option>";
                }
            }

            echo "</select><br><br>
	              <input type='submit' name='lagreRediger' value='Lagre'/>
	            </form>
						</div>";
        }
    }

    else {
        echo "<a href='" . site_url() . "/?page_id=234' class='avbrytlink'>Avbryt</a>
				<h1>Nytt arrangement</h1>
				<div class='paamelding-arrangement'>
	        <form action='' method='post'>
	          <p>
	            <label for='tittel'>Tittel</label>
	            <input type='text' name='tittel' id='tittel'/>
	          </p>
	          <p>
	            <label for='dato'>Dato</label>
	            <input type='date' name='dato' id='dato'/>
	          </p>
	          <p>
	            <label for='tid'>Tid</label>
	            <input type='text' name='tid' id='tid'/>
	          </p>
	          <p>
	            <label for='sted'>Sted</label>
	            <input type='text' name='sted' id='sted'/>
	          </p>
	          <p>
	            <label for='arrType'>Arrangementstype</label>
	            <select name='arrType'>";

        foreach($arrangementstyper as $key => $value) {
            echo "<option value='" . $key . "'>" . $value . "</option>";
        }

        echo "</select>
	          </p>
	          <p>
	            <label for='beskrivelse'>Beskrivelse</label><br>
	            <textarea name='beskrivelse' cols='40' rows='10' id='beskrivelse'></textarea>
	          </p>
	          <input type='submit' name='lagreNytt' value='Lagre'/>
	        </form>
				</div>";
    }
}

mysqli_close($connection);
?>
        </main><!-- .site-main -->


    </div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
