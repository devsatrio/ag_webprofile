<!--======= CONTENT =========-->
  <div class="content fix-nav-space">     
    <!--======= Blog =========-->
    <section class="blog blog-pages">
      <div class="container"> 
        <div class="tittle tittle-2">
        <br>
        <h3>Cari Data Arsip</h3>
        <hr>
      </div>

<div class="c-content-panel">
	<div class="c-body">
		<!-- <div class="c-content-title-1 c-title-md c-margin-b-20 clearfix">
			<h3 class="c-center c-font-uppercase c-font-bold">PENGADUAN UPDATE DATA</h3>
			<div class="c-line-center c-theme-bg"></div>
		</div> -->
		<form class="form-horizontal" id="cek-form" action="" method="post">

			<div class="form-group">
				<div class="col-md-12">
					<center>
					<div class="input-group c-square">					
						<input type="text" class="form-control unform" required placeholder="Masukkan Nama" name="nama" id="nama_pemilik">
					</div></center>
					<!-- /input-group -->
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<center>
					<div class="input-group c-square">					
						<button type="button" onclick="cari()" class="btn btn-primary"> Kirim Saran</button>
					</div></center>
					<!-- /input-group -->
				</div>
			</div>							
	
		</form>


			


	</div>
</div>

        </div>
    </section>
</div>


<script>
	function cari() {
		var nama_pemilik = $("#nama_pemilik").val();

		if (nama_pemilik != '') {
			$.ajax({
			url: "<?= base_url('home/cek_') ?>/"+nama_pemilik,
            dataType:"json",

			success:function(data){
			if(data.status == '1'){
				// popup_tutup();
				alert("Data Tersedia");
	        }else{
				alert("Data Tidak ada !!!!!");
				// $('#number').val("");
				// popup_tutup();
	        }
			}
	       });
		} else {
			alert('Silahkan Isi Nama Terlebih Dahulu !!!!')
		}
	}

</script>        
