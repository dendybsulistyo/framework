<div id="page-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <!-- warning -->
                          <?php $this->load->view('statis/warning'); ?>
                        <!-- selesai warning -->
                        <h2 class="page-header">Data Pribadi <small>Profil User </small></h2>
                    </div>
                </div>
             


                <?php  
                  $attributes = array('class' => 'form-horizontal');
                  echo form_open( 'crud_pribadi/update', $attributes);       
                ?>
                

                <!-- view untuk konten aplikasi-->
                <div class="form-group">
                  <label class="col-md-2 control-label" for="textinput">Nama Lengkap</label>  
                  <div class="col-md-5">
                  <input id="textinput" name="nama" type="text" placeholder="Nama Lengkap" 
                  value="<?php echo $session_nama; ?>"
                  class="form-control input-md">
                  </div>
                </div>
                <!-- /.row -->

                <!-- Button -->
                <div class="form-group">
                  <label class="control-label col-md-2" for="singlebutton-0"></label>
                  <div class="col-md-5">
                    <button id="singlebutton-0" name="singlebutton-0" class="btn btn-primary">Update</button>
                  </div>
                </div>





            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->


