<div id="page-wrapper">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-lg-12">
                        <!-- warning -->
                          <?php $this->load->view('statis/warning'); ?>
                        <!-- selesai warning -->
                        <h2 class="page-header">Manajemen <small>User Aplikasi</small></h2>
                    </div>
                </div>
             

                <?php  
                  $attributes = array('class' => 'form-horizontal');
                  echo form_open( 'crud_user/create_user', $attributes);       
                  ?>

                 <!-- form judul -->
                <div class="form-group">
                  <label class="col-md-2 control-label" for="textinput">Nama Lengkap</label>  
                  <div class="col-md-5">
                  <input id="textinput" name="nama" type="text" placeholder="Nama Lengkap" 
                  class="form-control input-md">
                  </div>
                </div>

                <!-- form judul -->
                <div class="form-group">
                  <label class="col-md-2 control-label" for="textinput">Email</label>  
                  <div class="col-md-5">
                  <input id="textinput" name="email" type="text" placeholder="Alamat Email" 
                  class="form-control input-md">
                  </div>
                </div>

                 <!-- form judul -->
                <div class="form-group">
                  <label class="col-md-2 control-label" for="textinput">No Hp</label>  
                  <div class="col-md-5">
                  <input id="textinput" name="hp" type="text" placeholder="Nomer Handphone" 
                  class="form-control input-md">
                  </div>
                </div>

                 <!-- form judul -->
                <div class="form-group">
                  <label class="col-md-2 control-label" for="textinput">Level User</label>  
                  <div class="col-md-5">

                  <select id="selectbasic-0" name="id_user_level" class="form-control col-md-5">
                    <?php
                        foreach ($list_all_level->result() as $row)
                        {
                            echo "<option value='$row->id'>$row->nama_level</option>";           
                            }
                    ?>
                    </select>

                  </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                  <label class="control-label col-md-2" for="singlebutton-0"></label>
                  <div class="col-md-5">
                    <button id="singlebutton-0" name="singlebutton-0" class="btn btn-primary">Simpan</button>
                  </div>
                </div>

                </form>


                <!-- tabel  list user -->
                <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-xs-1">No</th>
                                        <th class="col-xs-1">Nama</th>
                                        <th class="col-xs-2">Email</th>
                                        <th class="col-xs-3">No. HP</th>
                                        <th class="col-xs-1">Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                   <?php
                                    
                                    $no=1;
                                    foreach ($list_all_user->result() as $row)
                                    {
                                        echo "<tr>
                                        <td>$no.
                                        <td>$row->nama
                                        <td>$row->email
                                        <td>$row->hp
                                        <td>$row->nama_level
                                        ";

                                        $no=$no+1;           
                                        }                                    
                                    ?>

                                    
                                   
                                </tbody>
                            </table>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->


