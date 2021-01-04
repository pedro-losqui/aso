//Store
window.livewire.on('employeeStore', () => {
    $('.createEmployee').modal('hide');
    setTimeout(function () {
        $('.alert-success').fadeOut();
    }, 2000);
});

window.livewire.on('companyStore', () => {
    $('.createCompany').modal('hide');
    setTimeout(function () {
        $('.alert-success').fadeOut();
    }, 2000);
});

window.livewire.on('peopleStore', () => {
    $('.createPeople').modal('hide');
    setTimeout(function () {
        $('.alert-success').fadeOut();
    }, 2000);
});

// Update
window.livewire.on('employeeUpdate', () => {
    $('.editEmployee').modal('hide');
    setTimeout(function () {
        $('.alert-warning').fadeOut();
    }, 2000);
});

window.livewire.on('companyUpdate', () => {
    $('.editCompany').modal('hide');
    setTimeout(function () {
        $('.alert-warning').fadeOut();
    }, 2000);
});

window.livewire.on('peopleUpdate', () => {
    $('.editPeople').modal('hide');
    setTimeout(function () {
        $('.alert-warning').fadeOut();
    }, 2000);
});

//Delete
window.livewire.on('employeeDelete', () => {
    setTimeout(function () {
        $('.alert-danger').fadeOut();
    }, 2000);
});

window.livewire.on('companyDelete', () => {
    setTimeout(function () {
        $('.alert-danger').fadeOut();
    }, 2000);
});

window.livewire.on('peopleDelete', () => {
    setTimeout(function () {
        $('.alert-danger').fadeOut();
    }, 2000);
});

