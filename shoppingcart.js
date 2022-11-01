let cart = document.querySelectorAll(".addToCart");
console.log(cart);

console.log(window.localStorage.getItem('products'));
const obj = JSON.parse(window.localStorage.getItem("products"));

const shoppingcart = new Array();

for(let i=0;i<=cart.length; i++){
    cart[i].addEventListener('click', ()=>{
        console.log(obj[i-1].name);
        var buyProduct=
        {
            id: obj[i-1].id,
            name: obj[i-1].name,
            price:  obj[i-1].price,
            category: obj[i-1].category,
            image_link: obj[i-1].image_link
        }
        ;

        shoppingcart.push(buyProduct);
        localStorage.setItem("shoppingCart", JSON.stringify(shoppingcart));
        console.log(window.localStorage.getItem('shoppingCart'));
    })
}