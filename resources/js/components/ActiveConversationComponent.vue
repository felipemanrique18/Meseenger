<template>
    <b-row class="h-100">
        <b-col cols="8 h-100">
            <b-card
                footer-bg-variant="light"
                footer-border-variant="dark"
                title="Conversacion activa"
                class="h-100"
              >

                <messageconversation-component  v-for="message in messages" :key="messages.id" :writtenByMe="message.written_by_me">
                    {{ message.content }}
                </messageconversation-component>


              </b-media>
                <div slot="footer">
                    <b-form class="mb-0" @submit.prevent="postMessage" autocomplete="off">
                        <b-input-group>
                            <b-form-input
                                type="text"
                                class="contactoListComponent.vue"
                                v-model="newMessage"
                                placeholder="Escribe un mensaje..."
                                >
                            </b-form-input>

                            <b-input-group-append>
                              <b-button variant="outline-primary" type="submit" class="primary">Enviar</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form>
                    
                </div>
            </b-card>
        </b-col>
        <b-col cols="4">
            <b-img center blank blank-color="#777" width="75" height="75" rounded="circle" alt="Circle image"></b-img>
            <p class="text-center"> Usario seleccionado</p>
            <br>
            <b-form-checkbox>
                Desactivar noficicaiones
            </b-form-checkbox>
        </b-col>
    </b-row>
</template>

<script>
    export default {
    	data() {
			return{
                messages:[],
                newMessage:'',
                contactId:2
			};
		},
        mounted() {
            this.getMessages();
            
        },
        methods:{
            getMessages(){
                axios.get(`api/messages?contact_id=${this.contactId}`)
                .then((response)=>{
                    this.messages=response.data;

                });
            },
            postMessage(){
                const params={
                    to_id:this.contactId,
                    content:this.newMessage
                }
                axios.post('api/messages',params)
                .then((response)=>{
                    if(response.data.success){
                        this.newMessage="";
                        this.getMessages();
                    }else{
                        console.log(response.data);

                    }
                    
                });
            }
        }
    }
</script>
