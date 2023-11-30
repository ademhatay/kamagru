document.addEventListener('DOMContentLoaded', () => {
    getDevices()
        .then(gotDevices)
        .then(requestCameraPermission)
        .catch(handleError);
});

const video = document.querySelector('#video');
const close = document.querySelector('.close');
const startButton = document.querySelector('#start');
const filterbox = document.querySelector('.filterbox');
const filterboxToggle = document.querySelector('.filterbox-toggle');
const cameraList = document.querySelector('#cameras');
let selectedCameraId;

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

function requestCameraPermission() {
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(() => {
            console.log('Camera permission granted');
        })
        .catch(error => {
            console.error('Error requesting camera permission:', error);
        });
}

function start() {
    selectedCameraId = cameraList.value;

    if (!selectedCameraId) {
        console.error('No camera selected');
        return;
    }

    const constraints = {
        video: { deviceId: selectedCameraId ? { exact: selectedCameraId } : undefined, width: 640, height: 360}
    };

    navigator.mediaDevices.getUserMedia(constraints)
        .then(handleSuccess)
        .catch(handleError);
}

function handleSuccess(stream) {
    video.srcObject = stream;
}

function handleError(error) {
    console.error('Error accessing the camera:', error);
}

startButton.addEventListener('click', start);

filterboxToggle.addEventListener('click', () => {
    filterbox.classList.toggle('filterbox--open');
});

close.addEventListener('click', () => {
    filterbox.classList.remove('filterbox--open');
});
