<li>
    <div class="item-content" style="padding:5px 12px;">
        <div class="description-content" style="padding: 0;">
            <h3 class="title-song" style="font-size:14px;">
                <a href="<?php echo baseurl($data['SlugKategori']."/".$data['SlugArtist'])."/".$data['idyoutube']; ?>"
                style="text-decoration: none;color:#333;font-weight: 600;">
                    <?php echo $data['Title']; ?>                    
                </a>
            </h3>  
            <p style="font-size:12px;font-weight: 500;color:#EEAA19">Filesize : <?php echo $data['Filesize']; ?> | Duration : <?php echo $data['Duration']; ?> | Type : Audio (.mp3)</p>          

    </div>
</li>
