<?php
$sesi =$this->session->userdata('login');
?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                  	Dashboard
                  </header>
                  <div class="panel-body" style="min-height:500px;">
                  <div class="bio-graph-heading">
                              Selamat Datang <?= $sesi['user']?> di Website Dinas Arsip dan Perpustakaan Kota Kediri
                          </div>
				</div>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>