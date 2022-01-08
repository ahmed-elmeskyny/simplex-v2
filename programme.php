<?php
session_start();

 ?>
<!doctype html>
<html>
 <head>
     <title>Simplexe </title>
        <link rel="stylesheet" href="./css/programm.css" />
</title>
</head>
<body>
    <?php
         $_SESSION["varde"]=$_POST["varde"];
         $_SESSION["con"]=$_POST["con"];
    ?>
     <h1>
         LE PROGRAMME LINEAIRE
     </h1>
         <form action="solution.php" method="post">
            <table>
                 <tr>
                   
                     <td>
                        <select name="fon" id="">
                            <option value="0">Maximiser</option>
                            <option value="1">Minimiser</option>
                        </select>
                    Z :
                        <?php
                      
                             for($i=0;$i<$_POST["varde"];$i++)
                             {  if ($i==0) {
                                echo '<input type="number" name="z'.$i.'" > X',$i+1;
                             } else {
                                echo '+<input type="number" name="z'.$i.'"> X',$i+1;
                            }
                        }
                        ?>
                     </td>
                 </tr>
                 <tr>   
                    <td> S.C </td>
                 </tr>
                    <?php
                    for ($j=0; $j < $_POST["con"]; $j++) { 
                        echo "<tr> <td>";
                        for($i=0;$i<$_POST["varde"];$i++)
                             {  if ($i==0) {
                                echo '<input type="number" name="x'.$j.$i.'" > X',$i+1;
                             } else {
                                echo '+<input type="number" name="x'.$j.$i.'"> X',$i+1;  
                            }
                        }
                       echo' <select name="oper" id="">
                        <option value="inf"><=</option>
                          </select>';
                        echo '<input type="number" name="d'.$j.'" > <br>';
                        echo "</td> </tr>";
                    }
                    ?>
                <tr>
                    <td>
                         <?php
                          for($i=0;$i<$_POST["varde"];$i++)
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
          <button type="submit" value="suivant" class="suivant">Suivant</button>
         </form>
</body>
</html>