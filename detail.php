<?php 
    
    $cat = $_GET['category'];
    $artist = $_GET['artist'];
    $id = $_GET['id'];

    $querykategori = dbselect_where("tbkategori", "SlugKategori='$cat'");
    $datakategori = $db->query($querykategori)->fetchAll()[0];
    $SlugKategori = $datakategori['SlugKategori'];

    $queryartist = dbselect_where("tbartist", "SlugArtist='$artist'");
    $dataartist = $db->query($queryartist)->fetchAll()[0];
    $SlugArtist = $dataartist['SlugArtist'];

    

    $querydetail = dbselect_where("vlistmusic", "idyoutube='$id'");
    $datadetail = $db->query($querydetail)->fetchAll()[0];
    $id = $datadetail['idyoutube'];

?>
    <div class="row">
        <div id="breadcrumb">
            <ul>
                <li><a href="<?php baseurl(); ?>"><i class="ion-home"></i>Home</li></a>
                <li><span>/</span></li>
                <li>
                    <a href="<?php echo baseurl($SlugKategori); ?>">
                        <?php echo $datakategori['NamaKategori']; ?>    
                    </a>
                </li>
                <li><span>/</span></li>
                <li>
                    <a href="<?php echo baseurl($SlugKategori.'/'.$SlugArtist); ?>">
                        <?php echo $dataartist['NamaArtist']; ?>
                    </a>
                </li>
                <li><span>/</span></li>
                <li>
                    <a href="<?php echo baseurl($SlugKategori.'/'.$SlugArtist.'/'. $id); ?>">
                        <?php echo $datadetail['Track']; ?>
                    </a>
                </li>
            </ul>
        </div>
        <section class="content">
            
            <article class="music-data">
                <h2><?php echo $datadetail['Title']; ?> MP3</h2>
                <hr/>
                <br>
                <center>
                    <img src="https://img.youtube.com/vi/<?php echo $datadetail['idyoutube']; ?>/mqdefault.jpg" alt="music-label" />
                </center>
                <br>
                <p>
                    Download lagu <b><?php echo $datadetail['Title']; ?> MP3</b> dapat kamu download secara gratis di <b><u><a href="<?php echo baseurl(); ?>"><?php echo TITLE; ?></a></u></b>. Details lagu <b><?php echo $datadetail['Title']; ?></b> bisa kamu lihat di tabel, untuk link download lagu <b><?php echo $datadetail['Title']; ?></b> berada dibawah ini.
                </p>
                <table class="detail-music">
                    <thead>
                        <tr>
                            <td colspan="3">
                                <h3>Lagu <?php echo $datadetail['Title']; ?></h3></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>File</td>
                            <td>:</td>
                            <td><b><?php echo $datadetail['Title']; ?>.mp3</b></td>
                        </tr>
                        <tr>
                            <td>Judul</td>
                            <td>:</td>
                            <td><b><?php echo $datadetail['Track']; ?></b></td>
                        </tr>
                        <tr>
                            <td>Artist</td>
                            <td>:</td>
                            <td><b><?php echo $datadetail['NamaArtist']; ?></b></td>
                        </tr>
                        <tr>
                            <td>Ukuran</td>
                            <td>:</td>
                            <td><?php echo $datadetail['Filesize']; ?></td>
                        </tr>
                        <tr>
                            <td>Durasi</td>
                            <td>:</td>
                            <td><?php echo $datadetail['Duration']; ?></td>
                        </tr>
                        <tr>
                            <td>Type File</td>
                            <td>:</td>
                            <td><b>Audio MP3(*.mp3)</b></td>
                        </tr>
                    </tbody>
                </table>
                <center>
                    <a href="<?php echo $datadetail['Link']; ?>" class="btn-download">Download File ( <?php echo $datadetail['Filesize']; ?> )</a>
                </center>
                <br/>
                <div class="disclaimer">
                    <h3><b>PERHATIAN</b></h3>
                    <p>
                        Bila kamu mengunduh lagu <b><?php echo $datadetail['Title']; ?></b> usahakan hanya untuk review saja, jika memang kamu suka dengan lagu <b><?php echo $datadetail['Title']; ?></b> belilah kaset asli yang resmi atau CD official dari <b>album <?php echo $datadetail['Title']; ?></b>, kamu juga bisa mendownload secara legal di Official iTunes <b><?php echo $datadetail['Title']; ?></b> dan gunakan juga RBT atau nada sambung pribadi untuk mendukung <b><?php echo $datadetail['Title']; ?></b> juara di semua charts tangga lagu.
                    </p>
                </div>
                <br/>
                
                <center>
                    <table>
                    </table>
                    <table align="center" class="social-sharing">
                        <tr>
                            <td>
                                <a onClick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php currentUrl(); ?>', 'sharer', 'toolbar=0,status=0,width=550,height=400');" 
                    target="_parent" 
                    href="javascript: void(0)">
                        <i class="ion-social-facebook"></i>
                        Bagikan ke Facebook
                                </a>
                            </td>
                            <td>
                                <a href="">
                                    <i class="ion-social-twitter"></i>
                                    Bagikan ke Twitter
                                </a>
                            </td>
                            <td>
                                <a onClick="window.open('http://google.com ', 'sharer ', 'toolbar=0,status=0,width=550, height=400');" target="_parent" href="javascript: void(0)">
                                    <i class="ion-social-googleplus"></i>
                                    Bagikan ke Google Plus
                                </a>
                            </td>
                        </tr>
                    </table>
                </center>
            </article>
        </section>
    </div>