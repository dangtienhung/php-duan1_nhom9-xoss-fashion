//change info 
const current_phone_number = document.querySelector(".info__content-box #phone_number");
const current_email = document.querySelector(".info__content-box #email");
const current_name = document.querySelector(".info__content-box #name");
const current_address = document.querySelector(".info__content-box #address");
const change_phone_number_btn = document.querySelector("#change_phone_number");
const change_email_btn = document.querySelector("#change_email")
const change_name_btn = document.querySelector("#change_user_name i")
const change_address_btn = document.querySelector("#change_address")
console.log(change_address_btn)
const input_phone_number = document.querySelector("#phone_number_value");
const input_email = document.querySelector("#email_value");
const input_name = document.querySelector("#name_value");
const input_address = document.querySelector("#address_value");

if(input_phone_number) {
    let bool = true;
    change_phone_number_btn.addEventListener('click', () => {
        if(bool) {
            input_phone_number.disabled = false;
            bool = false
        } else {
            input_phone_number.disabled = true;
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
            bool = false
        } else {
            input_email.disabled = true;
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
            bool = false
        } else {
            input_name.disabled = true;
            bool = true
            input_name.value = current_name.value;
        }
    })
}
if(input_address) {
    let bool = true;
    change_address_btn.addEventListener('click', () => {
        if(bool) {
            input_address.disabled = false;
            bool = false
        } else {
            input_address.disabled = true;
            bool = true
            input_address.value = current_address.value;
        }
    })
}