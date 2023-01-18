<?php get_header();
?>
<?php get_template_part('/template-parts/common/hero') ?>

<div class='posts'>
    <?php
    while (have_posts()) {
        the_post();
    ?>
        <div class='post' <?php post_class(); ?>>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-12'>
                        <?php
                        if (!is_single()) {
                        ?>
                            <a href='<?php the_permalink(); ?>'>
                                <h2 class='post-title'><?php the_title(); ?></h2>
                            </a>
                        <?php
                        } else {
                        ?>
                            <h2 class='post-title'><?php the_title(); ?></h2>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-4'>
                        <p>
                            <strong>Author: <?php the_author(); ?></strong>
                            <br />
                            <?php the_date(); ?>
                        </p>
                        <?php echo ucfirst(get_the_tag_list("<ul class='list-unstyled'><li>", '</li><li>', '</li></ul>'));
                        ?>
                    </div>
                    <div class='col-md-8'>
                        <?php
                        if (!is_single()) {
                        ?>
                            <a href='<?php the_permalink(); ?>'>
                                <p>
                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('full', array('class' => 'img-fluid'));
                                    }
                                    ?>
                                </p>
                            </a>
                        <?php
                        } else {
                        ?>
                            <p>
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('full', array('class' => 'img-fluid'));
                                }
                                ?>
                            </p>
                        <?php
                        }
                        ?>
                        <?php
                        if (is_single()) {
                            the_content();
                        } else {
                            the_excerpt();
                        }
                        ?>

                    </div>
                </div>

            </div>
        </div>

    <?php
    }
    ?>
</div>

<div class='container mb-5'>
    <hr>
    <div class='row'>
        <div class='col-md-4'></div>
        <div class='col-md-8'>
            <?php
            the_posts_pagination(array(
                'screen_reader_text' => ' ',
            ))
            ?>
        </div>
    </div>
</div>

<?php get_footer();
?>