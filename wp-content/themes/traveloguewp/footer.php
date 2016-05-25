<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package travelogue
 */

        global $travelogue_redux_options;
        $back_to_top = esc_attr( $travelogue_redux_options['back_to_top'] );
        $travelogue_seo_analytics = $travelogue_redux_options['travelogue_seo_analytics']; ?>

        <!-- Back to top button -->
        <?php if ($back_to_top == 1) { ?>
             <a href="#0" class="back-to-top"><?php echo __('Top','travelogue'); ?></a>
        <?php } ?> 

        </div>

        <script>
          /*Google Analytics*/
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', '<?php echo $travelogue_seo_analytics; ?>', 'auto');
          ga('send', 'pageview');

        </script>
        
        <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 1008623479;
        var google_custom_params = window.google_tag_params;
        var google_remarketing_only = true;
        /* ]]> */
        </script>
        <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
        <noscript>
          <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1008623479/?value=0&amp;guid=ON&amp;script=0"/>
          </div>
        </noscript>

        <?php wp_footer(); ?>
        <!-- Begin: Custom Javascript Code - From Theme Options -->
        <script type="text/javascript">
        <?php echo esc_attr( $travelogue_redux_options['php-code'] ); ?>
        </script>
        <!-- End: Custom Javascript Code - From Theme Options -->
    </body>
</html>