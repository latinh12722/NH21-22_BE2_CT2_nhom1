// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var arraybtn = document.querySelectorAll("#btnshowmodal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal

arraybtn.forEach(element => {
    element.onclick = function () {
        setvaluemodal(element.dataset.productId, this.dataset.url)
    }
});
async function setvaluemodal(product_id,url) {
    const data = { productId: product_id };
    const token = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    const response = await fetch(url, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify(data)
    });
    const result = await response.json();
    const image = document.getElementById("modal-image");
    image.src = image.dataset.urlimage + "/" + result.product_image;
    document.getElementById("modal-name").innerHTML = result.product_name;
    const price = result.product_price - result.product_price * result.product_sale / 100;
    document.getElementById("modal-price").innerHTML = price.toLocaleString('it-IT', { style: 'currency', currency: 'VND' })
        +  ' <del class="product-old-price">' + result.product_price.toLocaleString('it-IT', { style: 'currency', currency: 'VND' }) + '</del>';
    document.getElementById("modal-description").innerHTML = result.product_description;
    const input_product_id = document.querySelector('#input_product_id');
    input_product_id.value = result.product_id;
    modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


//comments
const btncomment = document.querySelector('#btncomment');
btncomment.addEventListener('click',function () {
    comment_product(btncomment.dataset.url,btncomment.dataset.productId);
    window.location.reload(true);
});
async function comment_product(url,productid) {
    const phone = document.querySelector('#comment_phone').value;
    const name = document.querySelector('#comment_name').value;
    const commentContent = document.querySelector('#comment_content').value;
    const stars =  document.querySelectorAll('input[type=radio][name=rating]:checked');
    const data = {
        name: name,
        phone: phone,
        comment_content: commentContent,
        product_Id: productid,
        rating: stars[0].value
    };
    const token = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    console.log(token);
    const response = await fetch(url, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify(data)
    });
    const result = await response.json();
    console.log(result);
}