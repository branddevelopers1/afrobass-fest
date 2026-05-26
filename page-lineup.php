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
  'day1' => ['label' => 'Day 1', 'name' => "Obi's House + The Cavemen. + More!",            'date' => 'Aug 15, 2026', 'color' => '#FF4500', 'ticket_url' => fest_setting('fest_ticket_url')      ?: 'https://show.ps/l/581f9fa7/'],
  'day2' => ['label' => 'Day 2', 'name' => 'Day Party w/ DBN Gogo',      'date' => 'Aug 16, 2026', 'color' => '#FF2D8A', 'ticket_url' => fest_setting('fest_day2_ticket_url') ?: 'https://show.ps/l/0c3f4a74/'],
];
?>

<div style="padding-top:96px;">

  <section style="padding:0 0 120px;">

    <?php foreach ($days as $day_key => $day):
      $artists   = $lineup_artists[$day_key];
      $col_count = $day_key === 'day1' ? 3 : 1;
    ?>

    <!-- Day header -->
    <div style="background:#0d0d0d;padding:24px 40px;display:flex;align-items:center;gap:16px;border-bottom:2px solid <?php echo esc_attr($day['color']); ?>;">
      <div style="width:8px;height:8px;border-radius:50%;background:<?php echo esc_attr($day['color']); ?>;flex-shrink:0;"></div>
      <span style="font-family:'Space Grotesk',sans-serif;font-size:9px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:<?php echo esc_attr($day['color']); ?>;"><?php echo esc_html($day['label']); ?></span>
      <span style="font-family:'Space Grotesk',sans-serif;font-size:9px;font-weight:600;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.2);"><?php echo esc_html($day['date']); ?></span>
      <span style="margin-left:auto;font-family:'Unbounded',sans-serif;font-size:11px;font-weight:700;letter-spacing:1px;color:rgba(255,255,255,0.15);text-transform:uppercase;"><?php echo esc_html($day['name']); ?></span>
    </div>

    <!-- Artist grid -->
    <div style="display:grid;grid-template-columns:repeat(<?php echo $col_count; ?>,1fr);gap:2px;background:rgba(255,255,255,0.06);">

      <?php
      $slot_map = [];
      foreach ($artists as $artist_item) {
          $order = (int) get_post_meta($artist_item['post']->ID, 'fest_artist_order', true);
          $slot  = ($order >= $col_count) ? $col_count : max(1, $order);
          if (!isset($slot_map[$slot])) $slot_map[$slot] = $artist_item;
      }
      for ($i = 1; $i <= $col_count; $i++):
        $a = $slot_map[$i] ?? null;
        if ($a) setup_postdata($GLOBALS['post'] = $a['post']);
        $role   = $a ? $a['role']   : 'Headliner';
        $origin = $a ? $a['origin'] : '';
        $bio    = $a ? $a['bio']    : '';
        $ig     = $a ? $a['ig']     : '';
        $sp     = $a ? $a['sp']     : '';
        $tba    = $a ? $a['tba']    : false;
      ?>

      <div class="fest-reveal fday-col-card" onclick="window.open('<?php echo esc_js($day['ticket_url']); ?>','_blank')" style="background:#080808;position:relative;overflow:hidden;min-height:520px;cursor:pointer;">
        <?php if ($a && !$tba && has_post_thumbnail()): ?>
          <?php the_post_thumbnail('fest-artist', ['style'=>'position:absolute;inset:0;width:100%;height:100%;object-fit:cover;filter:grayscale(10%);', 'alt'=>get_the_title()]); ?>
          <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(8,8,8,0.97) 0%,rgba(8,8,8,0.3) 55%,transparent 100%);"></div>
        <?php else: ?>
          <div style="position:absolute;inset:0;background:radial-gradient(ellipse at center top,rgba(255,255,255,0.02) 0%,transparent 70%);"></div>
          <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(8,8,8,0.99) 0%,transparent 60%);"></div>
          <?php if (!$a): ?>
          <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;">
            <div style="width:90px;height:90px;border-radius:50%;border:1px solid rgba(255,255,255,0.05);display:flex;align-items:center;justify-content:center;">
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.08)" stroke-width="1"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4.4 3.6-8 8-8s8 3.6 8 8"/></svg>
            </div>
          </div>
          <?php endif; ?>
        <?php endif; ?>

        <!-- Role badge -->
        <div style="position:absolute;top:24px;left:24px;background:<?php echo $a ? esc_attr($day['color']) : 'rgba(255,255,255,0.04)'; ?>;<?php echo $a ? '' : 'border:1px solid rgba(255,255,255,0.06);'; ?>padding:5px 14px;border-radius:1px;">
          <span style="font-family:'Space Grotesk',sans-serif;font-size:9px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:<?php echo $a ? '#fff' : 'rgba(255,255,255,0.2)'; ?>;"><?php echo esc_html($role); ?></span>
        </div>

        <!-- Info -->
        <div style="position:absolute;bottom:0;left:0;right:0;z-index:2;padding:32px;">
          <div style="font-family:'Unbounded',sans-serif;font-size:clamp(20px,2.5vw,42px);font-weight:900;color:<?php echo ($tba || !$a) ? 'rgba(255,255,255,0.07)' : '#fff'; ?>;text-transform:uppercase;letter-spacing:-1px;line-height:0.95;">
            <?php echo ($a && !$tba) ? esc_html(get_the_title()) : 'TBA'; ?>
          </div>
          <?php if ($a && !$tba): ?>
            <?php if ($origin): ?><div style="font-size:12px;color:rgba(255,255,255,0.35);margin-top:10px;letter-spacing:1px;"><?php echo esc_html($origin); ?></div><?php endif; ?>
            <?php if ($bio): ?><div style="font-size:13px;font-weight:300;color:rgba(255,255,255,0.35);line-height:1.8;margin-top:16px;"><?php echo esc_html($bio); ?></div><?php endif; ?>
            <?php if ($ig || $sp): ?>
              <div style="display:flex;gap:10px;margin-top:20px;flex-wrap:wrap;">
                <?php if ($ig): ?><a href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener" onclick="event.stopPropagation()" style="font-family:'Space Grotesk',sans-serif;font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.4);text-decoration:none;border:1px solid rgba(255,255,255,0.1);padding:8px 16px;border-radius:2px;transition:color 0.2s,border-color 0.2s;" onmouseover="this.style.color='#fff';this.style.borderColor='rgba(255,255,255,0.3)'" onmouseout="this.style.color='rgba(255,255,255,0.4)';this.style.borderColor='rgba(255,255,255,0.1)'">Instagram</a><?php endif; ?>
                <?php if ($sp): ?><a href="<?php echo esc_url($sp); ?>" target="_blank" rel="noopener" onclick="event.stopPropagation()" style="font-family:'Space Grotesk',sans-serif;font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.4);text-decoration:none;border:1px solid rgba(255,255,255,0.1);padding:8px 16px;border-radius:2px;transition:color 0.2s,border-color 0.2s;" onmouseover="this.style.color='#fff';this.style.borderColor='rgba(255,255,255,0.3)'" onmouseout="this.style.color='rgba(255,255,255,0.4)';this.style.borderColor='rgba(255,255,255,0.1)'">Spotify</a><?php endif; ?>
              </div>
            <?php endif; ?>
          <?php else: ?>
            <div style="font-size:12px;color:rgba(255,255,255,0.18);margin-top:10px;letter-spacing:1px;">Announcement coming soon</div>
          <?php endif; ?>
        </div>
      </div>

      <?php
        if ($a) wp_reset_postdata();
      endfor; // slot loop
      ?>

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
