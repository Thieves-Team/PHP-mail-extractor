<?php
if(isset($_POST['submit'])) {
        if(!empty($_FILES['upload']['tmp_name'])) {
                if($_FILES['upload']['type'] == 'application/octet-stream') {
                        $data = file_get_contents($_FILES['upload']['tmp_name']);
                        $data = explode("', '",$data);
                        $emails = '';
                       
                        for($i=0;$i<count($data);$i++) {
                                if(preg_match('/[a-zA-Z0-9]@[a-zA-Z0-9].[a-zA-Z0-9]/',$data[$i])) {
                                        $emails .= $data[$i] .'<br />';
                                }
                        }
                        echo $emails;
                }              
                if($_FILES['upload']['type'] != 'application/octet-stream') {
                        echo '<span>File must be application/octet-stream.</span>';
                }
        }
        if(empty($_FILES['upload']['tmp_name'])) {
                echo '<span>You haven`t provided any data.</span>';
        }      
       
}
 
?>
<center>
<a href="http://forum.thieves-team.com"><img src="http://img231.imageshack.us/img231/7871/thiev.png" /></a>
<br /><br />
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="upload" /><br /><br />
<input type="submit" name="submit" value="Extract" />
</form>
</center>
