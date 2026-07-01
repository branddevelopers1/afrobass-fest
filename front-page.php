<?php get_header();
$ticket_url       = fest_setting('fest_ticket_url')       ?: home_url('/tickets');
$day2_ticket_url  = fest_setting('fest_day2_ticket_url')  ?: 'https://show.ps/l/0c3f4a74/';
$table_ticket_url = fest_setting('fest_table_ticket_url') ?: 'https://buy.tablelist.com/e/dc29c65de8a48aa2?at=61c5de745e73f315';
$contact_email    = fest_setting('fest_email')            ?: 'contact@afrobassfest.com';

$day1_slug = fest_setting('fest_day1_slug') ?: 'afrobass-festival-day1';
$day2_slug = fest_setting('fest_day2_slug') ?: '';

$prices = [
    'day1' => [
        'ga'    => fest_setting('fest_day1_ga_price')  ?: '$40',
        'vip'   => fest_setting('fest_day1_vip_price') ?: '$80',
        'table' => fest_setting('fest_day1_table_price') ?: 'TBA',
    ],
    'day2' => [
        'ga'    => fest_setting('fest_day2_ga_price')    ?: 'TBA',
        'vip'   => fest_setting('fest_day2_vip_price')   ?: 'TBA',
        'table' => fest_setting('fest_day2_table_price') ?: 'TBA',
    ],
];

$_aq = new WP_Query([
    'post_type'      => 'fest_artist',
    'posts_per_page' => -1,
    'meta_key'       => 'fest_artist_order',
    'orderby'        => 'meta_value_num',
    'order'          => 'ASC',
]);
$fp_artists = ['day1' => [], 'day2' => []];
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
        if (in_array($day_val, ['day1', 'both'])) $fp_artists['day1'][] = $a;
        if (in_array($day_val, ['day2', 'both'])) $fp_artists['day2'][] = $a;
    endwhile;
    wp_reset_postdata();
endif;

$fp_lineup_days = [
  'day1' => ['label' => 'Day 1', 'name' => "The Cavemen., Victony, Obi's House Toronto + More!", 'date' => 'Aug 15, 2026', 'color' => '#FF4500', 'ticket_url' => $ticket_url ?: 'https://show.ps/l/581f9fa7/'],
  'day2' => ['label' => 'Day 2', 'name' => 'Day Party w/ DBN Gogo', 'date' => 'Aug 16, 2026', 'color' => '#FF2D8A', 'ticket_url' => $day2_ticket_url ?: 'https://show.ps/l/0c3f4a74/'],
];

$sponsors = new WP_Query([
    'post_type'      => 'fest_sponsor',
    'posts_per_page' => -1,
    'meta_key'       => 'fest_sponsor_order',
    'orderby'        => 'meta_value_num',
    'order'          => 'ASC',
]);
?>

<!-- ── ATMOSPHERE ── -->
<div class="fbg-layer" aria-hidden="true">
  <div class="fbg-glow-1"></div>
  <div class="fbg-glow-2"></div>
  <div class="fbg-glow-3"></div>
  <div class="fbg-grain"></div>
</div>
<div class="fbg-lines" aria-hidden="true"></div>

<!-- ═══════════════════════════════════════════
     1. HERO
════════════════════════════════════════════ -->
<section class="fhero" id="home">

  <div class="fghost fg-1" aria-hidden="true">AFROBEATS</div>
  <div class="fghost fg-2" aria-hidden="true">AMAPIANO</div>
  <div class="fghost fg-3" aria-hidden="true">TORONTO</div>

  <svg class="fring" viewBox="0 0 500 500" aria-hidden="true">
    <defs>
      <path id="fcp" d="M 250 250 m 0 -200 a 200 200 0 1 1 0 400 a 200 200 0 1 1 0 -400"/>
    </defs>
    <text fill="rgba(255,255,255,0.5)" font-family="'Space Grotesk',sans-serif" font-size="13" font-weight="500" letter-spacing="8">
      <textPath href="#fcp" textLength="1257" lengthAdjust="spacing">AFROBASS MUSIC FEST · TORONTO · AUG 15–16 2026 · AFROBEATS · AMAPIANO · </textPath>
    </text>
  </svg>

  <div class="fhero-content">
    <div class="feyebrow">First Edition · Toronto, Canada</div>

    <h1 class="fh1">
      <span class="fh1-1">AFROBASS</span>
      <span class="fh1-2">MUSIC</span>
      <span class="fh1-3">FEST</span>
    </h1>

    <div class="fmeta">
      <div class="fpill">
        <div class="fpill-dot" style="background:#FF6B1A;"></div>
        <span>Aug 15–16, 2026</span>
      </div>
      <div class="fpill">
        <div class="fpill-dot" style="background:#a855f7;"></div>
        <span>Toronto, Canada</span>
      </div>
    </div>

    <div class="factions">
      <a href="<?php echo esc_url($ticket_url ?: 'https://show.ps/l/581f9fa7/'); ?>" class="fbtn-main">
        Buy Tickets Now &rarr;
      </a>
      <?php /* commented out
      <a href="<?= esc_url(home_url('/lineup')) ?>" class="fbtn-ghost">
        See the Lineup
      </a>
      */ ?>
    </div>
  </div>

  <div class="fscroll-ind" aria-hidden="true">
    <div class="fscroll-line"></div>
    <span class="fscroll-txt">Scroll</span>
  </div>
