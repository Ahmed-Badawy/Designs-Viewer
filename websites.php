
<?php 

$menu = [
	"menu name 1"=>[
			"Ahmed-Badawy Website"	=> 'ahmed-badawy.com',
			'ahmed-badawy.com/cv',
	],
	"menu name 2"=>[
			"My Blog" => 'ahmed-badawy.com/blog',
			"D-Faster" => 'ahmed-badawy.com/projects/D-Faster/'
	],	
]


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
		         height:100%;
		         display:block;
		         text-align:center;
		         margin:0;
		      }

		      #cssmenu li:hover{
		         cursor: pointer;
		      }
       </style>

   <title>Designs Viewer</title>
</head>
<body>

<div id='cssmenu'>
<ul>
   <li><a onclick="iframeTo('main.html','Main');return false;">Home</a></li>


<?php foreach($menu as $menu_name=>$websites){ ?>
   <li class='active has-sub'><a href='#'><?=$menu_name?></a>
      <ul>
      <?php foreach($websites as $site_name=>$site){ ?>
      <?php $site_name = (!is_int($site_name)) ? $site_name : $site?>
         <li><a onclick="iframeTo('http://<?=$site?>','<?=$site_name?>');return false;"><?=$site_name?></a>
      <?php }?>

<!--          <li class='has-sub'><a href='#'>Product 2</a>
            <ul>
               <li><a href='#'>Sub Product</a></li>
               <li><a href='#'>Sub Product</a></li>
            </ul>
         </li>  -->

      </ul>
   </li>   
<?php } ?>


<!--    <li><a href='#'>About</a></li>
   <li><a href='#'>Contact</a></li> -->


   <li class=''><a class='' href='#' id='current_site' target='_blank'></a></li>

</ul>


</div>




<iframe src="main.html" id='main_iframe'></iframe>




<script type="text/javascript">
   let main_iframe = document.getElementById('main_iframe');
   let current_site = document.getElementById('current_site');
   function iframeTo(website_url,website_name){
   		console.log(website_url);
      	main_iframe.src = current_site.href = website_url;
		current_site.innerHTML = "Visit: <i class='label label-default'>"+ website_name+"</i>";
   }
</script>

</body>
<html>
