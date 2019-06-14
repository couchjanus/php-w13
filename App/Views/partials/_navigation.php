<nav class="navbar">
		<input type="checkbox" id="menu-trigger" />
		<label class='label' for="menu-trigger">
			<i class="fas fa-bars"></i>
		</label>
		<span class="cart" id="cart-toggle"><i class="fas fa-cart-plus"></i><span class="cart-qty"></span></span>
		<ul class="nav-menu">
			<li class="nav-item">
				<a href="/"><i class="fas fa-home"></i> Home</a>
			</li>
			<li class="nav-item"><a href="/about"><i class="fas fa-info"></i> About</a></li>
			<li class="nav-item"><a href="/contact">Contact</a></li>
			<li class="nav-item"><a href="/blog">Blog</a></li>
			<?php if (Helper::isGuest()) :?>
                <li class="nav-item">
					<a href="/login" id="auth"><i class="fas fa-user"></i> Sign In</a>
				</li>
				<li class="nav-item">
					<a href="/register" id="auth"><i class="fas fa-user"></i> Sign Up</a>
				</li>
            <?php else :?>    
                <li class="nav-item">
					<a href="/logout" id="logout"><i class="fas fa-user"></i> Sign Out</a>
				</li>
            <?php endif;?>
		</ul>
	</nav>