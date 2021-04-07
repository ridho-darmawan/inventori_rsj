 <div class="box">
    <div class="box-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h2 style="text-align: right;">DATA BARANG</h2><br>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12 ">
					<a href="V_beranda"  data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sl pull-right "><i class="glyphicon glyphicon-plus"></i></a>

				</div>
			</div>
		</div>
       		      
    </div>

    <div class="box-body">
		<div class="container-fluid">
			<div id="notifications">
				<?php echo $this->session->flashdata('msg'); ?>
			</div> 
			<br>

			
			<div class="box-body table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
						<th>No</th>
						<th>NO Seri Barang</th>
						<th>Nama Barang</th>
						<th>Penempatan Barang</th>
						<th	></th>
						</tr>
					</thead>
					<tbody>

						<?php $no=1; foreach($databarang as $d): ?>		<!-- looping data -->
					
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $d->no_seri; ?></td>
							<td><?= $d->nama_barang; ?></td>
							<td><?= $d->penempatan_barang; ?></td>
							<td>
								<div class="margin">
									<div class="btn-group">
										<button type="button" class="btn btn-default btn-flat">Aksi</button>
										<button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										</button>

										<ul class="dropdown-menu" role="menu">
											<li>
												<a href="#" data-toggle="modal" data-target="#modal_info<?= $d->no_seri; ?>">Info</a>
											</li>

											<li class="divider"></li>

											<li>
												<a href="#" data-toggle="modal" data-target="#modal_edit<?= $d->no_seri; ?>">Edit</a>
											</li>

											<li class="divider"></li>

											<li>
												<a href="#" data-toggle="modal" data-target="#modal_hapus<?= $d->no_seri;?>">Hapus</a>
											</li>

											<li class="divider"></li>

											<li>
												<a href="<?= base_url('C_databarang/cetak/'.$d->no_seri) ?>">Cetak</a>
											</li>
										</ul>
									</div>
								</div>	
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
			
				</table>
    		</div>
		</div>
	</div>

</div>
		


<!-- modal tambah -->

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">INPUT DATA BARANG</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal"  enctype="multipart/form-data" method="post" action="<?= base_url('C_databarang/tambah'); ?>">

					<div class="box-body">
		                <div class="form-group">
		                  	<label for="no seri barang" class="col-sm-2 control-label">No Seri Barang</label>
		                  	<div class="col-sm-10">
		                   		<input type="text" name="noSeriBarang" class="form-control" id="no seri barang" required>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label for="nama barang" class="col-sm-2 control-label">Nama Barang</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="namaBarang" class="form-control" id="nama barang" required>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label for="jenis barang" class="col-sm-2 control-label">Jenis Barang</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="jenisBarang" class="form-control" id="jenis barang" required>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label for="jumlah barang" class="col-sm-2 control-label">Jumlah Barang</label>
		                  	<div class="col-sm-10">
		                    	<input type="number" name="jumlahBarang" class="form-control" id="jumlah barang" required>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label for="tahun pengadaan" class="col-sm-2 control-label">Tahun Pengadaan</label>
		                  	<div class="col-sm-10">
		                    	<input type="date" name="tahunPengadaan" class="form-control pull-right" id="tahun pengadaan" required>
		                  	</div>
		                  			                  	
		                </div>

		                <div class="form-group">
		                  	<label for="distributor" class="col-sm-2 control-label">Distributor</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="distributor" class="form-control pull-right" id="distributor" required>
		                  	</div> 			                  	
		                </div>

		                <div class="form-group">
		                  	<label for="penempatan barang" class="col-sm-2 control-label">Penempatan Barang</label>
		                  	<div class="col-sm-10">
		                  		<select class="form-control" name="penempatanBarang" required>
									<option value="">---Pilih ruangan---</option>
									<?php foreach($ruangan as $r): ?>
										<option value="<?= $r->nama_ruangan; ?>"><?= $r->nama_ruangan; ?></option>

									<?php endforeach; ?>
								</select> 
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label for="harga barang" class="col-sm-2 control-label">Harga Barang</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="hargaBarang" class="form-control" id="harga barang" required>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label for="dana perbaikan" class="col-sm-2 control-label">Dana Perbaikan</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="danaPerbaikan" class="form-control" id="dana perbaikan" required>
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




