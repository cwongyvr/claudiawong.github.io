<?php
/**
 * Template Name: Page Header Image
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
                    echo "<div class='header' style='background-image: url(".$header['url'].")'>&nbsp;";

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
                }
                echo "</div>"; //.header

                echo "<div class='wrap'>"; 
                the_title( '<h1>', '</h1>' ); 
                the_content();

                //If a table was created using custom field for 5 columns table
                $table_5_columns = get_field('table_5_columns');
                if($table_5_columns) {
                    echo "<table class='custom-table'>";
                    echo "<thead><tr>";
                    foreach( $table_5_columns as $table_5_column ) {
                            echo "<th class='custom-table'>";
                            echo $table_5_column['table_heading'];
                            echo "</th>";
                           
                    }
                    echo "</tr></thead>";
                    echo "<tdbody><tr class='custom-table-desc'>";
                     foreach( $table_5_columns as $table_5_column ) {
                            echo "<td data-content='";
                            echo $table_5_column['table_heading'];
                            echo "'>";
                             echo $table_5_column['table_text'];
                            echo "</td>";      
                    }
                    echo "</tr></tbody>";
                    echo "</table>";
                   
                }
                echo "</div>"; //.wrap   
            ?>


            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