</section>

<!-- ── TICKER ── -->
<div class="fticker" aria-hidden="true">
  <div class="fticker-track">
    <?php for($i=0;$i<2;$i++): ?>
    <div class="fti hot">Afrobeats <div class="ftdot"></div></div>
    <div class="fti">Amapiano <div class="ftdot"></div></div>
    <div class="fti">Aug 15–16, 2026 <div class="ftdot"></div></div>
    <div class="fti hot">2-Day Fest <div class="ftdot"></div></div>
    <div class="fti">Toronto <div class="ftdot"></div></div>
    <div class="fti hot">Rebel Entertainment Complex <div class="ftdot"></div></div>
    <div class="fti hot">First Edition <div class="ftdot"></div></div>
    <div class="fti">19+ Event <div class="ftdot"></div></div>
    <div class="fti hot">International Artists &amp; DJs <div class="ftdot"></div></div>
    <?php endfor; ?>
  </div>
</div>

<!-- ═══════════════════════════════════════════
     3. LINEUP IMAGE
════════════════════════════════════════════ -->
<?php if (false): ?>
<?php $lineup_image = fest_setting('fest_lineup_image'); ?>
<?php if ($lineup_image): ?>
<section class="fest-lineup-img-section" style="position:relative;z-index:2;border-top:1px solid rgba(255,255,255,0.04);">
  <a href="<?php echo esc_url(home_url('/lineup')); ?>">
    <img src="<?php echo esc_url($lineup_image); ?>" alt="Afrobass Music Fest 2026 Lineup" style="display:block;width:100%;height:auto;">
  </a>
</section>
<style>
.fest-lineup-img-section { padding: 0 56px; }
@media (max-width: 768px) { .fest-lineup-img-section { padding: 0; } }
</style>
<?php endif; ?>
<?php endif; ?>

<div style="position:relative;z-index:2;display:grid;grid-template-columns:1fr 1fr;gap:2px;">
  <a href="<?php echo esc_url($ticket_url ?: 'https://show.ps/l/581f9fa7/'); ?>"
     style="display:flex;align-items:center;justify-content:center;gap:12px;padding:22px;background:#FF4500;font-family:'Barlow Condensed',sans-serif;font-size:15px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:#fff;text-decoration:none;transition:opacity 0.2s;"
     onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">
    Day 1 — Aug 15 &nbsp; Get Tickets &rarr;
  </a>
  <a href="<?php echo esc_url($day2_ticket_url ?: 'https://show.ps/l/0c3f4a74/'); ?>"
     style="display:flex;align-items:center;justify-content:center;gap:12px;padding:22px;background:#fff;font-family:'Barlow Condensed',sans-serif;font-size:15px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:#0a0608;text-decoration:none;transition:opacity 0.2s;"
     onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">
    Day 2 — Aug 16 &nbsp; Get Tickets &rarr;
  </a>
</div>

<!-- ═══════════════════════════════════════════
     LINEUP
