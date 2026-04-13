<?php
/**
 * Template Name: Submissions Page
 * Template Post Type: page
 */
get_header();
$email = fest_setting('fest_email') ?: 'contact@afrobassfestival.com';
?>

<div style="padding-top:72px;">

  <!-- Hero -->
  <div class="fest-lineup-hero">
    <div class="fest-kicker fest-reveal">Afrobass Music Festival 2026</div>
    <h1 class="fest-title fest-reveal" style="margin-bottom:20px;">Apply to<br>Be Part of<br>the Festival</h1>
    <p style="font-size:16px;font-weight:300;color:rgba(255,255,255,0.4);max-width:520px;line-height:1.7;" class="fest-reveal">
      Whether you're an artist wanting to perform, a vendor looking to set up shop, or someone ready to give their time — we want to hear from you.
    </p>
  </div>

  <!-- Type Selector -->
  <section style="padding:0 56px 120px;">

    <!-- Tab nav -->
    <div id="sub-tabs" style="display:flex;gap:2px;margin-bottom:2px;background:#1a1a1a;" class="fest-reveal">
      <?php
      $tabs = [
        ['artist',    'Artist / Performer', 'Perform at the festival'],
        ['vendor',    'Vendor',             'Food, merch & lifestyle'],
        ['volunteer', 'Volunteer',          'Give your time'],
      ];
      foreach ($tabs as $i => $tab): ?>
        <button class="sub-tab" data-tab="<?php echo $tab[0]; ?>"
                style="flex:1;background:<?php echo $i===0?'#0d0d0d':'#080808'; ?>;border:none;padding:28px 32px;text-align:left;transition:background 0.2s;border-bottom:<?php echo $i===0?'2px solid #FF4500':'2px solid transparent'; ?>;">
          <div style="font-family:'Bebas Neue',sans-serif;font-size:22px;letter-spacing:1px;color:<?php echo $i===0?'#fff':'rgba(255,255,255,0.3)'; ?>;text-transform:uppercase;margin-bottom:4px;">
            <?php echo esc_html($tab[1]); ?>
          </div>
          <div style="font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:600;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.2);">
            <?php echo esc_html($tab[2]); ?>
          </div>
        </button>
      <?php endforeach; ?>
    </div>

    <!-- Forms wrapper -->
    <div style="display:grid;grid-template-columns:1fr 420px;gap:2px;background:#1a1a1a;">

      <!-- Forms column -->
      <div style="background:#0d0d0d;">

        <!-- ARTIST FORM -->
        <div class="sub-form" id="form-artist" style="padding:56px 48px;display:block;">
          <h2 style="font-family:'Bebas Neue',sans-serif;font-size:32px;letter-spacing:2px;color:#fff;text-transform:uppercase;margin-bottom:8px;">Artist Application</h2>
          <p style="font-size:14px;font-weight:300;color:rgba(255,255,255,0.35);line-height:1.7;margin-bottom:40px;">
            We're looking for Afrobeats, Amapiano, Afro-Caribbean, and related genre artists and DJs. All experience levels welcome. We review every submission.
          </p>
          <form class="sub-form-el" data-type="artist" novalidate style="display:flex;flex-direction:column;gap:24px;">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;">
              <div class="fform-field"><input type="text" name="full_name" placeholder=" " required><label>Full Name *</label></div>
              <div class="fform-field"><input type="text" name="stage_name" placeholder=" "><label>Stage Name</label></div>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;">
              <div class="fform-field"><input type="email" name="email" placeholder=" " required><label>Email *</label></div>
              <div class="fform-field"><input type="tel" name="phone" placeholder=" "><label>Phone</label></div>
            </div>
            <div class="fform-field">
              <select name="artist_role" style="width:100%;background:transparent;border:none;border-bottom:1px solid rgba(255,255,255,0.08);color:rgba(255,255,255,0.6);font-size:15px;padding:20px 0 14px;outline:none;appearance:none;">
                <option value="" disabled selected>Select your role *</option>
                <option value="Headliner">Headliner / Main Act</option>
                <option value="Supporting Act">Supporting Act</option>
                <option value="DJ Set">DJ Set</option>
                <option value="Special Guest">Special Guest</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div class="fform-field"><input type="text" name="genre" placeholder=" "><label>Genre(s)</label></div>
            <div class="fform-field"><input type="url" name="instagram" placeholder=" "><label>Instagram URL</label></div>
            <div class="fform-field"><input type="url" name="music_url" placeholder=" "><label>Spotify / Apple Music / SoundCloud URL</label></div>
            <div class="fform-field"><input type="url" name="epk_url" placeholder=" "><label>EPK / Website / Press Kit URL</label></div>
            <div class="fform-field">
              <textarea name="message" placeholder=" " rows="4" style="width:100%;background:transparent;border:none;border-bottom:1px solid rgba(255,255,255,0.08);color:#fff;font-size:15px;padding:20px 0 14px;outline:none;resize:none;font-family:'Barlow',sans-serif;"></textarea>
              <label>Tell us about yourself & why you want to perform</label>
            </div>
            <input type="hidden" name="submission_type" value="artist">
            <input type="text" name="website" style="display:none;position:absolute;left:-9999px;" tabindex="-1" autocomplete="off">
            <button type="submit" class="sub-submit" style="font-family:'Barlow Condensed',sans-serif;font-size:13px;font-weight:700;letter-spacing:3px;text-transform:uppercase;background:#FF4500;color:#fff;border:none;padding:18px 48px;border-radius:2px;width:100%;transition:background 0.2s;">
              Submit Artist Application →
            </button>
            <div class="sub-msg" style="font-size:13px;display:none;"></div>
          </form>
        </div>

        <!-- VENDOR FORM -->
        <div class="sub-form" id="form-vendor" style="padding:56px 48px;display:none;">
          <h2 style="font-family:'Bebas Neue',sans-serif;font-size:32px;letter-spacing:2px;color:#fff;text-transform:uppercase;margin-bottom:8px;">Vendor Application</h2>
          <p style="font-size:14px;font-weight:300;color:rgba(255,255,255,0.35);line-height:1.7;margin-bottom:40px;">
            We welcome food & beverage, merchandise, lifestyle, and cultural vendors. Space is limited — apply early to secure your spot.
          </p>
          <form class="sub-form-el" data-type="vendor" novalidate style="display:flex;flex-direction:column;gap:24px;">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;">
              <div class="fform-field"><input type="text" name="full_name" placeholder=" " required><label>Your Name *</label></div>
              <div class="fform-field"><input type="text" name="business_name" placeholder=" " required><label>Business Name *</label></div>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;">
              <div class="fform-field"><input type="email" name="email" placeholder=" " required><label>Email *</label></div>
              <div class="fform-field"><input type="tel" name="phone" placeholder=" "><label>Phone</label></div>
            </div>
            <div class="fform-field">
              <select name="vendor_type" style="width:100%;background:transparent;border:none;border-bottom:1px solid rgba(255,255,255,0.08);color:rgba(255,255,255,0.6);font-size:15px;padding:20px 0 14px;outline:none;appearance:none;">
                <option value="" disabled selected>Vendor type *</option>
                <option value="Food & Beverage">Food & Beverage</option>
                <option value="Merchandise">Merchandise / Apparel</option>
                <option value="Lifestyle & Beauty">Lifestyle & Beauty</option>
                <option value="Arts & Crafts">Arts & Crafts</option>
                <option value="Cultural">Cultural / Community</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div class="fform-field"><input type="url" name="vendor_website" placeholder=" "><label>Website / Online Store URL</label></div>
            <div class="fform-field"><input type="url" name="instagram" placeholder=" "><label>Instagram URL</label></div>
            <div class="fform-field">
              <textarea name="message" placeholder=" " rows="4" style="width:100%;background:transparent;border:none;border-bottom:1px solid rgba(255,255,255,0.08);color:#fff;font-size:15px;padding:20px 0 14px;outline:none;resize:none;font-family:'Barlow',sans-serif;"></textarea>
              <label>Describe what you'll be offering at the festival *</label>
            </div>
            <input type="hidden" name="submission_type" value="vendor">
            <input type="text" name="website" style="display:none;position:absolute;left:-9999px;" tabindex="-1" autocomplete="off">
            <button type="submit" class="sub-submit" style="font-family:'Barlow Condensed',sans-serif;font-size:13px;font-weight:700;letter-spacing:3px;text-transform:uppercase;background:#FF4500;color:#fff;border:none;padding:18px 48px;border-radius:2px;width:100%;transition:background 0.2s;">
              Submit Vendor Application →
            </button>
            <div class="sub-msg" style="font-size:13px;display:none;"></div>
          </form>
        </div>

        <!-- VOLUNTEER FORM -->
        <div class="sub-form" id="form-volunteer" style="padding:56px 48px;display:none;">
          <h2 style="font-family:'Bebas Neue',sans-serif;font-size:32px;letter-spacing:2px;color:#fff;text-transform:uppercase;margin-bottom:8px;">Volunteer Application</h2>
          <p style="font-size:14px;font-weight:300;color:rgba(255,255,255,0.35);line-height:1.7;margin-bottom:40px;">
            Volunteers are the backbone of every great event. Join the Afrobass team and be part of history from the inside. Perks include free event access and more.
          </p>
          <form class="sub-form-el" data-type="volunteer" novalidate style="display:flex;flex-direction:column;gap:24px;">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;">
              <div class="fform-field"><input type="text" name="full_name" placeholder=" " required><label>Full Name *</label></div>
              <div class="fform-field"><input type="text" name="phone" placeholder=" "><label>Phone</label></div>
            </div>
            <div class="fform-field"><input type="email" name="email" placeholder=" " required><label>Email *</label></div>
            <div class="fform-field">
              <select name="availability" style="width:100%;background:transparent;border:none;border-bottom:1px solid rgba(255,255,255,0.08);color:rgba(255,255,255,0.6);font-size:15px;padding:20px 0 14px;outline:none;appearance:none;">
                <option value="" disabled selected>Your availability *</option>
                <option value="Day of event only">Day of event only (August 15)</option>
                <option value="Setup + event day">Setup day(s) + event day</option>
                <option value="Full weekend">Full weekend (including teardown)</option>
                <option value="Flexible">Flexible — wherever needed</option>
              </select>
            </div>
            <div class="fform-field">
              <select name="volunteer_area" style="width:100%;background:transparent;border:none;border-bottom:1px solid rgba(255,255,255,0.08);color:rgba(255,255,255,0.6);font-size:15px;padding:20px 0 14px;outline:none;appearance:none;">
                <option value="" disabled selected>Preferred volunteer area</option>
                <option value="Entry & Ticketing">Entry & Ticketing</option>
                <option value="Stage Crew">Stage Crew</option>
                <option value="Guest Services">Guest Services</option>
                <option value="Social Media">Social Media & Content</option>
                <option value="Vendor Coordination">Vendor Coordination</option>
                <option value="General">General / Wherever needed</option>
              </select>
            </div>
            <div class="fform-field">
              <textarea name="skills" placeholder=" " rows="4" style="width:100%;background:transparent;border:none;border-bottom:1px solid rgba(255,255,255,0.08);color:#fff;font-size:15px;padding:20px 0 14px;outline:none;resize:none;font-family:'Barlow',sans-serif;"></textarea>
              <label>Relevant skills or past experience</label>
            </div>
            <div class="fform-field">
              <textarea name="message" placeholder=" " rows="3" style="width:100%;background:transparent;border:none;border-bottom:1px solid rgba(255,255,255,0.08);color:#fff;font-size:15px;padding:20px 0 14px;outline:none;resize:none;font-family:'Barlow',sans-serif;"></textarea>
              <label>Why do you want to volunteer at Afrobass Fest?</label>
            </div>
            <input type="hidden" name="submission_type" value="volunteer">
            <input type="text" name="website" style="display:none;position:absolute;left:-9999px;" tabindex="-1" autocomplete="off">
            <button type="submit" class="sub-submit" style="font-family:'Barlow Condensed',sans-serif;font-size:13px;font-weight:700;letter-spacing:3px;text-transform:uppercase;background:#FF4500;color:#fff;border:none;padding:18px 48px;border-radius:2px;width:100%;transition:background 0.2s;">
              Submit Volunteer Application →
            </button>
            <div class="sub-msg" style="font-size:13px;display:none;"></div>
          </form>
        </div>

      </div>

      <!-- Right sidebar info -->
      <div style="background:#080808;padding:48px 40px;display:flex;flex-direction:column;gap:40px;" class="fest-reveal fest-d1">

        <!-- Process -->
        <div>
          <div style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.25);margin-bottom:20px;">What Happens Next</div>
          <?php
          $steps = [
            ['Submit your application', 'Fill out the form and hit submit. We review every single one.'],
            ['We review & shortlist', 'Our team goes through all submissions. This may take a few weeks.'],
            ['You hear from us', 'If there\'s a match, we\'ll reach out via email to move things forward.'],
            ['Get confirmed', 'Once confirmed, we\'ll send all the details you need for August 15.'],
          ];
          foreach ($steps as $i => $step): ?>
            <div style="display:flex;gap:20px;padding:16px 0;border-bottom:1px solid #111;<?php echo $i===count($steps)-1?'border-bottom:none;':''; ?>">
              <div style="width:28px;height:28px;border-radius:50%;background:#FF4500;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-family:'Bebas Neue',sans-serif;font-size:14px;color:#fff;margin-top:2px;"><?php echo $i+1; ?></div>
              <div>
                <div style="font-size:13px;font-weight:600;color:#fff;margin-bottom:4px;"><?php echo esc_html($step[0]); ?></div>
                <div style="font-size:12px;font-weight:300;color:rgba(255,255,255,0.3);line-height:1.6;"><?php echo esc_html($step[1]); ?></div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Event Details -->
        <div>
          <div style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.25);margin-bottom:20px;">Event Details</div>
          <?php
          $details = [
            ['Date', 'Saturday, August 15, 2026'],
            ['Venue', 'Rebel Entertainment Complex'],
            ['City', 'Toronto, ON'],
            ['Capacity', '3,000+ Attendees'],
            ['Genre', 'Afrobeats · Amapiano · Afro-Caribbean'],
          ];
          foreach ($details as $d): ?>
            <div style="display:flex;gap:16px;padding:12px 0;border-bottom:1px solid #111;">
              <span style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.2);min-width:72px;padding-top:1px;"><?php echo esc_html($d[0]); ?></span>
              <span style="font-size:12px;color:rgba(255,255,255,0.5);"><?php echo esc_html($d[1]); ?></span>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Questions -->
        <div style="background:#0d0d0d;border:1px solid #1a1a1a;padding:24px;">
          <div style="font-size:13px;font-weight:400;color:rgba(255,255,255,0.4);line-height:1.7;margin-bottom:16px;">Have questions before applying? Reach out directly.</div>
          <a href="mailto:<?php echo esc_attr($email); ?>"
             style="font-family:'Barlow Condensed',sans-serif;font-size:11px;font-weight:700;letter-spacing:2px;text-transform:uppercase;color:#FF4500;text-decoration:none;">
            <?php echo esc_html($email); ?>
          </a>
        </div>

      </div>

    </div>

  </section>

