<template>
    <Head title="Seminars" />

    <BreezeAuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            </div>
  </div>
</div>

<div class="flex justify-between m-6">
  <div class="flex flex-col h-full w-4/5 mx-auto bg-blueish rounded-lg">
         <!--  <img
            class="rounded-lg rounded-b-none"
            :src="`${$props.seminar.image}`"
          /> -->
          <div class="flex justify-between -mt-4 px-4">
            <span
              class="inline-block ring-2 bg-gray-700 ring-gray-700 rounded-sm text-m font-medium tracking-wide text-white px-3 pt-0.5"
              >{{$props.seminar.approach}}</span>
            <span
              class="flex h-min space-x-1 items-center rounded-full bg-gray-700 py-1 px-2 text-m font-medium">
              <p class="text-white font-semibold text-sm">
                {{$props.seminar.availability - $props.seminar.users.length}}/{{$props.seminar.availability}}
              </p>
            </span>
          </div>
          <div class="py-2 px-4">
            <br>
            <h1
              class="text-xl font-medium leading-6 tracking-wide text-black">
             {{$props.seminar.title}}
            </h1>
          </div>
          <div class="px-4 space-y-2">
            <p class="text-gray-600 font-normal leading-5 tracking-wide">
              {{$props.seminar.subject}}
            </p>
          </div>
          <div class="flex flex-row items-end h-full w-full px-4 mt-4">
            <div class="flex border-t border-gray-700 w-full py-4">
                <div class="">
                  <p class="text-m font-semibold tracking-wide text-black">
                    {{$props.seminar.author }}
                  </p>
                  <p class="text-sm font-light tracking-wider text-gray-600">
                    {{$props.seminar.date}}
                  </p>
                  <br>
            <div class="flex border-t border-gray-700 w-full py-4">
                 <div class="text-m font-semibold">
                  <h2>Abstract</h2>
                  <br>
                  <p class="text-m font-light tracking-wider text-gray-600">
                    {{$props.seminar.description}}
                  </p>
                  <br>
                  </div>
            </div>
                </div>
              </div>
              <div>
                <BreezeButton  v-if="$props.seminar.users.length < $props.seminar.availability && !isSubscribed && !$props.auth.user.isAdmin"><a :href="`/subscribe/${seminar.id}`" method="get">Subscribe</a></BreezeButton>

                <BreezeButton v-if="isSubscribed && !$props.auth.user.isAdmin"><a :href="`/unsubscribe/${seminar.id}`" method="get">Unsubscribe</a></BreezeButton>

                <div v-if="$props.auth.user.isAdmin" class="inline-flex">
                <BreezeButton class="bg-green-700 hover:bg-green-800 mr-3"><a :href="`/seminars/${seminar.id}/edit`" method="get">Edit</a></BreezeButton>

                <BreezeButton class="bg-red-700 hover:bg-red-800 mr-3" @click.prevent="deleteSeminar(`${seminar.id}`)">Delete</BreezeButton>
                </div>
              </div>
          </div>
        <br>
        </div>
</div>
<br>
<br>

</BreezeAuthenticatedLayout>
    
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3'
import BreezeButton from '@/Components/Button.vue';




export default {
    props: ['seminar', 'auth', 'users', 'isSubscribed'],
    
    components: {
        BreezeAuthenticatedLayout,
        Head,
        BreezeButton,   
    },

    methods: {
    deleteSeminar(id) {
      if(confirm('Are you sure you want to delete this item?')) {
      this.$inertia.delete(`/seminars/${id}`, id)
      }
      return;
      }
    }

}
</script>

<style scoped>
.bg-blueish {
    background-color: rgb(112, 202, 200);
}
</style>