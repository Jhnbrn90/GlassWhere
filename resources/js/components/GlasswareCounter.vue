<template>
  <div>
    <p class="mb-4">Current count: (...)</p>
    
    <div class="buttons">
      <button class="bg-green hover:bg-green-dark text-white font-bold py-2 px-4 rounded text-lg mr-4">
        &plus; Increase
      </button>
    
      <button class="bg-red hover:bg-red-dark text-white font-bold py-2 px-4 rounded text-lg">
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

      }
    },

    methods: {

    }
  }
</script>
