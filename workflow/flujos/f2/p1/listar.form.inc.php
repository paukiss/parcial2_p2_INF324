<div class="d-flex justify-content-around">
    <div class="p-2">
        <h1 class="text-slim text-default">Academico</h1>
    </div>
</div>

<table class="table">
	<thead>
		<tr> 	
			<th scope="col">Nro</th>
			<th scope="col">Alumno</th>
			<th scope="col">Cedula de Identidad</th>
			<th scope="col">Certificado Nacimiento</th>	
			<th scope="col">Fotocopia Legalizada</th>
		</tr>
	</thead>
   
        <?php
            $cont = 1;
            while($fila = mysqli_fetch_array($resCab))
            {
                echo " <tr>";
                echo "<th scope='row'> $cont </th>";
                echo "<td>".$fila["nombre"]."</td>";
                echo "<td>";
                echo "<a href=".$fila["ci"].">";
                echo  '<img src="'.$fila["ci"].'" alt="ci2" class="card-img-top" style="width: 200px;">';
                echo "</a>";
                echo "</td>";
                echo "<td>";
                echo "<a href=".$fila["certNac"].">";
                echo  '<img src="'.$fila["certNac"].'" alt="ci2" class="card-img-top" style="width: 200px;">';
                echo "</a>";
                echo "</td>";
                echo "<td>";
                echo "<a href=".$fila["legalizada"].">";
                echo  '<img src="'.$fila["legalizada"].'" alt="ci2" class="card-img-top" style="width: 200px;">';
                echo "</a>";
                echo "</td>";
                echo "</tr>";
                $cont += 1;
            }
        ?>
</table>