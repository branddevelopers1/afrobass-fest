<?php
/**
 * Template Name: Lineup Page
 * Template Post Type: page
 */
get_header();

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

$days = [
  'day1' => ['label' => 'Day 1', 'name' => "Obi's House",            'date' => 'Aug 15, 2026', 'color' => '#FF4500'],
  'day2' => ['label' => 'Day 2', 'name' => 'Amapiano Day Party',      'date' => 'Aug 16, 2026', 'color' => '#FF2D8A'],
];
?>

<div style="padding-top:96px;">

  <section style="padding:0 0 120px;">

    <!-- Artist columns -->
    <div class="fday-col-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:2px;background:rgba(255,255,255,0.06);">

      <?php foreach ($days as $day_key => $day):
        $artists = $lineup_artists[$day_key];
        $a       = !empty($artists) ? $artists[0] : null;

        if ($a):
          setup_postdata($GLOBALS['post'] = $a['post']);
          $role   = $a['role'];
          $origin = $a['origin'];
          $bio    = $a['bio'];
          $ig     = $a['ig'];
          $sp     = $a['sp'];
          $tba    = $a['tba'];
      ?>

        <div class="fest-reveal fday-col-card" style="background:#080808;position:relative;overflow:hidden;min-height:600px;display:flex;flex-direction:column;justify-content:flex-end;">
          <?php if (!$tba && has_post_thumbnail()): ?>
            <?php the_post_thumbnail('fest-hero', ['style'=>'position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:top;filter:grayscale(10%);', 'alt'=>get_the_title()]); ?>
            <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(8,8,8,0.97) 0%,rgba(8,8,8,0.3) 55%,transparent 100%);"></div>
          <?php else: ?>
            <div style="position:absolute;inset:0;background:radial-gradient(ellipse at center top,rgba(255,255,255,0.02) 0%,transparent 70%);"></div>
            <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(8,8,8,0.99) 0%,transparent 60%);"></div>
          <?php endif; ?>

          <!-- Day + event badge -->
          <div style="position:absolute;top:24px;left:24px;background:<?php echo esc_attr($day['color']); ?>;padding:5px 14px;border-radius:1px;">
            <span style="font-family:'Space Grotesk',sans-serif;font-size:9px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:#fff;"><?php echo esc_html($day['label']); ?> &middot; <?php echo esc_html($day['name']); ?></span>
          </div>

          <!-- Info -->
          <div style="position:relative;z-index:2;padding:40px;">
            <div style="font-family:'Space Grotesk',sans-serif;font-size:9px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.3);margin-bottom:10px;"><?php echo esc_html($role); ?></div>
            <div style="font-family:'Unbounded',sans-serif;font-size:clamp(28px,3.5vw,56px);font-weight:900;color:<?php echo $tba ? 'rgba(255,255,255,0.1)' : '#fff'; ?>;text-transform:uppercase;letter-spacing:-1.5px;line-height:0.95;">
              <?php echo $tba ? 'TBA' : get_the_title(); ?>
            </div>
            <?php if ($origin && !$tba): ?>
              <div style="font-size:12px;color:rgba(255,255,255,0.35);margin-top:12px;letter-spacing:1px;"><?php echo esc_html($origin); ?></div>
            <?php endif; ?>
            <?php if ($bio && !$tba): ?>
              <div style="font-size:13px;font-weight:300;color:rgba(255,255,255,0.35);line-height:1.8;margin-top:20px;"><?php echo esc_html($bio); ?></div>
            <?php endif; ?>
            <?php if (($ig || $sp) && !$tba): ?>
              <div style="display:flex;gap:12px;margin-top:28px;flex-wrap:wrap;">
                <?php if ($ig): ?>
                  <a href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener"
                     style="font-family:'Space Grotesk',sans-serif;font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.4);text-decoration:none;border:1px solid rgba(255,255,255,0.1);padding:10px 20px;border-radius:2px;transition:color 0.2s,border-color 0.2s;"
                     onmouseover="this.style.color='#fff';this.style.borderColor='rgba(255,255,255,0.3)'"
                     onmouseout="this.style.color='rgba(255,255,255,0.4)';this.style.borderColor='rgba(255,255,255,0.1)'">Instagram</a>
                <?php endif; ?>
                <?php if ($sp): ?>
                  <a href="<?php echo esc_url($sp); ?>" target="_blank" rel="noopener"
                     style="font-family:'Space Grotesk',sans-serif;font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.4);text-decoration:none;border:1px solid rgba(255,255,255,0.1);padding:10px 20px;border-radius:2px;transition:color 0.2s,border-color 0.2s;"
                     onmouseover="this.style.color='#fff';this.style.borderColor='rgba(255,255,255,0.3)'"
                     onmouseout="this.style.color='rgba(255,255,255,0.4)';this.style.borderColor='rgba(255,255,255,0.1)'">Spotify</a>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <?php wp_reset_postdata();

      else: /* No artist added yet — TBA placeholder */ ?>

        <div class="fest-reveal fday-col-card" style="background:#080808;position:relative;overflow:hidden;min-height:600px;display:flex;flex-direction:column;justify-content:flex-end;">
          <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;">
            <div style="width:90px;height:90px;border-radius:50%;border:1px solid rgba(255,255,255,0.05);display:flex;align-items:center;justify-content:center;">
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.08)" stroke-width="1"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4.4 3.6-8 8-8s8 3.6 8 8"/></svg>
            </div>
          </div>
          <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(8,8,8,0.99) 0%,transparent 60%);"></div>

          <div style="position:absolute;top:24px;left:24px;background:<?php echo esc_attr($day['color']); ?>;padding:5px 14px;border-radius:1px;">
            <span style="font-family:'Space Grotesk',sans-serif;font-size:9px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:#fff;"><?php echo esc_html($day['label']); ?> &middot; <?php echo esc_html($day['name']); ?></span>
          </div>

          <div style="position:relative;z-index:2;padding:40px;">
            <div style="font-family:'Space Grotesk',sans-serif;font-size:9px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.2);margin-bottom:10px;">Headliner</div>
            <div style="font-family:'Unbounded',sans-serif;font-size:clamp(28px,3.5vw,56px);font-weight:900;color:rgba(255,255,255,0.07);text-transform:uppercase;letter-spacing:-1.5px;line-height:0.95;">TBA</div>
            <div style="font-size:12px;color:rgba(255,255,255,0.18);margin-top:12px;letter-spacing:1px;">Announcement coming soon</div>
          </div>
        </div>

      <?php endif; endforeach; ?>

    </div>

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
