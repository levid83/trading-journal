<template>
    <div class="cssload-aim"></div>
</template>
<style scoped lang="scss">
.cssload-aim {
    position: fixed;
    z-index: 1500;
    left: calc(100% - 42px);
    top: 60px;
    border-radius: 20px;
    background-color: transparent;
    border-width: 15px;
    border-style: double;
    border-color: transparent #428bca;
    animation: cssload-aim 0.7s linear infinite;
    @media screen and (max-width: 560px) {
        top: 106px;
    }
}

@keyframes cssload-aim {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>
