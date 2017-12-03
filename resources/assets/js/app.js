
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./parser');

window.Vue = require('vue');

const summaryPage = new Vue({
    el: '#summary-page',
    components: {
        'medication-list': require('./components/MedicationList.vue'),
        'patient': require('./components/Patient.vue')
    }
});

const addPatientPage = new Vue({
    el: '#patient-form',
    components: {
        'patient-form': require('./components/PatientForm.vue')
    }
});

const medicationForm = new Vue({
    el: '#medication-form',
    components: {
        'medication-form-list': require('./components/MedicationFormList.vue')
    }
});

$(() => {
    // FIXME: Scanning library setup & events
    // FIXME: find a better way to test this 
    console.log("patient emit");
    summaryPage.$emit('set-patient', {first_name: 'George', last_name: 'Smith', dob: '1/9/1993', mrn: 605065, sex: 'Male', physician: 'Dr. Jones', room: '12'});
    console.log("medication emit");
    summaryPage.$emit('add-medication', {name: 'Wellbutrin', dosage: 100, units: 'mg', instructions: '1 pill by mouth ever 4 hours', comments: '', stat: false});
    $('#form-extra').show();

    addPatientPage.$emit('set-patient', {first_name: 'George', last_name: 'Smith', dob: '1/9/1993', mrn: 605065});

    $('#add-medication').on('click', () => {
        medicationForm.$emit('add-medication', {name: '', dosage_amount: 0, dosage_unit: ''});
    });
    medicationForm.$emit('add-medication', {name: 'Wellbutrin', dosage_amount: 100, dosage_unit: 'mg'});
});