<!-- modal info -->
<?php foreach($databarang as $d) :?>
<div class="modal fade" id="modal_info<?= $d->no_seri;?>" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">DETAIL BARANG</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal"  enctype="multipart/form-data" method="post" action="">

					<div class="box-body">
		                <div class="form-group">
		                  	<label class="col-sm-3">No Seri Barang</label>
		                   	<div class="col-sm-9">
		                   		<p class="control">: <?= $d->no_seri; ?></p>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label class="col-sm-3">Nama Barang</label>
		                   	<div class="col-sm-9">
		                   		<p class="control">: <?= $d->nama_barang; ?></p>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label class="col-sm-3">Jenis Barang</label>
		                   	<div class="col-sm-9">
		                   		<p class="control">: <?= $d->jenis_barang; ?></p>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label class="col-sm-3">Jumlah Barang</label>
		                   	<div class="col-sm-9">
		                   		<p class="control">: <?= $d->jumlah_barang; ?></p>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label class="col-sm-3">Tahun Pengadaan</label>
		                   	<div class="col-sm-9">
		                   		<p class="control">: <?= $d->tahun_pengadaan; ?></p>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label class="col-sm-3">Distributor</label>
		                   	<div class="col-sm-9">
		                   		<p class="control">: <?= $d->distributor; ?></p>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label class="col-sm-3">Penempatan Barang</label>
		                   	<div class="col-sm-9">
		                   		<p class="control">: <?= $d->penempatan_barang; ?></p>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label class="col-sm-3">Harga Barang</label>
		                   	<div class="col-sm-9">
		                   		<p class="control">: <?= $d->harga_barang; ?></p>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label class="col-sm-3">Dana Perbaikan</label>
		                   	<div class="col-sm-9">
		                   		<p class="control">: <?= $d->dana_perbaikan; ?></p>
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
<?php foreach($databarang as $d): ?>
<div class="modal fade" id="modal_edit<?= $d->no_seri;?>" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">EDIT DATA BARANG</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" method="post" action="<?= base_url('C_databarang/edit'); ?>">

					<div class="box-body">
		                <div class="form-group">
		                  	<label  class="col-sm-2 control-label">No Seri Barang</label>
		                  	<div class="col-sm-10">
		                   		<input type="text" name="noSeriBarang" class="form-control" value="<?= $d->no_seri;  ?>" disabled required>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label class="col-sm-2 control-label">Nama Barang</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="namaBarang" class="form-control"  value="<?= $d->nama_barang; ?>" required>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label class="col-sm-2 control-label">Jenis Barang</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="jenisBarang" class="form-control" value="<?= $d->jenis_barang; ?>" required>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label  class="col-sm-2 control-label">Jumlah Barang</label>
		                  	<div class="col-sm-10">
		                    	<input type="number" name="jumlahBarang" class="form-control" value="<?= $d->jumlah_barang; ?>" required>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label  class="col-sm-2 control-label">Tahun Pengadaan</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="tahunPengadaan" class="form-control pull-right" id="datepicker" value="<?= $d->tahun_pengadaan; ?>" required>
		                  	</div>
		                  			                  	
		                </div>

		                <div class="form-group">
		                  	<label class="col-sm-2 control-label">Distributor</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="distributor" class="form-control pull-right"  value="<?= $d->distributor; ?>" required>
		                  	</div> 			                  	
		                </div>

		                <div class="form-group">
		                  	<label  class="col-sm-2 control-label">Penempatan Barang</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="penempatanBarang" class="form-control" value="<?=$d->penempatan_barang; ?>" required>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label class="col-sm-2 control-label">Harga Barang</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="hargaBarang" class="form-control" value="<?=$d->harga_barang; ?>" required>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label  class="col-sm-2 control-label">Dana Perbaikan</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="danaPerbaikan" class="form-control"  value="<?= $d->dana_perbaikan; ?>" required>
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

<?php 	foreach($databarang as $d): ?>
<div class="modal fade" id="modal_hapus<?= $d->no_seri;?>"  role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 class="modal-title" id="myModalLabel">Hapus Data Barang</h3>
			</div>
			<form class="form-horizontal" method="post" action="<?= base_url('C_databarang/hapus');?>">
				<div class="modal-body">
					<p>Anda yakin mau menghapus?</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="noSeriBarang" value="<?= $d->no_seri;?>">
					<a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 	endforeach; ?>


<!-- end modal hapus -->