<!DOCTYPE html>
<html>
<head>
	<title>Project UTS</title>
</head>
<style type="text/css">
	table, tr, td{border: 2px solid black; border-collapse: collapse;}
</style>
<body>
	<form method="post" action="">
		<h1>Newton Raphson</h1>
		<label>Nilai Awal </label><input type="decimal" name="nilaiawal"><br>
		<label>Kriteria Berhenti </label>
		<select name="kriteria">
			<option value="1">Maximum Iterasi</option>
			<option value="2">Digit Signifikan</option>
			<option value="3">f(x)</option>
		</select>
		<label>Nilai Kriteria </label><input type="decimal" name="nilaikriteria"><br>
		<button type="submit" name="btnhitung">Hitung</button>
		<table>
			<thead>
				<tr>
					<td>Iterasi</td>
					<td>X</td>
					<td>f(x)</td>
					<td>f '(x)</td>
					<td>abs(ea)</td>
				</tr>
			</thead>
			<tbody>
				<?php  
					if(isset($_POST['btnhitung'])){
						$x = $_POST['nilaiawal'];
						$fx = (exp(-$x)-$x);
						$fxx = (-exp(-$x)-1);
						$ea = null;
						$bool="true";
						echo "<br>Nilai Awal = ".$x;

						if($_POST['kriteria'] == 1){
							$break = "";
							for ($i=1; $i < $_POST['nilaikriteria']+1; $i++) { 
								echo"<tr>";
								echo"<td>".$i."</td>";
								echo"<td>".$x."</td>";
								echo"<td>".$fx."</td>";
								echo"<td>".$fxx."</td>";
								echo"<td>".$ea."</td>";
								echo"</tr>";
								$sebelum_x = $x;
								$x = $sebelum_x-($fx/$fxx);
								$fx = (exp(-$x)-$x);
								$fxx = (-exp(-$x)-1);
								$ea = ($x != 0) ? abs(($x-$sebelum_x)/$x)*100 : "0";
								if($break == "break") break;
								$break = ($fx == "0") ? "break" : "";
							}
							echo "<br>Berhenti sampai iterasi ke = ".$_POST['nilaikriteria'];
						}
						elseif ($_POST['kriteria'] == 2) {
							$es = pow(10, (2-$_POST['nilaikriteria']))/2;
							$i = 1;
							$break = "";
							while ($bool == "true") {
								echo"<tr>";
								echo"<td>".$i."</td>";
								echo"<td>".$x."</td>";
								echo"<td>".$fx."</td>";
								echo"<td>".$fxx."</td>";
								echo"<td>".$ea."</td>";
								echo"</tr>";
								$sebelum_x = $x;
								$x = $sebelum_x-($fx/$fxx);
								$fx = (exp(-$x)-$x);
								$fxx = (-exp(-$x)-1);
								$ea = ($x != 0) ? abs(($x-$sebelum_x)/$x)*100 : "0";
								$i++;
								if($break == "break") break;
								$break = ($ea <= $es || $fx == "0") ? "break" : "";
							}
							echo "<br>es = ".$es;
						}
						else{
							$i = 1;
							$break = "";
							while ($bool == "true") {
								echo"<tr>";
								echo"<td>".$i."</td>";
								echo"<td>".$x."</td>";
								echo"<td>".$fx."</td>";
								echo"<td>".$fxx."</td>";
								echo"<td>".$ea."</td>";
								echo"</tr>";
								$sebelum_x = $x;
								$x = $sebelum_x-($fx/$fxx);
								$fx = (exp(-$x)-$x);
								$fxx = (-exp(-$x)-1);
								$ea = ($x != 0) ? abs(($x-$sebelum_x)/$x)*100 : "0";
								$i++;
								if($break == "break") break;
								$break = ($fx == "0") ? "break" : "";
							}
						}
					}
					
				?>
				
			</tbody>
		</table>

	</form>

</body>
</html>