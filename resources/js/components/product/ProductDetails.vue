<template>
  


    <div class="row">
      <div class="col-md-12">
           <router-link :to="'/'">  <button class="btn btn-dark btn-sm">return</button></router-link>
      </div>


      <div class="col-md-12">
         <div class="card flex-md-row mb-4 shadow-sm h-md-250 my-4">
            <div class="card-body d-flex flex-column align-items-start">
               <strong class="d-inline-block mb-2 text-primary">{{product.name}}</strong>
               <h6 class="mb-0">
                 
               </h6>
               <div class="mb-1 text-muted small">{{product.created_at}}</div>
               <p class="card-text mb-auto">{{product.description}}</p>
               <a class="btn btn-outline-primary btn-sm" role="button" href="http://www.jquery2dotnet.com/">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" :src="'/img/products/'+product.image" style="width: 400px; height: 250px;">
         </div>
      </div>





     </div>
    
</template>

<script>
    export default {

        data(){
            return {
                product:''
            }
         },
        created() {
            console.log('Component mounted.')
            this.getPriduct();
        },
        methods:{
          getPriduct(){
            axios.get('/api/product/'+this.$route.params.id)
            .then(res=> {
                console.log(res.data)
                this.product= res.data;
            })
            .then(err=> console.log(err))
          }
        }

    }
</script>
