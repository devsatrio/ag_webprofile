<script type="text/javascript" src="<?= base_url()."tpl_admin/js/jquery.validate.min.js";?>"></script>
<script type="text/javascript">
var Script = function () {

    $.validator.setDefaults({
        submitHandler: function(){
			$('.loading').html("Sedang Di Proses");
			$.post('<?= base_url("admin/gantiPass/do_ganti")?>',$('form').serialize())
			.done(function(){
				$('.loading').fadeOut(1000,function(){
					window.location='<?= base_url("login/logout")?>';
				});
			});
		}
    });

    $().ready(function() {
        // validate signup form on keyup and submit
        $("#form").validate({
            rules: {
                username: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                }
            },
            messages: {
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                }
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if(firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });


}();
</script>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                  	Ganti Password
                  </header>
                  <div class="panel-body" style="min-height:500px;">
                  <form class="form-horizontal" role="form" method="post" id="form">
                                  <div class="form-group">
                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Username</label>
                                      <div class="col-lg-3">
                                          <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $profil->user?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Password</label>
                                      <div class="col-lg-3">
                                          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Konfirmasi Password</label>
                                      <div class="col-lg-3">
                                          <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <button type="submit" class="btn btn-danger">Ganti</button><div class="loading"></div>
                                      </div>
                                  </div>
                              </form>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>