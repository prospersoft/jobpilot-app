<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? config('app.name') }}</title>

<!-- Light mode favicon -->
<link rel="icon" type="image/x-icon" href="/images/jpb.png" media="(prefers-color-scheme: light)" class="">
<!-- Dark mode favicon -->
<link rel="icon" type="image/x-icon" href="/images/jp.png" media="(prefers-color-scheme: dark)" class="">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
