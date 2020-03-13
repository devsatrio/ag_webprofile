
<!-- <a href=""></a> -->
  
  <!--======= CONTENT =========-->
  <div class="content fix-nav-space"> 
    
    

    <!--======= OFFER SERVICES =========-->
  <section class="offer-services">
    <div class="container"> 
      <!--======= TITTLE =========-->
      <div class="tittle tittle-2">
        <br>
        <h3>Download Center</h3>
        <hr>
      </div>
      <div class="row">
        <?php $no =$this->uri->segment(3)+1;
                            foreach($data as $data){ ?>
        <div class="col-sm-6">
          <div role="tabpanel"> 
            <!--======= NAV TABS =========-->
            <ul class="nav nav-tabs" role="tablist">
             

                <li role="presentation" class="active">
                    <a href="#" data-toggle="tab"><?= $data->peraturan; ?></a>
                </li> 
                <center>
                <a href="<?= base_url("home/download")."/".$data->nama_file ?>" class="btn btn-danger">Download</a></center>
          
            </ul>
            <ul class="social_icons">
              <li class="facebook"></li>
            </ul>
          </div>
        </div>
        <!--======= NAV TABS CONTENT =========-->
        <!-- div class="col-sm-2">
          <div class="tab-content"> 
            <div role="tabpanel" class="tab-pane animated fadeIn active">
                <a href="<?= base_url("home/download")."/".$data->nama_file ?>" class="btn">Download</a>  
            </div>
          </div>
        </div> -->
        <?php } ?>
        </div>
    </div>
  </section>    
    
  </div>













