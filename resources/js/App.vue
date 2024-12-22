<template>
    <div>
        <Menubar :model="items" >
            <template #item="{ item, props, hasSubmenu }">
                <div class="mx-16 my-2">
                    <span :class="item.icon" />
                    <span>{{ item.label }}</span>
                </div>
            </template>
        </Menubar>

        <div class="card mx-16">
            <!-- Date Section -->
            <div class="flex items-center justify-between my-4 px-3">
                <h2 class="text-xl m-0 font-medium">Rates as of {{ formattedDate }}</h2>
                <Calendar v-model="currentDate" :showIcon="true" dateFormat="dd-mm-yy" />
            </div>

            <!-- Rates Grid -->
            <div class="grid grid-cols-4 gap-4 my-8">
                <div v-for="(item, index) in forexRates" 
                    :key="index"
                >
                    <Card class="rate-card mb-3">
                        <template #header>
                            <div class="flex items-center justify-center text-2xl font-normal my-2">{{ item.code }}</div>
                        </template>
                        <template #content>
                            <div class="flex items-center justify-center text-3xl font-bold">{{ item.rate }}</div>
                        </template>
                    </Card>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref, computed, onMounted, watch } from 'vue'
import moment from 'moment'
import axios from 'axios'

export default {
    name: 'ForexRates',
    setup() {
        const items = ref([
            {
                label: 'Yet Another Forex',
                icon: 'pi pi-home'
            },
        ]);

        const currentDate = ref(new Date(moment()))
        
        let forexRates = ref([])

        const formattedDate = computed(() => {
            return currentDate.value.toLocaleDateString('en-GB', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            })
        })

        const getRates = (dateInput) => {
            axios
                .get('/get-rates', {
                    params: {
                        date: dateInput
                    }})
                .then(res => {
                    forexRates.value = res.data.data.rates
                })
        }

        onMounted(() => {
            getRates(moment(currentDate.value).format('YYYY-MM-DD'))
        })

        watch(currentDate, (value) => {
            let newDate = moment(value).format('YYYY-MM-DD')
            getRates(newDate)
        })

        return {
            items,
            currentDate,
            forexRates,
            formattedDate,
            getRates
        }
  }
}
</script>

<style>
    .p-menubar {
        background: black!important;
        border: 0!important;
        border-radius: 0!important;
    }

    .rate-card {
        border-radius: 10px!important;
    }

    .p-menubar-item-content span{
        color: white!important;
    }

    .p-menubar-item-content:hover {
        background: black!important;
    }

    .p-card-header {
        background: #e5e7eb!important;
        border-top-left-radius: 10px!important;
        border-top-right-radius: 10px!important;
    }

    .p-card-body {
        --tw-bg-opacity: 1;
        background-color: rgba(243, 244, 246, var(--tw-bg-opacity));
        border-bottom-left-radius: 10px!important;
        border-bottom-right-radius: 10px!important;
    }

</style>