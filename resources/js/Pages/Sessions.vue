<template>
    <Head title="Sessions" />

    <BreezeAuthenticatedLayout>
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-3 bg-blueish border-b border-gray-200">
                        Sessions
                    </div>
                </div>
                <br>
                <br>   
<!-- <div v-if="$page.props.auth.user.name > 0" class="bg-yellow-200 dark:bg-light_secondary rounded-lg py-5 px-5"> -->

	<div class="grid grid-rows-2 gap-5 text-white">
            <div class="flex items-center justify-end">
    <BreezeButton class="mr-9 mt-3">Session</BreezeButton>
    </div>
		<div class="row-span-1">
			<div class="grid grid-cols-3 gap-2 px-10">
				<div class="flex justify-between items-center">
				</div>
			</div>
		</div>
       
		<div class="row-span-2">
            <!--   <span v-for="session in $page.props.auth.user.sessions"  v-bind:key="session"> -->
			<div class="grid grid-cols-3 px-10 gap-2">
				<div class="flex justify-center items-center">
                   
					<a class="cursor-pointer" href="#">
						<div class="hover:scale-105 transform transition-all duration-500">

                        <div class="text-gray-900 text-semibold">
                           <!--  <h2> {{ session.date }}</h2> -->
                    
                        </div>

						</div>
					</a>
				</div>
				<div class="flex justify-center items-center">
					<a class="cursor-pointer" href="#">
						<div class="hover:scale-105 transform transition-all duration-500">
							<img class="h-30 rounded-lg"
								src="https://cdn.pixabay.com/photo/2020/07/21/16/24/landscape-5426755_960_720.jpg" alt="image" />
						</div>
					</a>
				</div>
				<div class="flex justify-center items-center">
					<a class="cursor-pointer" href="#">
						<div class="hover:scale-105 transform transition-all duration-500">
							<img class="h-30 rounded-lg"
								src="https://cdn.pixabay.com/photo/2020/07/21/16/24/landscape-5426755_960_720.jpg" alt="image" />
						</div>
					</a>
                    </div>
                     </div>
                    <!--  </span>
                       </div> -->
                 
                      
                   
                  
                       
                    </div>
                    </div>   
                  </div>
                  </div>
	



 </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3'
import BreezeButton from '@/Components/Button.vue';


export default {

    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton,
    },
}
</script>
<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>