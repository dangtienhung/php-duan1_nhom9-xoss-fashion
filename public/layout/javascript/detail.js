// Switch Tab
const tab_list = document.querySelectorAll(".detail__tablist-container li");
const divs = document.querySelectorAll(".detail__reviews-description > div")

if(divs) {
    divs.forEach((e, index) => { 
        if(index != 0)
            e.style.display = 'none' 
    })
}

if(tab_list) {
    tab_list.forEach((value,key) => {
        value.addEventListener('click', (e) => {
            e.preventDefault()    
            tab_list.forEach((e) => { e.classList.remove('active')})
            divs.forEach((e) => { e.style.display = 'none' })
            value.classList.add('active')
            divs[key].style.display = 'block';
        })
    })
}


// change quantity
const input_quantity = document.querySelector(".detail_product-input-plus-minus")
const btn_inc = document.querySelector(".detail__product-inc")
const btn_dec = document.querySelector(".detail__product-dec")


if(input_quantity) {
    btn_inc.addEventListener('click', () => {
        let value = input_quantity.value
        if(parseInt(value) < input_quantity.id) {
            input_quantity.value = parseInt(value) + 1;
        }
    })

    btn_dec.addEventListener('click', () => {
        let value = input_quantity.value
        if(parseInt(value) > 1) {
            input_quantity.value = parseInt(value) - 1;
        }
    })
}