$(document).ready(function () {
    $("#ultrasound_image").change(function(event){
        var formData = new FormData($("#radiologyForm")[0]);

        $.ajax({
            url: '/predict-usg',
            type: 'POST',
            data: formData,
            contentType: false,  // Biarkan browser mengatur content-type
            processData: false,  // Jangan proses data sebagai query string
            success: function(response) {
                console.log('AJAX Success:', response);
                if (response.result) {
                    $("#predictionResult").val(response.result);
                    $("#predictionResultText").html("Prediction Result: " + response.result);
                } else {
                    $("#predictionResult").val("Prediction failed.");
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:');
                console.error('Status:', status);
                console.error('Error:', error);
                console.error('Response:', xhr.responseText);
            }
        });
    });

    $('#vitalSignForm').on('submit', function (event) {
        event.preventDefault(); // Cegah submit form default

        var formData = new FormData($(this)[0]); // Ambil data dari form

        // Debug: Log data yang akan dikirim
        var formDataObject = Object.fromEntries(formData);
        console.log("Data yang dikirim:", formDataObject);

        // Kirim data ke endpoint prediksi kesehatan
        $.ajax({
            url: '/check-health',
            method: 'POST',
            data: JSON.stringify(Object.fromEntries(formData)), // Kirim sebagai JSON
            contentType: 'application/json', // Set content type sebagai JSON
            success: function (response) {
                console.log("Prediksi Status Kesehatan:", response);

                $('#statusCondition').val(response.prediction); // Masukkan prediksi ke input
                formData.set('status_condition', response.prediction); // Tambahkan prediksi ke formData

                // Kirim data vital sign ke server untuk disimpan
                $.ajax({
                    url: '/vital-sign',
                    method: 'POST',
                    data: formData,  // Kirim formData
                    processData: false,  // Jangan proses data
                    contentType: false,  // Biarkan browser mengatur content-type
                    success: function (saveResponse) {
                        console.log("Response:", saveResponse);
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: saveResponse.message,
                        }).then(() => {
                            window.location.href = '/vital-sign';
                        });
                    },
                    error: function (xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Data tidak dapat disimpan. Silakan cek input Anda.',
                        });
                    }
                });
            },
            error: function (xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Gagal mendapatkan prediksi.',
                });
            }
        });
    });
});