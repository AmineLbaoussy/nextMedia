<template>
  
    <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-8">
     <form action="" method="" id="formSubmit" enctype="multipart/form-data">
      <div class="contact-form">
        <div class="form-group">
          <label class="control-label col-sm-12" for="image">Product Image :</label>
          <div class="col-sm-10">          
          <input type="file" name='image' class="form-control"  required>
          <span style="color: red">{{err_image}}</span>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-12" for="name">Product Name :</label>
          <div class="col-sm-10">          
          <input type="text" class="form-control" v-model="name" name="name">
          <span style="color: red">{{err_name}}</span>
          </div>
        </div>
        <div class="form-group">
             <div class="row">
                <div class="col-md-5">
                   <label class="control-label col-sm-12" for="price">Price:</label>
                    <div class="col-sm-12">          
                        <input type="text" class="form-control" v-model="price" name="price">
                        <span style="color: red">{{err_price}}</span>
                    </div>
                </div>
                <div class="col-md-5">
                  <label class="control-label col-sm-12" for="category">category:</label>
                  <div class="col-sm-12">
                    <select class="form-control" v-model="category"  name="category">
                      <option value="0" disabled selected="">choose category</option>
                      <option :value="item.id" v-for="item in categoryFull" :key="item.id">{{item.name}}</option>
                    </select>
                    <span style="color: red">{{err_category}}</span>
                  </div>
                </div>
             </div>
      </div>


        <div class="form-group">
          <label class="control-label col-sm-12" for="description">Description:</label>
          <div class="col-sm-10">
          <textarea class="form-control" rows="5" v-model="description" name="description"></textarea>
          <span style="color: red">{{err_description}}</span>
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-offset-3 col-sm-10">
          <button type="submit" class="btn btn-primary" @click.prevent="addProduct">Submit</button>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>  
</template>

<script>
    export default {

        data(){
            return {
               name :'',
               price :'', 
               category :'',
               categoryFull :[], 
               description :'', 
               image:'',
               err_image:'',
               err_description:'',
               err_category:'',
               err_price:'',
               err_name:'',
            }
         },
        created() {
            this.getCategories();
        },
        methods:{
          getCategories(){
            axios.get('/api/get_subcCategorie')
            .then(res=> {
              console.log(res.data)
                this.categoryFull= res.data;
            })
            .then(err=> console.log(err))
          },
          // onImageChanged(event){
          //   this.image=event.target.files[0];
          // },
          addProduct(){

            let config ={
               headers: { 'Content-Type': "multipart/form-data" }
            }
            var formData = new FormData($('#formSubmit')[0]);
               axios.post('/api/product', formData,config)
                    .then(res => {
                        console.log(res.data.line)
                     if(res.data.has_error){
                             this.err_image=res.data.line['image'];
                             this.err_description=res.data.line['description'];
                             this.err_name=res.data.line['name'];
                             this.err_price=res.data.line['price'];
                             this.err_category=res.data.line['category'];

                     }else{
                      this.$router.push('/')
                     }
                    }).catch(err => {
                    console.log(err)
                })

          }
        }

    }
</script>
