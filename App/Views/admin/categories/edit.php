<div class="content-box-large">
  <div class="panel-heading">
    <div class="panel-title"><h3><?=$title;?></h3></div>
    <a href="/admin/categories"><button class="btn btn-primary pull-right"> Go back</button></a>
  </div>
</div>
<div class="table-responsive">
  <form class="form-horizontal" method="POST" role="form">
    <div class="panel-body">
      <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Category Name #<?=$category['id'];?></label>
        <input type="text" class="form-control" id="name" name="name" value="<?=$category['name'];?>">
      </div>

      <div class="form-group">
        <label for="status" class="col-sm-2 control-label">Status</label>
        <select name="status" class="form-control">
          <option value="1" <?php if($category['status'] == 1) echo 'selected'?>>Отображать</option>
          <option value="0" <?php if($category['status'] == 0) echo 'selected'?>>Скрывать</option>
        </select>
      </div>
    </div>
    <div class="form-group">
        <button id="save" type="submit" class="save btn btn-primary"><span data-feather="plus"></span> Update Category</button>
    </div>
  </form>
 
</div>
