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

<table class="table table-responsive">
    <thead>
        <tr>
            <th>#</th>
            <th>Дата заказа</th>
            <th>Статус</th>
            <th>Товары в заказе</th>
        </tr>
    </thead>
    <tbody class="table-items">
        <tr>
            <td><?php echo $order['id']?></td>
            <td><?php echo $order['order_date']?></td>
            <td><?php echo Helper::getStatusText($order['status']);?></td>
            <td><?php 
            $totalValue = 0;
            foreach ((array)$products as $product) :
                echo "<a href=/catalog/".$product['Id'].">".$product['Product']."</a></br>";
                echo "<span>Кол-во: </span>" . $product['Quantity'].'</br>';
                echo '<span>Цена: </span>' . substr($product['Price'], 1). ' грн</br>';
                echo '<span>Picture: </span><img src="/' . $product['Picture']. '"></br>';
                //подсчитываем сумму по каждому товару и пишем в массив
                $arr[] = substr($product['Price'], 1) * $product['Quantity'];

                //считаем общую сумму всех товаров в заказе, с учетом их кол-ва
                $totalValue = array_sum($arr);
                        
            endforeach; 
            ?>
            </td>
        </tr>
            
        <tr class="total_price">
            <td colspan="4"><?php echo '<span>Сумма заказа: ' . $totalValue.' грн</span>';?></td>
        </tr>
        <?php
            //Очищаем массив
            $arr = array();
        ?>
    </tbody>
</table>
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
