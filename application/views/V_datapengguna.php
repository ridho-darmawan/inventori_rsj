
 <div class="box">
    <div class="box-header">
       	<div class="row">
			<div class="col-md-12">
				<h2 style="text-align: right;">DATA PENGGUNA</h2><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 ">
				<a href="V_beranda"  data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sl pull-right "><i class="glyphicon glyphicon-plus"></i></a>		
			</div>
		</div>	      
    </div>

    <div id="notifications">			<!-- notifikasi berhasil or tidak -->
		<?php echo $this->session->flashdata('msg'); ?>
	</div> 
	<br>

	<!-- table tambah data -->
 
    <div class="box-body">
    	<table id="example1" class="table table-bordered table-striped">
        	<thead>
		        <tr>
		          <th>No</th>
		          <th>Username</th>
		          <th>Password</th>
		          <th>Ruangan</th>
		          <th>Hak Akses</th>
		          <th style="text-align:center;">aksi</th>
		        </tr>
        	</thead>
	        <tbody>

	        	<?php $no=1; foreach($users as $u): ?>		<!-- looping data -->
	        
	    
		        <tr>

		          <td><?= $no++; ?></td>
		          <td><?= $u->username; ?></td>
		          <td><?= md5($u->password); ?></td>
		          <td><?= $u->ruangan;  ?></td>
		          <td><?= $u->hak_akses; ?></td>
		          <td align="center">
		          		<a class="btn btn-primary" data-toggle="modal" data-target="#modal_infoo<?= $u->nip; ?>"><i class="fa fa-lg fa-info"></i> </a>
						<a class="btn btn-success" data-toggle="modal" data-target="#modal_edit<?= $u->nip; ?>"><i class="fa fa-lg fa-edit"></i> </a>
						<a class="btn btn-danger" data-toggle="modal" data-target="#modal_hapuss<?= $u->nip;?>"><i class="fa fa-lg fa-trash"></i> </a>
		          </td>
		        </tr>
		     <?php endforeach; ?>
		     
	        </tbody>
       
   		</table>
    </div>
</div>
		


<!-- modal tambah -->

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">TAMBAH DATA PENGGUNA</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal"  enctype="multipart/form-data" method="post" action="<?= base_url('C_datapengguna/tambah'); ?>">

					<div class="box-body">
						<div class="form-group">
		                  	<label for="nama" class="col-sm-2 control-label">Nama</label>
		                  	<div class="col-sm-10">
		                  		<input type="hidden" name="id">
		                   		<input type="text" name="nama" class="form-control" id="nama" required>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label for="NIP" class="col-sm-2 control-label">NIP</label>
		                  	<div class="col-sm-10">
		                  		<!-- <input type="hidden" name="id"> -->
		                   		<input type="text" name="nip" class="form-control" id="NIP" required>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label for="no seri barang" class="col-sm-2 control-label">Username</label>
		                  	<div class="col-sm-10">
		                  		<input type="hidden" name="id">
		                   		<input type="text" name="username" class="form-control" id="username" required>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label for="nama barang" class="col-sm-2 control-label">Password</label>
		                  	<div class="col-sm-10">
		                    	<input type="text" name="password" class="form-control" id="password" required>
		                  	</div>
		                </div>

		                <div class="form-group">
		                  	<label for="jenis barang" class="col-sm-2 control-label">Hak Akses</label>
		                  	<div class="col-sm-10">
		                  		<select name="hak_akses" class="form-control">
		                  			<option value="">---Pilih---</option>
									<option value="1">Admin</option>
									<option value="2">Pemohon</option>
								</select>
		                    </div>
		                </div>

		                <div class="form-group">
		                  	<label class="col-sm-2 control-label">Ruangan</label>
		                  	<div class="col-sm-10">
		                  		
		                  		<select name="ruangan" class="form-control">
		                  		<?php foreach($ruangan as $r): ?>	
		                  			<option value="<?= $r->nama_ruangan;?>"><?= $r->nama_ruangan; ?></option>
		                  		<?php endforeach; ?>	  
								</select>
								
		                    </div>
		                </div>

		                <div class="form-group">
							<label class="col-sm-2 control-label" >Foto </label>
							<div class="col-sm-10">
								<input type="file" name="image" class="form-control" required >
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


