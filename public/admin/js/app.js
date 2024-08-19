import {upload} from'./upload.js'
const firebaseConfig = {
    apiKey: "AIzaSyBknG5-EzvL12YXdwELB2liePd3eFWJQT8",
    authDomain: "fe-upload-f9e9f.firebaseapp.com",
    projectId: "fe-upload-f9e9f",
    storageBucket: "fe-upload-f9e9f.appspot.com",
    messagingSenderId: "261819323472",
    appId: "1:261819323472:web:7d975011db0ea03ee0ed55"
};

//   Initialize Firebase
firebase.initializeApp(firebaseConfig)
const storage = firebase.storage()
console.log(storage)
upload("#images", {
    multi: true, // если true то можем загружать несколько файлов
    accept: ['.png', '.jpg', '.gif'],
    // onUpload(files, blocks) {
    //     files.forEach((file, index) => {
    //        const ref = storage.ref(`images/${file.name}`) // куда поместить файл и с каким названием
    //        const task = ref.put(file) /
    //        task.on('state_changed', snapshot => {
    //             const percentage = ((snapshot.bytesTransferred / snapshot.totalBytes) * 100).toFixed(0)  + '%'
    //             const block = blocks[index].querySelector('.preview-info-progress')
    //             block.textContent = percentage
    //             block.style.width = percentage
    //             console.log(percentage)
    //        }, error => {
    //             console.log(error)
    //        }, () => {
    //         task.snapshot.ref.getDownloadURL().then(url => {
    //             console.log('Dowlound URL', url)
    //         })
    //        })
    //     })
    // }
})
