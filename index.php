<?php
include "app/start.php";
include "app/DB.php";

include "partials/head.php";
include "tracking-analytics.php";

?>


<div class="container">

    <?php
    include "partials/header.php";

    if (isset($_GET['category']) && isset($_GET['artist']) && isset($_GET['id'])) {
        include "detail.php";
    } else if (isset($_GET['category']) && isset($_GET['artist'])) {
        include "artist.php";
    } else if (isset($_GET['category'])) {
        include "category.php";
    } else if(isset($_GET['search'])){
        include "search.php";
    } else {
        include "home.php";
    }
    ?>

    <footer>
        
        <span>Kami hanya mengambil sumber dari layanan pihak ketiga penyedia konversi Video Youtube ke MP3. Jika konten Web ini terdapat Music yang dianggap melanggar hak cipta. anda dapat mengklaimnya dan kami akan menghapusnya sesegera mungkin. Kami tidak pernah menyimpan file bentuk (*.mp3) ke server kami.
        <a href="">Contact Webmaster</a>
        </span>
        <br><br>
        <p>© <?php echo TITLE." ".date('Y'); ?> , Design by 
            <a href="<?php echo baseurl(); ?>"><?php echo TITLE; ?></a>
        </p>
    </footer>
</div>

