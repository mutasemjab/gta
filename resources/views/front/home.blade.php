@extends('layouts.front')
@section('title', __('messages.page_title'))

@section('content')

@php $ar = app()->getLocale() === 'ar'; @endphp

<!-- HERO -->
<section class="hero" id="home">
  <div class="blob a"></div><div class="blob b"></div>
  <div class="wrap hero-grid">
    <div class="hero-copy">
      <span class="hero-eye eyebrow"><i class="dot"></i>{{ $ar ? $hero->eyebrow_ar : $hero->eyebrow_en }}</span>
      <h1>{{ $ar ? $hero->heading_line1_ar : $hero->heading_line1_en }}<br>
        <span class="accent">{{ $ar ? $hero->heading_highlight_ar : $hero->heading_highlight_en }}</span><br>
        {{ $ar ? $hero->heading_line2_ar : $hero->heading_line2_en }}</h1>
      <p class="lead">{{ $ar ? $hero->lead_ar : $hero->lead_en }}</p>
      <div class="hero-actions">
        <a href="{{ $hero->primary_btn_link }}" class="btn btn-cream">{{ __('messages.hero_btn_primary') }}
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
        <a href="{{ $hero->secondary_btn_link }}" class="btn btn-ghost" style="color:#fff;border-color:rgba(255,255,255,.35)">{{ __('messages.hero_btn_secondary') }}</a>
      </div>
      <div class="hero-stats">
        @foreach($heroStats as $stat)
        <div class="s"><b data-count="{{ $stat->value }}" data-suffix="{{ $stat->suffix }}">0</b><span>{{ $ar ? $stat->label_ar : $stat->label_en }}</span></div>
        @endforeach
      </div>
    </div>
    <div class="stage">
      <div class="tilefield" id="tilefield"></div>
    </div>
  </div>
  @if($hero->strip_text)
  <div class="hero-ar">{{ $hero->strip_text }}</div>
  @endif
</section>

<div class="wrap"><div class="grout"></div></div>

<!-- ABOUT -->
<section class="section" id="about">
  <div class="wrap about-grid">
    <div class="about-visual reveal">
      <div class="mark"><svg viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg"><polygon points="6.0,118.0 150.0,190.0 150.0,210.0 6.0,138.0" fill="#BEB4A6"/><polygon points="150.0,190.0 294.0,118.0 294.0,138.0 150.0,210.0" fill="#D4CBC0"/><polygon points="150.0,46.0 294.0,118.0 150.0,190.0 6.0,118.0" fill="#D4CBC0" opacity="0.0"/><polygon points="150.0,46.0 198.0,70.0 150.0,94.0 102.0,70.0" fill="#3C6469" stroke="#F5F2EC" stroke-width="3" stroke-linejoin="round"/><polygon points="198.0,70.0 246.0,94.0 198.0,118.0 150.0,94.0" fill="#D4CBC0" stroke="#F5F2EC" stroke-width="3" stroke-linejoin="round"/><polygon points="246.0,94.0 294.0,118.0 246.0,142.0 198.0,118.0" fill="#3C6469" stroke="#F5F2EC" stroke-width="3" stroke-linejoin="round"/><polygon points="102.0,70.0 150.0,94.0 102.0,118.0 54.0,94.0" fill="#3C6469" stroke="#F5F2EC" stroke-width="3" stroke-linejoin="round"/><polygon points="150.0,94.0 198.0,118.0 150.0,142.0 102.0,118.0" fill="#D4CBC0" stroke="#F5F2EC" stroke-width="3" stroke-linejoin="round"/><polygon points="198.0,118.0 246.0,142.0 198.0,166.0 150.0,142.0" fill="#3C6469" stroke="#F5F2EC" stroke-width="3" stroke-linejoin="round"/><polygon points="54.0,94.0 102.0,118.0 54.0,142.0 6.0,118.0" fill="#3C6469" stroke="#F5F2EC" stroke-width="3" stroke-linejoin="round"/><polygon points="102.0,118.0 150.0,142.0 102.0,166.0 54.0,142.0" fill="#3C6469" stroke="#F5F2EC" stroke-width="3" stroke-linejoin="round"/><polygon points="150.0,142.0 198.0,166.0 150.0,190.0 102.0,166.0" fill="#3C6469" stroke="#F5F2EC" stroke-width="3" stroke-linejoin="round"/></svg></div>
      @if($about->badge_title)
      <div class="badge">
        <b>{{ $about->badge_title }}</b>
        <span>{{ $ar ? $about->badge_text_ar : $about->badge_text_en }}</span>
      </div>
      @endif
    </div>
    <div class="about-copy">
      <div class="head reveal" style="margin-bottom:24px">
        <span class="eyebrow">{{ $ar ? $about->eyebrow_ar : $about->eyebrow_en }}</span>
        <h2>{{ $ar ? $about->title_ar : $about->title_en }}</h2>
      </div>
      <p class="lead-line reveal d1">{{ $ar ? $about->lead_ar : $about->lead_en }}</p>
      <p class="reveal d1">{{ $ar ? $about->paragraph1_ar : $about->paragraph1_en }}</p>
      <p class="reveal d2">{{ $ar ? $about->paragraph2_ar : $about->paragraph2_en }}</p>
      <div class="pill-row reveal d3">
        @foreach($aboutPills as $pill)
        <span class="pill">{{ $ar ? $pill->name_ar : $pill->name_en }}</span>
        @endforeach
      </div>
    </div>
  </div>
  <div class="wrap">
    <div class="stats-strip reveal">
      @foreach($aboutStats as $stat)
      <div class="cell"><b data-count="{{ $stat->value }}" data-suffix="{{ $stat->suffix }}">0</b><span>{{ $ar ? $stat->label_ar : $stat->label_en }}</span></div>
      @endforeach
    </div>
  </div>
