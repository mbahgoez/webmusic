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

$querylagu = mysql_query("SELECT * FROM vlistmusic LIMIT $offset, $limit");

$querytotal = mysql_query("SELECT * FROM vlistmusic");

$total = mysql_num_rows($querytotal);
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
                <a href="<?php echo baseurl(); ?>" itemscope itemtype="http://schema.org/Thing" itemprop="item">
                    <span itemprop="name">Terbaru</span>
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
                    Lagu Terbaru
                </h2>
            </div>
            <ul>
                <?php
                    while($data = mysql_fetch_array($querylagu)){
                        include "partials/item-lagu.php"; 
                    } 
                 ?>
            </ul>
        </div>
 
          <div id="pager">
            <ul style="text-align: center;">
                <li>
                    <?php if($p != 1){ ?>
                    <a href="<?php echo baseurl('page/'.($p-1)); ?>">
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
                    <a href="<?php echo baseurl('page/'.($p+1)); ?>">
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
            $querykategori = mysql_query("SELECT * FROM tbkategori"); 
            while($datakategori = mysql_fetch_array($querykategori)){
            $SlugKategori = $datakategori['SlugKategori']; 
        
            $querymusic = mysql_query("SELECT * FROM vlistmusic WHERE SlugKategori='$SlugKategori' LIMIT 5");

            

            if(mysql_num_rows($querymusic) > 0){
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
                
                while($datamusic = mysql_fetch_array($querymusic)){ 
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
