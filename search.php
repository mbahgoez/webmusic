<?php 

$limit = 10;

if(isset($_GET['page'])){
    // Paging By Page Number
    $p = $_GET['page'];
    $offset = ($p-1)*$limit;
        
} else {
    // Reset Page Default
    $p = 1;
    $offset = $p-1;
}

$querylagu = $db->query("SELECT * FROM vlistmusic LIMIT $offset, $limit")->fetchAll();

$querytotal = $db->query(dbselect("vlistmusic"))->fetchAll();
$total = count($querytotal);
$page = ceil($total/$limit);


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
                <a href="#" itemscope itemtype="http://schema.org/Thing" itemprop="item">
                    <span itemprop="name">
                        Hasil Pencarian
                    </span>
                </a>
                <meta itemprop="position" content="2" />
            </li>
        </ul>
    </div>

    <section class="content">
        <div class="list-content full">
            <div class="header-title">
                <h2>
                    <i class="ion-mic-c"></i>
                    Hasil Pencarian untuk "<?php echo $_POST['q']; ?>"
                </h2>
            </div>
            <ul>
                <?php

                foreach($querylagu as $data){
                    include "partials/item-lagu-search.php";
                } ?>
            </ul>
        </div>
    </section>
 <aside class="sidebar">
        <?php
            $querykategori = $db->query(dbselect("tbkategori"))->fetchAll(); 
            
            foreach($querykategori as $datakategori){
            
                $SlugKategori = $datakategori['SlugKategori']; 
        
                $querymusic = $db->query(dbselect_where("vlistmusic", "SlugKategori='$SlugKategori' LIMIT 5"))->fetchAll();


            if(count($querymusic) > 0){
        ?>
        <div class="list-category">
            <div class="header-title">
                <h2>
                    <i class="ion-mic-c"></i>
                    <?php echo $datakategori['NamaKategori']; ?>
                </h2>
            </div>
            <ul>
                <?php
                
                foreach($querymusic as $datamusic){ 
                ?>
                <li>
                    <a href="#">
                        <?php echo $datamusic['Title']; ?>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <?php } 
            } ?>
    </aside>
</div>
