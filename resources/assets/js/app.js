
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex';
Vue.use(Vuex)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('home', require('./components/home/Home.vue'));
Vue.component('catalogue', require('./components/home/Catalogue.vue'));
Vue.component('products', require('./components/Products.vue'));
Vue.component('categories', require('./components/Categories.vue'));
Vue.component('categoriessm', require('./components/Categoriessm.vue'));
Vue.component('paginateproducts', require('./components/PaginateProducts.vue'));
Vue.component('currency', require('./components/Currency.vue'));
Vue.component('currencylg', require('./components/CurrencyLg.vue'));

Vue.component('searchproducts',require('./components/Search.vue'));
Vue.component('sortproducts',require('./components/SortProducts.vue'))
Vue.component('sizefilter',require('./components/SizeFilter.vue'));
Vue.component('bestsellers',require('./components/BestSellers.vue'));
Vue.component('popularcategories',require('./components/PopularCategories.vue'));
Vue.component('productdetails',require('./components/ProductDetails.vue'));
Vue.component('relatedproducts',require('./components/RelatedProducts.vue'));
//login and register modals 
Vue.component('loginmodal', require('./components/Login.vue'));
Vue.component('registermodal', require('./components/Register.vue'));
Vue.component('favorites',require('./components/user/Favorites.vue'));
Vue.component('favoritescount',require('./components/user/FavoritesCount.vue'));
Vue.component('cart',require('./components/user/cart.vue'));
Vue.component('cartitemscount',require('./components/user/CartCount.vue'));

//the admin part 
Vue.component('productstable',require('./components/admin/ProductsTable.vue'));

const store = new Vuex.Store({
    state:{
      categories :[],
      activeCategory:'',
      products :[],
      currentProducts :[],
      currencies :{},
      currenciesSigns :{
        'USD':'$',
        'EUR':'€',
        'GBP':'£',
        'TRY':'₺'
      },
      currentCurrency:'USD',
      currencyRate :1,
      currencySign:'$',
      productDetails:{},
      authId:null,
      favoritedProducts : [],
      cartItems:[],
     
    }
})

const app = new Vue({
    el: '#app',
    store : store
});
const adminapp = new Vue({
    el: '#adminapp',
    store : store
});