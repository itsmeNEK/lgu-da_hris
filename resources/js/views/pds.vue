<template>
    <div style="max-width: 90%;" class="mx-auto">
        <b-tabs content-class="mt-3" fill active-nav-item-class="font-weight-bold text-uppercase">
            <b-tab title="Page 1" title-link-class="text-success" active>
                <p>
                    <Personal></Personal>
                </p>
            </b-tab>
            <b-tab title="Page 2" lazy title-link-class="text-success">
                <p>

                </p>
            </b-tab>
            <b-tab title="Page 3" lazy title-link-class="text-success">
                <p>

                </p>
            </b-tab>
            <b-tab title="Page 4" lazy title-link-class="text-success">
                <p>

                </p>
            </b-tab>
        </b-tabs>
    </div>
</template>

<script>
import Personal from "./../components/pdsPersonal.vue";

export default {
    components: {
        Personal,
  }
};
</script>

