<?php   if($this->session->userdata('akses')=='1'): ?>  

    <div class="row">

        <div align="center" class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text center">Jumlah Member</span>
                    <span class="info-box-number"><?= $jumlah_user; ?></span>
                </div>
                
            </div>
        </div>

        <div align="center" class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa  fa-floppy-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Data Ruangan</span>
                    <span class="info-box-number"><?= $jml_ruangan; ?></span>
                </div>      
            </div>
        </div>

        <div align="center" class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa  fa-tags"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Data Barang</span>
                    <span class="info-box-number"><?= $jml_barang; ?></span>
                </div>
            </div>
        </div>

    </div>

<?php endif; ?>


<div class="box">
    <div class="box-header">
        <div class="container">

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <img src="<?=base_url('asset/rsj-logo.png') ?>" class="img-responsive"alt="Responsive image">
                </div>
            </div>

            <div class="row">
                <div class="animated flipInY">
                    <div class="tile-stats">
                        <div class="col-md-12">
                            <div class="col-md-5 col-md-offset-1 text-center">
                                <div class="icon">
                                    <h3><i class="glyphicon glyphicon-tags"></i><b> VISI</b></h3>
                                </div>
                                
                                <p style="font-size: 14px; "><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse repellat doloribus porro ipsam omnis ad quasi, consequatur, expedita quis facilis exercitationem tempora adipisci eveniet quae, debitis facere iusto excepturi rem reiciendis possimus. Natus eligendi culpa suscipit, nesciunt neque ad quaerat!</p>
                            </div>
                            <div class="col-md-5 text-center">
                                <div class="icon">
                                    <h3><i class="glyphicon glyphicon-tags"></i><b> MISI</b></h3>
                                </div>

                                <p style="font-size: 14px; "><br>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit aspernatur, quis doloremque eius totam quas sint atque neque deserunt libero ipsam, in eos facilis adipisci eaque numquam! Nihil eligendi, minus esse enim perspiciatis laborum exercitationem labore eos sit earum ea!</p>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>	      
    </div>
</div>

	  
	  
            
