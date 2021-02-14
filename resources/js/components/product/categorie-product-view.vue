<template>
   <div>
    <div class="row">

          <div class="col-md-12">
            searching Products ..

          </div>          
          <div class="col-md-8">
              <div class="row">
                  <div class="col-md-4"  v-for="item in products" :key="item.id">
                    <div class="wsk-cp-product">
                      <div class="wsk-cp-img">
                        <img :src="'/img/products/'+item.image"  alt="Product" class="img-responsive" />
                      </div>
                      <div class="wsk-cp-text">
                        <div class="title-product">
                          <h3>
                          <router-link :to="'/Product/'+item.id">{{item.name}} </router-link>
                          </h3
                        </div>
                        <div class="description-prod">
                         <p>{{item.description.substr(0.,150)}}</p>
                        </div>
                        <div class="_card-footer">
                          <div class="wcf-left"><span class="price">{{item.price}}$</span></div>
                       
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
         </div>



        <div class="col-md-4">
            <!-- Search Widget -->
            <div class="card my-4">
              <h5 class="card-header">Search</h5>
              <div class="card-body">
                <div class="input-group">
                  <input type="text" class="form-control" v-model="searchProduct" placeholder="Search for...">
                </div>
              </div>
            </div>

            <div class="card my-4">
         
              <div class="card-body">
                 <div class="row">
             
                      <div class="col-md-6">
                            <input type="text"  v-model="searchmin" placeholder="min" class="form-control">
                      </div>
                      <!--Grid column-->
                      <div class="col-md-6">
                              <input type="text"   v-model="searchmax" placeholder="max" class="form-control">
                      </div>
                  </div>
              </div>
            </div>
            <!-- Categories Widget -->
            <categories></categories>
        </div>


        <div class="_card-footer pb-0 pt-3">
            <jw-pagination :maxPages=3 :pageSize=4 :items="paginationProducts" @changePage="onChangePage" :labels="customLabels"></jw-pagination>
        </div>



         </div>
         
</div>
</template>

<script>
  import categories from './Categories.vue';
  const customLabels = {
    first: '<<',
    last: '>>',
    previous: '<',
    next: '>'
};
    export default {

        data(){
            return {
                customLabels,
                paginationProducts:[],
                oldproduct:[],
                products:[],
                searchProduct:'',
                searchmin:'',
                searchmax:'',
                isSearch:false
            }
         },
         components:{
          categories
         },
         watch: {
            '$route'() {
              this.getPriducts();
             },
            searchProduct(query){
                  this.searchProductFilter(query);
                  this.searchProductFilterMaxMin();
            },              
            searchmin(){
                         
                 this.searchProductFilter(this.searchProduct);
                 this.searchProductFilterMaxMin()
                 
            },              
            searchmax(){

                 this.searchProductFilter(this.searchProduct);
                 this.searchProductFilterMaxMin()
                 
            }
       
        },
        mounted() {
            this.getPriducts();
        },
        methods:{
          getPriducts(){
            axios.get('/api/category/'+this.$route.params.id+'/product')
            .then(res=> {
                this.products= res.data;
                this.paginationProducts= res.data;
                this.oldproduct= res.data;

            })
            .then(err=> console.log(err))
          },
           onChangePage(products) {
            this.products = products;
          },
          // DB_searchProductFilter(query){
          //   axios.get('/api/searchProduct/'+query)
          //   .then(res=> {
          //       this.isSearch=true;
          //       this.products= res.data;
          //   })
          //   .then(err=> console.log(err))  
          // },
          searchProductFilter(query){
                this.products =this.oldproduct.filter(product => {
                   console.log(query)     
                            return product.name.toLowerCase().includes(query.toLowerCase())
                });
                 this.paginationProducts =this.products;
          },
          searchProductFilterMaxMin(){
                 if( this.searchmin.length > 0 || this.searchmax.length > 0){
                      this.products =this.products.filter(product => {
                             if(this.searchmin.length > 0  && this.searchmax.length > 0)
                              {
                                   if(product.price >= this.searchmin && product.price  <= this.searchmax)
                                        return true;
                                      return false;
                              }
                             else if(this.searchmin.length > 0){
                                           if(product.price >= this.searchmin)
                                            return true;
                                          return false;
                             }
                             else if(this.searchmax.length > 0){
                                           if(product.price <= this.searchmax)
                                            return true;
                                          return false;
                             }
                       });
                      this.paginationProducts =this.products;
                 }
          }
        }

    }
</script>
