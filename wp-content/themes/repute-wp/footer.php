<?php global $repute_options; ?>
<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- COLUMN 1 -->
                <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer-left')) : else : ?>
                <?php endif; ?>
                <!-- END COLUMN 1 -->
            </div>
            <div class="col-md-4">
                <!-- COLUMN 2 -->
                <h3 class="footer-heading"><?php $currentlang = get_bloginfo('language'); if($currentlang==='nl'): ?>Navigatie<?php else:?>Navigation<?php endif ?></h3>
                <div class="row margin-bottom-30px">
                    <div class="col-xs-6">
                        <?php wp_nav_menu(array('menu_class' => 'list-unstyled footer-nav', 'theme_location' => 'footernavleft')); ?>
                    </div>
                    <div class="col-xs-6">
                        <?php wp_nav_menu(array('menu_class' => 'list-unstyled footer-nav', 'theme_location' => 'footernavright')); ?>
                    </div>
                </div>
                <!-- END COLUMN 2 -->
            </div>
            <div class="col-md-4">
                <!-- COLUMN 3 -->
                <?php
                $currentlang = get_bloginfo('language');
                if ($currentlang == "nl"):
                    ?>
                    <div class="newsletter">
                        <h3 class="footer-heading">Nieuwsbrief</h3>
                        <p>Blijf op de hoogte door u aan te melden op onze nieuwsletter.</p>
                        <!--                            <p>Get the latest update from us by subscribing to our newsletter.</p>-->
                        <form class="newsletter-form" method="POST">

                            <?php $nonce = wp_create_nonce("subscribe_newsletter_nonce"); ?>

                            <div class="input-group input-group-lg">
                                <input type="email" class="form-control" name="email" placeholder="voorbeeld@email.com">
                                <span class="input-group-btn"><button class="btn btn-primary" type="button"
                                                                      id="btn-subscribe-newsletter"
                                                                      data-nonce="<?php echo $nonce; ?>"><i
                                                class="fa fa-spinner fa-spin"></i><span>Aanmelden</span></button></span>
                            </div>
                            <div class="alert"></div>

                        </form>
                    </div>
                <?php
                else :
                    ?>
                    <div class="newsletter">
                        <h3 class="footer-heading">Newsletter</h3>
                        <p>Stay up-to-date by subscribing to our newsletter.</p>
                        <!--                            <p>Get the latest update from us by subscribing to our newsletter.</p>-->
                        <form class="newsletter-form" method="POST">

                            <?php $nonce = wp_create_nonce("subscribe_newsletter_nonce"); ?>

                            <div class="input-group input-group-lg">
                                <input type="email" class="form-control" name="email" placeholder="voorbeeld@email.com">
                                <span class="input-group-btn"><button class="btn btn-primary" type="button"
                                                                      id="btn-subscribe-newsletter"
                                                                      data-nonce="<?php echo $nonce; ?>"><i
                                                class="fa fa-spinner fa-spin"></i><span>Subscribe</span></button></span>
                            </div>
                            <div class="alert"></div>

                        </form>
                    </div>
                <?php endif; ?>
                <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer-right')) : else : ?>
                <?php endif; ?>
                <!-- END COLUMN 3 -->
            </div>
        </div>
    </div>
    <!-- COPYRIGHT -->
    <div class="text-center copyright"><?php echo $repute_options['rpt-copyright']; ?></div>
    <!-- END COPYRIGHT -->
</footer>
<!-- END FOOTER -->
</div>
<!-- END WRAPPER -->

<div class="back-to-top">
    <a href="#rpt-top"><i class="fa fa-angle-up"></i></a>
</div>

<?php
echo $repute_options['rpt-tracking-code'];

if ($repute_options['rpt-navigation'] == 'nav-fixed') :
    ?>
    <script type="text/javascript">
			jQuery(document).ready( function() {
				var navbar = jQuery('.navbar');
				navbar.css('top', 0);
				jQuery('.wrapper').css('padding-top', navbar.outerHeight());
			});


    </script>
<?php

elseif ($repute_options['rpt-navigation'] == 'nav-auto-hiding') :

    ?>
    <script type="text/javascript">
			jQuery(document).ready( function() {
				var navbar = jQuery('.navbar');
				navbar.addClass('auto-hiding-initialized navbar-fixed-top').autoHidingNavbar();
				jQuery('.wrapper').css('padding-top', navbar.outerHeight());

				// if wpadminbar exist
				if(jQuery('#wpadminbar').length > 0) {
					jQuery('.navbar').css('padding-top', jQuery('#wpadminbar').outerHeight());
				}
			});


    </script>

<?php

elseif ($repute_options['rpt-navigation'] == 'nav-fixed-shrink') :

    ?>

    <script type="text/javascript">
			jQuery(document).ready( function() {
				jQuery('.wrapper').css('padding-top', jQuery('.navbar').outerHeight());
				// if wpadminbar exist
				if(jQuery('#wpadminbar').length > 0) {
					jQuery('.navbar').css('padding-top', jQuery('#wpadminbar').outerHeight());
				}

				jQuery(window).scroll(function() {
					if(jQuery(document).scrollTop() > 300) {
						jQuery('.navbar-fixed-top').addClass('shrink-active');
					}else {
						jQuery('.navbar-fixed-top').removeClass('shrink-active');
					}
				});
			});


    </script>

<?php

endif;

wp_footer();
?>

</body>
</html>
