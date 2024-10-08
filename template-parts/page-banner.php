<?php $hero = get_field('hero_section', get_queried_object_id());
$media = $hero['media'];

if(!empty( $hero)) : ?>
<section class="common-hero hero-bg">
    <div class="container">
        <div class="sb-row <?php echo esc_attr($media['media_alignment']); ?>">

            <?php if ( !$media['is_video'] ) :
                $image = !empty($media['image']['url']) ? $media['image']['url'] : get_theme_file_uri('/assets/images/Salon-Boss-service-website.png');
                $classes = !empty($media['title']) ? 'sb-image-title-available' : '';
            ?>

            <div class="sb-hero-image d-flex flex-wrap <?php echo esc_attr($classes); ?>">
                <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $media['image']['title'] ); ?>"/>

                <?php if( $media['title'] ) : ?>
                <div class="sb-hero-image-title">
                    <button class="link-available"><?php echo esc_html( $media['title'] );?></button>
                </div>
                <?php endif;?>

            </div>

            <?php else :
                $video = $media['video'];
                $video_thumb = $media['video_thumbnail']['url'] ? $media['video_thumbnail']['url'] : get_theme_file_uri('/assets/images/Salon-Boss-Encore-Salon-Suites.png');
                ?>

            <div class="sb-hero-video d-flex flex-wrap">
                <div class="sb-video flex-center" style="background-image: url(<?php echo esc_url( $video_thumb ); ?>);">

                    <div class="sb-video-play-btn" style="--paly-button-color: #6FF2D8; --play-button-icon-color: #000;"></div>

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

            <?php endif;?>

            <?php
            $content = $hero['content'];
            if (!empty($content)): ?>
                <div class="sb-hero-content text-center-mobile">
                    <?php printf('<h1>%s</h1>', wp_kses_post($content['title'])); ?>
                    <?php printf('<h4>%s</h4>', wp_kses_post($content['sub_title'])); ?>
                    <?php printf('<p>%s</p>', wp_kses_post($content['description'])); ?>

                    <?php $buttons = $content['buttons_group']; ?>

                    <div class="sb-buttons d-flex">
                        <?php if ($buttons): foreach ($buttons as $f_button):
                            $icon_type = '';
                            $icon_position = '';
                            $color = '';

                            if (!empty($f_button['enable_icon'])) {
                                $icon_type = !empty($f_button['button_type']) ? 'button-icon-scissor' : 'button-icon-phone';
                                $color = !empty($f_button['color']) ? 'pink' : 'green';
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