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
             

                


                <!-- tabel  list user -->
                <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-xs-1">No</th>
                                        <th class="col-xs-1">Nama</th>
                                        <th class="col-xs-2">Email</th>
                                        <th class="col-xs-1">Level</th>
                                        <th class="col-xs-1">Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                   <?php
                                    
                                    $no=1;
                                    foreach ($list_all_login->result() as $row)
                                    {
                                        echo "<tr>
                                        <td>$no.
                                        <td>$row->nama
                                        <td>$row->email
                                        <td>$row->nama_level
                                        <td>$row->username
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


