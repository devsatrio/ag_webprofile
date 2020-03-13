<div class="content fix-nav-space"> 
        
    <!--======= DETAIL PAGE =========-->
    <div class="dep-detail-page blog single-post">
      <div class="container">
        <div class="row">
          <div class="col-sm-9"> 
            
            <!--======= Images =========-->
            <div class="img-single"> <img class="img-responsive" src="images/blog-img-large-6.jpg" alt="" ></div>
            
            <!--======= Deneral Information =========-->
            <div class="detail-sec">
              <h4><?= $data->nama_halaman?></h4>
              <span class="dat-sec">post by <strong>Admin</strong> on <strong><?= date_format(date_create($data->tanggal), 'd-m-Y') ?></strong> </span>
              <p><?= $data->isi?></p>
              
            </div>            
          </div>
          <br><br>
          <!--======= SIDE BAR =========-->
          <!-- <div class="col-sm-3">
            <div class="side-bar"> 
                                        
              <h5 class="margin-t-40">categories</h5>
              <ul>
                <li><a href="#.">- All </a></li> <br />
                <li><a href="#."> Health </a></li>
              </ul>              
            </div>
          </div> -->
          <!-- Side bar end --> 
        </div>
      </div>
    </div>
    
  </div>