════════════════════════════════════════════ -->
<section style="position:relative;z-index:2;padding:0 0 100px;border-top:1px solid rgba(255,255,255,0.04);" id="lineup">

  <?php foreach ($fp_lineup_days as $day_key => $day):
    $artists   = $fp_artists[$day_key];
    $col_count = $day_key === 'day1' ? 3 : 1;
  ?>

  <!-- Day header -->
  <div class="fday-header" style="background:#0d0d0d;padding:24px 40px;display:flex;align-items:center;gap:16px;border-bottom:2px solid <?php echo esc_attr($day['color']); ?>;">
    <div style="width:8px;height:8px;border-radius:50%;background:<?php echo esc_attr($day['color']); ?>;flex-shrink:0;"></div>
    <span style="font-family:'Space Grotesk',sans-serif;font-size:9px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:<?php echo esc_attr($day['color']); ?>;"><?php echo esc_html($day['label']); ?></span>
    <span style="font-family:'Space Grotesk',sans-serif;font-size:9px;font-weight:600;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.2);"><?php echo esc_html($day['date']); ?></span>
    <span style="margin-left:auto;font-family:'Unbounded',sans-serif;font-size:11px;font-weight:700;letter-spacing:1px;color:rgba(255,255,255,0.15);text-transform:uppercase;"><?php echo esc_html($day['name']); ?></span>
  </div>

  <!-- Artist grid -->
  <div class="fday-col-grid" style="display:grid;grid-template-columns:repeat(<?php echo $col_count; ?>,1fr);gap:2px;background:rgba(255,255,255,0.06);">

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

    <div class="fest-reveal fday-col-card<?php echo $day_key === 'day2' ? ' fday-landscape' : ''; ?>" onclick="window.open('<?php echo esc_js($day['ticket_url']); ?>','_blank')" style="background:#080808;position:relative;overflow:hidden;min-height:520px;cursor:pointer;">
      <?php if ($a && !$tba && has_post_thumbnail()): ?>
        <?php
          $img_style = $day_key === 'day2'
            ? 'position:absolute;inset:0;width:100%;height:100%;object-fit:contain;object-position:center center;background:#080808;filter:grayscale(10%);'
            : 'position:absolute;inset:0;width:100%;height:100%;object-fit:contain;object-position:center top;background:#080808;filter:grayscale(10%);';
          // Use the original aspect ratio; the fest-artist size is hard-cropped.
          $thumb_size = 'full';
        ?>
        <?php the_post_thumbnail($thumb_size, ['style' => $img_style, 'alt' => get_the_title()]); ?>
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
    endfor;
    ?>

  </div>

  <?php endforeach; ?>

</section>
<style>
.fday-landscape { min-height: unset !important; aspect-ratio: 16/7; }
@media (max-width: 768px) {
  .fday-col-grid  { grid-template-columns: 1fr !important; }
  .fday-col-card  { min-height: 420px !important; }
  .fday-landscape { min-height: unset !important; aspect-ratio: 16/9; }
  .fday-header    { padding: 16px 20px !important; }
}
</style>

<!-- ═══════════════════════════════════════════
     TICKET TIERS
