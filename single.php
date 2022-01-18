<?php get_header(); ?>
<div class="post__title">
    <div class="inside__post__title">
        <div class="category__container" ><?php the_category(' '); ?></div>
        <h1 class="text-left" ><?php echo the_title(); ?></h1>
        <div class="info__post__title">
        <p class=""> <?php
            global $post;
            $author_id = $post->post_author;
            echo "By: <b>". get_the_author_meta( 'nickname',$author_id) ."</b>" ?></p>
            <p ><i class="far fa-calendar-alt" style="font-size:24px; margin-right:4px;"></i><?php the_time(' j M Y'); ?></p>
        </div>
    </div>
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
      <?php the_tags('', ', ',''); ?>

      <div class="comments">
          <?php comments_template(); ?>
      </div>

  </article>

<?php endwhile; ?>

<?php else : ?>

<?php endif; ?>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>
