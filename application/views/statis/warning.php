                          <!-- warning update berhasil -->
                        <?php
                         
                          // warning kalau login gagal 
                          $update_berhasil = $this->session->flashdata('message');
                            
                            if(isset($update_berhasil)) 
                              {
                                echo "<br><bR>";
                                echo "<div class='alert alert-danger' id=alertku role=alert>
                                 <strong>Berhasil! </strong> Terima Kasih</div>";
                                } 
                                
                            ?>
                        <!-- akhir update berhasil -->