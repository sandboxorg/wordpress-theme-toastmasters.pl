<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head() ?>
</head>

<body <?php body_class( 'page-body' ) ?>>

<div class="page-header-container">
<header class="page-element page-header">
    <?php
        wp_nav_menu( array(
            'theme_location' => 'organization-breadcrumb',
            'menu_class' => 'page-header__organization-breadcrumb organization-breadcrumb',
            'container' => false,
            'depth' => 1,
            'walker' => new Customizable_Walker_Nav_Menu(),
            'items_wrap' => '<span class="%2$s">%3$s</span>',
            'customizable_before_item' => '<span class="organization-breadcrumb__item">',
            'customizable_after_item' => '</span>',
            'customizable_link_class' => 'organization-breadcrumb__link',
         ) );
    ?>

    <div class="page-header__site-name"><?php bloginfo( 'name' ) ?></div>

    <?php toastmasterspl_the_custom_logo( 'page-header__site-logo' ) ?>
</header>
</div>

<main class="page-element page-content">
    <div class="page-content__main">
        <?php
            while ( have_posts() ) : the_post();
        ?>
        <header class="page-content__article-header article-header<?php if ( has_post_thumbnail() ): ?> article-header--featured-image<?php endif ?>">
            <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'post-thumbnail', [ 'class' => 'article-header__image' ] );
                }
            ?>
            <?php the_title( '<h1 class="article-header__title">', '</h1>' ) ?>
        </header>
        <article class="page-content__article-text article-text">
            <?php the_content() ?>
        </article>
        <?php endwhile; // have_posts() ?>
    </div>

    <?php if ( is_active_sidebar( 'sidebar-page-content' )  ) : ?>
    <div class="page-content__aside">
        <?php dynamic_sidebar( 'sidebar-page-content' ); ?>
    </div>
    <?php endif; ?>
</main>

<div class="page-footer-container">
<footer class="page-element page-footer">
    <div class="page-footer__social-links social-links">
        <a href="https://www.facebook.com/ToastmastersPolskaPL/" class="social-links__link"><i class="fa fa-fw fa-facebook"></i><span class="social-links__text">Facebook</span></a>
        <a href="#" class="social-links__link"><i class="fa fa-fw fa-twitter"></i><span class="social-links__text">Twitter</span></a>
        <a href="#" class="social-links__link"><i class="fa fa-fw fa-youtube"></i><span class="social-links__text">YouTube</span></a>
    </div>

    <p class="page-footer__copyright">
        <?php echo get_theme_mod( 'copyright_text' ) ?>
        This <a href="http://www.wordpress.org">WordPress</a> template is freely <a href="https://github.com/mpaluchowski/wordpress-theme-toastmasters.pl">available on <i class="fa fa-github"></i> GitHub</a> under the Apache License, Version 2.0. Make something cool.</p>
</footer>
</div>

<div class="page-navigation-container" id="page-navigation">
<nav class="page-element page-navigation">
    <?php
        wp_nav_menu( array(
            'theme_location' => 'page-navigation',
            'container' => false,
            'depth' => 1,
            'items_wrap' => '%3$s',
            'walker' => new Customizable_Walker_Nav_Menu(),
            'customizable_link_class' => 'page-navigation__link',
            'customizable_link_class_current' => 'page-navigation__link--current',
            'customizable_link_icons' => [
                1 => 'home'
            ],
            'customizable_icon_class' => 'page-navigation__link--icon',
            'customizable_text_class' => 'page-navigation__link-text',
         ) );
    ?>
</nav>
</div>

<div class="page-navigation-link-container">
<div class="page-element page-navigation-link">
    <a href="#page-navigation" class="page-navigation-link__link"><i class="fa fa-bars"></i></a>
</div>
</div>

<?php wp_footer() ?>

</body>

</html>
