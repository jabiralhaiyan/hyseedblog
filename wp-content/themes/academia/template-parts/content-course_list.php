<div class="col-xs-12 col-sm-6 course-item-list">
    <div class="shadow-box">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <figure>
                    <a href="<?php the_permalink(); ?>">
                        <div class="display-block">
                            <?php
                            if( has_post_thumbnail() ){
                                $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>

                                <img src="<?php echo esc_url($feat_image_url ); ?>" alt="<?php the_title(); ?>" class="img-responsive">

                            <?php } ?>
                        </div>
                    </a>
                </figure>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="media-body">
                    <h3 class="media-heading">
                        <a class="acourse-title " href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 4, '...' ); ?></a></h3>
                    <div class="course-introtext"> <?php the_excerpt(); ?> </div>
                    <p>
                        <a class="course-readmore  text-uppercase" href="<?php the_permalink(); ?>">
                            <strong><?php esc_html_e('Read More', 'academia'); ?></strong>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>