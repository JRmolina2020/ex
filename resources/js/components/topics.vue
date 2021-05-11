<template>
    <div class="container">
        {{ this.form.id }}
        <form method="POST" @submit.prevent="add(form.id)" autocomplete="off">
            <div class="row mt-3">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">tendencia</label>
                        <input
                            type="text"
                            placeholder="tema"
                            class="form-control"
                            v-model="form.name"
                        />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">tipo</label>
                        <select class="form-control" v-model="form.type">
                            <option value="Politica">Politica</option>
                            <option value="Salud">Salud</option>
                            <option value="Derechos humanos">DH</option>
                            <option value="Deporte">Deporte</option>
                            <option value="farandula">Farandula</option>
                            <option value="Internacional">Internacional</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <label for="">neutro</label>
                    <div class="form-group">
                        <input
                            type="number"
                            placeholder="neutro"
                            class="form-control"
                            v-model.number="form.neutro"
                        />
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="">rabia</label>
                        <input
                            type="number"
                            placeholder="anger"
                            class="form-control"
                            v-model.number="form.anger"
                        />
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="">disgusto</label>
                        <input
                            type="number"
                            placeholder="disgust"
                            class="form-control"
                            v-model.number="form.disgust"
                        />
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="">miedo</label>
                        <input
                            type="number"
                            placeholder="fear"
                            class="form-control"
                            v-model.number="form.fear"
                        />
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="">alegria</label>
                        <input
                            type="number"
                            placeholder="joy"
                            class="form-control"
                            v-model.number="form.joy"
                        />
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="">sorpresa</label>
                        <input
                            type="number"
                            placeholder="surprise"
                            class="form-control"
                            v-model.number="form.surprise"
                        />
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="">tristeza</label>
                        <input
                            type="number"
                            placeholder="sadness"
                            class="form-control"
                            v-model.number="form.sadness"
                        />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="">Pos</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model.number="form.pos"
                        />
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="">Neg</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model.number="form.neg"
                        />
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="">Mpos</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model.number="form.mpos"
                        />
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="">Mneg</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model.number="form.mneg"
                        />
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <button type="subtmit" class="btn btn-primary btn-xs">
                    Guardar
                </button>
                <button
                    type="button"
                    @click="clear()"
                    class="btn btn-primary btn-xs mt-3"
                >
                    L
                </button>
            </div>
            <div class="row">
                <p>sentimientos</p>
                <h5>VAN {{ tot }}</h5>
                <h5>FALTAN {{ limit - tot }}</h5>
            </div>
            <div class="row">
                <p>polar</p>
                <h5>VAN {{ tot2 }}</h5>
                <h5>FALTAN {{ limit - tot2 }}</h5>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tema</th>
                            <th>Tipo</th>
                            <th>rabia</th>
                            <th>disguto</th>
                            <th>miedo</th>
                            <th>alegria</th>
                            <th>sorpresa</th>
                            <th>neutro</th>
                            <th>tristeza</th>
                            <th>POS</th>
                            <th>NEG</th>
                            <th>MPOS</th>
                            <th>MNEG</th>
                            <th>U</th>
                            <th>E</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in data" :key="item.id">
                            <td>{{ item.name }}</td>
                            <td>{{ item.type }}</td>
                            <td>{{ item.anger }}</td>
                            <td>{{ item.disgust }}</td>
                            <td>{{ item.fear }}</td>
                            <td>{{ item.joy }}</td>
                            <td>{{ item.surprise }}</td>
                            <td>{{ item.neutro }}</td>
                            <td>{{ item.sadness }}</td>
                            <td>{{ item.pos }}</td>
                            <td>{{ item.neg }}</td>
                            <td>{{ item.mpos }}</td>
                            <td>{{ item.mneg }}</td>
                            <td>
                                <button
                                    @click="show(item)"
                                    type="button"
                                    class="btn btn-primary btn-xs"
                                >
                                    U
                                </button>
                            </td>
                            <td>
                                <button
                                    @click="destroy(item.id)"
                                    type="button"
                                    class="btn btn-danger btn-xs"
                                >
                                    E
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    name: "topics",
    data() {
        return {
            data: [],
            limit: 4000,
            form: {
                id: null,
                name: "",
                type: "",
                anger: 0,
                disgust: 0,
                fear: 0,
                joy: 0,
                surprise: 0,
                neutro: 0,
                sadness: 0,
                pos: 0,
                neg: 0,
                mpos: 0,
                mneg: 0
            }
        };
    },
    created() {
        this.get();
    },
    methods: {
        add(id) {
            if (id) {
                axios
                    .put("topics/" + id, this.form)
                    .then(response => {
                        this.get();
                    })
                    .catch(error => {
                        console.log(err);
                    });
            } else {
                axios.post("topics", this.form).then(result => {
                    this.get();
                });
            }
        },

        get() {
            axios.get("topics").then(result => {
                this.data = result.data;
            });
        },
        destroy(id) {
            axios.delete("topics/" + id).then(response => {
                this.get();
            });
        },
        show(item) {
            this.form.id = item.id;
            this.form.name = item.name;
            this.form.type = item.type;
            this.form.anger = item.anger;
            this.form.joy = item.joy;
            this.form.surprise = item.surprise;
            this.form.neutro = item.neutro;
            this.form.sadness = item.sadness;
            this.form.fear = item.fear;
            this.form.disgust = item.disgust;
            this.form.pos = item.pos;
            this.form.neg = item.neg;
            this.form.mpos = item.mpos;
            this.form.mneg = item.mneg;
        },
        clear() {
            this.form.name = "";
            this.form.type = "";
            this.form.anger = 0;
            this.form.joy = 0;
            this.form.surprise = 0;
            this.form.neutro = 0;
            this.form.sadness = 0;
            this.form.fear = 0;
            this.form.disgust = 0;
        }
    },
    computed: {
        tot() {
            let sum = 0;
            sum =
                this.form.anger +
                this.form.disgust +
                this.form.fear +
                this.form.joy +
                this.form.surprise +
                this.form.neutro +
                this.form.sadness;
            return sum;
        },
        tot2() {
            let sum = 0;
            sum =
                this.form.pos + this.form.neg + this.form.mpos + this.form.mneg;

            return sum;
        }
    }
};
</script>
