<div class="bg">
    <header class="profile-nav" role='navigation'>
        <div class="logo"></div>
        <div class="navigation-name">Welcome Back <?php echo $user['name'];?>!</div>
        <div class="navigation">
            <a href="/profile">My Profile</a>
            <a href="#">Edit Profile</a>
            <a href="/profile/orders">Orders</a>
            <a href="#">Friends</a>
            <a href="#">Logout</a>
        </div>
    </header>
    <section class="profile">
        <div class="social">
            <a href="#">Follow</a>
            <div class="following">
                <div class="number">42</div>
                <div class="label">Following</div>
            </div>
            <div class="followers">
                <div class="number">23</div>
                <div class="label">Followers</div>
            </div>
        </div>
        <div class="shared-content">
            <div class="section-head">
                <h3>Favorites</h3>
                <a href="#">Add</a>
            </div>
            <div class="content">
                <div class="panel-body">
                    <?php if(count($orders)>0):?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Дата оформления</th>
                                    <th>Статус заказа</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody class="table-items">
                                <?php foreach ($orders as $order):?>
                                <tr>
                                    <td><?= $order['id']?></td>
                                    <td><?= $order['formated_date']?></td>

                                    <td><?php echo Helper::getStatusText($order['status']);?></td>

                                    <td>
                                        <a title="Show order" href="/profile/orders/view/<?= $order['id']?>">
                                            <button class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i>
                                                View</button></a>

                                        <a title="Edit Order" href="/profile/orders/edit/<?= $order['id']?>">
                                            <button class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>
                                                Edit</button></a>

                                        <a title="Delete Order" href="/profile/orders/delete/<?= $order['id']?>">
                                            <button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>
                                                Delete</button></a></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif;?>

                </div>

                <div class="show-more">
                    <a href="#">Show More</a>
                </div>
            </div>
    </section>

    <!-- Our product End -->
    <div id="shadow-layer" class="shadow-layer"></div>
</div>

<!-- Conatiner profile Start -->