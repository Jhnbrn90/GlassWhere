<template>
  <div class="max-w-sm sm:w-screen rounded overflow-hidden shadow-lg">
    <div class="px-3 py-4">

      <div v-for="(glassware, index) in glasswarelist" class="flex items-center py-2 shadow rounded px-2 mb-4 border-purple border">
        <div class="w-1/3 font-medium text-purple-dark text-lg">{{ glassware.name }}</div>
        <div class="w-1/5 mr-6">
          <div 
              class="text-center rounded-full tracking-wide font-semibold text-sm px-1 py-1 border border-purple-dark bg-purple-dark text-purple-lightest">{{ glassware.amount }} &times;
          </div>
        </div>
        <div class="w-1/3 text-right" v-if="authorizedUser(glassware)">
          <button @click="increaseCount(glassware, index)" class="bg-green hover:bg-green-dark text-white font-bold py-2 px-3 rounded">
            &plus;
          </button>
          <button @click="decreaseCount(glassware, index)" class="bg-red hover:bg-red-dark text-white font-bold py-2 px-3 rounded">
            &minus;
          </button>
        </div>
        <div class="w-1/3 text-right text-lg font-semibold text-purple" v-else>
          {{ glassware.user.name }}
        </div>
      </div>

    </div>
  </div>
</template>

<script>
  export default {
    props: ['glasswares', 'user'],

    data() {
      return {
        glasswarelist: this.glasswares,
      }
    },

    methods: {
      authorizedUser(glassware) {
        if (glassware.user === null) {
          return true;
        }

        return this.user.id === glassware.user.id;
      },

      increaseCount(glassware, index) {
        axios.post(`/api/glassware/${glassware.id}`, { action: 'increase' })
          .then(response => {
            this.glasswarelist[index].amount += 1;  
          });
      },

      decreaseCount(glassware, index) {
        axios.post(`/api/glassware/${glassware.id}`, { action: 'decrease' })
          .then(response => {
            this.glasswarelist[index].amount -= 1;  
          });
      },

    }
  }
</script>
