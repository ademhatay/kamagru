
const video = document.querySelector('#video');
const close = document.querySelector('.close');
const startButton = document.querySelector('#start');
const filterbox = document.querySelector('.filterbox');
const filterboxToggle = document.querySelector('.filterbox-toggle');
const cameraList = document.querySelector('#cameras');
const canvas = document.getElementById('canvas');
const clearButton = document.getElementById('clear');
const photoButton = document.getElementById('capture');
const filters = document.querySelectorAll('.filter');
let selectedCameraId;
let filter = 'none';
let uploadedImage = null;

navigator.mediaDevices.getUserMedia({ video: true }).then(function (stream) {
    video.srcObject = stream;
    video.play();
});

getDevices().then(gotDevices).catch(handleError);



startButton.addEventListener('click', start);

function getDevices() {
    return navigator.mediaDevices.enumerateDevices();
}

function gotDevices(deviceInfos) {
    window.deviceInfos = deviceInfos;
    const videoDevices = deviceInfos.filter(deviceInfo => deviceInfo.kind === 'videoinput');
    videoDevices.forEach(videoDevice => {
        const option = document.createElement('option');
        option.value = videoDevice.deviceId;
        option.text = videoDevice.label || `Camera ${cameraList.length + 1}`;
        cameraList.appendChild(option);
    });
}

function start() {
    selectedCameraId = cameraList.value;

    if (!selectedCameraId) {
        console.error('No camera selected');
        return;
    }

    const constraints = {
        video: { deviceId: selectedCameraId ? { exact: selectedCameraId } : undefined, width: 640, height: 360 }
    };

    navigator.mediaDevices.getUserMedia(constraints).then(handleSuccess).catch(handleError);
}

function handleSuccess(stream) {
    video.srcObject = stream;
}

function handleError(error) {
    console.error('Error accessing the camera:', error);
}

function takePicture() {
    const context = canvas.getContext('2d');
    canvas.width = 640;
    canvas.height = 360;
    context.drawImage(video, 0, 0, 640, 360);

    const imgUrl = canvas.toDataURL('image/png');

    if (uploadedImage) {
        photos.removeChild(uploadedImage);
    }

    const img = document.createElement('img');
    img.setAttribute('src', imgUrl);
    img.style.filter = filter;
    photos.appendChild(img);

    uploadedImage = img;
}

document.getElementById('upload').addEventListener('click', function () {
    var input = document.createElement('input');
    input.type = 'file';
    input.accept = 'image/*';

    input.addEventListener('change', function (event) {
        var file = event.target.files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function (e) {
                if (uploadedImage) {
                    photos.removeChild(uploadedImage);
                }

                var img = document.createElement('img');
                img.src = e.target.result;
                img.width = 640;
                img.height = 360;

                img.style.filter = filter;

                document.getElementById('photos').appendChild(img);

                uploadedImage = img;
            };

            reader.readAsDataURL(file);
        }
    });

    input.click();
});


filters.forEach(filterItem => {
    filterItem.addEventListener('click', function () {
        filter = filterItem.getAttribute('value');
        video.style.filter = filter;
        filterbox.classList.remove('filterbox--open');
    });
});

function clear() {
    photos.innerHTML = '';
    filter = 'none';
    video.style.filter = filter;

    uploadedImage = null;
    
}





startButton.addEventListener('click', start);
photoButton.addEventListener('click', takePicture);
clearButton.addEventListener('click', clear);

filterboxToggle.addEventListener('click', () => {
    filterbox.classList.toggle('filterbox--open');
});

close.addEventListener('click', () => {
    filterbox.classList.remove('filterbox--open');
});
