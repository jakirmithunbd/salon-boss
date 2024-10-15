<div class="sb-social-icons">
    <ul class="unstyle d-flex align-center">
        <?php
        $social_media = get_field('social_media', 'options');
        if ($social_media) :
            foreach ($social_media as $item) : ?>
                <li>
                    <a target="_blank" href="<?php echo esc_url($item['social_media_link']); ?>">
                        <img src="<?php echo esc_url($item['icon']['url']); ?>" alt="<?php echo esc_attr($item['icon']['title']); ?>" />
                    </a>
                </li>
            <?php endforeach;
        endif; ?>
    </ul>
</div>