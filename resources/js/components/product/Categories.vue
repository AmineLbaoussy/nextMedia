<template>
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-11">
                  <ul class="list-unstyled mb-0" v-if="categories.length >0">
                    <li v-for="item in categories">
                       <router-link :to="`/category/${item.id}/product`" > 
                         <span >{{item.name}} </span>
                     </router-link>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
    
</template>

<script>
    export default {

      data(){
            return {
                categories:[],
            }
         },
        created() {
            console.log('Component mounted.')
            this.getCategories();
        },
        methods:{
          getCategories(){
            axios.get('/api/Category')
            .then(res=> {
                console.log('categories')
                this.categories= res.data;
            })
            .then(err=> console.log(err))
          }
        }


    }
</script>
