<template>
  <v-container>
    <v-row class="mt-4">
      <div class="text-h6">Welcome to the Employee Raffle!</div>
    </v-row>
    <v-row align="center" class="mt-4">
      <v-btn
      @click="getEmployees"
      :disabled="isRafflesNull"
      color="secondary"
      >
        Draw Winners
      </v-btn>
      <v-form @submit.prevent="" ref="form" class="ml-6">
        <v-text-field
          v-model="raffles"
          :rules="raffleRules"
          label="How many winners?"
          required
        >
        </v-text-field>
      </v-form>
    </v-row>
    <br>
    <v-data-table
      align="bottom"
      v-if="employees.length > 0"
      :headers="headers"
      :items="employeesWithIndex"
      :items-per-page="5"
      class="elevation-1"
    >
    </v-data-table>
  </v-container>
</template>

<script>
import axios from 'axios'
import { API_BASE_URL } from '@/config.js'

export default {
  data() {
    return {
      employees: [],
      isLoading: false,
      raffles: null,
      raffleRules: [
        r => !!r || 'Raffle quantity required',
        r => r > 0 || 'Quantity must be positive'
      ],
      headers: [
        {
          text: 'Winner #',
          align: 'start',
          sortable: false,
          value: 'index'
        },
        {
          text: 'Employee Name',
          align: 'start',
          sortable: false,
          value: 'employee_name'
        },
        {
          text: 'Email',
          align: 'start',
          sortable: false,
          value: 'email'
        },
        {
          text: 'Department',
          align: 'start',
          sortable: false,
          value: 'department_id'
        }
      ]
    }
  },
  computed: {
    employeesWithIndex () {
      return this.employees.map(
        (employees, index) => ({
          ...employees,
          index: index + 1
        })
      )
    },
    isRafflesNull () {
      return (this.raffles <= 0 || !this.raffles || isNaN(this.raffles)) ? true : false
    }
  },
  methods: {
    async getEmployees () {
      if(!this.isRafflesNull) {
        this.isLoading = true
        const response = await axios.get(API_BASE_URL + '/raffle/' + this.raffles)
        this.employees = response.data.data
        this.raffles = null
        this.$refs.form.reset()
        this.isLoading = false
      }
    }
  }
}
</script>
