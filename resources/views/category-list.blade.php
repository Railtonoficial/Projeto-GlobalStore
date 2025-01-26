<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Open+Sans:ital@0;1&family=Oswald:wght@400;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="/assets/style.css" />
    <link rel="stylesheet" href="/assets/adsListStyle.css" />
    <link rel="stylesheet" href="/assets/myAdsStyle.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>GlobalStore - Anúncios</title>
</head>

<body>
    <x-base.header />
    <main>
        <div class="ads">
            <div class="ads-title">Anúcios da categoria <b>{{ $category->name }}</b></div>
            <div class="ads-area">
            @if(count($filteredAds) > 0)
                @foreach($filteredAds as $ad)
                <x-basic-ad :ad="$ad" />
                @endforeach
            @else
                <span>Não há anúcios para exibir</span>
                @endif
            </div>
            <div class="mt-8">
                <div class="text-black bg-white dark:bg-white !important">
                    {{ $filteredAds->links() }}
                </div>
            </div>
        </div>
    </main>
    <x-base.footer />
</body>

</html>
