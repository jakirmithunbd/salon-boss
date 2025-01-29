<?php
$hero = get_field('hero_section', get_queried_object_id());
$media = $hero['media'];
$video = $media['video'];
$image = $media['image'];
$service_slider_switch = $hero['enable_service_slider'];
$slider = $hero['work_item'];

$video_on = $media['is_video'] == true;
$image_on = $media['is_video'] == false;

$content = $hero['content'];

if (!empty($content['title'])):
    $sec_class = empty($image_on && $image || $video_on && $video) ? 'hero-without-image' : ''; ?>
    <section class="common-hero hero-bg <?php echo esc_attr($sec_class); ?>">
        <div class="container">
            <div class="sb-row <?php echo esc_attr($media['media_alignment']); ?>">

                <?php
                if ($service_slider_switch){
                    get_template_part('template-parts/banner-slider', null, ['slider' => $slider]);
                }else{
                    
                if ($image_on && $image):
                    $classes = !empty($media['title']) ? 'sb-image-title-available' : '';
                ?>

                    <div class="sb-hero-image d-flex flex-wrap <?php echo esc_attr($classes); ?>">

                        <?php if ($media['image']) {
                            printf('<img src="%s" alt="%s"/>', esc_url($media['image']['url']), esc_attr($media['image']['title']));
                        } ?>

                        <?php if ($media['title']): ?>
                            <div class="sb-hero-image-title">
                                <button class="link-available"><?php echo esc_html($media['title']); ?></button>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endif;
                if ($video_on && $video):

                    $video_title_classes = !empty($media['title']) ? 'sb-video-title-available' : '';
                ?>

                    <div class="sb-hero-video d-flex flex-wrap">
                        <div class="sb-video flex-center <?php echo esc_attr($video_title_classes); ?>"
                            style="background-image: url(<?php echo esc_url($media['video_thumbnail']['url']); ?>);">

                            <?php if (!empty($video)) {
                                printf('<div class="sb-video-play-btn" style="--paly-button-color: #6FF2D8; --play-button-icon-color: #000;"></div>');
                            } ?>

                            <div class="sb-video-frame">
                                <div class="sb-video-wrapper">
                                    <?php echo $video; ?>
                                </div>
                            </div>
                        </div>

                        <?php if ($media['title']): ?>
                            <div class="sb-hero-video-title">
                                <button class="link-available"><?php echo esc_html($media['title']); ?></button>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endif;

                };
                ?>
                
                <?php

                if (!empty($content)): ?>
                    <div class="sb-hero-content text-center-mobile">
                        <?php $bages = $content['hero_bages'];
                        if (!empty($bages)): ?>
                            <div class="hero-badge d-flex flex-wrap">
                                <?php foreach ($bages as $bage) {
                                    printf('<span>%s</span>', wp_kses_post($bage['text']));
                                } ?>

                            </div>
                        <?php endif; ?>
                        <?php printf('<h1>%s</h1>', wp_kses_post($content['title'])); ?>
                        <?php printf('<h4>%s</h4>', wp_kses_post($content['sub_title'])); ?>
                        <?php printf('<p>%s</p>', wp_kses_post($content['description'])); ?>

                        <?php $buttons = $content['buttons_group']; ?>

                        <div class="sb-buttons d-flex">
                            <?php if ($buttons):
                                foreach ($buttons as $f_button):
                                    $icon_type = '';
                                    $icon_position = '';
                                    $color = !empty($f_button['color']) ? 'pink' : 'green';
                                    if (!empty($f_button['enable_icon'])) {
                                        $icon_type = !empty($f_button['button_type']) ? 'button-icon-scissor' : 'button-icon-phone';
                                        $icon_position = !empty($f_button['icon_alignment'])
                                            ? 'icon-position-right'
                                            : 'icon-position-left';
                                    }
                            ?>

                                    <a href="<?php echo esc_url($f_button['link']['url']); ?>"
                                        target="<?php echo esc_attr($f_button['link']['target']); ?>"
                                        class="sb-button button-bg-<?php echo esc_attr($color); ?> <?php echo esc_attr($icon_type); ?> <?php echo esc_attr($icon_position); ?>">
                                        <?php echo esc_html($f_button['link']['title']); ?>
                                    </a>
                            <?php endforeach;
                            endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>