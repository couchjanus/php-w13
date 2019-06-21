<div class="content-box-large">
  <div class="panel-heading">
    <div class="panel-title"><h3><?= $title;?></h3></div>
    <a href="/admin/orders"><button class="btn btn-primary pull-right"> Go back</button></a>
  </div>
</div>
<div class="table-responsive">
  <form class="form-horizontal" role="form" method="POST">
    <div class="panel-body">
      <div class="form-group">
        <label for="name" class="control-label">Имя клиента</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $user['first_name'].' '.$user['last_name'];?>">
      </div>
      <div class="form-group">
        <label class="control-label" for="phone">Телефон клиента</label>
          <input class="form-control" id="phone" name="phone" value="<?= $user['phone_number']?>">
      </div>
      <div class="form-group">
        <label for="status" class="control-label">Статус заказа</label>
        <select name="status" class="form-control">
          <?php foreach ([1,2,3,4] as $s): ?>
            <option value="<?php echo $s;?>" <?php 
              if($s === $order['status'])echo ' selected="selected"';?>>
                <?php echo Helper::getStatusText($s); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <hr>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button id="save" type="submit" class="save btn btn-primary">Update Order</button>
        </div>
      </div>
    </div>
  </form>
</div>