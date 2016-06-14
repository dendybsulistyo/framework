<body>

<div id="wrapper">

        <!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

<!-- Brand and toggle get grouped for better mobile display -->
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand active" href="#"><?php echo $session_nama_aplikasi; ?></a>
            </div>

            <!-- Top Menu Items -->
             <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $session_nama; ?>
                    
                </li>
            </ul>

            <br>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    
                    <li class=active><a href="<?php echo base_url(); ?>dashboard/index">Dashboard</a></li>
                    <li><a href="<?php echo base_url(); ?>menu/inbox">Inbox</a></li>
                    
                    <!-- Menu yang tampil sesuai level -->
                    <?php
                        foreach ($r->result() as $row)
                        {
                            $this->load->view("menu/$row->nama_level");
                            }
                            ?>

                   <li><a href="<?php echo base_url(); ?>authen/logout">Logout</a></li>
                     
                  </ul>
            </div>

            <!-- /.navbar-collapse -->

</nav>