<div class="box">
	<div class="box-header">
       	<div class="row">
			<div class="col-md-12">
				<h2 style="text-align: right;">DATA RUANGAN</h2><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 ">
				<a href="V_beranda"  data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sl pull-right "><i class="glyphicon glyphicon-plus"></i></a>		
			</div>
		</div>	      
    </div>

<div id="notifications">
	<?php echo $this->session->flashdata('msg'); ?>
</div> 
<br>

<div class="card">
	<div class="box-body">
    	<table id="example1" class="table table-bordered table-striped">
        	<thead>
		        <tr>
		          <th>No</th>
		          <th>ID RUANGAN</th>
		          <th>NAMA RUANGAN</th>
		          
		          <th style="text-align:center;">aksi</th>
		        </tr>
        	</thead>
	        <tbody>

	        	<?php $no=1; foreach($ruangan as $r): ?>		<!-- looping data -->
	        
		        <tr>
		          <td><?= $no++; ?></td>
		          <td><?= $r->id_ruangan; ?></td>
		          <td><?= $r->nama_ruangan; ?></td>
		          
		          <td align="center">
		          	
						<a class="btn btn-success" data-toggle="modal" data-target="#modal_edit<?= $r->id_ruangan; ?>"><i class="fa fa-lg fa-edit"></i> </a>
						<a class="btn btn-danger" data-toggle="modal" data-target="#modal_hapus1<?= $r->id_ruangan;?>"><i class="fa fa-lg fa-trash"></i> </a>
		          </td>
		        </tr>
		     <?php endforeach; ?>
	        </tbody>
       
   		</table>
    </div>
</div>
</div>

	
										<!-- modal tambah -->

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">TAMBAH DATA RUANGAN</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal"  enctype="multipart/form-data" method="POST" action="<?= base_url('C_ruangan/tambah'); ?>">

					<div class="box-body">
		                <div class="form-group">
		                  	<label for="id" class="col-sm-2 control-label">ID Ruangan</label>
		                  	<div class="col-sm-10">
		                  		
		                   		<input type="text" name="id" class="form-control" id="id" required>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label for="nama" class="col-sm-2 control-label">Nama Ruangan</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="nama" class="form-control" id="nama" >
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

									<!-- end modal tambah -->


									<!-- modal hapus -->

<?php 	foreach($ruangan as $r): ?>
<div class="modal fade" id="modal_hapus1<?= $r->id_ruangan;?>"  role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 class="modal-title" id="myModalLabel">Hapus Data Ruangan</h3>
			</div>
			<form class="form-horizontal" method="post" action="<?= base_url('C_ruangan/hapus');?>">
				<div class="modal-body">
					<p>Anda yakin mau menghapus?</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_ruangan" value="<?= $r->id_ruangan;?>"> 
					<a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 	endforeach; ?>

   									<!--END MODAL HAPUS-->



   									<!-- edit modal -->
<?php foreach($ruangan as $r):  ?>
<div class="modal fade" id="modal_edit<?= $r->id_ruangan;?>" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Ruangan</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" method="post" action="<?= base_url('C_ruangan/edit'); ?>">
					<div class="form-group">
						<!-- <label class="control-label col-md-3">ID Ruangan</label> -->
						<div class="col-md-8">
							<input class="form-control"  type="hidden" name="id" value="<?= $r->id_ruangan;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Nama Ruangan</label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="nama_ruang"  value="<?= $r->nama_ruangan; ?>" required >
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
<?php endforeach; ?>
