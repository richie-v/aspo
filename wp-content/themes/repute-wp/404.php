<?php get_header(); ?>

    <!-- PAGE CONTENT -->
    <div class="page-content page-error text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1>404</h1>
                    <h2><?php $currentlang = get_bloginfo('language');
                        if ($currentlang === 'nl'): ?>OEPS! PAGINA NIET GEVONDEN<?php else: ?>OOPS! PAGE NOT FOUND<?php endif ?></h2>
                    <hr/>
                    <div class="error-description">
                        <?php $currentlang = get_bloginfo('language');
                        if ($currentlang === 'nl'): ?>
                            <p>De pagina die u wilde bezoeken, kan niet worden gevonden.</p>
                        <?php else: ?>
                            <p>The page you were looking for could not be found, use search form below to find the page
                                you are looking for</p>
                        <?php endif ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT -->

<?php get_footer(); ?>