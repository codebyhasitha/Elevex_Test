function updateDateTime() {
    const dateTime = new Date();
    document.getElementById("datetime").innerText =
        dateTime.toLocaleString("en-GB", { weekday: "long", year: "numeric", month: "long", day: "numeric", hour: "2-digit", minute: "2-digit" });
}


document.getElementById("zone").addEventListener("change", function() {
    let randomNum = Math.floor(1000 + Math.random() * 9000);
    document.getElementById("territory_code").value = "TERR-" + randomNum;
});

