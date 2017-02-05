<?php 
$kategori = $_GET['category'];

$datakategori = $db->query(dbselect_where("tbkategori", "SlugKategori='$kategori'"))->fetchAll()[0];

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

$querylagu = $db->query(dbselect_where("vlistmusic", "SlugKategori='$kategori' LIMIT $offset, $limit"));

$querylagu = $db->query(dbselect_where("vlistmusic", "SlugKategori='$kategori' LIMIT $offset, $limit"))->fetchAll();
# $querylagu = mysql_query("SELECT * FROM vlistmusic WHERE SlugKategori='$kategori' LIMIT $offset, $limit");

$querytotal = $db->query(dbselect_where("vlistmusic", "SlugKategori='$kategori'"))->fetchAll();


$total = count($querytotal);
$page = ceil($total/$limit);
?>
<div class="row">
    <div id="breadcrumb">
        <ul itemscope itemtype="http://schema.org/BreadcrumbList">
            <li>
                <a href="<?php echo baseurl(); ?>">
                    <i class="ion-home"></i>
                    <span itemprop="name">Home</span>
                </a>
            </li>
            <li><span>/</span></li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="<?php echo baseurl($kategori); ?>" itemscope itemtype="http://schema.org/Thing" itemprop="item">
                    <span itemprop="name"><?php echo $datakategori['NamaKategori']; ?></span>
                </a>
                <meta itemprop="position" content="1" />
            </li>
        </ul>
    </div>

    <section class="content">
        <div class="list-content full">
            <div class="header-title">
                <h2>
                    <i class="ion-mic-c"></i>
                    <?php echo $datakategori['NamaKategori']; ?>
                </h2>
            </div>
            <ul>
                <?php
                foreach($querylagu as $data){
                    include "partials/item-lagu.php";
                } 
                ?>
            </ul>
        </div>
         <div id="pager">
            <ul style="text-align: center;">
                <li>
                    <?php if($p != 1){ ?>
                    <a href="<?php echo baseurl($kategori.'/page/'.($p-1)); ?>">
                        <i class="ion-ios-arrow-left"></i>
                        Prev
                    </a>
                    <?php } else { ?>
                    <span>
                        <i class="ion-ios-arrow-left"></i>
                        Prev
                    </span>
                    <?php } ?>

                </li>
                <li>
                    <span>
                    Halaman <?php echo $p; ?> / <?php echo $page; ?>
                    </span>
                </li>
                <li>
                    <?php if($p != $page){?>
                    <a href="<?php echo baseurl($kategori.'/page/'.($p+1)); ?>">
                        Next <?php $p+1; ?>
                        <i class="ion-ios-arrow-right"></i>
                    </a>
                    <?php } else { ?>
                    <span>
                        Next
                        <i class="ion-ios-arrow-right"></i>
                    </span>
                    <?php } ?>
                </li>
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
