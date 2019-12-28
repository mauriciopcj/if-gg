# Project Structure

## Entitys

* Summoner
* Champion
* Match
* MatchDetail
* Participants
* Iten

## Relationship

### OneToOne

Match >> MatchDetail

### OneToMany

Summoner >> Match

Champion >> Match

Champion >> Participants

MatchDetail >> Participants

Iten >> Participants

## Tables descriptions

### Summoner

attribute       | description
----------------|------------
id              |
name            |
puuid           |
summonerLevel   |
revisionDate    |
accountId       |
profileIconId   |

### Champion

attribute   | description
------------|------------
id          |
name        |
title       |
img_screen  |
img_square  |

### Match

attribute   | description
------------|------------
gameId      |
lane        |
champion_id |
platformId  |
timestamp   |
queue       |
role        |
season      |
summoner_id |

### MatchDetail

attribute   | description
------------|------------
gameId      |
gameMode    |
gameType    |
gameDuration|
gameCreation|

### Iten

attribute   | description
------------|------------
id          |
name        |
description |
image       |
goldBase    |
goldTotal   |

### Participants

attribute          | description
-------------------|------------
participantId      |
match_detail_id    |
spell1Id           |
lane               |
spell2Id           |
largestMultiKill   |
kills              |
assists            |
deaths             |
goldEarned         |
champLevel         |
championId         |
win                |
item0              |
item1              |
item2              |
item3              |
item4              |
item5              |
item6              |