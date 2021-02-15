<template>
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-11">
                  <ul class="list-unstyled mb-0" v-if="categories.length >0">
                    <li v-for="item in categories">
                      
                         <span>{{item.name}}  <span style="color: #000"> ({{item.sub_category_count}})</span></span>
                    
                        <ul>
                          <li v-for="sub_item in item.sub_category">
                             <router-link :to="`/category/${sub_item.id}/product`" > 
                                 <span>{{sub_item.name}}  <span style="color: #000"> ({{sub_item.count_sub}})</span></span>
                             </router-link>
                         </li>
                        </ul>


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
            axios.get(window.axios.defaults.baseURL+'/api/Category')
            .then(res=> {
                console.log(res.data)
                this.categories= res.data;
            })
            .then(err=> console.log(err))
          }
        }


    }
</script>
