<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package arsim
 */


$teacher_meta = get_post_meta( get_the_ID(), '_tx_teacher_meta', true );
?>

<article id="post-<?php the_ID(); ?>" class="academia-teacher-single">
        <div class="row">
            <div class="col-md-8">
                <div class="ac-teacher-content row">
                    <div class="col-md-4 col-sm-5">
                        <div class="ac-teacher-profile">
                                    <?php
                                    if( has_post_thumbnail() ){
                                        $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>

                                        <img src="<?php echo esc_url($feat_image_url ); ?>" alt="<?php the_title(); ?>" class="square img-responsive">

                                    <?php } ?>

                        </div>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <div class="ac-teacher-section">
                            <h1><?php the_title(); ?></h1>
                            <?php if(!empty($teacher_meta['_tx_teacher_designation'])) {
                                echo '<p class="lead">' . esc_html( $teacher_meta['_tx_teacher_designation'] ) . '</p>';
                            }?>
                            <div class="ac-teacher-section-content">
                                <?php echo wp_kses(get_the_content(), wp_kses_allowed_html( 'post' )); ?>
                            </div>
                            <?php if(!empty($teacher_meta['_tx_teacher_social_fb']) || !empty($teacher_meta['_tx_teacher_social_tw']) || !empty($teacher_meta['_tx_teacher_social_ln']) || !empty($teacher_meta['_tx_teacher_social_gplus'])): ?>
                                <div class="at-social">
                                    <?php if(!empty($teacher_meta['_tx_teacher_social_fb'])): ?>
                                        <a href="<?php echo esc_url($teacher_meta['_tx_teacher_social_fb']); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <?php endif; ?>
                                    <?php if(!empty($teacher_meta['_tx_teacher_social_tw'])): ?>
                                        <a href="<?php echo esc_url($teacher_meta['_tx_teacher_social_tw']); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <?php endif; ?>
                                    <?php if(!empty($teacher_meta['_tx_teacher_social_ln'])): ?>
                                        <a href="<?php echo esc_url($teacher_meta['_tx_teacher_social_ln']); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    <?php endif; ?>
                                    <?php if(!empty($teacher_meta['_tx_teacher_social_gplus'])): ?>
                                        <a href="<?php echo esc_url($teacher_meta['_tx_teacher_social_gplus']); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>


                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
</article><!-- #post-## -->
