<?php
$hero = get_field('hero_section', get_queried_object_id());
$media = $hero['media'];

if(!empty( $hero)) :$sec_class = empty($media['image']) ? 'hero-without-image' : ''; ?>
<section class="common-hero hero-bg <?php echo esc_attr( $sec_class );?>">
    <div class="container">
        <div class="sb-row <?php echo esc_attr($media['media_alignment']); ?>">

            <?php
            if($media['image']) :

                if ( !$media['is_video'] ) : $classes = !empty($media['title']) ? 'sb-image-title-available' : '';
                ?>

                <div class="sb-hero-image d-flex flex-wrap <?php echo esc_attr($classes); ?>">
                    <?php if($media['image']) {
                        printf('<img src="%s" alt="%s"/>', esc_url($media['image']['url']), esc_attr( $media['image']['title']));
                    } ?>

                    <?php if( $media['title'] ) : ?>
                    <div class="sb-hero-image-title">
                        <button class="link-available"><?php echo esc_html( $media['title'] );?></button>
                    </div>
                    <?php endif;?>
                </div>

                <?php else :
                    $video = $media['video'];
                    $video_title_classes = !empty($media['title']) ? 'sb-video-title-available' : '';
                    ?>

                <div class="sb-hero-video d-flex flex-wrap">
                    <div class="sb-video flex-center <?php echo esc_attr($video_title_classes); ?>" style="background-image: url(<?php echo esc_url( $media['video_thumbnail']['url'] ); ?>);">

                        <?php if(!empty($video)) {
                            printf('<div class="sb-video-play-btn" style="--paly-button-color: #6FF2D8; --play-button-icon-color: #000;"></div>');
                        } ?>

                        <div class="sb-video-frame">
                            <div class="sb-video-wrapper relative">
                                <?php echo $video; ?>

                                <button class="sb-video-close-btn">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <?php if( $media['title'] ) : ?>
                        <div class="sb-hero-video-title">
                            <button class="link-available"><?php echo esc_html( $media['title'] );?></button>
                        </div>
                    <?php endif;?>
                </div>

                <?php endif; endif;?>

            <?php
            $text_center = !$media['image'] ? 'text-center' : '';
            $content = $hero['content'];
            if (!empty($content)): ?>
                <div class="sb-hero-content text-center-mobile <?php echo esc_attr( $text_center ); ?>">
                    <?php $bages = $content['hero_bages']; if(!empty($bages)) : ?>
                    <div class="hero-badge d-flex flex-wrap">
                        <?php foreach ($bages as $bage) {
                            printf('<span>%s</span>', wp_kses_post($bage['text']));
                        } ?>

                    </div>
                    <?php endif;?>
                    <?php printf('<h1>%s</h1>', wp_kses_post($content['title'])); ?>
                    <?php printf('<h4>%s</h4>', wp_kses_post($content['sub_title'])); ?>
                    <?php printf('<p>%s</p>', wp_kses_post($content['description'])); ?>

                    <?php $buttons = $content['buttons_group']; ?>

                    <div class="sb-buttons d-flex">
                        <?php if ($buttons): foreach ($buttons as $f_button):
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

                            <a href="<?php echo esc_url($f_button['link']['url']); ?>" target="<?php echo esc_attr($f_button['link']['target']); ?>" class="sb-button button-bg-<?php echo esc_attr($color); ?> <?php echo esc_attr($icon_type); ?> <?php echo esc_attr($icon_position); ?>">
                                <?php echo esc_html($f_button['link']['title']); ?>
                            </a>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif;?>