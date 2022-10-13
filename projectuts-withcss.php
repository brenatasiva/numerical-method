<!DOCTYPE html>
<html>
<head>
	<title>Project UTS</title>
</head>
<style>
	
.container{
	width: 80%;
	background-color: white;
	margin: auto;
}
.header{
	background-color: white;
	width: 100%;
	 margin: auto;
}

.group{
	padding: 10px;
	clear: both;
	width: 50%;
}

h1{
	font-family: sans-serif;
	margin: 0px;
	padding: 10px;
	margin-left: 10%;
}
.form-label{
	width: 50%;
	float: left;
}
.control{
	float: left;
}

button{
	margin-left:50%;
	width: 165px;
}

body{
	margin: 0px;
	padding: 0px;
	background-color: white;
}
table, tr, td{border: 2px solid black; border-collapse: collapse;}
</style>
<script type="text/javascript" src="jquery.js"></script>
<body>
	<form method="post" action="" name="myform">
		<div class="container">
			<div class="header">
				<h1>Newton Rapson</h1>
			</div>
			
			<div class="content">
				<div class="group">
					<label class="form-label">Nilai Awal</label>
					<div class="control">
						<input type="decimal" name="nilaiawal" class="input-control">
					</div>
				
				</div>
				
				
			</div>	

			<div class="group">
				<label class="form-label">Kriteria Berhenti</label>
				<div class="control">
					<select name="kriteria" id="kriteria" class="input-control">
					<option value="1">Maximum Iterasi</option>
					<option value="2">Digit Signifikan</option>
					<option value="3">f(x)</option>
				</select>
				</div>
				
			</div>

			<div class="group">
				<label class="form-label">Nilai Kriteria</label>
				<div class="control">
					<input type="decimal" name="nilaikriteria" class="input-control" id="txtkriteria">
				</div>
				
			</div>

				<div class="group">
					<button type="submit" name="btnhitung">Hitung</button>
				</div>
		
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
								if($fx <= $_POST['nilaikriteria']) $break = "break";
								if($break == "break") break;
								$sebelum_x = $x;
								$x = $sebelum_x-($fx/$fxx);
								$fx = (exp(-$x)-$x);
								$fxx = (-exp(-$x)-1);
								$ea = ($x != 0) ? abs(($x-$sebelum_x)/$x)*100 : "0";
								$i++;
								
								$break = ($fx=="0") ? "break" : "";
							}
						}
					}
				?>
				
			</tbody>
		</table>
		</div>
	</form>
<script type="text/javascript">
</script>
</body>
</html>