<?php
session_start();

 ?>
<!doctype html>
<html>
 <head>
     <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/programm.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,800;1,800&display=swap"
      rel="stylesheet"
    />
     <title>Simplexe </title>
</title>
</head>
<body>
    <?php
         $_SESSION["varde"]=$_POST["varde"];
         $_SESSION["con"]=$_POST["con"];
    ?>
     <div class="title">
      <h1>LE PROGRAMME LINEAIRE</h1>
    </div>
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
            <a href="solution.php"><input type="submit" value="suivant" class="suivant" ><img src="./assets/arrow.png" width="15px" /></a>
         </form>
</body>
</html>