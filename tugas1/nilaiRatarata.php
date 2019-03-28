<html>
	<head>
		<title>Dashboard</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
	<div class="container mt-3">
			<h1>Nilai </h1>
				<form action="" method="post">
					<p>UTS : <input class="form-control" type="text" name="uts" required></p>
					<p>UAS : <input class="form-control" type="text" name="uas" required></p>
					<p>Tugas : <input class="form-control" type="text" name="tugas" required></p>
					<p>Kehadiran(%) : <input class="form-control" type="text" name="kehadiran" required></p>
					<p><button type="submit" name="submit"> Hit Nilai </button></p>
				</form>
	</div>
	<?php
	if(isset($_POST['submit'])):
		echo"<div class='container'>";
	// bila submit ada
		$uts = $_POST['uts'];
		$uas = $_POST['uas'];
		$tugas = $_POST['tugas'];
		$kehadiran = $_POST['kehadiran'];
		
		$nilai = $uts + $uas + $tugas; // deklarasi variable Rata-rata
		$penilaian = $nilai / 3;
		// deklarasi variable
		
		if($uts < 0):
		// jika nilai uts antara 0 - 100 tidak valid
			echo "<p>Nilai uts tidak valid</p>";
		elseif($uts > 100):
			echo "<p>Nilai uts tidak valid</p>";
		else:
		
			if($uas < 0):
			// jika nilai uas antara 0 - 100 tidak valid
				echo "<p>Nilai uas tidak valid</p>";
			elseif($uts > 100):
				echo "<p>Nilai uas tidak valid</p>";
			else:
			
				if($tugas < 0):
				// jika nilai tugas antara 0 - 100 tidak valid
					echo "<p>Nilai tugas tidak valid</p>";
				elseif($tugas > 100):
					echo "<p>Nilai tugas tidak valid</p>";
				else:
					
					if($kehadiran < 0):
					// jika kehadiran antara 0 - 100 tidak valid
						echo "<p>Kehadiran tidak valid</p>";
					elseif($kehadiran > 100):
						echo "<p>Kehadiran tidak valid</p>";
					else:
						
						if($kehadiran < 80):
						// jika kehadiran dibawah 80% 
							echo "<p>Nilai E</p>";
						else:
							
							if($penilaian >= 85 && $penilaian <= 100):
								echo "<p>Nilai A </p>";
							elseif($penilaian >= 70 && $penilaian < 85):
								echo "<p>Nilai B </p>";
							elseif($penilaian >= 60 && $penilaian < 70):
								echo "<p>Nilai C </p>";
							elseif($penilaian >= 55 && $penilaian < 60):
								echo "<p>Nilai D </p>";
							elseif($penilaian < 55):
								echo "<p>Nilai E </p>";
							else:
								echo "<p>Nilai tidak terdefinisi</p>";
							endif;
							
						endif;
				
					endif;
				
				endif;
			
			endif;
			
		endif;
		
	else:
		echo "Antum belom mengisi form";
	endif;
		echo"</div>";
	?>
	</body>
</html>
