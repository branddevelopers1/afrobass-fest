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
        <div class="fest-reveal" style="display:grid;grid-template-columns:1fr 1fr;gap:0;background:#080808;max-width:1400px;margin:0 auto;">
          <!-- Image -->
          <div style="position:relative;overflow:hidden;aspect-ratio:3/4;">
            <?php if ($tba): ?>
              <div style="position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:16px;">
                <div style="width:80px;height:80px;border-radius:50%;border:1px solid rgba(255,255,255,0.07);display:flex;align-items:center;justify-content:center;">
                  <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.15)" stroke-width="1"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4.4 3.6-8 8-8s8 3.6 8 8"/></svg>
                </div>
                <div style="font-family:'Unbounded',sans-serif;font-size:9px;font-weight:700;letter-spacing:5px;color:rgba(255,255,255,0.08);text-transform:uppercase;">Coming Soon</div>
              </div>
            <?php elseif (has_post_thumbnail()): ?>
              <?php the_post_thumbnail('fest-hero', ['style'=>'position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:top;filter:grayscale(10%);', 'alt'=>get_the_title()]); ?>
              <div style="position:absolute;inset:0;background:linear-gradient(to right,transparent 60%,rgba(8,8,8,0.9) 100%);"></div>
            <?php else: ?>
              <div style="position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:16px;">
                <div style="width:80px;height:80px;border-radius:50%;border:1px solid rgba(255,255,255,0.07);display:flex;align-items:center;justify-content:center;">
                  <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.15)" stroke-width="1"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4.4 3.6-8 8-8s8 3.6 8 8"/></svg>
                </div>
              </div>
            <?php endif; ?>
          </div>
          <!-- Info -->
          <div style="padding:60px 56px;display:flex;flex-direction:column;justify-content:center;border-left:1px solid #1a1a1a;">
            <div style="background:#FF2D8A;display:inline-block;padding:5px 14px;border-radius:1px;margin-bottom:28px;align-self:flex-start;">
              <span style="font-family:'Space Grotesk',sans-serif;font-size:9px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:#fff;"><?php echo esc_html($role); ?></span>
            </div>
            <div style="font-family:'Unbounded',sans-serif;font-size:clamp(32px,5vw,72px);font-weight:900;color:<?php echo $tba?'rgba(255,255,255,0.1)':'#fff'; ?>;text-transform:uppercase;letter-spacing:-2px;line-height:0.95;"><?php echo $tba ? 'TBA' : get_the_title(); ?></div>
            <?php if ($origin && !$tba): ?>
              <div style="font-size:13px;color:rgba(255,255,255,0.35);margin-top:16px;letter-spacing:1px;"><?php echo esc_html($origin); ?></div>
            <?php endif; ?>
            <?php if ($bio && !$tba): ?>
              <div style="font-size:14px;font-weight:300;color:rgba(255,255,255,0.4);line-height:1.8;margin-top:24px;max-width:480px;"><?php echo esc_html($bio); ?></div>
            <?php endif; ?>
            <?php if (($ig || $sp) && !$tba): ?>
              <div style="display:flex;gap:16px;margin-top:36px;flex-wrap:wrap;">
                <?php if ($ig): ?>
                  <a href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener"
                     style="font-family:'Space Grotesk',sans-serif;font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.4);text-decoration:none;border:1px solid rgba(255,255,255,0.1);padding:12px 24px;border-radius:2px;transition:color 0.2s,border-color 0.2s;"
                     onmouseover="this.style.color='#fff';this.style.borderColor='rgba(255,255,255,0.3)'"
                     onmouseout="this.style.color='rgba(255,255,255,0.4)';this.style.borderColor='rgba(255,255,255,0.1)'">Instagram</a>
                <?php endif; ?>
                <?php if ($sp): ?>
                  <a href="<?php echo esc_url($sp); ?>" target="_blank" rel="noopener"
                     style="font-family:'Space Grotesk',sans-serif;font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.4);text-decoration:none;border:1px solid rgba(255,255,255,0.1);padding:12px 24px;border-radius:2px;transition:color 0.2s,border-color 0.2s;"
                     onmouseover="this.style.color='#fff';this.style.borderColor='rgba(255,255,255,0.3)'"
                     onmouseout="this.style.color='rgba(255,255,255,0.4)';this.style.borderColor='rgba(255,255,255,0.1)'">Spotify</a>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; wp_reset_postdata();
      else: ?>
        <div class="fest-reveal" style="display:grid;grid-template-columns:1fr 1fr;gap:0;background:#080808;max-width:1400px;margin:0 auto;">
          <div style="position:relative;overflow:hidden;aspect-ratio:3/4;display:flex;align-items:center;justify-content:center;">
            <div style="text-align:center;">
              <div style="width:80px;height:80px;border-radius:50%;border:1px solid rgba(255,255,255,0.06);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4.4 3.6-8 8-8s8 3.6 8 8"/></svg>
              </div>
            </div>
          </div>
          <div style="padding:60px 56px;display:flex;flex-direction:column;justify-content:center;border-left:1px solid #1a1a1a;">
            <div style="background:rgba(255,45,138,0.15);border:1px solid rgba(255,45,138,0.25);display:inline-block;padding:5px 14px;border-radius:1px;margin-bottom:28px;align-self:flex-start;">
              <span style="font-family:'Space Grotesk',sans-serif;font-size:9px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:rgba(255,45,138,0.7);">Headliner</span>
            </div>
            <div style="font-family:'Unbounded',sans-serif;font-size:clamp(32px,5vw,72px);font-weight:900;color:rgba(255,255,255,0.08);text-transform:uppercase;letter-spacing:-2px;line-height:0.95;">TBA</div>
            <div style="font-size:13px;color:rgba(255,255,255,0.2);margin-top:20px;letter-spacing:1px;">Announcement coming soon</div>
          </div>
        </div>
      <?php endif; ?>
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
