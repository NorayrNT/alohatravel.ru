<meta property="og:url"           content="{{url()->current()}}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="{{ !is_null($tour) ? $tour->name : config('app.name') }}" />
<meta property="og:description"   content="Alooha Travel -  Always Together" />
<meta property="og:image"         content="{{ !is_null($tour) ? asset($tour->seo_img) : asset('/uploads/images/default/alooha_travel.png') }}" />