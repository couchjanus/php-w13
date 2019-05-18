<div class="backdrop"></div>
	<template id="cartItem">
        <li class='cart-item'>
            <span class="productInCart" id=""></span>
            <div class='item-img'>
                <img src="images/cat3.jpg" alt='' />
            </div>
            <span class="item-name"></span>
            <span class="item-quantity"></span>
            <strong class="item-price"></strong>
            <strong class="item-prices"></strong>
            <div class='remove-item'></div>
            <div class='cart-item-border'></div>

        </li>
	</template>
	
	<template id="productItem">
        <article class="grid-item">
            <div class="product-wrapper" id="productId">
                <div class="product">
                    <p class="product-name"></p>
                    <div class="icon">
                        <div class="icon-background"></div>
                        <span class="shopping-cart">
                            <i class="fas fa-cart-plus"></i>
                        </span>
                    </div>
                    <div class="product-picture">
                        <img src="images/cat3.jpg" alt="" />
                    </div>
                    <div class="product-menu">
                        <div class="product-price">
                            
                        </div>
                        <div class="buy-now">
                            Buy now!
                        </div>
                        <div class="product-detail">
                            Detail
                        </div>

                        <div class="how-many">
                            <div class="quantity-input">
                                <input class="minus btn" type="button" value="-">
                                <input class="input-text quantity text" value="3" size="4">
                                <input class="plus btn" type="button" value="+">
                            </div>
                        </div>
                        <div class="cancel">
                            Cancel
                        </div>
                        <div class="add-to-cart">
                            Add to Cart!
                        </div>
                    </div>
                </div>
                <div class="product-back">
                    <span class="check">
                        <i class="fa fa-check fa-4x"></i>
                        <p>Success!</p>
                    </span>
                </div>
            </div>
        </article>
    </template>
