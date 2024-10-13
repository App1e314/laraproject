<template> 
<span>  {{ listing.street }} {{ listing.street_nr }}, {{ listing.city }}
     </span>


    
</template>

<script setup>

 // import ListingAddress from '@/Components/ListingAddress.vue'

  defineProps({
    listing: Object,
  })
  </script>