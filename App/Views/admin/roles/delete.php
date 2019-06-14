<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">
            <h3><?= $title;?> <?= $role['name'];?></h3>
        </div>
        <a href="/admin/roles"><button class="btn btn-primary pull-right"><span data-feather="plus"></span> Go Back</button></a>
    </div>

    <div class="table-responsive">
        <form class="form-horizontal" role="form" method="POST">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-12 control-label"><h2>This role will be deleted! Are You Sure?</h2></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button name="submit" type="submit" class="save btn btn-danger">Delete Role</button>
                    <button name="reset" class="save btn btn-info">Cansel</button>
                    </div>
                </div>
        </form>
    </div>
</div>