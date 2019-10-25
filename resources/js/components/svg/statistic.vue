<template>
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="305" height="266"
             viewBox="0 0 305 266">
            <defs>
                <filter id="Ellipse_1" x="0" y="0" width="82" height="80" filterUnits="userSpaceOnUse">
                    <feOffset dy="3" input="SourceAlpha"/>
                    <feGaussianBlur stdDeviation="3" result="blur"/>
                    <feFlood flood-opacity="0.161"/>
                    <feComposite operator="in" in2="blur"/>
                    <feComposite in="SourceGraphic"/>
                </filter>
                <filter id="Ellipse_2" x="183" y="62" width="82" height="80" filterUnits="userSpaceOnUse">
                    <feOffset dy="3" input="SourceAlpha"/>
                    <feGaussianBlur stdDeviation="3" result="blur-2"/>
                    <feFlood flood-opacity="0.161"/>
                    <feComposite operator="in" in2="blur-2"/>
                    <feComposite in="SourceGraphic"/>
                </filter>
                <filter id="Ellipse_3" x="0" y="124" width="82" height="80" filterUnits="userSpaceOnUse">
                    <feOffset dy="3" input="SourceAlpha"/>
                    <feGaussianBlur stdDeviation="3" result="blur-3"/>
                    <feFlood flood-opacity="0.161"/>
                    <feComposite operator="in" in2="blur-3"/>
                    <feComposite in="SourceGraphic"/>
                </filter>
                <filter id="Ellipse_4" x="183" y="186" width="82" height="80" filterUnits="userSpaceOnUse">
                    <feOffset dy="3" input="SourceAlpha"/>
                    <feGaussianBlur stdDeviation="3" result="blur-4"/>
                    <feFlood flood-opacity="0.161"/>
                    <feComposite operator="in" in2="blur-4"/>
                    <feComposite in="SourceGraphic"/>
                </filter>
                <filter id="Line_2" x="63.316" y="160.035" width="139.369" height="66.93" filterUnits="userSpaceOnUse">
                    <feOffset dy="3" input="SourceAlpha"/>
                    <feGaussianBlur stdDeviation="3" result="blur-5"/>
                    <feFlood flood-opacity="0.161"/>
                    <feComposite operator="in" in2="blur-5"/>
                    <feComposite in="SourceGraphic"/>
                </filter>
                <filter id="Line_3" x="62.317" y="37.035" width="140.366" height="66.931" filterUnits="userSpaceOnUse">
                    <feOffset dy="3" input="SourceAlpha"/>
                    <feGaussianBlur stdDeviation="3" result="blur-6"/>
                    <feFlood flood-opacity="0.161"/>
                    <feComposite operator="in" in2="blur-6"/>
                    <feComposite in="SourceGraphic"/>
                </filter>
                <filter id="Line_4" x="63.312" y="102.037" width="139.375" height="67.927" filterUnits="userSpaceOnUse">
                    <feOffset dy="3" input="SourceAlpha"/>
                    <feGaussianBlur stdDeviation="3" result="blur-7"/>
                    <feFlood flood-opacity="0.161"/>
                    <feComposite operator="in" in2="blur-7"/>
                    <feComposite in="SourceGraphic"/>
                </filter>
            </defs>
            <g id="Group_1" data-name="Group 1" transform="translate(-3 -198)">
                <g transform="matrix(1, 0, 0, 1, 3, 198)" filter="url(#Ellipse_1)" id="pop_1">
                    <g id="Ellipse_1-2" class="circle" data-name="Ellipse 1" transform="translate(9 6)" fill="#fff"
                       stroke="#707070" stroke-width="1">
                        <ellipse cx="32" cy="31" rx="32" ry="31" stroke="none"/>
                        <foreignObject width="100%" height="100%">
                            <i class="fas fa-ruble-sign stat-icon"></i>
                            <span class="stat-count">{{totalCostOfTravel}}</span>
                        </foreignObject>
                        <ellipse cx="32" cy="31" rx="31.5" ry="30.5" fill="none"/>
                    </g>
                </g>
                <g transform="matrix(1, 0, 0, 1, 3, 198)" filter="url(#Ellipse_2)">
                    <g id="Ellipse_2-2" data-name="Ellipse 2" class="circle" transform="translate(192 68)" fill="#fff"
                       stroke="#707070" stroke-width="1">
                        <ellipse cx="32" cy="31" rx="32" ry="31" stroke="none"/>
                        <foreignObject width="100%" height="100%">
                            <i class="fas fa-suitcase-rolling stat-icon stat-icon__second"></i>
                            <span class="stat-count">{{totalNumberOfTrips}}</span>
                        </foreignObject>
                        <ellipse cx="32" cy="31" rx="31.5" ry="30.5" fill="none"/>
                    </g>
                </g>
                <g transform="matrix(1, 0, 0, 1, 3, 198)" filter="url(#Ellipse_3)">
                    <g id="Ellipse_3-2" data-name="Ellipse 3" class="circle" transform="translate(9 130)" fill="#fff"
                       stroke="#707070" stroke-width="1">
                        <ellipse cx="32" cy="31" rx="32" ry="31" stroke="none"/>
                        <foreignObject width="100%" height="100%">
                            <i class="fas fa-road stat-icon stat-icon__third"></i>
                            <span class="stat-count">{{totalNumberOfKilometers}}</span>
                        </foreignObject>
                        <ellipse cx="32" cy="31" rx="31.5" ry="30.5" fill="none"/>

                    </g>
                </g>
                <g transform="matrix(1, 0, 0, 1, 3, 198)" filter="url(#Ellipse_4)">
                    <g id="Ellipse_4-2" data-name="Ellipse 4" class="circle" transform="translate(192 192)" fill="#fff"
                       stroke="#707070" stroke-width="1">
                        <ellipse cx="32" cy="31" rx="32" ry="31" stroke="none"/>
                        <foreignObject width="100%" height="100%">
                            <i class="fas fa-clock stat-icon stat-icon__fourth"></i>
                            <span class="stat-count">{{totalTravelTime}}</span>
                        </foreignObject>
                        <ellipse cx="32" cy="31" rx="31.5" ry="30.5" fill="none"/>
                    </g>
                </g>
                <g transform="matrix(1, 0, 0, 1, 3, 198)" filter="url(#Line_2)">
                    <line id="Line_2-2" class="line" data-name="Line 2" x2="121" y2="48"
                          transform="translate(72.5 166.5)" fill="none" stroke="#707070" stroke-width="1"/>
                </g>
                <g transform="matrix(1, 0, 0, 1, 3, 198)" filter="url(#Line_3)">
                    <line id="Line_3-2" class="line" data-name="Line 3" x2="122" y2="48"
                          transform="translate(71.5 43.5)" fill="none" stroke="#707070" stroke-width="1"/>
                </g>
                <g transform="matrix(1, 0, 0, 1, 3, 198)" class="line" filter="url(#Line_4)">
                    <line id="Line_4-2" class="line" data-name="Line 4" y1="49" x2="121"
                          transform="translate(72.5 108.5)" fill="none" stroke="#707070" stroke-width="1"/>
                </g>
            </g>
            <text class="popup" transform="translate(90 34)" fill="#707070" font-size="20"
                  font-family="SegoeUI, Segoe UI">
                <tspan x="0" y="0">Общая стоимость поездок</tspan>
            </text>
            <text class="popup" transform="translate(0 100)" fill="#707070" font-size="20"
                  font-family="SegoeUI, Segoe UI">
                <tspan x="0" y="0">Общее количество поездок</tspan>
            </text>
            <text class="popup" transform="translate(90 165)" fill="#707070" font-size="20"
                  font-family="SegoeUI, Segoe UI">
                <tspan x="0" y="0">Общее количество километров</tspan>
            </text>
            <text class="popup" transform="translate(0 230)" fill="#707070" font-size="20"
                  font-family="SegoeUI, Segoe UI">
                <tspan x="0" y="0">Общее время в пути</tspan>
            </text>
        </svg>
        <div>
            <vs-button v-on:click="setStatClass('user')" type="line" color="#737373" :class="{activeStat: userStat}">Пассажир</vs-button>
            <vs-button v-on:click="setStatClass('car')" type="line" color="#737373" :class="{activeStat: carStat}">Водитель</vs-button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "statistic",
        data() {
            return {
                totalCostOfTravel: '1345',
                totalNumberOfTrips: '2',
                totalNumberOfKilometers: '465',
                totalTravelTime: '13',
                userStat: true,
                carStat: false
            }
        },
        methods: {
            setStatClass(str) {
                switch (str) {
                    case 'user':
                        this.userStat = true;
                        this.carStat = false;
                        break;
                    case 'car':
                        this.userStat = false;
                        this.carStat = true;
                        break;
                }

            }
        }
    }
