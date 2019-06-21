<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">
            <h3><?= $title;?> <?= $order['id'];?></h3>
        </div>
        <a href="/admin/orders"><button class="btn btn-primary pull-right"><span data-feather="plus"></span> Go Back</button></a>
    </div>

    <div class="table-responsive">
        <form class="form-horizontal" role="form" method="POST">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-sm-12 control-label"><h2>This order will be deleted! Are You Sure?</h2></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button name="submit" type="submit" class="save btn btn-danger">Delete Order</button>
                    <button name="reset" class="save btn btn-info">Cansel</button>
                    </div>
                </div>
        </form>
    </div>
</div>