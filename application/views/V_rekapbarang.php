
 <div class="box">
    <div class="box-header">
       	<div class="row">
			<div class="col-md-12">
				<h2 style="text-align: right;">REKAP DATA BARANG</h2><br>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
							
				<form method="post" action="<?= base_url('C_rekap/cetakbarang') ?>">
						
						<div class="form-group">
							<div class="col-md-3">
								<select name="tahun" class="form-control">
									<option value="#">---Pilih Tahun---</option>
									<?php
									for($x = date('Y'); $x >= date('Y') - 15; $x--):
									?>
									<option value="<?= $x ?>"><?= $x ?></option>
								<?php endfor; ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-2">
								
								<input type="submit" class="form-control btn btn-primary" value="CETAK">			
							</div>
						</div>
								
				</form>

			</div>
		</div><br><br><br>

	

 
		</div>
</div>
 




