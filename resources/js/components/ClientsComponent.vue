<template>
  <div>
    <h3>{{ type }}</h3>
    <form @submit.prevent="addClient" v-if="!isEditActive">
      <div class="form-group" :class="{ 'form-group--error': $v.client.nombres.$error }">
        <input
          type="text"
          placeholder="Nombre(s)"
          class="form-control mb-2 form__input"
          v-model.trim="$v.client.nombres.$model"
        />
        <small
          class="error form-text text-danger"
          v-if="!$v.client.nombres.required"
        >*El nombre es requerido.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.nombres.minLength"
        >El nombre debe de terner por lo menos {{$v.client.nombres.$params.minLength.min}} letras.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.nombres.maxLength"
        >El nombre no debe de terner más de {{$v.client.nombres.$params.maxLength.max}} letras.</small>
      </div>

      <div class="form-group" :class="{ 'form-group--error': $v.client.apellidos.$error }">
        <input
          type="text"
          placeholder="Apellido(s)"
          class="form-control mb-2 form__input"
          v-model.trim="$v.client.apellidos.$model"
        />
        <small
          class="error form-text text-danger"
          v-if="!$v.client.apellidos.required"
        >*El apellido es requerido.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.apellidos.minLength"
        >El apellido debe de terner por lo menos {{$v.client.apellidos.$params.minLength.min}} letras.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.apellidos.maxLength"
        >El apellido no debe de terner más de {{$v.client.apellidos.$params.maxLength.max}} letras.</small>
      </div>

      <div class="form-group" :class="{ 'form-group--error': $v.client.cedula.$error }">
        <input
          type="number"
          placeholder="Cédula de ciudadania"
          class="form-control mb-2 form__input"
          v-model.trim="$v.client.cedula.$model"
        />
        <small
          class="error form-text text-danger"
          v-if="!$v.client.cedula.required"
        >*La cédula es requerida.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.cedula.integer"
        >La cédula tiene que tener solo enteros.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.cedula.minLength"
        >La cédula debe terner por lo menos {{$v.client.cedula.$params.minLength.min}} caracteres.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.cedula.maxLength"
        >La cédula no debe de terner más de {{$v.client.cedula.$params.maxLength.max}} caracteres.</small>
      </div>

      <div class="form-group" :class="{ 'form-group--error': $v.client.correo.$error }">
        <input
          type="email"
          placeholder="Correo electrónico"
          class="form-control mb-2 form__input"
          v-model.trim="$v.client.correo.$model"
        />
        <small
          class="error form-text text-danger"
          v-if="!$v.client.correo.required"
        >*El correo es requerido.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.correo.email"
        >No es el formato de un correo electrónico.</small>
      </div>

      <div class="form-group" :class="{ 'form-group--error': $v.client.telefono.$error }">
        <input
          type="number"
          placeholder="Teléfono"
          class="form-control mb-2 form__input"
          v-model.trim="$v.client.telefono.$model"
        />
        <small
          class="error form-text text-danger"
          v-if="!$v.client.telefono.required"
        >*El teléfono es requerido.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.telefono.integer"
        >El teléfono tiene que tener solo caracteres numéricos.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.telefono.minLength"
        >El teléfono debe terner por lo menos {{$v.client.telefono.$params.minLength.min}} caracteres.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.telefono.maxLength"
        >El teléfono no debe de terner más de {{$v.client.telefono.$params.maxLength.max}} caracteres.</small>
      </div>

      <button type="submit" class="btn btn-primary">Agregar</button>
    </form>

    <form @submit.prevent="editClient(client)" v-else>
      <div class="form-group" :class="{ 'form-group--error': $v.client.nombres.$error }">
        <input
          type="text"
          placeholder="Nombre(s)"
          class="form-control mb-2 form__input"
          v-model.trim="$v.client.nombres.$model"
        />
        <small
          class="error form-text text-danger"
          v-if="!$v.client.nombres.required"
        >*El nombre es requerido.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.nombres.minLength"
        >El nombre debe de terner por lo menos {{$v.client.nombres.$params.minLength.min}} letras.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.nombres.maxLength"
        >El nombre no debe de terner más de {{$v.client.nombres.$params.maxLength.max}} letras.</small>
      </div>

      <div class="form-group" :class="{ 'form-group--error': $v.client.apellidos.$error }">
        <input
          type="text"
          placeholder="Apellido(s)"
          class="form-control mb-2 form__input"
          v-model.trim="$v.client.apellidos.$model"
        />
        <small
          class="error form-text text-danger"
          v-if="!$v.client.apellidos.required"
        >*El apellido es requerido.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.apellidos.minLength"
        >El apellido debe de terner por lo menos {{$v.client.apellidos.$params.minLength.min}} letras.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.apellidos.maxLength"
        >El apellido no debe de terner más de {{$v.client.apellidos.$params.maxLength.max}} letras.</small>
      </div>

      <div class="form-group" :class="{ 'form-group--error': $v.client.cedula.$error }">
        <input
          type="number"
          placeholder="Cédula de ciudadania"
          class="form-control mb-2 form__input"
          v-model.trim="$v.client.cedula.$model"
        />
        <small
          class="error form-text text-danger"
          v-if="!$v.client.cedula.required"
        >*La cédula es requerida.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.cedula.integer"
        >La cédula tiene que tener solo enteros.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.cedula.minLength"
        >La cédula debe terner por lo menos {{$v.client.cedula.$params.minLength.min}} caracteres.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.cedula.maxLength"
        >La cédula no debe de terner más de {{$v.client.cedula.$params.maxLength.max}} caracteres.</small>
      </div>

      <div class="form-group" :class="{ 'form-group--error': $v.client.correo.$error }">
        <input
          type="email"
          placeholder="Correo electrónico"
          class="form-control mb-2 form__input"
          v-model.trim="$v.client.correo.$model"
        />
        <small
          class="error form-text text-danger"
          v-if="!$v.client.correo.required"
        >*El correo es requerido.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.correo.email"
        >No es el formato de un correo electrónico.</small>
      </div>

      <div class="form-group" :class="{ 'form-group--error': $v.client.telefono.$error }">
        <input
          type="number"
          placeholder="Teléfono"
          class="form-control mb-2 form__input"
          v-model.trim="$v.client.telefono.$model"
        />
        <small
          class="error form-text text-danger"
          v-if="!$v.client.telefono.required"
        >*El teléfono es requerido.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.telefono.integer"
        >El teléfono tiene que tener solo caracteres numéricos.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.telefono.minLength"
        >El teléfono debe terner por lo menos {{$v.client.telefono.$params.minLength.min}} caracteres.</small>
        <small
          class="error form-text text-danger"
          v-if="!$v.client.telefono.maxLength"
        >El teléfono no debe de terner más de {{$v.client.telefono.$params.maxLength.max}} caracteres.</small>
      </div>

      <button type="submit" class="btn btn-success">Modificar</button>
      <button type="button" class="btn btn-danger" @click="clearInput()">Cancelar</button>
    </form>

    <hr class="mt-3" />
    <h3>Listado de clientes</h3>
    <ul class="list-group my-2">
      <li class="list-group-item" v-for="(item, index) in clients" :key="index">
        <span class="badge badge-secondary float-right">{{ item.fecha_de_registro }}</span>
        <h5>{{ item.nombres }} {{ item.apellidos }}</h5>
        <span
          class="badge badge-light float-right"
          v-if="item.fecha_de_modificacion"
        >{{ item.fecha_de_modificacion }}</span>
        <p>
          <strong>{{ item.cedula }}</strong>
          <br />
          {{ item.correo }} - {{ item.telefono }}
        </p>
        <p>
          <button
            class="btn btn-danger btn-sm float-right m-1"
            @click="toastOption('¿Está seguro de eliminar la información del cliente?', item, index)"
          >Eliminar</button>
          <button class="btn btn-primary btn-sm float-right m-1" @click="editForm(item)">Editar</button>
        </p>
      </li>
    </ul>
  </div>
