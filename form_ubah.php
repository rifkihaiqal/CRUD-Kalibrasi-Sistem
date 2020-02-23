	<?php
    if (isset($_GET['equipment'])) {
    	// ambil data get dari form
        $equipment = $_GET['equipment'];
        // fungsi query untuk menampilkan data dari tabel pegawai berdasarkan equipment
        $result = $mysqli->query("SELECT * FROM pegawai WHERE equipment='$equipment'") or die('Query Error: '.$mysqli->error);
        $data = $result->fetch_assoc();
    	// buat variabel untuk menampung data
		$equipment      = $data['equipment'];
		$area  		    = $data['area'];
		$actual  	    = $data['actual'];
		$caldate 		= date('d-m-Y', strtotime($data['caldate']));
		$frekuensi 		= $data['frekuensi'];
		$merk         	= $data['merk'];
		$itemcheck      = $data['itemcheck'];
		$actual         = $data['actual'];
		$foto          	= $data['foto'];
		// tutup koneksi
        $mysqli->close(); 
    }
    ?>

<div class="row">
        <div class="col-md-12">
			<div class="alert alert-info" role="alert">
  				<i class="fas fa-edit"></i> Input Data Pegawai
			</div>

			<div class="card">
			  	<div class="card-body">
			    	<form class="needs-validation" action="proses_ubah.php" method="post" enctype="multipart/form-data" novalidate>
					  	<div class="row">
					    	<div class="col">
					      		<div class="form-group col-md-12">
									<label>Equipment</label>
									<input type="text" class="form-control" name="equipment"autocomplete="off" required>
									<div class="invalid-feedback">Tidak boleh kosong.</div>
								</div>

								<div class="form-group col-md-12">
									<label>Area</label>
									<input type="text" class="form-control" name="area" autocomplete="off" required>
									<div class="invalid-feedback">Tidak boleh kosong.</div>
								</div>

								<div class="form-group col-md-12">
									<label>Frekuensi</label>
									<select class="form-control" name="frekuensi" autocomplete="off" required>
								      	<option value=""></option>
										<option value="1/M">1/M</option>
										<option value="1/3M">1/3M</option>
										<option value="1/6M">1/6M</option>
										<option value="1/Y">1/Y</option>
										<option value="1/2Y">1/2Y</option>
								    </select>
								</div>
								</div>

					    	<div class="col">
								<div class="form-group col-md-12">
									<label>Merk</label>
									<input type="text" class="form-control" name="merk" autocomplete="off" required>
									<div class="invalid-feedback">Nama Pegawai tidak boleh kosong.</div>
								</div>

								<div class="form-group col-md-12">
									<label>Calibrate Date</label>
									<input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="caldate" autocomplete="off" required>
									<div class="invalid-feedback">Tanggal Lahir tidak boleh kosong.</div>
								</div>

								<div class="form-group col-md-12">
									<label>Item Check</label>
									<textarea class="form-control" rows="2" name="itemcheck" autocomplete="off" required></textarea>
									<div class="invalid-feedback">Alamat tidak boleh kosong.</div>
								</div>

								<div class="form-group col-md-12">
									<label>Actual</label>
									<input type="text" class="form-control" name="actual" autocomplete="off" required>
									<div class="invalid-feedback">No. HP tidak boleh kosong.</div>
								</div>
					    	</div>

					    	<div class="col">
					    		<div class="form-group col-md-12">
									<label>Foto Git</label>
    								<input type="file" class="form-control-file mb-3" id="foto" name="foto" onchange="return validasiFile()" autocomplete="off" required>
									<div id="imagePreview"><img class="foto-preview" src="foto/default_user.png"/></div>
									<div class="invalid-feedback">Foto Git Tidak Boleh Kosong</div>
								</div>
					    	</div>
					  	</div>

					  	<div class="my-md-4 pt-md-1 border-top"> </div>

						<div class="form-group col-md-5">
			                <input type="submit" class="btn btn-info btn-submit" name="simpan" value="Simpan">
				  		</div>
					</form>
			  	</div>
			</div>
        </div>
	</div>
