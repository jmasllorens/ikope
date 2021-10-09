

 <template>
    

     <div v-if="visible" class="absolute flex max-w-xs w-full top-0 right-0 mt-4 mr-16  bg-white rounded shadow p-4 bg-red-100">
                    <div class="mr-3 ml-2">
                        <svg class="w-6 h-6 text-red-500 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                     <div class="flex-1 text-gray-800 text-sm"> Are you sure you want to delete this item?
                  
                         <div class="grid grid-cols-2 mt-5 ml-10">
                          <div><button @click="visible = false" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-500">Accept</button>
                    </div>
                         <div> <button @click="visible = false" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-500">Cancel</button>
                             </div>
                             </div>
                      
                    </div>
                </div>
             
</template>

   <!--   <div class="absolute flex max-w-xs w-full mt-4 mr-4 top-0 right-0 bg-white rounded shadow p-4 bg-green-100">
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

                </div> -->
             

<script>


export default {


    data() {
    return {
        visible: false
    }
   },

   
  /*  data() {
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
   } */
      

  
       
   

   
}


</script>
<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>
