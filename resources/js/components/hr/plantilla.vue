<template>
    <div class="table-responsive" id="no-more-tables">
        <table
            class="table table-hover table-striped smnall table-sm text-center"
        >
            <thead>
                <tr class="table-success">
                    <th class="numeric" width="5%">No.</th>
                    <th class="numeric">Employee</th>
                    <th class="numeric" width="12%">VL Balance</th>
                    <th class="numeric" width="12%">SL Balance</th>
                    <th class="numeric" width="30%"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr v-if="user.data == null">
                    <td colspan="9" class="text-center">No Records</td>
                </tr>
                <tr v-else v-for="user in user.data" :key="user.id">
                    <td data-title="No." v-if="user.empPlantilla">
                        {{ user.empPlantilla.EPno }}
                    </td>
                    <td data-title="No." v-else>-</td>
                    <td data-title="Employee">
                        {{ user.first_name }} {{ user.last_name }}
                    </td>
                    <td data-title="VL Balance" v-if="user.leaveCreditlatest">
                        {{ user.leaveCreditlatest.elc_vl_balance }}
                    </td>
                    <td data-title="SL Balance" v-else>-</td>
                    <td data-title="SL Balance" v-if="user.leaveCreditlatest">
                        {{ user.leaveCreditlatest.elc_sl_balance }}
                    </td>
                    <td data-title="VL Balance" v-else>-</td>
                    <td>
                        <div
                            class="btn-group"
                            role="group"
                            aria-label="Basic example"
                        >
                            <a
                                href=""
                                class="btn btn-warning btn-sm text-white fw-bold"
                                ><i
                                    class="fa fa-plus me-1"
                                    aria-hidden="true"
                                ></i
                                >Tardiness</a
                            >
                            <a
                                href=""
                                class="btn btn-primary btn-sm text-white fw-bold"
                                ><i
                                    class="fa fa-eye me-1"
                                    aria-hidden="true"
                                ></i
                                >LeaveCard</a
                            >
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <pagination :data="user" @pagination-change-page="loadUser">
                    <span slot="prev-nav">&lt;</span>
                    <span slot="next-nav">&gt;</span>
                </pagination>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            user: {},
            paginate: 10,
        };
    },
    watch: {
        paginate: function (value) {
            this.loadUser();
        },
    },
    methods: {
        loadUser(page = 1) {
            this.getDataWithoutPaginate = "/api/hr/plantilla/create?";
            this.getInboxUrlPaginate = this.getDataWithoutPaginate.concat(
                "&paginate=" + this.paginate + "&page=" + page
            );
            axios.get(this.getInboxUrlPaginate).then((response) => {
                this.user = response.data;
            });
        },
        deletapp(id) {
            this.$confirm("Do you want to delete this?").then((r) => {
                axios.delete("/api/data/delete/" + id).then((response) => {
                    this.loadUser();
                });
            });
        },
    },
    mounted() {
        this.loadUser();
    },
};
</script>
