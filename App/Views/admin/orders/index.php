<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">
            <h3><?= $title;?></h3>
        </div>
    </div>
</div>
<div class="table-responsive">
    <?php if ($numRows): 
      echo '<h4>There are '.$numRows.' orders in the storage</h4>'; ?>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>Order Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order):?>
            <tr>
                <td><?php echo $order->id?></td>
                <td><?php echo $order->user_id?></td>
                <td><?php echo Helper::getStatusText($order->status);?></td>
                <td>
                  <button class="btn btn-default"><span data-feather="eye"></span> View</button>
                  <a href="/admin/orders/edit/<?=$order->id?>"><button class="btn btn-primary"><span data-feather="edit"></span> Edit</button></a>
                  <a href="/admin/orders/delete/<?=$order->id?>"><button class="btn btn-danger"><span data-feather="delete"></span> Delete</button></a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php else:?>
    <h3>Not orders yet...</h3>
    <?php endif; ?>
</div>