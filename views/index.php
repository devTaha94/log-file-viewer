<?php include '../views/layouts/header.php'?>
<div class="container">
    <?php include '../views/layouts/nav.php'?>
     <form>
            <div class="row">
                <div class="col-10">
                    <div class="form-group">
                        <input type="text" id="filePath" class="form-control"   placeholder="/path/to/file">
                    </div>
                </div>
                <div class="col-2">
                    <input type=button class="btn btn-dark w-100" onclick="readLogFile()" value='View'>
                </div>
            </div>
     </form>
    <div id="table">

    </div>
</div>

<?php include '../views/layouts/footer.php'?>
<?php include '../views/scripts/index-scripts.php'?>

