<template>

     <div class="absolute flex max-w-xs w-full mt-4 mr-4 top-0 right-0 bg-white rounded shadow p-4 bg-green-100">
                    <div class="mr-2">
                        <button @click=handleActionButton>
                            <div v-html="btnText">
                            </div>
                        </button>
                    </div>
                     <div class="flex-1 text-gray-800 text-sm"> 
                      
                    </div>
                     <div class="modal ml-2" v-bind:class="{'is-active': modalState}">   <button @click="handleCloseBtn" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-indigo-500 modal-close"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                    </div>

                </div>
             
</template>
<script>


export default {

   
   data() {
    return {
       modalState: false
    }
   },
   methods: {
    handleActionBtn() {
        this.modalState = true
      },
      handleCloseBtn() {
        this.modalState = false
      },
   }
      

  
       
   

   
}


</script>
<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>
