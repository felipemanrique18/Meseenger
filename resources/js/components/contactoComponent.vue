<template>
	<b-list-group-item :variant="variant">
        <b-row class="p-2">
            <b-col cols="12" md="3" class="text-center">
                <b-img  blank blank-color="#777" width="50" height="50" rounded="circle" alt="Circle image"></b-img>
            </b-col>
            <b-col cols="6" aling-self="center" class="d-none d-md-block">
                <p class="mb-1">{{ conversation.contact_name }}</p>
                <p class="text-muted small mb-1">{{ conversation.last_message }}</p>      
            </b-col>
            <b-col cols="3" class="d-none d-md-block">
                <p class="mb-1">{{ lastTime }}</p>
            </b-col>
        </b-row>
    </b-list-group-item>
</template>

<script>
    export default {
    	props:{
            variant:String,
            conversation:Object,
        },
    	data() {
			return{
				
			}
		},
        mounted() {
        },
        computed:{
            lastTime(){
                return moment(this.conversation.last_time, "YYYY-MM-DD hh-mm-ss").locale('es').fromNow();
            }
        }
    }
</script>
