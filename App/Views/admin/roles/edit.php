<div class="content-box-large">
  <div class="panel-heading">
    <div class="panel-title"><h3><?=$title;?></h3></div>
    <a href="/admin/roles"><button class="btn btn-primary pull-right"> Go back</button></a>
  </div>
</div>
<div class="table-responsive">
  <form class="form-horizontal" method="POST" role="form">
    <div class="panel-body">
      <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Role Name #<?=$role['id'];?></label>
        <input type="text" class="form-control" id="name" name="name" value="<?=$role['name'];?>">
      </div>
    </div>
    <div class="form-group">
        <button id="save" type="submit" class="save btn btn-primary"><span data-feather="plus"></span> Update Role</button>
    </div>
  </form>
</div>
