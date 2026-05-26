<?php get_header();
$ticket_url       = fest_setting('fest_ticket_url')       ?: home_url('/tickets');
$day2_ticket_url  = fest_setting('fest_day2_ticket_url')  ?: 'https://show.ps/l/0c3f4a74/';
$table_ticket_url = fest_setting('fest_table_ticket_url') ?: 'https://buy.tablelist.com/i/ae49e4abdeaa1f8c';
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
            'role'   => get_field('fest_artist_role')   ?: 'Headliner',
            'origin' => get_field('fest_artist_origin') ?: '',
            'tba'    => (bool) get_field('fest_artist_tba'),
        ];
        if (in_array($day_val, ['day1', 'both'])) $fp_artists['day1'][] = $a;
        if (in_array($day_val, ['day2', 'both'])) $fp_artists['day2'][] = $a;
    endwhile;
    wp_reset_postdata();
endif;
$fp_artists['day1'] = array_slice($fp_artists['day1'], 0, 1);
$fp_artists['day2'] = array_slice($fp_artists['day2'], 0, 1);

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
<?php $lineup_image = fest_setting('fest_lineup_image'); ?>
<?php if ($lineup_image): ?>
<section class="fest-lineup-img-section" style="position:relative;z-index:2;border-top:1px solid rgba(255,255,255,0.04);">
  <a href="<?php echo esc_url(home_url('/lineup')); ?>">
    <img src="<?php echo esc_url($lineup_image); ?>" alt="Afrobass Music Fest 2026 Lineup" style="display:block;width:100%;height:auto;">
  </a>
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:2px;margin-top:2px;">
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
</section>
<style>
.fest-lineup-img-section { padding: 0 56px; }
@media (max-width: 768px) { .fest-lineup-img-section { padding: 0; } }
</style>
<?php endif; ?>

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
      <a href="<?php echo esc_url($table_ticket_url); ?>"
         style="display:flex;align-items:center;justify-content:space-between;padding:16px 20px;border:1px solid rgba(255,255,255,0.06);text-decoration:none;transition:border-color 0.2s;"
         onmouseover="this.style.borderColor='rgba(255,255,255,0.15)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.06)'">
        <span style="font-family:'Space Grotesk',sans-serif;font-size:11px;font-weight:600;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.4);">Table & Booth Packages</span>
        <span style="font-family:'Space Grotesk',sans-serif;font-size:11px;font-weight:600;letter-spacing:1px;color:rgba(255,255,255,0.25);">Reserve &rarr;</span>
      </a>

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
