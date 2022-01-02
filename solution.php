<?php
session_start()?>
<!doctype html>
<html>
 <head>
     <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/solution.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,800;1,800&display=swap"
      rel="stylesheet"
    />
     <title>Simplexe </title>
</title>
<style>
   table, th, td {
  border: 1px dotted black;
  font-size:20px;
}
table{
   
}
</style>
</head>
<body>
   <table>
     <tr>
        <th>
           forme canonique 
        </th>
        <th>
           forme standard 
        </th>
    </tr>
    <tr>
       <td>
        
            <table >
                 <tr>
                   
                     <td><?php
                     if ($_POST["fon"]=="0") {
                          echo' Maximiser ';
                       }
                       if ($_POST["fon"]=="1") {
                        echo' Minimiser ';}
                        ?>
                    Z :
                        <?php
                             for($i=0;$i<$_SESSION["varde"];$i++)
                             {  if ($i==0) {
                                echo $_POST["z$i"].' X',$i+1;
                             } else {
                                echo "+".$_POST["z$i"].' X',$i+1;
                            }
                        }
                        ?>
                     </td>
                 </tr>
                 <tr>   
                    <td> S.C </td>
                 </tr>
                    <?php
                    for ($j=0; $j < $_SESSION["con"]; $j++) { 
                        echo "<tr> <td>";
                        for($i=0;$i<$_SESSION["varde"];$i++)
                             {  if ($i==0) {
                                echo $_POST["x$j$i"].' X',$i+1;
                             } else {
                                if ($_POST["x$j$i"]<0) {
                                   echo $_POST["x$j$i"].' X',$i+1; 
                                }else {
                                 echo "+".$_POST["x$j$i"].' X',$i+1;
                                }
                                
                            }
                        }
                       if ($_POST["oper"]=="inf") {
                          echo' <= ';
                       }
                      
                     echo $_POST["d$j"];
                        echo '<br>';
                        echo "</td> </tr>";
                    }
                    ?>
                <tr>
                    <td>
                         <?php
                          for($i=0;$i<$_SESSION["varde"];$i++)
                          {  if ($i==0) {
                             echo 'X',$i+1;
                          } else {
                             
                             echo ',X',$i+1;
                             
                         }}
                         echo ">=0";
                         ?>
                    </td>
                </tr>
            </table>
         </td>
         <td>
         <table>
                 <tr>
                   
                     <td><?php
                     
                          echo' Maximiser ';

                        ?>
                    Z :
                        <?php
                            if ($_POST["fon"]=="0")
                             {
                                    for($i=0;$i<$_SESSION["varde"];$i++)
                                    {  if ($i==0) {
                                       echo $_POST["z$i"].' X',$i+1;
                                    } else {
                                       echo "+".$_POST["z$i"].' X',$i+1;
                                    }
                                 }
                            } else {
                              for($i=0;$i<$_SESSION["varde"];$i++)
                              {  if ($i==0) {
                                 echo -$_POST["z$i"].' X',$i+1;
                              } else {
                                 echo "+".-$_POST["z$i"].' X',$i+1;
                              }
                           }
                            }
                            
                            for($i=0;$i<$_SESSION["con"];$i++)
                             { 
                                echo '+ 0 S',$i+1;
                            }
                            
                        ?>
                     </td>
                 </tr>
                 <tr>   
                    <td> S.C </td>
                 </tr>
                    <?php 
                    $k=0;
                    for ($j=0; $j < $_SESSION["con"]; $j++) { 
                        echo "<tr> <td>";
                        for($i=0;$i<$_SESSION["varde"];$i++)
                             {  if ($i==0) {
                                echo $_POST["x$j$i"].' X',$i+1;
                             } else {
                                
                                if ($_POST["x$j$i"]<0) {
                                 echo $_POST["x$j$i"].' X',$i+1; 
                              }else {
                               echo "+".$_POST["x$j$i"].' X',$i+1;
                              }
                            }
                        }
                       
                        for($i=0;$i<$_SESSION["con"];$i++)
                        {  
                           if ($i==$k) {
                           echo '+1 S',$i+1;
                            } else {
                           echo '+0 S',$i+1;
                            }
                            
                       }
                        echo' = ';
                    
                     echo $_POST["d$j"];
                       
                        echo "</td> </tr>"; 
                     $k++;
                    }
                    ?>
                <tr>
                    <td>
                         <?php
                          for($i=0;$i<$_SESSION["varde"];$i++)
                          {  if ($i==0) {
                             echo 'X',$i+1;
                          } else {
                             
                             echo ',X',$i+1;
                             
                         }}
                         for($i=0;$i<$_SESSION["con"];$i++)
                        {   
                           echo ' ,S',$i+1;
                        }
                         echo ">=0";
                         ?>
                    </td>
                </tr>
            </table>
         </td>
            </tr>   
   </table><br>
  
    <?php
    //construction du tableau initial
    $base=array();
         for ($i=1; $i <=$_SESSION["con"] ; $i++) { $base[$i-1]="s$i";}
   //   
    $b=array();
         for ($i=0; $i <$_SESSION["con"] ; $i++){$b[$i]=$_POST["d$i"];}
   //affectation des cariable
    $tableau=array("var"=>array(),"z"=>array());
         for ($i=0; $i <$_SESSION["con"] ; $i++) { $tableau[$base[$i]]=array(); }
         $tableau["var"][0]="z";
         for ($i=0; $i <$_SESSION["varde"] ; $i++) 
           {  $tableau["var"][$i+1]="x".($i+1); }//affectation des xi
         for ($i=0; $i <$_SESSION["con"] ; $i++)
           {  $tableau["var"][$i+1+$_SESSION["varde"]]="s".($i+1); } //affectation des si
           $tableau["var"][1+$_SESSION["varde"]+$_SESSION["con"]]="-";
   //affectation de ligne objective
         $tableau["z"][0]=1;
        if ($_POST["fon"]=="0") {
         for ($i=0; $i <$_SESSION["varde"] ; $i++) 
         {  $tableau["z"][$i+1]=-$_POST["z$i"]; }//affectation des cn
        } else {
         for ($i=0; $i <$_SESSION["varde"] ; $i++) 
         {  $tableau["z"][$i+1]=$_POST["z$i"]; }//affectation des cn
        }
        
         for ($i=0; $i <$_SESSION["con"] ; $i++)
           {  $tableau["z"][$i+1+$_SESSION["varde"]]=0; } //affectation des cb
         $tableau["z"][1+$_SESSION["varde"]+$_SESSION["con"]]=0;
   //remplissage de tableau
   $a=0;
   for ($i=0; $i <$_SESSION["con"] ; $i++)
   {  $tableau[$base[$i]][0]=0;
      for ($j=0; $j <$_SESSION["varde"] ; $j++) 
      {  $tableau[$base[$i]][$j+1]=$_POST["x$i$j"]; }
      for($j=0;$j<$_SESSION["con"];$j++)
      {  
         if ($j==$a) {
        $tableau[$base[$i]][$j+1+$_SESSION["varde"]]=1;
          } else {
         $tableau[$base[$i]][$j+1+$_SESSION["varde"]]=0;
          }
          
     }
     $tableau[$base[$i]][1+$_SESSION["varde"]+$_SESSION["con"]]=$b[$i];
     $a++;
   }
   
   //affichage de tableau initiale
 function conditionArret($zval,$var,$varbase)
{
  $j=1;
  $a=0;
  for ($i=1; $i <count($zval) ; $i++) { 
    if( $zval[$i]<$zval[$j])
       { 
         for ($k=0; $k <count($varbase) ; $k++) { 
              if($var[$i]==$varbase[$k])
              {
                 $a++;
              }
         }
          if($a==0)
           {
              $j=$i;
           }
       }
  }
  return $j;
}


   $p=0;
   $j=0;
   $choixvar=array();
