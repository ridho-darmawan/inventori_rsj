<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inventori RSJ</title>
 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url('asset/css/bootstrap.min.css') ?>" >
  <link rel="stylesheet" href="<?= base_url('asset/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/ionicons.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/AdminLTE.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/_all-skins.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/dataTables.bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/daterangepicker.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/bootstrap-timepicker.min.css') ?>">
   
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

      <header class="main-header">
        <a href="index2.html" class="logo">
             <span class="logo-mini"><b>R</b>SJ</span>
             <span class="logo-lg"><b>RSJ</b> Tampan</span>
        </a>
      
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
              <span class="sr-only">Toggle navigation</span>
            </a>


          <?php if($this->session->userdata('akses')=='1'): ?>
            
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown notifications-menu"><!--  li notofikation -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <i class="fa fa-bell-o"></i>
               <?php if ( $info > '0'): ?>
                 <span class="label label-warning"><?= $info; ?></span>
               <?php  else: ?>
               <?php endif ?>
               
               </a>
                <ul class="dropdown-menu">
                  <li class="header"><?= $info ?> Laporan Kerusakan barang  </li>
                  <li>
                    <ul class="Menu">
                      <?php   foreach($permohonan as $p): ?>
                      <li>
                        <a href="<?= base_url('C_laporankerusakan/index') ?>"><i class="fa fa-users text-aqua"></i> <?= $p->nama;?> (<?= $p->ruangan; ?>)</a>
                      </li>
                    <?php   endforeach; ?>
                    </ul>
                  </li>
                </ul>

             </li> <!-- end li notofication -->


              <li class="dropdown user user-menu"> 
              <a onclick="window.location='<?= base_url('C_login/keluar'); ?>'" class="btn">Log Out</a>           
               
               
              </li>
              <!-- Control Sidebar Toggle Button -->
              
            </ul>
          </div>
           
          <?php   elseif($this->session->userdata('akses')=='2') :?> 
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu"> 
                  <a onclick="window.location='<?= base_url('C_login/keluar'); ?>'" class="btn">Log Out</a>                         
              </li>
             
            </ul>
          </div>

          <?php   else: ?>
          <?php   endif; ?>
           
        </nav>
     
      </header>

    
    <aside class="main-sidebar">
      <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">

          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?= base_url($this->session->userdata('ses_foto')); ?>" class="img-circle" alt="User Image">
            </div> <br>
           
            <div class="pull-left info">
              <p><?= $this->session->userdata('ses_nama'); ?></p>
            </div>
          </div>   <br>
       
          <?php if ($this->session->userdata('akses')=='1'): ?>

          <li>
            <a href="<?= base_url('C_utama/index') ?>">
              <i class="fa fa-home"></i> <span>BERANDA</span>
            </a>
           </li>
      
          <li >
            <a href="<?= base_url('C_datapengguna/index'); ?>">
              <i class="fa fa-user"></i>
              <span>DATA PENGGUNA</span>
            </a>        
          </li>

          <li >
            <a href="<?= base_url('C_ruangan/index'); ?>">
              <i class="fa fa-user"></i>
              <span>RUANGAN</span>
            </a>        
          </li>

          <li >
            <a href="<?= base_url('C_databarang/index'); ?>">
              <i class="fa fa-folder-open-o"></i>
              <span>DATA BARANG</span>
            </a>        
          </li>
          
          <li>
             <a href="<?= base_url('C_laporankerusakan/index') ?>">
              <i class="fa fa-file"></i>
              <span>LAPORAN KERUSAKAN</span>
            </a> 
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-database"></i> <span>REKAP</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= base_url('C_rekap/barang'); ?>"><i class="fa fa-circle-o"></i>REKAP DATA BARANG</a></li>
              <li><a href="<?= base_url('C_rekap/kerusakan'); ?>"><i class="fa fa-circle-o"></i>REKAP KERUSAKAN</a></li>
            </ul>
          </li>

          <?php elseif ($this->session->userdata('akses')=='2'): ?>

            <li>
              <a href="<?= base_url('C_utama/index') ?>">
                <i class="fa fa-home"></i> <span>BERANDA</span>
              </a>
            </li>

            <li >
              <a href="<?= base_url('C_permohonan/index') ?>">
                <i class="fa fa-folder-open-o"></i>
                <span>PERMOHONAN</span>
              </a>        
            </li>

          <?php else: ?>
          <?php endif; ?>

        </ul>
      </section>
    </aside>

   
    <div class="content-wrapper" role="mian">
      <section class="content">
        <div class="row">     
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_content">
               <?php $this->load->view($main_view); ?>
              </div>
            </div>
              
          </div>
    
        </div>
      </section>
    </div>

    <footer class="main-footer">
          <strong>Rumah Sakit Jiwa Tampan 
    </footer>
    <div class="control-sidebar-bg"></div>
  </div>

<script src="<?= base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?= base_url('asset/js/bootstrap.min.js');?>"></script>
<script src="<?= base_url('asset/js/fastclick.js');?>"></script>
<script src="<?= base_url('asset/js/nprogress.js');?>"></script>
<script src="<?= base_url('asset/js/icheck.min.js');?>"></script>
<script src="<?= base_url('asset/js/custom.min.js');?>"></script>
<script src="<?= base_url('asset/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('asset/js/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('asset/js/jquery.smartWizard.js');?>"></script>
<script src="<?= base_url('asset/js/bootstrap-datepicker.min.js');?>"></script>


<script src="<?= base_url('asset/js/adminlte.min.js');?>"></script>
<script>
  $(function () {
    $('#example1').DataTable()
   
  })

   $('#datepicker').datepicker({
      autoclose: true
    })
   
   $('#datepicker1').datepicker({
      autoclose: true
    })

    $('#notifications').slideDown('slow').delay(2000).slideUp('slow');

</script>

</body>
</html>
