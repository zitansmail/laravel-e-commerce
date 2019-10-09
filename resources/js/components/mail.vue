<template>
     <div class="mb-8">
         <div class="row py-4 px-4 bg-white flex items-center ">
            <div class="col-md-6">
                <div class="flex items-center">
                    <h1 class="font-bold text-orange-1000 text-2xl">NEWS LETTER</h1>
                     <span class="ml-2 text-xs font-semibold">join us now to get all new and special offers</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8 flex items-center ">
                        <span><i class="far fa-envelope text-orange-1000"></i></span>
                        <input v-model="mail" type="email" class=" bg-transparent px-2 py-3  w-full focus:outline-none" placeholder="Enter YOur Email">
                    </div>
                <div class="col-md-4">
                    <button @click="CheckMail" class="bg-orange-1000 px-4 py-3 text-white  focus:outline-none hover:bg-orange-700 mt-2">JOIN US</button>
                </div>
                </div>
            </div>
        </div>
     </div>
</template>
<script>
        export default {
            data() {
                return {
                    mail : ''
                }
            },
            methods : {
                CheckMail() {
                    if (this.mail == '') {
                        alert('Text Empty')
                        return ;
                    }
                    alert('You Email is '+this.mail)
                }
            }
            
        }
</script>