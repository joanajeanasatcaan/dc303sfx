<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import PageLayout from '../PageLayout.vue';

const form = useForm({
  last_name: '',
  first_name: '',
  phone: '',
  address: '',
  investment_type: '',
});

const submit = () => {
  console.log('Form data:', form.data());
  form.post(route('investors.store'), {
    onSuccess: () => {
      form.reset();
    },
  });
};
</script>

<template>
  <Head title="Add Investor" />

  <PageLayout>
    <div class="bg-green-100 border border-green-300 p-8 rounded-lg w-[600px] mx-auto mt-12">
      <h1 class="mb-6 text-2xl font-bold text-center">Create Investor</h1>

      <form @submit.prevent="submit" class="space-y-4">
        <div>
          <label for="last_name" class="block font-medium">Last Name</label>
          <input
            id="last_name"
            v-model="form.last_name"
            type="text"
            class="w-full p-2 border rounded"
            autocomplete="off"
          />
          <div v-if="form.errors.last_name" class="text-sm text-red-600">{{ form.errors.last_name }}</div>
        </div>

        <div>
          <label for="first_name" class="block font-medium">First Name</label>
          <input
            id="first_name"
            v-model="form.first_name"
            type="text"
            class="w-full p-2 border rounded"
            autocomplete="off"
          />
          <div v-if="form.errors.first_name" class="text-sm text-red-600">{{ form.errors.first_name }}</div>
        </div>

        <div>
          <label for="phone" class="block font-medium">Phone</label>
          <input
            id="phone"
            v-model="form.phone"
            type="text"
            class="w-full p-2 border rounded"
            autocomplete="off"
          />
          <div v-if="form.errors.phone" class="text-sm text-red-600">{{ form.errors.phone }}</div>
        </div>

        <div>
          <label for="address" class="block font-medium">Address</label>
          <input
            id="address"
            v-model="form.address"
            type="text"
            class="w-full p-2 border rounded"
            autocomplete="off"
          />
          <div v-if="form.errors.address" class="text-sm text-red-600">{{ form.errors.address }}</div>
        </div>

        <div>
          <label for="investment_type" class="block font-medium">Investor Type</label>
          <select
            id="investment_type"
            v-model="form.investment_type"
            class="w-full p-2 border rounded"
            autocomplete="off"
          >
            <option value="">Select Type</option>
            <option value="micro">Micro</option>
            <option value="sponsor">Sponsor</option>
            <option value="benefactor">Benefactor</option>
          </select>
          <div v-if="form.errors.investment_type" class="text-sm text-red-600">{{ form.errors.investment_type }}</div>
        </div>

        <button
          type="submit"
          class="w-full px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700"
        >
          Submit
        </button>
      </form>
    </div>
  </PageLayout>
</template>
