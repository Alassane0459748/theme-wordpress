<?php
/**
 * @Packge     : Digalu
 * @Version    : 1.0
 * @Author     : Digalu
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */


// Block direct access
if( ! defined( 'ABSPATH' ) ){
    exit();
}

if ( post_password_required() ) {
    return;
}
?>


    <div class="blog-comments">
        <div class="comments-area">
            <?php if(have_comments()): ?>
                <?php if( get_comments_number() >= 1 ): ?>
                    <div class="comments-title">
                        <div class="title">
                            <h3><?php
                                $digalu_comment_count = get_comments_number();
                                if ( '1' === $digalu_comment_count ) {
                                    printf(
                                    /* translators: 1: title. */
                                        esc_html__( 'One Comment', 'digalu' ),
                                        '<span>' . get_the_title() . '</span>'
                                    );
                                } else {
                                    printf( // WPCS: XSS OK.
                                    /* translators: 1: comment count number, 2: title. */
                                        esc_html( _nx( '%1$s Comment on &ldquo;%2$s&rdquo;', '%1$s Comments on &ldquo;%2$s&rdquo;', $digalu_comment_count, 'comments title','digalu' ) ),
                                        number_format_i18n( $digalu_comment_count ),
                                        '<span>' . get_the_title() . '</span>'
                                    );
                                }?>      
                            </h3>
                        </div>    
                        <div class="comments-list">
                            <?php wp_list_comments( array( 'callback' => 'digalu_comment_callback' ) ); ?>
                        </div>
                        <?php 
                        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through
                            next_comments_link('<span class="fator-n-com">'.esc_html__('Next','digalu').'</span>');
                            previous_comments_link('<span class="fator-p-com">'.esc_html__('Prev','digalu').'</span>');
                        endif; // check for comment navigation ?> 
                    </div>
                <?php endif;  ?>
            <?php  endif; // if have_comments(). ?>
            <div class="comments-form">
                <?php
                $commenter = wp_get_current_commenter();
                $req = get_option( 'require_name_email' );
                $aria_req = $req ? " aria-required='true'" : '';
                $required_text = '  ';

                $args = array (
                    'class_form'  => 'comment-form',
                    'title_reply' => '<div class="title"><h3>'.esc_html__('Leave a comment', 'digalu').'</h3></div>',
                    'submit_button' => '<button class="btn btn-animation dark border" type="submit">'.esc_html__('Post Comment','digalu').'</button>',
                    'cancel_reply_link' => esc_html__('Cancel reply','digalu'),
                    'comment_notes_before' => '',
                    'comment_field' =>
                       '<div class="row"><div class="col-md-12"><div class="form-group comments">
                            <textarea  class="form-control" name="comment" id="comment" cols="90" rows="8" placeholder="'.esc_attr__(' Comment','digalu').'" '.$aria_req.'></textarea>
                        </div></div>',
                    'fields' =>
                        apply_filters( 'comment_form_default_fields',
                            array(
                                'author' =>
                                '<div class="col-md-6"><div class="form-group">
                                <input type="text" class="form-control" placeholder="'.esc_attr__('Name*','digalu').'" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />
                                </div></div>',
                                'email' => 
                                '<div class="col-md-6"><div class="form-group">
                                <input id="email"  class="form-control" placeholder="'.esc_attr__('Email*','digalu').'" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' />
                                </div></div>'
                        )   ),
                    'submit_field' => '<div class="col-md-6"><div class="form-group full-width submit">%1$s %2$s</div></div></div>',
                    'label_submit' => esc_html__('Send message','digalu'),
                );
                comment_form($args);
                ?>
            </div>
        </div>
    </div>

<!-- End comments-area -->