//change div cotent by option
const options = document.querySelectorAll(".info__list-option>li");
const div_content = document.querySelectorAll(".info__main-wrap-box>div");

//change info 
const current_phone_number = document.querySelector(".info__content-box #phone_number");
const current_email = document.querySelector(".info__content-box #email");
const current_name = document.querySelector(".info__content-box #name");
const change_phone_number_btn = document.querySelector("#change_phone_number");
const change_email_btn = document.querySelector("#change_email")
const change_name_btn = document.querySelector("#change_name")
const input_phone_number = document.querySelector("#phone_number_value");
const input_email = document.querySelector("#email_value");
const input_name = document.querySelector("#name_value");

//Preview Avatar
const img_input = document.querySelector("#img_input");
const view_image = document.querySelector("#view_image");
const div_image = document.querySelector(".info__image-preview");
const cancel = document.querySelector("#cancel");


if(options) {

    options.forEach((value,key) => {
        console.log(value.className + key)
        if(value.className == 'active') {
            div_content.forEach((e) => { e.style.display = 'none' })
            div_content[key].style.display = 'block';
        }
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

if(input_name) {
    let bool = true;
    change_name_btn.addEventListener('click', () => {
        if(bool) {
            input_name.disabled = false;
            change_name_btn.innerText = "Hủy"
            bool = false
        } else {
            input_name.disabled = true;
            change_name_btn.innerText = "Thay đổi"
            bool = true
            input_name.value = current_name.value;
        }
    })
}

if(img_input) {
    var url ="";
    img_input.addEventListener('change', ()=> {
        var url = URL.createObjectURL(img_input.files[0]);
        view_image.src = url
        div_image.style.display="block";
    })

    cancel.addEventListener('click', () => {
        view_image.src = '';
        img_input.value = '';
        div_image.style.display="none";
        URL.revokeObjectURL(url);
        console.log(view_image.src)
    })
}