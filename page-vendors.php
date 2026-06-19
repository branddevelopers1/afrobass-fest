<?php
/**
 * Template Name: Vendors Page
 * Template Post Type: page
 */
get_header();
$email = fest_setting('fest_email') ?: 'contact@afrobassfest.com';
?>

<style>
.vendor-page {
  padding-top: 96px;
  position: relative;
  z-index: 2;
}
.vendor-hero {
  padding: 120px 56px 84px;
  border-bottom: 1px solid rgba(255,255,255,0.04);
  background:
    linear-gradient(120deg, rgba(255,107,26,0.14), transparent 34%),
    linear-gradient(290deg, rgba(255,45,138,0.08), transparent 38%),
    #080808;
}
.vendor-hero-inner {
  display: grid;
  grid-template-columns: minmax(0, 1fr) 360px;
  gap: 64px;
  align-items: end;
}
.vendor-hero h1 {
  font-family: 'Unbounded', sans-serif;
  font-size: clamp(48px, 8vw, 112px);
  font-weight: 900;
  line-height: 0.9;
  letter-spacing: -2px;
  text-transform: uppercase;
  color: #fff;
  margin-top: 16px;
}
.vendor-hero h1 em {
  color: #FF6B1A;
  font-style: italic;
}
.vendor-hero p {
  max-width: 680px;
  margin-top: 24px;
  font-size: 16px;
  font-weight: 300;
  line-height: 1.8;
  color: rgba(255,255,255,0.48);
}
.vendor-hero-card {
  border: 1px solid rgba(255,255,255,0.08);
  background: rgba(8,8,8,0.72);
  padding: 28px;
}
.vendor-hero-card span,
.vendor-hero-card strong {
  display: block;
}
.vendor-hero-card span {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 3px;
  text-transform: uppercase;
  color: rgba(255,255,255,0.28);
  margin-bottom: 12px;
}
.vendor-hero-card strong {
  font-family: 'Unbounded', sans-serif;
  font-size: 34px;
  font-weight: 900;
  line-height: 0.95;
  text-transform: uppercase;
  color: #fff;
}
.vendor-content {
  padding: 96px 56px;
}
.vendor-grid {
  display: grid;
  grid-template-columns: 0.9fr 1.1fr;
  gap: 80px;
  align-items: start;
  max-width: 1180px;
  margin: 0 auto;
}
.vendor-info h2 {
  font-family: 'Unbounded', sans-serif;
  font-size: clamp(34px, 4vw, 56px);
  font-weight: 900;
  line-height: 0.95;
  letter-spacing: -1px;
  text-transform: uppercase;
  color: #fff;
  margin-bottom: 24px;
}
.vendor-info h2 em {
  color: #FF6B1A;
  font-style: italic;
}
.vendor-info p {
  font-size: 14px;
  font-weight: 300;
  color: rgba(255,255,255,0.44);
  line-height: 1.8;
  margin-bottom: 32px;
}
.vendor-steps {
  display: flex;
  flex-direction: column;
}
.vendor-step {
  display: flex;
  gap: 16px;
  padding: 16px 0;
  border-bottom: 1px solid rgba(255,255,255,0.05);
}
.vendor-step-num {
  width: 24px;
  height: 24px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  background: #FF6B1A;
  color: #fff;
  font-family: 'Unbounded', sans-serif;
  font-size: 10px;
  font-weight: 700;
}
.vendor-step-text {
  font-size: 13px;
  color: rgba(255,255,255,0.42);
  line-height: 1.6;
}
.vendor-step-text strong {
  color: rgba(255,255,255,0.74);
  font-weight: 500;
}
.vendor-form {
  display: flex;
  flex-direction: column;
  gap: 24px;
  background: #080808;
  border: 1px solid rgba(255,255,255,0.06);
  padding: 40px;
}
.vendor-form .fform-field:focus-within {
  border-bottom-color: #FF6B1A;
}
.vendor-form .fform-field input:focus ~ label,
.vendor-form .fform-field input:not(:placeholder-shown) ~ label {
  color: #FF6B1A;
}
.vendor-form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 24px;
}
.vendor-field-control {
  width: 100%;
  background: transparent;
  border: none;
  border-bottom: 1px solid rgba(255,255,255,0.08);
  color: rgba(255,255,255,0.72);
  font-size: 15px;
  padding: 20px 0 14px;
  outline: none;
  appearance: none;
  font-family: 'Space Grotesk', sans-serif;
}
.vendor-field-control:focus {
  border-bottom-color: #FF6B1A;
}
.vendor-submit {
  font-family: 'Unbounded', sans-serif;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  background: #FF6B1A;
  color: #fff;
  border: none;
  padding: 18px 48px;
  border-radius: 100px;
  cursor: pointer;
  transition: box-shadow 0.2s, transform 0.2s;
}
.vendor-submit:hover {
  box-shadow: 0 8px 32px rgba(255,107,26,0.4);
  transform: translateY(-1px);
}
.vendor-msg {
  font-size: 13px;
  display: none;
}
@media (max-width: 900px) {
  .vendor-hero { padding: 104px 24px 64px; }
  .vendor-hero-inner,
  .vendor-grid { grid-template-columns: 1fr; gap: 48px; }
  .vendor-content { padding: 72px 24px; }
  .vendor-form { padding: 28px 24px; }
}
@media (max-width: 640px) {
  .vendor-form-row { grid-template-columns: 1fr; }
}
</style>

