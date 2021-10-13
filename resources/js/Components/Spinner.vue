<template>
<div  v-if="loading" class="py-16 mt-16">
 <fulfilling-bouncing-circle-spinner class="spinner mt-10" 
  :animation-duration="4000"
  :size="300"
  color="rgb(112, 202, 200)"
/>
</div>
</template>
<script>
import { FulfillingBouncingCircleSpinner } from 'epic-spinners'

export default {
    name: 'Spinner',
    components: {
    
    FulfillingBouncingCircleSpinner
 
    },
    data() {
    return {
        loading: false
    }
   },
   
    }
</script>
<style>

.spinner {
  position: absolute;
  left: 40%;
  top: 50%;
  transform: translate(-50%,-50%);
}
</style>