</div>

<script>
(function(){
  var ajaxUrl = '<?php echo esc_js(admin_url("admin-ajax.php")); ?>';
  var nonce   = '<?php echo wp_create_nonce("fest_nonce"); ?>';

  // Tab switching
  document.querySelectorAll('.sub-tab').forEach(function(btn){
    btn.addEventListener('click', function(){
      var tab = btn.dataset.tab;

      // Update tabs
      document.querySelectorAll('.sub-tab').forEach(function(b){
        b.style.background = '#080808';
        b.style.borderBottom = '2px solid transparent';
        b.querySelector('div').style.color = 'rgba(255,255,255,0.3)';
      });
      btn.style.background = '#0d0d0d';
      btn.style.borderBottom = '2px solid #FF4500';
      btn.querySelector('div').style.color = '#fff';

      // Show form
      document.querySelectorAll('.sub-form').forEach(function(f){ f.style.display = 'none'; });
      document.getElementById('form-' + tab).style.display = 'block';
    });
  });

  // Form submissions
  document.querySelectorAll('.sub-form-el').forEach(function(form){
    form.addEventListener('submit', async function(e){
      e.preventDefault();
      var btn  = form.querySelector('.sub-submit');
      var msg  = form.querySelector('.sub-msg');
      var type = form.dataset.type;

      var email = form.querySelector('[name="email"]');
      if (!email || !email.value || !/\S+@\S+\.\S+/.test(email.value)){
        msg.style.display = 'block'; msg.style.color = '#ff4444';
        msg.textContent = 'Please enter a valid email address.';
        return;
      }

      btn.textContent = 'Submitting...'; btn.disabled = true;

      var data = new FormData(form);
      data.set('action', 'fest_submission');
      data.set('nonce', nonce);
      data.set('submission_type', type);

      try {
        var res  = await fetch(ajaxUrl, {method:'POST', body:data});
        var json = await res.json();
        msg.style.display = 'block';
        msg.style.color = json.success ? '#00c850' : '#ff4444';
        msg.textContent = json.data;
        if (json.success) form.reset();
      } catch(err) {
        msg.style.display = 'block';
        msg.style.color = '#ff4444';
        msg.textContent = 'Something went wrong. Please email us directly at <?php echo esc_js($email); ?>';
      }

      btn.textContent = btn.textContent.replace('Submitting...','Submit ' + type.charAt(0).toUpperCase() + type.slice(1) + ' Application →');
      btn.disabled = false;
    });
  });
})();
</script>

<?php get_footer(); ?>
