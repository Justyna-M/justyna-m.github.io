Vue.component('v-autocompleter', {
  template: '<div><img src="img/search.svg" class="search-icon"><input :value="value" @change="signalChange" @keydown.enter="zmienStrone" v-model="googleSearch" type="text" class="s-input" ref="first" @keyup.down="goTo(activeResult + 1)" @keyup.up="goTo(activeResult - 1)"><img src="img/tia.jpg" class="tia-icon"><div class="miasta"><ul class="numeracja1"><li v-for="(city, index) in filteredCities" :class="{active : autocompleterIsActive && activeResult === index}" @click="handleClick(city.name)"><div class="podpowiedzi" v-html="highlight(city.name)"></div></li></ul></div></div>',
  props: {
    value: {
      type: String,
      default: ""
    }
  },
  data: function () {
    return {
      googleSearch: '',
      isActive: 0,
      cities: window.cities,
      isOnResults: false,
      activeResult: 0,
      autocompleterIsActive: false,
      filteredCities: [],
    }
  },
  methods: {
    handleClick: function (name) {
      this.googleSearch = name;
      this.isActive = 1;
      this.$emit('enter', this.googleSearch)
    },
    highlight: function (wyraz) {
      return wyraz.replaceAll(this.googleSearch, '<span class="highlight">' + this.googleSearch + '</span>')
    },
    zmienStrone: function () {
      this.$emit('enter', this.googleSearch)
    },
    signalChange: function () {
      this.$emit('input')
    },
    goTo(index) {
      if (!this.autocompleterIsActive) {
        index = 0;
      }

      if (index > this.filteredCities.length - 1) {
        index = 0;
      } else if (index < 0) {
        index = this.filteredCities.length - 1;
      }

      this.autocompleterIsActive = true;
      this.activeResult = index;
      this.googleSearch = this.filteredCities[index].name;
    },
  },
  computed: {
    value: function () {
      if (this.autocompleterIsActive) {
        //console.log("dziala")
        return
      }
      if (this.googleSearch.length == 0) {
        return
      }
      let wynik = this.cities.filter(city => city.name.includes(this.googleSearch))
      if (wynik.length > 10) {
        wynik = wynik.slice(0, 10)
      }
      //console.log("watch dziala")
      //return wynik
      this.filteredCities = wynik;
    }
  },

  // nie wiem dlaczego watch nie dzała 
  // próbowałam dostosować swoje rozwiązanie 
  // oraz użyć rozwiązania z zajęć- bezskutecznie


  //   watch : {
  //     filteredCities: function() {
  //         if (this.autocompleterIsActive) {
  //             return;
  //         }
  //         if (this.googleSearch.length === 0) {
  //             filteredCities = [];
  //             return;
  //         }
  //         let returnedCities = [];
  //         let searchLowerCase = this.googleSearch.toLowerCase();

  //         this.cities.forEach((cityData) => {
  //             if (returnedCities.length === 10 || !cityData.nameLowerCase.includes(searchLowerCase)) {
  //                 return;
  //             }
  //             returnedCities.push({
  //                 name: cityData.name,
  //                 nameHtml: cityData.nameLowerCase.replace(searchLowerCase, (match) => {
  //                     return '<span class="bold">' + match + '</span>';
  //                 })
  //             })
  //         });

  //         return returnedCities;
  //     }
  // },
  // computed : {
  //     cssClasses() {
  //         return {
  //             results: this.isOnResults
  //         }
  //     }
  // },
})