<main class="vendor-page">
  <section class="vendor-hero">
    <div class="vendor-hero-inner">
      <div class="fest-reveal">
        <div class="fest-kicker">Vendor Applications</div>
        <h1>Bring Your Brand<br><em>to Afrobass</em></h1>
        <p>Food, beverage, merchandise, lifestyle, beauty, arts, crafts, cultural, and community vendors are invited to apply for Afrobass Music Fest 2026.</p>
      </div>
      <div class="vendor-hero-card fest-reveal fest-d1">
        <span>Limited Vendor Spots</span>
        <strong>Aug 15-16<br>Toronto</strong>
      </div>
    </div>
  </section>

  <section class="vendor-content">
    <div class="vendor-grid">
      <div class="vendor-info fest-reveal">
        <h2>Vendor<br><em>Application</em></h2>
        <p>We welcome food &amp; beverage, merchandise, lifestyle, and cultural vendors. Space is limited, so apply early to secure your spot at one of Toronto's most anticipated events.</p>
        <div class="vendor-steps">
          <?php foreach ([
            ['Submit your application', 'Tell us about your business and what you will offer.'],
            ['Review process',          'We review all vendor applications and curate the experience.'],
            ['Confirmation',            'Confirmed vendors receive a vendor package with all details.'],
            ['Show day',                'Set up, sell, and be part of Afrobass history.'],
          ] as $i => $step): ?>
            <div class="vendor-step">
              <div class="vendor-step-num"><?php echo $i + 1; ?></div>
              <div class="vendor-step-text"><strong><?php echo esc_html($step[0]); ?></strong><br><?php echo esc_html($step[1]); ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <form class="vendor-form sub-form-el fest-reveal fest-d1" data-type="vendor" novalidate>
        <div class="vendor-form-row">
          <div class="fform-field"><input type="text" name="full_name" placeholder=" " required><label>Your Name *</label></div>
          <div class="fform-field"><input type="text" name="business_name" placeholder=" " required><label>Business Name *</label></div>
        </div>
        <div class="vendor-form-row">
          <div class="fform-field"><input type="email" name="email" placeholder=" " required><label>Email *</label></div>
          <div class="fform-field"><input type="tel" name="phone" placeholder=" "><label>Phone</label></div>
        </div>
        <div>
          <select name="vendor_type" class="vendor-field-control" required>
            <option value="" disabled selected>Vendor type *</option>
            <option value="Food & Beverage">Food &amp; Beverage</option>
            <option value="Merchandise">Merchandise / Apparel</option>
            <option value="Lifestyle & Beauty">Lifestyle &amp; Beauty</option>
            <option value="Arts & Crafts">Arts &amp; Crafts</option>
            <option value="Cultural">Cultural / Community</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="fform-field"><input type="url" name="vendor_website" placeholder=" "><label>Website / Online Store</label></div>
        <div class="fform-field"><input type="url" name="instagram" placeholder=" "><label>Instagram URL</label></div>
        <div>
          <textarea name="message" placeholder="What will you be offering at the fest? *" rows="4" class="vendor-field-control" required></textarea>
        </div>
        <input type="hidden" name="submission_type" value="vendor">
        <input type="text" name="website" style="display:none;position:absolute;left:-9999px;" tabindex="-1" autocomplete="off">
        <button type="submit" class="vendor-submit sub-submit">Submit Application &rarr;</button>
        <div class="vendor-msg sub-msg" role="alert"></div>
      </form>
    </div>
  </section>
</main>

<script>
(function(){
  var ajaxUrl = <?php echo wp_json_encode(admin_url('admin-ajax.php')); ?>;
  var nonce = <?php echo wp_json_encode(wp_create_nonce('fest_nonce')); ?>;

  document.querySelectorAll('.sub-form-el').forEach(function(form){
    form.addEventListener('submit', function(e){
      e.preventDefault();
      var btn  = form.querySelector('.sub-submit');
      var msg  = form.querySelector('.sub-msg');
      var type = form.dataset.type;
      var emailEl = form.querySelector('[name="email"]');

      if (!emailEl || !emailEl.value || !/\S+@\S+\.\S+/.test(emailEl.value)){
        msg.style.display = 'block';
        msg.style.color = '#ff4444';
        msg.textContent = 'Please enter a valid email address.';
        return;
      }

      var originalText = btn.textContent;
      btn.textContent = 'Submitting...';
      btn.disabled = true;

      var data = new FormData(form);
      data.set('action', 'fest_submission');
      data.set('nonce', nonce);
      data.set('submission_type', type);

      fetch(ajaxUrl, { method: 'POST', body: data })
        .then(function(res){ return res.json(); })
        .then(function(json){
          msg.style.display = 'block';
          msg.style.color = json.success ? '#00e87a' : '#ff4444';
          msg.textContent = json.data;
          if (json.success) form.reset();
        })
        .catch(function(){
          msg.style.display = 'block';
          msg.style.color = '#ff4444';
          msg.textContent = 'Something went wrong. Please email <?php echo esc_js($email); ?>';
        })
        .finally(function(){
          btn.textContent = originalText;
          btn.disabled = false;
        });
    });
  });
})();
</script>

<?php get_footer(); ?>
