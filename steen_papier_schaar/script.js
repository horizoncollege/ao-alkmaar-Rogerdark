var speler1 = 0;

function steen1() {
    speler1 = 1;
}
function papier1() {
    speler1 = 2;
}
function schaar1() {
    speler1 = 3;
}

function steen2() {
    if (speler1 == 1) {
        document.write("gelijk spel");
    }
    if (speler1 == 2) {
        document.write("speler1 gewonnen");
    }
    if (speler1 == 3) {
        document.write("speler2 gewonnen");
    }
}
function papier2() {
    if (speler1 == 1) {
        document.write("speler2 gewonnen");
    }
    if (speler1 == 2) {
        document.write("gelijk spel");
    }
    if (speler1 == 3) {
        document.write("speler1 gewonnen");
    }
}
function schaar2() {
    if (speler1 == 1) {
        document.write("speler1 gewonnen");
    }
    if (speler1 == 2) {
        document.write("speler2 gewonnen");
    }
    if (speler1 == 3) {
        document.write("gelijk spel");
    }
}