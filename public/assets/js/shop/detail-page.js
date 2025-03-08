document.addEventListener("DOMContentLoaded", function () {
    const decreaseButton = document.getElementById("decrease");
    const increaseButton = document.getElementById("increase");
    const quantityInput = document.getElementById("quantity");
    const selectedPriceElement = document.getElementById("product-price");
    const selectedStockElement = document.getElementById("stock-amount");
    let maxStock = parseInt(selectedStockElement.textContent, 10);
    const minStock = 1;

    function validateInput() {
        let currentValue = parseInt(quantityInput.value, 10);
        if (isNaN(currentValue) || currentValue === "") {
            quantityInput.value = "";
            return;
        }
        if (currentValue < minStock) {
            quantityInput.value = minStock;
        } else if (currentValue > maxStock) {
            quantityInput.value = maxStock;
        }
    }

    decreaseButton.addEventListener("click", function () {
        let currentValue = parseInt(quantityInput.value, 10) || minStock;
        if (currentValue > minStock) {
            quantityInput.value = currentValue - 1;
        }
    });

    increaseButton.addEventListener("click", function () {
        let currentValue = parseInt(quantityInput.value, 10) || minStock;
        if (currentValue < maxStock) {
            quantityInput.value = currentValue + 1;
        }
    });

    quantityInput.addEventListener("input", function () {
        this.value = this.value.replace(/[^0-9]/g, "");
        validateInput();
    });

    quantityInput.addEventListener("blur", function () {
        validateInput();
        if (this.value === "") {
            this.value = minStock;
        }
    });

    let ukuranItems = document.querySelectorAll(".ukuran-item");

    ukuranItems.forEach((item) => {
        item.addEventListener("click", function () {
            ukuranItems.forEach((c) => c.classList.remove("active"));
            this.classList.add("active");

            let selectedSlug = this.getAttribute("data-slug");
            let selectedPrice = this.getAttribute("data-harga");
            let selectedStock = this.getAttribute("data-stok");

            selectedPriceElement.innerText =
                "Rp. " + new Intl.NumberFormat("id-ID").format(selectedPrice);
            selectedStockElement.innerText = selectedStock;

            document.getElementById("selected_slug").value = selectedSlug;

            maxStock = parseInt(selectedStock, 10);
            validateInput();
        });
    });
});
