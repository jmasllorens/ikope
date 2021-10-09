<template>

     <div v-if="$page.props.flash.message && visible"  class="absolute flex max-w-xs w-full mt-4 mr-14 top-0 right-0 bg-white rounded shadow p-4 bg-green-100">
                    <div class="mr-2">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                     <div class="flex-1 text-gray-800 text-sm"> {{ $page.props.flash.message }}
                      
                    </div>
                     <div class="ml-2">   <button @click="visible = false" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-indigo-500"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                    </div>

                </div>
             
</template>
<script>


export default {

   
   data() {
    return {
        visible: true
    }
   },
  
      

  
       
   

   
}


</script>
<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>
