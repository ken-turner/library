<?
function printDoctype(){
    echo("<!DOCTYPE html>\n");
}
function GEN_login($file='pass.txt'){
    if(isset($_SERVER['PHP_AUTH_USER']) == true) {
        if($_SERVER['PHP_AUTH_USER'] != "" && $_SERVER['PHP_AUTH_PW'] != "") {
         $users = file ($file, FILE_IGNORE_NEW_LINES);
        $user = sha1($_SERVER['PHP_AUTH_USER'])." ".sha1($_SERVER['PHP_AUTH_PW']);
     

            if(array_search($user, $users)==true){
                echo ("<script> alert('Credientials Initiated'); </script>");
                return true;
            }
            else {
                header('WWW-Authenticate: Basic realm="Tech30"');
                header('HTTP/1.0 401 Unauthorized');
               // addCSSLink('../Library/Tech30.css');
                echo ("<script> alert('Unauthorized'); </script>");
                exit;
            }
        }
        else {
            header('WWW-Authenticate: Basic realm="Tech30"');
            header('HTTP/1.0 401 Unauthorized');
            //addCSSLink('../Library/Tech30.css');
            echo ("<script> alert('Unauthorized'); </script>");
            exit;
        }
    }
    else {
        header('WWW-Authenticate: Basic realm="Tech30"');
        header('HTTP/1.0 401 Unauthorized');
        //addCSSLink('../Library/Tech30.css');
        echo ("<script> alert('Unauthorized'); </script>");
        exit;
    }


}
function GEN_array($file,$sep2){
    $full_array = array();
    $x = 0;
    $arrays = explode("//",$file);
    //var_dump($arrays);
    foreach($arrays as $array){
    $new = explode(" ",$array);
   // var_dump($new);
    foreach($new as $e){
        //echo $e."<br>";
       $fix = explode($sep2,$e);
       //var_dump($fix);
       $num = (count($fix)/2);
       //echo $num;
       for($i=0;$i<$num;$i++){
           if($fix[$i]!=""){
           $full_array[$x][$fix[$i]]=$fix[$i + 1];
           
         
       }}
       //foreach($fix as $i){
       //    echo $i."<br>";
       //}
    }
    $x++;
    }
     //var_dump($full_array);
     return $full_array;
}
function FORMAT_array($array){
    if(is_array($array)==true){
    echo "array(\n";
 foreach($array as $i=>$e){
     if(is_array($e)== true){
         FORMAT_array($e);
     }
     else{echo "\n\"$i\" => \"$e\",\n";
     }
 }
 echo "\n);\n";
    }
}
function FORMAT_tree($array,$space="|--",$spaceb="--|"){
    
$space = $space."----";
$spaceb = "----".$spaceb;

echo "{";
   foreach($array as $i=>$e){
       echo "<br>";
    if(is_array($e)==true){
        
       echo "$space";
       gothic($e,$space,$spaceb);
        echo "$spaceb";
    }
    else{
        echo "$space{ $i => $e }";
    }
   
} 
 echo "<br>}";

}
    

//FORMAT_array(GEN_array('Hello_Darkness My_OldFriend',"_"));
?>






