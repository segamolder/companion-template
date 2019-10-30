<template>
    <div id="comment-container" class="vs-con-loading__container">
        <vs-card v-for="(item, index) in data" :key="index">
            <div slot="header" class="header">
                <vs-avatar :src="item.img" />
                <h4>
                    {{item.name}}
                </h4>
                <rating :value="item.rating" size="1.2rem"></rating>
            </div>
            <div>
                <span>{{item.comment}}</span>
            </div>
        </vs-card>
    </div>
</template>

<script>
    import rating from "./../../plugins/RatingComponent"
    export default {
        name: "AccountComment",
        components: {
          rating
        },
        props: {
          userId: String,
          showCarComments: Boolean,
        },
        data() {
            return {
                data: [
                    {
                        img: 'https://cdn.moneymarketing.co.uk/content/uploads/2019/08/29125853/Profile-Carl-Roberts-400x500.jpg',
                        name: 'Иван Иванов',
                        comment: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                        rating: "3"
                    },
                    {
                        img: 'https://www.evolutionsociety.org/userdata/news_picupload/pic_sid189-0-norm.jpg',
                        name: 'Иван Петров',
                        comment: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                        rating: "1"
                    },
                    {
                        img: 'https://s3.amazonaws.com/37assets/svn/1065-IMG_2529.jpg',
                        name: 'Иван Сидоров',
                        comment: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                        rating: "4"
                    },
                ]
            }
        },
        methods: {
            getData() {
                let self=this;
                if (this.userId !== null) {
                    if (this.showCarComments) {
                        //Получаем комментарии по машине
                    } else {
                        //Получаем комментарии по поездкам
                    }
                    self.$vs.loading({
                        container: '#comment-container',
                        scale: 0.6
                    });
                    //Заглушка под получение данных
                    setTimeout(() => {
                        this.$vs.loading.close('#comment-container > .con-vs-loading')
                    }, 2500);
                }
            }
        },
        mounted() {
            this.getData();
        }
    }
</script>

<style scoped lang="scss">
    ::-webkit-scrollbar {
        width: 5px;
        height: 5px;
        display: block;
    }

    ::-webkit-scrollbar-thumb {
        background: #e4eaf5;
        border-radius: 5px;
    }

    #comment-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 52vh;
        overflow-x: hidden;
        overflow: auto;
        .con-vs-card {
            width: 90%;
            &:first-child {
                margin-top: 10px;
            }
            .header {
                display: flex;
                align-items: center;

                .star-rating {
                  margin-left: 10px;
                }

                h4 {
                    margin-left: 10px;
                }
            }
        }
    }
</style>
