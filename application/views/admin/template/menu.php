      <aside>
          <div id="sidebar" class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <?php
                  $sesi =$this->session->userdata('login');
                  // print_r($sesi);
                  if ($sesi['type'] == "perpus") { ?>
                  <li>
                      <a href="<?= base_url('admin/index')?>">
                          <i class="icon-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?= base_url("admin/member")?>"><i class="icon-pencil"></i><span>MEMBER</span></a>
                  </li>

                  <?php } else { ?>

                  <li>
                      <a href="<?= base_url('admin/index')?>">
                          <i class="icon-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="icon-windows"></i>
                          <span>MENU</span>
                      </a>
                      <ul class="sub">
                          <li><a href="<?= base_url("admin/menu")?>">MENU</a></li>
                          <li><a href="<?= base_url("admin/submenu")?>">SUBMENU</a></li>
                      </ul>
                  </li>

                  <li>
                      <a href="<?= base_url("admin/halaman")?>"><i class="icon-desktop"></i><span>HALAMAN</span></a>
                  </li>

                  <li>
                      <a href="<?= base_url("admin/download")?>"><i class="icon-download-alt"></i><span>DOWNLOAD
                              MANAJEMEN</span></a>
                  </li>

                  <li>
                      <a href="<?= base_url("admin/galeri")?>"><i class="icon-camera"></i><span>GALERI</span></a>
                  </li>

                  <li>
                      <a href="<?= base_url("admin/post")?>"><i class="icon-pencil"></i><span>POST</span></a>
                  </li>

                  <li>
                      <a href="<?= base_url("admin/slider")?>"><i class="icon-picture"></i><span>SLIDER</span></a>
                  </li>
                  <li>
                      <a href="<?= base_url("admin/link")?>"><i class="icon-link"></i><span>LINK</span></a>
                  </li>
                  <li>
                      <a href="<?= base_url("admin/member")?>"><i class="icon-group"></i><span>MEMBER</span></a>
                  </li>
                  <li>
                      <a href="<?= base_url("admin/list_aduan")?>"><i class="icon-archive"></i><span>KOTAK
                              SARAN</span></a>
                  </li>
                  <li>
                      <a href="<?= base_url("admin/user")?>"><i class="icon-user"></i><span>USER MANAJEMEN</span></a>
                  </li>
                  <?php } ?>
                  <!--multi level menu end-->

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->