<div class="content-box-large">
  <div class="panel-heading">
    <div class="panel-title"><h3><?= $title;?></h3></div>
    <a href="/admin/roles/create"><button class="btn btn-primary pull-right"><span data-feather="plus"></span> Add New</button></a>
  </div>
</div>
<div class="table-responsive">
<?php if ($numRows): 
  echo '<h4>There is '.$numRows.' roles in the storage</h4>'; ?>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
      <th>#</th>
      <th>Role Name</th>
      <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($roles as $role):?>
      <tr>
        <td><?php echo $role->id;?></td>
        <td><?php echo $role->name;?></td>
        <td>
          <button class="btn btn-default"><span data-feather="eye"></span> View</button>
          <a href="/admin/roles/edit/<?=$role->id?>"><button class="btn btn-primary"><span data-feather="edit"></span> Edit</button></a>
          <a href="/admin/roles/delete/<?=$role->id?>"><button class="btn btn-danger"><span data-feather="delete"></span> Delete</button></a></td>
        </tr>
    <?php endforeach;?>
    
    </tbody>
  </table>
  <?php else:?>
    <h3>Not Roles yet...</h3>
<?php endif; ?>
</div>
