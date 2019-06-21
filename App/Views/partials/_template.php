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
                        <a>Detail</a>
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
    <template id="order-form">
    <div class="form-wrapper">
        <div class="order-card">
            <div class="step"">
            <div class=" title">
                <h1>Finalize Order</h1>
            </div>
        </div>
        <div class="content" id="final_products">
            <div class="left" id="ordered">
                <div class="products">
                    <div class="product_details">
                        <span class="product_name">Your Order:</span>
                        <span class="price">00.00</span>
                    </div>
                </div>
                <div class="totals">
                    <span class="subtitle">Subtotal <span id="sub_price">$45.00</span></span>
                    <span class="subtitle">Tax <span class="sub_tax" id="sub_tax">$2.00</span></span>
                    <span class="subtitle">Shipping <span class="sub_ship id="sub_ship">$4.00</span></span>
                </div>
                <div class="final">
                    <span class="title">Total <span id="calculated_total">$51.00</span></span>
                </div>
            </div>
            <div class="right" id="reviewed">

                <div class="billing">
                    <span class="title">Billing Information:</span>
                    <form class="go-right" id="payorder">
                        <div>
                            <input type="name" name="first_name" value="" id="first_name" placeholder="John"
                                data-trigger="change" data-validation-minlength="1" data-type="name"
                                data-required="true" data-error-message="Enter Your First Name" /><label
                                for="first_name">First Name</label>
                        </div>
                        <div>
                            <label for="last_name">Last Name</label>
                            <input type="name" name="last_name" value="" id="last_name" placeholder="Smith"
                                data-trigger="change" data-validation-minlength="1" data-type="name"
                                data-required="true" data-error-message="Enter Your Last Name" /><label
                                for="last_name">Last Name</label>
                        </div>
                        <div>
                            <input type="phone" name="phone_number" value="" id="phone_number"
                                placeholder="(555)-867-5309" data-trigger="change" data-validation-minlength="1"
                                data-type="number" data-required="true"
                                data-error-message="Enter Your Telephone Number" /><label
                                for="phone_number">Telephone</label>
                        </div>
                    </form>

                </div>


                <div class="complete">
                    <a class="big_button" id="complete" href="#">Complete Order</a>
                    <span class="sub">By selecting this button you agree to the purchase and subsequent payment for
                        this order.</span>
                </div>
            </div>
        </div>
    </div>
    </div>

</template>



<template id="productDetail">
    <div class="carousel-wrapper">
        <div class="carousel">
            <div class="carousel__nav">
                <span id="moveLeft" class="carousel__arrow">
                    <svg class="carousel__icon" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
                    </svg>
                </span>
                <span id="moveRight" class="carousel__arrow">
                    <svg class="carousel__icon" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                    </svg>
                </span>
            </div>
            <div class="carousel-item carousel-item--1">
                <div class="carousel-item__image"></div>
                <div class="carousel-item__info">
                    <div class="carousel-item__container">
                        <h2 class="carousel-item__subtitle">The grand mom </h2>
                        <h1 class="carousel-item__title">Je t'adore</h1>
                        <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit
                            voluptatem
                            accusantium doloremque laudantium, totam rem aperiam.</p>
                        <a href="#" class="carousel-item__btn">Explore now</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item carousel-item--2">
                <div class="carousel-item__image"></div>
                <div class="carousel-item__info">
                    <div class="carousel-item__container">
                        <h2 class="carousel-item__subtitle">The big cat </h2>
                        <h1 class="carousel-item__title">Mama mia!</h1>
                        <p class="carousel-item__description">Clear Glass Window With Brown and White Wooden Frame
                            iste
                            natus error
                            sit voluptatem accusantium doloremque laudantium.</p>
                        <a href="#" class="carousel-item__btn">Read more</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item carousel-item--3">
                <div class="carousel-item__image"></div>
                <div class="carousel-item__info">
                    <div class="carousel-item__container">
                        <h2 class="carousel-item__subtitle">Tropical cat </h2>
                        <h1 class="carousel-item__title">Palmovil</h1>
                        <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit
                            voluptatem
                            accusantium doloremque laudantium, totam rem aperiam.</p>
                        <a href="#" class="carousel-item__btn">Explore this</a>
                    </div>
                </div>
            </div>

            <div class="carousel-item carousel-item--4">
                <div class="carousel-item__image"></div>
                <div class="carousel-item__info">
                    <div class="carousel-item__container">
                        <h2 class="carousel-item__subtitle">Beach cat</h2>
                        <h1 class="carousel-item__title">The beach </h1>
                        <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit
                            voluptatem
                            accusantium doloremque laudantium, totam rem aperiam.</p>
                        <a href="#" class="carousel-item__btn">Explore the beach</a>
                    </div>
                </div>
            </div>

            <div class="carousel-item carousel-item--5">
                <div class="carousel-item__image"></div>
                <div class="carousel-item__info">
                    <div class="carousel-item__container">
                        <h2 class="carousel-item__subtitle">The white cat </h2>
                        <h1 class="carousel-item__title">White building cat</h1>
                        <p class="carousel-item__description">Sed ut perspiciatis unde omnis iste natus error sit
                            voluptatem
                            accusantium doloremque laudantium, totam rem aperiam.</p>
                        <a href="#" class="carousel-item__btn">Read more</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
