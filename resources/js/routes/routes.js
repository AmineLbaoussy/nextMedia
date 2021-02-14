import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Product from '../components/product/Index.vue';
import ProductDetails from '../components/product/ProductDetails.vue';
import categorie_product from '../components/product/categorie-product-view.vue';
import create_product from '../components/product/create-product.vue';


const router = new VueRouter({
    mode: 'history',
    hashbang:false,
    routes: [
         {path:'/',component:Product,name:'index'},
         {path:'/product/:id',component:ProductDetails,name:'categorie-product-view'},
         {path:'/product/',component:create_product,name:'create_product'},
         {path:'/category/:id/product',component:categorie_product,name:'categorie_product'},
    ]
});


export default router;