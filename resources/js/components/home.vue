<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-4 jumbotron">
                <center>
                    <img
                        width="60"
                        height="60"
                        src="https://logodownload.org/wp-content/uploads/2014/09/twitter-logo-2-1.png"
                        alt=""
                    />
                    <h4>Selecciona el #tendencia</h4>
                </center>

                <div class="form-group">
                    <label for=""># Tendencia</label>
                    <select
                        class="form-control"
                        v-model="select"
                        @change="getUnit()"
                    >
                        <option
                            v-for="item in form.select"
                            :key="item.id"
                            :value="item.id"
                            >{{ item.name }}</option
                        >
                    </select>
                </div>
            </div>

            <div class="col-lg-8">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link active"
                            id="pills-home-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#pills-home"
                            type="button"
                            role="tab"
                            aria-controls="pills-home"
                            aria-selected="true"
                        >
                            Inicio
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="pills-profile-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#pills-profile"
                            type="button"
                            role="tab"
                            aria-controls="pills-profile"
                            aria-selected="false"
                        >
                            Resumen
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="pills-contact-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#pills-contact"
                            type="button"
                            role="tab"
                            aria-controls="pills-contact"
                            aria-selected="false"
                        >
                            Test
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div
                        class="tab-pane fade show active"
                        id="pills-home"
                        role="tabpanel"
                        aria-labelledby="pills-home-tab"
                    >
                        <div v-for="item in data" :key="item.id">
                            <div>
                                d
                                <h5></h5>
                                <apexchart
                                    width="500"
                                    type="bar"
                                    :options="chartOptions"
                                    :series="series"
                                ></apexchart>
                            </div>

                            <div id="chart">
                                <h5>Distribución polar por agrupación</h5>
                                <apexchart
                                    type="pie"
                                    width="380"
                                    :options="chartOptions2"
                                    :series="series2"
                                ></apexchart>
                                <div></div>
                                <p>
                                    {{ item.pos }} usuarios expresarón
                                    comentarios positivos acerca del tema
                                    {{ item.name }}, {{ item.neg }} usuarios
                                    generaron comentarios negativos acerca del
                                    tema {{ item.name }},
                                    {{ item.mpos }} usuarios generaron
                                    comentarios muy positivos, a comparación de
                                    los muy negativos que fue un total de
                                    {{ item.mneg }}
                                </p>
                                <p>
                                    <strong>Conclusión: </strong>
                                    {{ sabertext }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="pills-profile"
                        role="tabpanel"
                        aria-labelledby="pills-profile-tab"
                    >
                        <div>
                            <center>
                                <h3>Frecuencia de palabras por tweet</h3>
                            </center>
                            <div id="chart2">
                                <apexchart
                                    type="pie"
                                    width="480"
                                    :options="chartOptions3"
                                    :series="datapun"
                                ></apexchart>
                            </div>
                            <p>
                                En el anterior grafico se representa las 10
                                palabras mas mencionadas en el conjunto de datos
                                extraídos acerca del tema tedencia
                            </p>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="pills-contact"
                        role="tabpanel"
                        aria-labelledby="pills-contact-tab"
                    >
                        ...
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
var colors = [
    "#008FFB",
    "#00E396",
    "#FEB019",
    "#FF4560",
    "#775DD0",
    "#546E7A",
    "#26a69a"
];
import Swal from "sweetalert2";
export default {
    name: "home",

    data() {
        return {
            sabertext: "",
            //star

            chartOptions2: {
                chart: {
                    width: 380,
                    type: "pie"
                },
                labels: [
                    "Positivo",
                    "Negativo",
                    "Muy positivo",
                    "Muy negativo"
                ],
                responsive: [
                    {
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: "bottom"
                            }
                        }
                    }
                ]
            },
            chartOptions: {
                chart: {
                    id: "vuechart-example",
                    height: 350,
                    type: "bar",
                    events: {
                        click: function(chart, w, e) {
                            // console.log(chart, w, e)
                        }
                    }
                },
                colors: colors,
                plotOptions: {
                    bar: {
                        borderRadius: 6,
                        columnWidth: "45%",
                        distributed: true
                    }
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false
                },
                xaxis: {
                    categories: [
                        "enojo",
                        "disgustados",
                        "miedo",
                        "alegria",
                        "sorpresa",
                        "neutro",
                        "tristeza"
                    ]
                },

                labels: {
                    style: {
                        colors: colors,
                        fontSize: "12px"
                    }
                }
            },
            //start
            chartOptions3: {
                chart: {
                    width: 380,
                    type: "donut"
                },
                labels: [],
                responsive: [
                    {
                        breakpoint: 580,
                        options: {
                            chart: {
                                width: 300
                            },
                            legend: {
                                position: "bottom"
                            }
                        }
                    }
                ]
            },

            //end
            //end
            select: 0,
            data: [],
            datapun: [],
            datalet: [],
            dataWord: [],

            form: {
                select: []
            }
        };
    },
    created() {
        this.get();
    },
    computed: {
        series2() {
            for (const item of this.data) {
                var seriesdata2 = [item.pos, item.neg, item.mpos, item.mneg];
            }

            return seriesdata2;
        },

        series3() {
            for (let i = 0; i < this.dataWord.length; i++) {
                var seriesx = this.dataWord[i].pun;
            }
            return seriesx;
        },

        series() {
            for (const item of this.data) {
                var seriesdata = [
                    {
                        data: [
                            item.anger,
                            item.disgust,
                            item.fear,
                            item.joy,
                            item.surprise,
                            item.neutro,
                            item.sadness
                        ]
                    }
                ];
            }

            return seriesdata;
        }
    },
    methods: {
        get() {
            axios.get("topics").then(result => {
                this.form.select = result.data;
            });
        },
        getWordunit() {
            axios.get("words/" + this.select).then(result => {
                this.dataWord = result.data;
                for (let i = 0; i < this.dataWord.length; i++) {
                    this.datapun.push(this.dataWord[i].pun);

                    this.chartOptions3.labels.push(this.dataWord[i].name);
                }
            });
        },

        getUnit() {
            let timerInterval;
            Swal.fire({
                title: "CARGANDO",
                html: "Extrallendo información",
                timer: 1000,
                imageUrl:
                    "https://icons8.com/vue-static/landings/animated-icons/icons/twitter/twitter_200.gif",
                imageHeight: 200,
                imageAlt: "A tall image",
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    timerInterval = setInterval(() => {
                        const content = Swal.getContent();
                        if (content) {
                            const b = content.querySelector("b");
                            if (b) {
                                b.textContent = Swal.getTimerLeft();
                            }
                        }
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                    axios.get("topics/" + this.select).then(result => {
                        this.data = result.data;

                        for (const item of this.data) {
                            if (item.pos > item.neg) {
                                this.sabertext = `Hay usuarios más a favor que encontra ha serca del tema ${item.name} `;
                            } else {
                                this.sabertext = `Hay usuarios más encontra que a favor a serca del tema ${item.name} `;
                            }
                        }
                    });
                    this.getWordunit();
                }
            }).then(result => {});
        }
    }
};
</script>
<style type="text/css">
.jumbotron {
    padding: 4rem 2rem;
    margin-bottom: 2rem;
    background-color: var(--bs-light);
    border-radius: 0.3rem;
}
</style>
