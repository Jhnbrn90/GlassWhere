<template>
  <div>
    <p class="mb-4">Current count: {{ this.glassware.amount }} </p>
    
    <div class="buttons">
      <button @click="increaseCount" class="bg-green hover:bg-green-dark text-white font-bold py-4 px-4 rounded text-2xl mr-4">
        &plus; Increase
      </button>
    
      <button @click="decreaseCount" class="bg-red hover:bg-red-dark text-white font-bold py-4 px-4 rounded text-2xl">
        &minus; Decrease
      </button>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['id'],

    data() {
      return {
        glassware: {},
      }
    },

    methods: {
      increaseCount() {
        axios.post(`/api/glassware/${this.id}`, { action: 'increase' })
          .then(response => {
            this.glassware.amount = response.data.amount;    
          });
      },

      decreaseCount() {
        axios.post(`/api/glassware/${this.id}`, { action: 'decrease' })
          .then(response => {
            this.glassware.amount = response.data.amount;    
          });
      }
    },

    created() {
      axios.get(`/api/glassware/${this.id}`)
            .then(response => {
              this.glassware = response.data;
      });
    },

  }
</script>
