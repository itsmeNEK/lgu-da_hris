<template>
    <div>
        <div class="btn-group dropstart">
            <button
                class="btn btn-transparent rounded btn-lg border-0"
                type="button"
                data-bs-toggle="dropdown"
                data-bs-auto-close="outside"
                aria-expanded="false"
            >
                <i class="fa-solid fa-bell"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Menu item</a></li>
                <li><a class="dropdown-item" href="#">Menu item</a></li>
                <li><a class="dropdown-item" href="#">Menu item</a></li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {};
</script>
<style>
.my-custom-toggle {
    color: rgb(0, 0, 0);
    text-decoration: none;
}
</style>
