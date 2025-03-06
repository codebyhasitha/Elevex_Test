document.addEventListener("DOMContentLoaded", function () {

    let skuIdField = document.getElementById("sku_id");
    if (skuIdField) {
        skuIdField.value = "AUTO-" + Math.floor(Math.random() * 10000);
    }
});
