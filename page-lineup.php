<?php
/**
 * Template Name: Lineup Page
 * Template Post Type: page
 */
get_header();

/* ── Collect artists into day buckets ── */
$_aq = new WP_Query([
    'post_type'      => 'fest_artist',
    'posts_per_page' => -1,
    'meta_key'       => 'fest_artist_order',
    'orderby'        => 'meta_value_num',
    'order'          => 'ASC',
]);
$lineup_artists = ['day1' => [], 'day2' => []];
if ($_aq->have_posts()):
    while ($_aq->have_posts()): $_aq->the_post();
        $day_val = get_field('fest_artist_day') ?: 'day1';
        $a = [
            'post'   => get_post(),
            'role'   => get_field('fest_artist_role')      ?: 'Headliner',
            'origin' => get_field('fest_artist_origin')    ?: '',
            'bio'    => get_field('fest_artist_bio')       ?: '',
            'ig'     => get_field('fest_artist_instagram') ?: '',
            'sp'     => get_field('fest_artist_spotify')   ?: '',
            'tba'    => (bool) get_field('fest_artist_tba'),
        ];
        if (in_array($day_val, ['day1', 'both'])) $lineup_artists['day1'][] = $a;
        if (in_array($day_val, ['day2', 'both'])) $lineup_artists['day2'][] = $a;
    endwhile;
    wp_reset_postdata();
endif;
?>

<div style="padding-top:96px;">

  <!-- Artists Grid -->
  <section style="padding:56px 56px 120px;">

    <div class="fday-tabs" style="max-width:1400px;margin:0 auto 32px;">
      <button class="fday-tab fday-tab--active" data-day="day1">Day 1 <span>Aug 15</span></button>
      <?php if (!empty($lineup_artists['day2'])): ?>
      <button class="fday-tab" data-day="day2">Day 2 <span>Aug 16</span></button>
      <?php endif; ?>
    </div>

    <?php
    $days_to_show = ['day1' => true];
    if (!empty($lineup_artists['day2'])) $days_to_show['day2'] = false;
    foreach ($days_to_show as $day_key => $is_active): ?>
    <div class="fday-panel<?php echo $is_active ? ' fday-panel--active' : ''; ?>" data-day="<?php echo esc_attr($day_key); ?>">
      <div class="fest-artists-grid">
        <?php if (!empty($lineup_artists[$day_key])):
          foreach ($lineup_artists[$day_key] as $a):
            setup_postdata($GLOBALS['post'] = $a['post']);
            $role   = $a['role'];
            $origin = $a['origin'];
            $bio    = $a['bio'];
            $ig     = $a['ig'];
            $sp     = $a['sp'];
            $tba    = $a['tba'];
        ?>
          <div class="fest-artist-card fest-reveal">
            <div class="fest-artist-img-wrap">
              <?php if ($tba): ?>
                <div class="fest-artist-img-placeholder">
                  <div class="fest-tba-inner">
                    <div class="fest-tba-icon">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4.4 3.6-8 8-8s8 3.6 8 8"/></svg>
                    </div>
                    <div class="fest-tba-text">Coming Soon</div>
                  </div>
                </div>
              <?php elseif (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('fest-artist', ['class'=>'fest-artist-img', 'alt'=>get_the_title()]); ?>
              <?php else: ?>
                <div class="fest-artist-img-placeholder">
                  <div class="fest-tba-inner">
                    <div class="fest-tba-icon">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4.4 3.6-8 8-8s8 3.6 8 8"/></svg>
                    </div>
                    <div class="fest-tba-text"><?php the_title(); ?></div>
                  </div>
                </div>
              <?php endif; ?>
              <span class="fest-artist-role-badge"><?php echo esc_html($role); ?></span>
              <div class="fest-artist-overlay"></div>
            </div>
            <div class="fest-artist-info">
              <div class="fest-artist-name"><?php echo $tba ? 'TBA' : get_the_title(); ?></div>
              <?php if ($origin && !$tba): ?>
                <div class="fest-artist-origin"><?php echo esc_html($origin); ?></div>
              <?php endif; ?>
              <?php if ($bio && !$tba): ?>
                <div class="fest-artist-bio"><?php echo esc_html($bio); ?></div>
              <?php endif; ?>
              <?php if (($ig || $sp) && !$tba): ?>
                <div style="display:flex;gap:12px;margin-top:16px;">
                  <?php if ($ig): ?>
                    <a href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener"
                       style="font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:600;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.3);text-decoration:none;transition:color 0.2s;"
                       onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.3)'">Instagram</a>
                  <?php endif; ?>
                  <?php if ($sp): ?>
                    <a href="<?php echo esc_url($sp); ?>" target="_blank" rel="noopener"
                       style="font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:600;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.3);text-decoration:none;transition:color 0.2s;"
                       onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.3)'">Spotify</a>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; wp_reset_postdata();
        else:
          for ($i = 0; $i < 6; $i++): ?>
            <div class="fest-artist-tba fest-reveal">
              <div class="fest-tba-inner">
                <div class="fest-tba-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4.4 3.6-8 8-8s8 3.6 8 8"/></svg>
                </div>
                <div class="fest-tba-text">Artist TBA</div>
              </div>
            </div>
          <?php endfor; endif; ?>
      </div>
    </div>
    <?php endforeach; ?>

  </section>

  <!-- CTA -->
  <div style="text-align:center;padding:80px 56px;border-top:1px solid #1a1a1a;background:#060606;" class="fest-reveal">
    <div class="fest-kicker" style="justify-content:center;">August 15–16, 2026 · Toronto</div>
    <h2 style="font-family:'Bebas Neue',sans-serif;font-size:clamp(36px,5vw,64px);letter-spacing:2px;color:#fff;text-transform:uppercase;margin:16px 0 32px;">Don't Miss the First Edition</h2>
    <a href="<?php echo esc_url(fest_setting('fest_ticket_url') ?: home_url('/tickets')); ?>"
       class="fest-btn-primary" style="display:inline-block;">
      Get Tickets →
    </a>
  </div>
</div>

<?php get_footer(); ?>
