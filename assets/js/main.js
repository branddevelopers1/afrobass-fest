/* ============================================================
   AFROBASS MUSIC FESTIVAL — MAIN JS
   ============================================================ */
(function(){
  'use strict';

  /* ── SCROLL REVEAL ── */
  /* This must run first — makes all .fest-reveal elements visible */
  function initReveal() {
    var els = document.querySelectorAll('.fest-reveal');
    if (!els.length) return;

    if ('IntersectionObserver' in window) {
      var obs = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            obs.unobserve(entry.target);
          }
        });
      }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

      els.forEach(function(el) { obs.observe(el); });
    } else {
      /* Fallback for old browsers — show everything immediately */
      els.forEach(function(el) { el.classList.add('visible'); });
    }
  }
  /* Run on DOMContentLoaded and also immediately in case DOM is already ready */
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initReveal);
  } else {
    initReveal();
  }

  /* ── CURSOR ── */
  var cur  = document.getElementById('fest-cursor');
  var ring = document.getElementById('fest-cursor-ring');
  if (cur && ring) {
    var mx=0,my=0,rx=0,ry=0;
    document.addEventListener('mousemove',function(e){mx=e.clientX;my=e.clientY;});
    (function anim(){
      cur.style.left=mx+'px';cur.style.top=my+'px';
      rx+=(mx-rx)*.1;ry+=(my-ry)*.1;
      ring.style.left=rx+'px';ring.style.top=ry+'px';
      requestAnimationFrame(anim);
    })();
    document.querySelectorAll('a,button').forEach(function(el){
      el.addEventListener('mouseenter',function(){
        cur.style.transform='translate(-50%,-50%) scale(2.5)';
        cur.style.background='rgba(255,45,138,0.6)';
        ring.style.transform='translate(-50%,-50%) scale(1.6)';
      });
      el.addEventListener('mouseleave',function(){
        cur.style.transform='translate(-50%,-50%) scale(1)';
        cur.style.background='#FF2D8A';
        ring.style.transform='translate(-50%,-50%) scale(1)';
      });
    });
  }

  /* ── LOADER ── */
  var loader = document.getElementById('fest-loader');
  if (loader) {
    window.addEventListener('load',function(){
      setTimeout(function(){
        loader.classList.add('fest-hide');
        setTimeout(function(){loader.style.display='none';},900);
      },2200);
    });
  }

  /* ── NAV SCROLL ── */
  var nav = document.getElementById('fest-nav');
  if (nav) {
    window.addEventListener('scroll',function(){
      nav.classList.toggle('fest-scrolled', window.scrollY > 40);
    },{passive:true});
  }

  /* ── PARALLAX ── */
  window.addEventListener('scroll',function(){
    var hero = document.querySelector('.fhero');
    if (hero) {
      var sy = window.scrollY;
      var fring = hero.querySelector('.fring');
      if (fring) fring.style.transform = 'translate(-50%,-50%) rotate('+( sy*0.02)+'deg) scale('+(1+sy*0.0002)+')';
    }
  },{passive:true});

  /* ── COUNTDOWN ── */
  function pad(n){return String(n).padStart(2,'0');}
  function tick(){
    var target=new Date('2026-08-15T20:00:00');
    var diff=target-new Date();
    if(diff<=0){
      ['days','hours','mins','secs'].forEach(function(id){
        var el=document.getElementById('cd-'+id);
        if(el)el.textContent='00';
      });
      return;
    }
    var d=Math.floor(diff/86400000);
    var h=Math.floor((diff%86400000)/3600000);
    var m=Math.floor((diff%3600000)/60000);
    var s=Math.floor((diff%60000)/1000);
    function update(id,val){
      var el=document.getElementById('cd-'+id);
      if(!el)return;
      if(el.textContent!==val){
        el.textContent=val;
        el.classList.add('ftick');
        setTimeout(function(){el.classList.remove('ftick');},150);
      }
    }
    update('days',pad(d));
    update('hours',pad(h));
    update('mins',pad(m));
    update('secs',pad(s));
  }
  tick();setInterval(tick,1000);

  /* ── EMAIL CAPTURE ── */
  var form = document.getElementById('fest-capture-form');
  if (form) {
    form.addEventListener('submit',function(e){
      e.preventDefault();
      var btn = form.querySelector('.fest-capture-submit');
      var msg = form.querySelector('.fest-form-msg');
      var emailVal = form.querySelector('[name=email]') ? form.querySelector('[name=email]').value : '';

      if (!emailVal||!/\S+@\S+\.\S+/.test(emailVal)){
        msg.className='fest-form-msg error';
        msg.textContent='Please enter a valid email address.';
        return;
      }
      var hp = form.querySelector('[name=website]');
      if (hp && hp.value) return;

      btn.textContent='Submitting...';btn.disabled=true;

      if (typeof festAjax !== 'undefined') {
        var data=new FormData(form);
        data.append('action','fest_email_capture');
        data.append('nonce',festAjax.nonce);
        fetch(festAjax.ajaxurl,{method:'POST',body:data})
          .then(function(res){return res.json();})
          .then(function(json){
            msg.className='fest-form-msg '+(json.success?'success':'error');
            msg.textContent=json.data;
            if(json.success)form.reset();
          })
          .catch(function(){
            msg.className='fest-form-msg error';
            msg.textContent='Something went wrong. DM us @afrobass on Instagram.';
          })
          .finally(function(){
            btn.textContent='Notify Me When Tickets Drop \u2192';
            btn.disabled=false;
          });
      } else {
        msg.className='fest-form-msg success';
        msg.textContent="You're on the list! We'll notify you when tickets drop.";
        form.reset();
        btn.textContent='Notify Me When Tickets Drop \u2192';
        btn.disabled=false;
      }
    });
  }

  /* ── SMOOTH SCROLL ── */
  document.querySelectorAll('a[href^="#"]').forEach(function(a){
    a.addEventListener('click',function(e){
      var target=document.querySelector(a.getAttribute('href'));
      if(target){e.preventDefault();target.scrollIntoView({behavior:'smooth'});}
    });
  });

})();
