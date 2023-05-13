let btnClear = document.getElementById("btn-clear");
if (btnClear) {
    btnClear.addEventListener("click", () => {
        window.location.href = window.location.href.split("?")[0];
    });
}

let filterCategory = document.getElementById("filter_by_category");
if (filterCategory) {
    filterCategory.addEventListener("change", function () {
        let categoryID = this.value || this.options[this.selectedIndex].value;
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set("category", categoryID);
        window.location.search = urlParams;
    });
}

let filterMerchant = document.getElementById("filter_by_merchant");
if (filterMerchant) {
    filterMerchant.addEventListener("change", function () {
        let merchantID = this.value || this.options[this.selectedIndex].value;
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set("merchant", merchantID);
        window.location.search = urlParams;
    });
}

let filterPricing = document.getElementById("filter_by_pricing");
if (filterPricing) {
    filterPricing.addEventListener("change", function () {
        let pricingCriteria =
            this.value || this.options[this.selectedIndex].value;
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set("order_by", pricingCriteria);
        window.location.search = urlParams;
    });
}

