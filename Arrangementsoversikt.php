<?php /* Template Name: Arrangementsoversikt */ ?>
<?php
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
<?php
    require("arr-functions.php");
    require("db-connection.php");
    require("Arrangementstyper-array.php");

    echo "<h1>Hva skjer ved HIØ?</h1>";
    echo "<form action='' method='post'>
            <p>Filtrér på sted:
            <select name='sted'>
                <option value='Alle'>Alle</option>
                <option value='Halden'>Halden</option>
                <option value='Fredrikstad'>Fredrikstad</option>
                <option value='Andre'>Andre</option>
            </select></p>
            <p>Filtrér på arrangementstype:
            <select name='arrType'>
                <option value='Alle'>Alle</option>";
                foreach($arrangementstyper as $key => $value){
                    echo "<option value='" . $key . "'>" . $value . "</option>";
                } echo "</select></p>
            <input type='submit' name='filtrer' value='Bruk'/>
        </form>";

    if (ISSET($_POST['filtrer'])) {
        if ($_POST['arrType'] != 'Alle' && $_POST['sted'] != 'Alle') {
            $sql = "SELECT id, dato,
            tid, sted, tittel, type
            FROM kalender
            WHERE dato >= CURDATE()
            AND type = '" . $_POST['arrType'] . "'
            AND sted LIKE '%" . $_POST['sted'] . "%'
            GROUP BY id ORDER BY dato;";
        }
        else if ($_POST['arrType'] == 'Alle' && $_POST['sted'] != 'Alle') {
            $sql = "SELECT id, dato,
            tid, sted, tittel, type
            FROM kalender
            WHERE dato >= CURDATE()
            AND sted LIKE '%" . $_POST['sted'] . "%'
            GROUP BY id ORDER BY dato;";
        }
        else if ($_POST['arrType'] != 'Alle' && $_POST['sted'] == 'Alle') {
            $sql = "SELECT id, dato,
            tid, sted, tittel, type
            FROM kalender
            WHERE dato >= CURDATE()
            AND type = '" . $_POST['arrType'] . "'
            GROUP BY id ORDER BY dato;";
        }
        else {
            $sql = "SELECT id, dato,
        tid, sted, tittel, type
        FROM kalender
        WHERE dato >= CURDATE()
        GROUP BY id ORDER BY dato;";
        }

    }
    else {
        $sql = "SELECT id, dato,
        tid, sted, tittel, type
        FROM kalender
        WHERE dato >= CURDATE()
        GROUP BY id ORDER BY dato;";
    }

    $resultat = mysqli_query($connection, $sql);

    while($row = mysqli_fetch_array($resultat)) {

        $dato = datoTilTekst($row['dato']);

       echo "<div class='arrangementskort' id='" . $row['type'] . "'>
      <h2>" . $row['tittel'] . "</h2>
      <p>" . $dato . "</p> 
      <p>" . $row['tid'] . "</p>
      <p>" . $row['sted'] . "</p>
      <a href='" . site_url() . "?page_id=231&arr=" . $row['id'] . "'>Les mer</a>
    </div>";
    }

    mysqli_close($connection);

?>

    </main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

