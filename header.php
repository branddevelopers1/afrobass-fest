<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="theme-color" content="#0a0608">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;700;900&family=Space+Grotesk:wght@300;400;500;600&display=swap" rel="stylesheet">
<?php wp_head(); ?>
<!-- Showpass SDK — loaded globally for ticket modal buttons -->
<script src="https://www.showpass.com/static/libs/sdk.js" defer></script>
</head>
<body <?php body_class('fest-site'); ?> style="background:#0a0608;cursor:none;overflow-x:hidden;">
<?php wp_body_open(); ?>

<div id="fest-cursor"></div>
<div id="fest-cursor-ring"></div>

<?php if (is_front_page()): ?>
<div id="fest-loader" aria-hidden="true">
  <div id="fest-loader-logo">AFROBASS<span>MUSIC FESTIVAL</span></div>
  <div id="fest-loader-bar-wrap"><div id="fest-loader-bar"></div></div>
</div>
<?php endif; ?>

<div class="fest-topbar" id="fest-nav">
  <a href="<?php echo esc_url(home_url('/')); ?>" class="fest-topbar-logo">AFROBASS<span>FEST</span></a>

  <!-- Desktop nav -->
  <nav style="display:flex;gap:32px;align-items:center;" class="fest-topbar-links">
    <?php
    $nav_links = [
      ['Lineup',    '/lineup'],
      ['Schedule',  '/schedule'],
      ['Tickets',   '/tickets'],
      ['About',     '/about'],
      ['Sponsors',  '/sponsors'],
      ['Apply',     '/submissions'],
      ['FAQ',       '/faq'],
      ['Contact',   '/contact'],
    ];
    $current = $_SERVER['REQUEST_URI'] ?? '';
    foreach ($nav_links as $link):
      $active = strpos($current, $link[1]) !== false;
    ?>
      <a href="<?php echo esc_url(home_url($link[1])); ?>"
         style="font-family:'Space Grotesk',sans-serif;font-size:12px;font-weight:500;letter-spacing:1.5px;text-transform:uppercase;color:<?php echo $active ? '#fff' : 'rgba(255,255,255,0.35)'; ?>;text-decoration:none;transition:color 0.2s;<?php echo $active ? 'border-bottom:1px solid #FF2D8A;padding-bottom:2px;' : ''; ?>"
         onmouseover="this.style.color='#fff'" onmouseout="this.style.color='<?php echo $active ? '#fff' : 'rgba(255,255,255,0.35)'; ?>'">
        <?php echo esc_html($link[0]); ?>
      </a>
    <?php endforeach; ?>
  </nav>

  <!-- Tickets CTA + Hamburger -->
  <div style="display:flex;align-items:center;gap:16px;">
    <button
      class="showpass-widget-trigger fest-topbar-ticket-btn"
      data-sp-id="1521242"
      data-sp-type="event"
      style="font-family:'Unbounded',sans-serif;font-size:10px;font-weight:700;letter-spacing:2px;text-transform:uppercase;background:#FF2D8A;color:#fff;padding:12px 24px;border-radius:100px;border:none;white-space:nowrap;transition:box-shadow 0.2s;cursor:pointer;"
      onmouseover="this.style.boxShadow='0 8px 24px rgba(255,45,138,0.4)'" onmouseout="this.style.boxShadow='none'">
      Get Tickets
    </button>
    <!-- Hamburger (mobile) -->
    <button id="fest-hamburger" aria-label="Menu" style="display:none;flex-direction:column;gap:5px;background:none;border:none;padding:4px;">
      <span style="width:22px;height:1.5px;background:#fff;display:block;transition:transform 0.3s,opacity 0.3s;"></span>
      <span style="width:22px;height:1.5px;background:#fff;display:block;transition:transform 0.3s,opacity 0.3s;"></span>
      <span style="width:22px;height:1.5px;background:#fff;display:block;transition:transform 0.3s,opacity 0.3s;"></span>
    </button>
  </div>
</div>

<!-- Mobile Nav -->
<div id="fest-mobile-nav" style="display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(10,6,8,0.98);z-index:999;padding:100px 40px 48px;flex-direction:column;gap:0;overflow-y:auto;">
  <?php foreach ($nav_links as $link): ?>
    <a href="<?php echo esc_url(home_url($link[1])); ?>"
       style="font-family:'Unbounded',sans-serif;font-size:32px;font-weight:700;color:rgba(255,255,255,0.4);text-decoration:none;padding:18px 0;border-bottom:1px solid rgba(255,255,255,0.05);display:block;letter-spacing:-0.5px;text-transform:uppercase;transition:color 0.2s;"
       onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.4)'">
      <?php echo esc_html($link[0]); ?>
    </a>
  <?php endforeach; ?>
  <button
     class="showpass-widget-trigger"
     data-sp-id="1521242"
     data-sp-type="event"
     style="margin-top:32px;display:inline-block;font-family:'Unbounded',sans-serif;font-size:12px;font-weight:700;letter-spacing:2px;text-transform:uppercase;background:#FF2D8A;color:#fff;padding:18px 40px;border-radius:100px;border:none;cursor:pointer;">
    Get Tickets &rarr;
  </button>
