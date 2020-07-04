              <!--/.include this where you want to show add to cart button-->

              <?php
							global $product;
							$pid = $product->get_id();
							?>
							<a href="<?php echo do_shortcode( '[add_to_cart_url id=' . $pid . ']' ) ?>" class="your-classes-here">Add to cart this</a>
