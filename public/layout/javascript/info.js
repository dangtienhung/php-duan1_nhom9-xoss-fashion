//change div cotent by option
const options = document.querySelectorAll(".info__list-option>li");
const div_content = document.querySelectorAll(".info__main-wrap-box>div");
const current_phone_number = document.querySelector(".info__content-box #phone_number");
const current_email = document.querySelector(".info__content-box #email");
const change_phone_number_btn = document.querySelector("#change_phone_number");
const change_email_btn = document.querySelector("#change_email")
const input_phone_number = document.querySelector("#phone_number_value");
const input_email = document.querySelector("#email_value");

//Preview Avatar
const img_input = document.querySelector("#img_input");
const view_image = document.querySelector("#view_image");
const div_image = document.querySelector(".info__image-preview");
const cancel = document.querySelector("#cancel");

if(div_content) {
    div_content.forEach((e, index) => { 
        if(index != 0)
            e.style.display = 'none' 
    })
}

if(options) {
    options.forEach((value,key) => {
        value.addEventListener('click', (e) => {
            e.preventDefault()    
            options.forEach((e) => { e.classList.remove('active')})
            div_content.forEach((e) => { e.style.display = 'none' })
            value.classList.add('active')
            div_content[key].style.display = 'block';
        })
    })


}

if(input_phone_number) {
    let bool = true;
    change_phone_number_btn.addEventListener('click', () => {
        if(bool) {
            input_phone_number.disabled = false;
            change_phone_number_btn.innerText = "Hủy"
            bool = false
        } else {
            input_phone_number.disabled = true;
            change_phone_number_btn.innerText = "Thay đổi"
            bool = true
            input_phone_number.value = current_phone_number.value;
        }
    })
}

if(input_email) {
    let bool = true;
    change_email_btn.addEventListener('click', () => {
        if(bool) {
            input_email.disabled = false;
            change_email_btn.innerText = "Hủy"
            bool = false
        } else {
            input_email.disabled = true;
            change_email_btn.innerText = "Thay đổi"
            bool = true
            input_email.value = current_email.value;
        }
    })
}

if(img_input) {
    img_input.addEventListener('change', ()=> {
        var url = URL.createObjectURL(img_input.files[0]);
        view_image.src = url
        div_image.style.display="block";
    })

    cancel.addEventListener('click', () => {
        view_image.src = '';
        img_input.value = '';
        div_image.style.display="none";
        console.log(view_image.src)
    })
}