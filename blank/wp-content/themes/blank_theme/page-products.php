<?php
/**
 * Template Name: Products Page
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
                    echo "<div class='header' style='background-image: url(".$header['url'].")'>";

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
                
                echo "<div class='wrap'>"; 
                the_title( '<h1>', '</h1>' ); 
                $product_grades = get_field('product_grades');
                if($product_grades) {
                    echo "<h2>Grades</h2>";
                   
                    echo "<table class='custom-table'>";
                    echo "<thead><tr>";
                    foreach( $product_grades as $product_grade ) {
                            echo "<th class='custom-table'>";           
                            echo $product_grade['grade_type'];
                            echo "</th>";       
                    }
                    echo "</tr></thead>";
                    echo "<tdbody><tr class='custom-table-desc'>";
                    foreach( $product_grades as $product_grade ) {
                            echo "<td data-content='";
                            echo $product_grade['grade_type'];
                            echo "'>";
                            echo $product_grade['grade_description'];
                            echo "</td>";      
                    }
                    echo "</tr></tbody>";
                    echo "</table>";
                   
                }
                $panel_sizes = get_field('product_panel_sizes');
                if($panel_sizes){
                   
                    echo "<h2>Panel Sizes</h2>";
                    echo "<table class='panel-size'>";
                   
                    foreach ($panel_sizes as $panel_size) {
                        echo "<tr>";
                        if($panel_size['size_1']){
                            echo "<td>".$panel_size['size_1']."</td>";
                        }
                        
                        if($panel_size['size_2']){
                           
                            echo "<td>".$panel_size['size_2']."</td>";
                        }
                        if($panel_size['size_3']){
                            
                            echo "<td>".$panel_size['size_3']."</td>";
                        }
                        echo "</tr>";
                   
                    }
                    
                    echo "</table>"; //.panel-size
                }   
                
                $panel_desc = get_field('panel_description');
                if($panel_desc) {
                    echo "<div class='hindLight-text'>".$panel_desc."</div>";
                }
                $product_info_details_sections = get_field('product_info_details_section');
                if($product_info_details_sections){
                    echo "<div id='product-info-details'>";
                    foreach ($product_info_details_sections as $product_info_details_section) {
                        echo "<div class='left'>";
                            echo "<h3>".$product_info_details_section['heading']."</h3>";
                            echo "<div class='hindlight-brown'>".$product_info_details_section['sub_heading']."</div>";
                            echo "<div class='hindLight-text'>".$product_info_details_section['description']."</div>";
                        echo "</div>";
                    }
                    echo "</div>";//#product-info-details
                }
                echo "<span class='red'>Silva Panel Canada will be pleased to discuss and assist with certified, on-site installations.</span><br>";
                echo "<div class='installer'><a href='http://www.townemillwork.ca/' title='Towne Millwork' target='_blank'>";
                echo "<span class='red'>Looking for Installer? Contact a Certified Installer</span>";
                ?>
                    <img src='<?php bloginfo('template_url')?>/images/towne.jpg' />
                <?php 
                echo "</a></div>";
                echo "</div>"; //.wrap   


                ?>




            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
