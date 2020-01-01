# Project Structure

## Entitys

* Summoner
* Champion
* Match
* MatchDetail
* Participants
* Iten
* SummonerSpell

## Relationship

### OneToOne

Match >> MatchDetail

### OneToMany

Summoner >> Match

Champion >> Match

Champion >> Participants

MatchDetail >> Participants

Iten >> Participants

SummonerSpeel >> Participants

## Tables descriptions

### Summoner

attribute       | type          | description
----------------|---------------|------------
id              | string        |
name            | string        |
puuid           | string        |
summonerLevel   | bigInteger    |
revisionDate    | bigInteger    |
accountId       | string        |
profileIconId   | integer       |

### Champion

attribute   | type      | description
------------|-----------|------------
id          | string    |
name        | string    |
title       | string    |
img_screen  | string    |
img_square  | string    |

### Match

attribute   | type          | description
------------|---------------|------------
gameId      | bigInteger    |
lane        | string        |
champion_id | string        |
platformId  | string        |
queue       | integer       |
role        | string        |
season      | integer       |
summoner_id | string        |

### MatchDetail

attribute   | type          | description
------------|---------------|------------
gameId      | bigInteger    |
gameMode    | string        |
gameType    | string        |
gameDuration| bigInteger    |
gameCreation| bigInteger    |

### Iten

attribute   | type      | description
------------|-----------|--------------
id          | integer   |
name        | longText  |
description | longText  |
image       | string    |
goldBase    | integer   |
goldTotal   | integer   |

### Summoner Spell

attribute   | type      | description
------------|-----------|--------------
key         | integer   |
name        | string    |
description | longText  |
cooldownBurn| string    |
image       | string    |

### Participants

attribute          | type       | description
-------------------|------------|------------
participantId      | integer    |
match_detail_id    | bigInteger |
spell1Id           | integer    |
lane               | string     |
spell2Id           | integer    |
largestMultiKill   | integer    |
kills              | integer    |
assists            | integer    |
deaths             | integer    |
goldEarned         | integer    |
champLevel         | integer    |
championId         | string     |
teamId             | integer    |
win                | boolean    |
item0              | integer    |
item1              | integer    |
item2              | integer    |
item3              | integer    |
item4              | integer    |
item5              | integer    |
item6              | integer    |
