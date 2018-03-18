<template>
  <div class="card">
    <div class="card-header">
      <i class="fa fa-table" aria-hidden="true"></i> Add anggaran

      <ul class="nav nav-pills card-header-pills pull-right">
        <li class="nav-item">
          <button class="btn btn-primary btn-sm" role="button" @click="back">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
          </button>
        </li>
      </ul>
    </div>

    <div class="card-body">
      <vue-form class="form-horizontal form-validation" :state="state" @submit.prevent="onSubmit">
        <div class="form-row">
          <div class="col-md">
            <validate tag="div">
              <input class="form-control" v-model="model.label" required autofocus name="label" type="text" placeholder="Label">

              <field-messages name="label" show="$invalid && $submitted" class="text-danger">
                <small class="form-text text-success">Looks good!</small>
                <small class="form-text text-danger" slot="required">Label is a required field</small>
              </field-messages>
            </validate>
          </div>
        </div>

        <div class="form-row mt-4">
          <div class="col-md">
            <validate tag="div">
              <input class="form-control" v-model="model.description" name="description" type="text" placeholder="Description">

              <field-messages name="description" show="$invalid && $submitted" class="text-danger">
                <small class="form-text text-success">Looks good!</small>
              </field-messages>
            </validate>
          </div>
        </div>

        <div class="form-row mt-4">
					<div class="col-md">
						<validate tag="div">
						<label for="user_id">Username</label>
						<v-select name="user_id" v-model="model.user" :options="user" class="mb-4"></v-select>

						<field-messages name="user_id" show="$invalid && $submitted" class="text-danger">
							<small class="form-text text-success">Looks good!</small>
							<small class="form-text text-danger" slot="required">username is a required field</small>
						</field-messages>
						</validate>
					</div>
				</div>

        <div class="form-row mt-4">
					<div class="col-md">
						<validate tag="div">
						<label for="group_egovernment">GroupEgovernment</label>
						<v-select name="group_egovernment" v-model="model.group_egovernment" :options="group_egovernment" class="mb-4"></v-select>

						<field-messages name="group_egovernment" show="$invalid && $submitted" class="text-danger">
							<small class="form-text text-success">Looks good!</small>
							<small class="form-text text-danger" slot="required">Label is a required field</small>
						</field-messages>
						</validate>
					</div>
				</div>

        <div class="form-row mt-4">
          <div class="col-md">
            <button type="submit" class="btn btn-primary">Submit</button>

            <button type="reset" class="btn btn-secondary" @click="reset">Reset</button>
          </div>
        </div>

      </vue-form>
    </div>
  </div>
</template>

<script>
export default {
  mounted(){
    axios.get('api/anggaran/create')
    .then(response => {
        response.data.group_egovernment.forEach(element => {
          this.group_egovernment.push(element);
        });
        response.data.user.forEach(user_element => {
            this.user.push(user_element);
        });
    })
    .catch(function(response) {
      alert('Break');
    });
  },
  data() {
    return {
      state: {},
      model: {
        label: "",
        user: "",
        description: "",
        group_egovernment: "",
      },
      group_egovernment: [],
      user: []
    }
  },
  methods: {
    onSubmit: function() {
      let app = this;

      if (this.state.$invalid) {
        return;
      } else {
        axios.post('api/anggaran', {
            label: this.model.label,
            description: this.model.description,
            group_egovernment_id: this.model.group_egovernment.id,
            user_id: this.model.user.id
          })
          .then(response => {
            if (response.data.status == true) {
              if(response.data.message == 'success'){
                alert(response.data.message);
                app.back();
              }else{
                alert(response.data.message);
              }
            } else {
              alert(response.data.message);
            }
          })
          .catch(function(response) {
            alert('Break ' + response.data.message);
          });
      }
    },
    reset() {
      this.model = {
          label: "",
          description: ""
      };
    },
    back() {
      window.location = '#/admin/anggaran';
    }
  }
}
</script>
