<main>
<?php get_header(); ?>
<div class="page__title">
    <h1 class="text-left"><?php echo the_title(); ?></h1>
    <!-- <div class="b-meta-line"></div> -->
</div>

<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>

  <!-- loop content -->
  <article <?php post_class(); ?>>
      <?php /* Image Url */
          $image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
      ?>
      <?php if($image_attributes != '') {?>
            <img class="img__post__preview img-res img-up" src="<?php echo $image_attributes[0];  ?>" alt="<?php the_title(); ?>">
      <?php } ?>
      <?php the_content(); ?>

  </article>

<?php endwhile; ?>
<?php else : ?>
<?php endif; ?>

<?php //if (!is_page(150) && !is_page(67)) { ?>
    <?php //get_sidebar(); ?>
<?php //} ?>

</main>
<?php get_footer(); ?>
