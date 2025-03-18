document.addEventListener('DOMContentLoaded', function () {
    const dateTimeInput = document.getElementById('date_time');
    
    if (!dateTimeInput) return;

    function updateDateTime() {
        const now = new Date();
        const dateTimeString = now.toISOString().slice(0, 19).replace("T", " ");

        dateTimeInput.value = dateTimeString;
    }

    setInterval(updateDateTime, 1000);    
    updateDateTime();
});