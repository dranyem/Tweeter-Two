<template>
  <div class="">
      <Component1/>
      <Component2/>
      <Component3/>
  </div>
</template>

<script>
import Component1 from './Component1.vue'
import Component2 from './Component2.vue'
import Component3 from './Component3.vue'
export default {
    name: 'Root',
    components: {
        Component1,
        Component2,
        Component3
    },
}
</script>

<style>

</style>
