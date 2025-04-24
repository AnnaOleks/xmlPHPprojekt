<?php
$inimene=simplexml_load_file("inimesed.xml");
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <title>XML inimeste lugemine PHP abil</title>
</head>
<body>
<h2>inimesed.xml failist sisu</h2>
<?php
echo "<strong>1. inimese andmed: </strong>";
echo $inimene->inimene[0]->ees_nim." ";
echo $inimene->inimene[0]->perekonna_nimi.", ";
//xml atribuuti lugemine
echo $inimene->inimene[0]->attributes()->isikukood;
?>
<table>
    <tr>
        <th>ID</th>
        <th>Nimi</th>
        <th>Perenimi</th>
        <th>Sugu</th>
        <th>e-mail</th>
        <th>Lapseandmned</th>
    </tr>
    <?php
    foreach($inimene->inimene as $isik){
        echo "<tr>";
        echo "<td>".$isik->id."</td>";
        echo "<td>".$isik->ees_nim."</td>";
        echo "<td>".$isik->perekonna_nimi."</td>";
        echo "<td>".$isik->sugu."</td>";
        echo "<td>".$isik->email."</td>";
        echo "<td>".$isik->laps->inimene->ees_nim." ".$isik->laps->inimene->perekonna_nimi."<br>".$isik->laps->inimene->sugu."<br>".$isik->laps->inimene->email."</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>