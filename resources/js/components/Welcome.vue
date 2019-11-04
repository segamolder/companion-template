<template>
    <div>
        <div class="bg_img"></div>
        <div class="main-container">
            <div class="main-container__block">
                <vs-button color="primary" class="main-container__button" type="filled">Я водитель</vs-button>
                <vs-button color="primary" class="main-container__button" type="filled">Я пассажир</vs-button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Welcome"
    }
</script>

<style scoped lang="scss">
    .bg_img {
        height: 100vh;
        width: 100vw;
        position: absolute;
        z-index: -1;
        background-image: url('/images/background.jpg');
        background-size: cover;
        background-position: center;
    }

    .main-container {
        height: 100vh;
        width: 100vw;
        align-items: center;
        display: flex;
        &__block {
            border-top: 5px solid #3490dc;
            height: 25%;
            width: 30%;
            display: flex;
            flex-direction: column;
            background-color: white;
            justify-content: space-evenly;
            align-items: center;
            border-radius: 10px;
            margin-left: 10%
        }

        &__button {
            font-family: "Neucha", cursive;
            width: 80%;
            height: 50px;
            font-size: 1rem;
        }
    }

    @media screen and (max-width: 800px) {
        .main-container {
            justify-content: center;
            &__block {
                margin: 0;
                width: 90%;
            }
        }
    }
</style>
