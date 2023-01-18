<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 footer-left">
                <?php
                if (is_active_sidebar('footer-left')) {
                    dynamic_sidebar('footer-left');
                }
                ?>
            </div>
            <div class="col-md-6 footer-right">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footermenu',
                        'menu_id' => 'footermenu-container',
                        'menu_class' => 'footer-nav-menu list-inline text-center',
                    )
                )

                ?> </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>

</html>