<!-- mode info -->
			<?php foreach($users as $u) :?>
				<div class="modal fade" id="modal_infoo<?= $u->nip;?>" role="dialog">
					<div class="modal-dialog">
					 <div class="modal-body">
						<form class="form-horizontal"  enctype="multipart/form-data" method="post" action="">
						<div class="col-md-10">
						<div class="box box-primary">
				            <div class="box-body box-profile">
				               <img src="<?= base_url($u->image); ?>" class="profile-user-img img-responsive img-circle" alt="User profile picture">
				               
				             	 

							              <div class="col-sm-12" text align="center">
											<ul class="list-group list-group-unbordered">
								                <li class="list-group-item">
								                  <b>Nama Lengkap : <?= $u->nama; ?></b> 
								                </li>
								                <li class="list-group-item">
								                  <b>Nip : <?=$u->nip;?></b> 
								                </li>
								                <li class="list-group-item">
								                  <b>Username : <?= $u->username; ?></b> 
								                </li>
								                <li class="list-group-item">
								                  <b>Ruangan : <?=$u->ruangan;?> </b>
								                <li class="list-group-item">
								                  <b>Hak Akses : <?=$u->hak_akses;?></b> 
								                </li>
								             </ul>
							            <!-- /.box-body -->
									     	 </div>

				    					<div class="modal-footer">
											<a class="btn btn-primary icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
										</div>

									 </div>
								  </div>						                	
								</div>		<!-- end box body -->
							</form>
						</div>
					</div>
				</div>
				<?php endforeach; ?>  <!-- end model info -->


<!-- edit modal -->
<?php foreach($users as $u):  ?>
<div class="modal fade" id="modal_edit<?= $u->nip;?>" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Data Pengguna</h4>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" method="post" action="<?= base_url('C_datapengguna/edit'); ?>">
					<div class="form-group">
						<label class="control-label col-md-3">NIP</label>
						<div class="col-md-8">
							<input class="form-control" name="nip" type="text"  value="<?= $u->nip?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Nama Lengkap</label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="nama"  value="<?= $u->nama?>" required >
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Username</label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="username" value="<?= $u->username; ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Password</label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="password" value="<?= $u->password; ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Hak Akses</label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="hak_akses" value="<?= $u->hak_akses; ?>" required>
						</div>
					</div>

					<div class="form-group">
		                  	<label class="col-md-3 control-label">Ruangan</label>
		                  	<div class="col-sm-8">
		                  		
		                  		<select name="ruangan" class="form-control">
		                  			<option value="<?= $u->ruangan; ?>"><?= $u->ruangan; ?></option>
		                  		<?php foreach($ruangan as $r): ?>	
		                  			<option value="<?= $r->nama_ruangan;?>"><?= $r->nama_ruangan; ?></option>
		                  		<?php endforeach; ?>	  
								</select>
								
		                    </div>
		                </div>

					<!-- <div class="form-group">
		                  	<label class="control-label col-md-3">Ruangan</label>
		                  	<div class="col-sm-8">
		                  		
		                  		<select name="ruangan" class="form-control">
		                  		<?php foreach($ruangan as $r): ?>	
		                  			<option value="<?= $r->ruangan;?>"><?= $r->ruangan; ?></option>
		                  		<?php endforeach; ?>	  
								</select>
								
		                    </div>
		                </div> -->

					<!-- <div class="form-group">
						<label class="control-label col-md-3">Ruangan</label>
						<div class="col-md-8">
							<input class="form-control" type="text" name="ruangan" value="<?= $u->ruangan; ?>" required>
						</div>
					</div> -->
					
					<div class="form-group">
						<label class="control-label col-md-3">Foto</label>
						<div class="col-md-8">
							<input class="form-control" type="file" name="image" value="<?= $u->image; ?>">
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

<!-- end modal edit -->


<!-- modal hapus -->

<?php 	foreach($users as $u): ?>
<div class="modal fade" id="modal_hapuss<?= $u->nip;?>"  role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 class="modal-title" id="myModalLabel">Hapus Data Barang</h3>
			</div>
			<form class="form-horizontal" method="post" action="<?= base_url('C_datapengguna/hapus');?>">
				<div class="modal-body">
					<p>Anda yakin mau menghapus?</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="nip" value="<?= $u->nip;?>">
					<a class="btn btn-default icon-btn" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 	endforeach; ?>


<!-- end modal hapus -->