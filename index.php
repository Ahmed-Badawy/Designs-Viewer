
<?php 

function out($what, $stop=true){
   echo "<pre>";var_export($what);
   if($stop) die;
}

function find_all_files($dir){
   // echo $dir."<br>";
   $root = scandir($dir);
   foreach($root as $value){
      if($value == '.' || $value == '..') {continue;}
      if(is_file("$dir/$value")){
         $result[]= "$dir/$value"; 
         continue;
      }
      foreach(find_all_files("$dir/$value") as $value){
         $result[]= $value;
      }
   }
   return (isset($result)) ? $result : [] ;
}
function dir_to_array($dir) {
   $result = array();
   $cdir = scandir($dir);
   foreach ($cdir as $key => $value){
      if (!in_array($value,array(".",".."))){
         if (is_dir($dir . DIRECTORY_SEPARATOR . $value)){
            $result[$value] = dir_to_array($dir . DIRECTORY_SEPARATOR . $value);
         }
         else $result[] = $value;
      }
   }
   return $result;
} 
function get_file_data($file){
      $file = str_replace("\\","/",$file);
      $file = strtolower($file);
      $file_array1 = explode('.',$file);
      $ext = array_pop($file_array1);
      $file_array2 = explode('/',implode('.',$file_array1));
      $file_name = array_pop($file_array2);
      $path = implode('/',$file_array2);
      $res = [
            "ext"=>$ext,
            "file_name"=>$file_name,
            "file_full_name"=>$file_name.".".$ext,
            "file_full_path"=>$path."/".$file_name.".".$ext,
            "path"=>$path,
      ];
      return $res;
}


$dirs_array = [];
$dirs = scandir("designs");
foreach($dirs as $value){
   if($value == '.' || $value == '..') {continue;}
   else $dirs_array[] = $value;
}

// out($dirs_array);


$files_array = [];
foreach($dirs_array as $dir){
   // out($dir,false);
   $files_array["designs/".$dir] = array_keys( dir_to_array("designs/".$dir) );
}

// out($files_array);


// $files = dir_to_array("designs/startbootstrap");
// $files2 = dir_to_array("designs/freelance");

// $websites = array_keys($files);
// $websites_freelance = array_keys($files2);

// echo "<pre>"; var_export($websites); die;



?>








<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="assets/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="assets/script.js"></script>

       <style type="text/css">

      body{
         margin:0;
         padding:0;
         height:100%;
         width:100%;
         position:absolute;
      }
      iframe{
         width:100%;
         /*min-height:100%;*/
         height:100%;
         display:block;
         /*position:absolute;*/
     /*    top:0;
         left:0;
         top:50px;*/
         text-align:center;
         margin:0;
      }

      #cssmenu li:hover{
         cursor: pointer;
      }


/*      #current_site{
         border:1px solid #ccc !important;
         border-radius: 10px;
         /*padding:5px !important;*/
      }*/


       </style>



   <title>CSS MenuMaker</title>
</head>
<body>

<div id='cssmenu'>
<ul>
   <li><a onclick="iframeTo('.','main.html');return false;">Home</a></li>


<?php foreach($files_array as $folder=>$files){ ?>
   <li class='active has-sub'><a href='#'><?=$folder?></a>
      <ul>
      <?php foreach($files as $website){ ?>
         <li><a onclick="iframeTo('<?=$folder?>','<?=$website?>');return false;"><?=$website?></a>
      <?php }?>
      </ul>
   </li>   
<?php } ?>



<!--    <li class='active has-sub'><a href='#'>StartBootstrap Websites</a>
      <ul>
      <?php foreach($websites as $website){ ?>
         <li><a onclick="iframeTo('startbootstrap','<?=$website?>');return false;"><?=$website?></a>
      <?php }?> -->

<!--          <li class='has-sub'><a href='#'>Product 1</a>
            <ul>
               <li><a href='#'>Sub Product</a></li>
               <li><a href='#'>Sub Product</a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'>Product 2</a>
            <ul>
               <li><a href='#'>Sub Product</a></li>
               <li><a href='#'>Sub Product</a></li>
            </ul>
         </li> -->

<!--       </ul>
   </li>
 -->



<!--    <li class='active has-sub'><a href='#'>Free Designs</a>
      <ul>
      <?php foreach($websites_freelance as $website){ ?>
         <li><a onclick="iframeTo('freelance','<?=$website?>');return false;"><?=$website?></a>
      <?php }?>
      </ul>
   </li> -->


<!-- 
   <li><a href='#'>About</a></li>
   <li><a href='#'>Contact</a></li> -->

   <li class=''><a class='' href='#' id='current_site'></a></li>

</ul>


</div>




<iframe src="main.html" id='main_iframe'></iframe>




<script type="text/javascript">
   // let main_url = "http://localhost/_websites/ahmed-badawy.com/demos/";
   let main_iframe = document.getElementById('main_iframe');
   let current_site = document.getElementById('current_site');
   function iframeTo(folder,iframe_name){
      let this_website = `${folder}/${iframe_name}`;
      console.log(this_website);
      main_iframe.src = this_website;
      current_site.innerHTML = "visit: <i class='label label-default'>"+ iframe_name+"</i>";
      current_site.href = this_website;
   }
</script>

</body>
<html>
