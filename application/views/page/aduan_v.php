<!--======= CONTENT =========-->
  <div class="content fix-nav-space">     
    <!--======= Blog =========-->
    <section class="blog blog-pages">
      <div class="container"> 
        <div class="tittle tittle-2">
        <br>
        <h3>Kritik dan Saran</h3>
        <hr>
      </div>

        


<div class="c-content-panel">
	<div class="c-body">
		<!-- <div class="c-content-title-1 c-title-md c-margin-b-20 clearfix">
			<h3 class="c-center c-font-uppercase c-font-bold">PENGADUAN UPDATE DATA</h3>
			<div class="c-line-center c-theme-bg"></div>
		</div> -->
		<form class="form-horizontal" id="contact-form" action="<?php echo base_url()?>home/simpan_aduan" method="post">

			<div class="form-group">
				<label class="col-md-4 control-label">Nama</label>
				<div class="col-md-6">
					<div class="input-group c-square">
						<input type="text" class="form-control unform" required placeholder="Nama" name="nama" id="txtFirstName">
							
						
					</div>
					<!-- /input-group -->
				</div>
			</div>


			<div class="form-group">
				<label class="col-md-4 control-label">Keperluan</label>
				<div class="col-md-6">
					<div class="input-group c-square">
						<textarea name="keperluan" id="keperluan"  rows="5" cols="50"></textarea>						
					</div>
					<!-- /input-group -->
				</div>
			</div>


			<div class="form-group">
				<div class="col-md-12">
					<center>
					<div class="input-group c-square">					
						<button type="submit" class="btn btn-primary"> Kirim Saran</button>
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
	
	 $(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

	  $(function () {
	      $('#txtFirstName').keydown(function (e) {
	          if (e.shiftKey || e.ctrlKey || e.altKey) {
	              e.preventDefault();
	          } else {
	              var key = e.keyCode;
	              if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
	                  e.preventDefault();
	              }
	          }
	      });
	  });
	
	function angka(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
 			return false;
		return true;
		}

	function checkLength(el) {
		if (el.value.length < 11) {
		    alert("Nomor Minimal  11 Angka");
			$(el).val("");
		  }
		}

	function checkLengthnik(el) {
		if (el.value.length < 16) {
		    alert("Harus 16 Digit");
			$(el).val("");
		  }
		}

</script>