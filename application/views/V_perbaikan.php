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
  <link rel="stylesheet" href="<?= base_url('asset/css/daterangepicker.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/bootstrap-datepicker.min.css') ?>">
 <link rel="stylesheet" href="<?= base_url('asset/css/all.css') ?>">
 <link rel="stylesheet" href="<?= base_url('asset/css/bootstrap-colorpicker.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/bootstrap-timepicker.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/select2.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/AdminLTE.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('asset/css/_all-skins.min.css') ?>">

  
 <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<form>
	    <div class="box box-success">
            <div class="box-header with-border"><br>
              
              <h3 class="box-title" >FORM PERBAIKAN/PEMELIHARAAN SARANA DAN PRASARANA RUMAH SAKIT</h3>
            </div>
            <div class="box-body">
              <input class="form-control input-lg" type="text" placeholder="Ruangan">
              <br>
              <input class="form-control input-lg" type="text" placeholder="Uraian Perbaikan">
              <br>
              <input class="form-control input-lg" type="number" placeholder="Jumlah">

              <br>
              <input class="form-control input-lg" type="text" placeholder="Satuan">
              <br>
              <input class="form-control input-lg" type="text" placeholder="keterangan">
              <br><br>

             <div class="box box-default">
              <div class="box-header with-border">
                    <h3 class="box-title">Permohonan</h3>
              </div>
                  <!-- /.box-header -->
               <div class="box-body">
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label>Diterima oleh petugas IPSP RS</label>
                <br>       

                     <div class="form-group">
                        <label>Tanggal:</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="date" class="form-control pull-right" id="datepicker">
                        </div>
                         <label>Jam:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                          <input type="time" class="form-control pull-right" id="reservationtime">
                        </div>
                      </div>
                 </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                           <input class="form-control input-lg" type="text" placeholder="Nama">
                            <input class="form-control input-lg" type="int" placeholder="NIP">
                        </div>
                        <!-- /.form-group -->
                   </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Permintaan/Laporan</label>
                        <div class="form-group">
                        <label>Tanggal:</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="date" class="form-control pull-right" id="datepicker">
                        </div>
                         <label>Jam:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                          </div>
                          <input type="time" class="form-control pull-right" id="reservationtime">
                        </div>
                      </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                         <input class="form-control input-lg" type="text" placeholder="Nama">
                            <input class="form-control input-lg" type="int" placeholder="NIP">
                        </div>
                        <!-- /.form-group -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.box-body -->
                
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
        </div>
      </div>

</form>

<script src="<?= base_url('asset/js/jquery.min.js');?>"></script>
<script src="<?= base_url('asset/js/bootstrap.min.js');?>"></script>
<script src="<?= base_url('asset/js/jquery.inputmask.js');?>"></script>
<script src="<?= base_url('asset/js/jquery.inputmask.date.extensions.js');?>"></script>
<script src="<?= base_url('asset/js/jquery.inputmask.extensions.js');?>"></script>
<script src="<?= base_url('asset/js/moment.min.js');?>"></script>
<script src="<?= base_url('asset/js/daterangepicker.js');?>"></script>
<script src="<?= base_url('asset/js/bootstrap-datepicker.min.js');?>"></script>
<script src="<?= base_url('asset/js/bootstrap-colorpicker.min.js');?>"></script>
<script src="<?= base_url('asset/js/bootstrap-timepicker.min.js');?>"></script>
<script src="<?= base_url('asset/js/jquery.slimscroll.min.js');?>"></script>
<script src="<?= base_url('asset/js/icheck.min.js');?>"></script>
<script src="<?= base_url('asset/js/fastclick.js');?>"></script>
<script src="<?= base_url('asset/js/adminlte.min.js');?>"></script>
<script src="<?= base_url('asset/js/demo.js');?>"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>