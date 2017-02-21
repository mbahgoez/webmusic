<div class="list-category">
	 <div class="header-title">
        <h2 style="font-size: 12px;">
        	<i class="ion-mic-c"></i>
        	Hasil Terkait Dengan "<?php echo $dataartist['NamaArtist']; ?>"
    	</h2>
    </div>

    <ul>
    	<?php
    	$NamaArtist = $dataartist['NamaArtist'];
    	$sql = dbselect_where("vlistmusic", "NamaArtist='$NamaArtist' LIMIT 20");
    	$recent = $db->query($sql)->fetchAll();
    	foreach($recent as $item){
    	?>
    	<li>
    		<a href="<?php echo baseurl($item['SlugKategori']."/".$item['SlugArtist'])."/".$item['idyoutube']; ?>""><?php echo $item['Title']; ?></a>
    	</li>
    	<?php } ?>
    </ul>
</div>