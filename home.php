<?php //Blog page ?>

<?php get_header(); ?>
    <main>
    <div class="page__title">
        <h1 class="text-left">Blog</h1>
    </div>

    <?php
        $pagina_attuale = (get_query_var( 'paged'))? get_query_var( 'paged') : 1 ;

        $args = array(
            'post_type' => 'post',
            'paged' => $pagina_attuale
        );

        $query = new WP_Query($args);

    ?>

    <div class="page_container_posts_blog">
        <?php if ($query->have_posts()) :?><?php while($query->have_posts()) : $query->the_post(); ?>
          <!-- loop content -->

              <article class="post_preview">
                  <?php /* Image Url */
                      $image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
                  ?>
                  <div class="header__post__preview">
                      <a href="<?php the_permalink(); ?>">
                           <img class="img__post__preview" src="<?php echo $image_attributes[0];  ?>" alt="<?php the_title(); ?>">
                      </a>
                      <a href="<?php the_permalink(); ?>"><h3><?php the_title();?></h3></a>
                      <?php the_excerpt(); ?>
                  </div>
                  <div class="post__preview_info">


                      <div class="container__cta__leggi">
                          <a class="cta__leggi" href="<?php the_permalink(); ?>">
                              Leggi <i class="fas fa-long-arrow-alt-right" style="font-size:24px"></i>
                          </a>
                      </div>
                  </div>

              </article>

        <?php endwhile; ?>
        <div class="text-center pagination">
            <?php echo paginate_links(array('total' => $query->max_num_pages));?>
        </div>

        <?php else : ?>
          <p class="text-center"><?php esc_html_e('Sorry, no posts matched your criteria.', 'slug-theme'); ?></p>
        <?php endif; ?>

    </div>
</main>
<?php get_footer(); ?>
