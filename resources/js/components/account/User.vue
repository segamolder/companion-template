<template>
    <div class="user-block">
        <div class="user-block__first">
            <vs-avatar class="profile" size="100px"
                       src="https://avatars2.githubusercontent.com/u/31676496?s=460&v=4"/>
            <div>
                <h3 class="pb-3">Сергей Иванов</h3>

                <p class="pb-3">+7(999)999-99-99</p>

                <p><rating value="3"></rating></p>
            </div>
            <div class="preferences">
                <img src="/icons/animals_ban.svg" class="fas" id="pref-1">
                <b-tooltip target="pref-1" title="Без животных" placement="top"></b-tooltip>
                <i class="fas fa-smoking-ban" id="pref-2"></i>
                <b-tooltip target="pref-2" title="Против курения" placement="top"></b-tooltip>
                <i class="fas fa-user-friends" id="pref-3"></i>
                <b-tooltip target="pref-3" title="Люблю поболтать" placement="top"></b-tooltip>
            </div>
        </div>
        <div class="user-block__second"></div>
        <div class="user-block__third"></div>
    </div>
</template>

<script>
    import rating from '../plugins/RatingComponent'
    export default {
        name: "user",
        components: {rating}
    }
</script>

<style scoped lang="scss">
    .user-block {
        display: flex;
        width: 100%;
        height: 60vh;
        &__first {
            width: 20%;
            padding: 5%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        &__second {
            width: 50%;
            background-color: darkkhaki;
        }

        &__third {
            width: 30%;
            background-color: darkolivegreen;
        }
    }

    .profile {
        margin: 0;
    }


    @media screen and (max-width: 800px)  {
        .pb-3 {
            padding-bottom: 3%
        }

        .user-block {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            height: 60vh;
            &__first {
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: space-evenly;

                .preferences {
                    position: relative;
                    display: flex;
                    flex-direction: row;
                    align-self: auto;
                    width: 100%;
                    padding: 5%;

                    .fas {
                        padding-bottom: 10px;
                        font-size: 1.4rem;
                        height: 31px;
                    }
                }
            }

            &__second {
                width: 100%;
                background-color: darkkhaki;
            }

            &__third {
                width: 100%;
                background-color: darkolivegreen;
            }
        }


    }

    h3 {
        font-family: 'Montserrat', sans-serif;
    }

    p {
        font-family: 'Montserrat', sans-serif;
    }

    .pb-3 {
        padding-bottom: 5%;
        padding-top: 5%;
    }

    .green {
        color: darkgreen;
    }

    .red {
        color: darkred;
    }

    .tooltip {
        width: 120px;
        background-color: #fff;
        color: black;
        text-align: center;
        padding: 5px 0;
        border-radius: 6px;
        border: 1px solid black;
    }

    .preferences {
        position: absolute;
        bottom: 0;
        display: flex;
        width: 20%;
        justify-content: space-evenly;
        margin-bottom: 10px;
        .fas {
            font-size: 1.9rem;
            height: 31px;
        }
    }

</style>
