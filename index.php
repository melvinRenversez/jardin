<?php

include("php/database.php");

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Tableau des légumes</title>
</head>
<body>
    <div class="container">
        <div class="left">
            <table id="table">
                <thead>
                    <tr>
                        <th>Légume</th>
                        <th>Poids</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody id="tbody">

                    <?php 

                    $sql = "SELECT nom, poids, date_recolte FROM legumes ORDER BY id DESC";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);


                    while ($result) {

                        $unite = $result['poids'] < 1000 ? "g" : "kg";

                        if ($result["poids"] >= 1000) {
                            $poids = $result['poids'] / 1000;
                            $poids = number_format($poids, 1, '.', '');
                        }else{
                            $poids = number_format($result["poids"], 1, '.', '');
                        }


                        echo "<tr><td>". $result['nom']. "</td><td>". $poids. " ". $unite. "</td><td>". $result['date_recolte']. "</td></tr>";
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    }

                    ?>

                </tbody>
            </table>
        </div>
        <div class="right">

            <form method="POST" action="php/addLegume.php">
                <label for="inputLegume">Légume :</label>
                <select id="inputLegume" name="nom" required>
                    <option value="">--Legume--</option>
                    <option value="carotte">Carotte</option>
                    <option value="poireau">Poireau</option>
                    <option value="radis">Radis</option>
                    <option value="navet">Navet</option>
                    <option value="pomme de terre">Pomme de terre</option>
                </select>
                
                <label for="inputPoids">Poids :</label>
                <input type="number" id="inputPoids" name="poids" step="0.001"  required>
                
                <label for="inputTypePoids">Type poids :</label>
                <select id="inputTypePoids" name="unite" required>
                    <option value="">--Poids--</option>
                    <option value="kg">kg</option>
                    <option value="g">g</option>
                </select>
                
                <label for="inputDate">Date :</label>
                <input type="date" id="inputDate" name="date_recolte" required>

                <button onclick="buttonClick()">Ajouter</button>
            </form>

        </div>
    </div>
</body>
</html>
