<?php include'func.php';
$yf=ngegrab('https://gdata.youtube.com/feeds/api/videos/'.$_GET['id'].'?v=2&alt=jsonc');
$yf=json_decode($yf);
$respon=$yf->data;
$name=$yf->data->title;
$durasi=$yf->data->duration;
$duration=format_time($durasi);
$stream=$yf->data->content->{'5'};
$streamm=$yf->data->content->{'1'};
$streammm=$yf->data->content->{'6'};
$tgl=$yf->data->uploaded;
$date=dateyt($tgl);
$file=ngegrab('http://www.fullrip.net/video-m/'.$_GET['id'].'');
$file=potong($file,'<div class="video_links">','<div id="dloptions">');
$file=str_replace('</div>','',$file);
$file=str_replace('</span>','',$file);
$file=str_replace('<a ','-<a ',$file);
if(!empty($respon) AND !empty($_GET['id'])){$title='Download '.$name.'';
include'config.php';
echo $head;
echo '<div class="header">Download '.$name.'</div>';
echo'<div class="menu" align="center"><img src="http://img.youtube.com/vi/'.$_GET['id'].'/default.jpg" /></div>';
echo'<div class="menu">Uploaded: '.$date.', <br />Duration: '.$duration.'</div><div class="menu">Stream: <a href="http://topwapi.com/?id=wapvideous">PC</a> | <a href="http://inwapi.com/?id=wapvideous">3GP High</a> | <a href="http://waptopz.com/?id=wapvideous">3GP Low</a></div><div class="header">Download video</div>';
echo'<center><a href="http://down3.ucweb.com/ucbrowser/en/v2/?pub=buxin@ekorenz1&prod_id=1&version=2" title="Download UC Browser">Download via UC Browser</a></center>';
if (preg_match('/fullrip.net/', $file)){
echo '<div class="menu">'.$file.'</div>';}
else{echo'<div class="menu">Please wait...</div>';}}else{$title='Download';
include'config.php';
echo $head;
echo '<div class="header">File not found</div>';
echo'<div class="menu">File not found</div>';}
echo'<center><a href="http://down3.ucweb.com/ucbrowser/en/v2/?pub=buxin@ekorenz1&prod_id=1&version=2" title="Download UC Browser">Download via UC Browser</a></center>';
echo $foot; ?>
