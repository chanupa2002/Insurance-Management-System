

function printTable() {
    var table = document.getElementById("userTable");
    if (table) {
        var newWin = window.open('', 'Print-Window');
        newWin.document.open();
        newWin.document.write('<html><body onload="window.print()">' + table.outerHTML + '</body></html>');
        newWin.document.close();
        setTimeout(function(){newWin.close();},10);
    }
}