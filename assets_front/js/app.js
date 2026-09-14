/* ---- NAV state ---- */
const nav=document.getElementById('nav');
if(nav)addEventListener('scroll',()=>nav.classList.toggle('scrolled',scrollY>30));

/* ---- Mobile menu ---- */
const burger=document.getElementById('burger'),links=document.getElementById('navLinks');
if(burger&&links){
  burger.addEventListener('click',()=>{burger.classList.toggle('open');links.classList.toggle('open')});
  links.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>{burger.classList.remove('open');links.classList.remove('open')}));
}

/* ---- Scroll reveal ---- */
try{
  const io=new IntersectionObserver((es)=>{
    es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}});
  },{threshold:.16,rootMargin:'0px 0px -60px'});
  document.querySelectorAll('.reveal').forEach(el=>io.observe(el));
}catch(err){
  // IntersectionObserver unsupported or failed: don't leave content permanently hidden
  document.querySelectorAll('.reveal').forEach(el=>el.classList.add('in'));
}

/* ---- Count-up ---- */
const counted=new WeakSet();
const cio=new IntersectionObserver((es)=>{
  es.forEach(e=>{
    if(e.isIntersecting&&!counted.has(e.target)){
      counted.add(e.target);
      const el=e.target,end=+el.dataset.count,suf=el.dataset.suffix||'';
      const dur=1400,t0=performance.now();
      const step=(now)=>{
        const p=Math.min((now-t0)/dur,1),ease=1-Math.pow(1-p,3);
        el.textContent=Math.round(end*ease).toLocaleString()+suf;
        if(p<1)requestAnimationFrame(step);
      };
      requestAnimationFrame(step);
    }
  });
},{threshold:.6});
document.querySelectorAll('[data-count]').forEach(el=>cio.observe(el));

/* ---- Active nav link ---- */
const secs=[...document.querySelectorAll('section[id]')];
const nlinks=[...document.querySelectorAll('.nav-links a')];
if(nlinks.length)addEventListener('scroll',()=>{
  let cur='';secs.forEach(s=>{if(scrollY>=s.offsetTop-120)cur=s.id});
  nlinks.forEach(a=>a.classList.toggle('active',a.getAttribute('href')==='#'+cur));
});

/* ---- Reels (click to play, one at a time) ---- */
document.querySelectorAll('.reel-card').forEach(card=>{
  const video=card.querySelector('.reel-video');
  const playBtn=card.querySelector('.reel-play');
  if(!video||!playBtn)return;
  const toggle=()=>{
    if(video.paused){
      document.querySelectorAll('.reel-card.playing').forEach(c=>{
        if(c!==card){c.classList.remove('playing');c.querySelector('.reel-video')?.pause();}
      });
      video.play();
      card.classList.add('playing');
    }else{
      video.pause();
      card.classList.remove('playing');
    }
  };
  playBtn.addEventListener('click',e=>{e.stopPropagation();toggle();});
  video.addEventListener('click',toggle);
  video.addEventListener('ended',()=>card.classList.remove('playing'));
});

/* ---- Project gallery lightbox ---- */
(function(){
  const lightbox=document.getElementById('lightbox');
  if(!lightbox)return;
  const lbImage=document.getElementById('lbImage');
  const lbCount=document.getElementById('lbCount');
  const lbClose=document.getElementById('lbClose');
  const lbPrev=document.getElementById('lbPrev');
  const lbNext=document.getElementById('lbNext');
  let images=[],index=0;

  const render=()=>{
    lbImage.src=images[index];
    lbCount.textContent=(index+1)+' / '+images.length;
  };
  const open=(imgs,startAt)=>{
    images=imgs;index=startAt||0;
    if(!images.length)return;
    render();
    lightbox.classList.add('show');
    lightbox.setAttribute('aria-hidden','false');
    document.body.style.overflow='hidden';
  };
  const close=()=>{
    lightbox.classList.remove('show');
    lightbox.setAttribute('aria-hidden','true');
    document.body.style.overflow='';
  };
  const prev=()=>{index=(index-1+images.length)%images.length;render();};
  const next=()=>{index=(index+1)%images.length;render();};

  document.querySelectorAll('.proj.has-gallery').forEach(card=>{
    const openFromCard=()=>{
      try{
        const imgs=JSON.parse(card.dataset.gallery||'[]');
        open(imgs,0);
      }catch(err){/* malformed gallery data, ignore */}
    };
    card.addEventListener('click',openFromCard);
    card.addEventListener('keydown',e=>{if(e.key==='Enter'||e.key===' '){e.preventDefault();openFromCard();}});
  });

  lbClose?.addEventListener('click',close);
  lbPrev?.addEventListener('click',prev);
  lbNext?.addEventListener('click',next);
  lightbox.addEventListener('click',e=>{if(e.target===lightbox)close();});
  addEventListener('keydown',e=>{
    if(!lightbox.classList.contains('show'))return;
    if(e.key==='Escape')close();
    if(e.key==='ArrowLeft')prev();
    if(e.key==='ArrowRight')next();
  });
})();

/* ---- Form ---- */
const form=document.getElementById('quoteForm'),toast=document.getElementById('toast');
if(form){
  form.addEventListener('submit',e=>{
    e.preventDefault();
    toast?.classList.add('show');
    form.reset();
    setTimeout(()=>toast?.classList.remove('show'),3200);
  });
}
