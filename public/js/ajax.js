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
        + '<del class="product-old-price">' + result.product_price.toLocaleString('it-IT', { style: 'currency', currency: 'VND' }) + '</del>';
    document.getElementById("modal-description").innerHTML = result.product_description;
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