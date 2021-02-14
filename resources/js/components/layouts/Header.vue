<template>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <router-link :to="'/Product/'" class="btn btn-outline-success my-2 my-sm-0">add new </router-link>
      
    </form>
  </div>
</nav>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
