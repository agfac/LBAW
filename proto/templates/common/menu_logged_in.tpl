<li class="linkdown">
          <a href="javascript:void(0);">
            <i class="fa fa-user mr-5"></i>
            <span class="hidden-xs">
              {$USERNAME} 
              <i class="fa fa-angle-down ml-5"></i>
            </span>
          </a>
          <ul class="w-150">
            <li><a href="{$BASE_URL}pages/users/my-account.php">Minha Conta</a></li>
            <li><a href="?page=wishlist">Wishlist (5)</a></li>
            <li><a href="?page=cart">Ver Carrinho</a></li>
            <li><a href="?page=checkout">Checkout</a></li>
          </ul>
        </li>
        <li class="linkdown">
          <a href="javascript:void(0);">
            <a href="{$BASE_URL}actions/users/logout.php">Logout</a>
          </a>
        </li>
        <li class="linkdown">
          <a href="javascript:void(0);">
            <i class="fa fa-shopping-basket mr-5"></i>
            <span class="hidden-xs">
              Carrinho<sup class="text-primary">(3)</sup>
              <i class="fa fa-angle-down ml-5"></i>
            </span>    
          </a>
          <ul class="cart w-250">
            <li>
              <div class="cart-items">
                <ol class="items">
                  <li> 
                    <a href="?page=single-product" class="product-image">
                      <img src="{$BASE_URL}images/publications/books/books_5.jpg" alt="Sample Product ">
                    </a>
                    <div class="product-details">
                      <div class="close-icon"> 
                        <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                      </div>
                      <p class="product-name"> 
                        <a href="?page=single-product">Lorem Ipsum dolor sit</a> 
                      </p>
                      <strong>1</strong> x <span class="price text-primary">€59.99</span>
                    </div><!-- end product-details -->
                  </li><!-- end item -->
                  <li> 
                    <a href="?page=single-product" class="product-image">
                      <img src="{$BASE_URL}images/publications/books/books_6.jpg" alt="Sample Product ">
                    </a>
                    <div class="product-details">
                      <div class="close-icon"> 
                        <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                      </div>
                      <p class="product-name"> 
                        <a href="?page=single-product">Lorem Ipsum dolor sit</a> 
                      </p>
                      <strong>1</strong> x <span class="price text-primary">€39.99</span>
                    </div><!-- end product-details -->
                  </li><!-- end item -->
                  <li> 
                    <a href="?page=single-product" class="product-image">
                      <img src="{$BASE_URL}images/publications/books/books_5.jpg" alt="Sample Product ">
                    </a>
                    <div class="product-details">
                      <div class="close-icon"> 
                        <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                      </div>
                      <p class="product-name"> 
                        <a href="?page=single-product">Lorem Ipsum dolor sit</a> 
                      </p>
                      <strong>1</strong> x <span class="price text-primary">€29.99</span>
                    </div><!-- end product-details -->
                  </li><!-- end item -->
                </ol>
              </div>
            </li>
            <li>
              <div class="cart-footer">
                <a href="?page=cart" class="pull-right"><i class="fa fa-cart-plus mr-5"></i>Ver Carrinho Completo</a>
                <a href="?page=checkout" class="pull-right"><i class="fa fa-shopping-basket mr-5"></i>Checkout</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div><!-- end container -->
  </div>
  <!-- end topBar -->