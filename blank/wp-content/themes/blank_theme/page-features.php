<?php
/**
 * Template Name: Feature Page
 *
 * @package silva
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php 
                $header = get_field('header_image');
                $header_title = get_field('header_title');
                $header_text = get_field('header_text');
                if($header) {
                echo "<div class='header' style='background-image: url(".$header['url']."); background-repeat: no-repeat;'>";

                    if ($header_title) {
                        echo "<div class='wrap'>";
                    ?>
                    <div class="header-title"><?php echo $header_title; ?></div>
                    <?php
                    } 
                    if ($header_text) {
                    ?>
                    <div class="header-text"><?php echo $header_text; ?></div>
                    <?php
                    echo "</div>"; //.wrap
                    }
                echo "</div>"; //.header
                }
                
                
                /* FEATURE PAGE */
                $feature_details = get_field('feature_details');
                if($feature_details) {
                echo "<div class='wrap'>"; 
                the_title( '<h1>', '</h1>' ); 
                    echo "<div class='feature-details'>";
                    foreach( $feature_details as $feature_detail ) {      
                            echo "<div class='left'>";   
                            echo "<div class='custom-table'>".$feature_detail['feature_title']."</div>";
                            echo "<div class='hindRegular-text'>".$feature_detail['feature_description']."</div>";
                            echo "</div>";     
                    }
                    echo "</div>";
                
                    $feature_values = get_field('feature_values');
                    if($feature_values) {
                        echo "<div class='values'>";
                        foreach( $feature_values as $feature_value ) {      
                                echo "<div class='left'>";   
                                echo "<h3>".$feature_value['title']."</h3>";
                                echo "<div class='hindRegular-text'>".$feature_value ['description']."</div>";
                                echo "</div>";     
                        }
                        echo "</div>";
                       
                    }
                    echo "</div>"; //.wrap   
                    $fireproofing_bg_image = get_field('fireproofing_background_image');
                    $title = get_field('title');
                    $description = get_field('description');
                    $flame_spread_index = get_field('flame_spread_index');
                    $smoke_index = get_field('smoke_index');
                    echo "<div class='fireproofing' style='background-image: url(".$fireproofing_bg_image['url'].")'>";
                        echo "<div class='wrap'>";
                            echo "<div class='fireproof-icon'><h3>".$title."</h3></div>";
                            echo "<div class='hindLight-brown'>".$description."</div>";
                            echo "<div class='spread-smore-index'>";
                                echo "<table>";
                                echo "<tr>";
                                echo "<th> Flame Spread Index </th>";
                                echo "<th> Smoke Develop Index </th>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td class='sinkinSans200Red'>".$flame_spread_index."</td>";
                                echo "<td class='sinkinSans200Red'>".$smoke_index."</td>";
                                echo "</tr>";
                                echo "</table>";
                            echo "</div>";
                            echo "<div class='button'><a href='#'>See the Results</a></div>";
                echo "</div>"; //.wrap 
                }
                     
                /* DOWNLOAD PAGE */
                else { 
                    echo "<div class='resource-section'>";
                        echo "<div class='wrap'>";
                             
                            echo "<div class='left'>";
                            the_title( '<h1>', '</h1>' );
                            echo "<h2>Various resources available</h2></div>";
                            echo "<div class='left'>";
                            $downloads = get_field("downloads");
                            if($downloads){
                                foreach($downloads as $download){
                                    echo "<div class='resource'><a href='".$download['download_link']."'><span class='red'><i class='fa fa-file-pdf-o'></i></span><span class='red'>".$download['download_label']."</span></a></div>";
                                }
                            }
                            echo "</div>"; //.left
                            echo "<div class='hindRegular-text'>Please <a class='underlined' href='/contact' title='Contact Silva Panel'>contact us</a> for the AutoCAD and Word document versions for the Silva Specifications.</div>";
                          echo "</div>"; //.wrap
                    
                        $partners = get_field('partners');
                        if($partners) {   
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
                    echo "</div>"; //.resource-section  
                }           
               
                ?>

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