════════════════════════════════════════════ -->
<section style="position:relative;z-index:2;padding:100px 56px;border-top:1px solid rgba(255,255,255,0.04);" id="tickets">

  <div class="fest-section-hdr fest-reveal" style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:56px;">
    <div>
      <div class="fest-kicker">Get Your Tickets</div>
      <h2 style="font-family:'Unbounded',sans-serif;font-size:clamp(36px,5vw,64px);font-weight:900;letter-spacing:-1px;color:#fff;text-transform:uppercase;line-height:0.95;margin-top:12px;">Aug 15–16<br><em style="color:#FF2D8A;font-style:italic;">Toronto</em></h2>
    </div>
    <a href="<?php echo esc_url(home_url('/tickets')); ?>"
       style="font-family:'Space Grotesk',sans-serif;font-size:11px;font-weight:600;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.3);text-decoration:none;display:flex;align-items:center;gap:10px;transition:color 0.2s;white-space:nowrap;"
       onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.3)'">All Ticket Options &rarr;</a>
  </div>

  <div class="fp-ticket-days" style="display:grid;grid-template-columns:1fr 1fr;gap:2px;background:rgba(255,255,255,0.06);">

    <?php
    $fp_ticket_days = [
      'day1' => ['label' => 'Day 1', 'name' => "Obi's House + The Cavemen. + More!", 'date' => 'Aug 15', 'hours' => '8pm – 3am', 'color' => '#FF4500', 'url' => $ticket_url],
      'day2' => ['label' => 'Day 2', 'name' => 'Day Party w/ DBN Gogo', 'date' => 'Aug 16', 'hours' => '5pm – 11pm', 'color' => '#FF2D8A', 'url' => $day2_ticket_url],
    ];
    foreach ($fp_ticket_days as $fp_tk_key => $fp_tk):
      $show = $fp_tk_key === 'day1' || $fp_tk['url'];
      if (!$show) continue;
    ?>
    <div class="fest-reveal" style="background:#0d0d0d;padding:48px 40px;display:flex;flex-direction:column;gap:32px;">

      <!-- Day label -->
      <div style="display:flex;align-items:center;gap:12px;">
        <div style="width:7px;height:7px;border-radius:50%;background:<?php echo esc_attr($fp_tk['color']); ?>;flex-shrink:0;"></div>
        <span style="font-family:'Space Grotesk',sans-serif;font-size:9px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:<?php echo esc_attr($fp_tk['color']); ?>;"><?php echo esc_html($fp_tk['label']); ?> — <?php echo esc_html($fp_tk['name']); ?></span>
        <span style="font-family:'Space Grotesk',sans-serif;font-size:9px;color:rgba(255,255,255,0.2);letter-spacing:1.5px;"><?php echo esc_html($fp_tk['date']); ?> · <?php echo esc_html($fp_tk['hours']); ?></span>
      </div>

      <!-- Tiers -->
      <div class="fp-ticket-tiers" style="display:grid;grid-template-columns:1fr 1fr;gap:2px;background:rgba(255,255,255,0.04);">

        <!-- GA -->
        <div style="background:#080808;padding:28px 24px;">
          <div style="font-family:'Space Grotesk',sans-serif;font-size:9px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;color:rgba(255,255,255,0.3);margin-bottom:12px;">General Admission</div>
          <div style="margin-bottom:20px;">
            <span style="display:block;font-family:'Space Grotesk',sans-serif;font-size:10px;font-weight:500;letter-spacing:1px;color:rgba(255,255,255,0.35);margin-bottom:4px;">Starts at</span>
            <span style="font-family:'Unbounded',sans-serif;font-size:clamp(22px,2.5vw,36px);font-weight:900;color:#FF4500;"><?php echo esc_html($prices[$fp_tk_key]['ga']); ?></span>
          </div>
          <a href="<?php echo esc_url($fp_tk['url']); ?>"
             style="display:block;text-align:center;font-family:'Space Grotesk',sans-serif;font-size:11px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:#fff;text-decoration:none;border:1px solid rgba(255,255,255,0.15);padding:14px 20px;transition:border-color 0.2s,color 0.2s;"
             onmouseover="this.style.borderColor='rgba(255,255,255,0.4)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.15)'">Buy Now &rarr;</a>
        </div>

        <!-- VIP -->
        <div style="background:#0a0a0a;padding:28px 24px;position:relative;">
          <div style="font-family:'Space Grotesk',sans-serif;font-size:9px;font-weight:700;letter-spacing:2.5px;text-transform:uppercase;color:<?php echo esc_attr($fp_tk['color']); ?>;margin-bottom:12px;">VIP Experience</div>
          <div style="margin-bottom:20px;">
            <span style="display:block;font-family:'Space Grotesk',sans-serif;font-size:10px;font-weight:500;letter-spacing:1px;color:rgba(255,255,255,0.35);margin-bottom:4px;">Starts at</span>
            <span style="font-family:'Unbounded',sans-serif;font-size:clamp(22px,2.5vw,36px);font-weight:900;color:<?php echo esc_attr($fp_tk['color']); ?>;"><?php echo esc_html($prices[$fp_tk_key]['vip']); ?></span>
          </div>
          <a href="<?php echo esc_url($fp_tk['url']); ?>"
             style="display:block;text-align:center;font-family:'Space Grotesk',sans-serif;font-size:11px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:#fff;text-decoration:none;background:<?php echo esc_attr($fp_tk['color']); ?>;padding:14px 20px;transition:opacity 0.2s;"
             onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">Buy Now &rarr;</a>
        </div>

      </div>

      <!-- Table CTA -->
      <?php if ($fp_tk_key !== 'day2'): // remove this condition when Day 2 table link is ready ?>
      <a href="<?php echo esc_url($table_ticket_url); ?>"
         style="display:flex;align-items:center;justify-content:space-between;padding:16px 20px;border:1px solid rgba(255,255,255,0.06);text-decoration:none;transition:border-color 0.2s;"
         onmouseover="this.style.borderColor='rgba(255,255,255,0.15)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'">
        <span style="font-family:'Space Grotesk',sans-serif;font-size:11px;font-weight:600;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.4);">Table & Booth Packages</span>
        <span style="font-family:'Space Grotesk',sans-serif;font-size:11px;font-weight:600;letter-spacing:1px;color:rgba(255,255,255,0.25);">Reserve &rarr;</span>
      </a>
      <?php endif; ?>

    </div>
    <?php endforeach; ?>

  </div>

