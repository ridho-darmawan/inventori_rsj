	<div class="box">
    <div class="box-header">
       	<div class="row">
			<div class="col-md-12">
				<h2 style="text-align: right;">LAPORAN KERUSAKAN</h2><br>
			</div>
		</div>
		     
    </div>
    <div id="notifications">			<!-- notifikasi berhasil or tidak -->
		<?php echo $this->session->flashdata('msg'); ?>
	</div> 
 
 	
    <div class="box-body">
    	<table id="example1" class="table table-bordered table-striped">
        	<thead>
		        <tr>
		          <th>No</th>
		          <th>Ruangan</th>
		          <th>Nama</th>
  		          <th>NIP</th>
		          <th>Uraian Perbaikan</th>
		          <th>jumlah</th>
		          <th>Tanggal / Jam</th>
		          <th>Status Perbaikan</th>
		          <th style="text-align:center;">aksi</th>
		        </tr>
        	</thead>
	        <tbody>
	        <?php $no=1; foreach($permohonan as $l):?>
		        <tr>

		          <td><?= $no++; ?></td>
		       	  <td><?= $l->ruangan; ?></td>
		          <td><?= $l->nama; ?></td>
		          <td><?= $l->nip;?></td>
		          <td><?= $l->uraian_perbaikan;?></td>
		          <td><?= $l->jumlah; ?></td>
		          <td><?= $l->tanggal; ?> / <?= $l->jam; ?></td>
		          <td>
		          	<?php if ($l->jenis_kerusakan != null && $l->status == '0'){
		          		echo'<p style="color:green;">Sedang Diproses</p>';
		                }elseif($l->status == '1'){
		                	echo'<p>Telah Selesai</p>';
		                } else{
		          		echo'<p style="color:red;">Belum Diproses</p>';
		          		}	
		          	?>
		          </td>
		         
		          <td align="center">
		          	<?php if ($l->status == '1'):?>
		          		
		          	<!-- <a onclick="return confirm('Apakah anda yakin?')" class="btn btn-success" href="<?= base_url('C_laporankerusakan/konfirmasi/') ?><?= $l->id_pemohon ?>" data-toggle="tooltip" title="Konfirmasi Selesai"><i class="fa  fa-check"></i></a> -->
		          	<a class="btn btn-info" data-toggle="modal" data-target="#modal_infoo<?= $l->id_pemohon;?>"><i class="fa  fa-info"></i> </a>
					<a class="btn btn-warning" data-toggle="modal" data-target="#modal_editt<?= $l->id_pemohon;?>"><i class="fa  fa-edit"></i> </a>
					<a class="btn btn-danger" data-toggle="modal" data-target="#modal_hapuss<?= $l->id_pemohon;?>"><i class="fa  fa-trash"></i> </a>
					<a href="<?= base_url('C_laporankerusakan/cetak/'.$l->id_pemohon) ?>" class="btn btn-primary "><i class="fa  fa-print"></i></a>	
					

		            <?php elseif ($l->status == '0' && $l->lama_perbaikan != null): ?>

		             <a onclick="return confirm('Apakah anda yakin?')" class="btn btn-success" href="<?= base_url('C_laporankerusakan/konfirmasi/') ?><?= $l->id_pemohon ?>" data-toggle="tooltip" title="Konfirmasi Selesai"><i class="fa  fa-check"></i></a>
		          	<a class="btn btn-info" data-toggle="modal" data-target="#modal_infoo<?= $l->id_pemohon;?>"><i class="fa  fa-info"></i> </a>
					<a class="btn btn-warning" data-toggle="modal" data-target="#modal_editt<?= $l->id_pemohon;?>"><i class="fa  fa-edit"></i> </a>
					<a class="btn btn-danger" data-toggle="modal" data-target="#modal_hapuss<?= $l->id_pemohon;?>"><i class="fa  fa-trash"></i> </a>
					<!-- <a href="<?= base_url('C_laporankerusakan/cetak/'.$l->id_pemohon) ?>" class="btn btn-primary "><i class="fa  fa-print"></i></a> -->
				<?php 	elseif($l->lama_perbaikan == ''): ?>
					<a data-toggle="modal" data-target="#myModal<?= $l->id_pemohon;?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
					<a class="btn btn-info" data-toggle="modal" data-target="#modal_infoo<?= $l->id_pemohon;?>"><i class="fa  fa-info"></i> </a>
					<a class="btn btn-warning" data-toggle="modal" data-target="#modal_editt<?= $l->id_pemohon;?>"><i class="fa fa-lg fa-edit"></i> </a>
					<a class="btn btn-danger" data-toggle="modal" data-target="#modal_hapuss<?= $l->id_pemohon;?>"><i class="fa fa-lg fa-trash"></i> </a>
				<?php 	else: ?>
					<p>	k</p>
		          	<!-- <a data-toggle="modal" data-target="#myModal<?= $l->id_pemohon;?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>		          	
					<a class="btn btn-warning" data-toggle="modal" data-target="#modal_editt<?= $l->id_pemohon;?>"><i class="fa fa-lg fa-edit"></i> </a>
					<a class="btn btn-danger" data-toggle="modal" data-target="#modal_hapuss<?= $l->id_pemohon;?>"><i class="fa fa-lg fa-trash"></i> </a>
		          	 -->		
		          	<?php endif; ?>
		        
		          </td>
		        </tr>
		     <?php endforeach; ?>
	        </tbody>
       
   		</table>
    </div>
