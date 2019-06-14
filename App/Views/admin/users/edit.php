<div class="content-box-large">
  <div class="panel-heading">
    <div class="panel-title"><h3><?= $title;?></h3></div>
    <a href="/admin/users"><button class="btn btn-primary pull-right"> Go back</button></a>
  </div>
</div>
<div class="table-responsive">
  <form class="form-horizontal" role="form" method="POST">
    <div class="panel-body">
      <div class="form-group">
        <label for="name" class="col-sm-2 control-label">User Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']?>">
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="email">User Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']?>">
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="password">User Password</label>
        <input type="password" class="form-control" id="password" name="password" value="<?= $user['password']?>">
      </div>

      <div class="form-group">
        <label class="control-label" for="role_id">User Role</label>
        <select name="role_id" class="form-control" id="role">
          <?php if (is_array($roles)) : ?>
            <?php foreach ($roles as $role): ?>
              <option value="<?php echo $role->id;?>" <?php 
              if($role->id === $user['role_id'])echo ' selected="selected"';?>>
                <?php echo $role->name; ?>
              </option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="status">User Status</label>
        <input  class="form-control" type="checkbox" name="status" <?php if ($user['status'] == 1) echo ' checked'; ?>>
      </div>
      <hr>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button id="save" type="submit" class="save btn btn-primary">Update User</button>
        </div>
      </div>
    </div>
  </form>
</div>