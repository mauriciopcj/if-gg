# Project Structure

## Entitys

* Summoner
* Champion
* Match
* MatchDetail
* Participants

attribute          | description
--------------------------------
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

## Relationship

### OneToOne

Match >> MatchDetail

### OneToMany

Sumoner >> Match
Champion >> Match
MatchDetail >> Participants
