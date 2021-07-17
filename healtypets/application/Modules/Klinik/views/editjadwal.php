<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-info text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> Home
        </h3>

    </div>    
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
	<form action= "<?= base_url('Klinik/proeditjadwal')?>" method="post" enctype="multipart/form-data">
                    	 <input  type="hidden" name="id_fasilitas" value="<?=$jadwal['id_fasilitas']?>"/>
                                        <div class="form-group">
                                            <label>Nama Fasilitas </label>
                                            <input class="form-control"name="nama_fasilitas" value="<?php echo $jadwal['nama_fasilitas']?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Jadwal</label>
                                            <input class="form-control"name="jadwal" value="<?php echo $jadwal['jadwal']?>" >
                                        </div>
										<div class="form-group">
                                            <label>Penanggung Jawab</label>
                                            <input class="form-control"name="penaggung_jawab" value="<?php echo $jadwal['penaggung_jawab']?>" >
                                        </div>
										<div class="form-group">
                                            <label>Harga</label>
                                            <input class="form-control"name="harga" value="<?php echo $jadwal['harga']?>">
                                        </div>	
																			
										<button type="submit" name="simpan"class="btn btn-warning">simpan</button>	
</form>										
	</div>
</div>