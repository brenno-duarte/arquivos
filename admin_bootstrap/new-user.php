<?php include('header.php'); ?>

<div class="row">
    <div class="col-md-12 mb-4">
        <h1 class="p-4 display-4">New User</h1>
    </div>
</div>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form class="form-signin mt-3" method="POST" action="#">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="input-class" name="name" placeholder="Name" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="input-class" name="senha" placeholder="Password"
                        required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="date">Date</label>
                        <input type="date" id="email" class="input-class" name="email" placeholder="Endereço de email"
                            required autofocus>
                    </div>

                    <!-- &#xf338; -->
                    <div class="form-group col-md-6">
                        <label for="gender">Option</label>
                        <select id="gender" class="select-class" required>
                            <option value="" selected disabled>Disabled</option>
                            <option>Option 1</option>
                            <option>Option 2</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="text">Text</label>
                        <input type="text" id="email" class="input-class" name="email" placeholder="Endereço de email"
                            required autofocus>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="date">Text 2</label>
                        <input type="Text 2" id="email" class="input-class" name="email" placeholder="Endereço de email"
                            required autofocus>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="gender">Option</label>
                        <select id="gender" class="select-class" required>
                            <option value="" selected disabled>Disabled</option>
                            <option>Option 1</option>
                            <option>Option 2</option>
                        </select>
                    </div>
                </div>

                <div class="mt-5 d-flex justify-content-center form-inline">
                    <button class="btn btn-3 mr-3" type="submit">
                        <i class="fas fa-check-circle"></i> Save
                    </button>
                    
                    <a href="javascript:history.back();" class="btn btn-1">
                        <i class="fas fa-arrow-circle-left"></i> Back
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>