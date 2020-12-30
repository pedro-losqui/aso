window.livewire.on('employeeStore', () => {
    $('.createEmployee').modal('hide');
    setTimeout(function () {
        $('.alert-success').fadeOut();
    }, 2000);
});

window.livewire.on('employeeUpdate', () => {
    $('.editEmployee').modal('hide');
    setTimeout(function () {
        $('.alert-warning').fadeOut();
    }, 2000);
});

window.livewire.on('employeeDelete', () => {
    setTimeout(function () {
        $('.alert-danger').fadeOut();
    }, 2000);
});