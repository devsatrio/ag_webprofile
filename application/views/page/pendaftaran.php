<!--======= CONTENT =========-->
  <div class="content fix-nav-space"> 
    <br /><br /><br /><br /><br />
    <!--======= CONATCT =========-->
    <div class="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-8"> 
            <h4>Pendaftaran Member Perpustakaan Umum</h4>
            
            <!--======= CONTACT FORM =========-->
            <div class="col-md-12">
            <section class="tabs-style-cods">
              <div class="box-body">
                
              <form method="post" action="<?php echo  base_url("home/tambah_member")?>" enctype="multipart/form-data">
              
              <!-- </form> -->

                  <table>
                    <tr>
                        <td class="pull-right">
                            NIK/NIM/NIS
                        </td>
                        <td >
                            <div class="form-group">                              
                              <input type="text" id="" class="form-control" name="nik" placeholder="NIK/NIM/NIS">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="pull-right">
                            Nama Lengkap
                        </td>
                        <td >
                            <div class="form-group">
                                      <input type="text" id="" class="form-control" name="nama" maxlength="255" placeholder="Nama Lengkap">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="pull-right">
                            Tempat/Tanggal Lahir <span class="require">*</span>
                        </td>
                        <td >
                            <div class="form-group">
                                <div class="col-sm-6">
                                <input type="text" id="" class="form-control" name="tempat_lhr" placeholder="Masukkan Tempat Lahir">                    
                                </div>
                            
                            <div class="form-group">
                                <input type="text" id="" class="form-control" name="tgl_lhr" style="width:170px" placeholder="Masukkan Tgl Lahir">
                            </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="pull-right">
                            Jenis Kelamin <span class="require">*</span>
                        </td>
                        <td >
                            <div class="form-group">
                                <div class="col-sm-12" style="padding:0;">
                                    <div class="form-group">

                                      <select id="" class="form-control" name="jenkel" >
                                      <option value="">Pilih Jenis Kelamin</option>
                                      <option value="1">Laki-laki</option>
                                      <option value="2">Perempuan</option>
                                      </select>
                                    </div>                                
                                </div>
                            </div>
                        </td>
                    </tr> 
                    <tr>
                        <td class="pull-right">
                            Alamat tinggal sesuai identitas <span class="require">*</span>
                        </td>
                        <td >
                            <div class="form-group">
                              <div class="col-sm-12" style="padding:0;">
                                <div class="form-group">
                                  <textarea id="" class="form-control" name="alamat" maxlength="255" placeholder="Masukkan Alamat tinggal sesuai identitas"></textarea>
                                </div>

                                <div class="col-sm-6" style="padding:0;">
                                    <div class="form-group">
                                      <input type="text" id="" class="form-control" name="propinsi" maxlength="255" placeholder="Masukan propinsi sesuai identitas">
                                    </div>
                                    <div class="form-group">
                                      <input type="text" id="" class="form-control" name="kecamatan" maxlength="255" placeholder="Kecamatan">
                                    </div>
                                    <div class="form-group">
                                      <input type="text" id="" class="form-control" name="rt" maxlength="255" placeholder="RT">
                                    </div>
                                </div>
                                                                                  
                                <div class="col-sm-6" style="padding:0;">
                                  <div class="form-group">
                                      <input type="text" id="" class="form-control" name="kota" maxlength="255" placeholder="Kabupaten/Kota">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" id="" class="form-control" name="kelurahan" maxlength="255" placeholder="Kelurahan">
                                  </div>
                                  <div class="form-group">
                                      <input type="text" id="" class="form-control" name="rw" maxlength="255" placeholder="RW">
                                  </div>
                                </div>          

                                </div>

                            </div>
                        </td>

                    </tr>
                                
                      <!-- Duplicate Alamat -->
                      <tr>
                          <td class="pull-right">

                          </td>
                          <td>
                              <div class="checkbox">
                                  <label><input type="checkbox" id="duplicateAddrs" name="duplicateAddrs" value="1"> Alamat tinggal sama dengan alamat Identitas</label>
                              </div>

                          </td>
                      </tr>                                             
                <tr>
                    <td class="pull-right">
                        Nomor HP
                    </td>
                    <td >
                        <div class="form-group">
                            <div class="col-sm-12" style="padding:0;">
                                <div class="form-group">
                              <input type="text" id="" class="form-control" name="hp" maxlength="255" placeholder="No Hp">
                              </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="pull-right">
                        Agama
                    </td>
                    <td >
                      <div class="form-group">
                          <div class="col-sm-12" style="padding:0;">
                            <div class="form-group">
                              <input type="text" id="" class="form-control" name="agama" maxlength="255" placeholder="Agama">
                            </div>
                          </div>
                      </div>
                    </td>
                </tr>

                <tr>
                    <td class="pull-right">
                        Pekerjaan
                    </td>
                    <td >
                      <div class="form-group">
                          <div class="col-sm-12" style="padding:0;">
                            <div class="form-group">
                              <input type="text" id="" class="form-control" name="pekerjaan" maxlength="255" placeholder="Pekerjaan">
                            </div>
                          </div>
                      </div>
                    </td>
                </tr>
                                
                    
                <tr>
                    <td class="pull-right">
                        Nama Institusi
                    </td>
                    <td >
                        <div class="form-group kv-fieldset-inline">
                            <div class="col-sm-12" style="padding:0;">
                              <div class="form-group">
                              <input type="text" id="" class="form-control" name="namainstitusi" maxlength="255" placeholder="Nama Institusi">
                              </div>
                            </div>
                        </div>
                    </td>
                </tr>
                                                    
                <tr>
                    <td class="pull-right">
                        Alamat Institusi
                    </td>
                    <td >
                        <div class="form-group kv-fieldset-inline">
                            <div class="col-sm-12" style="padding:0;">
                              <div class="form-group">
                              <textarea id="" class="form-control" name="alamatinstitusi" maxlength="255" placeholder="Alamat Institusi"></textarea>
                              </div>
                            </div>
                        </div>
                    </td>
                </tr>
                                                
                    
                <tr>
                    <td class="pull-right">
                        Prodi / Semester (Mahasiswa)
                    </td>
                    <td >
                        <div class="form-group kv-fieldset-inline">
                            <div class="col-sm-12" style="padding:0;">
                              <div class="form-group">
                                <input type="text" id="" class="form-control" name="prodi" maxlength="20" placeholder="Prodi / Semester">
                              </div>
                            </div>
                        </div>
                        </td>

                </tr>

                <tr>
                    <td class="pull-right">
                        Kelas (Siswa)
                    </td>
                    <td >
                        <div class="form-group kv-fieldset-inline">
                            <div class="col-sm-12" style="padding:0;">
                              <div class="form-group">
                                <input type="text" id="" class="form-control" name="kelas" maxlength="20" placeholder="Kelas">
                              </div>
                            </div>
                        </div>
                        </td>

                </tr>

                <tr>
                    <td class="pull-right">
                        Email
                    </td>
                    <td >
                        <div class="form-group kv-fieldset-inline">
                            <div class="col-sm-12" style="padding:0;">
                              <div class="form-group">
                                <input type="text" id="" class="form-control" name="email" maxlength="20" placeholder="Alamat Email">
                              </div>
                            </div>
                        </div>
                        </td>

                </tr>
                <tr>
                    <td class="pull-right">
                        Ibu Kandung
                    </td>
                    <td >
                        <div class="form-group kv-fieldset-inline">
                            <div class="col-sm-12" style="padding:0;">
                              <div class="form-group">
                                <input type="text" id="" class="form-control" name="ibukandung" maxlength="20" placeholder="Ibu Kandung">
                              </div>
                            </div>
                        </div>
                        </td>
                </tr>
                <!-- Duplicate Alamat -->
                      <tr>
                          <td class="pull-right">
                            <div class="col-sm-12">
                            </div>
                          </td>
                          <td>
                              <label>Pihak Yang Bisa Dihubungi Keluarga / Saudara :</label>
                          </td>
                      </tr>
                <tr>
                    <td class="pull-right">
                        Nama
                    </td>
                    <td >
                        <div class="form-group kv-fieldset-inline">
                            <div class="col-sm-12" style="padding:0;">
                              <div class="form-group">
                                <input type="text" id="" class="form-control" name="namakeluarga" maxlength="20" placeholder="Nama Keluarga">
                              </div>
                            </div>
                        </div>
                        </td>
                </tr>
                <tr>
                    <td class="pull-right">
                        Status Dalam Keluarga
                    </td>
                    <td >
                        <div class="form-group kv-fieldset-inline">
                            <div class="col-sm-12" style="padding:0;">
                              <div class="form-group">
                                <input type="text" id="" class="form-control" name="statuskeluarga" maxlength="20" placeholder="Status Hubungan Dalam Keluarga">
                              </div>
                            </div>
                        </div>
                        </td>
                </tr>
                <tr>
                    <td class="pull-right">
                        No HP
                    </td>
                    <td >
                        <div class="form-group kv-fieldset-inline">
                            <div class="col-sm-12" style="padding:0;">
                              <div class="form-group">
                                <input type="text" id="" class="form-control" name="hpkeluarga" maxlength="20" placeholder="Nomer HP Keluarga">
                              </div>
                            </div>
                        </div>
                        </td>
                </tr>
                <tr>
                    <td class="pull-right">
                        File KTP/KTM/Kartu Pelajar
                    </td>
                    <td >
                        <div class="form-group kv-fieldset-inline">
                            <div class="col-sm-12" style="padding:0;">
                              <div class="form-group">
                                <!-- <input type="file" class="default" name="gambar" /> -->
                                <input type="file" class="form-control" name="gambar" />
                              </div>
                            </div>
                        </div>
                        </td>
                </tr>

                <tr>
                    <td class="pull-right">
                        Foto
                    </td>
                    <td >
                        <div class="form-group kv-fieldset-inline">
                            <div class="col-sm-12" style="padding:0;">
                              <div class="form-group">
                                <!-- <input type="file" class="default" name="gambar" /> -->
                                <input type="file" class="form-control" name="foto" />
                              </div>
                            </div>
                        </div>
                        </td>
                </tr>
                
                <tr>
                    <td class="pull-right">
                    </td>
                    <td >
                        <div class="form-group kv-fieldset-inline">
                            <div class="col-sm-12" style="padding:0;">
                              <div class="form-group">
                                <button type="submit" class="btn btn-success">Simpan</button>                
                              </div>
                            </div>
                        </div>
                        </td>
                </tr>





            </table>


              
            </section>
          </div>
          </div>
          
          
          <div class="col-md-4">
          <h4>Lokasi</h4>
            <br>
            <div id="map"></div>
               <script>
                 function initMap() {
                   var map_dispenduk = {lat: -7.811800, lng: 112.014692};
                   var map = new google.maps.Map(document.getElementById('map'), {
                     zoom: 17,
                     center: map_dispenduk
                   });
                   var marker = new google.maps.Marker({
                     position: map_dispenduk,
                     map: map
                   });
                 }
               </script>
               <script async defer
               src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMoNic9Uq-hpj9ABhTfRPYNyWV0zZ0sfo&callback=initMap">
               </script>

            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d34461.41320711293!2d111.92089114011266!3d-8.085476000000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6564d745cf903980!2sAlifa+Hijab+Syar&#39;i!5e0!3m2!1sen!2sus!4v1506506795899" width="380" height="500" frameborder="0" style="border:0" allowfullscreen></iframe> -->
          	<!-- Timing -->
            <!-- <div class="timing">
              
              <p>Mon to Fri <span> 8:00 am to 7:00pm</span></p>
              <p>Sat <span>9:00 am to 5:00pm</span></p>
              <p>Sun <span>Closed</span></p>
            </div>
            
            
             <h4>Follow Us</h4>
            
            <ul class="social_icons">
              <li class="facebook"><a href="#."><i class="fa fa-facebook"></i> </a></li>
              <li class="twitter"><a href="#."><i class="fa fa-twitter"></i> </a></li>
              <li class="linkedin"><a href="#."><i class="fa fa-linkedin"></i> </a></li>
              <li class="skype"><a href="#."><i class="fa fa-skype"></i> </a></li>
              <li class="dribbble"><a href="#."><i class="fa fa-dribbble"></i> </a></li>
              <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i> </a></li>
              <li class="flickr"><a href="#."><i class="fa fa-flickr"></i> </a></li>
            </ul> -->
          </div>
        </div>
      </div>
    </div>
    
    
        <!--======= GOOGLE MAP =========-->
        <div id="map" class="g_map"></div>
    
    
  </div>