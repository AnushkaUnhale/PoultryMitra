    /* Prediction File Uploader*/
    async function readURL(input) {
        if (input.files && input.files[0]) {
    
        var reader = new FileReader();
    
        reader.onload = function(e) {
            $('.image-upload-wrap').hide();
            $('.file-upload-image').attr('src', e.target.result);
            $('.file-upload-content').show();
            $('.image-title').html(input.files[0].name);
        };
    
        reader.readAsDataURL(input.files[0]);
    
        } else {
            console.error('Error uploading image:', error);
            throw error; // Propagate the error to the caller
            removeUpload();
        }
    }
    
    async function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function () {
            $('.image-upload-wrap').addClass('image-dropping');
        });
        $('.image-upload-wrap').bind('dragleave', function () {
            $('.image-upload-wrap').removeClass('image-dropping');
    });

    //  //API CALl
    //  document.addEventListener('DOMContentLoaded', function () {
    //     // console.log("content loaded");
    //     const fileInput = document.getElementById('file-upload-input');
    //     const predictBtn = document.getElementById('predict-btn');
    //     const predictionResult = document.getElementById('predictionResult');

    //     predictBtn.addEventListener('click', function (event) {
    //         event.preventDefault(); // Prevent default form submission behavior
    //         //console.log("function called");
    //         // console.log(fileInput);
    //         const file = fileInput.files && fileInput.files.length > 0 ? fileInput.files[0] : null;
    //         if (!file) {
    //             alert('Please select an image to predict.');
    //             return;
    //         }

    //         const formData = new FormData();
    //         formData.append('file', file);


    //         fetch('http://127.0.0.1:5000/predict', {
    //             method: 'POST',
    //             body: formData
    //          })
    //         .then(function (response) {
    //             return response.json();
    //         }).then(function (data) {
    //             predictionResult.innerHTML = `Prediction: ${data.class} (Confidence: ${data.confidence}%)`;
    //         }).catch(function (error) {
    //             console.error('Error:', error);
    //         });
    //     });
    // });

    document.addEventListener('DOMContentLoaded', function () {
        const fileInput = document.getElementById('file-upload-input');
        const predictBtn = document.getElementById('predict-btn');
        const predictionResult = document.getElementById('predictionResult');

        predictBtn.addEventListener('click', async function (event) {
            event.preventDefault(); // Prevent default form submission behavior
            const imageFile = fileInput.files && fileInput.files.length > 0 ? fileInput.files[0] : null;
            if (!imageFile) {
                alert('Please select an image to predict.');
                return;
            }
            const formData = new FormData();
            formData.append('file', imageFile);
            console.log(imageFile)
                    
            try {
                const response = await fetch('http://localhost:5501/predict', {
                    method: 'POST',
                    body: formData
                });
                console.log(response);
                if (!response.ok) {
                    throw new Error('Network response was not ok.');
                }
                const data = await response.json();
                //predictionResult.innerHTML = `Prediction: ${data.class} (Confidence: ${data.confidence}%)`;

                
            } 
            catch (error) {
                console.error('Error:', error);
                // Display a user-friendly error message to the user
                alert('Failed to fetch data. Please try again later.');
            }
            try{
                 // Your code that might cause a DOMException
                 const elements = document.querySelectorAll('*,:x');
                 console.log(elements);
            }
            catch (error) {
                
                console.error('DOMException:', error);
                // Optionally, display an error message or take other actions
            }      
            
        });
    });