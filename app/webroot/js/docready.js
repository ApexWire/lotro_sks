$(document).ready(function() {
    $.fn.exists = function() { return this.length>0; }

    if ($('#loadRankings').exists())    $('#loadRankings').click(loadRankings);
});