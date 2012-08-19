$(document).ready(function() {
    $.fn.exists = function() { return this.length>0; }

    if ($('#loadRankings').exists())    $('#loadRankings').click(loadRankings);
    if ($('#killPlayer').exists())      $('#killPlayer').hide();
    if ($('#rankingList').exists())     $('#rankingList').change(function() {
        var name    = $('#rankingList :selected').attr('data-player');
        $('#killPlayer').html('Kill ' + name).show();
    });
    if ($('#killPlayer').exists())      $('#killPlayer').click(killPlayer);
});