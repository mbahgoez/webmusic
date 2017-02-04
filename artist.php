<?php 
	$kategori = $_GET['category'];
	$datakategori = $db->query("SELECT NamaKategori FROM tbkategori WHERE SlugKategori='$kategori'")->fetchAll()[0];

	$artist = $_GET['artist'];
	$dataartist = $db->query("SELECT NamaArtist FROM tbartist WHERE SlugArtist='$artist'")->fetchAll()[0];
?>

<div class="row">
	 <div id="breadcrumb">
        <ul itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="<?php echo baseurl(); ?>" itemscope itemtype="http://schema.org/Thing" itemprop="item">
                    <i class="ion-home"></i>
                    <span itemprop="name">Home</span>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            <li><span>/</span></li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="<?php echo baseurl($kategori); ?>" itemscope itemtype="http://schema.org/Thing" itemprop="item">
                    <span itemprop="name"><?php echo $datakategori['NamaKategori']; ?></span>
                </a>
                <meta itemprop="position" content="2" />
            </li>

            <li><span>/</span></li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="<?php echo baseurl($artist); ?>" itemscope itemtype="http://schema.org/Thing" itemprop="item">
                    <span itemprop="name"><?php echo $dataartist['NamaArtist']; ?></span>
                </a>
                <meta itemprop="position" content="2" />
            </li>
        </ul>
    </div>
</div>