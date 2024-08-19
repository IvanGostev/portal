function formatBytes(bytes, decimals = 2) {
    if (!+bytes) return '0 Bytes'

    const k = 1024
    const dm = decimals < 0 ? 0 : decimals
    const sizes = ['Bytes', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB']

    const i = Math.floor(Math.log(bytes) / Math.log(k))

    return `${parseFloat((bytes / Math.pow(k, i)).toFixed(dm))} ${sizes[i]}`
} // переводим в байты код из stackoverflow

const element = (tag, classes = [], text) => {
    const node = document.createElement(tag)
    if (classes.lenght != 0) {
        node.classList.add(...classes)
    }
    if (text) {
        node.textContent = text;
    }
    return node;
} // вспомагательная функция для создания элементов dom
function noop() {}
export function upload(selector, options = {}) {
    let files = []
    const onUpload = options.onUpload ?? noop
    const input = document.querySelector(selector)
    // const preview = document.createElement('div') // создаем div
    // preview.classList.add('preview') // добовляем класс
    // const open = document.createElement('button')
    // open.classList.add('btn') // добавляем класс
    // open.textContent = 'Открыть' // текст кнопки
    // после создания функции element переписали создание элементов
    const preview = element('div', ['gpreview'])
    const open = element('button', ['gbtn'], 'Открыть')
    const upload = element('button', ['gbtn', 'gprimary'], 'Загрузить')
    upload.style.display = 'none'; // скрываем копку

    if(options.multi) {
        input.setAttribute('multiple', true) // разрешили загрузку нескольких фалов
    }
    if(options.accept && Array.isArray(options.accept)) {
        input.setAttribute('accept', options.accept.join(',')) // указали какие типы фалов нужны
    }
    input.insertAdjacentElement('afterend', preview)
    input.insertAdjacentElement('afterend', upload) // размещаем объект после input
    input.insertAdjacentElement('afterend', open) // размещаем объект после input


    const triggerInput = () => input.click() // нажимаем на input

    const changeHandler = event => {

        if(!event.target.files.length) {
            return // проверка на наличие файлов
        }

        files = Array.from(event.target.files) // колекцию переводим в массив

        upload.style.display = 'inline' // показываем кнопку

        files.forEach(file => {
            if (!file.type.match('image')) {// проверяем что файл типа картинка
                return
            }

            const reader = new FileReader(); // объект для чтения файлов в браузере

            reader.onload = ev => {
                // console.log(ev.target.result) // как только мы его считаем выполняем console.log()
                // input.insertAdjacentHTML('afterend', `<img src="${ev.target.result}">`)
                const src = ev.target.result
                preview.insertAdjacentHTML('afterbegin', `
                    <div class="gpreview-img">
                    <div class="gpreview-remove" data-name="${file.name}">&times;</div>
                        <img src="${src}" alt="${file.name}">
                        <div class="gpreview-info">
                            <span>${file.name} </span>
                            ${formatBytes(file.size)}
                        </div>
                    </div>
                `) // afterbegin - располагаем в нутри
            }

            reader.readAsDataURL(file) // асихронная (не знаем когда выполниться)
        })
    }

    const removeHandler = event => {
        // console.log(event.target.dataset) // target - сам html тег

        if (!event.target.dataset.name) { // если при нажатие нету data-name то return
            return
        }
        const {name} = event.target.dataset;
        files = files.filter(file => file.name != name)
        if (!files.length) {
            upload.style.display = 'none' // если нет файлов убираем кнопку загрузить
        }
        console.log(files)
        const block = preview
        .querySelector(`[data-name="${name}"]`)
        .closest('.preview-img') // находим родителя с таким класском
        block.classList.add('gremoving') // добавляем класс
        setTimeout( () => block.remove(), 300) // ставим задержку так как анимация идет 0.3s псоле нее мы удаляем
        // block.remove() // удаляем из html documenta


    }
    const clearPreview = el => {
        el.style.bottom = 0;
        el.innerHTML = '<div class="gpreview-info-progress"></div>'
    }
    const uploadHandler = () => {
        preview.querySelectorAll('.preview-remove').forEach(e => e.remove()) // удяляем кнопку "удалить изображение"
        const previewInfo = preview.querySelectorAll('.preview-info')
        previewInfo.forEach(clearPreview)
        onUpload(files, previewInfo)
    }
    // что-то остлеживаем и вызываем функцию выше
    open.addEventListener('click', triggerInput) // отслеживаем нажатие на кнопку
    input.addEventListener('change', changeHandler) // отслежтвает загрузку файлов
    preview.addEventListener('click', removeHandler) // отслеживаем нажатие на картинку
    upload.addEventListener('click', uploadHandler)

}
