<!DOCTYPE html>
<html lang="pl-PL">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet" type="text/css">
  <link href="style1.css" rel="stylesheet" type="text/css">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
  
  <link href="autocompleter.css" rel="stylesheet" type="text/css">
  <script src="autocompleter.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js" integrity="sha512-JZSo0h5TONFYmyLMqp8k4oPhuo6yNk9mHM+FY50aBjpypfofqtEWsAgRDQm94ImLCzSaHeqNvYuD9382CEn2zw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <title>Szukaj w Google</title>
</head>

<body>
  <div id="app" :class="[isActive ==1 ? 'results' : 'home']">
    <nav class="nawi">
      <a href="#">Gmail</a>
      <a href="#">Grafika</a>
      <img src="img/menu.png">
      <button>Zaloguj się</button>
    </nav>
    <section class="section-1">
      <img src="img/logo.png" class="logo">
      <form>
        <br><br>
        <div class="s-box">
        <div>
        <img src="img/search.svg" class="search-icon">
        <input :value="value" @keydown.enter="zmienStrone" v-model="googleSearch" type="text" class="s-input" @keyup.down="goTo(activeResult + 1)" @keyup.up="goTo(activeResult - 1)" @input="findResultsDebounced">
        <img src="img/tia.jpg" class="tia-icon"><div class="miasta">
        <ul class="numeracja1">
        <li v-for="(city, index) in results" :key="city.name" :class="{active : autocompleterIsActive && activeResult === index}" @click="handleClick(city.name)">
        <div class="podpowiedzi" v-html="highlight(city.name)">
        </div>
        </li>
        </ul>
        </div>
        </div>
          <input type="submit" class="s-btn" value="Szukaj w Google">
          <input type="submit" class="s-btn" value="Szczęśliwy traf">
        </div>
      </form>
    </section>
    <footer class="stop">
      <h4>Polska</h4>
      <div class="links">
        <div class="link-1">
          <a href="#">O nas</a>
          <a href="#">Reklamuj się</a>
          <a href="#">Dla firm</a>
          <a href="#">Jak działa wyszukiwarka</a>
        </div>
        <div class="link-2">
          <img src="img/cr.png" class="cr-icon">
          <a href="#">Neutralność węglowa od 2007 roku</a>
        </div>
        <div class="link-3">
          <a href="#">Prywatność</a>
          <a href="#">Warunki</a>
          <a href="#">Ustawienia</a>
        </div>
      </div>
    </footer>


    <div class="sekcja1">
      <img src="img/logo.png" class="logo">
      <div class="wpisywanie">
        <input type="text" class="s-input" ref="second" v-model="googleSearch">
        <span class="linia"></span>
        <img src="img/search.PNG" class="search-icon2">
        <img src="img/klawiatura.PNG" class="tia-icon">
        <img src="img/vs.png" class="vs-icon">
        <img src="img/x.png" class="x-icon">
        <div class="panel">
          <img src="img/menu.png">
          <button>Zaloguj się</button>
        </div>


        <div class="pasek">
          <div class="a1">
            <img src="img/s1.PNG" class="i">
            <a class="link1" href="#">Wszystko</a>
          </div>
          <div class="a1">
            <img src="img/grafika.PNG" class="w">
            <a href="#">Grafika</a>
          </div>
          <div class="a1">
            <img src="img/wideo.PNG" class="w">
            <a href="#">Wideo</a>
          </div>
          <div class="a1">
            <img src="img/wiadomosci.PNG" class="w">
            <a href="#">Wiadomości </a>
          </div>
          <div class="a1">
            <img src="img/zakupy.PNG" class="w">
            <a href="#">Zakupy</a>
          </div>
          <div class="a1">
            <img src="img/wiecej.PNG" class="w">
            <a href="#">Więcej</a>
          </div>
          <div class="a1">
            <a href="#">Ustawienia</a>
          </div>
          <div class="a1">
            <a href="#">Narzędzia</a>
          </div>
          <span class="kreska"></span>
          <span class="kreska2"></span>
        </div>
      </div>
      <div class="wyniki">
        <div class="liczba">
          Około 20 000 000 wyników (0,50s)
        </div>
        <div class="wynik">
          <a href="#" class="link2">support.google.com > websearch > answer
            <img src="img/tr.png" class="tr"></a>
          <div class="n1">Sprawdzanie wyników wyszukiwania podróży przez Gmail...</div>
          <div class="n2">Zobacz wyniki z innego konta Google. Uwaga: aby wykonać te czynności, musisz
            zalogować <br>
            się na konto Google. Na telefonie lub tablecie z Androidem otwórz...</div>
          <div class="n3">Brakujące: <s>jakiś</s> | Musi zawierać słowo: jakiś</div>
        </div>
        <div class="wynik">
          <a href="#" class="link2">support.google.com > websearch > answer <img src="img/tr.png" class="tr"></a>
          <div class="n1">Zawężanie wyników wyszukiwania - Wyszukiwarka Google...</div>
          <div class="n2">Możesz zwiększyć precyzję wyników wyszukiwania, używająć w zapytaniu słów i symboli.
            <br> Wyszukiwarka Google zwykle ignoruje znaki interpunkcyjne,które nie...
          </div>
        </div>
        <div class="wynik">
          <a href="#" class="link2">www.pozycjonusz.pl>rodzaje-wynikow-wyszukiwania... <img src="img/tr.png"
              class="tr"></a>
          <div class="n1">Rodzaje wyników wyszukiwania Google - ponad 20 ...</div>
          <div class="n2">7) Wewnętrzna wyszukiwarka. Rodzaje wyników wyszukiwania Google wzbogacono jakiś
            czas<br>
            temu o funkcję wewnętrznej wyszukiwarki. To rozwiązanie, bez...
          </div>
        </div>
        <div class="wynik">
          <a href="#" class="link2">widoczni.com>blog>jak-wyszukiwac-w-google <img src="img/tr.png" class="tr"></a>
          <div class="n1">14 sposobów wyszukiwania w Google, których 95% z Was nie...</div>
          <div class="n2">Szukanie frazy - zastosowanie cudzysłowu. Wyniki wyszukiwania w Google konkretnych
            fraz<br>
            mogą być bardziej trafne, gdy zastosujemy cudzysłów. Algorytmy...
          </div>
          <div class="n4">Na czym polega zaawansowane wyszukiwanie Google? <img src="img/tr2.PNG" class="tr2">
          </div>
          <div class="n4">Jakich komend użyć do wyszukiwania w Google? <img src="img/tr2.PNG" class="tr2">
          </div>
          <div class="n4">Gdzie znaleźć informacje na temat zawężania wyników wyszukiwania? <img src="img/tr2.PNG"
              class="tr2"></div>
          <div class="n4"><img src="img/tr2.PNG" class="tr2"> Pokaż więcej</div>
        </div>

        <div class="n5">
          <b>Wyszukiwania podobne:</b>
        </div>
        <div class="n6">
          Google Trends
          <br>Zasady wyszukiwania w Google
        </div>
      </div>
      <footer class="stop2">
        <div class="links">
          <div class="link-1">
            <a href="#">O nas</a>
            <a href="#">Reklamuj się</a>
            <a href="#">Dla firm</a>
            <a href="#">Jak działa wyszukiwarka</a>
          </div>
          <div class="link-3">
            <a href="#">Prywatność</a>
            <a href="#">Warunki</a>
            <a href="#">Ustawienia</a>
          </div>
        </div>
      </footer>
    </div>

  </div>

