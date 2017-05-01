        <?php $this->load->view('painel/header'); ?>
        <div id="page-wrapper">
            <div class="container-fluid">
            <?php  
                switch ($tela) {
                    case 'settings':
            ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Settings</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php  
                                    echo form_open();
                                    echo "<div class='form-group'>";
                                    echo form_label('Usuário', 'usuario');
                                    echo form_input('usuario', $usuario, array('class' => 'form-control'));
                                    echo "</div>";
                                    echo "<div class='form-group'>";
                                    echo form_label('Senha', 'senha');
                                    echo form_password('senha', '', array('class' => 'form-control'));
                                    echo "</div>";
                                    echo form_submit('submit', 'Salvar', array('class' => 'btn btn-primary'));
                                    echo form_close();
                                ?>
                            </div>
                            <div>
                                <?php  
                                    if($msg = get_msg()){
                                        echo $msg;
                                    }
                                ?>
                            </div>
                        </div>
            <?php                    
                        break;
                    case 'main':
            ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Main</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php  
                                    echo form_open_multipart();
                                    echo "<div class='form-group'>";
                                    echo form_label('Título', 'titulo');
                                    echo form_input('titulo', $conteudo->titulo, array('class' => 'form-control'));
                                    echo "</div>";
                                    echo "<div class='form-group'>";
                                    echo form_label('Imagem do header', 'titulo');
                                    echo form_upload('header');
                                    echo "<span>";
                                    echo "</span>";
                                    echo "</div>";
                                    echo "<div class='thumbnail'>";
                                    echo "<img src='".base_url('uploads/'.$conteudo->imagem)."'>";
                                    echo "</div>";
                                    echo "<div class='form-group'>";
                                    echo form_label('Texto', 'texto');
                                    echo form_textarea('texto', $conteudo->texto, array('class' => 'form-control'));
                                    echo "</div>";
                                    echo form_submit('submit', 'Salvar', array('class' => 'btn btn-primary'));
                                    echo form_close();
                                    if($msg = get_msg()){
                                        echo $msg;
                                    }
                                ?>
                            </div>
                        </div>
            <?php
                        break;
                    case 'box':
            ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Box</h1>
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>
            <?php
                        break;
                    default:
                        # code...
                        break;
                }
            ?>
                
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