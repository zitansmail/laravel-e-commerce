<template>
    <div class=" bg-white shadow px-2 py-4 ">
        <img :src="image" alt="">
        <a :href="link"><h1 class="font-bold text-lg mt-4 text-center">{{title}}</h1></a>
        <h1 class="font-bold text-lg mt-2 text-center our-color">{{price}} $</h1>
     </div>
</template>


<script>
    export default {
        props : ['image','title','price','link'],
        
    }
</script>