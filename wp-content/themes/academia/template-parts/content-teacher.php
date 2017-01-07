<?php

$teachers = get_post_meta( $post->ID, '_tx_teacher_meta', true ); ?>

<li>
    <div class="at-inner">
        <figure class="wow fadeIn animated">
            <?php
            if( has_post_thumbnail() ){
                $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>

                <img src="<?php echo esc_url($feat_image_url ); ?>" alt="<?php the_title(); ?>" class="square img-responsive">

            <?php } ?>

            <figcaption>
                <h4><?php the_title(); ?></h4>
                <?php if(!empty($teachers['_tx_teacher_designation'])) {
                    echo '<h5>' . esc_html( $teachers['_tx_teacher_designation'] ) . '</h5>';
                }?>
            </figcaption>
        </figure>
        <div class="team-body">
            <a href="<?php the_permalink() ?>"><h4><?php the_title(); ?></h4></a>
            <?php if(!empty($teachers['_tx_teacher_designation'])) {
                echo '<h5>' . esc_html( $teachers['_tx_teacher_designation'] ) . '</h5>';
            }?>
            <div class="at-desc"> <?php echo wp_trim_words(get_the_content(), 10, '...'); ?> </div>
            <?php if(!empty($teachers['_tx_teacher_social_fb']) || !empty($teachers['_tx_teacher_social_tw']) || !empty($teachers['_tx_teacher_social_ln']) || !empty($teachers['_tx_teacher_social_gplus'])): ?>
                <div class="at-social">
                    <?php if(!empty($teachers['_tx_teacher_social_fb'])): ?>
                        <a href="<?php echo esc_url($teachers['_tx_teacher_social_fb']); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                    <?php endif; ?>
                    <?php if(!empty($teachers['_tx_teacher_social_tw'])): ?>
                        <a href="<?php echo esc_url($teachers['_tx_teacher_social_tw']); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                    <?php endif; ?>
                    <?php if(!empty($teachers['_tx_teacher_social_ln'])): ?>
                        <a href="<?php echo esc_url($teachers['_tx_teacher_social_ln']); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                    <?php endif; ?>
                    <?php if(!empty($teachers['_tx_teacher_social_gplus'])): ?>
                        <a href="<?php echo esc_url($teachers['_tx_teacher_social_gplus']); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</li>