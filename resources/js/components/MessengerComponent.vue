<template>
	<b-container fluid style="height: calc(100vh - 56px);" class="pl-0">
	    <b-row class="h-100" no-gutters>
	        <b-col cols="4">
	            <contactolist-component 
	            @conversationSelected="changeActiveConversation($event)"
	            :conversations="conversations"
	            ></contactolist-component>
	        </b-col>
	        <b-col cols="8">
	            <activeconversation-component
	            	v-if="selectedConversation"
	            	:contactId="selectedConversation.contact_id"
	            	:contactNombre="selectedConversation.contact_name"
	            	:messages="messages"
	            	@messageCreated="addMessage($event)">
	            	
	            </activeconversation-component>
	        </b-col>
	    </b-row>
	</b-container>
</template>

<script>
	export default {
		props:{
			userId: Number,
		},
    	data() {
			return{
				selectedConversation:null,
				messages:[],
				conversations:[]
			};
		},
        mounted() {
        	this.getConversations();
        	Echo.private('users.'+this.userId)
        	// Echo.channel('example')
	        .listen('MessageSent',(data) => {
	        	const message=data.message;
                message.written_by_me=false;
        		this.addMessage(message);
        		
        	});

        },
        methods:{
        	changeActiveConversation(conversation){
        		this.selectedConversation=conversation;
        		this.getMessages();
        	},
    	    getMessages(){
	            axios.get(`api/messages?contact_id=${this.selectedConversation.contact_id}`)
	            .then((response)=>{
	                this.messages=response.data;

	            });
            },
            addMessage(message){
            	const conversation = this.conversations.find((conversation)=>{
            		return conversation.contact_id == message.from_id || conversation.contact_id==message.to_id;
            	});
            	const author=this.userId===message.from_id?'Tú: ':'';
            	conversation.last_message=`${author} ${message.content}`;
            	conversation.last_time=new Date(message.created_at);
        		if(this.selectedConversation.contact_id==message.from_id || this.selectedConversation.contact_id==message.to_id){	
            		this.messages.push(message);
           	 	}
            },
            getConversations(){
                axios.get('api/conversations')
                .then((response)=>{
                    this.conversations=response.data;
                });
            },
        }
    }
</script>