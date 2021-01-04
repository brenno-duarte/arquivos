<?php include('header-login.php'); ?>

<div class="card login bg-white">
    <div class="card-body">
        <h2 class="text-center txt-5"><i class="fa fa-user"></i> Login</h2>
        <form class="form-signin mt-4" method="POST" action="#">
            <div class="form-group">
                <input type="email" id="email" class="input-class" name="email" placeholder="Endereço de email" required
                    autofocus>
            </div>

            <div class="form-group">
                <input type="password" id="password" class="input-class" name="senha" placeholder="Senha" required>
            </div>

            <div class="txt-4 text-center font-3 mb-3 mt-4">
                <i class="fas fa-times"></i>
                Usuário e/ou senha incorretos
            </div>

            <div class="row form-inline mt-4">
                <div class="col-md-6">
                    <button class="btn btn-g btn-1 btn-block font-weight-bold" type="submit">
                        <i class="fas fa-sign-in-alt"></i> Entrar
                    </button>
                </div>

                <div class="col-md-6">
                    <a href="forgot.php" class="float-right txt-1">Esqueci a senha</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include('footer-login.php'); ?>