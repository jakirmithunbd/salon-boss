<?php $hero = get_field('hero_section', get_queried_object_id()); ?>
<section class="hero-single-service common-hero hero-bg">
    <div class="container">
        <div class="sb-row">
            <?php if ($hero): ?>
                <?php $media = $hero['media']; ?>

                <?php if (!empty($media) && true !== $media['is_video']): ?>
                    <?php
                    $image = !empty($media['image']['url']) ? esc_url($media['image']['url']) : esc_url(get_theme_file_uri('/assets/images/Salon-Boss-service-website.png'));
                    ?>
                    <div class="sb-hero-image flex-center">
                        <img src="<?php echo $image; ?>" alt="<?php echo esc_attr($media['image']['title'] ?? ''); ?>" />
                        <?php $title = !empty($media['title']) ? esc_html($media['title']) : 'Watch This Video'; ?>
                        <div class="sb-card-btn">
                            <button class="btn-link-availabl">
                                <?php echo $title; ?>
                            </button>
                        </div>
                    </div>
                <?php else:
                    $video = $media['video'];
                    $video_thumb = $media['video_thumbnail']['url'] ? $media['video_thumbnail']['url'] : get_theme_file_uri('/assets/images/Salon-Boss-Encore-Salon-Suites.png');
                    ?>
                    <div class="sb-hero-video d-flex">
                        <div class="sb-card">
                            <div class="sb-video flex-center" style="background-image: url('<?php echo esc_url($video_thumb); ?>');">
                                <div class="sb-video-play-btn" style="--play-button-color: #6FF2D8; --play-button-icon-color: #000;"></div>

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
                            <?php $title = !empty($media['title']) ? esc_html($media['title']) : 'Watch This Video'; ?>
                            <div class="sb-card-btn">
                                <button class="btn-link-availabl">
                                    <?php echo $title; ?>
                                </button>
                            </div>
                        </div><!-- Sb Card  -->
                    </div>
                <?php endif; ?>

                <?php
                $content = $hero['content'];
                if (!empty($content)): ?>
                    <div class="sb-hero-content text-center-mobile">
                        <?php printf('<h1>%s</h1>', esc_html($content['title'])); ?>
                        <?php printf('<h4>%s</h4>', esc_html($content['sub_title'])); ?>
                        <?php printf('<p>%s</p>', esc_html($content['description'])); ?>

                        <?php $buttons = $content['buttons']; ?>
                        <div class="sb-buttons d-flex">
                            <?php if ($buttons): foreach ($buttons as $button):
                                $btn_position = ($button['icon'] === true && $button['icon_position']['value'] === 'left') ? 'icon-position-left' : 'button-icon-phone icon-position-' . esc_attr($button['icon_position']['value']); ?>
                                <a href="<?php echo esc_url($button['link']['url']); ?>" class="sb-button button-bg-green <?php echo $btn_position; ?>">
                                    <?php echo esc_html($button['link']['title']); ?>
                                </a>
                            <?php endforeach; endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</section>