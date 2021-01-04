<?php include('header-login.php'); ?>

<div class="card login bg-white">
    <div class="card-body">
        <h2 class="text-center txt-5"><i class="fa fa-user"></i> Alterar senha</h2>
        <form class="form-signin mt-4" method="POST" action="#">
            
            <div class="txt-5 text-center font-2 m-4">
                Digite sua nova senha abaixo
            </div>

            <div class="txt-4 text-center font-2 m-4">
                <i class="fas fa-times"></i>
                As senhas não correspondem
            </div>

            <div class="form-group">
                <input type="email" id="email" class="input-class" name="email" placeholder="Digite sua nova senha" required
                    autofocus>
            </div>

            <div class="form-group">
                <input type="email" id="email" class="input-class" name="email" placeholder="Digite novamente sua nova senha" required>
            </div>

            <div class="row form-inline mt-4">
                <div class="col-md-12">
                    <button class="btn btn-g btn-1 btn-block font-weight-bold" type="submit">
                        <i class="fas fa-edit"></i> Alterar senha
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include('footer-login.php'); ?>