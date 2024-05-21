<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste</title>
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <header id="header">
        <div class="container">
        <h1 class="logo"><a href="index.html">CampusWise</a></h1>
        <nav id="navbar">
            <ul>
              <li><a  href="index.html">Home</a></li>
              <li><a  class="active" href="Liste.html">Liste</a></li>
              <li><a href="admission.html">Admission</a></li>
              <li><a  href="about.html">About</a></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
          </nav>
        </div>
    </header>

    <h1>Liste des etudiants</h1>
    <a href="ajout.html">Ajouter un etudiant</a>
    <?php

        try{
            $db= new PDO("mysql:host=localhost;dbname=inscription","root","");
        }catch(Exception $e){
            die( "Erreur :" .$e->getMessage());
        }

        $req="SELECT *FROM contact";
        //preparation de la requete

        $reqPrepa= $db->prepare($req);
        $reqPrepa-> execute();
        $liste= $reqPrepa-> fetchAll();
        
    ?>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Telephone</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php

        foreach($liste as $row){
           
            echo"<tr>";
                echo"<td>".$row['nom']."</td>";
                echo"<td>".$row['prenom']."</td>";
                echo"<td>".$row['telephone']."</td>";
                echo"<td>".$row['email']."</td>";
                echo"<td><a href=\"modifier.php?id=".$row['id']."\">Modifier</a></td>";
                echo"<td><a href=\"delete.php?id=".$row['id']."\">Delete</a></td>";

            echo"</tr>";
            
        }
    ?>
    </table>

    <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Nemmata</span></strong>. All Rights Reserved
      </div>
     
    </div>
  </footer>
  <script src="assets/css/js/script.js"></script>
    
</body>
</html>