<?php
require_once VIEWS.'partials/admin/_head.php';
?>
<div class="content-box-large">
  <div class="panel-heading">
    <div class="panel-title"><h3><?= $title;?></h3></div>
    <a href="/admin/products/create"><button class="btn btn-primary pull-right"><span data-feather="plus"></span> Add New</button></a>
  </div>
</div>
<div class="table-responsive">
<?php if ($numRows): 
  echo '<h4>There is '.$numRows.' products in the storage</h4>'; ?>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
      <th>#</th>
      <th>Product Name</th>
      <th>Product Price</th>
      <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $products):?>
      <tr>
        <td><?php echo $products->id;?></td>
        <td><?php echo $products->name;?></td>
        <td><?php echo $products->price;?></td>
        <td>
          <button class="btn btn-default"><span data-feather="eye"></span> View</button>
          <button class="btn btn-primary"><span data-feather="edit"></span> Edit</button>
          <button class="btn btn-danger"><span data-feather="delete"></span> Delete</button></td>
        </tr>
    <?php endforeach;?>
    
    </tbody>
  </table>
  <?php else:?>
    <h3>Not Products yet...</h3>
<?php endif; ?>
</div>

<?php
require_once VIEWS.'partials/admin/_footer.php';
