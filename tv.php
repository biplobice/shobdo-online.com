<?php 
/*include "include/header.php";
include "include/leftbar.php"; */

if (strpos($_GET['id'], 'http') === 0) {
    $id = $_GET['id'];
	//$class = substr($_GET['id'], -10,-1);
	
$class = preg_replace('/[^a-zA-Z0-9_]/', '_', $_GET['id']);
}
else {
	$id = "http://www.jagobd.com/".$_GET['id'];
	$class = preg_replace('/\.html.*/', '', $_GET['id']);
}
echo $class;
//echo $id;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
<!--
#container{
    width:800px;
    height:600px;
    border:1px solid #000; 
    overflow:hidden;
    margin:auto;
}
/*#container iframe {
margin: -650px 0 0 -15px; width:625px; height:1100px;
 }*/
.btvworld {margin: -650px 0 0 -15px; width:625px; height:1100px;}
.atnbangla {margin: -588px 0 0 -15px; width:625px; height:1040px;} 
.banglavision {margin: -612px 0 0 -15px; width:625px; height:1062px;} 
.http___www_123bangla_com_boishakhi_television {margin: -412px 0 0 -15px; width:625px; height:880px;} 
.channeli {margin: -680px 0 0 -15px; width:625px; height:1120px;} 
.channel9bd {margin: -595px 0 0 -15px; width:625px; height:1050px;} 
.channel24 {margin: -630px 0 0 -15px; width:625px; height:1062px;} 
.http___www_123bangla_com_desh_tv {margin: -412px 0 0 -15px; width:625px; height:880px;} 
.http___www_zzcast_com_channel_php_u_Digatv {margin: -180px 0 0 -15px; width:625px; height:600px;} 
.ekattortv {margin: -568px 0 0 -15px; width:625px; height:1040px;} 
.ekushey-tv {margin: -675px 0 0 -15px; width:625px; height:1130px;} 
.http___www_123bangla_com_gazi_television {margin: -460px 0 0 -15px; width:625px; height:940px;} 
.http___www_zzcast_com_channel_php_u_maasrapo {margin: -200px 0 0 -15px; width:625px; height:620px;} 
.mohonatv {margin: -565px 0 0 -15px; width:625px; height:1000px;} 
.ntv {margin: -595px 0 0 -15px; width:625px; height:1050px;} 
.rtv {margin: -540px 0 0 -15px; width:625px; height:980px;} 
.somoynews {margin: -535px 0 0 -15px; width:625px; height:950px;} 
.mytv {margin: -558px 0 0 -15px; width:625px; height:980px;} 
.satv {margin: -558px 0 0 -15px; width:625px; height:1000px;} 
.ntveurope {margin: -520px 0 0 -15px; width:625px; height:940px;} 
.channelieurope {margin: -600px 0 0 -15px; width:625px; height:1020px;} 
.channel9uk {margin: -590px 0 0 -15px; width:625px; height:1062px;} 
.channel16 {margin: -530px 0 0 -15px; width:625px; height:980px;} 
.banglatvuk {margin: -540px 0 0 -15px; width:625px; height:960px;} 

 
-->
</style>

<script>
    window.onbeforeunload = function(){
        return "Please Click Stay On This Page To Watch TV"; // This will stop the redirecting.
    }
</script>  

</head>
<body>


<div id="container">
<!--<iframe src="http://www.jagobd.com/somoynews.html" scrolling="no"></iframe>-->
<?php echo "<iframe src ='".$id."' scrolling='no' class='".$class."'></iframe>"; ?>
</div>



</body>
</html>

<?php
/*include "include/rightbar.php";
include "include/footer.php";*/
//session_unset();
//session_destroy();
?>