<!-- 
	@author Tria Bagus 
	@version 0.1 (beta) , 26 maret 2019
	@package bpptik
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dashboard</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
	<body>
		<div class="container mt-3">
		 <div class="row">	
			<div class="col-sm">
				<h2>Daftar Nilai Mahasiswa</h2>
					<form action="" method="post">
							<div class="col" style="float:left;">
								<p>Nama : <input class="form-control" type="text" name="name[]" required></p>
								<p>UTS : <input class="form-control" type="text" name="uts[]" required></p>
								<p>UAS : <input class="form-control" type="text" name="uas[]" required></p>
								<p>Tugas : <input class="form-control" type="text" name="tugas[]" required></p>
								<p>Kehadiran(%) : <input class="form-control" type="text" name="kehadiran[]" required></p>
								<hr class="bg-primary">
								<p>
						<button class="btn btn-primary" type="submit" name="submit"> Hitung Nilai </button>
						<button class="btn btn-primary" type="submit" name="add"> Tambah Mahasiswa </button>
					</p>
							</div>
					</form>
			</div>
			<div class="col-sm">	
			<?php
				function average ($nilaiawal, $nilaiakhir){ 
				/*
					@deskripsi 
					Function for average in looping student 
					
					@input 
					- nilai awal dan nilai akhir looping array
					- type data harus integer

					@output  
					- nilai average di dapatkan 
					- pesan kesalahan kalau nilai bukan type data integer
				*/
					if (is_numeric($nilaiawal) AND is_numeric($nilaiakhir)){ 
						
						$hasil = (int)($nilaiawal+$nilaiakhir)/2; 
						return $hasil; 
						
					} else { 
						return "Tipe Data Harus Angka"; 
						
					} 
				
				} 
				
				if(isset($_POST['submit'])){

					$name = $_POST['name'];
					$uts = $_POST['uts'];
					$uas = $_POST['uas'];
					$tugas = $_POST['tugas'];
					$kehadiran = $_POST['kehadiran'];
					?>
					<h2>Nilai Mahasiswa</h2>
					<table class="table table-dark">
						<thead>
							<tr>
								<th scope="col">Nama</th>
								<th scope="col">Nilai</th>
							</tr>
						</thead>
						<tbody>
					<?php
					foreach($name as $key => $val){
						$penilaian = average($uts[$key], $uas[$key], $tugas[$key], $kehadiran[$key]);

						$size = "large";
						$var_array = array("color" => "blue",
											"size"  => "medium",
											"shape" => "sphere");	
						extract($var_array, EXTR_PREFIX_SAME, "wddx");
						echo "$color, $name[$key], $shape, $wddx_size\n";
						
						if($uts[$key] < 0 || $uts[$key] > 100):

							// jika nilai uas antara 0 - 100 tidak valid
							?>
								<tr>
									<td colspan="2">Nilai uts tidak terdefinisi</td>
								</tr>
							<?php
							else:

								if($uas[$key] < 0 || $uas[$key] > 100):
									// jika nilai uas antara 0 - 100 tidak valid
									?>
										<tr>
											<td colspan="2">Nilai uas tidak terdefinisi</td>
										</tr>
									<?php
									else:
							
										if($tugas[$key] < 0 || $tugas[$key] > 100):
										// jika nilai tugas antara 0 - 100 tidak valid
										?>
											<tr>
												<td colspan="2">Nilai tugas tidak terdefinisi</td>
											</tr>
										<?php
										else:
											
											if($kehadiran[$key] < 0 || $kehadiran[$key] > 100):
											// jika kehadiran antara 0 - 100 tidak valid
											?>
												<tr>
													<td colspan="2">Persentase Kehadiran tidak terdefinisi</td>
												</tr>
											<?php
											else:
												if($kehadiran[$key] < 80):
												// jika persentase kehadiran dibawah 80% 
													?>		
													<tr>
														<td><?= $name[$key];?></td>
														<td>Nilai E</td>
													</tr>
													<?php
												else:
													if($penilaian >= 85 && $penilaian <= 100):
														// penilaian nilai 85 sampai 100
													?>
														<tr>
															<td><?= $name[$key];?></td>
															<td>Nilai A</td>
														</tr>
													<?php
													elseif($penilaian >= 70 && $penilaian < 85):
														// penilaian nilai 70 sampai 85
													?>
														<tr>
															<td><?= $name[$key];?></td>
															<td>Nilai B</td>
														</tr>
													<?php
													elseif($penilaian >= 60 && $penilaian < 70):
														// penilaian nilai 60 sampai 70
													?>
														<tr>
															<td><?= $name[$key];?></td>
															<td>Nilai C</td>
														</tr>
													<?php
													elseif($penilaian >= 55 && $penilaian < 60):
														// penilaian nilai 55 sampai 60
													?>
														<tr>
															<td><?= $name[$key];?></td>
															<td>Nilai D</td>
														</tr>
													<?php
														elseif($penilaian < 55):
															// penilaian nilai kurang 55
													?>
														<tr>
															<td><?= $name[$key];?></td>
															<td>Nilai E</td>
														</tr>
													<?php
													else:
														// penilaian nilai tidak terdefinisikan
													?>
														<tr>
															<td colspan="2">Nilai tidak terdefinisi</td>
														</tr>
													<?php
													endif;
												
										endif;
							
									endif;
								
								endif;
							
							endif;
						endif;
						
					} 
					?>
						</tbody>
					</table>
					<?php
				} 
			?> 
				</div>
			</div>
		</div>	
	</body>
</html>

