<?php /* Template Name: Arrangementsoversikt Admin */ ?>
<?php
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
<?php
require("arr-functions.php");
require("db-connection.php");

if (ISSET($_GET['arr'])) {
    $sqlDelete = "DELETE from kalender WHERE id = " . $_GET['arr'] . ";";

    if(mysqli_query($connection, $sqlDelete)) {
        echo "<h2>Arrangementet er slettet</h2>";
    }
    else {
        echo "<p>Det oppsto en feil, vennligst prøv igjen. " . mysqli_error($connection) . "</p>";
    }
}

echo "<h2>Oversikt over arrangementer</h2>
        <a href=" . site_url() . "/?page_id=237' class='opprett'>Opprett nytt arrangement</a>
		<table class='arrangementer'>
			<thead>
	      <tr>
	        <th>Tittel</th>
	        <th>Tid</th>
	        <th>Sted</th>
	        <th>Handlinger</th>
	      </tr>
			</thead>
			<tbody>";

$sql = "SELECT id, tittel, dato, tid, sted FROM kalender WHERE dato >= CURDATE()
      GROUP BY id ORDER BY dato ASC LIMIT 50;";

$resultat = mysqli_query($connection, $sql);

while($row = mysqli_fetch_array($resultat)) {
    $dato = date('j/n/Y', strtotime($row['dato']));

    echo "<tr>
          <td><a href='" . site_url() . "/?page_id=231&arr=" . $row['id'] . "' class='understrek'><strong>" . $row['tittel'] . "</strong></a></td>
          <td>" . $dato . " " . $row['tid'] . "</td>
          <td>" . $row['sted'] . "</td>
          <td><a onClick=\"return confirm('Vil du virkelig slette arrangementet?')\" id='slett' href='" . site_url() . "/?page_id=234&arr=" . $row['id'] . "' class='table-button'>Slett</a>
              <a  href='" . site_url() . "/?page_id=237&arr=" . $row['id'] . "' class='table-button'>Rediger</a></td>
        </tr>";
}

echo "</tbody>
		</table>";

mysqli_close($connection);
?>

    </main><!-- .site-main -->


</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