</template>
<script>
import {
  required,
  integer,
  minLength,
  maxLength,
  email
} from "vuelidate/lib/validators";

export default {
  data() {
    return {
      clients: [],
      client: {
        id: "",
        nombres: "",
        apellidos: "",
        cedula: "",
        correo: "",
        telefono: ""
      },
      isEditActive: false,
      type: "Agregar un nuevo cliente"
    };
  },
  created() {
    axios.get("/clients").then(response => {
      this.clients = response.data;
    });
  },
  validations: {
    client: {
      nombres: {
        required,
        minLength: minLength(3),
        maxLength: maxLength(20)
      },
      apellidos: {
        required,
        minLength: minLength(4),
        maxLength: maxLength(20)
      },
      cedula: {
        required,
        integer,
        minLength: minLength(8),
        maxLength: maxLength(12)
      },
      correo: {
        required,
        email
      },
      telefono: {
        required,
        integer,
        minLength: minLength(7),
        maxLength: maxLength(10)
      }
    }
  },
  methods: {
    addClient() {
      const params = {
        nombres: this.client.nombres,
        apellidos: this.client.apellidos,
        cedula: this.client.cedula,
        correo: this.client.correo,
        telefono: this.client.telefono
      };
      //console.log(this.params, this.client);
      this.$v.$touch();
      if (this.$v.$invalid) {
        this.submitStatus = "ERROR";
        this.toast("¡Hay campos erroneos o vacios!");
      } else {
        axios
          .post("/clients", params)
          .then(response => {
            this.clients.push(response.data);
            this.clearInput();
            this.toast(
              "Gracias " +
                response.data.nombres +
                ", tus datos han sido registrados"
            );
          })
          .catch(err => {
            console.log("Error: ", err.code);
            if (err.message === "Request failed with status code 500")
              this.toast(
                "¡Upps, ha ocurrido un error, al parecer la cédula o el correo ya están registrados! "
              );
            else this.toast("¡Upps, ha ocurrido un error! " + err.message);
          });
      }
      //
    },
    editForm(item) {
      this.isEditActive = true;
      this.type = "Editar la información de " + item.nombres;
      this.client = {
        id: item.id,
        nombres: item.nombres,
        apellidos: item.apellidos,
        cedula: item.cedula,
        correo: item.correo,
        telefono: item.telefono
      };
    },
    editClient(client) {
      const params = {
        nombres: client.nombres,
        apellidos: client.apellidos,
        cedula: client.cedula,
        correo: client.correo,
        telefono: client.telefono
      };
      if (this.$v.$invalid) {
        this.submitStatus = "ERROR";
        this.toast("¡Hay campos erroneos o vacios!");
      } else {
        axios
          .put(`/clients/${client.id}`, params)
          .then(response => {
            const index = this.clients.findIndex(
              item => item.id === response.data.id
            );
            //@START: Mejorar éste código
            this.clients.splice(index, 1);
            this.clients.push(response.data);
            //@END
            this.toast(
              "Has modificado la información del cliente " +
                response.data.nombres +
                "."
            );
            this.clearInput();
          })
          .catch(err => {
            if (err.message === "Request failed with status code 500")
              this.toast(
                "¡Upps, ha ocurrido un error, al parecer la cédula o el correo ya están registrados! "
              );
            else this.toast("¡Upps, ha ocurrido un error! " + err.message);
          });
      }
    },
    deleteClient(item, index) {
      axios
        .delete(`/clients/${item.id}`)
        .then(() => {
          this.clients.splice(index, 1);
          this.toast(
            "Has eliminado correctamente al cliente " + item.nombres + "."
          );
        })
        .catch(err => {
          this.toast("¡Upps, ha ocurrido un error! " + err.message);
        });
    },
    clearInput() {
      this.type = "Agregar un nuevo cliente";
      this.client.nombres = "";
      this.client.apellidos = "";
      this.client.cedula = "";
      this.client.correo = "";
      this.client.telefono = "";
      this.isEditActive = false;
    },
    toast(message) {
      Vue.toasted.show(message, {
        theme: "toasted-primary",
        position: "top-right",
        duration: 5000
      });
    },
    toastOption(message, item, index) {
      Vue.toasted.show(message, {
        action: [
          {
            text: "No",
            onClick: (e, toastObject) => {
              toastObject.goAway(0);
            }
          },
          {
            text: "Si",
            // router navigation
            onClick: (e, toastObject) => {
              toastObject.goAway(0);
              this.deleteClient(item, index);
            }
          }
        ]
      });
    }
  }
};
</script>