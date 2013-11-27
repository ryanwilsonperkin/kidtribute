function approveSuccess(data) {
    openModal();
}

function approveError(data) {
    console.log(data);
}

function rejectSuccess(data) {
    openModal();
}

function rejectError(data) {
    console.log(data);
}

function openModal() {
    $('.modal').modal('show');
}
