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


## Adicionando Package (instruções)

#### Use composer to install the package.

composer require leantony/laravel_modal:dev-master

#### Add the service provider, in app.php.

Leantony\Modal\ServiceProvider::class

#### Publish the assets

##### publish the javascript assets

php artisan vendor:publish --tag=public --provider="Leantony\Modal\ServiceProvider" --force

##### publish the view

php artisan vendor:publish --provider="Leantony\Modal\ServiceProvider"

>The javascript files will be copied into the "public/vendor/leantony/modal" folder

The view will be copied to resources/views/vendor/leantony/modal

You can then reference the assets (bootstrap, jquery) on your page

#### Usage

```
{!! BootForm::openHorizontal(['sm' => [4, 8], 'lg' => [2, 10]])->action($route)->class('form-horizontal')->id('modal_form')->method(isset($method) ? $method : 'POST') !!}

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">{{ ucwords($action . ' '. class_basename($model)) }}</h4>
</div>
<div class="modal-body">
    <div id="modal-notification"></div>
    {!! BootForm::text('Title', 'title')->placeholder('Enter a title') !!}
    {!! BootForm::textArea('Content', 'content')->placeholder('Enter some content') !!}
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save Changes</button>
</div>
{!! BootForm::close() !!}
```

>[Link para o tutorial](https://github.com/leantony/laravel_modal)
