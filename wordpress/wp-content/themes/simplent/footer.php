        </div><!-- .site-content -->

        <footer id="colophon" class="site-footer" role="contentinfo">
            <div class="site-info container">
            <?php /* translators: %s: WordPress */ ?>
                <a href="<?php echo esc_url( esc_attr__( 'https://wordpress.org/', 'simplent' ) ) ?>"><?php printf( esc_attr__( 'Proudly powered by %s', 'simplent' ), 'WordPress' ); ?></a>

                <?php /* translators: %s: theme author */ ?>
                <a class="theme-credit" href="<?php echo esc_url( esc_attr__( 'https://abdulrafay.me/', 'simplent' ) ) ?>" target="_blank"><?php printf( esc_attr__( '%1$s Theme by %2$s', 'simplent'), 'Simplent', 'Rafay' ); ?></a>
            </div>
        </footer>

    </div><!-- site-inner -->
</div><!-- site -->

<?php wp_footer(); ?>
</body>
</html>