<div class="contact-section" id="contact-section">
	<div class="auto-container">
		<div class="row clearfix">
			<div class="col-md-6 col-sm-12 col-xs-12 column pull-left">
				<div class="sec-title">
                    <h2>Periksa NIK</h2>
                    <div class="line"></div>
                </div>
                <div class="form-box">
                	<form id="contact-form">
                		<div class="row clearfix">
                			<div class="form-group col-md-12 col-sm-12 col-xs-12">
                            	<div class="field-label">NIK</div>
                            	<input type="text" name="nik" id="nik">
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12 text-right">
                                <button class="normal-btn theme-btn" type="button" id="btn_">Periksa</button>
                            </div>
                		</div>
                	</form>
                </div>
			</div>
			<div id="row">
				
			</div>
			<div id="loader"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#nik").keypress(function (e){
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				return false;
			}
		})
	})

	$("#btn_").click(function(){
		var nik = $("#nik").val();
		if(nik == '' || nik.length != 16){
			$("#row").html('');
			swal('', 'Periksa lagi nik anda!', 'error');
		}
		else{
			$("#loader").html('<div class="preloader"></div>');
			$.ajax({
			url: '<?= base_url("read/periksa") ?>',
			type: 'post',
			dataType: 'json',
			data: {nik : nik},
			success: function(response){
				if(response.c == 1){
					$("#row").html('');
					$("#row").append('<div class="col-md-6 col-sm-12 col-xs-12 column pull-left">'+
						'<div class="sec-title">'+
		                    '<h2>Hasil</h2>'+
		                    '<div class="line"></div>'+
		                '</div>'+
		                '<div class="form-box">'+
		                	'<form>'+
		                		'<div class="row clearfix">'+
		                			'<div class="form-group col-md-12 col-sm-12 col-xs-12">'+
		                            	'<div class="field-label">NIK</div>'+
		                            	'<label>'+response.nik+'</label>'+
		                            '</div>'+
		                           ' <div class="form-group col-md-12 col-sm-12 col-xs-12">'+
		                            	'<div class="field-label">Nama</div>'+
		                            	'<label>'+response.nama+'</label>'+
		                            '</div>'+
		                            '<div class="form-group col-md-12 col-sm-12 col-xs-12">'+
		                            	'<div class="field-label">Status</div>'+
		                            	'<label>'+response.status+'</label>'+
		                            '</div>'+
		                		'</div>'+
		                	'</form>'+
		               '</div>'+
					'</div>');

					$("#loader").html('');
				}else{
					$("#loader").html('<div class="preloader"></div>');
					$("#row").html('');
					$("#row").append('<div class="col-md-6 col-sm-12 col-xs-12 column pull-left">'+
					'<div class="alert alert-info" role="alert">'+
					  'NIK tidak ditemukan!'+
					'</div>'+'</div>');
					$("#loader").html('');
				}
			}
			})
		}
	})
</script>

