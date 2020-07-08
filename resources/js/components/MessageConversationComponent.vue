<template>
<b-media :right-align="writtenByMe" vertical-align="" class="mb-2">
        <template v-slot:aside >
          <b-img blank rounded="circle" blank-color="#ccc" width="48" alt="placeholder"></b-img>
        </template>
        <b-card><slot></slot></b-card>
</b-media>
</template>

<script>
    export default {
        props:{
            writtenByMe: Boolean
        },
    	data() {
			return{
                contenido:'as'
			}
		},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
