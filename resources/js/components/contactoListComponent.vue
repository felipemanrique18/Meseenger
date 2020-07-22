<template>
    <div>
        <b-form class="my-3 mx-3">
            <b-form-input
                type="text"
                class="text-center "
                placeholder="Buscar contacto.."
                >
            </b-form-input>
        </b-form>
        <b-list-group>
            <contacto-component 
                v-for="conversation in conversations"
                :key="conversation.id"
                :conversation="conversation"
                @click.native="selectConversation(conversation)"
                class="list-contact">         
            </contacto-component>
            <!-- <contacto-component variant="dark"></contacto-component>
            <contacto-component></contacto-component>
            <contacto-component variant="secondary"></contacto-component> -->
        </b-list-group>
    </div>
    
</template>

<script>
    export default {
        props:{
            conversations:Array
        },
    	data() {
			return{

			};
		},
        mounted() {

        },
        methods:{
            selectConversation(conversation){
                // console.log(conversation);
                this.$emit('conversationSelected',conversation);
            }
        }
    }
</script>
