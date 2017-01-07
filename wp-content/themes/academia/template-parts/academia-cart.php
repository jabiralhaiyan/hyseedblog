<!-- Modal -->
        <div class="academia-cart">
            ​
            <div class="academia-cart-header">
                <h4 class="cart-total">
                    <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'academia' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'academia' ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
                    <span>in cart</span>
                </h4>
            </div>
            ​
            <div class="academia-cart-body">

                <?php the_widget('WC_Widget_Cart') ?>
                ​
            </div>
            <!-- end of the modal body -->
            ​
        </div>

​
​