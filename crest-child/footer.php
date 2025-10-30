<?php
/**
 * Theme footer
 *
 * @package Postali Parent
 * @author Postali LLC
 */
?>
<footer>

    <section class="footer no-pad">
        <div class="footer-top">
            <div class="columns">
                <div class="column-full">
                    <?php the_custom_logo(); ?>
                    <div class="lets-connect">
                        <p><strong>Let’s Connect.</strong></p>
                        <?php echo do_shortcode('[phone]'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="columns">
                <div class="column-25 block">
                    <p><strong>Contact</strong></p>
                    <p>
                        <a href="tel:<?php the_field('global_phone','options'); ?>"><?php the_field('global_phone','options'); ?></a><br>
                        <a href="mailto:<?php the_field('global_email','options'); ?>"><?php the_field('global_email','options'); ?></a>
                    </p>
                    <div class="spacer-15"></div>
                    <div class="footer-social">
                        <?php if(get_field('social_facebook','options')) { ?> <a href="<?php the_field('social_facebook','options'); ?>" target="blank"><span class="icon-icon-facebook"></span></a> <?php } ?>
                        <?php if(get_field('social_instagram','options')) { ?> <a href="<?php the_field('social_instagram','options'); ?>" target="blank"><span class="icon-icon-instagram"></span></a> <?php } ?>
                        <?php if(get_field('social_linkedin','options')) { ?> <a href="<?php the_field('social_linkedin','options'); ?>" target="blank"><span class="icon-icon-linkedin"></span></a> <?php } ?>
                        <?php if(get_field('social_youtube','options')) { ?> <a href="<?php the_field('social_youtube','options'); ?>" target="blank"><span class="icon-icon-youtube"></span></a> <?php } ?>
                    </div>
                </div>
                <div class="column-25 block menu">
                    <p><strong>Quick Links</strong></p>
                    <nav role="navigation">
                    <?php
                        $args = array(
                            'container' => false,
                            'theme_location' => 'footer-nav-quick'
                        );
                        wp_nav_menu( $args );
                    ?>	
                    </nav>
                </div>
                <div class="column-25 block menu">
                    <p><strong>Services</strong></p>
                    <nav role="navigation">
                    <?php
                        $args = array(
                            'container' => false,
                            'theme_location' => 'footer-nav-services'
                        );
                        wp_nav_menu( $args );
                    ?>	
                    </nav>
                </div>
                <div class="column-25 block menu">
                    <p><strong>Location</strong></p>
                    <p>
                    <?php the_field('global_address','options'); ?>
                    </p>
                    <div class="spacer-15"></div>
                    <iframe src="<?php the_field('map_embed','options'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <?php if(is_page_template('front-page.php')) { ?>
                        <a href="https://www.postali.com/?utm_source=gregvincent&utm_medium=footer&utm_campaign=client-sites">
                            <img src="/wp-content/uploads/2025/05/postali-tag.png" alt="Postali | Results Driven Marketing" style="max-width: 225px; margin-top: 20px;">
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <div class="disclaimer">
        <p><?php the_field('disclaimer', 'options'); ?></p>
        <div class="inner-wrapper">
        <p>© <?php echo date('Y') . ' ' . get_field('copyright_text', 'options'); ?></p>
        <span>|</span>
        <?php if( have_rows('utility_links', 'options') ) : $count = 0; $links_count = count(get_field('utility_links', 'options')); ?>
            <div class="utility-links">
                <?php while( have_rows('utility_links', 'options') ) : the_row(); $link = get_sub_field('link'); $count++; ?>
                    <a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a> <?php echo $count < $links_count ? '<span>|</span>' : ''; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        </div>
    </div>

</footer>

<!-- Callrail -->
<script type="text/javascript" src="//cdn.callrail.com/companies/591538603/d98032b68de27676a4f0/12/swap.js"></script> 
<!-- /Callrail -->


<?php wp_footer(); ?>

</body>
</html>