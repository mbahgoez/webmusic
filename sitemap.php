<?php 
header("Content-type: text/xml");

include "app/DB.php";
include "app/start.php";

$datakategori = $db->query("SELECT * FROM tbkategori")->fetchAll(PDO::FETCH_ASSOC);
$dataartist = $db->query("SELECT * FROM vartist")->fetchAll(PDO::FETCH_ASSOC);
$datalagu = $db->query("SELECT * FROM vlistmusic")->fetchAll(PDO::FETCH_ASSOC);


?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   <url>
      <loc><?php echo baseurl(); ?>/</loc>
      <changefreq>daily</changefreq>
      <priority>1.0</priority>
   </url>
   <?php foreach($datakategori as $Kategori){
   	$SlugKategori = $Kategori['SlugKategori'];
   	?>
	<url>
	   <loc><?php echo baseurl($SlugKategori); ?></loc>
	   <changefreq>daily</changefreq>
	   <priority>0.9</priority>
   </url>
   <?php } ?>
   <?php foreach($dataartist as $Artist){
   	$SlugKategori = $Artist['SlugKategori'];
   	$SlugArtist = $Artist['SlugArtist'];

   	?>
	<url>
	   <loc><?php echo baseurl($SlugKategori."/".$SlugArtist); ?></loc>
	   <changefreq>daily</changefreq>
	   <priority>0.8</priority>
   </url>
   <?php } ?>
   <?php foreach($datalagu as $Lagu){
   	$SlugKategori = $Lagu['SlugKategori'];
   	$SlugArtist = $Lagu['SlugArtist'];
   	$SlugLagu = $Lagu['idyoutube'];
   	?>
	<url>
	   <loc><?php echo baseurl($SlugKategori."/".$SlugArtist."/".$SlugLagu); ?></loc>
	   <changefreq>daily</changefreq>
	   <priority>0.7</priority>
   </url>
   <?php } ?>
</urlset> 