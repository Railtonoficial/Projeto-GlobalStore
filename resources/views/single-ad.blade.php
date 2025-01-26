<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Open+Sans:ital@0;1&family=Oswald:wght@400;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="/assets/style.css" />
    <link rel="stylesheet" href="/assets/adPageStyle.css" />
    <link rel="stylesheet" href="/assets/myAdsStyle.css" />
    <title>GlobalStore</title>
</head>

<body>
    <x-base.header />
    <main>
        <div class="ad-area">
            <livewire:gallery :images="$ad->images" />
            <div class="ad-area-right">
                <div class="categories-state">{{ $ad->state->name }} / {{ $ad->category->name }}</div>
                <div class="ad-page-title">{{ $ad->title }}</div>
                <div class="ad-page-date">Publicado em {{ $ad->created_at->format('d/m/Y') }} às {{ $ad->created_at->format('H:i') }}</div>
                <div class="ad-page-price">R$ {{ $ad->price_formatted }}</div>

                @if ($ad->negotiable)
                <div class="contact">
                    <img src="/assets/icons/wppIcon.png" />
                    <div class="contact-text">Negociável</div>
                </div>
                <div class="negociable">*Esse valor poderá ser negociado.</div>
                @endif

                <div class="ad-page-text">
                    {{ $ad->description }}
                </div>
                <button onclick="callme('{{ $ad->contact }}', '{{ $ad->title }}')" class="get-touch">Entrar em contato</button>
                <div class="views">
                    <img src="/assets/icons/eyeGrayIcon.png" />
                    <div class="views-text">{{ $ad->views }} visualizações neste anúncio</div>
                </div>
            </div>
        </div>
        <div class="ads">
            <div class="ads-title">Anúncios relacionados</div>
            <div class="ads-area">
            @if(count($relatedAds) > 0)
                @foreach($relatedAds as $ad)
                    <x-basic-ad :ad="$ad" />
                @endforeach
            @else
                <span>Não há anúcios relacionados para exibir</span>
            @endif
            </div>
        </div>
    </main>
    <x-base.footer />
    <script>
        function callme(number, title) {
            var message = `Olá, vi seu anúcio "${title}" no GlobalStore e gostaria de mais informações.`;
            window.open(`https://wa.me/55${number}?text=${message}`, '_blank');
        }
    </script>
</body>

</html>
