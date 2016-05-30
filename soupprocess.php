<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Chloe's Cafe</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!--<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" >-->
        
        
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<!--<link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css" >-->
<link rel="stylesheet" href="main.css" >
        
 </head>

<body>
    
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html"> Chloe's French Cafe </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="cafe.html">Cafe <span class="sr-only">(current)</span></a></li>
        <li><a href="catering.html">Catering</a></li>
           <li><a href="aboutus.html">About Us</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Chloe's in the press</a></li>
            <li><a href="#">Recipes </a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
     
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
    </nav>
    <!-- end of navbar -->
    
    <div class="container title">
        <div class="row">
            <div class=" col-sm-2 imgrub">
                <img src="2cvrubstamp.png" class="img-responsive">
            </div>
            <div class=" col-sm-10 introtext">
                <h1 class="fontspecial"> Chlo&eacute;'s Cafe Soup Calendar</h1>
                <hr> 
                <p class="toptext fontspecial"> Our catering menu is diverse and will please all your guests. Our catering menu is diverse and will please all your guests. Our catering menu is diverse and will please all your guests. Our catering menu is diverse and will please all your guests. Our catering menu is diverse and will please all your guests. Our catering menu is diverse and will please all your guests. Our catering menu is diverse and will please all your guests. Our catering menu is diverse and will please all your guests. Our catering menu is diverse and will please all your guests. Our catering menu is diverse and will please all your guests. Our catering menu is diverse and will please all your guests.  </p>
                
        </div>
    
    </div>
    
    </div>
    <div class="container-fluid calendar"> 
    
   <div class="row soupdujour">
        <?php
            
            $link = mysqli_connect("localhost", "root", "admin", "soup");
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}



    $i = getdate();
    $ii = $i['mon'];
    $ij = $i['mday'];
    

$sql = "SELECT id, soupidf FROM soupcalendar";
$sql1 = "SELECT id, name, picture, description, vegetarian, gluten FROM souplist";
$result = $link->query($sql);
if (!$result = $link->query($sql)) {
    echo "Sorry, the website is experiencing problems.";
    exit;
}
$result1 = $link->query($sql1);
if (!$result1 = $link->query($sql1)) {
    echo "Sorry, the website is experiencing problems.";
    exit;
}
 
$count = 0;
while ($souplist = $result1->fetch_assoc()){
    
    $id[] = $souplist['id'];
    $name[] = $souplist['name'];
    $picture[] = $souplist['picture'];
    $description[] = $souplist['description'];
    $vegetarian[] = $souplist['vegetarian'];
    $gluten[] = $souplist['gluten'];
    $count ++;
}

   $count1 = 0;
       
while ($soupid = $result->fetch_assoc()){
   
    $soupidf[] = $soupid['soupidf'];
    $count1 ++;
}
 
  for ($p=1; $p <= $count1; $p++){
      $date1 = mktime(0,0,0,$ii,$p);
      $j1 = getdate($date1);
      $mday1 = $j1['mday'];
      $weekday1 = $j1['weekday'];
      $month1 = $j1['month'];
      
      if ($ij == $mday1) {
          echo "<h3>".$weekday1." ,".$month1." ".$mday1."</h3> <br><br>";
         
          
          for ($cc=0; $cc < $count1; $cc++){
              for ($sd = 0; $sd < $count; $sd++){
                if ($soupidf[$cc] == $id[$sd]){
                    echo $picture[$sd];
                    echo "<br><br>".$vegetarian[$sd].$gluten[$sd];
                    goto end;
                }
                  
              }
              
            }
      
  }
  }
end:
?>
   </div> 
    
<div class="row rowcalendar">   
<?php



echo "<table>";
$s = 0;
$m = 1;
   for ($l = 0; $l<6; $l++) {
        echo "<tr >";
    for ($k=0;$k<7;$k++) {
        $date = mktime(0,0,0,$ii,$m);
        $j = getdate($date);
        $weekday = $j['weekday'];
        $month = $j['month'];
        $mday = $j['mday'];
        if ($soupidf[$s] == 0)
        {
            echo "<td class='nulldate'>  </td>";
           
        }
        else {
        
            if ($mday == $ij){
                echo "<td class='ondate1'> <p class='datebold'>".$weekday.", ".$month."  ".$mday. "</p>";
                $m++;
                for ($cc=0; $cc < $count; $cc++){
                if ($soupidf[$s] == $id[$cc]){
                    echo $description[$cc];
                    echo "<br>".$vegetarian[$cc].$gluten[$cc];
                    
                }
            }
                 echo "</td>";
            }
            else {
            echo "<td class='ondate'> <p class='datebold'>".$weekday.", ".$month."  ".$mday. "</p>";
                $m++;
            for ($cc=0; $cc < $count; $cc++){
                if ($soupidf[$s] == $id[$cc]){
                    echo $description[$cc];
                    echo "<br>".$vegetarian[$cc].$gluten[$cc];
                }
            }
                 echo "</td>";
            }
        }
        $s++;
    }
       echo "</tr>";
   }

echo "</tr> </table> ";
    
    mysqli_close($link);
?>

</div> 

    </div>
</body>

</html>