<?php include('header.php'); ?>

<div class="row">
    <div class="col-md-12 mb-4">
        <h1 class="p-4 display-4">Users</h1>
    </div>
</div>

<section class="content">
    <div class="row mb-3">
        <div class="col-md-6">
            <a href="new-user.php" class="btn btn-3">
                <i class="fas fa-plus-circle"></i> New User
            </a>
        </div>

        <div class="col-md-6 d-flex justify-content-end">
            <form action="#" method="get">
                <input type="text" placeholder="&#xf002; Search..." class="input-search">
            </form>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <table class="table table-action">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Info</th>
                        <th>State</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>27/09/2013</td>
                        <td>One little text</td>
                        <td>
                            <a href="#" class="btn btn-2 mr-3">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="#" class="btn btn-4" onclick="return confirm('Deseja realmente excluir este usuário?')">
                                <i class="fas fa-trash-alt"></i> Excluir
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>27/09/2013</td>
                        <td>One little text</td>
                        <td>
                            <a href="#" class="btn btn-2 mr-3">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="#" class="btn btn-4">
                                <i class="fas fa-trash-alt"></i> Excluir
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>27/09/2013</td>
                        <td>One little text</td>
                        <td>
                            <a href="#" class="btn btn-2 mr-3">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="#" class="btn btn-4">
                                <i class="fas fa-trash-alt"></i> Excluir
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>27/09/2013</td>
                        <td>One little text</td>
                        <td>
                            <a href="#" class="btn btn-2 mr-3">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="#" class="btn btn-4">
                                <i class="fas fa-trash-alt"></i> Excluir
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <nav class="mt-5">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#"><<</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">>></a></li>
                </ul>
            </nav>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>