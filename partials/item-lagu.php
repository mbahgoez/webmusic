<li>
    <div class="item-content" style="padding-bottom: 15px;">
        <div class="thumbnail-content">
            <img src="https://img.youtube.com/vi/<?php echo $data['idyoutube']; ?>/mqdefault.jpg" alt="">
        </div>
        <div class="description-content">
            <h2 class="title-song">
                <a href="<?php echo baseurl($data['SlugKategori']."/".$data['SlugArtist'])."/".$data['idyoutube']; ?>">
                    <?php echo $data['Title']; ?>                    
                </a>
            </h2>
            <span class="file-info">
                Ukuran : <?php echo $data['Filesize'] ?>, 
                Duration : <?php echo $data['Duration']; ?>
                Type : Audio (.mp3)
            </span>
            <span class="action">
                <a href="" class="btn1">
                    <i class="ion-cloud"></i>
                    Download (<?php echo $data['Filesize']; ?>)
                    </a> |
                <a href="" class="btn2">
                    <i class="ion-link"></i>
                    Download Sekarang
                </a>
            </span>
            <span class="duration">
                <?php // echo $data['Duration']; ?>   
            </span>
        </div>
    </div>
</li>
