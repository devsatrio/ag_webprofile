<div class="content fix-nav-space"> 
        
    <!--======= SHORTCODES =========-->
    <div class="shortcodes">
      <div class="container">
        <div class="row"> 
          <br>
          <br>
          <!--======= ACCORDION =========-->
          <div class="col-md-12">
            <h3><?= $judul?></h3>
            <div class="panel-group" id="accordion">
              <div class="panel panel-default"> 
                <?php
                 foreach($data as $data){?>
                <?php $akor= $data->id_majemuk ?>
                <!--======= PANEL HEADING =========-->
                <div class="panel-heading">
                  <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#<?=$akor?>"> <span class="icon-accor"><i class="fa fa-gear"></i></span> <?= $data->judul?></a> </h4>
                </div>
                
                <!--======= ADD INFO HERE =========-->
                <div id="<?=$akor?>" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <p><?= $data->isi ?></p>
                  </div>
                </div>
                <?php } ?>
              </div>
              
              
            </div>
          </div>

          <br><br>
          
          <!--======= TAB SECTION =========-->
        
        </div>
        
       
      </div>
    </div>
    
  </div>



    <!-- ============================================================================= ---->