</section>
<style>
@media (max-width: 768px) {
  .fp-ticket-days  { grid-template-columns: 1fr !important; }
  .fp-ticket-tiers { grid-template-columns: 1fr !important; }
}
</style>

<!-- ═══════════════════════════════════════════
     APPLY CTA
════════════════════════════════════════════ -->
<section class="fp-apply-section" id="apply">
  <div class="fp-apply-head fest-reveal">
    <div>
      <div class="fest-kicker">Be Part of Afrobass</div>
      <h2>Apply to Join<br><em>the Festival</em></h2>
    </div>
    <p>Perform on stage, volunteer with the crew, work with the team, or bring your food, merch, lifestyle, or cultural brand to the fest.</p>
  </div>

  <div class="fp-apply-grid">
    <?php foreach ([
      ['Perform',   'Artists and DJs ready for the Afrobass stage.',                    home_url('/apply'),    '#FF2D8A', 'Artist Application'],
      ['Volunteer', 'Help build the experience from the inside and earn fest access.',  home_url('/apply'),    '#a855f7', 'Volunteer Application'],
      ['Vendors',   'Food, merch, lifestyle, beauty, cultural, and community vendors.', home_url('/vendors'),  '#FF6B1A', 'Vendor Application'],
      ['Work',      'Want to be part of the team behind the festival?',                 'mailto:' . $contact_email . '?subject=Afrobass%20Team%20Application', '#00c2ff', 'Contact the Team'],
      ['Brand Activation', 'Create an audience-first activation, explore a partnership package, or join us through an in-kind sponsorship.', home_url('/brand-activation'), '#00c2ff', 'Brand Activation & Vendor Application'],
    ] as $i => $item): ?>
      <a href="<?php echo esc_url($item[2]); ?>" class="fp-apply-card<?php echo $i === 4 ? ' fp-apply-card-featured' : ''; ?> fest-reveal" style="--apply-color: <?php echo esc_attr($item[3]); ?>;">
        <span><?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></span>
        <h3><?php echo esc_html($item[0]); ?></h3>
        <p><?php echo esc_html($item[1]); ?></p>
        <strong><?php echo esc_html($item[4]); ?> &rarr;</strong>
      </a>
    <?php endforeach; ?>
  </div>
</section>

<style>
.fp-apply-section {
  position: relative;
  z-index: 2;
  padding: 100px 56px;
  border-top: 1px solid rgba(255,255,255,0.04);
}
.fp-apply-head {
  display: grid;
  grid-template-columns: 1fr minmax(260px, 420px);
  gap: 48px;
  align-items: end;
  margin-bottom: 48px;
}
.fp-apply-head h2 {
  font-family: 'Unbounded', sans-serif;
  font-size: clamp(36px,5vw,64px);
  font-weight: 900;
  letter-spacing: -1px;
  color: #fff;
  text-transform: uppercase;
  line-height: 0.95;
  margin-top: 12px;
}
.fp-apply-head h2 em {
  color: #FF2D8A;
  font-style: italic;
}
.fp-apply-head p {
  font-size: 15px;
  font-weight: 300;
  color: rgba(255,255,255,0.4);
  line-height: 1.8;
}
.fp-apply-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2px;
  background: rgba(255,255,255,0.05);
}
.fp-apply-card {
  --apply-color: #FF2D8A;
  min-height: 300px;
  background: #080808;
  padding: 32px 28px;
  display: flex;
  flex-direction: column;
  color: #fff;
  text-decoration: none;
  border-top: 2px solid var(--apply-color);
  transition: background 0.2s, transform 0.2s;
}
.fp-apply-card:hover {
  background: #0d0d0d;
  transform: translateY(-2px);
}
.fp-apply-card span {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 3px;
  color: var(--apply-color);
  margin-bottom: 28px;
}
.fp-apply-card h3 {
  font-family: 'Unbounded', sans-serif;
  font-size: clamp(24px,2.8vw,36px);
  font-weight: 900;
  text-transform: uppercase;
  line-height: 0.95;
  margin-bottom: 16px;
}
.fp-apply-card p {
  font-size: 13px;
  font-weight: 300;
  color: rgba(255,255,255,0.42);
  line-height: 1.7;
  margin-bottom: 32px;
}
.fp-apply-card strong {
  margin-top: auto;
  padding-top: 20px;
  border-top: 1px solid rgba(255,255,255,0.06);
  font-family: 'Space Grotesk', sans-serif;
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: var(--apply-color);
}
.fp-apply-card-featured {
  grid-column: 1 / -1;
  min-height: 220px;
  background:
    radial-gradient(circle at 84% 20%, rgba(0,194,255,.13), transparent 30%),
    linear-gradient(110deg, rgba(255,45,138,.07), transparent 45%),
    #080808;
}
.fp-apply-card-featured h3 { max-width: 760px; }
.fp-apply-card-featured p { max-width: 760px; }
@media (max-width: 1024px) {
  .fp-apply-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
  .fp-apply-section { padding: 72px 24px; }
  .fp-apply-head { grid-template-columns: 1fr; gap: 20px; }
  .fp-apply-grid { grid-template-columns: 1fr; }
  .fp-apply-card { min-height: 240px; }
}
</style>

