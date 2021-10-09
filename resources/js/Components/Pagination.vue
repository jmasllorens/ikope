<template>
<div
                         v-if="links.length > 3"
                         class="px-5 py-5 bg-gray-100 border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                       
                        <div class="inline-flex mt-2 xs:mt-0">
                        
                             <template v-for="(link, k) in links" :key="k">
        <div v-if="link.url === null"  class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label" />
        <a v-else class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-blueish focus:text-blueish" :class="{ 'bg-blueish text-white': link.active }" :href="link.url" v-html="link.label" />
      </template>
                            </div>
                            <div>
                        </div>
                    </div>

</template>


  
<script>
export default {
  props: {
    links: Array,
  },
 
}
</script> 

<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
.blueish {
  color: rgb(112, 202, 200);
}

</style>