<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Trkacka berza') }}</title>
    <meta property="og:image" content="https://racing-corner.com/images/banner2.jpg">
    <meta name="description" content="Racing Corner is the ultimate platform for buying and selling racing cars, equipment, parts, and tires. Explore a wide range of listings from racing enthusiasts worldwide." />
    <meta name="keywords" content="racing cars, racing equipment, racing parts, racing tires, motorsports, buy and sell, racing community" />
    <meta name="author" content="Racing Corner" />
    <meta property="og:title" content="Racing Corner | Buy and Sell Racing Cars, Equipment, Parts, and Tires" />
    <meta property="og:description" content="Racing Corner is the ultimate platform for buying and selling racing cars, equipment, parts, and tires. Explore a wide range of listings from racing enthusiasts worldwide." />
    <meta property="og:image" content="https://racing-corner.com/images/banner2.jpg" />
    <meta property="og:url" content="https://www.racing-corner.com" />
    <meta name="twitter:card" content="https://racing-corner.com/images/banner2.jpg" />
    <meta name="twitter:site" content="@RacingCorner" />
    <meta name="twitter:title" content="Racing Corner | Buy and Sell Racing Cars, Equipment, Parts, and Tires" />
    <meta name="twitter:description" content="Racing Corner is the ultimate platform for buying and selling racing cars, equipment, parts, and tires. Explore a wide range of listings from racing enthusiasts worldwide." />
    <meta name="twitter:image" content="https://racing-corner.com/images/banner2.jpg" />
    <title>Trkacka berza | Kupovina i Prodaja Trkačkih Automobila, Opreme, Delova i Guma</title>
    <meta name="description" content="Racing Corner je ultimativna platforma za kupovinu i prodaju trkačkih automobila, opreme, delova i guma. Istražite širok spektar oglasa od ljubitelja trka iz celog sveta." />
    <meta name="keywords" content="trkački automobili, trkačka oprema, trkački delovi, trkačke gume, moto sport, kupi i prodaj, trkačka zajednica" />
    <meta name="author" content="Racing Corner" />
    <meta property="og:title" content="Trkacka berza | Kupovina i Prodaja Trkačkih Automobila, Opreme, Delova i Guma" />
    <meta property="og:description" content="Racing Corner je ultimativna platforma za kupovinu i prodaju trkačkih automobila, opreme, delova i guma. Istražite širok spektar oglasa od ljubitelja trka iz celog sveta." />
    <meta property="og:image" content="https://racing-corner.com/images/banner2.jpg" />
    <meta property="og:url" content="https://www.racing-corner.com" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@RacingCorner" />
    <meta name="twitter:title" content="Racing Corner | Kupovina i Prodaja Trkačkih Automobila, Opreme, Delova i Guma" />
    <meta name="twitter:description" content="Racing Corner je ultimativna platforma za kupovinu i prodaju trkačkih automobila, opreme, delova i guma. Istražite širok spektar oglasa od ljubitelja trka iz celog sveta." />
    <meta name="twitter:image" content="https://racing-corner.com/images/banner2.jpg" />
    <link rel="canonical" href="https://racing-corner.com/">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js'])
    @vite(['resources/css/ads.css'])
    @vite(['resources/css/style.css', 'resources/css/bootstrap/bootstrap.css'])
    @vite(['resources/css/flash.css'])
    @vite(['resources/css/admin.css'])
    @vite(['resources/js/bootstrap/bootstrap.js'])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
