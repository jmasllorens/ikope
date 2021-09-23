<template>
    <Head title="Patients" />

    <BreezeAuthenticatedLayout>
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-3 bg-blueish border-b border-gray-200">
                        Patients
                    </div>
                </div>
                <br>
                <br>
<div class="bg-yellow-200 dark:bg-light_secondary rounded-lg py-5 px-5">

	<div class="grid grid-rows-2 gap-5 text-white">
            <div class="flex items-center justify-end">
    <BreezeButton class="mr-9 mt-3">New Patient</BreezeButton>
    </div>
		<div class="row-span-1">
		<!-- 	<ul v-for="patient in $page.props.auth.user.patients"  v-bind:key="patient">
                            <li> {{ patient.name }} </li>
                        </ul> -->
			<div class="grid grid-cols-3 gap-2 px-10">
				<div class="flex justify-between items-center">
				</div>
			</div>
		</div>
       
		<div class="row-span-2">
              <ul v-for="patient in $page.props.auth.user.patients"  v-bind:key="patient">
			<div class="grid grid-cols-3 px-10 gap-2">
				<div class="flex justify-center items-center">
                   
					<a class="cursor-pointer" href="#">
						<div class="hover:scale-105 transform transition-all duration-500">

                        <div class="text-gray-900 text-semibold">
                            <li> {{ patient.name }}</li>
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
                     </ul>
                       </div>
                 
                      
                   
                  
                       
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
        BreezeButton
    },
}
</script>
<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>