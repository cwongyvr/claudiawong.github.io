<?php
/**
 * Template Name: About Page
 *
 * @package silva
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php  
                $header_image_1 = get_field('header_image_1');
                $header_image_2 = get_field('header_image_2');
                $title = get_field('title');
                $title_description = get_field('title_description');
                $description = get_field('description');

                
                if($header_image_1) {
                    echo "<div class='header' style='background-image: url(".$header_image_1['url'].")'></div>";
                ?>

                  
                <?php
                }
                echo "<div class='wrap'>";
                the_content();
                echo "</div>";
                if($header_image_2) {
                     echo "<div class='header' style='background-image: url(".$header_image_2['url'].")'></div>";
                ?>
                  
                <?php
                }
                
                ?>
                <div class="wrap">
                    <div class="about-detail1 left">
                    <?php 
                        if ($title) {
                            echo  "<h2>".$title. "</h2>";
                        }
                        if ($title_description){
                            echo "<p>".$title_description."</p>";
                        }
                    ?>
                    </div>
                    <div class=" left">
                    <?php 
                        if ($description) {
                            echo "<p>".$description."</p>";
                        }
                    ?>
                    </div>
                    <div class="left">
                    <?php
                        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                            the_post_thumbnail();
                        } 
                    ?>
                    </div>
                </div> <!-- .wrap -->


            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
