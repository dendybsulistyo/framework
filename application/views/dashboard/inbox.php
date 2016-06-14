<div id="page-wrapper">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-lg-12">
                        <!-- warning -->
                          <?php $this->load->view('statis/warning'); ?>
                        <!-- selesai warning -->
                        <h2 class="page-header">Inbox <small>Kirim Pesan</small></h2>
                    </div>
                </div>
             

                <?php  
                  $attributes = array('class' => 'form-horizontal');
                  echo form_open( 'crud_inbox/kirim', $attributes);       
                  ?>

                <!-- pilihan user -->
                <div class="form-group">
                  <label class="col-md-2 control-label" for="selectbasic-0">User</label>
                  <div class="col-md-5">
                    
                    <!-- list all user -->
                    <select id="selectbasic-0" name="id_user_tujuan" class="form-control col-md-5">
                    <?php
                        foreach ($list_all_user->result() as $row)
                        {
                                if($row->id != $this->session->userdata('session_id')) {
                                echo "<option value='$row->id'>$row->nama</option>";
                                }

                            }

                            ?>
                    </select>

                  </div>
                </div>

                <!-- form judul -->
                <div class="form-group">
                  <label class="col-md-2 control-label" for="textinput">Judul</label>  
                  <div class="col-md-5">
                  <input id="textinput" name="judul" type="text" placeholder="Judul Pesan" 
                  class="form-control input-md">
                  </div>
                </div>

                <!-- Textarea pesan-->
                <div class="form-group">
                  <label class="col-md-2 control-label" for="textarea-0">Pesan</label>
                  <div class="col-md-5">                     
                    <textarea class="form-control input-md" rows=3 id="textarea-0" 
                    name="pesan"></textarea>
                  </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                  <label class="control-label col-md-2" for="singlebutton-0"></label>
                  <div class="col-md-5">
                    <button id="singlebutton-0" name="singlebutton-0" class="btn btn-primary">Kirim Pesan</button>
                  </div>
                </div>

                </form>


                <!-- tabel pesan yang belum dibaca -->

                <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-xs-1">No</th>
                                        <th class="col-xs-1">Tanggal</th>
                                        <th class="col-xs-2">From</th>
                                        <th class="col-xs-3">Judul</th>
                                        <th class="col-xs-4">Pesan</th>
                                        <th class="col-xs-1">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                   <?php

                                    $no=1;
                                    foreach ($list_all_inbox->result() as $row)
                                    {
                                        if($row->dari != $this->session->userdata('session_id')) {
                                        echo "
                                        <tr>
                                        <td>$no</td>
                                        <td>$row->created</td>
                                        <td>$row->nama</td>
                                        <td>$row->judul</td>
                                        <td>$row->pesan</td>
                                        <td><i class='fa fa-fw fa-trash-o'></i></td>
                                        </tr>";

                                        // nomer pesan
                                        $no = $no+1;

                                            }
                                        }
                                    ?>
                                    </tr>
                                   
                                </tbody>
                            </table>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->


