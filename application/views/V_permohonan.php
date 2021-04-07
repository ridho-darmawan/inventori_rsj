<div class="box">
    <div class="box-header">
		<div class="container-fluid">

			<div class="row">
				<div class="col-md-12">
					<h2 style="text-align: right;">PERMOHONAN</h2><br>
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
			<div id="notifications">			<!-- notifikasi berhasil or tidak -->
				<?php echo $this->session->flashdata('msg'); ?>
			</div> 
			<br>

			<div class="box-body table-responsive">
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
						<th style="text-align:center;">Status Permohonan</th>
						</tr>
					</thead>
					<tbody>

						<?php $no=1; foreach($permohonan as $p): ?>	
					
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $p->ruangan; ?></td>
								<td><?= $p->nama; ?></td>
								<td><?= $p->nip; ?></td>
								<td><?= $p->uraian_perbaikan;?></td>
								<td><?= $p->jumlah; ?></td>
								<td><?= $p->tanggal; ?> / <?= $p->jam; ?></td>
								<td align="center">
									<?php if ($p->status == '0'){
										echo'<p class="btn btn-warning">Sedang Diproses</p>';
										} 
									else{
										echo'<p class="btn btn-info">Telah Selesai Diperbaiki</p>';
										}
									?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
			
				</table>
			</div>
		</div>
	</div>

</div>



<!-- mode tambah -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">FORM PERBAIKAN/PEMELIHARAAN SARANA DAN PRASARANA RUMAH SAKIT</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal"  enctype="multipart/form-data" method="post" action="<?= base_url('C_permohonan/tambah'); ?>">				
					<div class="form-group">
						<label for="ruangan" class="col-sm-2 control-label">Ruangan</label>
						<div class="col-sm-10">
							
							
							<input type="text" name="ruangan" class="form-control" value="<?= $this->session->userdata('ses_ruangan'); ?>" disabled>  
							
						</div>
					</div>
					<div class="form-group">
						<label for="nama" class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-10">
							<input type="text" name="nama" class="form-control"> 
						</div>
					</div>
					<div class="form-group">
						<label for="nip" class="col-sm-2 control-label">NIP</label>
						<div class="col-sm-10">
							<input type="text" name="nip" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="uraian perbaikan" class="col-sm-2 control-label">Uraian Perbaikan</label>
						<div class="col-sm-10">
							<input type="text" name="uraianPerbaikan" class="form-control" id="uraian perbaikan" required>
						</div>
					</div>

					<div class="form-group">
						<label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
						<div class="col-sm-10">
							<input type="text" name="jumlah" class="form-control" id="jumlah" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Tanggal
						</label>
						<div class="col-sm-10">
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>	

								<input type="date" name="tanggal" class="form-control pull-right">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="jam" class="col-sm-2 control-label">Jam </label>
						<div class="col-sm-10">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-clock-o"></i>
								</div>
								<input type="time" name="jam" class="form-control pull-right">
							</div>
						</div>
					</div>      
				
					<div class="modal-footer">
						<a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>
