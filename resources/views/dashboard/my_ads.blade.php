<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/style.css" />
    <link rel="stylesheet" href="/assets/myAccountStyle.css" />
    <link rel="stylesheet" href="/assets/myAdsStyle.css" />

    <title>GlobalStore - Meus anúncios</title>
  </head>

  <body>
    <x-base.header />
    <main>
      <div class="my-ads-page">
        <div class="sidebar">
          <div class="sidebar-top">
            <a href="{{ route('my_account') }}" class="config-myAds"
              ><img src="/assets/icons/configIconGray.png" /> Configurações</a
            >
            <a href="{{ route('my_ads') }}" class="myAds-button"
              ><img src="/assets/icons/layersIcon.png" /> Meus Anúncios</a
            >
          </div>
          <div class="sidebar-bottom">
            <a href="{{ route('logout') }}"
              ><img src="/assets/icons/logoutIcon.png" /> Sair</a
            >
          </div>
        </div>
        <div class="myAds-area">
          <h3 class="myAds-title">Meus Anúncios</h3>
          <div class="myAds-ads-area">
        @if ($advertises->count() > 0)
            @foreach ($advertises as $ad)
                <x-basic-ad :ad="$ad" :canEdit="true" />
            @endforeach
        @else
            <span>Você ainda não possui anúncios</span>
        @endif
          </div>
        </div>
      </div>
    </main>
   <x-base.footer />
  </body>
</html>