</body>
<script>
  var app = new Vue({
    el: '#app',
    data: {
      isActive: 0,
      googleSearch: '',
      results: [],
      isOnResults: false,
      activeResult: 0,
      autocompleterIsActive: false,
    },
    methods: {
      zmienStrone: function () {
        event.preventDefault()
        this.isActive = 1
      },  
      findResultsDebounced : Cowboy.debounce(100, function findResultsDebounced() {
                console.log('Fetch: ', this.googleSearch)
                fetch('http://localhost/search?name=' + this.googleSearch)
                    .then(response => {
                      return response.json()
                    }) 
                    .then(data => {
                        console.log('Data: ', data);
                        this.results = data;
                        if (this.results.length > 10) {
                          this.results = this.results.slice(0, 10)
                        }
                        console.log('results: ', this.results);
                    })
                    }),
      highlight: function (wyraz) {
      return wyraz.replaceAll(this.googleSearch, '<span class="highlight">' + this.googleSearch + '</span>')
    },
    goTo(index) {
      if (!this.autocompleterIsActive) {
        index = 0;
      }

      if (index > this.results.length - 1) {
        index = 0;
      } else if (index < 0) {
        index = this.results.length - 1;
      }

      this.autocompleterIsActive = true;
      this.activeResult = index;
      this.googleSearch = this.results[index].name;
    },
    handleClick: function (name) {
      this.googleSearch = name;
      this.isActive = 1;
      
    },

     }
            
      

  });
</script>

</html>