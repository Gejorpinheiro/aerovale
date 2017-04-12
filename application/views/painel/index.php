        <?php $this->load->view('painel/header'); ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Main</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php  
                            echo form_open_multipart();
                            echo "<div class='form-group'>";
                            echo form_label('Título', 'titulo');
                            echo form_input('titulo', '', array('class' => 'form-control'));
                            echo "</div>";
                            echo "<div class='form-group'>";
                            echo form_label('Imagem do header', 'titulo');
                            echo form_upload('header');
                            echo "</div>";
                            echo "<div class='thumbnail'>";
                            echo "<img src='base_url('uploads/');'>";
                            echo "</div>";
                            echo "<div class='form-group'>";
                            echo form_label('Texto', 'texto');
                            echo form_textarea('texto', '', array('class' => 'form-control'));
                            echo "</div>";
                            echo form_submit('submit', 'Salvar', array('class' => 'btn btn-primary'));
                            echo form_close();
                        ?>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
</body>
</html>