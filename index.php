
<!doctype html>
<html>
 <head>
      <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/index.css" />
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
     <div class="title">
      <h1>Méthode du Simplexe</h1>
      <p>
        Nous avons créé une calculatrice de la méthode du simplex, qui vous
        permettra de développer des problèmes de maximisation et de minimisation
        en appliquant la méthode simplex traditionnelle
      </p>
    </div>
         <form  action='programme.php' method="post">
            <table>
                 <tr>
                     <td>
                     Combien de variables de décision ?
                     </td>
                     <td>
                         <input type="number" name="varde" >
                     </td>

                 </tr>
                 <tr>
                     <td>
                      Combien de contraintes?
                     </td>
                     <td>
                         <input type="number" name="con" >
                     </td>
                 </tr>
            </table>
            <a href="programme.php"><input type="submit" value="suivant" class="suivant"><img src="./assets/arrow.png" width="15px" /></a>
         </form>
</body>
</html>