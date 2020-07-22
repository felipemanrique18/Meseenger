<template>
    <b-row class="h-100">
        <b-col cols="8 h-100">
            <b-card
                no-body
                footer-bg-variant="light"
                footer-border-variant="dark"
                title="Conversacion activa"
                class="h-100"
              >
                <b-card-body class="card-body-scroll">
                    <messageconversation-component  v-for="message in messages" :key="messages.id" :writtenByMe="message.written_by_me">
                    {{ message.content }}
                    </messageconversation-component>
                </b-card-body>
                <div id="messages-card-body-scroll" >
                    
                </div>
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
        <b-col cols="4" class="d-none d-md-block">
            <b-img center blank blank-color="#777" width="75" height="75" rounded="circle" alt="Circle image"></b-img>
            <p class="text-center"> {{ contactNombre }}</p>
            <br>
            <b-form-checkbox>
                Desactivar noficicaiones
            </b-form-checkbox>
        </b-col>
    </b-row>
</template>

<style>
    .card-body-scroll{
        max-height: calc(100vh-63px);
        overflow-y: auto;

    } 
    .card-body-scroll::-webkit-scrollbar {
        width: 8px;     /* Tamaño del scroll en vertical */
        height: 8px;    /* Tamaño del scroll en horizontal */
        /*display: none;   Ocultar scroll */
    }
    /* Ponemos un color de fondo y redondeamos las esquinas del thumb */
    .card-body-scroll::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 4px;
    }
    /* Cambiamos el fondo y agregamos una sombra cuando esté en hover */
    .card-body-scroll::-webkit-scrollbar-thumb:hover {
        background: #b3b3b3;
        box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.2);
    }
    /* Cambiamos el fondo cuando esté en active */
    .card-body-scroll::-webkit-scrollbar-thumb:active {
        background-color: #999999;
    }
</style>
<script>
    export default {
        props:{
            contactId:Number,
            contactNombre:String,
            messages: Array
        },
    	data() {
			return{
                
                newMessage:'',
			};
		},
        mounted() {
            
        },
        methods:{
            postMessage(){
                const params={
                    to_id:this.contactId,
                    content:this.newMessage
                }
                axios.post('api/messages',params)
                .then((response)=>{
                    if(response.data.success){
                        this.newMessage="";
                        const message= response.data.message;
                        message.written_by_me=true;
                        this.$emit('messageCreated',message);
                    }else{
                        console.log(response.data);
                    }
                    
                });
            },
            scrollToBotton(){
                const el=document.querySelector('.card-body-scroll');
                el.scrollTop=el.scrollHeight;
            }
        },
        updated() {
            this.scrollToBotton();        
        }
    }
</script>
