<?php
/**
 * Template Name: Contact Page
 * Template Post Type: page
 */
get_header();
$email = fest_setting('fest_email') ?: 'contact@afrobassfestival.com';
$phone = fest_setting('fest_phone') ?: '416.846.6483';
$ig    = fest_setting('fest_instagram') ?: 'https://instagram.com/afrobass.ca';
?>

<div style="padding-top:72px;">

  <!-- Hero -->
  <div class="fest-lineup-hero">
    <div class="fest-kicker fest-reveal">Afrobass Music Festival 2026</div>
    <h1 class="fest-title fest-reveal" style="margin-bottom:20px;">Get In<br>Touch</h1>
    <p style="font-size:16px;font-weight:300;color:rgba(255,255,255,0.4);max-width:480px;line-height:1.7;" class="fest-reveal">
      General enquiries, press, sponsorship, or just want to say hello — we're here.
    </p>
  </div>

  <!-- Contact Grid -->
  <section style="padding:0 56px 120px;">

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:2px;background:#1a1a1a;">

      <!-- Left: Contact Cards -->
      <div style="display:flex;flex-direction:column;gap:2px;background:#1a1a1a;">

        <!-- Email -->
        <a href="mailto:<?php echo esc_attr($email); ?>"
           class="fest-reveal"
           style="display:flex;align-items:flex-start;gap:24px;padding:40px 48px;background:#0d0d0d;text-decoration:none;transition:background 0.2s;"
           onmouseover="this.style.background='#111'" onmouseout="this.style.background='#0d0d0d'">
          <div style="width:44px;height:44px;border:1px solid #1a1a1a;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#FF4500" stroke-width="1.5"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 7 10-7"/></svg>
          </div>
          <div>
            <div style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.3);margin-bottom:8px;">Email</div>
            <div style="font-size:16px;color:#fff;font-weight:400;"><?php echo esc_html($email); ?></div>
            <div style="font-size:12px;color:rgba(255,255,255,0.25);margin-top:4px;">General enquiries &amp; booking</div>
          </div>
        </a>

        <!-- Phone -->
        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9]/', '', $phone)); ?>"
           class="fest-reveal fest-d1"
           style="display:flex;align-items:flex-start;gap:24px;padding:40px 48px;background:#0d0d0d;text-decoration:none;transition:background 0.2s;"
           onmouseover="this.style.background='#111'" onmouseout="this.style.background='#0d0d0d'">
          <div style="width:44px;height:44px;border:1px solid #1a1a1a;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#FF4500" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.23h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          </div>
          <div>
            <div style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.3);margin-bottom:8px;">Phone</div>
            <div style="font-size:16px;color:#fff;font-weight:400;"><?php echo esc_html($phone); ?></div>
            <div style="font-size:12px;color:rgba(255,255,255,0.25);margin-top:4px;">Mon–Fri, 10am – 6pm ET</div>
          </div>
        </a>

        <!-- Instagram -->
        <a href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener"
           class="fest-reveal fest-d2"
           style="display:flex;align-items:flex-start;gap:24px;padding:40px 48px;background:#0d0d0d;text-decoration:none;transition:background 0.2s;"
           onmouseover="this.style.background='#111'" onmouseout="this.style.background='#0d0d0d'">
          <div style="width:44px;height:44px;border:1px solid #1a1a1a;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#FF4500" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="0.5" fill="#FF4500" stroke="none"/></svg>
          </div>
          <div>
            <div style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.3);margin-bottom:8px;">Instagram</div>
            <div style="font-size:16px;color:#fff;font-weight:400;">@afrobass.ca</div>
            <div style="font-size:12px;color:rgba(255,255,255,0.25);margin-top:4px;">DMs open for quick questions</div>
          </div>
        </a>

        <!-- Location -->
        <div class="fest-reveal fest-d3" style="display:flex;align-items:flex-start;gap:24px;padding:40px 48px;background:#0d0d0d;">
          <div style="width:44px;height:44px;border:1px solid #1a1a1a;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#FF4500" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <div>
            <div style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.3);margin-bottom:8px;">Venue</div>
            <div style="font-size:16px;color:#fff;font-weight:400;">Rebel Entertainment Complex</div>
            <div style="font-size:12px;color:rgba(255,255,255,0.25);margin-top:4px;">11 Polson St, Toronto, ON</div>
          </div>
        </div>

        <!-- Quick links for specific enquiries -->
        <div style="padding:32px 48px;background:#080808;display:flex;flex-direction:column;gap:12px;">
          <div style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:3px;text-transform:uppercase;color:rgba(255,255,255,0.2);margin-bottom:4px;">Specific Enquiries</div>
          <?php
          $links = [
            ['Sponsorship', "mailto:{$email}?subject=Sponsorship Enquiry — Afrobass Fest 2026"],
            ['Press & Media', "mailto:{$email}?subject=Press Enquiry — Afrobass Fest 2026"],
            ['Talent Booking', "mailto:{$email}?subject=Talent Booking — Afrobass Fest 2026"],
            ['Artists & Vendors', esc_url(home_url('/submissions'))],
          ];
          foreach ($links as $l): ?>
            <a href="<?php echo esc_url($l[1]); ?>"
               style="font-family:'Barlow Condensed',sans-serif;font-size:12px;font-weight:600;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.3);text-decoration:none;display:flex;align-items:center;gap:10px;transition:color 0.2s;padding:10px 0;border-bottom:1px solid #111;"
               onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.3)'">
              <span style="color:#FF4500;">→</span> <?php echo esc_html($l[0]); ?>
            </a>
          <?php endforeach; ?>
        </div>

      </div>

      <!-- Right: Contact Form -->
      <div style="background:#0d0d0d;padding:56px 48px;" class="fest-reveal fest-d1">
        <div style="font-family:'Barlow Condensed',sans-serif;font-size:10px;font-weight:700;letter-spacing:4px;text-transform:uppercase;color:rgba(255,255,255,0.3);margin-bottom:8px;">Send a Message</div>
        <h2 style="font-family:'Bebas Neue',sans-serif;font-size:clamp(28px,3vw,44px);letter-spacing:2px;color:#fff;text-transform:uppercase;margin-bottom:40px;">We'll Get<br>Back to You</h2>

        <form id="fest-contact-form" novalidate style="display:flex;flex-direction:column;gap:0;">

          <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;">
            <div class="fform-field">
              <input type="text" name="first_name" id="cfn" placeholder=" " required>
              <label for="cfn">First Name *</label>
            </div>
            <div class="fform-field">
              <input type="text" name="last_name" id="cln" placeholder=" ">
              <label for="cln">Last Name</label>
            </div>
          </div>

          <div class="fform-field" style="margin-top:24px;">
            <input type="email" name="email" id="cem" placeholder=" " required>
            <label for="cem">Email Address *</label>
          </div>

          <div class="fform-field" style="margin-top:24px;">
            <input type="tel" name="phone" id="cph" placeholder=" ">
            <label for="cph">Phone <span style="color:rgba(255,255,255,0.2);font-size:9px;">(optional)</span></label>
          </div>

          <div class="fform-field" style="margin-top:24px;">
            <select name="subject" id="csub" style="width:100%;background:transparent;border:none;border-bottom:1px solid rgba(255,255,255,0.08);color:rgba(255,255,255,0.6);font-size:15px;padding:20px 0 14px;outline:none;appearance:none;">
              <option value="" disabled selected>Select a topic</option>
              <option value="General">General Enquiry</option>
              <option value="Sponsorship">Sponsorship</option>
              <option value="Press">Press & Media</option>
              <option value="Tickets">Tickets</option>
              <option value="Other">Other</option>
            </select>
          </div>

          <div class="fform-field" style="margin-top:24px;">
            <textarea name="message" id="cmsg" placeholder=" " rows="4" style="width:100%;background:transparent;border:none;border-bottom:1px solid rgba(255,255,255,0.08);color:#fff;font-size:15px;padding:20px 0 14px;outline:none;resize:none;font-family:'Barlow',sans-serif;"></textarea>
            <label for="cmsg">Message *</label>
          </div>

          <!-- Honeypot -->
          <input type="text" name="website" style="display:none;position:absolute;left:-9999px;" tabindex="-1" autocomplete="off">
          <input type="hidden" name="action" value="fest_contact">
          <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('fest_nonce'); ?>">

          <button type="submit" id="fest-contact-submit"
                  style="margin-top:36px;font-family:'Barlow Condensed',sans-serif;font-size:13px;font-weight:700;letter-spacing:3px;text-transform:uppercase;background:#FF4500;color:#fff;border:none;padding:18px 48px;border-radius:2px;width:100%;transition:background 0.2s;"
                  onmouseover="this.style.background='#CC3600'" onmouseout="this.style.background='#FF4500'">
            Send Message →
          </button>
          <div id="fest-contact-msg" style="margin-top:16px;font-size:13px;display:none;"></div>

        </form>

        <script>
        (function(){
          var form = document.getElementById('fest-contact-form');
          if (!form) return;
          form.addEventListener('submit', async function(e){
            e.preventDefault();
            var btn = document.getElementById('fest-contact-submit');
            var msg = document.getElementById('fest-contact-msg');
            btn.textContent = 'Sending...'; btn.disabled = true;
            var data = new FormData(form);
            data.set('action','fest_contact_form');
            <?php if(function_exists('wp_create_nonce')): ?>
            data.set('nonce','<?php echo wp_create_nonce("fest_nonce"); ?>');
            <?php endif; ?>
            try {
              var res = await fetch('<?php echo esc_js(admin_url("admin-ajax.php")); ?>',{method:'POST',body:data});
              var json = await res.json();
              msg.style.display = 'block';
              msg.style.color = json.success ? '#00c850' : '#ff4444';
              msg.textContent = json.data;
              if (json.success) form.reset();
            } catch(err) {
              msg.style.display = 'block';
              msg.style.color = '#ff4444';
              msg.textContent = 'Something went wrong. Please email us directly.';
            }
            btn.textContent = 'Send Message →'; btn.disabled = false;
          });
        })();
        </script>
      </div>

    </div>

  </section>

</div>

<?php get_footer(); ?>