while (1) {

   //affichage de tableau 
 echo'<br><h1>le tableau '.$p.'</h1><br>';
     $entrante=conditionArret($tableau["z"],$tableau["var"],$base);
  
  
   if ($tableau["z"][$entrante]<0) {
      for ($k=0; $k <$_SESSION["con"] ; $k++) { 
        if ($tableau[$base[$k]][$entrante]<0) {
           $j++;
        }
      }
      if ($j==$_SESSION["con"]) {
         echo"<table>";
         //tableau
        foreach ($tableau as $key => $value) {
          echo"<tr>";
             echo"<td>$key</td>";
           for ($j=0; $j <count($tableau[$key]) ; $j++) { 
              
               echo'<td>'.$tableau[$key][$j].'</td>';
           }
          echo"</tr>";
        }
        echo"</table>";
         echo'<p>-le programme n\'admet pas de solutions
         optimales  car <img src="sans.png"> </p><br>';
         break;
      }
      else{
         for ($j=0; $j <$_SESSION["con"]; $j++) { 
            if($tableau[$base[$j]][$entrante]>0){
             $choixvar[$j]=$b[$j]/$tableau[$base[$j]][$entrante];
            }
             else{
               $choixvar[$j]=-1;
             }}
         // definition de la variable sortante
         $sortante=0;
          for ($l=0; $l < count($choixvar); $l++) { 
            if ($choixvar[$l]>0 ) {
               $sortante=$l;
               break;
            }
         }
        
         for ($j=0; $j <$_SESSION["con"] ; $j++) { 
            if ($choixvar[$j]>0 && $choixvar[$j]<$choixvar[$sortante] ) {
               $sortante=$j;
            }
         }
         echo"<table>";
         //tableau
        foreach ($tableau as $key => $value) {
          echo"<tr>";
          if ($key==$base[$sortante]) {
            echo'<td style="color:red;">'.$key.'</td>';
          } else {
             echo"<td>$key</td>";
          }
           for ($j=0; $j <count($tableau[$key]) ; $j++) { 
              //colorer la variable entrante
              if($key=="var" && $j==$entrante)
              {
                 echo'<td style="color:red;">'.$tableau[$key][$j].'</td>';
              }
              elseif($key==$base[$sortante] && $j==$entrante)
              {
                 echo'<td style="color:red;">'.$tableau[$key][$j].'</td>';
              }
              else {
               echo'<td>'.$tableau[$key][$j].'</td>';
              }
             
           }
          echo"</tr>";
        }
        echo"</table>";
             
        echo'<span>
        -Teste d’optimalité: la base B'.($i+1).' ne correspond pas à une solution optimal car zn-cn('.$tableau["var"][$entrante].')<0<br>
        
        -Premier critère de Dantzig : '.$tableau["var"][$entrante].' doit rentrer<br>
        
        -Deuxième critère de Dantzig : '.$base[$sortante].' doit sortir<br>
        
        -Opération pivotage : pivot a'.($sortante+1).''.$entrante.'='.$tableau[$base[$sortante]][$entrante].'
        </span></br>';
        // mise a jour du tableau 
       foreach ($tableau as $key => $value) {
          if ($key==$base[$sortante]) {
             $tmpval=$tableau[$key];
             unset($tableau[$key]);
             $tableau[$tableau["var"][$entrante]]=$tmpval;
          } else {
             $tmpkey=$key;
             $tmpval=$tableau[$key];
             unset($tableau[$key]);
             $tableau[$tmpkey]=$tmpval;
          }
       }
       $base[$sortante]=$tableau["var"][$entrante];
       $tab=$tableau;
       foreach ($tableau as $key => $value) {
         if($key!="var")
         {
            for ($i=0; $i <=(1+$_SESSION["varde"]+$_SESSION["con"]) ; $i++) { 
               if($key==$base[$sortante])
               {
                  $tab[$key][$i]=round($tableau[$key][$i]/$tableau[$base[$sortante]][$entrante],2);
               }
               else {
                  $tab[$key][$i]=round($tableau[$key][$i]-(($tableau[$key][$entrante]/$tableau[$base[$sortante]][$entrante])*$tableau[$base[$sortante]][$i]),2);
               }
            }
         }
       }
       $tableau=$tab;
      }
   }
   elseif($tableau["z"][$entrante]>0)
   {   echo"<table>";
      //tableau
     foreach ($tableau as $key => $value) {
       echo"<tr>";
          echo"<td>$key</td>";
        for ($j=0; $j <count($tableau[$key]) ; $j++) { 
            echo'<td>'.$tableau[$key][$j].'</td>';
        }
       echo"</tr>";
     }
     echo"</table>";
          
      echo'<span>-Teste d’optimalité: la base B 2 correspond à une solution
      optimal: car <img src="unique.png"> de plus la solution est unique : </span>';
      foreach ($base as  $value) {
        if($value[0]=="x")
        {
           echo'<h3>'.$value.'='.$tableau[$value][1+$_SESSION["varde"]+$_SESSION["con"]].'</h3>';
        }
      }

       break;
   }
   elseif($tableau["z"][$entrante]==0)
   {
      echo"<table>";
         //tableau
        foreach ($tableau as $key => $value) {
          echo"<tr>";
             echo"<td>$key</td>";
           for ($j=0; $j <count($tableau[$key]) ; $j++) { 
              
               echo'<td>'.$tableau[$key][$j].'</td>';
           }
          echo"</tr>";
        }
        echo"</table>";
             
      echo'<span>-le programme admet une infinité de solutions
      optimales  car <img src="infini.png"> </span><br>'; 
      break;
   }
   $j=0;
   $p++;
}
    ?>
    
   </body>
</html>