</div>


<!-- modal tindak lanjut -->
<?php foreach($permohonan as $l): ?>
<div class="modal fade" id="myModal<?= $l->id_pemohon;?>" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">FORM PERBAIKAN/PEMELIHARAAN SARANA DAN PRASARANA RUMAH SAKIT</h4>
			</div>

				<div class="modal-body">
					<form class="form-horizontal"  enctype="multipart/form-data" method="post" action="<?= base_url('C_laporankerusakan/tindak_lanjut'); ?>">				
                            <div class="form-group">
				                <label  class="col-sm-2 control-label">Lama Perbaikan</label>
				                 <div class="col-sm-10">
				                 		<input type="hidden" name="id_pemohon" value="<?= $l->id_pemohon; ?>">
				                    	<input type="text" name="lamaPerbaikan" class="form-control"  required>
				                 </div>
				               </div>

				                <div class="form-group">
					                  	<label for="jadwal perbaikan" class="col-sm-2 control-label">Jadwal Perbaikan</label>
					                  	<div class="col-sm-10">
					                  	<div class="input-group date">
						                	<div class="input-group-addon">
						                    	<i class="fa fa-calendar"></i>
						                  	</div>
						                  	<input type="date" name="jadwalPerbaikan" class="form-control pull-right" required>
						                </div>
						                </div>
					                </div>

				                <div class="form-group">
				                  	<label for="jenis kerusakan" class="col-sm-2 control-label">Jenis Kerusakan</label>

				                  	<div class="col-sm-10">
				                    	<input type="text" name="jenisKerusakan" class="form-control" id="jenis kerusakan" required>
				                  	</div>
				                </div>

				                 <div class="form-group">
				                  	<label for="bahan yang digunakan" class="col-sm-2 control-label">Bahan yang digunakan</label>

				                  	<div class="col-sm-10">
				                    	<input type="text" name="bahanDigunakan" class="form-control" id="bahan yang digunakan" required>
				                  	</div>
				                </div>

				                 <div class="form-group">
				                  	<label for="biaya perbaikan" class="col-sm-2 control-label">Biaya Perbaikan</label>

				                  	<div class="col-sm-10">
				                    	<input type="text" name="biayaPerbaikan" class="form-control" id="biaya perbaikan" required>
				                  	</div>
				                </div>

				                 <div class="form-group">
				                  	<label  class="col-sm-2 control-label">Pelaksanaan</label>

				                  	<div class="col-sm-10">
				                    	<input type="radio" name="pelaksanaan" value="ipsrs"> IPSRS <br>
				                    	<input type="radio" name="pelaksanaan" value="pihakKetiga"> Pihak Ketiga
				                  	</div>
				                </div>

				                 <div class="form-group">
				                  	<label for="hasil perbaikan" class="col-sm-2 control-label">Hasil Perbaikan</label>
				                  	<div class="col-sm-10">
				                    	<input type="radio" name="hasilPerbaikan" value="bagus"> Bagus <br>
				                    	<input type="radio" name="hasilPerbaikan" value="rusak"> Rusak
				                  	</div>
				                </div>

				         
                 			<div class="modal-footer">
								<a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
							</div>

						</div>		<!-- end box body -->
				</form>
			</div>

		</div>
	</div>
</div>

<?php endforeach; ?>

<!-- end modal tindak lanjut -->
			