<!-- ═══════════════════════════════════════════
     COUNTDOWN
════════════════════════════════════════════ -->
<div class="fcount-section" style="position:relative;z-index:2;">
  <div class="fcount-label">Counting Down to August 15, 2026 — Day 1: Obi's House + The Cavemen. + More!</div>
  <div class="fcount-grid">
    <div class="fcd-block"><span class="fcd-num" id="cd-days">--</span><span class="fcd-lbl">Days</span></div>
    <div class="fcd-block"><span class="fcd-num" id="cd-hours">--</span><span class="fcd-lbl">Hours</span></div>
    <div class="fcd-block"><span class="fcd-num" id="cd-mins">--</span><span class="fcd-lbl">Minutes</span></div>
    <div class="fcd-block"><span class="fcd-num" id="cd-secs">--</span><span class="fcd-lbl">Seconds</span></div>
  </div>
</div>

<!-- ═══════════════════════════════════════════
     8. EMAIL SIGNUP
════════════════════════════════════════════ -->
<section style="position:relative;z-index:2;padding:100px 56px;border-top:1px solid rgba(255,255,255,0.04);" id="notify">
  <div class="fsignup-grid" style="display:grid;grid-template-columns:1fr 1fr;gap:80px;align-items:center;max-width:1200px;margin:0 auto;">

    <div class="fest-reveal">
      <div class="fcap-tag" style="display:inline-flex;margin-bottom:28px;">
        <div class="fcap-tag-dot"></div>
        <span>Join the List</span>
      </div>
      <div class="fcap-title">Be First<br>to Know.<br><em>Drop Incoming.</em></div>
      <p class="fcap-desc" style="margin-top:20px;">Lineup announcements. Presale access. Exclusive updates. Everything drops to the list first.</p>
      <div style="display:flex;gap:10px;margin-top:36px;flex-wrap:wrap;">
        <?php foreach (fest_social_icons() as $name => $s): ?>
          <a href="<?php echo esc_url($s['url']); ?>" target="_blank" rel="noopener"
             style="width:38px;height:38px;border-radius:50%;border:1px solid rgba(255,255,255,0.07);display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,0.25);text-decoration:none;transition:color 0.2s,border-color 0.2s;"
             onmouseover="this.style.color='#FF2D8A';this.style.borderColor='rgba(255,45,138,0.35)'"
             onmouseout="this.style.color='rgba(255,255,255,0.25)';this.style.borderColor='rgba(255,255,255,0.07)'">
            <span style="width:14px;height:14px;display:flex;"><?php echo $s['svg']; ?></span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="fest-reveal fest-d1">
      <form id="fest-capture-form" novalidate style="display:flex;flex-direction:column;gap:0;">
        <div class="fform-row">
          <div class="fform-field"><input type="text" name="first_name" id="ffn" placeholder=" "><label for="ffn">First Name</label></div>
          <div class="fform-field"><input type="text" name="last_name" id="fln" placeholder=" "><label for="fln">Last Name</label></div>
        </div>
        <div class="fform-field">
          <input type="email" name="email" id="fem" placeholder=" " required>
          <label for="fem">Email Address</label>
        </div>
        <div class="fform-field">
          <input type="tel" name="phone" id="fph" placeholder=" ">
          <label for="fph">Phone <span style="color:rgba(255,255,255,0.2);font-size:9px;">(optional)</span></label>
        </div>
        <input type="text" name="website" style="display:none;position:absolute;left:-9999px;" tabindex="-1" autocomplete="off">
        <button type="submit" class="fest-capture-submit" style="margin-top:32px;">Keep Me Up to Date &rarr;</button>
        <div class="fest-form-msg" role="alert"></div>
      </form>
    </div>

  </div>
</section>

<?php get_footer(); ?>
