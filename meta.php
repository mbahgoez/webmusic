<?php 
if(isset($_GET['category']) && isset($_GET['artist']) && isset($_GET['id'])){
  $id = $_GET['id'];
  $data = $db->query("SELECT * FROM vlistmusic WHERE idyoutube='$id'")->fetchObject();
  $title = "($data->Filesize) Download Lagu $data->Title MP3 Gratis";
  $desc = "Title : $data->Title, Artist : $data->NamaArtist, Size : $data->Filesize, Duration : $data->Duration, Album : $data->Album, Type : Audio (.mp3). Download Gratis Lagu $data->Title";
  $keyword = "$data->Title, $data->NamaArtist, $data->Album, Album $data->Album, Download Lagu Gratis, Download kumpulan mp3";
  $thumb = "https://img.youtube.com/vi/$data->idyoutube/mqdefault.jpg";

} else if(isset($_GET['category']) && isset($_GET['artist'])){
  $id = $_GET['artist'];
  $data = $db->query("SELECT * FROM tbartist WHERE SlugArtist='$id'")->fetchObject();
  $title = "Download Kumpulan Lagu $data->NamaArtist Terlengkap Full Album";
  $desc = "Download Kumpulan Lagu $data->NamaArtist Lengkap Full Album Gratis Download Terupdate dari ".TITLE;
  $keyword = "Download Lagu, Download Album $data->NamaArtist, Album $data->NamaArtist Terbaru, Lagu $data->NamaArtist, Lagu Baru $data->NamaArtist, Download $data->NamaArtist";
  $thumb = "image/thumb.jpg";

} else if(isset($_GET['category'])){
  $id = $_GET['category'];
  $data = $db->query("SELECT * FROM tbkategori WHERE SlugKategori='$id'")->fetchObject();
  $title = "Download Kumpulan Lagu $data->NamaKategori Terlengkap dan Terbaru";
  $desc = "Download Kumpulan Lagu Barat Terbaru Format Audio MP3 Gratis dari ".TITLE;
  $keyword = "Download Lagu, Download Album $data->NamaKategori, Album $data->NamaKategori Terbaru, Lagu $data->NamaKategori, Lagu Baru $data->NamaKategori, Download $data->NamaKategori";
  $thumb = "image/thumb.jpg";
} else { 
  $title = TITLE ." - ".DESC;
  $desc = DESC;
  $keyword = "MP3, gratis Mp3, gratis musik, gratis lagu, lagu hits, lagu terbaru, lagu barat, lagu dangdut, lagu remix, lagu koplo, lagu banyuwangi, lagu baru, lagu kenangan";
}
?>

<title><?php echo $title; ?></title>
<link rel="shortcut icon" href="favicon.ico">
<meta name="author" content="<?php TITLE ?>">
<meta content="index,follow" name="robots">
<meta content="index,follow" name="googlebot">
<meta content="index,follow" name="msnbot">
<meta name="rating" content="general">
<meta name="spiders" content="all">
<meta name="revisit-after" content="1 days">
<!-- <meta content="603691853149593" property="fb:app_id"> -->
<!-- <meta name="poptm" content="b1d052cc520b1b542ef85868705e8308"> -->
<meta name="description" content="<?php echo $desc; ?>">
<meta name="keywords" content="<?php echo $keyword; ?>">

<meta name="image" content="<?php echo $thumb; ?>">
<meta name="og:image" content="<?php echo $thumb; ?>">

<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- <script>
$(document).ready(function() {
    $("#pager ul").children("").wrap("<li></li>");
});

</script>
-->


<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,3725115,4,511,95,18,00000000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?3725115&101" alt="statistics" border="0"></a></noscript>
<!-- Histats.com  END  -->