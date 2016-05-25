<?php  global $smof_data; ?>
<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); ?>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="mes_blog_item_holder">
        	 <div class="mes_blog_head ">
            	<h2 class="mes_blog_post_title_inner"><?php the_title();?></h2>
                <div class="mes_blog_meta">
                	<?php the_time('d F Y') ?>,&nbsp;&nbsp;
                    By <?php the_author_posts_link() ?>,&nbsp;&nbsp;
                    <a href="<?php the_permalink() ?>#comments"><?php comments_number('0','1','%')?>  <?php echo __("Comments","mestowabo")?></a>
                </div>
            </div>
            
            <div class="mes_post_format_content">
                 <div class="mes_post_format_content">
					<?php echo get_post_meta($post->ID, '_format_video_embed', true); ?>
                </div>
            </div>
            
            <div class="mes_blog_item_content">
            	<div class="mes_blog_item_main_content">
					<?php the_content('<div class="mes_read_more text-center"><a class="mes_readmore_btn" href="'. get_permalink($post->ID) . '">'. __(" Read More","mestowabo") .'</a></div>'); ?>
            	</div>
            </div>
        </div>
	</div>
</div>











