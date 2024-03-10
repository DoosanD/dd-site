 <?php

$fields = get_fields('');
$option = get_fields('option');
?>
<div class="d-sidebar-form">
    <h3 class="d-side-fotitle">Get Free Moving Quote</h3>
    <div class="d-sidebar-form-wrap">
        <?php
        echo do_shortcode(
            '[gravityform id="1" title="false" description="false" ajax="true"]'
        );
        ?>
    </div>
</div>
<div class="d-sidebar-menu">
    <h3>Services</h3>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'menu-2',
        'menu_id'        => 'Sidebar',
    ));
    ?>
</div>

<?php if (is_page(array($blog)) or is_singular('post') or is_archive()) {  ?>

    <div class="category-sidebar-menu">

        <?php

        $cats = get_categories();

        if (!empty($cats)) {

            echo '<h3>Categories</h3>';

            foreach ($cats as $cat) {

                $cat_link = get_category_link($cat->term_id);
                echo '<p><a href="' . $cat_link . '" class="d-cat-link">' . $cat->name . '</a></p>';
            }
        }

        ?>

    </div>
<?php } ?>

<!-- Call sidebar with :  -->
<!--<div class="d-inner-right col-xs-12 col-md-4">
    <//?php get_template_part('template-parts/content', 'sidebar'); ?>
</div>-->