</script>

<style scoped lang="scss">
    .activeStat {
        color: black !important;
        font-weight: bold !important;
    }
    .popup {
        font-size: 13px;
        font-style: italic;
    }

    body {
        height: 100vh;
        position: relative;
        background-color: #f5f5f5;
    }

    svg {

    }

    .stat-icon {
        top: 10px;
        left: 17px;
        opacity: 0.2;
        position: absolute;
        font-size: 2.7rem;

        &__second {
            top: 8px;
            left: 16px;
        }

        &__third {
            top: 7px;
            left: 8px;
        }

        &__fourth {
            top: 10px;
            left: 11px;
        }
    }

    .stat-count {
        width: 63px;
        height: 62px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 100%;
        font-weight: bold;
        color: darkblue;
    }

    .stat-popup {
        display: none;
    }

    .circle {
        stroke-dasharray: 1000;
        stroke-dashoffset: 1000px;
        animation: stroke 5s ease-out forwards;

        &:hover {
            .stat-icon {
                opacity: 1;
            }

            .stat-count {
                opacity: 0.4;
            }

            .stat-popup {
                display: block;
            }
        }
    }

    .line {
        stroke-dasharray: 280;
        stroke-width: 1px;
        stroke-dashoffset: 100px;
        animation: stroke 14s ease-out forwards;
    }

    @keyframes stroke {
        to {
            stroke-dashoffset: 0;
        }
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }
</style>