</section>

<div class="wrap"><div class="grout"></div></div>

<!-- SERVICES -->
<section class="section" id="services">
  <div class="wrap">
    <div class="head reveal">
      <span class="eyebrow">{{ __('messages.services_eyebrow') }}</span>
      <h2>{{ __('messages.services_title') }}</h2>
      <p>{{ __('messages.services_desc') }}</p>
    </div>
    <div class="svc-grid">
      @foreach($services as $i => $service)
      <div class="svc reveal{{ $i % 3 ? ' d' . ($i % 3) : '' }}">
        <span class="num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
        <div class="ico">
          @if($service->icon)
            <img src="{{ $service->icon }}" alt="" style="width:26px;height:26px">
          @else
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"><path d="M12 2l8 4v6c0 5-3.5 8-8 10-4.5-2-8-5-8-10V6l8-4z"/><path d="M9 12l2 2 4-4"/></svg>
          @endif
        </div>
        <h3>{{ $ar ? $service->title_ar : $service->title_en }}</h3>
        <p>{{ $ar ? $service->description_ar : $service->description_en }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="wrap"><div class="grout"></div></div>

<!-- PRODUCTS -->
<section class="section" id="products">
  <div class="wrap">
    <div class="head reveal">
      <span class="eyebrow">{{ __('messages.products_eyebrow') }}</span>
      <h2>{{ __('messages.products_title') }}</h2>
      <p>{{ __('messages.products_desc') }}</p>
    </div>
    <div class="prod-grid">
      @foreach($products as $i => $product)
      <div class="prod reveal{{ $i % 4 ? ' d' . ($i % 4) : '' }}">
        <div class="top"><div class="pat"></div>
          @if($product->chip_label)<span class="chip">{{ $product->chip_label }}</span>@endif
          @if($product->code)<span class="code">{{ $product->code }}</span>@endif
        </div>
        <div class="body">
          <h3>{{ $ar ? $product->name_ar : $product->name_en }}</h3>
          <p>{{ $ar ? $product->description_ar : $product->description_en }}</p>
          @if($product->spec_value)
          <div class="spec"><span>{{ $ar ? $product->spec_label_ar : $product->spec_label_en }}</span><b>{{ $product->spec_value }}</b></div>
          @endif
        </div>
      </div>
      @endforeach
    </div>
    <div style="text-align:center;margin-top:44px" class="reveal">
      <a href="#catalog" class="btn btn-primary">{{ __('messages.products_cta') }}
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
      </a>
    </div>
  </div>
</section>

<!-- CATALOG -->
<section class="section" id="catalog">
  <div class="wrap">
    <div class="head reveal">
      <span class="eyebrow">{{ __('messages.catalog_eyebrow') }}</span>
      <h2>{{ __('messages.catalog_title') }}</h2>
      <p>{{ __('messages.catalog_desc') }}</p>
    </div>
    <div class="cat-grid">
      @foreach($catalogItems as $i => $item)
      <div class="cat reveal{{ $i % 3 ? ' d' . ($i % 3) : '' }}">
        <div class="fico"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"><path d="M4 4h10l6 6v10H4z"/><path d="M14 4v6h6"/></svg></div>
        <span class="meta">{{ $ar ? $item->meta_label_ar : $item->meta_label_en }}</span>
        <h3>{{ $ar ? $item->title_ar : $item->title_en }}</h3>
        <p>{{ $ar ? $item->description_ar : $item->description_en }}</p>
        <div class="cat-downloads">
          @if($item->file_ar)
          <a class="dl" href="{{ $item->file_ar }}" download>{{ __('messages.datasheet_ar') }}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 3v13M6 11l6 6 6-6M5 21h14"/></svg>
          </a>
          @endif
          @if($item->file_en)
          <a class="dl" href="{{ $item->file_en }}" download>{{ __('messages.datasheet_en') }}
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 3v13M6 11l6 6 6-6M5 21h14"/></svg>
          </a>
          @endif
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="wrap"><div class="grout"></div></div>

<!-- PROJECTS -->
<section class="section" id="projects">
  <div class="wrap">
    <div class="head reveal">
      <span class="eyebrow">{{ __('messages.projects_eyebrow') }}</span>
      <h2>{{ __('messages.projects_title') }}</h2>
      <p>{{ __('messages.projects_desc') }}</p>
    </div>
    <div class="proj-grid">
      @foreach($projects as $i => $project)
      <div class="proj {{ $project->size === 'big' ? 'big' : 'sm' }} p{{ ($i % 4) + 1 }} reveal{{ $i % 2 ? ' d1' : '' }}"
           @if($project->image) style="background-image:linear-gradient(180deg,transparent 30%,rgba(21,42,45,.86) 100%), url('{{ $project->image }}');background-size:cover;background-position:center" @endif>
        <div class="grid-tex"></div>
        <span class="cat-tag">{{ $ar ? $project->category_ar : $project->category_en }}</span>
        <div><h3>{{ $ar ? $project->title_ar : $project->title_en }}</h3><span class="loc">{{ $ar ? $project->location_ar : $project->location_en }}</span></div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="wrap"><div class="grout"></div></div>

<!-- AGENTS -->
<section class="section" id="agents">
  <div class="wrap">
    <div class="head center reveal">
      <span class="eyebrow">{{ __('messages.agents_eyebrow') }}</span>
      <h2>{{ __('messages.agents_title') }}</h2>
    </div>
  </div>
  <div class="marquee reveal">
    <div class="mtrack">
      @foreach($agents as $agent)
      <span class="client">
        @if($agent->logo)<img src="{{ $agent->logo }}" alt="{{ $agent->name }}" style="height:22px">@else<i class="d"></i>{{ $agent->name }}@endif
      </span>
      @endforeach
    </div>
    <div class="mtrack" aria-hidden="true">
      @foreach($agents as $agent)
      <span class="client">
        @if($agent->logo)<img src="{{ $agent->logo }}" alt="{{ $agent->name }}" style="height:22px">@else<i class="d"></i>{{ $agent->name }}@endif
      </span>
      @endforeach
    </div>
  </div>
</section>

<div class="wrap"><div class="grout"></div></div>

<!-- CLIENTS -->
<section class="section" id="clients">
  <div class="wrap">
    <div class="head center reveal">
      <span class="eyebrow">{{ __('messages.clients_eyebrow') }}</span>
      <h2>{{ __('messages.clients_title') }}</h2>
    </div>
  </div>
  <div class="marquee reveal">
    <div class="mtrack">
      @foreach($clients as $client)
      <span class="client">
        @if($client->logo)<img src="{{ $client->logo }}" alt="{{ $client->name }}" style="height:22px">@else<i class="d"></i>{{ $client->name }}@endif
      </span>
      @endforeach
    </div>
    <div class="mtrack" aria-hidden="true">
      @foreach($clients as $client)
      <span class="client">
        @if($client->logo)<img src="{{ $client->logo }}" alt="{{ $client->name }}" style="height:22px">@else<i class="d"></i>{{ $client->name }}@endif
      </span>
      @endforeach
    </div>
  </div>
</section>

@if($videos->isNotEmpty())
<div class="wrap"><div class="grout"></div></div>

<!-- REELS -->
<section class="section" id="reels">
  <div class="wrap">
    <div class="head center reveal">
      <span class="eyebrow">{{ __('messages.reels_eyebrow') }}</span>
      <h2>{{ __('messages.reels_title') }}</h2>
      <p>{{ __('messages.reels_desc') }}</p>
    </div>
  </div>
  <div class="wrap">
    <div class="reels-track">
      @foreach($videos as $video)
      <div class="reel-card reveal{{ $loop->index % 3 ? ' d' . ($loop->index % 3) : '' }}">
        <video class="reel-video" src="{{ $video->video }}" @if($video->thumbnail) poster="{{ $video->thumbnail }}" @endif
               muted loop playsinline preload="metadata"></video>
        <button type="button" class="reel-play" aria-label="Play">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
        </button>
        @if($video->title_ar || $video->title_en)
        <span class="reel-caption">{{ $ar ? $video->title_ar : $video->title_en }}</span>
        @endif
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<div class="wrap"><div class="grout"></div></div>

<!-- CONTACT -->
<section class="section" id="contact">
  <div class="wrap">
    <div class="head reveal">
      <span class="eyebrow">{{ __('messages.contact_eyebrow') }}</span>
      <h2>{{ __('messages.contact_title') }}</h2>
      <p>{{ __('messages.contact_desc') }}</p>
    </div>
    <div class="contact-grid">
      <div class="contact-info reveal">
        <h3>{{ __('messages.contact_reach_title') }}</h3>
        <p>{{ __('messages.contact_reach_desc') }}</p>
        <div class="cinfo"><div class="ci"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><path d="M22 16.9v3a2 2 0 01-2.2 2 19.8 19.8 0 01-8.6-3 19.5 19.5 0 01-6-6 19.8 19.8 0 01-3-8.6A2 2 0 014.1 2h3a2 2 0 012 1.7c.1.9.3 1.8.7 2.7a2 2 0 01-.5 2.1L8.1 9.9a16 16 0 006 6l1.4-1.2a2 2 0 012.1-.5c.9.4 1.8.6 2.7.7a2 2 0 011.7 2z"/></svg></div><div><b>{{ __('messages.contact_label_phone') }}</b><span>{{ $contactInfo->phone }}</span></div></div>
        <div class="cinfo"><div class="ci"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><path d="M4 4h16v16H4z"/><path d="M4 6l8 6 8-6"/></svg></div><div><b>{{ __('messages.contact_label_email') }}</b><span>{{ $contactInfo->email }}</span></div></div>
        <div class="cinfo"><div class="ci"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><path d="M12 22s8-6 8-12A8 8 0 004 10c0 6 8 12 8 12z"/><circle cx="12" cy="10" r="3"/></svg></div><div><b>{{ __('messages.contact_label_address') }}</b><span>{{ $ar ? $contactInfo->address_ar : $contactInfo->address_en }}</span></div></div>
        <div class="cinfo"><div class="ci"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg></div><div><b>{{ __('messages.contact_label_hours') }}</b><span>{{ $ar ? $contactInfo->hours_ar : $contactInfo->hours_en }}</span></div></div>
      </div>
      <form class="form reveal d1" id="quoteForm">
        <div class="f-row">
          <div class="field"><label>{{ __('messages.form_full_name') }}</label><input type="text" name="name" placeholder="{{ __('messages.form_name_placeholder') }}" required /></div>
          <div class="field"><label>{{ __('messages.form_company') }}</label><input type="text" name="company" placeholder="{{ __('messages.form_company_placeholder') }}" /></div>
        </div>
        <div class="f-row">
          <div class="field"><label>{{ __('messages.form_email') }}</label><input type="email" name="email" placeholder="{{ __('messages.form_email_placeholder') }}" required /></div>
          <div class="field"><label>{{ __('messages.form_phone') }}</label><input type="tel" name="phone" placeholder="{{ __('messages.form_phone_placeholder') }}" /></div>
        </div>
        <div class="field"><label>{{ __('messages.form_product_interest') }}</label>
          <select name="product">
            <option>{{ __('messages.form_opt_tile_adhesives') }}</option><option>{{ __('messages.form_opt_tile_grout') }}</option>
            <option>{{ __('messages.form_opt_waterproofing') }}</option><option>{{ __('messages.form_opt_sealants') }}</option><option>{{ __('messages.form_opt_full_supply') }}</option>
          </select>
        </div>
        <div class="field"><label>{{ __('messages.form_project_details') }}</label><textarea name="message" placeholder="{{ __('messages.form_message_placeholder') }}"></textarea></div>
        <button type="submit" class="btn btn-primary">{{ __('messages.form_submit') }}
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
        </button>
        <p class="form-note">{{ __('messages.form_note') }}</p>
      </form>
    </div>
  </div>
</section>

<div class="toast" id="toast">
  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M20 6L9 17l-5-5"/></svg>
  <span>{{ __('messages.form_note') }}</span>
</div>

@endsection
