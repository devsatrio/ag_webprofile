<link rel="stylesheet" type="text/css" href="<?= base_url("tpl_admin")?>/assets/bootstrap-datepicker/css/datepicker.css" />
<script src="<?= base_url("tpl_admin")?>/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="<?= base_url("tpl_admin")?>/tinymce/tinymce.dev.js"></script>
<script>
	tinymce.init({
		selector: "textarea",
		theme: "modern",
		plugins: [
			"advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
			"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			"save table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
		],
		external_plugins: {
			//"moxiemanager": "/moxiemanager-php/plugin.js"
		},
		content_css: "css/development.css",
		add_unload_trigger: false,
		autosave_ask_before_unload: false,

		toolbar1: "save newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
		toolbar2: "cut copy paste pastetext | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media help code | inserttime preview | forecolor backcolor",
		toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft | insertfile insertimage",
		menubar: false,
		toolbar_items_size: 'small',

		style_formats: [
			{title: 'Bold text', inline: 'b'},
			{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
			{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
			{title: 'Example 1', inline: 'span', classes: 'example1'},
			{title: 'Example 2', inline: 'span', classes: 'example2'},
			{title: 'Table styles'},
			{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		],

		templates: [
			{title: 'My template 1', description: 'Some fancy template 1', content: 'My html'},
			{title: 'My template 2', description: 'Some fancy template 2', url: 'development.html'}
		]
	});
</script>
<script type="text/javascript" src="<?= base_url("tpl_admin")?>/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url("tpl_admin")?>/js/advanced-form-components.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('select[name=kategori]').change(function(){
		var kat=$(this).val();
		if(kat==3){
			$('.tempat').show();
		}else{
			$('.tempat').hide();			
		}
	});
	$('.tambah').click(function(){
		var file	="<div class='row'><div class=' col-lg-4'><label>File</label><input type='file' class='form-control' name='userfile[]' /></div></div>";
		$('#file').append(file);
	});
});
</script>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                  	Tambah Post
                  </header>
                  <div class="panel-body" style="min-height:500px;">
                  	<form method="post" action="<?= base_url("admin/download/do_tambah")?>" enctype="multipart/form-data">
                    <div class="row">
                    	<div class=" col-lg-4">
                        <label>Nama</label>
                    	<input type="text" class="form-control" name="judul" />
                        </div>
                    </div>
                    <div id="file"><br />
                    <button class="tambah btn btn-xs btn-primary" type="button" ><i class="icon-plus"></i> Tambah</button>
                    <div class="row">
                        <div class=" col-lg-4">
                        <label>File</label>
                    	<input type="file" class="form-control" name="userfile[]" />
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    	<label>Isi</label>
                    	<textarea class="form-control ckeditor" name="isi" rows="15"></textarea>
					</div>
                    <div class="form-group">
                   		<button type="submit" class="btn btn-success"> Edit</button> <a href="<?= base_url("admin/post")?>" class="btn btn-warning">Batal</a>
                    </div>
                    </form>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>