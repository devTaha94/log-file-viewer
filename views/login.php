<?php include '../views/layouts/header.php'?>
<div class="container">
    <?php include '../views/layouts/nav.php'?>
    <div class="d-flex justify-content-center align-items-center ">
        <form action="<?php echo baseUrl.'sign-in'?>" method="post" class="loginForm card p-1 col-md-4 " >
            <div class="form-group padding-20">
                <label for="exampleInputName1">Username</label>
                <input name="username" required type="text" class="form-control" id="exampleInputName1"   placeholder="Enter Username">
            </div>
            <div class="form-group padding-20">
                <label for="password">Password</label>
                <input type="password" id="password" required name="password" class="form-control"  placeholder="Password">
            </div>
            <br>
            <button type="submit" class="btn btn-dark ">Login</button>
        </form>
    </div>
</div>
<?php include '../views/layouts/footer.php'?>
<?php include '../views/scripts/login-scripts.php'?>

