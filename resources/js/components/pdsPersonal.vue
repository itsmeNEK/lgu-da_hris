<template>
    <b-container fluid="sm" class="bv-example-row">
        <b-row>
            <b-col md="6" lg="12">
                <p><span class="text-muted">First Name: </span>Bill Zhedrick</p>
                <p><span class="text-muted">Middle Name: </span>Argonza</p>
                <p><span class="text-muted">Last Name: </span>Gaspar</p>
                <p><span class="text-muted">Last Name: </span>Gaspar</p>
                <p><span class="text-muted">Last Name: </span>Gaspar</p>
            </b-col>
            <b-col md="6" lg="12"> </b-col>
        </b-row>
    </b-container>
</template>

<script>
    export default {
        data() {
            return {
                users: [],
            }
        },
        methods: {

            getUser() {
                $id = document.getElementById('userID').value;
                axios.get('/api/user/'.$id).then(({ data }) => {
                    //console.log(data)
                    this.users= data;

                })
                    .catch((err) => console.error(err));
            },
        },
        mounted() {
            this.read();
        }
    }
</script>