<!-- model info -->
<?php foreach($permohonan as $l) :?>
<div class="modal fade" id="modal_infoo<?= $l->id_pemohon;?>" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Detail Laporan Kerusakan</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal"  enctype="multipart/form-data" method="post" action="">
					<div class="box-body">
		                <!-- <div class="form-group">
		                  	<label class="col-sm-3">ID Kerusakan</label>
		                   	<div class="col-sm-9">
		                   		<p class="control">: <?= $l->id_kerusakan; ?></p>
		                  	</div>
		                </div> -->
		                <div class="form-group">
		                  	<label class="col-sm-3">Lama Perbaikan</label>
		                   	<div class="col-sm-9">
		                   		<p class="control">: <?= $l->lama_perbaikan; ?></p>
		                  	</div>
		                </div>
		                <div class="form-group">
		                  	<label class="col-sm-3">Jadwal Perbaikan</label>
		                   	<div class="col-sm-9">
		                   		<p class="control">: <?= $l->jadwal_perbaikan; ?></p>
		                  	</div>
		                </div>
		                <div class="form-group">
		                  	<label class="col-sm-3">Bahan Yang Digunakan</label>
		                   	<div class="col-sm-9">
		                   		<p class="control">: <?= $l->bahan_digunakan; ?></p>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label class="col-sm-3">Biaya Perbaikan</label>
		                   	<div class="col-sm-9">
		                   		<p class="control">: <?= $l->biaya_perbaikan; ?></p>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label class="col-sm-3">Pelaksanaan</label>
		                   	<div class="col-sm-9">
		                   		<p class="control">: <?= $l->pelaksanaan; ?></p>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label class="col-sm-3">Hasil Perbaikan</label>
		                   	<div class="col-sm-9">
		                   		<p class="control">: <?= $l->hasil_perbaikan; ?></p>
		                  	</div>
		                </div>              			
    					<div class="modal-footer">
							<a class="btn btn-primary icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
						</div>

					</div>		<!-- end box body -->
				</form>
			</div>

		</div>
	</div>
</div>
<?php endforeach; ?>

<!-- modal edit -->
<?php foreach($permohonan as $l): ?>
<div class="modal fade" id="modal_editt<?= $l->id_pemohon; ?>" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">EDIT DATA BARANG</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" method="POST" action="<?= base_url('C_laporankerusakan/edit') ?>">

					<div class="box-body">
		                <div class="form-group">
		                  	<label class="col-sm-2 control-label">Lama Perbaikan</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="lamaPerbaikan" class="form-control"  value="<?= $l->lama_perbaikan;?>" required>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label  class="col-sm-2 control-label">Jadwal Perbaikan</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="bahanDigunakan" class="form-control pull-right" id="datepicker" value="<?= $l->jadwal_perbaikan;  ?>" required>
		                  	</div>
		                  </div>

		               
   						<div class="form-group">
		                  	<label class="col-sm-2 control-label">Jenis Kerusakan</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="jadwalPerbaikan" class="form-control"value="<?= $l->jenis_kerusakan;?>" required>
		                  	</div>
		                </div>

		                 <div class="form-group">
		                  	<label class="col-sm-2 control-label">Bahan Yang Digunakan</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="jadwalPerbaikan" class="form-control"value="<?= $l->bahan_digunakan;?>" required>
		                  	</div>
		                </div>

		                  			                  	
		                </div>

		                <div class="form-group">
		                  	<label class="col-sm-2 control-label">pelaksanaan</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="pelaksanaan" class="form-control pull-right"  value="<?= $l->pelaksanaan;  ?>" required>
		                  	</div> 			                  	
		                </div>

		                <div class="form-group">
		                  	<label  class="col-sm-2 control-label">Hasil Perbaikan</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="hasilPerbaikan" class="form-control" value="<?= $l->hasil_perbaikan;  ?>" required>
		                  	</div>
		                </div>
             		
				
    					<div class="modal-footer">
							<a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
						</div>

					</div>		<!-- end box body -->
				</form>
			</div>

		</div>
	</div>
</div>
<?php endforeach; ?>
<!-- end modal edit -->

<!-- modal hapus -->
<?php 	foreach($permohonan as $l): ?>
<div class="modal fade" id="modal_hapuss<?= $l->id_pemohon;?>"  role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 class="modal-title" id="myModalLabel">Hapus Laporan Kerusakan</h3>
			</div>
			<form class="form-horizontal" method="post" action="<?= base_url('C_laporankerusakan/hapus');?>">
				<div class="modal-body">
					<p>Anda yakin mau menghapus?</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_pemohon" value="<?= $l->id_pemohon;?>">
					<a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 	endforeach; ?>
