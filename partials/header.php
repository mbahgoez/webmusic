<div class="top-menu">
    <ul>
        <li>
            <a href="<?php echo baseurl(); ?>">
                <i class="ion-home"></i> Home
            </a>
        </li>
        <li>
            <a href="<?php echo baseurl("convert"); ?>">
                <i class="ion-music-note"></i>Convert Lagu Youtube
            </a>
        </li>
        <li>
            <a href="<?php echo baseurl("category"); ?>">
                <i class="ion-ios-folder-outline"></i> Kategori
            </a>
        </li>
        <li>
            <a href="<?php echo baseurl("category"); ?>">
                <i class="ion-mic-a"></i> Artist
            </a>
        </li>
        <li>
            <a href="<?php echo baseurl("dmca"); ?>">
                <i class="ion-flag"></i> DMCA
            </a>
        </li>
    </ul>
</div>
<header>
<div class="header-left">
	<h1 class="title">
        <a href="<?php echo baseurl(); ?>">
            <?php echo TITLE; ?>
        </a>
    </h1>
    <p>
        <?php echo DESC; ?>
    </p>
</div>
<div class="header-right">
	<form method="POST" action="<?php echo baseurl('search'); ?>">
    	<input type="text" name="q" 
            <?php if(isset($_POST['q'])){ ?>
            value="<?php echo $_POST['q']; ?>"
            <?php } ?> 
            placeholder="Masukan nama artis, grup musik atau judul">
    	<input type="submit" value="Cari">
	</form>
</div>
</header>

<nav>
<ul>
	<li>
        <a href="<?php echo baseurl(); ?>">
	      <i class="ion-home"></i>
		 Lagu Terbaru
        </a>
    </li>
    <?php 
    $tbkategori = $db->query(dbselect("tbkategori"))->fetchAll();
    
    
    foreach($tbkategori as $data){
        $SlugKategori = $data['SlugKategori'];
        $querysong = dbselect_where("vlistmusic", "SlugKategori='$SlugKategori'");

        $datasong = $db->query($querysong)->fetchAll();
        
        if(count($datasong) > 0){
        ?>
        <li>
            <a href="<?php echo baseurl($data['SlugKategori']); ?>">
                <?php echo $data['NamaKategori']; ?>    
            </a>
        </li>
        <?php } 
        }
        ?>
</ul>
</nav>