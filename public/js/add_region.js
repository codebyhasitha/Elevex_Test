function updateDateTime() {
    let now = new Date();
    let datetime = now.toLocaleString("en-US", {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "2-digit",
        minute: "2-digit",
        second: "2-digit"
    });
    document.getElementById("datetime").innerText = datetime;
}


document.getElementById("zone").addEventListener("change", function () {
    let zoneValue = this.value;
    if (zoneValue) {
        document.getElementById("regioncode").value = "REG-" + Math.floor(1000 + Math.random() * 9000);
    } else {
        document.getElementById("regioncode").value = "";
    }
});
