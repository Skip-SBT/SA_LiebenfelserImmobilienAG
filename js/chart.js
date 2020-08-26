function draw_square() {
    var c = document.getElementById("VBar");
    var ctx = c.getContext("2d");
    c.width = c.height * (c.clientWidth / c.clientHeight) * 2.7;
    var bel = document.getElementById("bel").value;
    var ek = 100 - bel;
    var abzug = c.height / 100 * bel;
    var height = c.height - abzug;


    ctx.beginPath();
    ctx.fillStyle = "#9ECA36";
    ctx.fillRect(0, 0, c.width, height);

    ctx.fillStyle = "#000000";
    ctx.font = "7pt Raleway sans-serif";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    ctx.fillText(ek + " %", c.width / 2, height / 2);

    ctx.fillStyle = "#FF3333"
    ctx.fillRect(0, height, c.width, abzug);

    ctx.fillStyle = "#000000";
    ctx.font = "7pt Raleway serif";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    ctx.fillText(bel + " %", c.width / 2, height + abzug / 2);
    ctx.stroke();
}