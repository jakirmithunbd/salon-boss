
<?php
$common_author = get_field('team_area', get_queried_object_id());
if ($common_author):
    $meambers = $common_author['meambers'];
    
    foreach ($meambers as $meamber):
        $name = $meamber['name'];
        $position_title = $meamber['position_title'];
        $image = $meamber['image'];
        $quote = $meamber['quote'];
        ; ?>


        <div class="sb-author-card image-position-top">
            <!--image-position-right-->
            <div class="sb-author-card-content-wrapper d-flex">
                <div class="sb-author-card-image flex-center relative">
                    <img src="<?php echo esc_url($image['url'] ?? ''); ?>"
                        alt="<?php echo esc_attr($image['alt'] ?? ''); ?>">
                </div>
                <div class="sb-author-card-content flex-center flex-col text-center">
                    <h3 class="sb-author-name"><?php echo esc_html($name ?? ''); ?></h3>
                    <h5 class="sb-suthor-title"><?php echo esc_html($position_title ?? ''); ?></h5>
                    <?php echo wp_kses_post($quote ); ?>
                </div>
                <div class="sb-author-social-icons">
                    <?php
                        $social_items = $meamber['social_items'];
                        $optional_button = $meamber['optional_button'];
                    ?>
                    <ul>
                        <?php
                        if($social_items):
                            foreach($social_items as $items):
                                $social_icon = $items['social_icon'];
                                $social_link = $items['social_link'];
                                $social_link_type = $items['link_type'];
                        ?>
                        <li>
                            <a href="
                            <?php
                             if($social_link_type == 'Email'){
                                echo wp_kses_post( "mailto:" . $social_link );
                             }elseif($social_link_type == 'Call'){
                                echo wp_kses_post( "tel:" . $social_link );
                             }elseif($social_link_type == 'SMS'){
                                echo wp_kses_post( "sms:" . $social_link );
                             }else{
                                echo wp_kses_post( $social_link );
                             };
                            
                            ?>"
                            target="_blank">
                                <?php if($social_icon): ?>
                                    <img src="<?php echo esc_url( $social_icon['url'] ) ?>" alt="<?php echo esc_attr($social_icon['alt']); ?>">
                                <?php endif; ?>
                            </a>
                        </li>
                        <?php   
                        endforeach;
                        endif;
                        ?>
                    </ul>
                    <?php if($optional_button): ?>
                    <a class="author-optional-btn" href="<?php echo esc_url( $optional_button['url'] ); ?>" target="<?php echo esc_attr($optional_button['target']); ?>">
                        <?php echo esc_html( $optional_button['title'] ); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- Sb Author Card  -->

        <?php
    endforeach;
endif;
?>