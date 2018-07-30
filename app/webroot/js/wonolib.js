function RP(rp) {
    if (rp == "" || rp == null) {
        return "Rp. 0";
    }
    while (/(\d+)(\d{3})/.test(rp.toString())) {
        rp = rp.toString().replace(/(\d+)(\d{3})/, '$1' + '.' + '$2');
    }
    return "Rp. " + rp + ",-";
}

function USD(usd) {
    if (usd == "" || usd == null) {
        return "$ 0.00";
    }
    while (/(\d+)(\d{3})/.test(usd.toString())) {
        usd = usd.toString().replace(/(\d+)(\d{3})/, '$1' + '.' + '$2');
    }
    return "$ " + usd;
}

function nullToStrip(e) {
    if (e == null) {
        return "-";
    }
    return e;
}