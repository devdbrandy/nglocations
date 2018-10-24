<!-- HTML for static distribution bundle build -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ config('l5-swagger.api.title') }}</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Source+Code+Pro:300,600|Titillium+Web:400,600,700" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  {{-- <link rel="stylesheet" href="{{ asset('swagger/css/theme-material.css') }}"> --}}
  <link rel="stylesheet" type="text/css" href="{{ l5_swagger_asset('swagger-ui.css') }}" >
  <link rel="icon" type="image/png" href="{{ l5_swagger_asset('favicon-32x32.png') }}" sizes="32x32" />
  <link rel="icon" type="image/png" href="{{ l5_swagger_asset('favicon-16x16.png') }}" sizes="16x16" />
  <style>
    html
    {
        box-sizing: border-box;
        overflow: -moz-scrollbars-vertical;
        overflow-y: scroll;
    }
    *,
    *:before,
    *:after
    {
        box-sizing: inherit;
    }

    body {
      margin:0;
      background: #fafafa;
    }

    .col.response-col_status,
    .col.parameters-col_name {
        width: 20%;
    }

    .col.response-col_description {
        width: 60%;
    }

    span.url,
    .scheme-container,
    .topbar-wrapper.download-url-wrapper,
    .swagger-ui .topbar .download-url-wrapper,
    .swagger-ui .info .title small:nth-of-type(2) {
        display: none !important;
    }
  </style>
</head>

<body>

<div class="container">
    <div id="swagger-ui"></div>
</div>

<script src="{{ l5_swagger_asset('swagger-ui-bundle.js') }}"> </script>
<script src="{{ l5_swagger_asset('swagger-ui-standalone-preset.js') }}"> </script>
<script>
window.onload = function() {
  // Build a system
  const ui = SwaggerUIBundle({
    dom_id: '#swagger-ui',

    url: "{!! $urlToDocs !!}",
    operationsSorter: {!! isset($operationsSorter) ? '"' . $operationsSorter . '"' : 'null' !!},
    configUrl: {!! isset($configUrl) ? '"' . $configUrl . '"' : 'null' !!},
    validatorUrl: {!! isset($validatorUrl) ? '"' . $validatorUrl . '"' : 'null' !!},
    oauth2RedirectUrl: "{{ route('l5-swagger.oauth2_callback') }}",

    requestInterceptor: function() {
      this.headers['X-CSRF-TOKEN'] = '{{ csrf_token() }}';
      return this;
    },

    presets: [
      SwaggerUIBundle.presets.apis,
      SwaggerUIStandalonePreset
    ],

    plugins: [
      SwaggerUIBundle.plugins.DownloadUrl
    ],

    layout: "StandaloneLayout"
  })

  window.ui = ui

  // Customize site title
  const titleSpan = document.querySelector('.swagger-ui .topbar a span');
  titleSpan.innerHTML = 'NGLocations';
}
</script>
</body>

</html>
