<?php
  $home_url       = get_home_url('', '/', '');
  $has_tags       = has_tag();
  $has_categories = has_category();
  $categories     = get_the_category( $post->ID );
  $author_bio     = get_the_author_meta( 'description', $post->post_author );
  $thumbnail      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];
  $has_thumbnail  = !empty( $thumbnail );
  $col_class      = $has_thumbnail ? 'col-sm-7': 'col-sm-12';
?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="sas-breadcrumb">
        <span><a class="crumb" href="<?php _e( $home_url );?>">Home</a></span><i class="fa fa-angle-right"></i>
        <span><a class="crumb" href="<?php _e( $home_url.'blog/' );?>">Blog</a></span><i class="fa fa-angle-right"></i>
        <span><?php the_title(); ?></span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="<?php _e( $col_class ); ?>">
      <div class="sas-single-post-header">
        <span class="meta">
          <?php if( is_array( $categories ) && count( $categories ) ) : ?>
            <strong><?php _e( $categories[0]->name ); ?></strong> |
          <?php endif;?>
          <?php the_time( 'F j, Y' );?></span>
        <h1 class="post-title"><?php the_title();?></h1>
        <span class="meta text-capitalize">By <?php the_author();?></span>
      </div>
    </div>
    <?php if( $has_thumbnail ): ?>
      <div class="col-sm-5">
        <div class="featured-img orbit-thumbnail-bg" style="background-image:url(<?php _e( $thumbnail ); ?>);"></div>
      </div>
    <?php endif;?>
  </div>
  <div class="row">
    <div class="col-sm-8 col-left">
      <div class="post-content">
        <?php the_content();?>
        <hr/>
      </div>
      <?php if( strlen( $author_bio ) > 0 ): ?>
        <div class="single-post-author-box">
          <p><span>About the author:</span> <?php echo get_the_author_meta( 'description', $post->post_author ); ?></p>
          <hr/>
        </div>
      <?php endif; ?>
      <?php if( $has_categories || $has_tags ): ?>
        <div class="post-taxonomy">
          <?php if( $has_categories ):?>
            <p class="post-categories"><span>Categories:</span> <?php the_category( ', ', '', '' ); ?></p>
          <?php endif;?>
          <?php if( $has_tags ):?>
            <p class="post-tags"><span>Tags:</span> <?php the_tags( '', ', ', '' ); ?></p>
          <?php endif;?>
          <hr/>
        </div>
      <?php endif;?>
    </div>
    <div class="col-sm-4 col-right">
      <?php if ( is_active_sidebar( 'sas-single-post-sidebar' ) ) { dynamic_sidebar( 'sas-single-post-sidebar' ); } ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <?php get_template_part( 'partials/post/related-posts' ); ?>
    </div>
  </div>
</div>
