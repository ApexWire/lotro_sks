function moveToSuicideList(option) {
    var characterName   = $(option).attr('value');
    var playerName      = $(option).attr('data-player');
    var playerId        = $(option).attr('data-id');
    var suicideList     = $('.suicideList select');

    var suicideOptions  = $('.suicideList select option');
    var inSuicideList   = false;

    if (suicideOptions.length > 0) {
        $.each(suicideOptions, function(key, value) {
            var suicidePlayer   = $(value).attr('data-player');
            if (suicidePlayer == playerName) {
                alert('Player has already characters in suicide list!');
                inSuicideList   = true;
            }
        });
    }

    if (!inSuicideList) {
        var newOption       = '<option value="' + characterName + '" data-id="' + playerId + '" data-player="' + playerName + '" onclick="moveToCharacterList(this)">' + characterName + '</option>';
        $(suicideList).append(newOption);
        $(option).remove();
    }
}

function moveToCharacterList(option) {
    var characterName   = $(option).attr('value');
    var playerName      = $(option).attr('data-player');
    var playerId        = $(option).attr('data-id');
    var characterList   = $('.characterList select optgroup[label="' + playerName + '"]');

    var newOption       = '<option value="' + characterName + '" data-id="' + playerId + '" data-player="' + playerName + '" onclick="moveToSuicideList(this)">' + characterName + '</option>';

    $(characterList).append(newOption);
    $(option).remove();
}

function loadRankings() {
    var suicideOptions  = $('.suicideList select option');
    var raidId          = $('#RaidId').val();

    var isEmpty         = false;
    if (suicideOptions.length == 0) {
        alert('Suicide List is emtpy!');
        isEmpty = true;
    }

    if (!isEmpty) {
        var players = [];
        $.each(suicideOptions, function(key, value) {
            players.push({id: $(value).attr('data-id'), player: $(value).attr('data-player'), character: $(value).attr('value')});
        });

        var url         = "/ajax/loadRankings/";
        var data        = {players: players, raidId: raidId};
        var callback    = function(data) {
            var rankingOptions  = $('.rankingList select');
            $.each(data.rankings, function(key, value) {
                var newOption   = '<option value="' + value.id + '" data-pos="' + key + '" data-player="' + value.playerName + '">' + value.characterName + '</option>';
                $(rankingOptions).append(newOption);
            });
        };
        var type        = "json";
        $.post(url, data, callback, type);
    }
}

function killPlayer() {
    var playerId    = $('#rankingList :selected').val();
    var playerPos   = $('#rankingList :selected').attr('data-pos');
    var playerName  = $('#rankingList :selected').attr('data-player');
    var itemId      = $('#itemList :selected').val();
    var itemName    = $('#itemList :selected').html();
}