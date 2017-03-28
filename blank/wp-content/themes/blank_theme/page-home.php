<?php
/**
 * Template Name: HomePage
 *
 * @package silva
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php /*Slider */ ?>
            <?php if( have_rows('slider') ): ?>
                <div class="slider-wrapper">
                    <?php $counter = 0; ?>
                    <?php while ( have_rows('slider') ) : the_row(); ?>
                        <div class="slide" style="background-image: url(<?php the_sub_field('image'); ?>); ">
                            <?php if (get_sub_field('tagline')):?>
                                <p class="wrap slide-text"><?php the_sub_field('tagline'); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                    <div class="slide-arrows">
                        <div class="slide-prev"></div>
                        <div class="slide-next"></div>
                    </div>
                    <div class="slide-marker-wrapper">
                        
                        <?php while ( have_rows('slider') ) : the_row(); ?>
                            <div class="slide-marker"></div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php while ( have_posts() ) : the_post(); ?>

             <?php 
          
             the_content(); 
             ?>
                <?php  
                $call_to_actions = get_field('ctas');
                $award_details = get_field('award_details');
                $partners = get_field('partners');
                if($call_to_actions) {
                ?>
                
                <div id="ctas">
                    <?php
                        foreach($call_to_actions as $call_to_action) {
                            echo "<a href='".$call_to_action['cta-link']."'>";
                            echo "<div class='cta overlay' style='background-image: url(".$call_to_action['cta-image'].")'>";
                            
                            if($call_to_action['cta-title']!='') {
                                echo "<h2>".$call_to_action['cta-title']."</h2>"; 
                            }
                            
                            if($call_to_action['cta-description']!='') {
                                echo "<p>".$call_to_action['cta-description']."</p>";
                            }
                            
                            echo "</div>";
                            echo "</a>";
                        }
                    
                     ?>
                 </div><!-- #ctas -->
                 <?php 
                }
                if($award_details) {
                ?>
                <div id="award">
                    <?php
                        foreach($award_details as $award_detail) {
                            echo "<div>";
                            if($award_detail['award_image']!=''){
                                echo "<img src='".$award_detail['award_image']."' alt='Silva Award'/>";
                            }
                            if($award_detail['award_title']!=''){
                                echo "<h2>".$award_detail['award_title']."</h2>";
                            }
                            if($award_detail['award_detail_text']!=''){
                                echo "<span class='hindLight-brown'>".$award_detail['award_detail_text']."</span>";
                            }
                            echo "</div>";
                        }
                        
                        ?>
                 </div> <!-- #award -->       
                <?php
                }

                if($partners){   
                ?>
                <div id="partners">
                    <?php
                    echo "<div class='partner'>";
                    foreach ($partners as $partner) {
                        
                        if($partner['partners_logo']!=''){
                            echo "<img src='".$partner['partners_logo']."' alt='".$partner['logo_alt']."'/>";
                        }
                        
                    }
                    echo "</div>";
                    ?>
                </div> <!-- #partners -->
                <?php
                }
                
            ?>


            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
