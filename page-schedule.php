<?php
/**
 * Template Name: Schedule Page
 * Template Post Type: page
 */
get_header();

$artists = new WP_Query([
  'post_type'      => 'fest_artist',
  'posts_per_page' => -1,
  'meta_key'       => 'fest_artist_perf_slot',
  'orderby'        => 'meta_value_num',
  'order'          => 'ASC',
]);
?>

<div style="padding-top:96px;">

  <!-- Hero -->
  

  <!-- Date / Stage Banner -->
  <div style="background:#0d0d0d;border-top:1px solid #1a1a1a;border-bottom:1px solid #1a1a1a;padding:28px 56px;display:flex;align-items:center;gap:48px;flex-wrap:wrap;">
    <div style="display:flex;align-items:center;gap:14px;">
      <div style="width:8px;height:8px;border-radius:50%;background:#FF4500;flex-shrink:0;"></div>
      <span style="font-family:'Barlow Condensed',sans-serif;font-size:13px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.6);">Saturday, August 15, 2026</span>
    </div>
    <div style="display:flex;align-items:center;gap:14px;">
      <div style="width:8px;height:8px;border-radius:50%;background:#FF4500;flex-shrink:0;"></div>
      <span style="font-family:'Barlow Condensed',sans-serif;font-size:13px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.6);">Rebel Entertainment Complex · Toronto</span>
    </div>
    <div style="display:flex;align-items:center;gap:14px;">
      <div style="width:8px;height:8px;border-radius:50%;background:#FF4500;flex-shrink:0;"></div>
      <span style="font-family:'Barlow Condensed',sans-serif;font-size:13px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.6);">Main Stage</span>
    </div>
  </div>

  <!-- Timetable -->
  <section style="padding:80px 56px 120px;">

    <?php if ($artists->have_posts()): ?>

      <div style="max-width:900px;margin:0 auto;">

        <!-- Table header -->
        <div style="display:grid;grid-template-columns:160px 1fr auto;gap:0;padding:0 32px 16px;margin-bottom:0;">
          <span style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.2);">Time</span>
          <span style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.2);">Artist</span>
          <span style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.2);">Role</span>
        </div>

        <!-- Timeline items -->
        <?php
        $index = 0;
        while ($artists->have_posts()): $artists->the_post();
          $role      = get_field('fest_artist_role')      ?: 'Headliner';
          $origin    = get_field('fest_artist_origin')    ?: '';
          $perf_time = get_field('fest_artist_perf_time') ?: 'TBA';
          $tba       = get_field('fest_artist_tba');
          $is_headliner = in_array($role, ['Headliner','Co-Headliner']);
          $delay     = 'fest-d' . min($index + 1, 4);
          $index++;
        ?>
          <div class="fest-reveal <?php echo $delay; ?>"
               style="display:grid;grid-template-columns:160px 1fr auto;gap:0;align-items:center;
                      padding:28px 32px;
                      border-top:1px solid #1a1a1a;
                      background:<?php echo $is_headliner ? '#0d0d0d' : 'transparent'; ?>;
                      position:relative;overflow:hidden;
                      transition:background 0.2s;"
               onmouseover="this.style.background='#111'"
               onmouseout="this.style.background='<?php echo $is_headliner ? '#0d0d0d' : 'transparent'; ?>'">

            <?php if ($is_headliner): ?>
              <div style="position:absolute;top:0;left:0;width:2px;height:100%;background:#FF4500;"></div>
            <?php endif; ?>

            <!-- Time -->
            <div>
              <span style="font-family:'Bebas Neue',sans-serif;font-size:24px;letter-spacing:1px;color:<?php echo $tba ? 'rgba(255,255,255,0.15)' : ($is_headliner ? '#FF4500' : 'rgba(255,255,255,0.5)'); ?>;">
                <?php echo esc_html($perf_time); ?>
              </span>
            </div>

            <!-- Artist info -->
            <div style="display:flex;align-items:center;gap:20px;">
              <?php if (has_post_thumbnail() && !$tba): ?>
                <div style="width:52px;height:52px;border-radius:50%;overflow:hidden;flex-shrink:0;background:#111;">
                  <?php the_post_thumbnail('thumbnail', ['style'=>'width:100%;height:100%;object-fit:cover;']); ?>
                </div>
              <?php else: ?>
                <div style="width:52px;height:52px;border-radius:50%;background:#111;border:1px solid #1a1a1a;flex-shrink:0;display:flex;align-items:center;justify-content:center;">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.2)" stroke-width="1.5"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4.4 3.6-8 8-8s8 3.6 8 8"/></svg>
                </div>
              <?php endif; ?>
              <div>
                <div style="font-family:'Bebas Neue',sans-serif;font-size:<?php echo $is_headliner ? '28px' : '22px'; ?>;letter-spacing:1px;color:<?php echo $tba ? 'rgba(255,255,255,0.2)' : '#fff'; ?>;">
                  <?php echo $tba ? 'TBA' : get_the_title(); ?>
                </div>
                <?php if ($origin && !$tba): ?>
                  <div style="font-size:12px;font-weight:300;color:rgba(255,255,255,0.3);margin-top:2px;"><?php echo esc_html($origin); ?></div>
                <?php endif; ?>
              </div>
            </div>

            <!-- Role badge -->
            <div>
              <span style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;
                           color:<?php echo $is_headliner ? '#FF4500' : 'rgba(255,255,255,0.25)'; ?>;
                           background:<?php echo $is_headliner ? 'rgba(255,69,0,0.1)' : 'transparent'; ?>;
                           padding:<?php echo $is_headliner ? '5px 12px' : '0'; ?>;
                           border-radius:1px;">
                <?php echo esc_html($role); ?>
              </span>
            </div>

          </div>
        <?php endwhile; wp_reset_postdata(); ?>

        <!-- Doors open / End row -->
        <div style="border-top:1px solid #1a1a1a;padding:20px 32px;display:flex;justify-content:space-between;align-items:center;margin-top:0;background:transparent;">
          <span style="font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:600;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.15);">Doors Open TBA · Age 19+</span>
          <span style="font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:600;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.15);">Rebel Entertainment Complex</span>
        </div>

      </div>

    <?php else: ?>

      <!-- Placeholder — no artists yet -->
      <div style="max-width:900px;margin:0 auto;text-align:center;padding:80px 40px;">
        <div style="width:72px;height:72px;border-radius:50%;border:1px solid #1a1a1a;display:flex;align-items:center;justify-content:center;margin:0 auto 24px;">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.15)" stroke-width="1"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
        </div>
        <div style="font-family:'Bebas Neue',sans-serif;font-size:28px;letter-spacing:3px;color:rgba(255,255,255,0.12);text-transform:uppercase;">Schedule Coming Soon</div>
        <p style="font-size:13px;font-weight:300;color:rgba(255,255,255,0.2);margin-top:12px;">Full timetable will be announced closer to the event. Stay tuned.</p>
      </div>

    <?php endif; ?>

  </section>

  <!-- Info strip -->
  <div style="background:#060606;border-top:1px solid #1a1a1a;padding:48px 56px;display:grid;grid-template-columns:repeat(4,1fr);gap:2px;" class="fest-reveal">
    <?php
    $facts = [
      ['Date',     'Saturday, August 15, 2026'],
      ['Venue',    'Rebel Entertainment Complex'],
      ['City',     'Toronto, Ontario'],
      ['Age',      '19+ Event'],
    ];
    foreach ($facts as $f): ?>
      <div style="background:#0d0d0d;padding:28px 32px;">
        <div style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.25);margin-bottom:8px;"><?php echo esc_html($f[0]); ?></div>
        <div style="font-size:14px;color:#fff;font-weight:400;"><?php echo esc_html($f[1]); ?></div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- CTA -->
  <div style="text-align:center;padding:80px 56px;border-top:1px solid #1a1a1a;" class="fest-reveal">
    <h2 style="font-family:'Bebas Neue',sans-serif;font-size:clamp(36px,5vw,64px);letter-spacing:2px;color:#fff;text-transform:uppercase;margin-bottom:32px;">Secure Your Spot</h2>
    <a href="<?php echo esc_url(fest_setting('fest_ticket_url') ?: home_url('/tickets')); ?>"
       class="fest-btn-primary" style="display:inline-block;">Get Tickets →</a>
  </div>

</div>

<?php get_footer(); ?>