</div>

<style>
.fest-topbar{position:fixed;top:0;left:0;right:0;z-index:100;padding:24px 56px;display:flex;align-items:center;justify-content:space-between;background:linear-gradient(to bottom,rgba(10,6,8,0.9) 0%,transparent 100%);transition:background 0.4s;}
.fest-topbar.fest-scrolled{background:rgba(10,6,8,0.95);backdrop-filter:blur(20px);}
.fest-topbar-logo{font-family:'Unbounded',sans-serif;font-size:16px;font-weight:700;letter-spacing:3px;color:#fff;text-decoration:none;text-transform:uppercase;}
.fest-topbar-logo span{color:#FF2D8A;}
.fest-topbar-email{font-family:'Space Grotesk',sans-serif;font-size:12px;font-weight:500;letter-spacing:1.5px;color:rgba(255,255,255,0.35);text-decoration:none;transition:color 0.2s;border-bottom:1px solid rgba(255,255,255,0.1);padding-bottom:2px;}
#fest-cursor{position:fixed;width:12px;height:12px;background:#FF2D8A;border-radius:50%;pointer-events:none;z-index:99999;transform:translate(-50%,-50%);transition:width .3s,height .3s,background .3s,transform .15s;mix-blend-mode:screen;}
#fest-cursor-ring{position:fixed;width:44px;height:44px;border:1.5px solid rgba(255,45,138,0.4);border-radius:50%;pointer-events:none;z-index:99998;transform:translate(-50%,-50%);transition:transform .14s ease-out;}
@media(hover:none){#fest-cursor,#fest-cursor-ring{display:none;}}
#fest-loader{position:fixed;inset:0;z-index:9999;background:#0a0608;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:28px;}
#fest-loader-logo{font-family:'Unbounded',sans-serif;font-size:40px;font-weight:900;letter-spacing:4px;color:#fff;text-transform:uppercase;text-align:center;line-height:1.1;opacity:0;animation:fFadeIn 0.5s 0.3s ease forwards;}
#fest-loader-logo span{display:block;font-size:14px;letter-spacing:6px;color:#FF2D8A;margin-top:6px;}
#fest-loader-bar-wrap{width:160px;height:1px;background:rgba(255,255,255,0.08);overflow:hidden;opacity:0;animation:fFadeIn 0.4s 0.5s ease forwards;}
#fest-loader-bar{height:100%;width:0;background:#FF2D8A;animation:fLoadBar 1.4s 0.6s cubic-bezier(0.4,0,0.2,1) forwards;}
@keyframes fFadeIn{to{opacity:1;}}
@keyframes fLoadBar{to{width:100%;}}
#fest-loader.fest-hide{animation:fLoaderOut 0.7s 0.2s cubic-bezier(0.76,0,0.24,1) forwards;}
@keyframes fLoaderOut{0%{clip-path:inset(0 0 0 0);}100%{clip-path:inset(0 0 100% 0);}}
@media(max-width:1024px){.fest-topbar-links{display:none!important;}}
@media(max-width:1024px){#fest-hamburger{display:flex!important;}}
@media(max-width:768px){.fest-topbar{padding:20px 24px;}.fest-topbar-ticket-btn{display:none;}}
</style>

<script>
(function(){
  var ham = document.getElementById('fest-hamburger');
  var mob = document.getElementById('fest-mobile-nav');
  if (!ham || !mob) return;
  ham.addEventListener('click', function(){
    var open = mob.style.display === 'flex';
    mob.style.display = open ? 'none' : 'flex';
    mob.style.flexDirection = 'column';
    ham.children[0].style.transform = open ? '' : 'translateY(6.5px) rotate(45deg)';
    ham.children[1].style.opacity   = open ? '1' : '0';
    ham.children[2].style.transform = open ? '' : 'translateY(-6.5px) rotate(-45deg)';
  });
  mob.querySelectorAll('a').forEach(function(a){
    a.addEventListener('click', function(){
      mob.style.display = 'none';
      ham.children[0].style.transform = '';
      ham.children[1].style.opacity = '1';
      ham.children[2].style.transform = '';
    });
  });
})();
</script>
</style>
