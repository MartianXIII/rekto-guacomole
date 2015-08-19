<?php
	$roll = mt_rand(1,6);
 ?>


 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <h1>Guess is <?= $guess ?> </h1>
       <h1>Roll is <?= $roll ?> </h1>

       <div>
         <? if($roll == $guess) {
           echo "Great Guess";
         }else {
           echo "Try again";
         } ?>
       </div>
   </body>
 </html>
