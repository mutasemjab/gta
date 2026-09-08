/* ---- NAV state ---- */
const nav=document.getElementById('nav');
addEventListener('scroll',()=>nav.classList.toggle('scrolled',scrollY>30));

/* ---- Mobile menu ---- */
const burger=document.getElementById('burger'),links=document.getElementById('navLinks');
burger.addEventListener('click',()=>{burger.classList.toggle('open');links.classList.toggle('open')});
links.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>{burger.classList.remove('open');links.classList.remove('open')}));

/* ---- Scroll reveal ---- */
const io=new IntersectionObserver((es)=>{
  es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}});
},{threshold:.16,rootMargin:'0px 0px -60px'});
document.querySelectorAll('.reveal').forEach(el=>io.observe(el));

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
addEventListener('scroll',()=>{
  let cur='';secs.forEach(s=>{if(scrollY>=s.offsetTop-120)cur=s.id});
  nlinks.forEach(a=>a.classList.toggle('active',a.getAttribute('href')==='#'+cur));
});

/* ---- Reels (click to play, one at a time) ---- */
document.querySelectorAll('.reel-card').forEach(card=>{
  const video=card.querySelector('.reel-video');
  const toggle=()=>{
    if(video.paused){
      document.querySelectorAll('.reel-card.playing').forEach(c=>{
        if(c!==card){c.classList.remove('playing');c.querySelector('.reel-video').pause();}
      });
      video.play();
      card.classList.add('playing');
    }else{
      video.pause();
      card.classList.remove('playing');
    }
  };
  card.querySelector('.reel-play').addEventListener('click',e=>{e.stopPropagation();toggle();});
  video.addEventListener('click',toggle);
  video.addEventListener('ended',()=>card.classList.remove('playing'));
});

/* ---- Form ---- */
const form=document.getElementById('quoteForm'),toast=document.getElementById('toast');
form.addEventListener('submit',e=>{
  e.preventDefault();
  toast.classList.add('show');
  form.reset();
  setTimeout(()=>toast.classList.remove('show'),3200);
});
